<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 08.10.2017
 * Time: 16:08
 */
class CartController
{
    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }

    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart =false;

        $productsInCart = Cart::getProducts();

        if($productsInCart){
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once ROOT.'/views/cart/index.php';
    }

    public function actionDelete($id)
    {
        Cart::deleteProduct($id);
        header("Location: /cart");
    }
    public function actionCheckout()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $productsInCart = Cart::getProducts();

        if ($productsInCart == false){
            header("Location: /");
        }
        $productsIds = array_keys($productsInCart);
        $products = Product::getProdustsByIds($productsIds);

        $totalPrice = Cart::getTotalPrice($products);

        $totalQuantity = Cart::countItems();


        $userName = false;
        $userTelefon = false;
        $usercity = false;
        $userStreet = false;
        $userBuild = false;
        $userRoom = false;

        $result=false;
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
            $userTelefon = $user['telefon'];
            $usercity = $user['city'];
            $userStreet = $user['street'];
            $userBuild = $user['build'];;
            $userRoom = $user['room'];;
        } else {
            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
}