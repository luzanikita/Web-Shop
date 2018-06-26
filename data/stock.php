<?php 
    $content = file('data/stock.txt');
    $products = array();

    foreach ($content as $string) {
        $p = preg_split("/[\|]+/", $string);
        $products[$p[0]] = (float)$p[1];
    }

    return $products;
?>