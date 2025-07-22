<?php
session_start();
if (!isset($_SESSION['site_user'])){
header('location:giris.php'); exit();
} 
include('baglanti.php');
$get_id = htmlspecialchars($_GET["id"], ENT_QUOTES, 'utf-8');

$resim = $conn->prepare("select * from blog where id=?");
$resim->execute(array($get_id));
$row 	= $resim->fetch();
$yol = '../blogresim/'.$row['resim'];
unlink($yol);

$Sil = $conn->prepare("delete from blog where id=?");
$Sil->execute(array($get_id));

$ref = htmlentities($_SERVER['HTTP_REFERER'],  ENT_QUOTES,  "utf-8");
echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';
?>