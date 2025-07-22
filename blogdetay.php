<?php define('access',"False"); 
require_once ("include/connect.php"); require_once ("include/tarihfonksiyonu.php"); require_once ("include/zamanfonksiyonu.php");
$url = htmlspecialchars($_GET['id'], ENT_QUOTES, 'utf-8');
$yaziCek = $conn->prepare("select * from blog where id = ? and durum = ?");
$yaziCek->execute(array($url, 'Aktif'));
$yaziYaz = $yaziCek->fetch();
$siteSor = $conn->prepare("select * from linkler where id = ?");
$siteSor->execute(array($yaziYaz['odak_link']));
$siteCek = $siteSor->fetch();
$icerikyazi	= $yaziYaz['aciklama'];
$bul 		= $yaziYaz['odak_kelime'];
if($yaziYaz['odak_link']!==''){
$degistir   = "<strong><a href='".$siteCek['url']." 'rel='nofollow' target='_blank'>$bul</a></strong>";
}else{
$degistir   = "<strong><a href='anasayfa'> $bul </a></strong>";	
}
$DegisenYazi 	= str_ireplace($bul, $degistir, $icerikyazi);
$hit = $yaziYaz['hit'];
$a = $hit+1;
$guncelle = $conn->prepare("update blog set hit = ? where id = ?");
$guncelle->execute(array($a, $url));

if(!$url){
header("Location:".$SiteBilgi["siteurl"].""); exit();
}
if($yaziYaz['id'] != $url){
header("Location:".$SiteBilgi["siteurl"].""); exit();
}
?>
<!DOCTYPE html>
<html lang="tr">
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

	<meta name="copyright" content="2022" />
    <meta name="document-state" content="dynamic"/>
    <meta name="robots" content="index, follow">
    <meta name="rating" content="general" />
    <meta name="language" content="tr" />
    <meta name="revisit-after" content="7 days" />
    <meta name="distribution" content="global, locale" />
    <meta http-equiv="cache-control" content="public" />
    <meta http-equiv="pragma" content="no-cache" />
	<meta http-equiv="expires" content="2022" />
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
<h1><?php echo $yaziYaz["baslik"]; ?></h1>
</div>
<div class="container">
<div class="col-md-8">				
<div class="well"> 
<div class="row">
<div class="col-md-12">              
<div class="pull-left col-md-4 col-xs-12 thumb-contenido">
<a href="blogresim/<?php echo $yaziYaz["resim"]; ?>.html" data-lity><img class="center-block img-responsive img-thumbnail" src='blogresim/<?php echo $yaziYaz["resim"]; ?>' alt="<?php echo $yaziYaz["baslik"]; ?>"/></a></div>
<div id="YaziDetay">
<?php echo $DegisenYazi; ?>
</div><hr/>
<small><?php echo turkcetarih('j F Y',$yaziYaz['yil'].'-'.$yaziYaz['tarih']); ?> tarihinde yayınlandı ve <?php echo $yaziYaz["hit"]; ?> kez okundu.</small>
</div>
</div>
</div>
<div class="item-content-block tags">
<?php 
$TagSql = $conn->prepare("SELECT DISTINCT seo id,baslik,seo,konu FROM etiketler WHERE konu = ?");  
$TagSql->execute(array($yaziYaz['id']));
while ( $etiket = $TagSql->fetch() ){
echo '<a class="btn btn-xs btn-default" href="etiket/'.$etiket['seo'].'.html" data-toggle="tooltip" title="'.$etiket['baslik'].'"/>'.$etiket['baslik'].'</a> '; 
} 
?>
</div>
</div>
<div class="col-md-4">	
<?php include('include/sidebar.php'); ?>			
</div>		
<div class="temizle"></div>
<?php include('include/alt.php'); ?>
</div><!--/.container-->
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('.btn-default').tooltip({trigger: "click"}); 

});
</script>
<script src="js/bootstrap.js"></script>
</body>
</html>