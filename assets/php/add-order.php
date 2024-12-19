<?php
include("connect.php"); // Подключение к базе данных

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $id_product = intval($_POST['id_product']);
    $id_user = intval($_POST['id_user']);
    $status = intval($_POST['status']);



    // Проверяем, что соединение установлено
    if ($connect) {
        // Подготовка SQL-запроса для проверки существования записи
        $checkStmt = $connect->prepare("SELECT status FROM `order` WHERE id_product = ? AND id_user = ? AND status = ?");
        
        // Проверяем, что подготовка прошла успешно
        if ($checkStmt) {
            $checkStmt->bind_param("iii", $id_product, $id_user, $status);
            $checkStmt->execute();
            $checkStmt->store_result();

            if ($checkStmt->num_rows > 0) {
                // Если запись существует, обновляем статус
                $updateStmt = $connect->prepare("UPDATE `order` SET status = status + 1 WHERE id_product = ? AND id_user = ? AND status = ?");
                
                if ($updateStmt) {
                    $updateStmt->bind_param("iii", $id_product, $id_user, $status);
                    if ($updateStmt->execute()) {
                        header('Location: ../../cart.php');
                    } else {
                        echo "Ошибка обновления: " . $updateStmt->error;
                    }
                    $updateStmt->close();
                } else {
                    echo "Ошибка подготовки запроса для обновления: " . $connect->error;
                }
            } else {
                // Если записи нет, вставляем новую
                $insertStmt = $connect->prepare("INSERT INTO `order` (id_product, id_user, status) VALUES (?, ?, ?)");
                
                if ($insertStmt) {
                    $insertStmt->bind_param("iii", $id_product, $id_user, $status);
                    if ($insertStmt->execute()) {
                        header('Location: ../../cart.php');
                    } else {
                        echo "Ошибка: " . $insertStmt->error;
                    }
                    $insertStmt->close();
                } else {
                    echo "Ошибка подготовки запроса для вставки: " . $connect->error;
                }
            }

            $checkStmt->close();
        } else {
            echo "Ошибка подготовки запроса для проверки: " . $connect->error;
        }
    } else {
        echo "Ошибка подключения к базе данных.";
    }

    // Закрытие подключения
    $connect->close();
}


?>
