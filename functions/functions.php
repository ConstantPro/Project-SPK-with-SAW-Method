<?php
session_start();
require(__DIR__.'/../config/koneksi.php');

// auth
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


// function for action on kriteria
function get_data_kriteria($id = null) {
    $query = "SELECT * FROM kriteria";
    
    if($id) {
        $query = $query." WHERE id = ".$id."";
    }

    $get_data = mysqli_query($GLOBALS['conn'], $query);

    if(!$get_data) {
        return [
            'message' => 'Data not found',
            'error' => true,
        ];
    }
    return $get_data;
}

function simpan_kriteria($request) {
    $nama = validation_text_form($request['nama']);
    $sifat = $request['sifat'];
    $session = $_SESSION;
    $kode = date('YmdHis').rand(0, 1000);

    $query = "INSERT INTO kriteria VALUES (null, '".$kode."','".$nama."', '".$sifat."', '".$session['id_user']."', '".date('Y-m-d h:i:s')."')";
    
    $simpan = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$simpan) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Kriteria created successfully',
        'error' => false
    ];
}

// validation text form for input
function validation_text_form($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}