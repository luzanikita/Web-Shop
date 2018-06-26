<?php
    $_SESSION['errors'] = array();

    if (isset($_POST['submitbtn'])) {
        if(!preg_match("/^[A-Z][a-z]+$/", $_POST['firstname']))
            array_push($_SESSION['errors'], "Firstname starts with letter in upper case and then goes at least one letter in lower case");
        if(!preg_match("/^[A-Z][a-z]+$/", $_POST['secondname']))
            array_push($_SESSION['errors'], "Secondname starts with letter in upper case and then goes at least one letter in lower case");
        if(!((int)$_POST['dd'] >= 1 && (int)$_POST['dd'] <= 31))
            array_push($_SESSION['errors'], "Day have to be in range from 1 to 31");
        if(!((int)$_POST['mm'] >= 1 && (int)$_POST['mm'] <= 12))
            array_push($_SESSION['errors'], "Mont have to be in range from 1 to 12");
        if(!((int)$_POST['yyyy'] >= 1900 && (int)$_POST['yyyy'] <= 2002))
            array_push($_SESSION['errors'], "Year have to be in range from 1900 to 2002");
        if(!preg_match("/^[A-Za-z !?,\.\-']{50,}$/", $_POST['description']))
            array_push($_SESSION['errors'], "Description consist of at least 50 letters and symbols , . ! ? - '");
        if(isset($_FILES['avatar']) && $_FILES['avatar']['type'] != "image")
            array_push($_SESSION['errors'], "File have to be an image");

        $users = include("data/users.php");
        if(count($errors) == 0) {
            if(isset($users[trim($_POST['login'])]) &&
             $users[$_POST['login']]['password'] == trim($_POST['password'])) {
                $_SESSION['logged'] = $_POST['login'];
                header("Location: products.php");
            }
            else
                array_push($errors, "Incorrect login or password");
        }
    }

?>