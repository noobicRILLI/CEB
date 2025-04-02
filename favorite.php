<?php
session_start();
include("assets/php/connect.php");
include("assets/php/function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/favourite.css">
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
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
      <button class="catalogbut" onclick="location.href='catalog.php'">
        <span>Каталог</span><img src="assets/img/catalog.png" alt="catalog" />
      </button>
      <div class="search">
        <input type="text" placeholder="Поиск" />
        <img src="assets/img/Search.png" alt="searchicon" />
      </div>
      <!-- Бургер-меню для мобильных устройств -->
      <div class="burger-menu" onclick="toggleMenu()">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
      <nav class="headbtns">
        <button type="button" onclick="location.href='user.php'">
          <img src="assets/img/Profile_Circle-192x192.png" alt="profile" />
          <span>Профиль</span>
        </button>
        <button type="button" onclick="location.href='cart.php'">
          <img src="assets/img/Shopping_Card-192x192.png" alt="cart" />
          <span>Корзина</span>
        </button>
        <button type="button" onclick="location.href='favorite.php'">
          <img src="assets/img/Heart-192x192.png" alt="fav" />
          <span>Избранное</span>
        </button>
      </nav>
    </div>
  </div>
</header>

<nav class="mobile-nav">
  <button type="button" onclick="location.href='user.php'">
    Профиль
  </button>
  <button type="button" onclick="location.href='cart.php'">
    Корзина
  </button>
  <button type="button" onclick="location.href='favorite.php'">
    Избранное
  </button>
</nav>

<script>
    function toggleMenu() {
  var menu = document.querySelector('.mobile-nav');
  menu.classList.toggle('active');
}
</script>
  <div class="product-page">
  <?=fnfavourite()?>
  </div>
  <footer>
  <div class="len">
  <div class="footer">
  
      <div class="pp">
        <p>Часто задаваемые вопросы</p>
          <p>Зачем мы это делаем?</p>
          <p>Что нам это даёт?</p>
          <p>Как мы живы после ковида?</p>
          <p>Почему такие дешёвые билеты?</p>
      </div>
      <div class="pp">
          <p>Пользователи</p>
          <p>О сервисе</p>
          <p>Служба поддержки</p>
          <p>Пользовательское соглашение</p>
          <p>Участие в иследовании</p>
      </div>
      <div class="pp">
          <p>Партёрам</p>
          <p>Реклама</p>
          <p>Сотрудничество</p>
          <p>Деньги</p>
          <p>Партнёрская программа</p>
      </div>
      <div class="pp">
          <p>Работа</p>
          <p>Стажировка</p>
          <p>Деньги</p>
          <p>Трудоустройство</p>
          <p>Карьера</p>
      </div>
      <div class="soc">
          <a href="https://vk.com/"><img src="/assets/img/vk.png" alt="vk" /></a>
          <a href="https://web.telegram.org/"><img src="assets/img/telegram.png" alt="telegram" /></a>
          <a href="https://youtube.com/"><img src="assets/img/youtube.png" alt="youtube" /></a>
          <a href="https://tiktok.com/"><img src="assets/img/tiktok.png" alt="tiktok" /></a>
        </div>
  </div>
  <p style="color: #000; text-align: center;">© 2003–2024 MobileAPP - Что вы тут забыли?</p>
  </div>
</footer>
</body>
</html>