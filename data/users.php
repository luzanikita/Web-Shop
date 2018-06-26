<?php 
    $content = file('data/users.txt');
    
    $users = array();

    foreach ($content as $string) {
        $info = preg_split("/[\|]+/", $string);
        $user = array();
        $users[$info[0]]['password'] = $info[1];
        $users[$info[0]]['firstname'] = $info[2];
        $users[$info[0]]['secondname'] = $info[3];
        $users[$info[0]]['birthday'] = preg_split("/(\.)/", $info[4]);
        $users[$info[0]]['description'] = $info[5];
        $users[$info[0]]['avatar'] = $info[6];
    }

    return $users;
?>