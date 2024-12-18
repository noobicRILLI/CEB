<?php
function fnindexall(){
    global $connect;

    // Изменяем запрос, добавляя LIMIT 5
    $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price` FROM `product` LIMIT 5";

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
                            <div class="card-button-buy">
                                <img src="assets/img/buy.png" alt="">
                            </div>
                            <div class="card-button-favourite">
                                <img src="assets/img/favourite.png" alt="">
                            </div>
                        </div>
                    </div>', $item['pimage'], $item['pname'], $item['price'], $item['descrip']);
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
    $sql = "SELECT `name` AS `pname`, `img` AS `pimage`, `description` AS `descrip`, `price` AS `price` FROM `product` LIMIT 5";

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
                            <div class="card-button-buy">
                                <img src="assets/img/buy.png" alt="">
                            </div>
                            <div class="card-button-favourite">
                                <img src="assets/img/favourite.png" alt="">
                            </div>
                        </div>
                    </div>', $item['pimage'], $item['pname'], $item['price'], $item['descrip']);
        }
        $data .= '</div>';
        return $data;
    } else {
        return '<h4 class="none">Товаров нет</h4>';
    }
}
?>