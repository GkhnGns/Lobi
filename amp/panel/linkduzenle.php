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

    <title>Link Düzenle</title>

	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/bootstrap-theme.css">

</head>



<body>


<?php include('menu.php'); ?>

    <div class="container-fuild">

      <div class="starter-template">
       
<?php
	$query = $conn->prepare("select * from linkler where id = ?");
	$query->execute(array($id));
	$row = $query->fetch();
	$id = $row['id'];
	$baslik = $row['baslik'];
	$url = $row['url'];
	?> 
<div class="col-md-5 col-md-offset-3">
	   
<div class="panel panel-default">
  <div class="panel-heading">
  <a href="javascript:history.back(-1)" class="btn btn-xs btn-primary pull-left">&laquo; Geri</a>
    <h3 class="panel-title"><?php echo $baslik; ?></h3>
  </div>
  <div class="panel-body">
    
	<?php
if(@$_POST['guncelle']){
$id		= htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$baslik	= htmlspecialchars($_POST["baslik"], ENT_QUOTES, 'utf-8');
$url	= htmlspecialchars($_POST["url"], ENT_QUOTES, 'utf-8');

if($url==""){

echo '<center><div class="alert alert-danger" role="alert">Link yazmadınız!</div></center>'; 
}else{

$Guncel = $conn->prepare("update linkler set baslik=?, url=? where id=?");
$Guncel->execute(array( $baslik, $url, $id ));

echo '<center><div class="alert alert-success" role="alert">Bağlantı güncellendi!</div></center>';
echo '<meta http-equiv="refresh" content="1;URL=linkler.php">';
}
}	
?>
 

	<div class="table-responsive">
	
	<form class="form-group" method="post" action="">
	
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Başlık</div>
      <input type="text" class="form-control" name="baslik" value="<?php echo $baslik; ?>">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Link</div>
      <input type="text" class="form-control" name="url" value="<?php echo $url; ?>">
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

    </div><!-- /.container -->




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>



</html>