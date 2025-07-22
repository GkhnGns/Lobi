<?php define('access',"False"); 
require_once("include/connect.php"); 
require_once("include/tarihfonksiyonu.php"); 
require_once("include/zamanfonksiyonu.php"); 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $SiteBilgi["siteurl"]; ?>">

	<title><?php echo $EtiketBaslik . ' ' . $ilanYazdir['isim'] . ' ' . $kat["baslik"] . ' ' . $yaziYaz["baslik"] . ' ' . $SiteBilgi["siteadi"] . ' ' . $SiteBilgi["logoyazi"]; ?></title>

	<meta name="description" content="<?php echo $SiteBilgi["meta"]; ?>" />
	<meta name="keywords" content="<?php echo $SiteBilgi["anahtar"]; ?>" />
	<meta name="owner" content="<?php echo $SiteBilgi["logoyazi"]; ?>" />	
	<meta name="author" content="<?php echo $SiteBilgi["logoyazi"]; ?>">
	<meta name="copyright" content="2025" />
	<meta name="document-state" content="dynamic"/>
	<meta name="robots" content="index, follow">
	<meta name="rating" content="general" />
	<meta name="language" content="tr" />
	<meta name="revisit-after" content="7 days" />
	<meta name="distribution" content="global, locale" />
	<meta http-equiv="cache-control" content="public" />
	<meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="expires" content="Tue, 01 Jan 2025 00:00:00 GMT" />
	<link rel="canonical" href="<?php echo $SiteBilgi["siteurl"]; ?>">
	<link rel="alternate" type="application/rss+xml" title="Sitemap" href="<?php echo $SiteBilgi["siteurl"]; ?>/sitemap.xml"/>	
	<meta content="<?php echo $SiteBilgi["siteurl"]; ?>" itemprop="image">
	<meta name="google" content="notranslate" />

	<meta name="theme-color" content="<?php echo $SiteBilgi["renk_headerarka"]; ?>"/>
	<meta name="msapplication-navbutton-color" content="<?php echo $SiteBilgi["renk_headerarka"]; ?>">
	<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo $SiteBilgi["renk_headerarka"]; ?>">
	<meta name="msapplication-TileColor" content="<?php echo $SiteBilgi["renk_headerarka"]; ?>">

	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="400" />
	<meta property="og:image:height" content="400" />
	<meta property="og:title" content="<?php echo $EtiketBaslik . ' ' . $ilanYazdir['isim'] . ' ' . $kat["baslik"] . ' ' . $yaziYaz["baslik"] . ' ' . $SiteBilgi["siteadi"] . ' ' . $SiteBilgi["logoyazi"]; ?>" />
	<meta property="og:description" content="<?php echo $SiteBilgi["anahtar"]; ?>" />
	<meta property="og:url" content="<?php echo $SiteBilgi["siteurl"]; ?>img/escort.webp" />

	<link rel="amphtml" href="<?php echo $SiteBilgi["ampurl"]; ?>" />
	<link rel="shortcut icon" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/safari-pinned-tab.svg" color="<?php echo $SiteBilgi["renk_headerarka"]; ?>">

	<script type="application/ld+json">
	{
		"@context": "https://schema.org",
		"@type": "Organization",
		"url": "<?php echo $SiteBilgi["siteurl"]; ?>",
		"logo": "<?php echo $SiteBilgi["siteurl"]; ?>img/escort.webp"
	}
	</script>

	<script src="js/jquery-1.10.2.js"></script>
	<script type="text/javascript">
		$(function() {
			var pageTitle = $("title").text();
			$(window).blur(function() {
				$("title").text("Elazığ Eskort - Vip Escort");
			});
			$(window).focus(function() {
				$("title").text(pageTitle);
			});
		});
	</script>

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/site.php">
	<link rel="stylesheet" href="vendor/colorbox/colorbox.css" />
	<link rel="stylesheet" href="vendor/lity/lity.css"/>	
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<link href="vendor/fotorama/fotorama.css" rel="stylesheet">
	<script src="vendor/fotorama/fotorama.js"></script>	
	<script src="vendor/colorbox/jquery.colorbox.js"></script>
</head>

<body id="top">
<?php include('include/ustmenu.php'); ?>
<div class="Header_Alani"><?php echo $SiteBilgi['ustalanyazisi']; ?></div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="vipilan">
				<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
				<span>Platin İlanlar</span>
				<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
				<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
			</div>
		</div>

		<div class="temizle"></div>	

		<?php 
		$Platins = $conn->prepare("SELECT * FROM uyeler WHERE durum=? AND seviye=? ORDER BY sira ASC"); 
		$Platins->execute(array('Yayında', 'platin')); 
		if ($Platins->rowCount() > 0){  
			while($Platin = $Platins->fetch()){
		?>
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
				<a href="ilan/<?php echo $Platin['seo']; ?>/<?php echo $Platin['id']; ?>.html">
					<img class="img-responsive img-thumbnail VitrinUst" src="modelresim/<?php echo $Platin['resim']; ?>" alt="<?php echo $Platin['isim']; ?>" title="<?php echo $Platin['isim']; ?>" width="100%"/>
				</a><br>
			</div>
		<?php } } else { ?>
			<div class="col-md-12"><div class="alert alert-warning text-center"><strong>Platin İlan Kaydı Malesef Bulunamamıştır...</strong></div></div>
		<?php } ?>

		<div class="temizle"></div>	

		<div class="col-md-12">
			<div class="vipilan"><span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
				<span>Gold İlanlar</span> 
				<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
			</div>
		</div>
		<div class="temizle"></div>	

		<?php 
		$Golds = $conn->prepare("SELECT * FROM uyeler WHERE durum=? AND seviye=? ORDER BY sira ASC"); 
		$Golds->execute(array('Yayında', 'gold'));
		if ($Golds->rowCount() > 0){  
			while($Gold = $Golds->fetch()){
		?>
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-4 m-bottom">
				<a href="ilan/<?php echo $Gold['seo']; ?>/<?php echo $Gold['id']; ?>.html">
					<img class="img-responsive img-thumbnail VitrinUst" src="modelresim/<?php echo $Gold['resim']; ?>" alt="<?php echo $Gold['isim']; ?>" title="<?php echo $Gold['isim']; ?>" width="100%"/>
				</a>
			</div>
		<?php } } else { ?>
			<div class="col-md-12"><div class="alert alert-warning text-center"><strong>Gold İlan Kaydı Malesef Bulunamamıştır...</strong></div></div>
		<?php } ?>

		<div class="temizle"></div><br/>

		<div class="col-md-8">
			<?php 
			$sorustur = $conn->prepare("SELECT * FROM blog WHERE durum = ? ORDER BY id DESC LIMIT 10");
			$sorustur->execute(array('Aktif'));
			while($Makale = $sorustur->fetch()){
				$kategoriSorgula = $conn->prepare("SELECT * FROM kategori WHERE id = ?");
				$kategoriSorgula->execute(array($Makale['kategori']));
				$kateqoriCek = $kategoriSorgula->fetch();	
			?>			
			<div class="panel panel-default panel-stili">
				<div class="panel-body">
					<div class="media">
						<a class="pull-left" href="yazi/<?php echo $Makale['seo']; ?>/<?php echo $Makale['id']; ?>.html">
							<div class="cerceve"><img src="blogresim/<?php echo $Makale['resim']; ?>" alt="<?php echo $Makale['baslik']; ?>" class="resim"></div>
						</a>
						<div class="panel-body">
							<h4 class="media-heading"><a href="yazi/<?php echo $Makale['seo']; ?>/<?php echo $Makale['id']; ?>.html"><?php echo $Makale['baslik']; ?></a></h4>
							<p class="detay"><?php echo strip_tags(mb_substr($Makale['aciklama'],0,999)).'... '; ?> <a href="yazi/<?php echo $Makale['seo']; ?>/<?php echo $Makale['id']; ?>.html"> Devamı.</a></p>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<ul class="list-inline list-unstyled">
						<small><i class="glyphicon glyphicon-calendar"></i> <?php echo XzamanOnce($Makale['yil'].'-'.$Makale['tarih'].' '.$Makale['saat']); ?></small>
						<li>|</li>
						<small><i class="glyphicon glyphicon-th-list"></i> <a href="kategori/<?php echo $kateqoriCek['seo']; ?>/<?php echo $kateqoriCek['id']; ?>.html"><?php echo $kateqoriCek['baslik']; ?></a></small>
						<li>|</li>
						<small><i class="glyphicon glyphicon-stats"></i> <?php echo $Makale['hit']; ?></small>
					</ul>
				</div>
			</div>
			<?php } ?>
		</div>

		<div class="col-md-4">	
			<div class="panel panel-default panel-stili">
				<div class="panel-heading">
					<h2 class="panel-title"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> <?php echo $SiteBilgi["yanpanelbaslik"]; ?></h2>
				</div>
				<div class="panel-body">
					<p style="font-size:35px">
						<a href="https://wa.me/40734043430?text=Merhabalar%20İlan%20Sitenize%20%2Aİlan%20Vermek%20İstiyorum%2A.%20Fiyat%20ve%20İlan%20Koşullarınız%20Hakkında%20Bilgi%20Verebilir%20misiniz%3F" rel="nofollow" title="İlan Ver">İlan Ver</a>
					</p>
					<p><?php echo $SiteBilgi['yanpanel']; ?></p>	
				</div>
			</div>
			<?php include('include/sidebar.php'); ?>	
		</div>			

		<div class="col-md-12">	
			<div class="panel panel-default panel-stili">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $SiteBilgi["anahtar"]; ?></h3>
				</div>
				<div class="panel-body kategorialtyazi">
					<p><?php echo $SiteBilgi['anasayfa']; ?></p>					
				</div>
			</div>	
		</div>	

		<div class="temizle"></div>
		<?php include('include/alt.php'); ?>
	</div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>
