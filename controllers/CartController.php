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
}