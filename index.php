<?php

    require_once('./config/koneksi.php');
    $server = $_SERVER;
    $route = 'http://'.$server['HTTP_HOST'].'/view/login.php';

    if(headers_sent() === false) {
        header('Location:'.$route);
    }

    exit();
