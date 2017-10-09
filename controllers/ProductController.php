<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 07.10.2017
 * Time: 15:58
 */
class ProductController
{
    public function actionView($productId)
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $product = Product::getProductById($productId);
        $pathToProductsImages = Product::getImages($productId);
        $productOptions = Product::getVariantsById($productId);
        $sliderProducts = array();


        $sliderProducts = Product::getProductsListByCategory($product['category_id']);

        require_once(ROOT.'/views/product/view.php');
        return true;
    }
}