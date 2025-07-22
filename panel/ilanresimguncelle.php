<?php session_start();
if (!isset($_SESSION['site_user'])){
header('location:giris.php');
} 
include('baglanti.php');
$id	   = htmlspecialchars($_GET["id"], ENT_QUOTES, 'utf-8');
$query = $conn->prepare("SELECT * FROM uyeler WHERE id=?");
$query->execute(array($id));
while($row = $query->fetch()){
$id		= $row['id'];
$seo	= $row['seo'];
$resim	= $row['resim'];
}
?>
<link href="src/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<center>
<?php if($resim !== NULL){ ?>
<img src="../modelresim/<?php echo $resim; ?>" width="220px" class="img-responsive thumbnail">
<?php }else{ ?>
<img src="img/resimsiz.png" class="img-rounded img-responsive" width="220px" >
<?php } ?>
<form action="resimkaydet.php" method="post" enctype="multipart/form-data">
<br><center>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="seo" value="<?php echo $seo; ?>">
<p><small>Resmi değiştirmek için yeni bir dosya seçin</small></p>
<input type="file" class="btn btn-primary btn-sm" name="dosya"><br>
<input type="submit" class="btn btn-success btn-xs" name="ilanresim" value="Güncelle">
</center>
</form>