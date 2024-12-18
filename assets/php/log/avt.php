<?php
    session_start();
    // Подключение
    include '../connect.php';
    // Нахождение строки где совпадает и логин и пароль с вееденным 
    $sql = sprintf("SELECT * FROM `user` WHERE `email` = '%s' AND `password` = '%s'", $_POST['email'], $_POST['password']);
    $res = $connect->query($sql);
    if($res->num_rows){
        $row = $res->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        $_SESSION['id_user'] = $row['id'];
        $role = $row['role'];
        // Определение роли человека 
        $rol=sprintf("SELECT `id`,`role` FROM `role` WHERE `id`='%s'",$role);
        $rol_res = $connect->query($rol);
        $rol_row = $rol_res->fetch_assoc();
        if(!$rol_res = $connect->query($rol)){
            echo "Ошибка получения данных";
        }
        $_SESSION['role']=$rol_row['role'];
        // Сообщение о входе
        header('Location: ../../../user.php?message=Вы вошли. Здравствуйте, '. $_SESSION["role"]);
        exit;
    }else{
        // Сообщение об ошибке
        header("Location: ../../../reg.php?message=Некорректный логин или пароль");
        exit;
    }
?>