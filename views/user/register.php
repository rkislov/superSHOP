<?php include ROOT.'/views/layouts/header.php';?>
<section>
    <div class="label">
        Регистрация
    </div>
    <div class="container">
        <div class="register_form">
            <form method="post" action="#">
                <?php if (isset($errors) && is_array($errors)):?>
                    <ul>
                        <?php foreach ($errors as $error):?>
                            <li> - <?php echo $error;?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif;?>
                <div class="fio">
                    <p>Контактное лицо ФИО</p>
                    <input type="text" name="name" placeholder="Василий" value="<?php echo $name;?>">
                    <p>E-mail</p>
                    <input type="email" name="email" placeholder="admin@mail.ru" value="<?php echo $email;?>">
                </div>
                <div class="pass">
                    <p>Пароль</p>
                    <input type="password" name="pass1" placeholder="Пароль" value="">
                    <p>Повторите пароль</p>
                    <input type="password" name="pass2" placeholder="Пароль" value="">
                </div>

                <input type="submit" name="submit" value="Зарегистрироваться"/>
            </form>

        </div>
    </div>
</section>

<?php include ROOT.'/views/layouts/footer.php';?>