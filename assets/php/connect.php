<?php
    $connect = new mysqli("localhost", "root", "", "bd_v1");
    if($connect->connect_error){
        die ("Ошибка подключения к базе данных основа");
    }
?>