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
        $userEmail = false;
        $userTelefon = false;


        $result=false;
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
            $userEmail = $user['email'];
            $userTelefon = $user['telefon'];

        } else {
            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

        if (isset($_POST['submit'])){
            $userName = $_POST['name'];
            $userTelefon = $_POST['telefon'];
            $userEmail = $_POST['email'];

            $errors = false;

            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userTelefon)) {
                $errors[] = 'Неправильный телефон';
            }

            if ($errors == false){
                $result = Order::saveStage1($userName,$userTelefon,$userEmail,$userId,$productsInCart);
                header("Location: /cart/checkout2/$result");
            }

        }

        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
    public function actionCheckout2($orderId)
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

        $id = $orderId;
        $userCity = false;
        $userStreet = false;
        $userBuild = false;
        $userRoom = false;
        $userComment = false;
        $userShip = false;


        $result=false;
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userCity = $user['city'];
            $userStreet = $user['street'];
            $userBuild = $user['build'];
            $userRoom = $user['room'];


        }

        if (isset($_POST['submit'])){
            $oId = $_POST['order_id'];
            $userCity = $_POST['city'];
            $userStreet = $_POST['street'];
            $userBuild = $_POST['build'];
            $userRoom = $_POST['room'];
            $userShip = $_POST['ship'];
            $userComment = $_POST['comment'];



            $result = Order::saveStage2($oId,$userCity,$userStreet,$userBuild,$userRoom,$userShip,$userComment);
            header("Location: /cart/cgeckout3/$oId");


        }

        require_once(ROOT . '/views/cart/checkout2.php');
        return true;
    }
}