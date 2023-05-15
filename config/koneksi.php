<?php

require(__DIR__.'/../konfigurasi.php');

$conn = mysqli_connect($host, $username, $password, $db_name);
if(!$conn) {
    echo 'lost your connection database!!!';
    return;
}

return $conn;