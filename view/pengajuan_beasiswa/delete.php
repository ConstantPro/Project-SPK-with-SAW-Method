<?php 
require(__DIR__.'/../../functions/functions.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = delete_pengajuan_beasiswa($id);
    if($delete) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/pengajuan_beasiswa/index.php');
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/pengajuan_beasiswa/index.php');
    return;
}