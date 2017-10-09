<?php include ROOT.'/views/layouts/header.php';?>
    <section>
        <div class="label">
            Авторизация
        </div>
        <div class="container">
            <div class="log_form">
                <form method="post" action="#">
                    <?php if (isset($errors) && is_array($errors)):?>
                        <ul>
                            <?php foreach ($errors as $error):?>
                                <li> - <?php echo $error;?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif;?>
                    <div class="fio">

                        <p>E-mail</p>
                        <input type="email" name="email" placeholder="admin@mail.ru" value="<?php echo $email;?>">

                        <p>Пароль</p>
                        <input type="password" name="password" placeholder="Пароль" value="">
                    </div>
                    <div class="tryregister">

                        <a href="/user/register" class="log_register">Зарегистрироваться</a>
                    </div>

                    <input type="submit" class="login_register_button" name="submit" value="Войти"/>
                    <a href="#" class="forget_pass">забыли пароль ?</a>
                </form>

            </div>
        </div>
    </section>

<?php include ROOT.'/views/layouts/footer.php';?>