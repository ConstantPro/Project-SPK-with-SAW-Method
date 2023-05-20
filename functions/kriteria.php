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
