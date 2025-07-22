<?php session_start();
if (!isset($_SESSION['site_user'])){ header('location:giris.php'); exit(); } 
include('baglanti.php');
?>

<!DOCTYPE html>
<html lang="tr">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tüm İlanlar</title>

	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet"/>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>	
	<link href="css/dist/lity.css" rel="stylesheet"/>
	<script src="css/dist/vendor/jquery.js"></script>
	<script src="css/dist/lity.js"></script> 	
	<script src="js/jquery-ui.js"></script>
	<link rel="stylesheet" href="sweetalert/sweetalert.css">
	<script src="sweetalert/sweetalert.min.js"></script>

</head>



<body>

<?php include('menu.php'); ?>

    <div class="container-fuild">

      <div class="starter-template">
       

<div class="col-md-12">
	   
<div class="panel panel-default">
  <div class="panel-heading">
  
    <h3 class="panel-title">TÜM İLANLAR</h3>
  </div>
  <div class="panel-body">
    
	<div class="table-responsive">
	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon alert-info">Hızlı Üye Ara</div>
      <input type="search" class="light-table-filter form-control" data-table="Arama" placeholder="Aranacak kelime...">
    </div>
  </div>
	<table class="table table-bordered table-hover Arama">
 
		<thead>
		<tr>
			
			<th>Resim</th>
			<th>Seviye</th>
			<th>İlan Adı</th>
			<th>kategori</th>
			<th>Durum</th>
			<th width="140px">İşlemler</th>
			
		</tr>
       </thead>
	   
		<tbody id="listele">

<?php 
$verisayisi = count($conn->query("select * from uyeler",PDO::FETCH_ASSOC)->fetchAll());
	$gosterilecek = 150;
	$sayfa;

	$sayfasayisi = ceil($verisayisi/$gosterilecek);
	if(isset($_GET['sayfa'])){
		$sayfa = htmlentities($_GET['sayfa'],  ENT_QUOTES,  "utf-8");
	}else{
		$sayfa = 1;
	}
	if($sayfa > $sayfasayisi){
		$sayfa  = 1;
	}elseif(!is_numeric($sayfa) || $sayfa < 1){
		$sayfa = 1;
	}
	$baslangic = ($gosterilecek * $sayfa)-$gosterilecek;
?>		
		
		<?php 
		$query = $conn->prepare("select * from uyeler order by durum asc, sira asc limit $baslangic,$gosterilecek");
		$query->execute();
		$count = $query->rowcount();
		if ($count > 0){ 
		while($row = $query->fetch()){
		$ilanID	   = $row['id'];
		$Seo	   = $row['seo'];
		$kategori  = $row['kategori'];
		$durum	   = $row['durum'];
		$isim      = $row['isim'];
		$tarih	   = $row['tarih'];
		$btarih	   = $row['btarih'];		
		$seviye	   = $row['seviye'];
		$sira	   = $row['sira'];
		$resim	   = $row['resim'];
		
		?>
			<tr class="kayitlar" id="listele_<?php echo $ilanID; ?>">
			
				
				<td class="cerceve">
				<?php if($resim!=''){ ?>
				<a href="../modelresim/<?php echo $resim; ?>" data-lity><img src="../modelresim/<?php echo $resim; ?>" class="resim"></a>
				<?php }else{ ?>
				<img src="../img/resimyok.jpg" class="resim">
				<?php } ?>
				</td>
				<td><?php echo ucwords($seviye. ' İlan'); ?></td>				
				
				<td><?php echo $isim; ?></td>
				
				<td><small><?php 
				$query7 = $conn->prepare("select * from kategori where id = ? ");
				$query7->execute(array($kategori));
				$row7 = $query7->fetch();
				$gelenilBaslik	= $row7['baslik'];				
				echo $gelenilBaslik;  ?></small></td>
				
				<td>
				<?php 
				$zaman = date("Y-m-d"); 
				if( $btarih > $zaman or $btarih == $zaman){
					echo '<span style="color:green;font-weight:bold;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><br/> Yayında</span><br><small>'.$btarih.' <br/>tarihinde sona erecek</small>'; 
					}else{ 
					echo '<span style="color:red;font-weight:bold;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><br/> <small>'.$btarih.' tarihinde süresi doldu</small></span>';} 
					?>
				</td>
			
				<td>
				<a href="ilangaleri.php?id=<?php echo $ilanID; ?>" data-toggle="tooltip" data-placement="top" title="İlan Galeri" class="btn btn-xs btn-warning"><span class="glyphicon glyphicon-picture"></span></a>
				
				<a href="../ilan/<?php echo $Seo; ?>/<?php echo $ilanID; ?>" target="_blank" data-toggle="tooltip" data-placement="top" title="İlana Git" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-search"></span></a>
				
				<a href="ilanduzenle.php?id=<?php echo $ilanID; ?>" data-toggle="tooltip" data-placement="top" title="Düzenle" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a> 
				
				<a href="#" title="Sil" data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-xs silbuton" id="<?php echo $ilanID; ?>" ><span class="glyphicon glyphicon-minus-sign"></span></a>
				</td>                                    
			</tr>
		<?php } ?>
		<?php } else{ echo '<tr><td colspan="6"><div class="alert alert-warning" role="alert">Henüz ilan eklenmemiş!</div></td></tr>'; ?>  <?php } ?>

		</tbody>

 
	</table>
	</div>
	
  </div>
  
  
  <div class="panel-footer">
  
<nav aria-label="Page navigation">
<ul class="pagination pagination-sm">
<?php 
			if($sayfa > 1){
				echo '<li><a href="ilanlar.php?sayfa=1">İlk</a></li>';
				echo '<li><a title="önceki" href="ilanlar.php?sayfa='.($sayfa-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
			}
			
		
			$ekgoster = 2;
			for($i = $sayfa - $ekgoster; $i <= $sayfa + $ekgoster;$i++){
				if($i > 0 && $i <= $sayfasayisi){
					if($i == $sayfa){
						
						echo '<li class="active"><a>'.$i.'</a></li>';
					}else{
						echo '<li><a href="ilanlar.php?sayfa='.$i.'">'.$i.'</a></li>';
						
					}
				}
			}
			
			
			if($sayfa < $sayfasayisi){
				echo '<li><a title="sonraki" href="ilanlar.php?sayfa='.($sayfa+1).'"><span aria-label="Next">&raquo;</span></a></li>';
				echo '<li><a href="ilanlar.php?sayfa='.$sayfasayisi.'">Son</a></li>';

			}

		?>
</div>
  
  
</div>

</div>	
  
	   
      </div>

    </div><!-- /.container -->
	
<script type="text/javascript">
$(function() {
$(".silbuton").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
swal({
title: "Emin misiniz?",
text: "Bu İlan ve Fotoğrafları Silinecek",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Evet, silinsin!",
cancelButtonText: "Hayır, vazgeç!",
closeOnConfirm: false,
closeOnCancel: false
},
function(isConfirm){
if (isConfirm) {
$.ajax({
type: "GET",
url: "ilansil.php",
data: info,
success: function(){
}
});
swal({
title: "Başarılı", 
text: "İlan Silindi", 
type: "success",
timer: 1000},
function(){ 
location.reload();
}
);
$(this).parents(".kayitlar").animate({ backgroundColor: "#000" }, "fast")
.animate({ opacity: "hide" }, "slow");
}else{
swal({
title: "İptal",
text: "Silme İşlemi İptal Edildi",
type: "error",
timer: 1000
});	 
}
}); 
return false;
});
});
</script>

<script type="text/javascript">
var editor = CKEDITOR.replace( 'aciklama' );
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('.btn-default').tooltip({trigger: "click"}); 

});
</script>
<!-- Arama -->
<script>
(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);
</script>
<!-- Arama -->
	<script src="js/bootstrap-tagsinput.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>



</html>