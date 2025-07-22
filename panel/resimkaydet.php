<?php session_start();
if (!isset($_SESSION['site_user'])){
header('location:giris.php'); exit();
} 
include('baglanti.php');

$ref = htmlentities($_SERVER['HTTP_REFERER'],  ENT_QUOTES,  "utf-8");

// İlan Resim
if ( isset($_POST['ilanresim']) ){
include('fonksiyon.php');
$uid	  = htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$seo	  = htmlspecialchars($_POST["seo"], ENT_QUOTES, 'utf-8');

$dosyatipi     = $_FILES["dosya"]["type"];
if(strpos($dosyatipi,"JPEG") || strpos($dosyatipi,"PNG") || strpos($dosyatipi,"JPG") || strpos($dosyatipi,"GIF") || strpos($dosyatipi,"jpeg") || strpos($dosyatipi,"png") || strpos($dosyatipi,"jpg") || strpos($dosyatipi,"gif")) {

$kaynak     = $_FILES["dosya"]["tmp_name"];
$dosyaadi   = $_FILES["dosya"]["name"];
$dboyut     = $_FILES["dosya"]["size"];

$uzanti        = explode(".", $dosyaadi);
$resimturu     = end($uzanti);
$yeniad        = $seo.'-'.date('YmdHis');
$yeniresimadi  = $yeniad.'.'.$resimturu;
 
move_uploaded_file($kaynak, "../modelresim/" . $yeniresimadi);
$location = $yeniresimadi;	

$Guncel = $conn->prepare("UPDATE uyeler SET resim=? WHERE id=?");
$Guncel->execute(array($location,$uid));

echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';

}else{	
echo "<script type='text/javascript'>alert('Dosya formatı desteklenmiyor!');</script>";
echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';
}

}

// İlan Galeri Resim
if ( isset($_POST['ilangaleriresim']) ){
$ilanid     = htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$ilanseo    = htmlspecialchars($_POST["seo"], ENT_QUOTES, 'utf-8');
$dosya_sayi=count($_FILES['dosya']['name']); 
	for($i=0;$i<$dosya_sayi;$i++){ 
$dosyatipi     = $_FILES["dosya"]["type"][$i];
if(strpos($dosyatipi,"JPEG") || strpos($dosyatipi,"PNG") || strpos($dosyatipi,"JPG") || strpos($dosyatipi,"GIF") || strpos($dosyatipi,"jpeg") || strpos($dosyatipi,"png") || strpos($dosyatipi,"jpg") || strpos($dosyatipi,"gif")) {	
		if(!empty($_FILES['dosya']['name'][$i])){ 
$kaynak    	   = $_FILES["dosya"]["tmp_name"][$i];
$dosyaadi      = $_FILES["dosya"]["name"][$i];
$dboyut    	   = $_FILES["dosya"]["size"];
$uzanti        = explode(".", $dosyaadi);
$resimturu     = end($uzanti);
$yeniad        = $ilanseo.'-'.$ilanid.'-'.date('YmdHis').'-'.substr(md5(uniqid(rand())), 0,4);
$yeniresimadi  = $yeniad.'.jpg';
move_uploaded_file($kaynak, "../modelresim/" . $yeniresimadi);
$location      = $yeniresimadi;	
$Guncel = $conn->prepare("insert into resimler (uye_id,resim) values (?,?)");
$Guncel->execute(array($ilanid,$location));
echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';
}
}else{	
echo "<script type='text/javascript'>alert('Dosya formatı desteklenmiyor!');</script>";
echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';
}
}
}


// Blog Resim Ekle
if ( isset($_POST['blogresim']) ){
	
$dosyatipi  = $_FILES["dosya"]["type"];
if(strpos($dosyatipi,"JPEG") || strpos($dosyatipi,"PNG") || strpos($dosyatipi,"JPG") || strpos($dosyatipi,"GIF") || strpos($dosyatipi,"jpeg") || strpos($dosyatipi,"png") || strpos($dosyatipi,"jpg") || strpos($dosyatipi,"gif")) {
	
$kaynak     = $_FILES["dosya"]["tmp_name"];
$dosyaadi   = $_FILES["dosya"]["name"];
$dboyut     = $_FILES["dosya"]["size"];

$uzanti        = explode(".", $dosyaadi);
$resimturu     = end($uzanti);
$yeniad        = md5($dosyaadi).date('YmdHis');
$yeniresimadi  = $yeniad.'.'.$resimturu;
 
move_uploaded_file($kaynak, "../blogresim/" . $yeniresimadi);
$uid	  = htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$location = $yeniresimadi;	

$Guncel = $conn->prepare("UPDATE blog SET resim=? WHERE id=?");
$Guncel->execute(array($location,$uid));

echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';

}else{	
echo "<script type='text/javascript'>alert('Dosya formatı desteklenmiyor!');</script>";
echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';
}

}
?>