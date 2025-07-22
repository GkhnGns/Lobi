<?php
require_once ("include/connect.php");
$SiteBilgi = $conn->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
$dat = date("Y").'-'.date("m").'-'.date("d").'T'.date("H:i:s").'+00:00';
header ("content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" 
  xmlns:image="https://www.google.com/schemas/sitemap-image/1.1" 
  xmlns:video="https://www.google.com/schemas/sitemap-video/1.1">';

echo "<url><loc>".$SiteBilgi['siteurl']."/anasayfa</loc></url>";
echo "<url><loc>".$SiteBilgi['siteurl']."/makaleler</loc></url>"; 
echo "<url><loc>".$SiteBilgi['ampurl']."</loc></url>";  

$query = $conn->prepare("SELECT * FROM uyeler where seo!= ? order by id desc");
$query->execute(array('ilan-ver'));
while($goster = $query->fetch()){ 
$id    = $goster["id"];
$seo   = $goster["seo"];
$isim  = $goster["isim"];
$resim  = $goster["resim"];
$tarih = $goster["tarih"].'T'.date("H:i:s").'+02:00';
echo "<url><loc>".$SiteBilgi['siteurl']."ilan/".$seo."/".$id."</loc>
<image:image>
       <image:loc>".$SiteBilgi['siteurl']."modelresim/".$resim."</image:loc>
       <image:caption>".$isim."</image:caption>
    </image:image></url>";
}

$query = $conn->query("SELECT * FROM kategori", PDO::FETCH_ASSOC);
if ( $query->rowCount() ){
foreach( $query as $goster ){ 
$id  = $goster["id"];
$seo = $goster["seo"];
echo "<url><loc>".$SiteBilgi['siteurl']."/kategori/".$seo."/".$id.".html</loc></url>";
}

 $queryamp = $conn->query("SELECT * FROM kategori", PDO::FETCH_ASSOC);
if ( $queryamp->rowCount() ){
     foreach( $queryamp as $gosteramp ){
 
 $id  = $gosteramp["id"];
 $seo = $gosteramp["seo"];

   echo "<url><loc>".$SiteBilgi['siteurl']."amp/kategori-".$seo."-".$id.".html</loc></url>";
 } 
 } 

$query = $conn->prepare("SELECT * FROM blog where durum = ? order by id desc");
$query->execute(array('Aktif'));
foreach( $query as $goster ){ 
$id  = $goster["id"];
$seo = $goster["seo"];
$baslik  = $goster["baslik"];
echo "<url><loc>".$SiteBilgi['siteurl']."yazi/".$seo."/".$id.".html</loc>   </url>";

} } 

echo "</urlset>";
?>