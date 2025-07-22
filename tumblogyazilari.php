<?php define('access',"False");
require_once ("include/connect.php"); require_once ("include/tarihfonksiyonu.php"); require_once ("include/zamanfonksiyonu.php");
?>
<!DOCTYPE html>
<header>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo $SiteBilgi["siteurl"]; ?>">
	
    <title><?php echo $EtiketBaslik; ?> <?php echo $ilanYazdir['isim']; ?> <?php echo $kat["baslik"]; ?> <?php echo $yaziYaz["baslik"]; ?> <?php echo $SiteBilgi["siteadi"]; ?> <?php echo $SiteBilgi["logoyazi"]; ?></title>
	
	<meta name="description" content="<?php echo $SiteBilgi["meta"]; ?>" />
	<meta name="keywords" content="<?php echo $SiteBilgi["anahtar"]; ?>" />
	
	<meta name="owner" content="<?php echo $SiteBilgi["logoyazi"]; ?>" />	
	<meta name="author" content="<?php echo $SiteBilgi["logoyazi"]; ?>">

	<meta name="copyright" content="2009" />
    <meta name="document-state" content="dynamic"/>
    <meta name="robots" content="index, follow">
    <meta name="rating" content="general" />
    <meta name="language" content="tr" />
    <meta name="revisit-after" content="7 days" />
    <meta name="distribution" content="global, locale" />
    <meta http-equiv="cache-control" content="public" />
    <meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="expires" content="2019" />
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
	<meta property="og:title" content="<?php echo $EtiketBaslik; ?> <?php echo $ilanYazdir['isim']; ?> <?php echo $kat["baslik"]; ?> <?php echo $yaziYaz["baslik"]; ?> <?php echo $SiteBilgi["siteadi"]; ?> <?php echo $SiteBilgi["logoyazi"]; ?>" />
	<meta property="og:description" content="<?php echo $SiteBilgi["anahtar"]; ?>" />
	<meta property="og:url" content="<?php echo $SiteBilgi["siteurl"]; ?>img/escort.webp" />

	<link rel="amphtml" href="<?php echo $SiteBilgi["ampurl"]; ?>" />
	
	<link rel="shortcut icon" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/apple-touch-icon.png">
	<link rel="icon" type="image/x-icon" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/apple-touch-icon.png" />
	<link rel="icon" type="image/png" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/apple-touch-icon.png" />
	<link rel="icon" type="image/x-icon" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/apple-touch-icon.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/apple-touch-icon.png">
	<link rel="apple-touch-icon-precomposed" href="<?php echo $SiteBilgi["siteurl"]; ?>img/icon/apple-touch-icon.png">
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
    
    <script type="text/javascript">
		$(function() {
			var pageTitle = $("title").text();
			$(window).blur(function() {
				$("title").text("💋 Yanıyorum Aşkımm 💋");
			});
			$(window).focus(function() {
				$("title").text(pageTitle);
			});
		});
	</script>
	
	<link rel="icon" href="img/favicon.png">
	<link rel="stylesheet" href="css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/site.php">
	<link rel="stylesheet" href="vendor/colorbox/colorbox.css" />
	<link rel="stylesheet" href="vendor/lity/lity.css"/>	
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css">
	<link  href="vendor/fotorama/fotorama.css" rel="stylesheet">
	<script src="vendor/fotorama/fotorama.js"></script>	
	<script src="vendor/colorbox/jquery.colorbox.js"></script>
	<script src="vendor/lity/jquery.js"></script>
	<script src="js/jquery-1.10.2.js"></script>
	
</header>

<body id="top">
<?php include('include/ustmenu.php'); ?>
<div class="Header_Alani">
<h1>İlan ve Blog Yazıları</h1>
</div>
<div class="container">
<div class="col-md-8">
<ol class="breadcrumb">
<li><a href="anasayfa.html">Ana Sayfa</a></li>
<li class="active"><a href="makaleler.html">Blog ve İlanlar</a></li>
</ol>	
<?php 
$verisayisi = count($conn->query("select * from blog where durum='Aktif'",PDO::FETCH_ASSOC)->fetchAll());
$gosterilecek = 1000;
$sayfa;
$sayfasayisi = ceil($verisayisi/$gosterilecek);
if(isset($_GET['sayfa'])){
$sayfa = htmlentities($_GET["sayfa"],  ENT_QUOTES,  "utf-8");
}else{
$sayfa = 1;
}
if($sayfa > $sayfasayisi){
$sayfa  = 1;
}elseif(!is_numeric($sayfa) || $sayfa < 1){
$sayfa = 1;
}
$baslangic = ($gosterilecek * $sayfa)-$gosterilecek;
?>
<?php 
$sorustur = $conn->prepare("SELECT * FROM blog where durum=? order by id desc LIMIT $baslangic,$gosterilecek");
$sorustur->execute(array('Aktif'));
while($Makale = $sorustur->fetch()){ 
$kategoriSorgula = $conn->prepare("select * from kategori where id = ?");
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
<p class="detay"><?php $metin = mb_substr($Makale['aciklama'],0,900).'... '; echo strip_tags($metin); ?> <a href="yazi/<?php echo $Makale['seo']; ?>/<?php echo $Makale['id']; ?>.html"> okumaya devam et</a></p><hr/>
<ul class="list-inline list-unstyled">
<small><i class="glyphicon glyphicon-calendar"></i> <?php echo turkcetarih('j F Y',$Makale['yil'].'-'.$Makale['tarih']); ?></small>
<li>|</li>
<small><i class="glyphicon glyphicon-th-list"></i> <a href="kategori/<?php echo $kateqoriCek['seo']; ?>/<?php echo $kateqoriCek['id']; ?>.html"><?php echo $kateqoriCek['baslik']; ?></a></small>
<li>|</li>
<small><i class="glyphicon glyphicon-stats"></i> <?php echo $Makale['hit']; ?></small>
</ul>
</div>
</div>
</div>
</div>
<?php } ?>
<div class="panel panel-default">
<div class="list-group text-center">		
<nav aria-label="Page navigation">
<ul class="pagination pagination-sm">
<?php 
if($sayfa > 1){
echo '<li><a href="makaleler?sayfa=1">İlk</a></li>';
echo '<li><a title="önceki" href="makaleler?sayfa='.($sayfa-1).'">&laquo;</a></li>';
}
$ekgoster = 2;
for($i = $sayfa - $ekgoster; $i <= $sayfa + $ekgoster;$i++){
if($i > 0 && $i <= $sayfasayisi){
if($i == $sayfa){
echo '<li><a class="active">'.$i.'</a></li>';
}else{
echo '<li><a href="makaleler?sayfa='.$i.'">'.$i.'</a></li>';
}
}
}
if($sayfa < $sayfasayisi){
echo '<li><a title="sonraki" href="makaleler?sayfa='.($sayfa+1).'">&raquo;</a></li>';
echo '<li><a href="makaleler?sayfa='.$sayfasayisi.'">Son</a></li>';
}
?>	
</ul></nav>	
</div></div>	
</div>
<div class="col-md-4">
<?php include('include/sidebar.php'); ?>			
</div>		
<div class="temizle"></div>
<?php include('include/alt.php'); ?>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>