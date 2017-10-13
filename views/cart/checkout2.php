<?php include ROOT .'/views/layouts/header.php';?>
<div class="checkout_container">
    <div class="catalog-logo">
        Оформление заказа
    </div>
<div class="checkout1">
    <div class="checkout1_border_inactive">
        <span style="color: red;">1.</span> &nbsp;Контактная информация
    </div>
    <div class="checkout1_border_active">
        <span style="color: red;">2.</span> &nbsp;Информация о доставке
    </div>
        <div>

            <div class="checkout2_block">
                <div class="address_info">
                    <div class="checkout_logo" style="position: relative;top: 20px;">
                         Адресс доставки:
                    </div>

                    <form method="post" action="#" id="form2">
                        <input type="hidden" name="order_id" value="<?php echo $id;?>">
                        <div class="address_info_form">

                            <div class="checout_p">
                                 Город:
                            </div>
                            <input class="checkout_login" type="text" name="city" placeholder="Москва" style="width: 300px;" value="<?php echo $userCity;?>">
                            <div class="checout_p">
                                 Улица:
                            </div>
                            <input class="checkout_login" type="text" name="street" placeholder="Знаменка" style="width: 300px;" value="<?php echo $userStreet;?>">
                            <div class="checout_p">
                                Дом:
                            </div>
                            <input  style="width: 50px; text-align: center; padding-left: 0;" class="checkout_login" type="text" name="build" placeholder="52" value="<?php echo $userBuild;?>">
                            <div class="checout_p" style="position:relative; left: 250px; top:-90px;">
                                Квартира:
                            </div>
                            <input  style="position:relative; left: 250px; top:-90px; width: 50px; text-align: center; padding-left: 0;" class="checkout_login" type="text" name="room" placeholder="52" value="<?php echo $userRoom;?>">
                        </div>
                        <div class="ship_info">
                            <div class="checkout_logo">
                                Способ доставки:
                            </div>
                            <div class="radio">
                                <input type="radio" name="ship" value="0" checked="checked">
                                <span>Курьерская доставка с оплтой при получении</span>
                            </div>
                            <div class="radio">
                                <input type="radio" name="ship" value="1">
                                <span>Почта России с наложенным платежом</span>
                            </div>
                            <div class="radio">
                                <input type="radio" name="ship" value="2">
                                <span>Доставка через терминал QIWI Post</span>
                            </div>

                        </div>
                        <div class="coment_box">
                            <div class="checkout_logo">
                                Коментарий к заказу:
                            </div>
                            <div class="checout_p">
                                Введите ваш коментарий:

                            </div>
                            <textarea name="comment" placeholder="Текст коментария" cols="40" rows="7"></textarea>
                        </div>

                        <input style="display: block;position: relative; top: -10px; left: 50px" class="checkout_login_submit" type="submit" name="submit" value="Продолжить">
                </div>

                </form>

            </div>

            <div class="checkout1_border_inactive" style="display: block;position: relative; top: 0px;">
                <span style="color: red;">3.</span> &nbsp;Подтверждение заказа
            </div>

    </div>
</div>
<?php include ROOT .'/views/layouts/footer_else.php';?>
