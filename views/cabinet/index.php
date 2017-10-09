<?php include ROOT .'/views/layouts/header.php';?>
<section>
    <div class="container">
        <div class="row">
            <div class="label">
                Личный кабинет
            </div>
            <div class="cabinet_form">
                <div class="user_inform">
                    <form method="post" action="#">
                        <?php if($result):?>
                            <p>Данные отредактированны</p>
                        <?php else:?>
                            <?php if (isset($errors) && is_array($errors)):?>

                                <ul>
                                    <?php foreach ($errors as $error):?>
                                        <li> - <?php echo $error;?></li>
                                    <?php endforeach;?>
                                </ul>
                            <?php endif;?>
                        <?php endif;?>
                        <div class="user_info_fio">
                            <h1>Ваши данные</h1>
                            <p>Контактное лицо (ФИО)</p>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name;?>"/>
                            <p>Контактный телефон</p>
                            <input type="tel" name="telefon" placeholder="+7 966 700-00-00" value="<?php echo $telefon;?>"/>
                            <p>Email адресс</p>
                            <input type="email" name="email" placeholder="admin@mail.ru" value="<?php echo $email;?>"/>
                        </div>
                        <div class="address">
                            <h1>Адрес доставки</h1>
                            <p>Город</p>
                            <input type="text" name="city" placeholder="Москва" value="<?php echo $city;?>"/>
                            <p>Улица</p>
                            <input type="text" name="street" placeholder="Название улицы" value="<?php echo $street;?>"/>
                            <div class="build_room">
                                <div class="build">
                                    <p>Дом</p>
                                    <input type="text" name="build" placeholder="50" value="<?php echo $build;?>"/>
                                </div>
                                <div class="room">
                                    <p>Квартира</p>
                                    <input type="text" name="room" placeholder="12" value="<?php echo $room;?>"/>
                                </div>
                            </div>

                        </div>
                        <div class="cabinet_passwd">
                            <h1>Изменение пароля</h1>
                            <p>Введите новый пароль</p>
                            <input type="password" name="pass1" placeholder="Пароль" value="">
                            <p>Повторите новый пароль</p>
                            <input type="password" name="pass2" placeholder="Пароль" value="">
                        </div>
                        <input type="submit" name="submit" value="Сохранить"/>
                    </form>
                </div>
                <div class="orders-inform">

                </div>
            </div>
        </div>
    </div>
</section>
<?php include ROOT .'/views/layouts/footer.php';?>
