<?php

session_start();
session_destroy();
session_unset();

$server = $_SERVER;
header('location:http://'.$server['HTTP_HOST'].'/view/login.php');
return;