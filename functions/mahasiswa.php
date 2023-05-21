<?php

require_once('./functions.php');

if(isset($_POST['simpan'])) {
    $request = $_POST;
    $simpan = simpan_mahasiswa($request);

    if($simpan['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/mahasiswa/tambah.php');
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/mahasiswa/index.php');
}

if(isset($_POST['update'])) {
    $request = $_POST;
    $update = update_mahasiswa($request);

    if($update['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/mahasiswa/edit.php?id='.$request['id']);
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/mahasiswa/index.php');
}
