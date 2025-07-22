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
<title>AMP Ayarları</title>
<link rel="stylesheet" href="css/bootstrap.css">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<link rel="stylesheet" href="css/bootstrap-theme.css">
<script src="js/jquery.js" type="text/javascript"></script>
<link href="css/bootstrap-tagsinput.css" rel="stylesheet"/>
</head>
<body>
<?php include('menu.php'); ?>
<div class="container-fuild">
<div class="starter-template">
<div class="col-md-8 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">AMP AYARLARI</h3>
</div>
<div class="panel-body">
<?php
if(isset($_POST['guncelle'])){
$id				= htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$baslik			= addslashes($_POST['baslik']);
$domain			= addslashes($_POST['domain']);
$sub			= addslashes($_POST['sub']);
$iletisim		= addslashes($_POST['iletisim']);

$Guncelle = $conn->prepare("UPDATE ampayar SET amp_baslik = ? , amp_domain = ? , amp_sub = ? , amp_iletisim = ?  WHERE amp_id =? ");
$Guncelle->execute(array($baslik, $domain, $sub, $iletisim, $id));
echo '<center><div class="alert alert-success" role="alert"><strong>Bilgiler güncellendi!</strong></div></center>';
echo '<meta http-equiv="refresh" content="1;URL=ampayar.php">';
}	
?>
<?php
$query2 	= $conn->query("select * from ampayar");
$icerikCek  = $query2->fetch();
?> 	
<form class="form-group" method="post" action="">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Logo Yazı</div>
<input type="text" class="form-control" name="baslik" value="<?php echo $icerikCek['amp_baslik']; ?>">
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Domain</div>
<input type="text" class="form-control" name="domain" placeholder="örnek: <?php echo $_SERVER['HTTP_HOST']; ?>" value="<?php echo $icerikCek['amp_domain']; ?>">
</div>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Sub Domain</div>
<input type="text" class="form-control" name="sub" placeholder="örnek: xyz" value="<?php echo $icerikCek['amp_sub']; ?>">
</div>
</div>
</div>
<div class="col-md-8">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">İletişim Link</div>
<input type="text" class="form-control" name="iletisim" value="<?php echo $icerikCek['amp_iletisim']; ?>">
</div>
</div>
</div>
</div>
<input type="hidden" name="id" value="<?php echo $icerikCek['amp_id']; ?>">
<input type="submit" class="btn btn-block btn-success" name="guncelle" value="Güncelle">
</form>
</div>
</div>
</div>	
<div class="col-md-4 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">AMP GÖRÜNÜM AYARI</h3>
</div>
<div class="panel-body">
<?php
if(@$_POST['renkayarla']){
$id					= $_POST['id'];
$renk_baslikarka	= $_POST['renk_baslikarka'];
$renk_baslikyazi	= $_POST['renk_baslikyazi'];
$renk_headerarka	= $_POST['renk_headerarka'];
$renk_headeryazi	= $_POST['renk_headeryazi'];
$renk_ilanarkarenk	= $_POST['renk_ilanarkarenk'];
$renk_ilanyazirenk	= $_POST['renk_ilanyazirenk'];
$Guncelle = $conn->prepare("UPDATE ampayar SET amp_baslikarkarenk = ? , amp_baslikyazirenk = ? , amp_headerarkarenk = ? , amp_headeryazirenk = ? , amp_ilanarkarenk = ? , amp_ilanyazirenk = ? WHERE amp_id = ? ");
$Guncelle->execute(array( $renk_baslikarka, $renk_baslikyazi, $renk_headerarka, $renk_headeryazi, $renk_ilanarkarenk, $renk_ilanyazirenk,  $id ));
echo '<center><div class="alert alert-success" role="alert"><strong>Yapı güncellendi!</strong></div></center>';
echo '<meta http-equiv="refresh" content="1;URL=ampayar.php">';
}	
?>  
<form class="form-group" method="post" action=""> 
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Üst Arkaplan</div>
<input type="color" class="form-control" name="renk_headerarka" title="<?php echo $icerikCek['amp_headerarkarenk']; ?>" value="<?php echo $icerikCek['amp_headerarkarenk']; ?>">
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Üst Yazı</div>
<input type="color" class="form-control" name="renk_headeryazi" title="<?php echo $icerikCek['amp_headeryazirenk']; ?>" value="<?php echo $icerikCek['amp_headeryazirenk']; ?>">
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Başlık Arkaplan</div>
<input type="color" class="form-control" name="renk_baslikarka" title="<?php echo $icerikCek['amp_baslikarkarenk']; ?>" value="<?php echo $icerikCek['amp_baslikarkarenk']; ?>">
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Başlık Yazı</div>
<input type="color" class="form-control" name="renk_baslikyazi" title="<?php echo $icerikCek['amp_baslikyazirenk']; ?>" value="<?php echo $icerikCek['amp_baslikyazirenk']; ?>">
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Paket Başlık Arkaplan</div>
<input type="color" class="form-control" name="renk_ilanarkarenk" title="<?php echo $icerikCek['amp_ilanarkarenk']; ?>" value="<?php echo $icerikCek['amp_ilanarkarenk']; ?>">
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Paket Başlık Yazı</div>
<input type="color" class="form-control" name="renk_ilanyazirenk" title="<?php echo $icerikCek['amp_ilanyazirenk']; ?>" value="<?php echo $icerikCek['amp_ilanyazirenk']; ?>">
</div>
</div>

<input type="hidden" name="id" value="<?php echo $icerikCek['amp_id']; ?>">
<input type="submit" class="btn btn-block btn-success" name="renkayarla" value="Yapıyı Değiştir">
</form>
</div>
</div> 
</div>
</div>
</div>
</div><!-- /.container -->
<script type="text/javascript">
var editor = CKEDITOR.replace( 'aciklama' );
var editor = CKEDITOR.replace( 'yanpanel' );
var editor = CKEDITOR.replace( 'ustalanyazisi' );
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap-tagsinput.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>