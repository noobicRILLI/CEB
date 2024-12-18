<?php
    session_start();
    include 'assets/php/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/header-footer.css">
</head>
<body>
<header>
    <div class="headdowncont">
      <div class="headdown">
        <img
          src="assets/img/logo.png"
          alt="logo"
          class="logo"
          onclick="location.href='index.php'"
        />
        <button class="catalogbut" onclick="location.href='catalog.html'">
          <span>Каталог</span
          ><img src="assets/img/catalog.png" alt="catalog" />
        </button>
        <div class="search">
          <input type="text" placeholder="Поиск" />
          <img src="assets/img/Search.png" alt="searchicon" />
        </div>
        <nav class="headbtns">
          <button type="button" onclick="location.href='user.php'">
            <img src="assets/img/Profile_Circle-192x192.png" alt="profile" />
            <span>Профиль</span>
          </button>
          <button type="button" onclick="location.href='cart.html'">
            <img src="assets/img/Shopping_Card-192x192.png" alt="cart" />
            <span>Корзина</span>
          </button>
          <button type="button" onclick="location.href='favorite.html'">
            <img src="assets/img/Heart-192x192.png" alt="fav" />
            <span>Избранное</span>
          </button>
        </nav>
      </div>
    </div>
  </header>
    <div class="user-page">
        <div class="user-page-txt">
            <p>Личный кабинет</p>
        </div>
        <div class="content">
            <div class="left">
                <a href="#">Мой профиль</a>
                <a href="#">Избранные</a>
                <a href="#">Мои бонусы</a>
                <a href="#">Мой адрес</a>
                <a href="#">Обращения</a>
                <a href="#">Сменить пароль</a>
                <a href="assets/php/log/logout.php" style="color: #969696;">Выйти</a>
            </div>
            <div class="profile">
                <div class="profile-icon">
                    <div class="user-icon">
                        <img src="assets/img/400-2.webp" alt="">
                    </div>
                    <p>Аккакунт номер  
                        <?php if (!isset($_SESSION['id_user'])) {
                            echo ' ';
                        } else {
                            echo htmlspecialchars($_SESSION['id_user']);
                        } ?> 
                    </p>
                </div>
                <div class="data">

                <?php
session_start(); 



// Проверяем, установлен ли идентификатор пользователя в сессии
if (!isset($_SESSION['id_user'])) {
    die("<a style='color:#FF0000;' class='but' href='avtorization.php'>Пожалуйста, войдите в систему.</a>"); // Если не установлен, выводим сообщение
}
$user_id = $_SESSION['id_user']; // Получаем идентификатор текущего пользователя

// SQL-запрос для извлечения данных только для текущего пользователя
$query = "SELECT `id`, `name`, `email` FROM `user` WHERE `id` = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("i", $user_id); // Привязываем параметр
$stmt->execute();
$result = $stmt->get_result();

// Проверяем, выполнен ли запрос
if (!$result) {
    die("Ошибка выполнения запроса: " . mysqli_error($connect));
}


if (mysqli_num_rows($result) > 0) {
    
    
    
    // Выводим каждую строку результата
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='block'>";
        echo "<div class='id-number'> <p>Номер-регистрации</p>" . htmlspecialchars($row['id']) . "</div>";
        echo "</div>";
        echo "<div class='block'>";
        echo "<div class='id-number'> <p>Имя</p>" . htmlspecialchars($row['name']) . "</div>";
        echo "</div>";
        echo "<div class='block'>";
        echo "<div class='id-number'> <p>Email</p>" . htmlspecialchars($row['email']) . "</div>";
        echo "</div>";
        //Можно добавить ещё

    }
    

} else {
    echo "Нет данных для отображения.";
}


$stmt->close(); 
mysqli_close($connect); 
?>




                </div>
            </div>
        </div>
    </div>
</body>
</html>