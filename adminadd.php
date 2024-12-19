<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить товар</title>
    <link rel="stylesheet" href="assets/css/header-footer.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <main class="main d-flex justify-content-center align-items-center">
    <form action="assets/php/process-add-product.php" method="post" enctype="multipart/form-data" class="w-100" style="max-width: 500px;">
        <h2 class="text-center mb-4">Добавление товара</h2>
        
        <div class="form-group">
            <label for="name">Название:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="description">Описание:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="price">Цена:</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="type">Тип:</label>
            <input type="text" name="type" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="manufacturer">Производитель:</label>
            <input type="text" name="manufacturer" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="img">Изображение:</label>
            <input type="file" name="img" class="form-control-file" required>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Добавить товар</button>
    </form>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
