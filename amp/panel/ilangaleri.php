<?php session_start();
if (!isset($_SESSION['site_user'])){
header('location:giris.php'); exit();
} 
include('baglanti.php');
$id	= htmlspecialchars($_GET["id"], ENT_QUOTES, 'utf-8');
$query   = $conn->prepare("SELECT * FROM uyeler WHERE id=?");
$query->execute(array($id));
$row	 = $query->fetch();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>İlan Galeri</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="css/dist/lity.css" rel="stylesheet"/>
<script src="css/dist/vendor/jquery.js"></script>
<script src="css/dist/lity.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert.css">
<script src="sweetalert/sweetalert.min.js"></script>
</head>
<body>
<?php include('menu.php'); ?>
<div class="container-fuild">
<div class="starter-template">
<div class="col-md-4 col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">RESİM EKLE</h3>
</div>
<div class="panel-body">
<div class="alert alert-default" role="alert"><small>Klavyenizin <span class="label label-default">CTRL</span> tuşuna basılı tutarak birden fazla fotoğraf seçimi yapabilirsiniz (Bir defada en fazla 20 adet dosya destekler)</small>
</div>
<form class="form-group" method="post" action="resimkaydet.php" enctype="multipart/form-data">
<div class="form-group">
<center>
<div class="input-group">     
<input class="btn btn-sm btn-info" type="file" class="form-control" id="dosya[]" name="dosya[]"  multiple="multiple"/>
</div></center>
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="seo" value="<?php echo $row['seo']; ?>">
<input type="submit" class="btn btn-xs btn-success" name="ilangaleriresim" value="Yükle">
</form>
</div>
</div>
</div>
<div class="col-md-8 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<a href="javascript:history.back(-1)" class="btn btn-xs btn-primary pull-left">&laquo; Geri</a>
<h3 class="panel-title">
<?php echo $row['isim']; ?> >> Galeri</h3>
</div>
<div class="panel-body">
<div class="galeri">
<?php 
$query = $conn->prepare("SELECT * FROM resimler WHERE uye_id=? ORDER BY id DESC");
$query->execute(array($id));
$count = $query->rowcount();
if ($count > 0){ 
while($row = $query->fetch()){
$uid 	   = $row['id'];
$uye_id    = $row['uye_id'];
$resim	   = $row['resim'];
?>
<div class="col-sm-6 col-md-3 col-xs-12 phpscriptsatis">
<div class="thumbnail">
<a href="../modelresim/<?php echo $resim; ?>" data-lity><img src="../modelresim/<?php echo $resim; ?>" class="img-thumbnail" style="height:120px;"></a>
<div class="caption">
<p><a href="#" title="Sil" data-toggle="tooltip" data-placement="bottom" class="btn btn-danger btn-xs silbuton" id="<?php echo $uid; ?>" ><span class="glyphicon glyphicon-remove"></span></a></p>
</div>
</div>
</div>
<?php }  } else{ echo '<div class="alert alert-warning" role="alert"><strong>Henüz fotoğraf eklenmemiş !</strong></div>'; ?>  
<?php } ?>
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
text: "Bu Resim Silinecek",
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
url: "ilangaleriresimsil.php",
data: info,
success: function(){
}
});
swal({
title: "Başarılı", 
text: "Resim Silindi", 
type: "success",
timer: 1000},
function(){ 
location.reload();
}
);
$(this).parents(".phpscriptsatis").animate({ backgroundColor: "#000" }, "fast")
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
<script src="js/bootstrap.js"></script>
</body>
</html>