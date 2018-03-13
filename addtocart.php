<?php
session_start();
if(isset($_SESSION['cart'])&!empty($_SESSION['cart']))
{
	$items = $_SESSION['cart'];
	$cartitems = explode(",",$items);
	if(in_array($_GET['id'],$cartitems))
	{
		header('location: menu.php?status=incart');
	}
	else{
	$items.= ",".$_GET['id'];
	$_SESSION['cart'] = $items;
	header('location: menu.php?status=success');
	}
}
else if(isset($_GET['id'])&!empty($_GET['id']))
{
	$items = $_GET['id'];
	$_SESSION['cart']=$items;
	header('location: menu.php?status=success');
}
else{
	header('location: menu.php?status=failed');
}
?>