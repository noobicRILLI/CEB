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
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Авторизация</title>
    <style>

        .main {
            height: 100vh; 
        }
    </style>
</head>
<body>

<main class="main d-flex justify-content-center align-items-center">
    <form action="assets/php/log/avt.php" method="post" class="w-100" style="max-width: 400px;">
        <h2 class="text-center mb-4">Авторизация</h2>
        <div class="form-group">
            <label for="email">Почта</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <input type="submit" name="btn-dever" id="btn-dever" class="btn btn-primary" value="Войти">
            <a href="registration.php" class="btn btn-link">Регистрация</a>
        </div>
    </form>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
