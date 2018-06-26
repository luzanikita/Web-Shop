<?php
    foreach ($_SESSION['cart'] as $item => $amount)
    {
        if($amount != 0)
            return true;
    }

    return false;
?>