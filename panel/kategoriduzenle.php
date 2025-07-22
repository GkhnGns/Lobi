<?php session_start();
if (!isset($_SESSION['site_user'])){ header('location:giris.php'); exit(); } 
include('baglanti.php');
$id = htmlspecialchars($_GET["id"], ENT_QUOTES, 'utf-8');
?>

<!DOCTYPE html>
<html lang="tr">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>kategori Düzenle</title>
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet"/>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
</head>



<body>


<?php include('menu.php'); ?>

    <div class="container-fuild">

      <div class="starter-template">
       
<?php
	$query = $conn->prepare("select * from kategori where id = ?");
	$query->execute(array($id));
	$row = $query->fetch();
	?> 
<div class="col-md-6 col-md-offset-3 col-sm-12">
	   
<div class="panel panel-default">
  <div class="panel-heading">
  <a href="javascript:history.back(-1)" class="btn btn-xs btn-primary pull-left">&laquo; Geri</a>
    <h3 class="panel-title"><?php echo $row['baslik']; ?></h3>
  </div>
  <div class="panel-body">
    
	<?php
if(@$_POST['guncelle']){
include('fonksiyon.php');
$id			= htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$baslik		= htmlspecialchars($_POST["baslik"], ENT_QUOTES, 'utf-8');
$odak		= htmlspecialchars($_POST["odak"], ENT_QUOTES, 'utf-8');
$meta		= addslashes($_POST['meta']);
$aciklama	= addslashes($_POST['aciklama']);
$anahtar	= htmlspecialchars($_POST["anahtar"], ENT_QUOTES, 'utf-8');
$seo		= strtolower(str_replace($tr,$en,$baslik));

if($baslik==""){

echo '<center><div class="alert alert-danger" role="alert">Başlık yazmadınız!</div></center>'; 
}else{

$Guncel = $conn->prepare("update kategori set baslik=?, odak=?, meta=?, anahtar=?, aciklama=?, seo=? where id=?");
$Guncel->execute(array( $baslik, $odak, $meta, $anahtar, $aciklama, $seo, $id ));
echo '<center><div class="alert alert-success" role="alert">kategori güncellendi!</div></center>';
echo '<meta http-equiv="refresh" content="1;URL=kategoriler.php">';
}
}	
?>
	<form class="form-group" method="post" action="">
	
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Başlık</div>
      <input type="text" class="form-control" name="baslik" value="<?php echo $row['baslik']; ?>">
    </div>
  </div>
  
   <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Şehir+Semt</div>
      <input type="text" class="form-control" name="odak" value="<?php echo $row['odak']; ?>" placeholder="Örnek: İstanbul+Şişli">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">İçerik</div>
      <textarea class="form-control" name="aciklama" id="aciklama"><?php echo $row['aciklama']; ?></textarea>
    </div>
  </div>
  
   <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Meta Açıklama</div>
      <textarea class="form-control" name="meta" rows="3"><?php echo $row['meta']; ?></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Anahtar Kelimeler</div>
      <input type="text" class="form-control" name="anahtar" data-role="tagsinput" value="<?php echo $row['anahtar']; ?>">
    </div>
  </div>
  
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
  <input type="submit" class="btn btn-block btn-success" name="guncelle" value="Güncelle">
  
</form>
	
  </div>
</div>

</div>	


</div>
   
	   
      </div>

    </div><!-- /.container -->

<script type="text/javascript">
var editor = CKEDITOR.replace( 'aciklama' );
</script>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap-tagsinput.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>



</html>