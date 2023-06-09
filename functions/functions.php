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

// function for action model
function get_data_model($id = null) {
    $query = "SELECT model.*, user.username as user_created, beasiswa.nama as beasiswa, kriteria.nama as kriteria FROM model LEFT JOIN user ON user.id = model.dibuat_oleh LEFT JOIN kriteria ON kriteria.id = model.kriteria_id LEFT JOIN beasiswa ON beasiswa.id = model.beasiswa_id";
    
    if($id) {
        $query = $query." WHERE model.id = ".$id."";
    }

    $get_data = mysqli_query($GLOBALS['conn'], $query);

    if(!$get_data) {
        return [];
    }
    return $get_data;
}

function simpan_model($request) {
    $beasiswa_id = htmlspecialchars($request['beasiswa_id']);
    $kriteria_id = htmlspecialchars($request['kriteria_id']);
    $bobot = htmlspecialchars($request['bobot']);
    $session = $_SESSION;

    $query = "INSERT INTO model VALUES (null,'".$beasiswa_id."', '".$kriteria_id."', '".$bobot."', '".$session['id_user']."', '".date('Y-m-d h:i:s')."')";
    
    $simpan = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$simpan) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Model created successfully',
        'error' => false
    ];
}

function update_model($request) {
    $beasiswa_id = htmlspecialchars($request['beasiswa_id']);
    $kriteria_id = htmlspecialchars($request['kriteria_id']);
    $bobot = htmlspecialchars($request['bobot']);

    $query = "UPDATE model SET beasiswa_id='".$beasiswa_id."', kriteria_id='".$kriteria_id."', bobot='".$bobot."' WHERE id=".$request['id']."";

    $update = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$update) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Model updated successfully',
        'error' => false
    ];
}

function delete_model($id) {
    $query = 'DELETE FROM model WHERE id="'.$id.'"';
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

// function for action parameter_penilaian
function get_data_parameter_penilaian($id = null) {
    $query = "SELECT parameter_penilaian.*, user.username as user_created, beasiswa.nama as beasiswa, kriteria.nama as kriteria FROM parameter_penilaian LEFT JOIN user ON user.id = parameter_penilaian.dibuat_oleh LEFT JOIN kriteria ON kriteria.id = parameter_penilaian.kriteria_id LEFT JOIN beasiswa ON beasiswa.id = parameter_penilaian.beasiswa_id";
    
    if($id) {
        $query = $query." WHERE model.id = ".$id."";
    }

    $get_data = mysqli_query($GLOBALS['conn'], $query);

    if(!$get_data) {
        return [];
    }
    return $get_data;
}

function get_data_parameter_penilaian_for_pengajuan($kriteria_id = null, $beasiswa_id = null) {
    $query = "SELECT parameter_penilaian.*, user.username as user_created, beasiswa.nama as beasiswa, kriteria.nama as kriteria FROM parameter_penilaian LEFT JOIN user ON user.id = parameter_penilaian.dibuat_oleh LEFT JOIN kriteria ON kriteria.id = parameter_penilaian.kriteria_id LEFT JOIN beasiswa ON beasiswa.id = parameter_penilaian.beasiswa_id";
    
    if($kriteria_id) {
        $query = $query." WHERE parameter_penilaian.kriteria_id = ".$kriteria_id." AND parameter_penilaian.beasiswa_id = ".$beasiswa_id;
    }

    $get_data = mysqli_query($GLOBALS['conn'], $query);

    if(!$get_data) {
        return [];
    }
    return $get_data;
}

function simpan_parameter_penilaian($request) {
    $beasiswa_id = htmlspecialchars($request['beasiswa_id']);
    $kriteria_id = htmlspecialchars($request['kriteria_id']);
    $keterangan = htmlspecialchars($request['keterangan']);
    $bobot = htmlspecialchars($request['bobot']);
    $session = $_SESSION;

    $query = "INSERT INTO parameter_penilaian VALUES (null,'".$beasiswa_id."', '".$kriteria_id."', '".$keterangan."', '".$bobot."', '".$session['id_user']."', '".date('Y-m-d h:i:s')."')";
    
    $simpan = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$simpan) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Parameter Penilaian created successfully',
        'error' => false
    ];
}

function update_parameter_penilaian($request) {
    $beasiswa_id = htmlspecialchars($request['beasiswa_id']);
    $kriteria_id = htmlspecialchars($request['kriteria_id']);
    $keterangan = htmlspecialchars($request['keterangan']);
    $bobot = htmlspecialchars($request['bobot']);

    $query = "UPDATE parameter_penilaian SET beasiswa_id='".$beasiswa_id."', kriteria_id='".$kriteria_id."', keterangan='".$keterangan."' bobot='".$bobot."' WHERE id=".$request['id']."";

    $update = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$update) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Parameter Penilaian updated successfully',
        'error' => false
    ];
}

function delete_parameter_penilaian($id) {
    $query = 'DELETE FROM parameter_penilaian WHERE id="'.$id.'"';
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

// function for action pengajuan beasiswa
function get_data_pengajuan_beasiswa($id = null) {
    $query = "SELECT pengajuan_beasiswa.*, user.username as user_created, beasiswa.nama as beasiswa, kriteria.nama as kriteria, mahasiswa.nama as mahasiswa, parameter_penilaian.bobot as nilai_data FROM pengajuan_beasiswa LEFT JOIN user ON user.id = pengajuan_beasiswa.dibuat_oleh LEFT JOIN kriteria ON kriteria.id = pengajuan_beasiswa.kriteria_id LEFT JOIN beasiswa ON beasiswa.id = pengajuan_beasiswa.beasiswa_id LEFT JOIN mahasiswa ON mahasiswa.id = pengajuan_beasiswa.mahasiswa_id LEFT JOIN parameter_penilaian ON parameter_penilaian.id = pengajuan_beasiswa.nilai";
    
    if($id) {
        $query = $query." WHERE pengajuan_beasiswa.id = ".$id."";
    }

    $get_data = mysqli_query($GLOBALS['conn'], $query);

    if(!$get_data) {
        return [];
    }
    return $get_data;
}

function simpan_pengajuan_beasiswa($request) {
    $beasiswa_id = htmlspecialchars($request['beasiswa_id']);
    $kriteria_id = htmlspecialchars($request['kriteria_id']);
    $mahasiswa_id = htmlspecialchars($request['mahasiswa_id']);
    $nilai = htmlspecialchars($request['nilai']);
    $session = $_SESSION;

    $query = "INSERT INTO pengajuan_beasiswa VALUES (null,'".$beasiswa_id."', '".$kriteria_id."', '".$mahasiswa_id."', '".$nilai."', '".$session['id_user']."', '".date('Y-m-d h:i:s')."')";
    
    $simpan = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$simpan) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Parameter Penilaian created successfully',
        'error' => false
    ];
}

function update_pengajuan_beasiswa($request) {
    $beasiswa_id = htmlspecialchars($request['beasiswa_id']);
    $kriteria_id = htmlspecialchars($request['kriteria_id']);
    $mahasiswa_id = htmlspecialchars($request['mahasiswa_id']);
    $nilai = htmlspecialchars($request['nilai']);

    $query = "UPDATE pengajuan_beasiswa SET beasiswa_id='".$beasiswa_id."', kriteria_id='".$kriteria_id."', mahasiswa_id='".$mahasiswa_id."' nilai='".$nilai."' WHERE id=".$request['id']."";

    $update = mysqli_query($GLOBALS['conn'], $query);
    
    if(!$update) {
        return [
            'message' => 'Something went wrong!!',
            'error' => true
        ];
    }

    return [
        'message' => 'Parameter Penilaian updated successfully',
        'error' => false
    ];
}

function delete_pengajuan_beasiswa($id) {
    $query = 'DELETE FROM pengajuan_beasiswa WHERE id="'.$id.'"';
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

// function for perhitungan
function get_data_perhitungan($beasiswa = null) {
    $query = "SELECT 
            b.nim, 
            b.nama,
            b.tahun_mengajukan,
            SUM(if(c.sifat = 'max', (d.bobot / c.normalization), (c.normalization / d.bobot))) / COUNT(a.kriteria_id) as result
        FROM pengajuan_beasiswa a 
        JOIN mahasiswa b ON b.id = a.mahasiswa_id 
        JOIN (
            SELECT 
                pengajuan_beasiswa.kriteria_id,
                kriteria.sifat as sifat,
                (SELECT bobot FROM model WHERE beasiswa_id = pengajuan_beasiswa.beasiswa_id AND kriteria_id = pengajuan_beasiswa.kriteria_id) as bobot,
                ROUND(IF(kriteria.sifat = 'max', MAX(parameter_penilaian.bobot), MIN(parameter_penilaian.bobot))) as normalization
            FROM pengajuan_beasiswa
            JOIN parameter_penilaian ON pengajuan_beasiswa.nilai = parameter_penilaian.id
            JOIN kriteria ON pengajuan_beasiswa.kriteria_id = kriteria.id
            JOIN beasiswa ON pengajuan_beasiswa.beasiswa_id = beasiswa.id
            WHERE pengajuan_beasiswa.beasiswa_id = '".$beasiswa."'
            GROUP BY pengajuan_beasiswa.kriteria_id
        ) c USING (kriteria_id)
        JOIN parameter_penilaian d ON a.nilai = d.id
        WHERE a.beasiswa_id = '".$beasiswa."' 
        GROUP BY a.mahasiswa_id
        ORDER BY result DESC";

    $perhitungan = mysqli_query($GLOBALS['conn'], $query);

    return $perhitungan;
}

// validation text form for input 
function validation_text_form($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}