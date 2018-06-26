<?php
session_start();
if (isset($_POST['submitbtn'])) {
        $_SESSION['amount-error'] = 0;
        foreach ($_POST as $item => $amount) {
            if ($_SESSION['cart'][$item] + $amount < 0 || $_SESSION['cart'][$item] + $amount > 1000)
                $_SESSION['amount-error'] = 1;
        }
}
if(!isset($_SESSION['amount-error']) || $_SESSION['amount-error'] == 0) {
    foreach ($_POST as $item => $amount) {
        if ((int)$amount == 0)
            continue;
        if (!isset($_SESSION['cart'][$item])) {
            $_SESSION['cart'][$item] = 0;
        }
        $_SESSION['cart'][$item] += (int)$amount;
    }
    header("Location: ../cart.php");
} else header("Location: ../products.php");
?>