<?php
session_start(); // Запускаем сессию
include("assets/php/connect.php");
// Проверяем, авторизован ли пользователь
if (isset($_SESSION['id_user'])) {
    // Если пользователь авторизован, перенаправляем на index.php
    header('Location: index.php');
    exit(); // Завершаем скрипт после перенаправления
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main class="main">
        <form action="assets/php/log/avt.php" method="post">
            <h2 class="zag-text-us">Авторизация</h2>
            <div class="box-inp">
                <div class="on-gtid">
                    <label for="email">Почта</label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="on-gtid">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="on-btn-grig">
                    <input type="submit" name="btn-dever" id="btn-dever" value="Войти">
                    <a href="registration.php" class="btn-perehod">Регистрация</a>
                </div>
            </div>
        </form>
    </main>
</body>
</html>