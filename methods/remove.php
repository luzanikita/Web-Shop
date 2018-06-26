<?php
session_start();

if (isset($_SESSION['cart'][$_POST['item']])) {
	$_SESSION['cart'][$_POST['item']] = 0;
}

header("Location: ../cart.php");
exit;