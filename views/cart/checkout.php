<?php include ROOT .'/views/layouts/header.php';?>
<div class="checkout_container">
    <div class="catalog-logo">
        Оформление заказа
    </div>
<div class="checkout1">
    <div class="checkout1_border_active">
        <span style="color: red;">1.</span> &nbsp;Контактная информация
    </div>
        <div>
            <div class="login_form">
                <?php if (User::isGuest()):?>
                <div class="checkout_logo">
                    Быстрый вход
                </div>
                <form method="post" action="/cart/login" id="form1">
                    <div class="checout_p">Ваш e-mail:</div>
                    <input class="checkout_login" type="email" name="email" placeholder="admin@mail.ru" value="">
                    <div class="checout_p">Пароль:</div>
                    <input class="checkout_login" type="password" name="password" placeholder="Пароль" value=""><br/>
                    <input class="checkout_login_submit" type="submit" name="submit" value="Войти">
                </form>
                <?php endif;?>

            </div>
            <div class="checkout_user_info">
                <?php if (User::isGuest()):?>
                <div class="checkout_logo">
                    Для новых покупателей
                </div>
                <?php else:?>
                    <div class="checkout_logo">
                        Ваши данные
                    </div>
                <?php endif;?>
                <form method="post" action="#" id="form2">
                    <?php if (isset($errors) && is_array($errors)):?>
                    <ul>
                        <?php foreach ($errors as $error):?>
                            <li> - <?php echo $error;?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif;?>
                    <div class="checout_p">
                        Контактные лицо (ФИО)
                    </div>
                    <input class="checkout_login" type="text" name="name" placeholder="Сергей" value="<?php echo $userName;?>">
                    <div class="checout_p">
                        Контактный телефон
                    </div>
                    <input class="checkout_login" type="tel" name="telefon" placeholder="89667009999" value="<?php echo $userTelefon;?>">
                    <div class="checout_p">
                        Email
                    </div>
                    <input class="checkout_login" type="email" name="email" placeholder="admin@mail.ru" value="<?php echo $userEmail;?>">
                    <input class="checkout_login_submit" type="submit" name="submit" value="Продолжить">
                </form>
            </div>
            <div class="checkout1_border_inactive">
                <span style="color: red;">2.</span> &nbsp;Информация о доставке
            </div>
            <div class="checkout1_border_inactive">
                <span style="color: red;">3.</span> &nbsp;Подтверждение заказа
            </div>

    </div>
</div>
<?php include ROOT .'/views/layouts/footer_else.php';?>
