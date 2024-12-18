<?php
    include '../connect.php';

    if($_GET['type']=='completed'){
        $sql = sprintf("SELECT * FROM `basket` WHERE `id`='%s'", $_GET['id_task']);
        $status = $connect->query($sql)->fetch_assoc();
        $sql = sprintf("UPDATE `basket` SET `status`='2' WHERE `id`='%s'", $_GET['id_task']);
        $connect->query($sql);
        header("Location: ../../../user.php");
        exit;
    }elseif($_GET['type']=='cancelled'){
        $sql = sprintf("SELECT * FROM `basket` WHERE `id`='%s'", $_GET['id_task']);
        $status = $connect->query($sql)->fetch_assoc();
        $sql = sprintf("UPDATE `basket` SET `status`='3' WHERE `id`='%s'", $_GET['id_task']);
        $connect->query($sql);
        header("Location: ../../../user.php");
        exit;
    }
    header("Location: ../../../index.php");
    exit;
?>