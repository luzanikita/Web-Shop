<?php
    session_start(); 
    include_once("profile_validation.php");
    if (isset($_POST['submitbtn']) && count($_SESSION['errors']) == 0) {
        $info = $_POST['login'] . "|" . 
            $_POST['password'] . "|" . 
            $_POST['firstname'] . "|" . $_POST['secondname'] . "|" . 
            $_POST['dd'] . "." .
            $_POST['mm'] . "." .
            $_POST['yyyy'] . "|" . 
            $_POST['description'] . "|";

        if(!empty($_FILES['avatar']['name'])) {
            $info = $info . $_FILES['avatar']['name'];
            move_uploaded_file($_FILES["avatar"]["tmp_name"], "../images/" . $_FILES['avatar']['name']);
        }

        elseif(isset($_POST['user-avatar']))
            $info = $info . $_POST['user-avatar'];
        else
            $info = $info . "default.jpg";

        $filename = 'file.txt';
        $file = file_get_contents($filename);
        $file = str_replace('foo', 'bar', $file);
        file_put_contents($filename, $file);


        $file = file("../data/users.txt");
        $fp = fopen("../data/users.txt","w");

        for($i = 0; $i < sizeof($file); $i++) {
            if(stristr($file[$i], $_POST['login'])) {
                unset($file[$i]);
                break;
            }
        }
        fputs($fp,implode("",$file));
        fwrite($fp, $info . "\n");
        fclose($fp);
    }
    header("Location: ../profile.php");
?>