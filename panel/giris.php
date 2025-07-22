<?php session_start();
if (isset($_SESSION['site_user'])){
header('location:index.php'); exit();
} 
include('baglanti.php');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Yönetici Girişi</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
</head>
<body style="background-color:#222222">
<div class="container">
<div class="starter-template"> 
<div class="col-md-4 col-md-offset-4">
<div class="panel panel-primary" style="box-shadow:0px 1px 5px #000;">
<div class="panel-heading">
<h3 class="panel-title">YÖNETİCİ GİRİŞİ</h3>
</div>
<div class="panel-body">
<form class="form-group" method="post" action="">
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Kullanıcı Adı</div>
<input type="text" class="form-control" name="kullanici" placeholder="">
</div>
</div>
<div class="form-group">
<div class="input-group">
<div class="input-group-addon">Şifre</div>
<input type="password" class="form-control" name="sifre" placeholder="">
</div>
</div>
<input type="submit" class="btn btn-block btn-primary" name="giriskontrol" value="Giriş">
</form>
<?php
if (isset($_POST['giriskontrol'])) {
$kullanici	   = htmlspecialchars($_POST["kullanici"], ENT_QUOTES, 'utf-8');
$sifre 		   = base64_encode($_POST['sifre']);
$_SESSION["kadi"]  = $kullanici;	
if($kullanici==""||$sifre==""){
echo '<center><div class="alert alert-warning" role="alert"><strong>Alanları boş geçemezsiniz !</strong></div></center>'; 
}else{
$query = $conn->query("select * from asistan where site_user='$kullanici' and site_pass='$sifre'");
$count = $query->rowcount();
$row = $query->fetch();
if ($count > 0){
$_SESSION['site_user']   = $row['site_user'];
echo '<center><div class="alert alert-success" role="alert"><strong>Giriş yapıldı...</strong></div></center>';
echo '<meta http-equiv="refresh" content="2;URL=index.php">';
}else{
echo '<center><div class="alert alert-danger" role="alert"><strong>Girdiğiniz bilgiler hatalı !</strong></div></center>';
}
}
}
?>
</div>
<div class="panel-footer"><kbd><?php echo htmlspecialchars($_SERVER["HTTP_HOST"], ENT_QUOTES, 'utf-8'); ?></kbd></div>
</div>
</div>
</div>
</div><!-- /.container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>