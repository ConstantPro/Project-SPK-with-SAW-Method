<?php

require_once('./functions.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $check_login = login($username, $password);

    if($check_login['error'])
        return var_dump(['message' => $check_login['password']]);

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/dashboard.php');
    return;
}