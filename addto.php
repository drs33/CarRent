<?php
session_start();
if (!isset($_GET['id'])){
		header('Location: atr.php');
	}
if (($_SESSION['cart'][$_GET['id']])<1){
$_SESSION['cart'][$_GET['id']]=$_SESSION['cart'][$_GET['id']] + 1;

$serialize=serialize($_SESSION['cart']);

setcookie('cart',$serialize,time()+3600);
header ('Location:atr.php');
unset($_COOKIE['cart']);
}
else {
	header('Location: atr.php');
}



?>