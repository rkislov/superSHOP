<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 05.10.2017
 * Time: 20:17
 */
class AdminCategoryController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $status = $_POST['status'];
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Category::createCategory($name, $status);
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }

        }

        require_once ROOT .'/views/admin_category/index.php';
        return true;
    }
    public function actionUpdate($id)
    {
        $category = Category::getCategoryById($id);
        $productListByCategory = Product::getProductsListByCategory($id);
        require_once ROOT .'/views/admin_category/update.php';
        return true;
    }
}