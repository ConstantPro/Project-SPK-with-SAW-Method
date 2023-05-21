<?php

require_once('./functions.php');

if(isset($_POST['simpan'])) {
    $request = $_POST;
    $simpan = simpan_kriteria($request);

    if($simpan['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/kriteria/tambah.php');
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/kriteria/index.php');
}

if(isset($_POST['update'])) {
    $request = $_POST;
    $update = update_kriteria($request);

    if($update['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/kriteria/edit.php?id='.$request['id']);
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/kriteria/index.php');
}
