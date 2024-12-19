<?php
session_start();
include("assets/php/connect.php");
include("assets/php/function.php");

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/cart.css" />
    <link rel="stylesheet" href="assets/css/catalog.css" />
    <link rel="stylesheet" href="assets/css/header-footer.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
    <title>CompTech</title>
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
    <main>
      <div id="myModal" class="modal">
        <!-- Контент в модальном окне -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <div class="obrat">
            <h1>Обратная связь</h1>
            <form class="obratform">
            <input type="email" placeholder="E-mail">
            <input type="text" placeholder="Имя">
            <textarea placeholder="Сообщение"></textarea>
            <button type="submit">Отправить</button>
          </form>
          </div>
        </div>
      </div>
        <section class="cartcont">
            <div class="cart">
        <div class="tovarcont">
            <h1>Корзина</h1>
            
            <?=fnbuy()?> 
    <div class="tovleft">
    
      <div class="order">
<h1>Оформление заказа</h1>
<form class="ordercont" id="myForm">
<div class="town">
  <p>Город Доставки</p>
  <input type="text" placeholder="Город" value="Москва" name="city" id="city" required>
</div>
<div class="checkscont">
<p>Способ получения</p>
<div class="checks">
  <div class="deliv1">
    <label>
      <input type="radio" name="delivery_option" value="delivery" id="delivery" checked>
      <div class="word_opts">
        <p>Доставка</p>
        <p>490 руб/завтра</p>
      </div>
    </label>
  </div>
  <div class="deliv2">
    <label>
      <input type="radio" name="delivery_option" value="fromshop" id="fromshop">
      <div class="word_opts">
        <p>Самовывоз</p>
        <p>Бесплатно</p>
      </div>
    </label>
  </div>
</div>
</div>
<div id="delivery_adress" class="delivery_adress">
  <p>Адрес доставки</p>
  <input placeholder="Адрес" type="text" name="adress" id="adress">
  <div class="delad">
    <input placeholder="Подъезд" type="text" name="section" id="section">
    <input placeholder="Этаж" type="text" name="floor" id="floor">
    <input placeholder="Квартира/Офис" type="text" name="room" id="room">
  </div>
</div>
<div class="payment_method">
  <p>Способ оплаты</p>
  <div class="checks">
    <div class="deliv1">
      <label>
        <input type="radio" name="payment_method" value="cash">
        <div class="word_opts">
          <p>Наличными</p>
          <p>Оплата наличными при получении заказа</p>
        </div>
      </label>
    </div>
    <div class="deliv2">
      <label>
        <input type="radio" name="payment_method" value="online">
        <div class="word_opts">
          <p>Онлайн</p>
          <p>Безопасная оплата банковской картой онлайн</p>
        </div>
      </label>
      </div>
    </div>
</div>
<div class="personal_data">
  <p>Контактные данные</p>
<div class="personal1">
<input type="text" placeholder="ФИО" name="full_name" required>
<input type="email" placeholder="Email" name="email" required>
</div>
<div class="personal2">
  <input type="tel" placeholder="Телефон" name="tel" required>
  <input type="tel" placeholder="Телефон(дополнительный)" name="tel2">
  </div>
</div>
<div class="comments">
<p>Дополнительная информация</p>
<textarea name="comment" id="comment">
  Комментарий к заказу
  </textarea>
</div>
</form>
      </div>
    </div>
        </div>
        <div class="buy">
            <div class="txt1">
                <p>Ваши товары</p>
                <p>  <?=fnpricelist()?></p> 
            </div>
            <div class="txt1">
                <p>Способ получения</p>
                <p>Доставка</p>
            </div>
            <div class="txt1">
                <p>Стоимость доставки</p>
                <p>480₽</p>
            </div>
            <hr>
            <div class="txt2 txt1">
                <p>Итого к оплате</p>
                <p><?=fnpricelist()?> ₽</p>
            </div>
            <button type="submit" id="submitButton">Оформить заказ</button>
            <p class="txt3">Нажимая на кнопку "Оформить заказ", Вы соглашаетесь с условиями оферты и политики конфиденциальности</p>
        </div>
    </div>
    </section>
    </main>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
    const numberInput = document.getElementById('number');
    const increaseButton = document.getElementById('increase');
    const decreaseButton = document.getElementById('decrease');

    increaseButton.addEventListener('click', () => {
        numberInput.value = parseInt(numberInput.value) + 1;
    });

    decreaseButton.addEventListener('click', () => {
        numberInput.value = Math.max(0, parseInt(numberInput.value) - 1);
    });
});
    </script>
     <script>
      const deliveryRadio = document.getElementById('delivery');
      const fromShopRadio = document.getElementById('fromshop');
      const input1 = document.getElementById('adress');
      const input2 = document.getElementById('section');
      const input3 = document.getElementById('floor');
      const input4 = document.getElementById('room');
  
      // Функция для обновления атрибута required
      function updateRequiredFields() {
          if (deliveryRadio.checked) {
              input1.setAttribute('required', 'required');
              input2.setAttribute('required', 'required');
              input3.setAttribute('required', 'required');
              input4.setAttribute('required', 'required');
          } else {
              input1.removeAttribute('required');
              input2.removeAttribute('required');
              input3.removeAttribute('required');
              input4.removeAttribute('required');
          }
      }
  
      // Добавляем обработчики событий change для радиокнопок
      deliveryRadio.addEventListener('change', updateRequiredFields);
      fromShopRadio.addEventListener('change', updateRequiredFields);
  </script>
  
  <script>
    document.getElementById('submitButton').addEventListener('click', function() {
        // Получаем форму
        const form = document.getElementById('myForm');
        
        // Проверяем, валидна ли форма
        if (form.checkValidity()) {
            // Если форма валидна, отправляем её
            form.submit();
        } else {
            // Если форма не валидна, показываем сообщения об ошибках
            form.reportValidity();
        }
    });
</script>
<script>
  const deliveryRadio1 = document.getElementById('delivery'); // Радиокнопка "Доставка"
  const fromShopRadio1 = document.getElementById('fromshop'); // Радиокнопка "Самовывоз"
  const deliveryAddressDiv = document.getElementById('delivery_adress'); // Блок с адресом доставки

  // Функция для обновления видимости блока с адресом доставки
  function updateDeliveryAddressVisibility() {
      if (deliveryRadio1.checked) {
          deliveryAddressDiv.style.display = 'block'; // Показываем блок
      } else {
          deliveryAddressDiv.style.display = 'none'; // Скрываем блок
      }
  }

  // Добавляем обработчики событий change для радиокнопок
  deliveryRadio1.addEventListener('change', updateDeliveryAddressVisibility);
  fromShopRadio1.addEventListener('change', updateDeliveryAddressVisibility);
</script>
<script>
  // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 
</script>
  </body>
</html>
