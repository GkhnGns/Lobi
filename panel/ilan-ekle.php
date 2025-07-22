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

    <title>İlan Ekle</title>

	<link rel="stylesheet" href="css/bootstrap.css">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet"/>
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>	
	<link href="css/dist/lity.css" rel="stylesheet"/>
	<script src="css/dist/vendor/jquery.js"></script>
	<script src="css/dist/lity.js"></script> 	
	<script src="js/jquery-ui.js"></script>
	<link rel="stylesheet" href="sweetalert/sweetalert.css">
	<script src="sweetalert/sweetalert.min.js"></script>
</head>
<body>

<?php include('menu.php'); ?>

    <div class="container-fuild">

      <div class="starter-template">

<div class="col-md-12">
	   
<div class="panel panel-primary">
  <div class="panel-heading">
	<h3 class="panel-title">YENİ İLAN EKLE</h3>
  </div>
<div class="panel-body">
    
<?php
if ( isset($_POST['kaydet']) ){

$tr = array("Ç","ç","Ğ","ğ","İ","ı","Ö","ö","Ş","ş","Ü","ü","-","_","&","'"," ","/","!","+",",",".","*");
$en = array("C","c","G","g","I","i","O","o","S","s","U","u","-","-","ve","","-","-","","-","","","");
include('etiketfonksiyonu.php');	

$tarih		= date('Y-m-d');
$btarih		= htmlspecialchars($_POST["btarih"], ENT_QUOTES, 'utf-8');
$kategori	= htmlspecialchars($_POST["kategori"], ENT_QUOTES, 'utf-8');
$isim		= addslashes($_POST['isim']);
$seo	    = strtolower(str_replace($tr,$en,$isim));
$aciklama 	= addslashes($_POST['aciklama']);
$anahtar 	= htmlspecialchars($_POST["anahtar"], ENT_QUOTES, 'utf-8');
$meta 		= addslashes($_POST['meta']);
$odak_kelime= htmlspecialchars($_POST["odak_kelime"], ENT_QUOTES, 'utf-8');
$odak_link	= addslashes($_POST['odak_link']);
$telefon	= htmlspecialchars($_POST["telefon"], ENT_QUOTES, 'utf-8');
$sehir		= htmlspecialchars($_POST["sehir"], ENT_QUOTES, 'utf-8');
$semt		= htmlspecialchars($_POST["semt"], ENT_QUOTES, 'utf-8');
$durum		= htmlspecialchars('Yayında', ENT_QUOTES, 'utf-8');
$seviye		= htmlspecialchars($_POST['seviye'], ENT_QUOTES, 'utf-8');
$sira		= htmlspecialchars($_POST["sira"], ENT_QUOTES, 'utf-8');

$kaynak     = $_FILES["dosya"]["tmp_name"];
$dosyaadi   = $_FILES["dosya"]["name"];
$dboyut     = $_FILES["dosya"]["size"];
$dosyatipi  = $_FILES["dosya"]["type"];	

if(strpos($dosyatipi,"JPEG") || strpos($dosyatipi,"PNG") || strpos($dosyatipi,"JPG") || strpos($dosyatipi,"GIF") || strpos($dosyatipi,"jpeg") || strpos($dosyatipi,"png") || strpos($dosyatipi,"jpg") || strpos($dosyatipi,"gif")) {
	
$uzanti        = explode(".", $dosyaadi);
$resimturu     = end($uzanti);
$yeniad        = $seo.'-'.date('YmdHis');
$yeniresimadi  = $yeniad.'.'.$resimturu;
move_uploaded_file($kaynak, "../modelresim/" . $yeniresimadi);
$resimyolu 	   = $yeniresimadi;

$ekle = $conn->prepare("INSERT INTO uyeler (kategori, isim, telefon, aciklama, anahtar, meta, odak_kelime, odak_link, sehir, semt, durum, tarih, btarih, seo, seviye, sira, resim, hit) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"); 
$ekle->execute(array($kategori, $isim, $telefon, $aciklama, $anahtar, $meta, $odak_kelime, $odak_link, $sehir, $semt, $durum, $tarih, $btarih, $seo, $seviye, $sira, $resimyolu, 1));

$SonID 	 = $conn->lastInsertId();
$Parcala = explode("," , $anahtar);
foreach ( $Parcala as $Yaz ){
$etiketim = trim($Yaz);
$seolarim = strtolower(trim(str_replace($etikettr,$etiketen,$etiketim)));
$EtiketEkle = $conn->prepare("INSERT INTO uyeetiketler SET konu=?, baslik=?, seo=?");
$EtiketEkle->execute(array($SonID, $etiketim, $seolarim));
}

echo '<center><div class="alert alert-success" role="alert">İlan eklendi!</div></center>';
echo '<meta http-equiv="refresh" content="1;URL=ilanlar.php">';	

}else{	
echo "<script type='text/javascript'>alert('Dosya formatı desteklenmiyor!');</script>";
echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';
}

}	
?>
 
	
	<form class="form-group" method="post" action="" enctype="multipart/form-data">

  <div class="row">
  <div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">İlan Adı</div>
      <input type="text" class="form-control" name="isim">
    </div>
  </div>
  </div>

  
<div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Sıra No</div>
      <input type="number" class="form-control" name="sira">
    </div>
  </div>
  </div>

<!-------------------------------------------------------------------------------------->
<div class="col-md-6">
  <div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">kategori</div>
	  <select class="form-control" name="kategori">
	  <option></option>
		  <?php $query = $conn->query("SELECT * FROM kategori ORDER BY baslik ASC");
		  while($row2 = $query->fetch()){  ?>
		  <option value="<?php echo $row2['id']; ?>"><?php echo $row2['baslik']; ?></option>
		  <?php } ?>
	  </select>
	</div>
	</div>
	</div>

  
<!-------------------------------------------------------------------------------------->
<div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Telefon</div>
      <input type="text" class="form-control" name="telefon" placeholder="01234567890">	  
    </div>
  </div>
  </div>

<div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Şehir</div>
      <input type="text" class="form-control" name="sehir" value="İzmir">
    </div>
  </div>
  </div>
<!-------------------------------------------------------------------------------------->  
 
<div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">İlçe+Semt</div>
      <input type="text" class="form-control" name="semt" placeholder="Şişli+Fulya">
    </div>
  </div>
  </div>

  <!-------------------------------------------------------------------------------------->
  <div class="col-md-12">
<div class="form-group">
<p><small class="bg-danger">PLATİN: 900px - 300px || GOLD: 900px - 400px</small></p>
<div class="input-group">
<div class="input-group-addon">Vitrin Resim</div>
<input type="file" name="dosya" id="dosya" class="btn btn-sm btn-default form-control"> 
</div>
</div>
</div>
  
<!-------------------------------------------------------------------------------------->
<div class="col-md-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Hakkında</div>
      <textarea class="form-control" name="aciklama" id="aciklama"></textarea>
    </div>
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Odak Kelime</div>
      <input type="text" class="form-control" name="odak_kelime" placeholder="">
    </div>
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">Odak Link</div>
	  <select class="form-control" name="odak_link">
	  <option></option>
		  <?php $query = $conn->query("SELECT * FROM linkler ORDER BY baslik ASC");
		  while($row2 = $query->fetch()){  ?>
		  <option value="<?php echo $row2['url']; ?>"><?php echo $row2['baslik']; ?> - <?php echo $row2['url']; ?></option>
		  <?php } ?>
	  </select>
	</div>
	</div>
	</div>
 
 <!-------------------------------------------------------------------------------------->   
<div class="col-md-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Meta Açıklama</div>
      <textarea class="form-control" name="meta" rows="3"></textarea>
    </div>
  </div>
  </div>

<!--------------------------------------------------------------------------------------> 
<div class="col-md-12">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">Anahtar Kelimeler</div>
      <input type="text" class="form-control" name="anahtar" data-role="tagsinput" placeholder="">
    </div>
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">Seviye</div>
	  <select class="form-control" name="seviye">
	  <option value="platin">Platin İlan</option>
	  <?php /*<option value="vip">Vip İlan</option>*/ ?>
	  <option value="gold">Gold İlan</option>
	 </select>
	</div>
	</div>
	</div>

<!-------------------------------------------------------------------------------------->
 <div class="col-md-6">
 <div class="form-group">
	  <div class="input-group">
      <div class="input-group-addon">Yayın Süresi</div>
	  <select class="form-control" name="btarih">
	  <option value="<?php echo date('Y-m-d', strtotime('+1 days')) ?>">1 Gün / <?php echo date('Y-m-d', strtotime('+1 days')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+2 days')) ?>">2 Gün / <?php echo date('Y-m-d', strtotime('+2 days')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+3 days')) ?>">3 Gün / <?php echo date('Y-m-d', strtotime('+3 days')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+4 days')) ?>">4 Gün / <?php echo date('Y-m-d', strtotime('+4 days')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+5 days')) ?>">5 Gün / <?php echo date('Y-m-d', strtotime('+5 days')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+6 days')) ?>">6 Gün / <?php echo date('Y-m-d', strtotime('+6 days')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+1 week')) ?>">1 Hafta / <?php echo date('Y-m-d', strtotime('+1 week')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+2 week')) ?>">2 Hafta / <?php echo date('Y-m-d', strtotime('+2 week')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+3 week')) ?>">3 Hafta / <?php echo date('Y-m-d', strtotime('+3 week')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+1 month')) ?>">1 Ay / <?php echo date('Y-m-d', strtotime('+1 month')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+2 month')) ?>">2 Ay / <?php echo date('Y-m-d', strtotime('+2 month')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+3 month')) ?>">3 Ay / <?php echo date('Y-m-d', strtotime('+3 month')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+4 month')) ?>">4 Ay / <?php echo date('Y-m-d', strtotime('+4 month')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+5 month')) ?>">5 Ay / <?php echo date('Y-m-d', strtotime('+5 month')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+6 month')) ?>">6 Ay / <?php echo date('Y-m-d', strtotime('+6 month')) ?> tarihine kadar</option>
	  <option value="<?php echo date('Y-m-d', strtotime('+1 year')) ?>">1 Yıl / <?php echo date('Y-m-d', strtotime('+1 year')) ?> tarihine kadar</option>
	  </select>
	</div>
	</div>
</div>
</div>
<!--------------------------------------------------------------------------------------> 
<input type="submit" class="btn btn-block btn-success" name="kaydet" value="Kaydet">
 
 <!-------------------------------------------------------------------------------------->
 
</form>
	
	</div>
	
  </div>
</div>

 
	   
      </div>

    </div><!-- /.container -->


<script type="text/javascript">
var editor = CKEDITOR.replace( 'aciklama' );
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('.btn-default').tooltip({trigger: "click"}); 

});
</script>
<!-- Arama -->
<script>
(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);
</script>
<!-- Arama -->
	<script src="js/bootstrap-tagsinput.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>



</html>