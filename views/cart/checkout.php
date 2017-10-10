<?php include ROOT .'/views/layouts/header.php';?>
<div class="checkout_container">
    <div class="catalog-logo">
        Оформление заказа
    </div>
    <div class="horizontal-click">
        <input type="radio" name="vkl" id="vkl1" checked="checked"/>
        <label for="vkl1"><span style="color: red; font-size: 20px;">1.</span>&nbsp;Контактная информация</label>
        <div>
            <div class="login_form">
                <?php if (User::isGuest()):?>
                <div class="checkout_logo">
                    Быстрый вход
                </div>
                <form method="post" action="/cart/login">
                    <div class="checkou_p">Ваш e-mail:</div>
                    <input class="checkout_login" type="email" name="email" placeholder="admin@mail.ru" value="">
                    <div class="checkou_p">Пароль:</div>
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

            </div>

        </div>
        <input type="radio" name="vkl" id="vkl2"/>
        <label for="vkl2"><span style="color: red; font-size: 20px;">2.</span>&nbsp;Информаци о доставке</label>
        <div>Вкладка 2</div>
        <input type="radio" name="vkl" id="vkl3"/>
        <label for="vkl3"><span style="color: red; font-size: 20px;">3.</span>&nbsp;Подтверждение заказа</label>
        <div>Вкладка 3</div>
    </div>

<?php include ROOT .'/views/layouts/footer_else.php';?>
