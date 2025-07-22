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
    <title>Linkler</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="sweetalert/sweetalert.css">
	<script src="sweetalert/sweetalert.min.js"></script>

</head>



<body>

<?php include('menu.php'); ?>

    <div class="container-fuild">

      <div class="starter-template">
       

<div class="col-md-8 col-sm-12">
	   
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">LİNKLER</h3>
  </div>
  <div class="panel-body">
    
	<div class="table-responsive">
	<table class="table table-bordered table-hover">
 
		<thead>
		<tr>
			<th>#</th>
			<th>Detay</th>
			<th>İşlem</th>
		</tr>
       </thead>
	   
		<tbody>	
		<?php 
		$query = $conn->query("select * from linkler order by id desc");
		$count = $query->rowcount();
		if ($count > 0){ 
		while($row  = $query->fetch()){
		$id 		= $row['id'];
		$baslik 	= $row['baslik'];
		$url 	= $row['url'];
		?>
			<tr class="kayitlar">
				<th scope="row"><?php echo $id; ?></th>
				<td><?php echo $baslik; ?><br><?php echo $url; ?></td>	
				
				<td><a href="linkduzenle.php?id=<?php echo $id; ?>" data-toggle="tooltip" data-placement="top" title="Düzenle" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a> 
				
				<a href="#" title="Sil" data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-xs silbuton" id="<?php echo $id; ?>" ><span class="glyphicon glyphicon-remove"></span></a></td>                                    
			</tr>
		<?php } ?>
		<?php } else{ echo '<tr><td colspan="3"><div class="alert alert-warning" role="alert">Bağlantı eklenmemiş!</div></td></tr>'; ?>  <?php } ?>
		</tbody>

 
	</table>
	</div>
	
  </div>
</div>

</div>	



<div class="col-md-4 col-sm-12">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">YENİ EKLE</h3>
  </div>
  <div class="panel-body">
   
<?php
if(@$_POST['kayit']){
$baslik	= htmlspecialchars($_POST["baslik"], ENT_QUOTES, 'utf-8');
$url	= htmlspecialchars($_POST["url"], ENT_QUOTES, 'utf-8');

if($baslik==""){

echo '<center><div class="alert alert-danger" role="alert">Başlık yazmadınız!</div></center>'; 
}else{

$Ekle = $conn->prepare("insert into linkler (baslik,url) values (?, ?)");
$Ekle->execute(array( $baslik, $url ));
echo '<center><div class="alert alert-success" role="alert">Bağlantı eklendi!</div></center>';
$ref = htmlentities($_SERVER['HTTP_REFERER'],  ENT_QUOTES,  "utf-8");
echo '<meta http-equiv="refresh" content="1;URL='.$ref.'">';
}
}	
?>
   
	<div class="table-responsive">
	
	<form class="form-group" method="post" action="">
	
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Başlık</div>
      <input type="text" class="form-control" name="baslik" placeholder="">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Link</div>
      <input type="text" class="form-control" name="url" placeholder="http:// eklemeyin!">
    </div>
  </div>


  <input type="submit" class="btn btn-block btn-success" name="kayit" value="Ekle">
  
</form>
	
	</div>
	
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
text: "Bu Bağlantı Silinecek",
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
url: "linksil.php",
data: info,
success: function(){
}
});
swal({
title: "Başarılı", 
text: "Bağlantı Silindi", 
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
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('.btn-default').tooltip({trigger: "click"}); 

});
</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>



</html>