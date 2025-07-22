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
    <title>Kategoriler</title>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet"/>
	<link rel="stylesheet" href="sweetalert/sweetalert.css">
	<script src="sweetalert/sweetalert.min.js"></script>
</head>



<body>

<?php include('menu.php'); ?>

    <div class="container-fuild">

      <div class="starter-template">
       

<div class="col-md-7 col-sm-12">
	   
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">KATEGORİLER</h3>
  </div>
  <div class="panel-body">
    
	<div class="table-responsive">
	<table class="table table-bordered table-hover">
 
		<thead>
		<tr>
			<th>Başlık</th>
			<th>İşlemler</th>
			
		</tr>
       </thead>
	   
		<tbody>	
		<?php 
		$query = $conn->query("select * from kategori order by baslik asc");
		$count = $query->rowcount();
		if ($count > 0){ 
		while($row = $query->fetch()){
		$id = $row['id'];
		$baslik = $row['baslik'];
		$seo = $row['seo'];
		?>
			<tr class="kayitlar">
				<td><?php echo $baslik; ?></td>
				<td><a href="kategoriduzenle.php?id=<?php echo $id; ?>" data-toggle="tooltip" data-placement="top" title="Düzenle" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a> 
				<a href="#" title="Sil" data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-xs silbuton" id="<?php echo $id; ?>" ><span class="glyphicon glyphicon-remove"></span></a></td>                                    
			</tr>
		<?php } ?>
		<?php } else{ echo '<tr><td colspan="2"><div class="alert alert-warning" role="alert">Henüz kategori eklenmemiş!</div></td></tr>'; ?>  <?php } ?>
		</tbody>

 
	</table>
	</div>
	
  </div>
</div>

</div>	



<div class="col-md-5 col-sm-12">

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">kategori EKLE</h3>
  </div>
  <div class="panel-body">
   
<?php
if(@$_POST['kayit']){
include('fonksiyon.php');
$baslik			= htmlspecialchars($_POST["baslik"], ENT_QUOTES, 'utf-8');
$odak			= htmlspecialchars($_POST["odak"], ENT_QUOTES, 'utf-8');
$meta			= addslashes($_POST['meta']);
$aciklama		= addslashes($_POST['aciklama']);
$anahtar		= htmlspecialchars($_POST["anahtar"], ENT_QUOTES, 'utf-8');
$seo			= strtolower(str_replace($tr,$en,$baslik));

if($baslik==""){

echo '<center><div class="alert alert-danger" role="alert">Başlık yazmadınız!</div></center>'; 
}else{

$Ekle = $conn->prepare("insert into kategori (baslik,odak,meta,anahtar,aciklama,seo) values (?, ?, ?, ?, ?, ?)");
$Ekle->execute(array( $baslik, $odak, $meta, $anahtar, $aciklama, $seo ));
echo '<center><div class="alert alert-success" role="alert">kategori eklendi!</div></center>';
$ref = htmlentities($_SERVER['HTTP_REFERER'],  ENT_QUOTES,  "utf-8");
echo '<meta http-equiv="refresh" content="1;URL='.$ref.'">';
}
}	
?>
	
	<form class="form-group" method="post" action="">
	
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Başlık</div>
      <input type="text" class="form-control" name="baslik" placeholder="">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Şehir+Semt</div>
      <input type="text" class="form-control" name="odak" placeholder="Örnek: İstanbul+Şişli">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">İçerik</div>
      <textarea class="form-control" name="aciklama" id="aciklama"></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Meta Açıklama</div>
       <textarea class="form-control" name="meta" rows="3"></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Anahtar Kelimeler</div>
      <input type="text" class="form-control" name="anahtar" data-role="tagsinput" placeholder="">
    </div>
  </div>  

  <input type="submit" class="btn btn-block btn-success" name="kayit" value="Ekle">
  
</form>
	
  </div>
</div>

</div>
   
	   
      </div>

    </div><!-- /.container -->
<script type="text/javascript">
var editor = CKEDITOR.replace( 'aciklama' );
</script>
<script type="text/javascript">
$(function() {
$(".silbuton").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
swal({
title: "Emin misiniz?",
text: "Bu kategori Silinecek",
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
url: "kategorisil.php",
data: info,
success: function(){
}
});
swal({
title: "Başarılı", 
text: "kategori Silindi", 
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

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap-tagsinput.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>



</html>