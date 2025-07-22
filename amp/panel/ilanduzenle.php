<?php session_start();
if (!isset($_SESSION['site_user'])){ header('location:giris.php'); exit(); } 
include('baglanti.php');
include('../include/tarihfonksiyonu.php');
include('../include/zamanfonksiyonu.php');
$id = htmlspecialchars($_GET["id"], ENT_QUOTES, 'utf-8');
?>

<!DOCTYPE html>
<html lang="tr">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>İlan Düzenle</title> 
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet"/>
	<script src="js/jquery.js" type="text/javascript"></script>
	<link href="css/dist/lity.css" rel="stylesheet"/>
<script src="css/dist/vendor/jquery.js"></script>
<script src="css/dist/lity.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert.css">
	<script src="sweetalert/sweetalert.min.js"></script>
	<link href="css/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
$('a[rel*=facebox]').facebox({
loadingImage : 'img/loading.gif',
closeImage   : 'img/closelabel.png'
})
})
</script>

</head>



<body>


<?php include('menu.php'); ?>

    <div class="container-fuild">

      <div class="starter-template">
       
<?php
	$query = $conn->prepare("select * from uyeler where id = ?");
	$query->execute(array($id));
	$row = $query->fetch();
	$kategori = $row['kategori'];
	$odak_link = $row['odak_link'];
	$btarih  = $row['btarih'];
	$seviye  = $row['seviye'];
	$durum	 = $row['durum'];
?>
<div class="col-md-9 col-sm-12">
	   
<div class="panel panel-default">
  <div class="panel-heading">
    <a href="javascript:history.back(-1)" class="btn btn-xs btn-primary pull-left">&laquo; Geri</a>
	<h3 class="panel-title"><?php echo $row["isim"]; ?></h3>
  </div>
  <div class="panel-body">
    
<?php
// KARAKTER DÜZENLE
$tr = array("Ç","ç","Ğ","ğ","İ","ı","Ö","ö","Ş","ş","Ü","ü","-","_","&","'"," ","/");
$en = array("C","c","G","g","I","i","O","o","S","s","U","u","-","_","ve","-","-","-");
include('etiketfonksiyonu.php');	
if(@$_POST['guncelle']){
$id			= htmlspecialchars($_POST["id"], ENT_QUOTES, 'utf-8');
$kategori	= htmlspecialchars($_POST["kategori"], ENT_QUOTES, 'utf-8');
$tarih		= htmlspecialchars($_POST["tarih"], ENT_QUOTES, 'utf-8');
$btarih		= htmlspecialchars($_POST["btarih"], ENT_QUOTES, 'utf-8');
$isim		= addslashes($_POST['isim']);
$seo	    = strtolower(str_replace($tr,$en,$isim));
$aciklama 	= addslashes($_POST['aciklama']);
$anahtar 	= addslashes($_POST['anahtar']);
$meta 		= addslashes($_POST['meta']);
$odak_kelime= htmlspecialchars($_POST["odak_kelime"], ENT_QUOTES, 'utf-8');
$odak_link	= htmlspecialchars($_POST["odak_link"], ENT_QUOTES, 'utf-8');
$telefon	= htmlspecialchars($_POST["telefon"], ENT_QUOTES, 'utf-8');
$sehir		= htmlspecialchars($_POST["sehir"], ENT_QUOTES, 'utf-8');
$semt		= htmlspecialchars($_POST["semt"], ENT_QUOTES, 'utf-8');
$seviye		= htmlspecialchars($_POST['seviye'], ENT_QUOTES, 'utf-8');
$sira		= htmlspecialchars($_POST["sira"], ENT_QUOTES, 'utf-8');
$durum		= htmlspecialchars($_POST["durum"], ENT_QUOTES, 'utf-8');

if($isim==""){
echo '<center><div class="alert alert-danger" role="alert">İlan adı yazmadınız!</div></center>'; 
}elseif($kategori==""){
echo '<center><div class="alert alert-danger" role="alert">kategori seçmediniz!</div></center>';
}else{

$up = $conn->prepare("UPDATE uyeler SET kategori=?, isim=?, telefon=?, aciklama=?, anahtar=?, meta=?, odak_kelime=?, odak_link=?, sehir=?, semt=?, tarih=?, btarih=?, seo=?, seviye=?, durum=?, sira=? WHERE id=?");
$up->execute(array($kategori, $isim, $telefon, $aciklama, $anahtar, $meta, $odak_kelime, $odak_link, $sehir, $semt, $tarih, $btarih, $seo, $seviye, $durum, $sira, $id));

$Parcala = explode("," , $anahtar);
foreach ( $Parcala as $Yaz ){
$etiketim = trim($Yaz);
$seolarim = strtolower(trim(str_replace($etikettr,$etiketen,$etiketim)));
$Sor = $conn->prepare("SELECT * FROM uyeetiketler WHERE konu=? AND seo=? AND baslik=?");	
$Sor->execute(array( $id, $seo, $etiketim ));
$count = $Sor->rowcount();
if ($count > 0){
$EtiketEkle = $conn->prepare("UPDATE uyeetiketler SET baslik=? and seo=? WHERE konu=?");
$EtiketEkle->execute(array($etiketim, $seolarim, $id));
}else{
$EtiketEkle = $conn->prepare("INSERT INTO uyeetiketler SET konu=?, baslik=?, seo=?");
$EtiketEkle->execute(array($id, $etiketim, $seolarim));
}
}

echo '<center><div class="alert alert-success" role="alert">İlan güncellendi!</div></center>';
echo '<meta http-equiv="refresh" content="1;URL=ilanlar.php">';
}
}	
?>

	
	<form class="form-group" method="post" action="">
	<div class="row">
  <div class="col-md-6 col-sm-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">İlan Adı</div>
      <input type="text" class="form-control" name="isim" value="<?php echo $row["isim"]; ?>">
    </div>
  </div>
  </div>
  
   <div class="col-md-6 col-sm-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Sıra</div>
      <input type="number" class="form-control" name="sira" value="<?php echo $row["sira"]; ?>">
    </div>
  </div>
   </div>
<!-------------------------------------------------------------------------------------->
 <div class="col-md-6 col-sm-12">
  <div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">kategori</div>
	  <select class="form-control" name="kategori">
	  <option></option>
		  <?php $query = $conn->query("SELECT * FROM kategori ORDER BY baslik ASC");
		  while($row2 = $query->fetch()){  ?>
		  <option value="<?php echo $row2['id']; ?>" <?php if($row2['id']==$kategori){ ?>selected<?php } ?>><?php echo $row2['baslik']; ?></option>
		  <?php } ?>
	  </select>
	</div>
	</div>
	</div>
  

<!-------------------------------------------------------------------------------------->
	<div class="col-md-6 col-sm-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Telefon</div>
      <input type="text" class="form-control" name="telefon" value="<?php echo $row["telefon"]; ?>">
    </div>
  </div>
  </div>
  
  
<!-------------------------------------------------------------------------------------->
	<div class="col-md-6 col-sm-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Şehir</div>
      <input type="text" class="form-control" name="sehir" value="<?php echo $row["sehir"]; ?>">
    </div>
  </div>
  </div>
<!-------------------------------------------------------------------------------------->
	<div class="col-md-6 col-sm-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">İlçe+Semt</div>
      <input type="text" class="form-control" name="semt" value="<?php echo $row["semt"]; ?>">
    </div>
  </div>
  </div>
  
 <!--------------------------------------------------------------------------------------> 
  <div class="col-md-12 col-sm-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Hakkında</div>
      <textarea class="form-control" name="aciklama" id="aciklama"><?php echo $row["aciklama"]; ?></textarea>
    </div>
  </div>
  </div> 
</div>  
  
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Odak Kelime</div>
      <input type="text" class="form-control" name="odak_kelime" value="<?php echo $row["odak_kelime"]; ?>">
    </div>
  </div>
  
  
   <div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">Odak Link</div>
	  <select class="form-control" name="odak_link">
	  <option></option>
		  <?php $query = $conn->query("SELECT * FROM linkler ORDER BY baslik ASC");
		  while($row4 = $query->fetch()){  ?>
		  <option value="<?php echo $row4['id']; ?>" <?php if($row4['id']==$odak_link){ ?>selected<?php } ?>><?php echo $row4['baslik']; ?> - <?php echo $row4['url']; ?></option>
		  <?php } ?>
	  </select>
	</div>
	</div>
 <!--------------------------------------------------------------------------------------> 
<div class="row">
   <div class="col-md-12 col-sm-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Meta Açıklama</div>
	  <textarea class="form-control" name="meta" rows="3"><?php echo $row["meta"]; ?></textarea>
    </div>
  </div>
  </div>
<!--------------------------------------------------------------------------------------> 
<div class="col-md-12 col-sm-12"> 
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Anahtar Kelimer</div>
	  <input type="text" class="form-control" name="anahtar" data-role="tagsinput" value="<?php echo $row["anahtar"]; ?>">
    </div>
  </div>
  </div>
<!-------------------------------------------------------------------------------------->

<div class="col-md-6">

  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Yayın Tarihi</div>
	  <input type="text" class="form-control" value="<?php echo $row["tarih"]; ?>" name="<?php echo $row["tarih"]; ?>" disabled>
    </div>
  </div>
  </div>

<div class="col-md-6"> 
<div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">Bitiş Tarihi</div>
	  <select class="form-control" name="btarih">
	  <option value="<?php echo $btarih; ?>" selected><?php echo $btarih; ?> değişiklik yapma</option>
	   <option value="<?php echo date('Y-m-d', strtotime('+1 week')) ?>">Bugünden itibaren +1 Hafta Ekle / <?php echo date('Y-m-d', strtotime('+1 week')) ?></option>
	   <option value="<?php echo date('Y-m-d', strtotime('+2 week')) ?>">Bugünden itibaren +2 Hafta Ekle / <?php echo date('Y-m-d', strtotime('+2 week')) ?></option>
	   <option value="<?php echo date('Y-m-d', strtotime('+3 week')) ?>">Bugünden itibaren +3 Hafta Ekle / <?php echo date('Y-m-d', strtotime('+3 week')) ?></option>
	   <option value="<?php echo date('Y-m-d', strtotime('+1 month')) ?>">Bugünden itibaren +1 Ay Ekle / <?php echo date('Y-m-d', strtotime('+1 month')) ?></option>
	   <option value="<?php echo date('Y-m-d', strtotime('+2 month')) ?>">Bugünden itibaren +2 Ay Ekle / <?php echo date('Y-m-d', strtotime('+2 month')) ?></option>
	   <option value="<?php echo date('Y-m-d', strtotime('+3 month')) ?>">Bugünden itibaren +3 Ay Ekle / <?php echo date('Y-m-d', strtotime('+3 month')) ?></option>
	   <option value="<?php echo date('Y-m-d', strtotime('+4 month')) ?>">Bugünden itibaren +4 Ay Ekle / <?php echo date('Y-m-d', strtotime('+4 month')) ?></option>
	   <option value="<?php echo date('Y-m-d', strtotime('+5 month')) ?>">Bugünden itibaren +5 Ay Ekle / <?php echo date('Y-m-d', strtotime('+5 month')) ?></option>
	   <option value="<?php echo date('Y-m-d', strtotime('+6 month')) ?>">Bugünden itibaren +6 Ay Ekle / <?php echo date('Y-m-d', strtotime('+6 month')) ?></option>
	   <option value="<?php echo date('Y-m-d', strtotime('+1 year')) ?>">Bugünden itibaren +1 Yıl Ekle / <?php echo date('Y-m-d', strtotime('+1 year')) ?></option>
	   
	  </select>
	</div>
	</div>
	</div>
	
	<div class="col-md-6">
	<div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">Seviye</div>
	  <select class="form-control" name="seviye">
	  <option value="platin" <?php if($seviye == "platin"){ ?>selected<?php } ?>>Platin İlan</option>
	  <?php /*<option value="vip" <?php if($seviye == "vip"){ ?>selected<?php } ?>>Vip İlan</option> */ ?>
	  <option value="gold" <?php if($seviye == "gold"){ ?>selected<?php } ?>>Gold İlan</option>
	 </select>
	</div>
	</div>
	</div>
	
	<div class="col-md-6">
	<div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">Durum</div>
	  <select class="form-control" name="durum">
	  <option value="Yayında" <?php if($durum == "Yayında"){ ?>selected<?php } ?>>Aktif</option>
	  <option value="Yayınlanmamış" <?php if($durum == "vip"){ ?>selected<?php } ?>>Pasif</option>
	 </select>
	</div>
	</div>
	</div>
	
</div>
<!--------------------------------------------------------------------------------------> 

<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
<input type="hidden" name="tarih" value="<?php echo $row["tarih"]; ?>">

<input type="submit" class="btn btn-block btn-success" name="guncelle" value="Güncelle">

 
 <!-------------------------------------------------------------------------------------->
 
</form>
	
  </div>
</div>

</div>

<div class="col-md-3 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">VİTRİN RESMİ</h3>
</div>
<div class="panel-body">
<div class="form-group">
<center>
<?php if($row["resim"] != ''){ ?>
<img src="../modelresim/<?php echo $row["resim"]; ?>" class="img-rounded img-responsive" width="300px">
<?php }else{ ?>
<img src="img/resimsiz.png" class="img-rounded img-responsive">
<?php } ?>
<br/><br/>
<a rel="facebox" class="btn btn-sm btn-primary" href="ilanresimguncelle.php?id=<?php echo $id ?>">Resmi Değiştir</a>
</a>
</center>
</div>
</div>
</div>
</div>	

</div>
   
	   
      </div>

    </div><!-- /.container -->
	
<script type="text/javascript">
var editor = CKEDITOR.replace( 'aciklama' );
</script>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/bootstrap-tagsinput.min.js"></script>
    <script src="js/bootstrap.js"></script>
   
</body>



</html>