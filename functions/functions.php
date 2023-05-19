<?php

require(__DIR__.'/../config/koneksi.php');

function login($username, $password) {
    $query = 'SELECT * FROM user WHERE username="'.$username.'"';
    $check_login = mysqli_query($GLOBALS['conn'], $query);
    $user = mysqli_fetch_array($check_login);

    if(!$user)
        return [
            'message' => 'User account not found',
            'error' => true
        ];

    if(!password_verify($password, $user['password']))
        return [
            'message' => 'Wrong Password',
            'error' => true 
        ];

    $_SESSION['id_user'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    return [
        'error' => false
    ];
}