<?php
//ob_start();
session_start();
unset($_SESSION['username']);
unset($_SESSION['ID']);
session_destroy();
//ob_destroy();
header('location: index.php');
?>