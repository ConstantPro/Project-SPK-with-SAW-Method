<?php

require_once('./functions.php');

if(isset($_POST['simpan'])) {
    $request = $_POST;
    $simpan = simpan_user($request);

    if($simpan['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/user/tambah.php');
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/user/index.php');
}

if(isset($_POST['update'])) {
    $request = $_POST;
    $update = update_user($request);

    if($update['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/user/edit.php?id='.$request['id']);
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/user/index.php');
}
