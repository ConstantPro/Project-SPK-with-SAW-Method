<?php 
require(__DIR__.'/../../../functions/functions.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = delete_user($id);
    if($delete) {
        header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/user/index.php');
        return;
    }

    header('Location:http://'.$_SERVER['HTTP_HOST'].'/view/master_data/user/index.php');
    return;
}