<?php @session_start();
unset($_SESSION['site_user']);
header('Location: index.php'); exit();
?>