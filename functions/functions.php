<?php

require(__DIR__.'/../config/koneksi.php');

function login($username, $password) {
    $query = 'SELECT * FROM user WHERE username='.$username;
    $check_login = mysqli_query($GLOBALS['conn'], $query);

    if(!$check_login)
        return 'User account not found!';

    if(password_verify($password, $check_login['password']))
        return 'Wrong password!';

    $_SESSION['id_user'] = $check_login['id'];
    $_SESSION['role'] = $check_login['role'];
}