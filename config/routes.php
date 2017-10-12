<?php
	return array(
        // Товар:
        'product/([0-9,A-Z,-]+)' => 'product/view/$1', // actionView в ProductController
        // Каталог:
        'catalog' => 'catalog/index', // actionIndex в CatalogController
        // Категория товаров:
        'category/([0-9,A-Z,-]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
        'category/([0-9,A-Z,-]+)' => 'catalog/category/$1', // actionCategory в CatalogController
        // Корзина:
        'cart/checkout' => 'cart/checkout', // actionAdd в CartController
        'cart/delete/([0-9,A-Z,-]+)' => 'cart/delete/$1', // actionDelete в CartController
        'cart/add/([0-9,A-Z,-]+)' => 'cart/add/$1', // actionAdd в CartController
        'cart/addAjax/([0-9,A-Z,-]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
        '/cart/checkout2/([0-9,A-Z,-]+)'=>'cart/checkout2/$1',
        '/cart/checkout3/([0-9,A-Z,-]+)'=>'cart/checkout3/$1',
        '/cart/checkoutFinal/([0-9,A-Z,-]+)'=>'cart/checkoutFinal/$1',
        'cart/login'=>'user/cartLogin',
        'cart' => 'cart/index', // actionIndex в CartController
        // Пользователь:
        'user/register' => 'user/register',
        'user/login' => 'user/login',
        'user/logout' => 'user/logout',
        'cabinet/edit' => 'cabinet/edit',
        'cabinet' => 'cabinet/index',
        // Управление товарами:
        'admin/product/create/toCategory/([0-9]+)'=>'adminProduct/createToCategory/$1',
        'admin/product/create' => 'adminProduct/create',
        'admin/product/update/([0-9,A-Z,-]+)' => 'adminProduct/update/$1',
        'admin/product/delete/([0-9,A-Z,-]+)' => 'adminProduct/delete/$1',
        'admin/product' => 'adminProduct/index',
        // Управление категориями:
        'admin/category/create' => 'adminCategory/create',
        'admin/category/update/([0-9,A-Z,-]+)' => 'adminCategory/update/$1',
        'admin/category/update/([0-9,A-Z,-]+)/page-([0-9]+)' => 'adminCategory/update/$1/$2',
        'admin/category/delete/([0-9,A-Z,-]+)' => 'adminCategory/delete/$1',
        'admin/category' => 'adminCategory/index',
        // Управление заказами:
        'admin/order/update/([0-9,A-Z,-]+)' => 'adminOrder/update/$1',
        'admin/order/delete/([0-9,A-Z,-]+)' => 'adminOrder/delete/$1',
        'admin/order/deleteProduct/([0-9,A-Z,-]+)/([0-9,A-Z,-]+)' => 'adminOrder/deleteProduct/$1/$2',
        'admin/order/view/([0-9,A-Z,-]+)' => 'adminOrder/view/$1',
        'admin/order' => 'adminOrder/index',
        // Админпанель:
        'admin' => 'admin/index',
        // О магазине
        'contacts' => 'site/contact',
        'about' => 'site/about',
        // Главная страница
        'index.php' => 'site/index', // actionIndex в SiteController
        '' => 'site/index', // actionIndex в SiteController
	);
?>