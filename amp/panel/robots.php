<?php session_start();
if (!isset($_SESSION['site_user'])){ header('location:giris.php'); exit(); } 
include('baglanti.php');
?>

<!DOCTYPE html>
<html lang="tr">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Robots.txt Düzenle</title>

	<link rel="stylesheet" href="css/bootstrap.css">

	<link rel="stylesheet" href="css/bootstrap-theme.css">

</head>



<body>


<?php include('menu.php'); ?>

    <div class="container-fuild">

      <div class="starter-template">
       

<div class="col-md-5 col-md-offset-3">
	   
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ROBOTS.TXT DOSYASI</h3>
  </div>
  <div class="panel-body">
    
	<?php

$sayfa="../robots.txt";


if(!empty($_POST['icerik']))
{
  $yazdir = file_put_contents($sayfa, $_POST['icerik']);
  if(!$yazdir)
    echo '<div class="alert alert-danger" role="alert">Yazdırılamadı!</div>';
  else
    echo '<div class="alert alert-success" role="alert">Başarıyla yazdırıldı</div>';
	$ref = $_SERVER['HTTP_REFERER'];
	echo '<meta http-equiv="refresh" content="1;URL='.$ref.'">';

  exit;
}	
?>
	
	<form class="form-group" method="post" action="">
	
<?php 
	
$icerik = file_get_contents($sayfa); 

echo '
<form action="" method="post" class="form-group">
<textarea class="form-control" rows="10" name="icerik">', $icerik, '</textarea>
<br />
<input type="submit" class="btn btn-block btn-success" value="Güncelle" />

</form>';

?>
  
</form>
	
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