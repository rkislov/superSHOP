<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 08.10.2017
 * Time: 15:20
 */
class CatalogController{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $randomProducts = array();
        $randomProducts = Product::getLatestProducts(12);

        require_once ROOT.'/views/catalog/index.php';
        return true;
    }
    public function actionCategory($cayegoryId, $page = 1)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $categoryProducts = Product::getProductsListByCategoryPager($cayegoryId, $page);
        $categoryName =Category::getCategoryById($cayegoryId);
        $total = Product::getTotalProductsInCategory($cayegoryId);

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-1');

        require_once ROOT .'/views/catalog/category.php';
        return true;
    }
}