<?php session_start();
if (!isset($_SESSION['site_user'])){
header('location:giris.php'); exit(); 
} 
include('baglanti.php');
$id = htmlspecialchars($_GET["id"], ENT_QUOTES, 'utf-8');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Makale Düzenle</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<link href="css/bootstrap-tagsinput.css" rel="stylesheet"/>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('a[rel*=facebox]').facebox({
loadingImage : 'img/loading.gif',
closeImage   : 'img/closelabel.png'
})
})
</script>
</head>
<body>
<?php include('menu.php'); ?>
<div class="container-fuild">
<div class="starter-template">
<?php
$query = $conn->prepare("select * from blog where id = ?");
$query->execute(array($id));
$row = $query->fetch();
$id 		= $row['id'];
$kategori	= $row['kategori'];
$baslik 	= $row['baslik'];
$aciklama 	= $row['aciklama'];
$anahtar 	= $row['anahtar'];
$meta 		= $row['meta'];
$resim 		= $row['resim'];
$durum 		= $row['durum'];
$odak_kelime= $row['odak_kelime'];
$odak_link 	= $row['odak_link'];
$hit 		= $row['hit'];
$paylasim	= $row['paylasim'];
?>
<div class="col-md-8 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<a href="javascript:history.back(-1)" class="btn btn-xs btn-primary pull-left">&laquo; Geri</a>
<h3 class="panel-title"><?php echo $baslik; ?></h3>
</div>
<div class="panel-body">
<?php
if(@$_POST['guncelle']){
include('fonksiyon.php');
include('etiketfonksiyonu.php');
$id			= htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$kategori	= htmlspecialchars($_POST["kategori"], ENT_QUOTES, 'utf-8');
$baslik		= addslashes($_POST['baslik']);
$aciklama	= addslashes($_POST['aciklama']);
$meta		= addslashes($_POST['meta']);
$anahtar	= htmlspecialchars($_POST["anahtar"], ENT_QUOTES, 'utf-8');
$odak_kelime= htmlspecialchars($_POST["odak_kelime"], ENT_QUOTES, 'utf-8');
$odak_link	= htmlspecialchars($_POST["odak_link"], ENT_QUOTES, 'utf-8');
$seo		= strtolower(str_replace($tr,$en,$baslik));
$hit		= htmlspecialchars($_POST["hit"], ENT_QUOTES, 'utf-8');
$paylasim	= $_POST['paylasim'];
$zaman = date("Y-m-d H:i"); 
if( $paylasim > $zaman){
$durumhesapla = 'Cron';
}else{
$durumhesapla = 'Aktif';
}
if($baslik==""){
echo '<center><div class="alert alert-danger" role="alert">Başlık yazmadınız!</div></center>'; 
}else{
$up = $conn->prepare("update blog set baslik=?, kategori=?, aciklama=?, anahtar=?, durum=?, odak_kelime=?, odak_link=?, meta=?, seo=?, paylasim=?, hit=? where id=?");
$up->execute(array( $baslik, $kategori, $aciklama, $anahtar, $durumhesapla, $odak_kelime, $odak_link, $meta, $seo, $paylasim, $hit, $id ));
$Parcala = explode("," , $anahtar);
foreach ( $Parcala as $Yaz ){
$etiketim = trim($Yaz);
$seolarim = strtolower(trim(str_replace($etikettr,$etiketen,$etiketim)));
$Sor = $conn->prepare("SELECT * FROM etiketler WHERE konu=? AND baslik=?");	
$Sor->execute(array( $id, $etiketim ));
$count = $Sor->rowcount();
if ($count > 0){
$EtiketEkle = $conn->prepare("UPDATE etiketler SET baslik=? and seo=? WHERE konu=?");
$EtiketEkle->execute(array($etiketim, $seolarim, $id));
}else{
$EtiketEkle = $conn->prepare("INSERT INTO etiketler SET konu=?, baslik=?, seo=?");
$EtiketEkle->execute(array($id, $etiketim, $seolarim));
}
}
echo '<center><div class="alert alert-success" role="alert">Makale güncellendi!</div></center>';
echo '<meta http-equiv="refresh" content="1;URL=blog.php">';
}
}	
?>
<form class="form-group" method="post" action="" enctype="multipart/form-data">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Başlık</div>
<input type="text" class="form-control" name="baslik" value="<?php echo $baslik; ?>">
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">kategori</div>
<select class="form-control" name="kategori">
<option></option>
<?php $query = $conn->query("SELECT * FROM kategori ORDER BY baslik ASC");
while($row2 = $query->fetch()){  ?>
<option value="<?php echo $row2['id']; ?>" <?php if($row2['id']==$kategori){ ?>selected<?php } ?>><?php echo $row2['baslik']; ?></option>
<?php } ?>
</select>
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">İçerik</div>
<textarea class="form-control" name="aciklama" id="aciklama"><?php echo $aciklama; ?></textarea>
</div>
</div>
 <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Odak Kelime</div>
      <input type="text" class="form-control" name="odak_kelime" value="<?php echo $odak_kelime; ?>">
    </div>
  </div>
  
 <div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">Odak Link</div>
	  <select class="form-control" name="odak_link">
	  <option></option>
		  <?php $query = $conn->query("SELECT * FROM linkler ORDER BY baslik ASC");
		  while($row4 = $query->fetch()){  ?>
		  <option value="<?php echo $row4['id']; ?>" <?php if($row4['id']==$odak_link){ ?>selected<?php } ?>><?php echo $row4['baslik']; ?> - <?php echo $row4['url']; ?></option>
		  <?php } ?>
	  </select>
	</div>
	</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Meta Açıklama</div>
<textarea class="form-control" name="meta" rows="3"><?php echo $meta; ?></textarea>
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Anahtar Kelimeler</div>
<input type="text" class="form-control" name="anahtar" data-role="tagsinput" value="<?php echo $anahtar; ?>">
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Paylaşım Zamanı</div>
<input type="text" class="form-control" name="paylasim" value="<?php echo $paylasim; ?>" id="datetimepicker" autocomplete="off">
</div>
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="hit" value="<?php echo $hit; ?>">
<input type="submit" class="btn btn-block btn-success" name="guncelle" value="Güncelle">
</form>
</div>
</div>
</div>	
<div class="col-md-4 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">RESİM</h3>
</div>
<div class="panel-body">
<div class="form-group">
<center>
<img src="../blogresim/<?php echo $resim; ?>" class="img-rounded img-responsive" width="300px">
<br/><br/>
<a rel="facebox" class="btn btn-block btn-primary" href="blogresimguncelle.php?id=<?php echo $id ?>">Resmi Değiştir</a>
</center>
</div>
</div>
</div>
</div>
</div>
</div>
</div><!-- /.container -->
<script type="text/javascript">
var editor = CKEDITOR.replace( 'aciklama' );
</script>
<script>
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})
</script>
<script src="js/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">
$('#datetimepicker').datetimepicker({
format:'Y-m-d H:i',
lang: 'tr',
minDate:0
});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap-tagsinput.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>