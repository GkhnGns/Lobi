<?php require_once("../include/connect.php"); require_once("fonksiyon.php");
$url 		= htmlspecialchars($_GET['id'], ENT_QUOTES, 'utf-8');
$ilanCek 	= $conn->prepare("select * from uyeler where id=?");
$ilanCek->execute(array($url));
$ilanYazdir = $ilanCek->fetch();
$EscID  	= $ilanYazdir["id"];
$TelData 	= $ilanYazdir['telefon'];
$GsmYaz 	= substr($TelData,0,4)." ".substr($TelData,4,3)." ".substr($TelData,7,2)." ".substr($TelData,9,2);
$ResimSorgusu  	= $conn->prepare("select * from resimler where uye_id = ? order by id asc limit 1");
$ResimSorgusu->execute(array($EscID));
$ResimCek = $ResimSorgusu->fetch(); 
$Resimm	 	= $ResimCek['resim'];
?>
<?php
$hit  = $ilanYazdir['hit'];
$ekle = $hit+1;
$guncelle = $conn->prepare("Update uyeler set hit=? Where id=? ");
$guncelle->execute(array($ekle,$EscID));
/*<------ Günlük Sayaç ------->*/
date_default_timezone_set('Europe/Istanbul');
$Bugun = date("d-m-Y");
$GunlukSorgula = $conn->prepare("select * from gunluk where id = ? ");
$GunlukSorgula->execute(array($EscID));
$Karsilastir = $GunlukSorgula->rowcount();
if($Karsilastir < 1){
$girdi = $conn->prepare("insert into gunluk (id,hit,tarih) values (?,?,?)");
$girdi->execute(array($EscID,'1',$Bugun));
}elseif($Karsilastir > 0){
$row_gunluk  = $GunlukSorgula->fetch();
$Gun		= $row_gunluk['tarih'];
if($Gun == $Bugun){	
$Gunluk		= $row_gunluk['hit'];
$Arttir		= $Gunluk+1;
$guncel = $conn->prepare("update gunluk set hit = ? where id = ? ");
$guncel->execute(array($Arttir,$EscID));
}elseif($Gun != $Bugun){
$kaydet = $conn->prepare("update gunluk set hit = ? , tarih = ? where id = ? ");
$kaydet->execute(array('1',$Bugun,$EscID));
}
}
$GunlukHitSor = $conn->prepare("select * from gunluk where id = ?");
$GunlukHitSor->execute(array($EscID));
$GunlukHit    = $GunlukHitSor->fetch();
$UyeKategoriSor = $conn->prepare("SELECT * FROM kategori WHERE id = ?");
$UyeKategoriSor->execute(array($ilanYazdir['kategori']));
$UyeKategoriYaz    = $UyeKategoriSor->fetch();
?>
<!doctype html>
<html lang="tr-TR" amp>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1,initial-scale=1">
<title><?php echo $ilanYazdir["isim"]; ?> | <?php echo $SiteBilgi["logoyazi"]; ?></title>
<meta name="theme-color" content="">
<link rel="canonical" href="<?php echo $SiteBilgi["siteurl"]; ?>ilan/<?php echo $ilanYazdir['seo']; ?>/<?php echo $ilanYazdir['id']; ?>"/>
<link rel='stylesheet' id='google-fonts-css'  href='https://fonts.googleapis.com/css?family=Quicksand:400,500,700&amp;subset=latin-ext' type='text/css' media='all' />
<script type='text/javascript' async src='https://cdn.ampproject.org/v0.js'></script>
<script type='text/javascript' custom-element="amp-sidebar" async src='https://cdn.ampproject.org/v0/amp-sidebar-0.1.js'></script>
<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
<script async custom-element="amp-lightbox-gallery" src="https://cdn.ampproject.org/v0/amp-lightbox-gallery-0.1.js"></script>
<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>
<noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>	
<style amp-custom>
button,hr,input{overflow:visible}audio,canvas,progress,video{display:inline-block}progress,sub,sup{vertical-align:baseline}[type=checkbox],[type=radio],legend{box-sizing:border-box;padding:0}html{font-family:sans-serif;line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,details,figcaption,figure,footer,header,main,menu,nav,section{display:block}h1{font-size:1em;margin:.67em 0}figure{margin:1em 40px}hr{box-sizing:content-box;height:0}code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}a:active,a:hover{outline-width:0}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:bolder}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,select{text-transform:none}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:ButtonText dotted 1px}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{color:inherit;display:table;max-width:100%;white-space:normal}textarea{overflow:auto}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}[hidden],template{display:none}*{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}
.clearfix:after,.clearfix:before{display:table;content:' ';clear:both}.clearfix{zoom:1}
.wrap{padding:2%;height:100%;}
.wrap img{max-width:100%}
.detays{background:#fff;padding:5px;color:#333; font-weight:500;}
body.body{background:#f2f2f2;font-family:Quicksand,sans-serif;font-weight:400;color:#363636;line-height:1.44;font-size:15px}.istanbul-amp-wrapper{max-width:780px;margin:0 auto}.amp-image-tag,amp-video{max-width:100%}blockquote,p{margin:0 0 15px;}.bold,b,strong{font-weight:700}a{-webkit-transition:all .4s ease;-moz-transition:all .4s ease;-o-transition:all .4s ease;transition:all .4s ease}amp-video{height:auto}.strong-label,blockquote{color:#000;font-family:Quicksand,sans-serif;font-weight:500;line-height:1.5}blockquote{border:1px solid #e2e2e2;border-width:1px 0;padding:15px 15px 15px 60px;text-align:left;position:relative;clear:both}blockquote p:last-child{margin-bottom:0}blockquote:before{content:"\f10e";font:normal normal normal 14px/1 FontAwesome;color:#d3d3d3;font-size:28px;position:absolute;left:12px;top:17px}.button,.comments-pagination a,.pagination a{padding:6px 6px;border:1px solid #dddddd;background:#faf9f9;color:#494949;font-family:Quicksand,sans-serif;font-weight:500;font-size:12px;display:inline-block;text-decoration:none;margin-bottom:4px;}.pagination a{padding:0 15px}.comments-pagination{margin:10px 0;color:#adadad;font-size:small}.comments-pagination a{margin-right:5px;padding:5px 15px}.img-holder{position:relative;width:80px;background:center center no-repeat #eee;display:inline-block;float:left;margin-right:15px;margin-bottom:15px;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover}.img-holder:before{display:block;content:" ";width:100%;padding-top:70%}.content-holder{position:absolute;bottom:16px;left:16px;right:16px}.h1,.h2,.h3,.h4,.h5,.h6,.heading-typo,h1,h2,h3,h4,h5,h6{font-family:Quicksand,sans-serif;font-weight:500;margin:15px 0 7px}.heading{font-size:16px;font-weight:700;margin:10px 0}.site-header{height:52px;width:100%;position:relative;margin:0;color:#fff}.site-header .branding{display:block;text-align:center;font-size:20px;font-weight:400;text-decoration:none;font-family:Quicksand,sans-serif;color:#fff;position:absolute;top:0;width:100%;padding:10px 55px;z-index:9;height:52px;line-height:32px}.site-header .branding .amp-image-tag{display:inline-block}.sticky-nav .site-header{position:fixed;left:0;right:0;top:0;z-index:999;display:block}body.sticky-nav{padding-top:52px}.site-header .navbar-search,.site-header .navbar-toggle{color:#fff;font-weight:400;font-size:18px;position:absolute;top:0;z-index:99;border:none;background:rgba(0,0,0,.1);height:52px;line-height:50px;margin:0;padding:0;width:52px;text-align:center;outline:0;cursor:pointer;-webkit-transition:all .6s ease;-moz-transition:all .6s ease;-o-transition:all .6s ease;transition:all .6s ease}.site-header .navbar-search:hover,.site-header .navbar-toggle:hover{background:rgba(0,0,0,.1)}.site-header .navbar-search:focus,.site-header .navbar-toggle:focus{background:rgba(0,0,0,.2)}.site-header .navbar-toggle{font-size:21px;left:0}.site-header .navbar-search{font-size:18px;right:0;line-height:48px}.istanbul-amp-footer{margin:0}.istanbul-amp-footer.sticky-footer{position:fixed;bottom:0;left:0;right:0}.istanbul-amp-footer-nav{border-top:1px solid rgba(0,0,0,.1);background:#fff;padding:14px 15px}.istanbul-amp-copyright{padding:17px 10px;text-align:center;font-family:Quicksand,sans-serif;font-weight:400;color:#494949;border-top:1px solid rgba(0,0,0,.1);font-size:13px}.footer-navigation{list-style:none;margin:0;padding:0;text-align:center}.footer-navigation li{display:inline-block;margin:0 8px 5px}.footer-navigation li li,.footer-navigation ul{display:none}.footer-navigation a{text-decoration:none;color:#494949;font-family:Quicksand,sans-serif;font-weight:300;font-size:14px}.footer-navigation .fa{margin-right:5px}.istanbul-amp-main-link{display:block;text-align:center;font-weight:700;margin:6px 0 12px}.istanbul-amp-main-link a{color:#fff;text-decoration:none;padding:0 15px;display:inline-block;border:1px solid rgba(0,0,0,.08);border-radius:33px;line-height:26px;font-size:12px;font-weight:400}.istanbul-amp-main-link a .fa{margin-right:5px}.carousel{overflow:hidden}.carousel .carousel-item,.carousel .img-holder{width:205px;float:none;margin:0}.carousel .carousel-item{margin-right:20px;margin-bottom:20px;overflow:hidden;line-height:0}.carousel .carousel-item:last-child{margin-right:0}.carousel .content-holder{position:relative;bottom:auto;right:auto;top:auto;left:auto;background:#f8f8f8;border:1px solid #e2e2e2;border-top-width:0;float:left;white-space:normal;padding:15px;height:100px}.carousel .content-holder h3{margin:0;height:64px;overflow:hidden;position:relative}.carousel .content-holder a{line-height:20px;font-size:15px;color:#000;text-decoration:none}.comment-header{margin-bottom:14px}.comment .comment-content p:last-child,.comment-header:last-child{margin-bottom:0}.comment-list{margin:0}.comment-list,.comment-list ul{list-style:none;padding:0}.comment-list ul ul{padding:0 0 0 30px}.comment-list .comment{position:relative;margin-top:14px;padding-top:14px;border-top:1px solid #f3f3f3}.comment-list>.comment:first-child{margin-top:0}.comment-list li.comment:after{clear:both;content:' ';display:block}.comment .comment-avatar img{border-radius:50%}.comment .column-1{float:left;width:55px}.comment .column-2{padding-left:75px}.comment .comment-content{color:#838383;margin-top:8px;line-height:1.57;font-size:14px}.comment .comment-author{font-size:14px;font-weight:700;font-style:normal}.comment .comment-published{margin-left:10px;font-size:12px;color:#a2a2a2;font-style:italic}.comment .comment-footer .fa,.comment .comment-footer a{font-size:14px;text-decoration:none}.comment .comment-footer a+a{margin-left:10px}.comments-wrapper .button.add-comment{color:#555}.bs-shortcode{margin:0 0 30px}.bs-shortcode .section-heading{margin:0 0 13px}.bs-shortcode .section-heading .other-link{display:none}
.istanbul-amp-sidebar{background:#fff;max-width:350px;min-width:270px;padding-bottom:30px}.istanbul-amp-sidebar .sidebar-container{width:100%}.istanbul-amp-sidebar .close-sidebar{font-size:25px;border:none;color:#fff;position:absolute;top:10px;right:0px;background:0 0;width:32px;height:32px;line-height:32px;text-align:center;padding:0;outline:0;-webkit-transition:all .6s ease;-moz-transition:all .6s ease;-o-transition:all .6s ease;transition:all .6s ease;cursor:pointer}.istanbul-amp-sidebar .close-sidebar:hover{background:rgba(0,0,0,.1)}.sidebar-brand{color:#fff;padding: 0px 50px 10px 5px;text-align:left;font-family:Quicksand,sans-serif;line-height:2}.sidebar-brand .logo .amp-image-tag{display:inline-block;margin:0}.sidebar-brand.type-text{padding-top:12px}.sidebar-brand .brand-name{font-weight:500;font-size:18px}.sidebar-brand .brand-description{font-weight:400;font-size:14px;line-height:1.4;margin-top:4px}.istanbul-amp-sidebar .amp-menu{margin-top:2px}.istanbul-amp-sidebar .social-list-wrapper{margin:17px 0 0}.sidebar-footer{border-top:1px solid rgba(0,0,0,.09);font-family:Quicksand,sans-serif;font-size:13px;padding:20px 15px;margin-top:15px;color:#848484;line-height:1.7}.amp-menu div{padding:0}.amp-menu h6,.amp-menu section{-webkit-transition:all .3s ease;-moz-transition:all .3s ease;-o-transition:all .3s ease;transition:all .3s ease}.amp-menu h6[aria-expanded=false]{background:0 0;border:none}.amp-menu section[expanded]{color:#363636;background:#eee;background:rgba(0,0,0,.08);padding-left:10px}.amp-menu section[expanded]>h6{margin-left:-10px;background:0 0}.amp-menu a,.amp-menu h6{color:inherit;font-size:1.3rem;font-weight:300;padding:0;border:none}.amp-menu h6 a{padding:0;margin:0}

.amp-menu a,.amp-menu span{color: #000000;
    padding: 10px 5px 10px 15px;
    display: block;
    position: relative;
    -webkit-transition: all ease-in-out .22s;
    transition: all ease-in-out .22s;
    text-decoration: none;
    font-size: 15px;
    font-weight: 500;
    font-family: Quicksand,sans-serif;}

.amp-menu a:hover,.amp-menu span:hover{background:rgba(0,0,0,.06)}.amp-menu span:hover>a{background:0 0}.amp-menu span span{padding:0;margin:0;display:inline-block}.amp-menu span span:after{display:none}.amp-menu h6 span:after{position:absolute;right:0;top:0;font-family:FontAwesome;font-size:12px;line-height:38px;content:'\f0dd';color:#363636;-webkit-transition:all .4s ease;-moz-transition:all .4s ease;-o-transition:all .4s ease;transition:all .4s ease;width:40px;text-align:center}.amp-menu section[expanded]>h6 span:after{-webkit-transform:rotate(180deg);tranform:rotate(180deg);top:4px}.amp-menu .menu-item:not(.menu-item-has-children){padding:0}.amp-menu span.menu-item-deep.menu-item-deep{padding:0 0 0 25px}.amp-menu i{font-size:14px;margin-right:5px;margin-top:-3px}
.ilan-liste .post-title,.ilan-liste a.post-read-more{font-family:Quicksand,sans-serif;font-weight:500}.ilan-liste .post-title a,.ilan-liste a.post-read-more{color:#363636;text-decoration:none}
.ilan-liste{position:relative}.ilan-liste .post-title{color:#363636;font-size:15px;line-height:1.3;margin:0 0 10px}.ilan-liste .post-meta{margin-top:15px;font-size:12px}.ilan-liste .post-meta .post-date .fa{margin-right:3px}.ilan-liste a.post-read-more{font-size:12px;background:#f9f9f9;border:1px solid #d8d8d8;padding:0 13px;border-radius:33px;display:inline-block;line-height:24px}.ilan-liste a.post-read-more .fa{margin-left:3px}.ilan-liste a.post-read-more:hover{border-color:transparent;color:#fff}.ilan-liste .post-excerpt{color:#333;font-family:Quicksand,sans-serif;font-weight:500;font-size:14px;line-height:1.5}.ilan-liste .post-excerpt p:last-child{margin-bottom:0}
.ilan-liste-2{padding:12px 0;border-bottom:1px solid #ddd;}
.ilan-liste-2:last-child{border-bottom:none;padding-bottom:0}
.ilan-liste-2 .post-thumbnail{margin-bottom:4px;}
.ilan-liste-2 .post-thumbnail amp-img{max-width:100%; float:left; margin-right:7px;}.ilan-liste-2 .post-title{font-size:18px;margin:0 0 10px}
.ilan-liste-2 a.post-read-more{float:right}
.blog-liste{margin-bottom:30px;margin-top:1px;padding:5px;}
.margintop20{margin-top:20px;}
/*
* => Theme Color
*/
.ilan-liste a.post-read-more:hover,
.post-terms.cats .term-type,
.post-terms a:hover,
.search-form .search-submit,
.istanbul-amp-main-link a,
.sidebar-brand,
.site-header{
background:<?php echo $AmpBilgi['amp_headerarkarenk']; ?>;
}
.single-post .post-meta a,
.entry-content ul.bs-shortcode-list li:before,
a{
color: #732344;
}
/*
* => Other Colors
*/
body.body {
background:<?php echo $SiteBilgi['renk_arka']; ?>;
}
.istanbul-amp-wrapper {
border:1px solid <?php echo $AmpBilgi['amp_headerarkarenk']; ?>;
color: #363636;
}

.istanbul-amp-footer {
background:#f3f3f3;
}
.istanbul-amp-footer-nav {
background:#ffffff;
}
a.ilanver{background:#057b66;}
a.ilanver:hover{background:#333;}
a.ilanver{color:#fff;}
a.ilanver:hover{color:#fff;}
.yan-cerceve{
width:75px;
height:75px;
background:#ddd;
float:left;
margin:0;
border:2px solid #ddd;
border-radius:3px; margin-right:7px;
}
amp-img.yan-resim {
object-fit: contain;
max-width:100%;
max-height:100%;
}
.text-center{text-align:center;}
hr{border:0.5px solid #ddd;}
.text-small{font-size:11px;}
.sitebaslik{padding:4px;background:<?php echo $AmpBilgi['amp_baslikarkarenk']; ?>;color:<?php echo $AmpBilgi['amp_baslikyazirenk']; ?>;}
.sitebaslik h1{margin:10px 0;font-size:15px;}
.sitebaslik{margin:10px 0;font-size:15px;}
.listelevip img{
border: 0px; 
border-color: #000;
margin-left: 0px;
margin-bottom: 0px;
}
.vipliste {
max-width: 100%;
margin-top:10px;
}
.listv {
display: inline-block;
width: 86px;
}
.platin{height:auto; width:100%;border:2px solid transparent;float:left;margin:2px 0;}
.gold{height:auto; width:25%;border:2px solid transparent;float:left;margin:2px 0;}
.vip{height:auto; width:50%;border:2px solid transparent;float:left;margin:2px 0;}
.vipliste2 {
width:99%;
margin: auto;
}
.vipliste2 small{ font-size:8px;}
.vipilan{background:#ddd;text-align:center;}
.vipilan span{color:#000; font-size:20px; padding:5px; text-align:center;}
.kategorialtyazi {
font-weight: 400;
font-size: 85%;
}
.kategorialtyazi a{
font-weight: 600;
}
.buttons {
  display: inline-block;
  height: 30px;
  line-height: 30px;
  padding-right: 10px;
  padding-left: 50px;
  position: relative;
  background-color:rgb(41,127,184);
  color:rgb(255,255,255);
  text-decoration: none;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 15px;
  font-size:12px;
   font-family:Verdana;
  letter-spacing: 0.1px;
  
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  text-shadow:0px 1px 0px rgba(0,0,0,0.5);
-ms-filter:"progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=1,Color=#ff123852,Positive=true)";zoom:1;
filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=1,Color=#ff123852,Positive=true);
  -moz-box-shadow:0px 2px 2px rgba(0,0,0,0.2);
  -webkit-box-shadow:0px 2px 2px rgba(0,0,0,0.2);
  box-shadow:0px 2px 2px rgba(0,0,0,0.2);
  -ms-filter:"progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=2,Color=#33000000,Positive=true)";
filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=2,Color=#33000000,Positive=true);
}
.buttons span {
  position: absolute;
  left: 0;
  width: 40px;
  background-color:rgba(0,0,0,0.5);
  
  -webkit-border-top-left-radius: 5px;
-webkit-border-bottom-left-radius: 5px;
-moz-border-radius-topleft: 5px;
-moz-border-radius-bottomleft: 5px;
border-top-left-radius: 5px;
border-bottom-left-radius: 5px;
border-right: 1px solid  rgba(0,0,0,0.15);
}
.buttons:hover span, .buttons.active span {
  background-color:rgb(0,0,0);
  border-right: 1px solid  rgba(0,0,0,0.3);
}
.buttons:active {
  margin-top: 2px;
  margin-bottom: 13px;
  -moz-box-shadow:0px 1px 0px rgba(255,255,255,0.5);
-webkit-box-shadow:0px 1px 0px rgba(255,255,255,0.5);
box-shadow:0px 1px 0px rgba(255,255,255,0.5);
-ms-filter:"progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=1,Color=#ccffffff,Positive=true)";
filter:progid:DXImageTransform.Microsoft.dropshadow(OffX=0,OffY=1,Color=#ccffffff,Positive=true);
}
.buttons.orange {
  background: #FF7F00;
}
.buttons.purple {
  background: #8e44ad;
}
.buttons.whatsapp {
  background: #128C7E;
}
.buttons.telefon {
  background: #0c8832;
}
.nav-links h1.tel{font-size:22px;}
section#backButton {display:block;width:100%;height:20px;}
section#backButton a{color:white;text-decoration:none;}
section#backButton .left{float:left;line-height:25px;padding:1px 8px;font-size:80%;font-weight:500;border:1px solid gray; background-color:#666666;}
section#backButton .right{float:right;line-height:25px;padding:1px 8px;font-size:80%;font-weight:500;border:1px solid gray; background-color:#666666; cursor:pointer;}
</style>
<link rel='stylesheet' id='font-awesome-css'  href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css?ver=4.9.3' type='text/css' media='all' />

<script type="application/ld+json">{"@context":"https:\/\/schema.org","@type":"BlogPosting","mainEntityOfPage":"<?php echo $SiteBilgi["siteurl"]; ?>ilan/<?php echo $ilanYazdir['seo']; ?>/<?php echo $ilanYazdir['id']; ?>","publisher":{"@type":"Organization","name":"<?php echo $ilanYazdir['isim']; ?>","logo":{"@type":"ImageObject","url":"<?php echo $SiteBilgi["siteurl"]; ?>modelresim/<?php echo $Resimm; ?>","height":400,"width":300}},"headline":"<?php echo $ilanYazdir['isim']; ?>","datePublished":"<?php echo $ilanYazdir['tarih']; ?>T15:30:15+00:00","dateModified":"<?php echo date('Y-m-d'); ?>T<?php echo date('H:i:s'); ?>+00:00","author":{"@type":"Person","name":"<?php echo $AmpBilgi["amp_baslik"]; ?>"},"image":{"@type":"ImageObject","url":"<?php echo $SiteBilgi["ampurl"]; ?>resim/esc.png","height":200,"width":400}}</script>
</head>
<body class="home blog body">
<div class="istanbul-amp-wrapper">
<?php require_once('menu.php'); ?>

<div class="wrap">
<section id="backButton">
<a class="left" href="<?php echo $YeniAdres.'/kategori-'.$UyeKategoriYaz['seo'].'-'.$UyeKategoriYaz['id'].'.html'; ?>">Geri Dön</a>
<a class="right" on="tap:istanbul-ampSidebar.toggle">Kategoriler</a>
</section>
<?php if($ilanYazdir["durum"]!="Yayında"){ ?>
<div class="margintop20 clearfix"></div>
<div class="text-center detays"><strong><?php echo $ilanYazdir['isim']; ?></strong> ilanına ait bilgiler gizlenmiştir.<br/> İlanın süresi dolmuş veya yayından kaldırılmış olabilir.</div>
<?php }else{ ?>
<div class="text-center sitebaslik"><h1><?php echo $ilanYazdir["isim"]; ?></h1></div>
<div class="detays">
<amp-carousel lightbox
width="600"
height="400"
layout="responsive"
type="slides">
<?php
$ResimSorgu  	= $conn->prepare("select * from resimler where uye_id = ? order by id asc");
$ResimSorgu->execute(array($url));
$count = $ResimSorgu->rowcount();
if ($count > 0){
	while($UyeResimCek = $ResimSorgu->fetch()){ 
$id 		= $UyeResimCek['id'];
$resim	 	= $UyeResimCek['resim'];
?>
<amp-img
src="../modelresim/<?php echo $resim; ?>"
alt="<?php echo $ilanYazdir["isim"]; ?>"
title="<?php echo $ilanYazdir["isim"]; ?>"
layout="responsive"
width="400"
height="400"></amp-img>
<?php } }else{ ?>
<amp-img
src="../img/resimyok.png"
alt="<?php echo $ilanYazdir["isim"]; ?>"
title="<?php echo $ilanYazdir["isim"]; ?>"
layout="responsive"
width="400"
height="400"></amp-img>
<?php } ?>
</amp-carousel>
<div class="margintop20 clearfix"></div>
<div class="nav-links text-center">
<h1 class="tel"><small><?php echo $ilanYazdir["isim"]; ?></small> <br/> <?php echo $GsmYaz; ?></h1>
<h1>
<a class="buttons telefon" href="tel://<?php echo $ilanYazdir['telefon']; ?>"><span><i class="fa fa-phone"></i></span> Numarayı Ara</a>
<a class="buttons whatsapp" href="https://api.whatsapp.com/send?phone=9<?php echo $ilanYazdir['telefon']; ?>&amp;text=Merhaba numaranızı <?php echo htmlspecialchars($_SERVER["HTTP_HOST"], ENT_QUOTES, 'utf-8'); ?> sitesinden aldım"><span><i class="fa fa-whatsapp"></i></span> Whatsapp'tan Ulaş</a>
</h1>
</div>
<div class="margintop20 clearfix"></div>
<?php echo $ilanYazdir['aciklama']; ?>
<div class="margintop20 clearfix"></div>
<?php 
$TagSql = $conn->prepare("SELECT DISTINCT seo id,baslik,seo,konu FROM uyeetiketler WHERE konu = ?");  
$TagSql->execute(array($ilanYazdir['id']));
while ( $etiket = $TagSql->fetch() ){
echo '<a class="button" href="'.$YeniAdres.'/etiket-'.$etiket['seo'].'.html"/>'.$etiket['baslik'].'</a> '; 
} 
?>
<div class="margintop20 clearfix"></div>
<div class="text-center">
<amp-social-share type="facebook" width="40" height="30" data-param-text="<?php echo $ilanYazdir['isim']; ?>" data-param-attribution="AMPhtml" data-param-url="<?php echo $YeniAdres.'/ilan-'.$ilanYazdir['seo'].'-'.$ilanYazdir['id'].'.html'; ?>" data-param-media="<?php echo $SiteBilgi["siteurl"]; ?>modelresim/<?php echo $ilanYazdir["resim"]; ?>"  data-param-app_id="000000000000000"></amp-social-share>
<amp-social-share type="pinterest" width="40" height="30" data-param-text="<?php echo $ilanYazdir['isim']; ?>" data-param-attribution="AMPhtml" data-param-url="<?php echo $YeniAdres.'/ilan-'.$ilanYazdir['seo'].'-'.$ilanYazdir['id'].'.html'; ?>" data-param-media="<?php echo $SiteBilgi["siteurl"]; ?>modelresim/<?php echo $ilanYazdir["resim"]; ?>"></amp-social-share>
<amp-social-share type="tumblr" width="40" height="30" data-param-text="<?php echo $ilanYazdir['isim']; ?>" data-param-attribution="AMPhtml" data-param-url="<?php echo $YeniAdres.'/ilan-'.$ilanYazdir['seo'].'-'.$ilanYazdir['id'].'.html'; ?>" data-param-media="<?php echo $SiteBilgi["siteurl"]; ?>modelresim/<?php echo $ilanYazdir["resim"]; ?>"></amp-social-share>
<amp-social-share type="twitter" width="40" height="30" data-param-text="<?php echo $ilanYazdir['isim']; ?>" data-param-attribution="AMPhtml" data-param-url="<?php echo $YeniAdres.'/ilan-'.$ilanYazdir['seo'].'-'.$ilanYazdir['id'].'.html'; ?>" data-param-media="<?php echo $SiteBilgi["siteurl"]; ?>modelresim/<?php echo $ilanYazdir["resim"]; ?>"></amp-social-share>
<amp-social-share type="whatsapp" width="40" height="30" data-param-text="<?php echo $ilanYazdir['isim']; ?> - <?php echo $YeniAdres.'/ilan-'.$ilanYazdir['seo'].'-'.$ilanYazdir['id'].'.html'; ?>" data-param-attribution="AMPhtml" data-param-media="<?php echo $SiteBilgi["siteurl"]; ?>modelresim/<?php echo $ilanYazdir["resim"]; ?>"></amp-social-share>
</div>
</div>
<?php } ?>
<div class="margintop20 clearfix"></div>
<footer class="istanbul-amp-footer ">
<div class="istanbul-amp-copyright"><?php echo $SiteBilgi["copyright"]; ?></div>
</footer>
<amp-analytics type="googleanalytics">
<script type="application/json">
{
"vars": {
"account": "<?php echo $SiteBilgi["analytics"]; ?>"
},
"triggers": {
"trackPageview": {
"on": "visible",
"request": "pageview"
}
}
}
</script>
</amp-analytics>
</div>
</div>
</body>
</html>