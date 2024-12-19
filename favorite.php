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
  <div class="product-page">
  <?=fnfavourite()?>
  </div>
</body>
</html>