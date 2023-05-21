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
    $query = "SELECT kriteria.*, user.username as user_created FROM kriteria LEFT JOIN user ON user.id = kriteria.dibuat_oleh";
    
    if($id) {
        $query = $query." WHERE kriteria.id = ".$id."";
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

function update_kriteria($request) {
    $nama = validation_text_form($request['nama']);
    $sifat = $request['sifat'];

    $query = "UPDATE kriteria SET nama='".$nama."', sifat='".$sifat."' WHERE id=".$request['id']."";

    $update = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$update) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Kriteria updated successfully',
        'error' => false
    ];
}

function delete_kriteria($id) {
    $query = 'DELETE FROM kriteria WHERE id="'.$id.'"';
    $delete = mysqli_query($GLOBALS['conn'], $query);
    if($delete){
        return [
            'message' => 'Data failed deleted',
            'error' => true,
        ];
    }

    return [
        'message' => 'Data successfully deleteted',
        'error' => false,
    ];
}

// function for action beasiswa
function get_data_beasiswa($id = null) {
    $query = "SELECT beasiswa.*, user.username as user_created FROM beasiswa LEFT JOIN user ON user.id = beasiswa.dibuat_oleh ";
    
    if($id) {
        $query = $query." WHERE beasiswa.id = ".$id."";
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

function simpan_beasiswa($request) {
    $nama = validation_text_form($request['nama']);
    $session = $_SESSION;

    $query = "INSERT INTO beasiswa VALUES (null,'".$nama."', '".$session['id_user']."', '".date('Y-m-d h:i:s')."')";
    
    $simpan = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$simpan) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Beasiswa created successfully',
        'error' => false
    ];
}

function update_beasiswa($request) {
    $nama = validation_text_form($request['nama']);

    $query = "UPDATE beasiswa SET nama='".$nama."' WHERE id=".$request['id']."";

    $update = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$update) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Beasiswa updated successfully',
        'error' => false
    ];
}

function delete_beasiswa($id) {
    $query = 'DELETE FROM beasiswa WHERE id="'.$id.'"';
    $delete = mysqli_query($GLOBALS['conn'], $query);
    if($delete){
        return [
            'message' => 'Data deleted failed',
            'error' => true,
        ];
    }

    return [
        'message' => 'Data deleted successfully',
        'error' => false,
    ];
}

// function for action Mahasiswa
function get_data_mahasiswa($id = null) {
    $query = "SELECT mahasiswa.*, user.username as user_created FROM mahasiswa LEFT JOIN user ON user.id = mahasiswa.dibuat_oleh ";
    
    if($id) {
        $query = $query." WHERE mahasiswa.id = ".$id."";
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

function simpan_mahasiswa($request) {
    $nim = htmlspecialchars($request['nim']);
    $nama = validation_text_form($request['nama']);
    $alamat = htmlspecialchars($request['alamat']);
    $jk = htmlspecialchars($request['jenis_kelamin']);
    $tahun = htmlspecialchars($request['tahun']);
    $session = $_SESSION;

    $query = "INSERT INTO mahasiswa VALUES (null, '".$nim."','".$nama."', '".$alamat."', '".$jk."', '".$tahun."', '".$session['id_user']."', '".date('Y-m-d h:i:s')."')";
    
    $simpan = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$simpan) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Mahasiswa created successfully',
        'error' => false
    ];
}

function update_mahasiswa($request) {
    $nim = validation_text_form($request['nim']);
    $nama = validation_text_form($request['nama']);
    $alamat = htmlspecialchars($request['alamat']);
    $jk = htmlspecialchars($request['jenis_kelamin']);

    $query = "UPDATE mahasiswa SET nim='".$nim."', nama='".$nama."', alamat='".$alamat."', jenis_kelamin='".$jk."' WHERE id=".$request['id']."";

    $update = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$update) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Mahasiswa updated successfully',
        'error' => false
    ];
}

function delete_mahasiswa($id) {
    $query = 'DELETE FROM mahasiswa WHERE id="'.$id.'"';
    $delete = mysqli_query($GLOBALS['conn'], $query);
    if($delete){
        return [
            'message' => 'Data deleted failed',
            'error' => true,
        ];
    }

    return [
        'message' => 'Data deleted successfully',
        'error' => false,
    ];
}

// function for action user
function get_data_user($id = null) {
    $query = "SELECT user.* FROM user";
    
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

function check_user($username) {
    $query = 'SELECT * FROM user WHERE username="'.$username.'"';
    $check_login = mysqli_query($GLOBALS['conn'], $query);
    $user = mysqli_fetch_array($check_login);

    return $user;
}

function simpan_user($request) {
    $username = validation_text_form($request['username']);
    $password = validation_text_form($request['password']);
    $is_active = $request['is_active'] == 'on' ? 1 : 0;

    $check = check_user($username);
    if($check) {
        return [
            'message' => 'Username must be unique',
            'error' => true,
        ];
    }

    $query = "INSERT INTO user VALUES (null,'".$username."','".password_hash($password, PASSWORD_DEFAULT)."', '".$is_active."', '".date('Y-m-d h:i:s')."', 0, 'admin')";
    
    $simpan = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$simpan) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'User created successfully',
        'error' => false
    ];
}

function update_user($request) {
    $username = validation_text_form($request['username']);
    $password = validation_text_form($request['password']);
    $is_active = $request['is_active'] == 'on' ? 1 : 0;

    $check = check_user($username);
    if($check && ($check['username'] != $username)) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    if($password == "") {
       $password = $check['password']; 
    }

    $query = "UPDATE user SET username='".$username."', password='".$password."', is_active='".$is_active."' WHERE id=".$request['id']."";

    $update = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$update) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'User updated successfully',
        'error' => false
    ];
}

function delete_user($id) {
    $query = 'DELETE FROM user WHERE id="'.$id.'"';
    $delete = mysqli_query($GLOBALS['conn'], $query);
    if($delete){
        return [
            'message' => 'Data deleted failed',
            'error' => true,
        ];
    }

    return [
        'message' => 'Data deleted successfully',
        'error' => false,
    ];
}

// validation text form for input
function validation_text_form($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}