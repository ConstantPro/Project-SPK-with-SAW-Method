<?php

require_once('./functions.php');

if(isset($_GET['beasiswa'])) {
    $beasiswa_id = $_GET['beasiswa'];
    $data = get_data_perhitungan($beasiswa_id)->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
    return;
}