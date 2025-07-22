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
    <title>Site Bilgileri</title>
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
    <h3 class="panel-title">SİTE BİLGİLERİ</h3>
  </div>
  <div class="panel-body">
    
<?php
if(@$_POST['guncelle']){
$id				= htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$siteadi		= addslashes($_POST['siteadi']);
$meta			= addslashes($_POST['meta']);
$logoyazi		= addslashes($_POST['logoyazi']);
$anahtar		= addslashes($_POST['anahtar']);
$telefon		= addslashes($_POST['telefon']);
$siteurl		= addslashes($_POST['siteurl']);
$ampurl			= addslashes($_POST['ampurl']);
$telefonyazi	= addslashes($_POST['telefonyazi']);
$mapsapi		= addslashes($_POST['mapsapi']);
$analytics		= addslashes($_POST['analytics']);
$anasayfa		= addslashes($_POST['anasayfa']);
$copyright		= addslashes($_POST['copyright']);
$yanpanel		= addslashes($_POST['yanpanel']);
$yanpanelbaslik	= addslashes($_POST['yanpanelbaslik']);
$ustalanyazisi	= addslashes($_POST['ustalanyazisi']);
$head			= addslashes($_POST['head']);
$footer			= addslashes($_POST['footer']);

if($siteadi==""||$meta==""||$anahtar==""||$logoyazi==""){

echo '<center><div class="alert alert-danger" role="alert"><strong>(*) Gerekli alanları boş bıraktınız!</strong></div></center>'; 
}else{

$conn->query("update ayarlar set siteadi='$siteadi', logoyazi='$logoyazi', meta='$meta', anahtar='$anahtar', telefon='$telefon', siteurl='$siteurl', ampurl='$ampurl', telefonyazi='$telefonyazi', mapsapi='$mapsapi', analytics='$analytics', anasayfa='$anasayfa', yanpanel='$yanpanel', copyright='$copyright', yanpanelbaslik='$yanpanelbaslik', ustalanyazisi='$ustalanyazisi', head='$head', footer='$footer' where id='$id'");

echo '<center><div class="alert alert-success" role="alert"><strong>Bilgiler güncellendi!</strong></div></center>';
echo '<meta http-equiv="refresh" content="2;URL=sitebilgileri.php">';
}
}	
?>
 

	
<?php
	$query2 	= $conn->query("select * from ayarlar");
	$icerikCek  = $query2->fetch();

?> 	
	<form class="form-group" method="post" action="">
<div class="row">	
	<div class="col-md-6">
	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Site URL *</div>
      <input type="text" class="form-control" name="siteurl" value="<?php echo $icerikCek['siteurl']; ?>">
    </div>
  </div>
  </div>
  
  <div class="col-md-6">
	<div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">AMP URL *</div>
      <input type="text" class="form-control" name="ampurl" value="<?php echo $icerikCek['ampurl']; ?>">
    </div>
  </div>
  </div>
	
	<div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Logo Yazısı *</div>
      <input type="text" class="form-control" name="logoyazi" value="<?php echo $icerikCek['logoyazi']; ?>">
    </div>
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Site Başlığı *</div>
      <input class="form-control" name="siteadi" value="<?php echo $icerikCek['siteadi']; ?>">
    </div>
  </div>
  </div>
  </div>
  
   <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Anahtar Keliemler *</div>
      <input type="text" class="form-control" name="anahtar" data-role="tagsinput" value="<?php echo $icerikCek['anahtar']; ?>">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Meta Açıklama *</div>
	  <textarea class="form-control" name="meta" rows="3"><?php echo $icerikCek['meta']; ?></textarea>
    </div>
  </div>
 <div class="row">	 
   <div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">İletişim Link</div>
      <input type="text" class="form-control" name="telefon" value="<?php echo $icerikCek['telefon']; ?>">
    </div>
  </div>
  </div>
  
   <div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">İletişim Link Yazısı</div>
      <input type="text" class="form-control" name="telefonyazi" value="<?php echo $icerikCek['telefonyazi']; ?>">
    </div>
  </div>
  </div>

  <div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Google Map API</div>
      <input type="text" class="form-control" name="mapsapi" value="<?php echo $icerikCek['mapsapi']; ?>">
    </div>
  </div>
  </div>
  
  <div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Google Analytics API</div>
      <input type="text" class="form-control" name="analytics" value="<?php echo $icerikCek['analytics']; ?>">
    </div>
  </div>
  </div>
  
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Copyright</div>
      <input type="text" class="form-control" name="copyright" value="<?php echo $icerikCek['copyright']; ?>">
    </div>
  </div>
  
  
  
   <h4 class="bg-success">anasayfa ÜST ALAN</h4>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"></div>
      <textarea class="form-control" name="ustalanyazisi" id="ustalanyazisi"><?php echo $icerikCek['ustalanyazisi']; ?></textarea>
    </div>
  </div>
  
   <h4 class="bg-success">YAN PANEL BİLGİ</h4>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Başlık</div>
      <input type="text" class="form-control" name="yanpanelbaslik" value="<?php echo $icerikCek['yanpanelbaslik']; ?>">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"></div>
      <textarea class="form-control" name="yanpanel" id="yanpanel"><?php echo $icerikCek['yanpanel']; ?></textarea>
    </div>
  </div>
  
  <h4 class="bg-success">ALT BİLGİ</h4>
  
    
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"></div>
      <textarea class="form-control" name="anasayfa" id="aciklama"><?php echo $icerikCek['anasayfa']; ?></textarea>
    </div>
  </div>   
  
  <h4 class="bg-success">KAYNAK KODU EK KODLAR</h4>
  

  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"><code>< head ><br><br>< / head ></code></div>
      <textarea class="form-control" name="head" rows="10"><?php echo $icerikCek['head']; ?></textarea>
    </div>
  </div>

  

  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon"><code>< body ><br><br>< / body ></code></div>
      <textarea class="form-control" name="footer" rows="10"><?php echo $icerikCek['footer']; ?></textarea>
    </div>
  </div>

 
  
  <input type="hidden" name="id" value="<?php echo $icerikCek['id']; ?>">
  <input type="submit" class="btn btn-block btn-success" name="guncelle" value="Güncelle">

</form>
	

	
  </div>
</div>

</div>	




<div class="col-md-4 col-sm-12">

 
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">SİTE GÖRÜNÜM AYARI</h3>
  </div>
  <div class="panel-body">

<?php
if(@$_POST['renkayarla']){
$id					= $_POST['id'];
$renk_arka			= $_POST['renk_arka'];
$renk_headerarka	= $_POST['renk_headerarka'];
$renk_headeryazi	= $_POST['renk_headeryazi'];
$renk_paketbaslik	= $_POST['renk_paketbaslik'];
$renk_paketyazi		= $_POST['renk_paketyazi'];

$Guncel = $conn->prepare("update ayarlar set renk_arka=?, renk_headerarka=?, renk_headeryazi=?, renk_paketbaslik=?, renk_paketyazi=? where id=?");


$Guncel->execute(array( $renk_arka, $renk_headerarka, $renk_headeryazi, $renk_paketbaslik, $renk_paketyazi, $id ));


echo '<center><div class="alert alert-success" role="alert"><strong>Yapı güncellendi!</strong></div></center>';
echo '<meta http-equiv="refresh" content="2;URL=sitebilgileri.php">';

}	
?>  

 <form class="form-group" method="post" action=""> 
 
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Site Arkaplan</div>
      <input type="color" class="form-control" name="renk_arka" title="<?php echo $icerikCek['renk_arka']; ?>" value="<?php echo $icerikCek['renk_arka']; ?>">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Başlık Arkaplan</div>
      <input type="color" class="form-control" name="renk_headerarka" title="<?php echo $icerikCek['renk_headerarka']; ?>" value="<?php echo $icerikCek['renk_headerarka']; ?>">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Başlık Yazı</div>
      <input type="color" class="form-control" name="renk_headeryazi" title="<?php echo $icerikCek['renk_headeryazi']; ?>" value="<?php echo $icerikCek['renk_headeryazi']; ?>">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Paket Başlık</div>
      <input type="color" class="form-control" name="renk_paketbaslik" title="<?php echo $icerikCek['renk_paketbaslik']; ?>" value="<?php echo $icerikCek['renk_paketbaslik']; ?>">
    </div>
  </div>
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Paket Yazı</div>
      <input type="color" class="form-control" name="renk_paketyazi" title="<?php echo $icerikCek['renk_paketyazi']; ?>" value="<?php echo $icerikCek['renk_paketyazi']; ?>">
    </div>
  </div>
  
  <input type="hidden" name="id" value="<?php echo $icerikCek['id']; ?>">
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