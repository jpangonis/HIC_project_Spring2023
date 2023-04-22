<?php
session_start();
// functions page will be used in place of coding template on every other page, included here
include 'functions.php';
$pdo = pdo_connect_mysql();

// home is default landing page 
$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';
// include and show the requested page
include $page . '.php';
?>
