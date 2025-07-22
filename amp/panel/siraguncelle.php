<?php
session_start();
if (!isset($_SESSION['site_user'])){
header('location:giris.php'); exit();
} 
include('baglanti.php');
$listele = $_POST['listele'];
if($listele){
$sayi= 1;
foreach ($listele as $newlist)  {
$update = $conn->prepare(" UPDATE uyeler SET sira=? WHERE id=? ");
$update->execute(array($sayi, $newlist));
$sayi = $sayi +1;
}
}
?>