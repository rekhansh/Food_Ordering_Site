<?php
session_start();
$items = $_SESSION['cart'];
$cartitems = explode(",",$items);
if($_GET['remove']=="all")
{
	unset($_SESSION['cart']);
	header('location:menu.php');
}
else
{
	$deitem = $_GET['remove'];
	unset($cartitems[$deitem]);
	$itemids = implode(",",$cartitems);
	$_SESSION['cart'] = $itemids;
header('location:cart.php');
}
?>