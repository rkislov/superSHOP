<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Админпанель</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/css/prettyPhoto.css" rel="stylesheet">
    <link href="/template/css/price-range.css" rel="stylesheet">
    <link href="/template/css/animate.css" rel="stylesheet">
    <link href="/template/css/style.css" rel="stylesheet">
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
</head>
<body>
<div class="container-admin">
    <div class="sidemenu">
        <div class="admin_brand">
            <div class="admin_text1">
                super
            </div>
            <div class="admin_text2">
                Shop
            </div>

        </div>
        <div class="sidemenu-menu">
            <div class="sidemenu-button">
                <a href="#"><i class="fa fa-shopping-cart"></i> Заказы</a></>
        </div>
        <div class="sidemenu-button">
            <a href="#"><i class="fa fa-user"></i> Пользователи</a>
        </div>
        <div class="sidemenu-button">
            <a href="/admin/product"><i class="fa fa-inbox"></i> Товары</a>
        </div>
        <div class="sidemenu-button">
            <a href="/admin/category"><i class="fa fa-th"></i> Категории</a>
        </div>


    </div>
    <div class="sidemenu-down">
        <div class="sidemenu-down-button">
            <a href="/user/cabinet" class="admin_user"><?php echo User::getUserEmail();?></a>
        </div>
        <div class="sidemenu-down-button">
            <a href="/user/logout" class="admin_logout">Выйти</a>
        </div>
    </div>
</div>