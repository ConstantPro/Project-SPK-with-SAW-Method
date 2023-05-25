<?php 

require_once('./functions.php');

if(isset($_GET['kriteria_id']) && isset($_GET['beasiswa_id'])) {
    header('Content-Type:application/json');
    $kriteria_id = $_GET['kriteria_id'];
    $beasiswa_id = $_GET['beasiswa_id'];
    $model = get_data_parameter_penilaian_for_pengajuan($kriteria_id, $beasiswa_id)->fetch_all(MYSQLI_ASSOC);
    echo json_encode($model);
    return;
}

if(isset($_POST['simpan'])) {
    $request = $_POST;
    $simpan = simpan_pengajuan_beasiswa($request);

    if($simpan['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/pengajuan_beasiswa/tambah.php');
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/pengajuan_beasiswa/index.php');
}

if(isset($_POST['update'])) {
    $request = $_POST;
    $update = update_pengajuan_beasiswa($request);

    if($update['error']) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/pengajuan_beasiswa/edit.php?id='.$request['id']);
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/pengajuan_beasiswa/index.php');
}