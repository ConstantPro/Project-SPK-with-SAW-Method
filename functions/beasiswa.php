<?php

require_once('./functions.php');

if(isset($_POST['simpan'])) {
    $request = $_POST;
    $simpan = simpan_beasiswa($request);

    if($simpan['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/beasiswa/tambah.php');
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/beasiswa/index.php');
}

if(isset($_POST['update'])) {
    $request = $_POST;
    $update = update_beasiswa($request);

    if($update['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/beasiswa/edit.php?id='.$request['id']);
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/beasiswa/index.php');
}
