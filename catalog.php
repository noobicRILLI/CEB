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
    <link rel="stylesheet" href="assets/css/catalog.css">
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
        <div class="product-page-title">Каталог</div>
            <div class="product-page-content">
                <div class="left">
                    <div class="product-page__left">
                        <div><!-- костыль -->
                            <button class="collapsible">Цена <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M16.594 8.578L18 9.984L12 15.984L6 9.984L7.406 8.578L12 13.172L16.594 8.578Z">
                            </svg>
                            </button>
                            <div class="content">
                                <div class="price-list">
                                    <div class="min-price">
                                        <input type="number" id="min-price" name="min-price" placeholder="от">
                                    </div>
                                    <div class="max-price">
                                        <input type="number" id="max-price" name="max-price" placeholder="до">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div><!-- костыль -->
                            <button class="collapsible">Наличие в магазинах <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M16.594 8.578L18 9.984L12 15.984L6 9.984L7.406 8.578L12 13.172L16.594 8.578Z">
                            </svg>
                            </button>
                            <div class="content">
                                <div class="availability">
                                    <input type="checkbox" name="yes"><p>В наличии</p>
                                </div>
                                <div class="availability">
                                    <input type="checkbox" name="to-order"><p>Под заказ</p>
                                </div>
                                <div class="availability">
                                    <input type="checkbox" name="no"><p>Отсутсвуют</p>
                                </div>
                            </div>
                        </div>
                        <div><!-- костыль -->
                            <button class="collapsible">Акции <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M16.594 8.578L18 9.984L12 15.984L6 9.984L7.406 8.578L12 13.172L16.594 8.578Z">
                            </svg>
                            </button>
                            <div class="content">
                                <div class="availability">
                                    <input type="checkbox" name="yes"><p>Есть акции</p>
                                </div>
                                <div class="availability">
                                    <input type="checkbox" name="no"><p>Без акции</p>
                                </div>
                            </div>
                        </div>
                        <div><!-- костыль -->
                            <button class="collapsible">Рейтинг 4 и выше <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M16.594 8.578L18 9.984L12 15.984L6 9.984L7.406 8.578L12 13.172L16.594 8.578Z">
                            </svg>
                            </button>
                            <div class="content">
                                <div class="availability">
                                    <input type="checkbox" name="yes"><p>Все</p>
                                </div>
                                <div class="availability">
                                    <input type="checkbox" name="more-4-star"><p>Выше 4-х звёзд</p>
                                </div>
                            </div>
                        </div>
                        <div><!-- костыль -->
                            <button class="collapsible">Производитель <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M16.594 8.578L18 9.984L12 15.984L6 9.984L7.406 8.578L12 13.172L16.594 8.578Z">
                            </svg>
                            </button>
                            <div class="content">
                                <div class="availability">
                                    <input type="checkbox" name="yes"><p>Asus</p>
                                </div>
                                <div class="availability">
                                    <input type="checkbox" name="yes"><p>Gigabyte</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-page__right">
                <?=fncatalogin('all')?> 
                    
                </div>
            </div>
        </div>
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
    <script>
        var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var content = this.nextElementSibling;
        var arrow = this.querySelector('.arrow'); 

        if (content.style.maxHeight) {
            content.style.maxHeight = null;
            arrow.classList.remove("rotate"); 
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
            arrow.classList.add("rotate");
        }
    });
}

        </script>
        <script>
    window.addEventListener('scroll', function() {
  const block = document.querySelector('.product-page__left');
  const scrollPosition = window.scrollY; // Получаем текущую позицию прокрутки
  const maxScroll = 160; // Максимальное расстояние, на которое блок должен сдвигаться вверх
  const startPosition = 168; // Исходное положение блока

  // Если прокрутка меньше максимального значения, сдвигаем блок
  if (scrollPosition < maxScroll) {
    block.style.top = startPosition - scrollPosition + 'px';
  } else {
    block.style.top = startPosition - maxScroll + 'px'; // Ограничиваем сдвиг до maxScroll
  }

  // Если прокрутка возвращается, блок будет плавно возвращаться в исходное положение
  if (scrollPosition === 0) {
    block.style.top = startPosition + 'px'; // Когда прокрутка на самом верху, блок возвращается в исходное положение
  }
});

</script>
</body>
</html>