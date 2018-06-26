<?php
    if(isset($_SESSION['logged']))
        header("Location: products.php");

    $errors = array();
    if (isset($_POST['submitbtn'])) {
        if(strlen(trim($_POST['login'])) == 0)
            array_push($errors, "Empty name");
        else if(!preg_match("/^[A-Z][a-z]+$/", trim($_POST['login'])))
            array_push($errors, "Login starts with letter in upper case and then goes at least one letter in lower case");

        if(strlen(trim($_POST['password'])) == 0)
            array_push($errors, "Empty password");
        else if(!preg_match("/^[A-Za-z0-9]{6,}$/", trim($_POST['password'])))
            array_push($errors, "Password contains at least 6 letters or numbers");

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

    return $errors;
?>