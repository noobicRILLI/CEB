<?php
session_start(); // Начинаем сессию

// Подключение к базе данных
include("../connect.php"); // Путь к файлу подключения к базе данных

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем id_product из формы
    $id_product = isset($_POST['id_product']) ? $_POST['id_product'] : null;
    // Получаем id_user из формы
    $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : null;

    // Проверка, авторизован ли пользователь
    if (!isset($_SESSION['id_user'])) {
        die("Ошибка: пользователь не авторизован.");
    }

    // Если id_user не передан через форму, используем значение из сессии
    $id_user = $_SESSION['id_user'];

    // Проверяем, существует ли товар в таблице favourite
    $stmt = $connect->prepare("SELECT `count` FROM `favourite` WHERE id_user = ? AND id_product = ?");
    if ($stmt === false) {
        die("Ошибка подготовки запроса: " . $connect->error);
    }

    $stmt->bind_param("is", $id_user, $id_product); // Привязываем параметры
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Если товар уже есть в списке, обновляем количество
        $stmt->bind_result($current_count);
        $stmt->fetch();
        $new_count = $current_count + 1;

        // Обновляем количество в базе данных
        $update_stmt = $connect->prepare("UPDATE `favourite` SET `count` = ? WHERE id_user = ? AND id_product = ?");
        if ($update_stmt === false) {
            die("Ошибка подготовки запроса для обновления: " . $connect->error);
        }

        $update_stmt->bind_param("iis", $new_count, $id_user, $id_product); // Привязываем параметры

        if ($update_stmt->execute()) {
            echo "Количество товара обновлено в избранном!";
        } else {
            echo "Ошибка: " . $update_stmt->error;
        }

        // Закрытие подготовленного выражения
        $update_stmt->close();
    } else {
        $count = 1;

        // Подготовка SQL-запроса для вставки
        $insert_stmt = $connect->prepare("INSERT INTO `favourite` (id_user, id_product, `count`) VALUES (?, ?, ?)");
        if ($insert_stmt === false) {
            die("Ошибка подготовки запроса для вставки: " . $connect->error);
        }

        $insert_stmt->bind_param("isi", $id_user, $id_product, $count); 

        // Выполнение запроса
        if ($insert_stmt->execute()) {
            header('Location: ../../../favorite.php');
        } else {
            echo "Ошибка: " . $insert_stmt->error;
        }

        // Закрытие подготовленного выражения
        $insert_stmt->close();
    }

    // Закрытие подготовленного выражения
    $stmt->close();
}

// Закрытие соединения
$connect->close();
?>
