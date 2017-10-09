<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 04.10.2017
 * Time: 7:05
 */
class SiteController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $randomProducts = array();
        $randomProducts =Product::getRandomProducts(8);
        $sliderProducts = array();
        $sliderProducts = Product::getRecommendedProducts();



        require_once ROOT.'/views/site/index.php';
        return true;
    }
}