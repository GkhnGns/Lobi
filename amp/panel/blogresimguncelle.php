<?php session_start();
if (!isset($_SESSION['site_user'])){ header('location:giris.php'); exit(); } 
include('baglanti.php');
$id	   = htmlspecialchars($_GET["id"], ENT_QUOTES, 'utf-8');
$query = $conn->prepare("SELECT * FROM blog where id=?");
$query->execute(array($id));
while($row = $query->fetch()){
$id		= $row['id'];
$resim	= $row['resim'];
}
?>
<link href="src/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<center><img src="../blogresim/<?php echo $resim; ?>" width="220px" class="img-responsive thumbnail">
<form action="resimkaydet.php" method="post" enctype="multipart/form-data">
<br><center>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<p><small>Resmi değiştirmek için yeni bir dosya seçin</small></p>
<input type="file" class="btn btn-primary btn-sm" name="dosya"><br>
<input type="submit" class="btn btn-success btn-block" name="blogresim" value="Güncelle">
</center>
</form>
