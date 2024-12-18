<?php
session_start();

// Уничтожение всех данных сессии
$_SESSION = array();

// Если сессия была запущена с помощью cookie, удаляем cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Уничтожаем сессию
session_destroy();

// Перенаправление на страницу входа или главную страницу
header('Location: ../../../index.php?message=Вы вышли из аккаунта');
exit;
?>
