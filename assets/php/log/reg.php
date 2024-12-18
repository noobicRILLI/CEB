<?php
    session_start();
    // Подключение
    include '../connect.php';
    // Внисение данных в таб юзер
    $sql = sprintf("INSERT INTO `user`(`id`, `name`, `email`, `password`, `role`, `phone`) VALUES (NULL,'%s','%s','%s','2','%s')",
        $_POST['name'],
        $_POST['email'],
        $_POST['password'],
        $_POST['phone']
    );
    // Проверка на отправление данных
    if(!$connect -> query($sql)){
        echo "Ошибка добавления данных";
        header('Location: ../../../registration.php?message=Вы не зарегистрировались');
        exit;
    }
    $_SESSION['email'] = $_POST['email'];
    $email=$_SESSION['email'];
    $role = "2";
    // Нахождение роли пользователя
    $rol=sprintf("SELECT `id`,`role` FROM `role` WHERE `id`='%s'",$role);
    $rol_res = $connect->query($rol);
    $rol_row = $rol_res->fetch_assoc();
    if(!$rol_res = $connect->query($rol)){
        echo "Ошибка получения данных";
    }
    $_SESSION['role']=$rol_row['role'];
    // Сообщение о входе
    header('Location: ../../../avtorization.php?message=Вы вошли. Здравствуйте, '. $_SESSION["role"]);
    exit;
?>