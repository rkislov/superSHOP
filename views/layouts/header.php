<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>superShop</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/css/prettyPhoto.css" rel="stylesheet">
    <link href="/template/css/price-range.css" rel="stylesheet">
    <link href="/template/css/animate.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">
    <link href='/template/css/jquery.fancybox.min.css' rel='stylesheet' >
    <!--<link href="/template/css/responsive.css" rel="stylesheet">-->

    <!--[if lt IE 9]>
    <script src="/template/js/html5shiv.js"></script>
    <script src="/template/js/respond.min.js"></script>

    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
<div class="container">
    <div class="header">
        <div class="navbar">
            <div class="navbar-brand">
                <div class="brand-text1">
                    super
                </div>
                <div class="brand-text2">
                    shop
                </div>

            </div>
        </div>
        <div class="navbar-nav">
            <div class="nav-pills">
                <div class="menu-item">
                    <ul>
                        <?php foreach($categories as $categoryItem): ?>
                            <li>
                                <a href="/category/<?php echo $categoryItem['id'];?>">
                                <?php echo $categoryItem['name'];?>
                                </a>
                            </li>
                        <?php endforeach;?>

                    </ul>
                </div>
                <div class="nav-pills pull-right">
                    <div class="menu-login">
                        <ul>
                            <?php if (User::isGuest()):?>
                                <li><a href="/user/login" class="login"><i class="fa fa-user"></i> Войти</a></li>
                                <li><a href="/user/register" class="registration">Регистрация</a></li>
                            <?php else:?>
                                <li><a href="/cabinet" class="login"><i class="fa fa-user"></i>Акаунт</a></li>
                                <li><a href="/user/logout" class="registration"><i class="fa fa-unlock"></i> Выход</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="cart pull-right">
                <?php if (Cart::countItems()>=1):?>
                    <div class="summ_inCart" id="total-price"><?php echo number_format(Cart::getTotalPriceInCart(), 0, ',', ' ' );?><span>руб.</span></div>
                <?php  else: ?>
                <div class="summ_inCart" id="total-price">0<span>руб.</span></div>
                <?php endif;?>
                <div class="items_inCart" ><span id="cart-count"><?php echo Cart::countItems();?></span>&nbsp; предметов</div>
                <a href="/cart"><i class="fa fa-shopping-cart shopping_cart fa-4x"></i></a>
            </div>

        </div>
    </div>



