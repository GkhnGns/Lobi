<?php
$DB_HOST = "localhost";
$DB_NAME = "u968988525_esc23db";
$DB_USER = "u968988525_esc23dk";
$DB_PASS = "VsTd~=W9i+VsTd~=W9i+";
try{
$conn = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8", $DB_USER , $DB_PASS);
$conn->query("SET CHARACTER SET utf8mb4");
} catch ( PDOException $e ) {
print $e->getMessage();
}
$SiteBilgi = $conn->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);

$AmpBilgi = $conn->query("SELECT * FROM ampayar")->fetch(PDO::FETCH_ASSOC);
?>