<?php session_start();
if (!isset($_SESSION['site_user'])){ 
header('location:giris.php'); exit(); 
} 
include('baglanti.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>makaleler</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
<link rel="stylesheet" href="css/bootstrap-theme.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<link href="css/bootstrap-tagsinput.css" rel="stylesheet"/>
<link href="css/dist/lity.css" rel="stylesheet"/>
<script src="css/dist/vendor/jquery.js"></script>
<script src="css/dist/lity.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert.css">
<script src="sweetalert/sweetalert.min.js"></script>
<script src="https:http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https:http://code.jquery.com/ui/1.11.4/themes/ui-lightness/jquery-ui.css"/>
<script>
$(function(){
var $BaslikKontrol = $('#BaslikKontrol');
$BaslikKontrol.autocomplete({
source: 'blogAPI.php'
});
});
</script>
</head>
<body>
<?php include('menu.php'); ?>
<div class="container-fuild">
<div class="starter-template">
<div class="col-md-6 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">makaleler</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
<tr>
<th>Resim</th>	
<th>Bilgi</th>
<th>Başlık</th>
<th>İşlemler</th>
</tr>
</thead>
<tbody>	
<?php 
$verisayisi = count($conn->query("select * from blog where durum='Aktif'",PDO::FETCH_ASSOC)->fetchAll());
$gosterilecek = 50;
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
$query = $conn->query("select  * from blog where durum='Aktif' order by id desc limit $baslangic,$gosterilecek");
$count = $query->rowcount();
if ($count > 0){ 
while($row = $query->fetch()){
$id 	   = $row['id'];
$baslik    = $row['baslik'];
$resim	   = $row['resim'];
$tarih	   = $row['tarih'];
$yil	   = $row['yil'];
$hit	   = $row['hit'];
?>
<tr class="kayitlar">
<td class="cerceve">
<?php if($resim!=''){ ?>
<a href="../blogresim/<?php echo $resim; ?>" data-lity><img src="../blogresim/<?php echo $resim; ?>" class="resim"></a>
<?php }else{ ?>
<img src="../img/resimyok.jpg" class="resim">
<?php } ?>
</td>
<td><span style="color:grey;"><small><?php echo $tarih.'-'.$yil; ?><br/><?php echo $hit; ?> görüntüleme</small></span></td>
<td><?php echo $baslik; ?></td>		
<td><a href="blogduzenle.php?id=<?php echo $id; ?>" data-toggle="tooltip" data-placement="top" title="Düzenle" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a> 
<a href="#" title="Sil" data-toggle="tooltip" data-placement="top" class="btn btn-danger btn-xs silbuton" id="<?php echo $id; ?>" ><span class="glyphicon glyphicon-remove"></span></a></td>                                    
</tr>
<?php } ?>
<?php } else{ echo '<tr><td colspan="4"><div class="alert alert-warning" role="alert">Henüz makale eklenmemiş!</div></td></tr>'; ?>  <?php } ?>
</tbody>
</table>
</div>
</div>
<div class="panel-footer">
<nav aria-label="Page navigation">
<ul class="pagination pagination-sm">
<?php 
if($sayfa > 1){
echo '<li><a href="blog.php?sayfa=1">İlk</a></li>';
echo '<li><a title="önceki" href="blog.php?sayfa='.($sayfa-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
}
$ekgoster = 2;
for($i = $sayfa - $ekgoster; $i <= $sayfa + $ekgoster;$i++){
if($i > 0 && $i <= $sayfasayisi){
if($i == $sayfa){
echo '<li class="active"><a>'.$i.'</a></li>';
}else{
echo '<li><a href="blog.php?sayfa='.$i.'">'.$i.'</a></li>';
}
}
}
if($sayfa < $sayfasayisi){
echo '<li><a title="sonraki" href="blog.php?sayfa='.($sayfa+1).'"><span aria-label="Next">&raquo;</span></a></li>';
echo '<li><a href="blog.php?sayfa='.$sayfasayisi.'">Son</a></li>';
}
?>
</div>
</div>
</div>	
<div class="col-md-6 col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">MAKALE EKLE</h3>
</div>
<div class="panel-body">
<?php
if(@$_POST['kayit']){
$ref 		= htmlentities($_SERVER['HTTP_REFERER'],  ENT_QUOTES,  "utf-8");
include('fonksiyon.php');
include('etiketfonksiyonu.php');
$kategori	= htmlspecialchars($_POST["kategori"], ENT_QUOTES, 'utf-8');
$baslik		= addslashes($_POST['baslik']);
$aciklama	= $_POST['aciklama'];
$meta		= addslashes($_POST['meta']);
$anahtar	= htmlspecialchars($_POST["anahtar"], ENT_QUOTES, 'utf-8');
$odak_kelime= htmlspecialchars($_POST["odak_kelime"], ENT_QUOTES, 'utf-8');
$odak_link	= $_POST["odak_link"];
$seo		= strtolower(str_replace($tr,$en,$baslik));
$tarih		= date("m-d");
$saat		= date("H:i:s");
$yil		= date("Y");
$paylasim	= $_POST['paylasim'];
$zaman = date("Y-m-d H:i"); 
if( $paylasim > $zaman){
$durumhesapla = 'Cron';
}else{
$durumhesapla = 'Aktif';
}
$kaynak     = $_FILES["dosya"]["tmp_name"];
$dosyaadi   = $_FILES["dosya"]["name"];
$dosyatipi  = $_FILES["dosya"]["type"];
$dboyut     = $_FILES["dosya"]["size"];
if(strpos($dosyatipi,"JPEG") || strpos($dosyatipi,"PNG") || strpos($dosyatipi,"JPG") || strpos($dosyatipi,"GIF") || strpos($dosyatipi,"jpeg") || strpos($dosyatipi,"png") || strpos($dosyatipi,"jpg") || strpos($dosyatipi,"gif")) {
$uzanti        = explode(".", $dosyaadi);
$resimturu     = end($uzanti);
$yeniad        = $seo.'-'.date('YmdHis');
$yeniresimadi  = $yeniad.'.jpg';
move_uploaded_file($kaynak, "../blogresim/" . $yeniresimadi);
$location = $yeniresimadi;	
$Ekle = $conn->prepare("INSERT INTO blog (kategori, baslik, aciklama, resim, meta, anahtar, durum, odak_kelime,odak_link, seo, tarih, saat, yil, paylasim, hit)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 
$Ekle->execute(array( $kategori, $baslik, $aciklama, $location, $meta, $anahtar, $durumhesapla, $odak_kelime, $odak_link, $seo, $tarih, $saat, $yil, $paylasim, 0 ));
$SonID 	 = $conn->lastInsertId();
$Parcala = explode("," , $anahtar);
foreach ( $Parcala as $Yaz ){
$etiketim = trim($Yaz);
$seolarim = strtolower(trim(str_replace($etikettr,$etiketen,$etiketim)));
$EtiketEkle = $conn->prepare("INSERT INTO etiketler SET konu=?, baslik=?, seo=?");
$EtiketEkle->execute(array($SonID, $etiketim, $seolarim));
} 
echo '<center><div class="alert alert-success" role="alert">Makale eklendi!</div></center>';
echo '<meta http-equiv="refresh" content="1;URL='.$ref.'">';
}else{	
echo "<script type='text/javascript'>alert('Dosya formatı desteklenmiyor!');</script>";
echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';
}
}	
?>
<form class="form-group" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Başlık</div>
<input type="text" id="BaslikKontrol" class="form-control" name="baslik" placeholder="">
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">kategori</div>
<select class="form-control" name="kategori">
<option></option>
<?php $query = $conn->query("SELECT * FROM kategori ORDER BY baslik ASC");
while($row2 = $query->fetch()){  ?>
<option value="<?php echo $row2['id']; ?>"><?php echo $row2['baslik']; ?></option>
<?php } ?>
</select>
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
      <div class="input-group-addon">Odak Kelime</div>
      <input type="text" class="form-control" name="odak_kelime" autocomplete="on">
    </div>
  </div>
  
 <div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">Odak Link</div>
	  <select class="form-control" name="odak_link">
	  <option></option>
		  <?php $query = $conn->query("SELECT * FROM linkler ORDER BY baslik ASC");
		  while($row3 = $query->fetch()){  ?>
		  <option value="<?php echo $row3['id']; ?>"><?php echo $row3['baslik']; ?> - <?php echo $row3['url']; ?></option>
		  <?php } ?>
	  </select>
	</div>
	</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Resim</div>
<input type="file" id="dosya" name="dosya" class="btn btn-sm btn-default form-control"> 
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
<pre>Yayın Zamanını Ayarlayın</pre>  
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Paylaşım Zamanı</div>
<input type="text" class="form-control" name="paylasim" id="datetimepicker" autocomplete="off">
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
$(function() {
$(".silbuton").click(function(){
var element = $(this);
var del_id = element.attr("id");
var info = 'id=' + del_id;
swal({
title: "Emin misiniz?",
text: "Bu Yazı Silinecek",
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
url: "blogsil.php",
data: info,
success: function(){
}
});
swal({
title: "Başarılı", 
text: "Yazı Silindi", 
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
<script src="js/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
$('#datetimepicker').datetimepicker({
format:'Y-m-d H:i',
lang: 'tr',
minDate:0
});
</script>
<script src="js/bootstrap-tagsinput.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>