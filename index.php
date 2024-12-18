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
    <link rel="stylesheet" href="assets/css/index.css">
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
    <div class="homepage">
        <div class="homepage__slider">
            <img src="assets/img/index.png" alt="">
        </div>
        <div class="homepage__best-seller">
            <div class="best-seller-tittle">Хиты продаж</div>
            <hr>
            <div class="best-seller-product">
 
                <?=fnindexall()?>

                <button class="prev" onclick="changeSlide(-1, 'another')">&#10094;</button>
        <button class="next" onclick="changeSlide(1, 'another')">&#10095;</button>
            </div>
        </div>
        <div class="homepage__new">
            <div class="new-tittle">Новинки</div>
            <hr>
            <div class="new-product">
                <div class="new-product__card">
                <?=fnindexallspin()?>
                </div>
                <button class="prev" onclick="changeSlide(-1, 'new')">&#10094;</button>
        <button class="next" onclick="changeSlide(1, 'new')">&#10095;</button>
            </div>
        </div>
        <div class="homepage__news-and-review">
            <div class="news-and-review">Новости и обзоры</div>
            <hr>
            <div class="news-and-review__product">
                <div class="news-product">
                    <div style="position: relative;">
                        <div class="news-product__img"><img src="assets/img/news-vidiocard.png" alt=""></div>
                        <div class="block">
                            <div class="block-txt">
                                <p>Intel представила Arc B580 и Arc B570</p>
                                <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-product">
                    <div style="position: relative;">
                        <div class="news-product__img-2"><img src="assets/img/news-monitor.png" alt=""></div>
                        <div class="block-2">
                            <div class="block-txt">
                                <p>Ultrawide или несколько мониторов?</p>
                                <p>Трудности выбора и подводные камни разных вариантов</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-product">
                    <div style="position: relative;">
                        <div class="news-product__img"><img src="assets/img/news-vidiocard.png" alt=""></div>
                        <div class="block">
                            <div class="block-txt">
                                <p>Intel представила Arc B580 и Arc B570</p>
                                <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-product">
                    <div style="position: relative;">
                        <div class="news-product__img-2"><img src="assets/img/news-monitor.png" alt=""></div>
                        <div class="block-2">
                            <div class="block-txt">
                                <p>Ultrawide или несколько мониторов?</p>
                                <p>Трудности выбора и подводные камни разных вариантов</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="news-product">
                    <div style="position: relative;">
                        <div class="news-product__img"><img src="assets/img/news-vidiocard.png" alt=""></div>
                        <div class="block">
                            <div class="block-txt">
                                <p>Intel представила Arc B580 и Arc B570</p>
                                <p>Настоящие конкуренты RTX 4060 и RX 7600</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/slider.js"></script>

</body>
</html>