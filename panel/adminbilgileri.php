<?php 
session_start();
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
<title>Yönetici Giriş Bilgileri</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
</head>
<body>
<?php include('menu.php'); ?>
<div class="container-fuild">
<div class="starter-template">
<?php
$query2 = $conn->query("select * from asistan");
$row2	    = $query2->fetch();
$id 		= $row2['id'];
$kullanicii	= $row2['site_user'];
$sifree		= base64_decode($row2['site_pass']);
?> 
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">YÖNETİCİ GİRİŞ BİLGİLERİ</h3>
</div>
<div class="panel-body">
<?php
if(@$_POST['guncelle']){
// KARAKTER DÜZENLE
$id				= htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$kullanici		= htmlspecialchars($_POST["kullanici"], ENT_QUOTES, 'utf-8');
$sifre			= base64_encode($_POST['sifre']);
if($kullanici==""||$sifre==""){
echo '<center><div class="alert alert-danger" role="alert">Boş alan bıraktınız!</div></center>'; 
}else{
$Guncel = $conn->prepare("update asistan set site_user=?, site_pass=? where id=?");
$Guncel->execute(array($kullanici, $sifre, $id));
echo '<center><div class="alert alert-success" role="alert">Bilgiler güncellendi!</div></center>';
$ref = htmlentities($_SERVER['HTTP_REFERER'],  ENT_QUOTES,  "utf-8");
echo '<meta http-equiv="refresh" content="1;URL='.$ref.'">';
}
}	
?>
<div class="table-responsive">
<form class="form-group" method="post" action="">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Kullanıcı Adı</div>
<input type="text" class="form-control" name="kullanici" value="<?php echo $kullanicii; ?>">
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Şifre</div>
<input type="password" class="form-control" name="sifre" value="<?php echo $sifree; ?>">
</div>
</div>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="submit" class="btn btn-block btn-success" name="guncelle" value="Güncelle">
</form>
</div>
</div>
</div>
</div>	
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>