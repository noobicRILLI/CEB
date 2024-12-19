<?php
function fnindexall(){
    global $connect;


    $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `id` AS `id`  FROM `product` ";

    $result = $connect->query($sql);

    if($result->num_rows){
        $data = '<div id="all" class="best-seller-product__card">';
        foreach($result as $item){
            $data .= sprintf('
            <div class="product-card">
                        <div class="card-img"> <a href="tovar.html"><img src="%s" alt="tovar"></a></div>
                        <div class="card-txt">%s</div>
                        <div style="display: flex;"> <!--чтобы card-grade не был во всю ширину-->
                            <div class="card-grade">
                                <img src="assets/img/star.png" alt="">
                                <div class="card-grade__txt">1 отзыв</div>
                            </div>
                        </div>
                        <div class="card-down">
                            <div class="card-price"><p>%s ₽</p></div>
                             <form action="assets/php/add-order.php" method="post">
                                <input type="hidden" name="id_product" value="%s">
                                <input type="hidden" name="id_user" value="%s">
                                <input type="hidden" name="status" value="1">
                                <button class="card-button-buy">
                                    <img src="assets/img/buy.png" alt="">
                                </button>
                            </form>
                            <form action="assets/php/user/favourite.php" method="post">
                                <input type="hidden" name="id_product" value="%s">
                                <input type="hidden" name="id_user" value="%s">
                                <button class="card-button-favourite"> 
                                    <img src="assets/img/favourite.png" alt="">
                                </button>
                            </form>
                        </div>
                    </div>', $item['pimage'], $item['pname'], $item['price'], $item['id'], $id_user = $_SESSION['id_user'], $item['id'], $id_user = $_SESSION['id_user']);
        }
        $data .= '</div>';
        return $data;
    } else {
        return '<h4 class="none">Товаров нет</h4>';
    }
}
function fnindexallspin(){
    global $connect;

    // Изменяем запрос, добавляя LIMIT 5
    $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `id` AS `id` FROM `product` LIMIT 5";

    $result = $connect->query($sql);

    if($result->num_rows){
        $data = '<div id="all" class="new-product__card">';
        foreach($result as $item){
            $data .= sprintf('
            <div class="product-card">
                        <div class="card-img"> <a href="tovar.html"><img src="%s" alt="tovar"></a></div>
                        <div class="card-txt">%s</div>
                        <div style="display: flex;"> <!--чтобы card-grade не был во всю ширину-->
                            <div class="card-grade">
                                <img src="assets/img/star.png" alt="">
                                <div class="card-grade__txt">1 отзыв</div>
                            </div>
                        </div>
                        <div class="card-down">
                            <div class="card-price"><p>%s ₽</p></div>
                             <form action="assets/php/add-order.php" method="post">
                                <input type="hidden" name="id_product" value="%s">
                                <input type="hidden" name="id_user" value="%s">
                                <input type="hidden" name="status" value="1">
                                <button class="card-button-buy">
                                    <img src="assets/img/buy.png" alt="">
                                </button>
                            </form>
                            <form action="assets/php/user/favourite.php" method="post">
                                <input type="hidden" name="id_product" value="%s">
                                <input type="hidden" name="id_user" value="%s">
                                <button class="card-button-favourite"> 
                                    <img src="assets/img/favourite.png" alt="">
                                </button>
                            </form>
                        </div>
                    </div>', $item['pimage'], $item['pname'], $item['price'], $item['id'], $id_user = $_SESSION['id_user'], $item['id'], $id_user = $_SESSION['id_user']);
        }
        $data .= '</div>';
        return $data;
    } else {
        return '<h4 class="none">Товаров нет</h4>';
    }
}
function fncatalogin($typeId) {
    global $connect;

    // Маппинг id на типы товаров
    $typeMapping = [
        'gpu' => 'Видеокарта',
        'cpu' => 'Процессор',
        'ram' => 'Оперативная память',
        'ssd' => 'SSD',
        'hdd' => 'HDD',
        'case' => 'Корпус',
        'mother' => 'Материнская плата',
        'all' => 'all' // Для выбора всех товаров
    ];

    // Проверяем, если id равен 'all', то выводим все товары
    if ($typeId === 'all') {
        $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `type` AS `type`, `id` AS `id`
                FROM `product`";
    } else {
        // Проверяем, существует ли тип в маппинге
        if (!array_key_exists($typeId, $typeMapping)) {
            return '<h4 class="none">Неверный тип товара</h4>';
        }

        $productType = $typeMapping[$typeId];

        // Изменяем запрос, добавляя условие WHERE для фильтрации по типу
        $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price`, `type` AS `type`, `id` AS `id`
                FROM `product` 
                WHERE `type` = '$productType' ";
    }

    $result = $connect->query($sql);

    if ($result->num_rows) {
        $data = sprintf('<div id="product-card__right">', htmlspecialchars($typeId));
        
        foreach ($result as $item) {
            $data .= sprintf('
                <div class="product-card">
                    <div class="card-img"> <a href=""><img src="%s" alt=""></a></div>
                    <div class="product-card__right">
                        <div>
                            <div class="card-txt">%s</div>
                            <div class="card-txt">
                                <p>%s<br></p>
                            </div>
                            <div class="card-additionally">
                                <div style="display: flex;">
                                    <div class="card-grade">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <div class="card-grade__txt">1 отзыв</div>
                                    </div>
                                </div>
                                <div style="display: flex;">
                                    <div class="card-grade">
                                        <img src="assets/img/car.png" alt="">
                                        <div class="card-grade__txt" style="font-weight: 500;">Доставим к вам за 2 часа</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-down">
                            <div class="flex" style="align-items: center;">
                                <div class="card-price"><p>%s ₽</p></div>
                                <form action="assets/php/user/favourite.php" method="post">
                                <input type="hidden" name="id_product" value="%s">
                                <input type="hidden" name="id_user" value="%s">
                                <button class="card-button-favourite"> 
                                    <img src="assets/img/favourite.png" alt="">
                                </button>
                            </form>
                            </div>
                            <form action="assets/php/add-order.php" method="post">
                                <input type="hidden" name="id_product" value="%s">
                                <input type="hidden" name="id_user" value="%s">
                                <input type="hidden" name="status" value="1">
                                <button class="card-button-buy">
                                    <p>В корзину</p>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>', $item['pimage'], $item['pname'], $item['descrip'], $item['price'], $item['id'], $id_user = $_SESSION['id_user'], $item['id'], $id_user = $_SESSION['id_user']);
        }
        $data .= '</div>';
        return $data;
    } 
}




function fnbuy() {
    global $connect;

    // Проверяем, установлен ли id_user в сессии
    if (!isset($_SESSION['id_user'])) {
        echo "Пожалуйста, войдите в систему, чтобы увидеть ваши товары.";
        return;
    }

    $userId = $_SESSION['id_user']; // Получаем id_user из сессии

    // SQL-запрос для выборки данных
    $sql = "
    SELECT 
        p.`name` AS `pname`, 
        p.`img` AS `pimage`, 
        p.`description` AS `descrip`, 
        p.`price` AS `price`, 
        p.`id` AS `id` 
    FROM 
        `product` p
    JOIN 
        `order` o ON p.`id` = o.`id_product`
    WHERE 
        o.`id_user` = ?
    ";

    // Подготавливаем SQL-запрос
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $userId); // Привязываем параметр id_user
    $stmt->execute();
    $result = $stmt->get_result(); // Получаем результат

    // Проверяем, есть ли результаты
    if ($result->num_rows > 0) {
        $data = '<div id="product-card__right">'; // Начинаем формировать HTML-код

        // Проходим по каждому элементу результата
        while ($item = $result->fetch_assoc()) {
            $data .= sprintf('
                <div class="product-card">
                    <div class="card-img"> <a href=""><img src="%s" alt=""></a></div>
                    <div class="product-card__right">
                        <div>
                            <div class="card-txt">%s</div>
                            <div class="card-txt">
                                <p>%s<br></p>
                            </div>
                            <div class="card-additionally">
                                <div style="display: flex;">
                                    <div class="card-grade">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <div class="card-grade__txt">1 отзыв</div>
                                    </div>
                                </div>
                                <div style="display: flex;">
                                    <div class="card-grade">
                                        <img src="assets/img/car.png" alt="">
                                        <div class="card-grade__txt" style="font-weight: 500;">Доставим к вам за 2 часа</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-down">
                            <div class="flex" style="align-items: center;">
                                <div class="card-price"><p>%s ₽</p></div>
                                <div class="card-button-favourite">
                                    <img src="assets/img/favourite.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>',
                htmlspecialchars($item['pimage']),
                htmlspecialchars($item['pname']),
                htmlspecialchars($item['descrip']),
                htmlspecialchars($item['price'])
            );
        }

        $data .= '</div>'; // Закрываем основной контейнер
        echo $data; // Выводим сгенерированный HTML
    } else {
        echo "У вас нет товаров."; // Если результатов нет
    }

    // Закрываем соединение
    $stmt->close();

}






ini_set('display_errors', 0);
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

// Ваш код здесь
function fnpricelist() {
    global $connect; // Подключение к базе данных

    // Запрос для получения id_product и id_user из таблицы order
    $query = "SELECT id_product, id_user FROM `order`";
    $result = mysqli_query($connect, $query);

    // Проверка на наличие ошибок в запросе
    if (!$result) {
        die("Ошибка выполнения запроса: " . mysqli_error($connect));
    }

    $priceList = []; // Массив для хранения цен
    $totalPrice = 0; // Переменная для хранения общей суммы

    // Проходим по всем записям из таблицы order
    while ($row = mysqli_fetch_assoc($result)) {
        $id_product = $row['id_product'];

        // Запрос для получения цены из таблицы product по id_product
        $priceQuery = "SELECT price FROM product WHERE id = ?";
        $stmt = mysqli_prepare($connect, $priceQuery);
        mysqli_stmt_bind_param($stmt, "i", $id_product); // Привязываем id_product к подготовленному запросу
        mysqli_stmt_execute($stmt);
        $priceResult = mysqli_stmt_get_result($stmt);

        // Проверка на наличие ошибок в запросе
        if (!$priceResult) {
            die("Ошибка выполнения запроса: " . mysqli_error($connect));
        }

        // Получаем цену и добавляем в массив
        if ($priceRow = mysqli_fetch_assoc($priceResult)) {
            $price = $priceRow['price'];
            $priceList[] = [
                'id_product' => $id_product,
                'id_user' => $row['id_user'],
                'price' => $price
            ];

            // Суммируем цену
            $totalPrice += $price;
        }

        mysqli_stmt_close($stmt); // Закрываем подготовленный запрос
    }

    // Закрываем основной результат
    mysqli_free_result($result);

    // Выводим общую сумму
    echo  $totalPrice ;


}

function fnfavourite() {
    global $connect;

    // Проверяем, установлен ли id_user в сессии
    if (!isset($_SESSION['id_user'])) {
        echo "Пожалуйста, войдите в систему, чтобы увидеть ваши товары.";
        return;
    }

    $userId = $_SESSION['id_user']; // Получаем id_user из сессии

    // SQL-запрос для выборки данных
    $sql = "
    SELECT 
        p.`name` AS `pname`, 
        p.`img` AS `pimage`, 
        p.`description` AS `descrip`, 
        p.`price` AS `price`, 
        p.`id` AS `id` 
    FROM 
        `product` p
    JOIN 
        `favourite` o ON p.`id` = o.`id_product`
    WHERE 
        o.`id_user` = ?
    ";

    // Подготавливаем SQL-запрос
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $userId); // Привязываем параметр id_user
    $stmt->execute();
    $result = $stmt->get_result(); // Получаем результат

    // Проверяем, есть ли результаты
    if ($result->num_rows > 0) {
        $data = '<div class="product-card__right">'; // Начинаем формировать HTML-код

        // Проходим по каждому элементу результата
        while ($item = $result->fetch_assoc()) {
            $data .= sprintf('
                <div class="product-card">
                    <div class="card-img"> <a href=""><img src="%s" alt=""></a></div>
                    <div class="product-card__right">
                        <div>
                            <div class="card-txt">%s</div>
                            <div class="card-txt">
                                <p>%s<br></p>
                            </div>
                            <div class="card-additionally">
                                <div style="display: flex;">
                                    <div class="card-grade">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <img src="assets/img/star.png" alt="">
                                        <div class="card-grade__txt">1 отзыв</div>
                                    </div>
                                </div>
                                <div style="display: flex;">
                                    <div class="card-grade">
                                        <img src="assets/img/car.png" alt="">
                                        <div class="card-grade__txt" style="font-weight: 500;">Доставим к вам за 2 часа</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-down">
                            <div class="flex" style="align-items: center;">
                                <div class="card-price"><p>%s ₽</p></div>
                                <div class="card-button-favourite">
                                    <img src="assets/img/favourite.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>',
                htmlspecialchars($item['pimage']),
                htmlspecialchars($item['pname']),
                htmlspecialchars($item['descrip']),
                htmlspecialchars($item['price'])
            );
        }

        $data .= '</div>'; // Закрываем основной контейнер
        echo $data; // Выводим сгенерированный HTML
    } else {
        echo "У вас нет товаров."; // Если результатов нет
    }

    // Закрываем соединение
    $stmt->close();

}










    
?>