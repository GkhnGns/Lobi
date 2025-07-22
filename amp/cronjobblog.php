<?php
include('include/connect.php');
date_default_timezone_set('Europe/Istanbul');
$zaman 	   = date("Y-m-d H:i");

$query = $conn->query("SELECT * FROM blog WHERE durum='Cron' and paylasim<='$zaman' order by id asc");

while($row = $query->fetch()){
$id			= $row['id'];
$paylasim	= $row['paylasim'];
$tarih		= date("m-d");
$saat		= date("H:i:s");
$yil		= date("Y");

$guncelle = $conn->query("update blog set durum='Aktif', tarih='$tarih', saat='$saat', yil=$yil' where id='$id'");

}