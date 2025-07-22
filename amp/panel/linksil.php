<?php
session_start();
if (!isset($_SESSION['site_user'])){
header('location:giris.php'); exit();
} 
include('baglanti.php');
$get_id = htmlspecialchars($_GET["id"], ENT_QUOTES, 'utf-8');
$Sil = $conn->prepare("delete from linkler where id=?");
$Sil->execute(array($get_id));
$ref = htmlentities($_SERVER['HTTP_REFERER'],  ENT_QUOTES,  "utf-8");
echo '<meta http-equiv="refresh" content="0;URL='.$ref.'">';
?>