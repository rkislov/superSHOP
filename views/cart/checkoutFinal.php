<?php include ROOT .'/views/layouts/header.php';?>
<div class="checkout_container">
    <div class="catalog-logo">
        Оформление заказа
    </div>

    <div class="order_accept">
        <div class="order_accept_text">
            <span style="font-family: 'Supermolot Bold'">Заказ № <?php echo $order['order_num'];?></span>
            <span style="color: red;font-family: 'Supermolot Bold'">успешо оформлен</span>
            <p style="padding-top: 20px;">Спасибо за ваш заказ.</p>
            <p style="padding-top: 20px; width: 500px;">В ближайшее время с Васми свяжеться оператор доя уточнения времени доставки</p>
            <a href="/" >Вернуться в магазин</a>
        </div>
    </div>
    <?php include ROOT .'/views/layouts/footer_else.php';?>
