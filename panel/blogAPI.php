<?php session_start();
if (!isset($_SESSION['site_user'])){ 
header('location:giris.php'); exit(); 
} 
include('baglanti.php');
$term = htmlentities($_GET["term"],  ENT_QUOTES,  "utf-8");
$queryB = $conn->query('SELECT * FROM blog WHERE baslik LIKE "%' . $term . '%"', PDO::FETCH_ASSOC);
if ( $queryB->rowCount() ){
$data = array();
foreach ( $queryB as $rowB ){
$data[] = array(
'value' => $rowB['baslik'],
'baslik' => $rowB['baslik']
);
}
echo json_encode($data);
}
?>