<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 05.10.2017
 * Time: 22:26
 */

class AdminProductController extends AdminBase
{
    public function actionCreateToCategory($categoryId)
    {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            $options['name'] = $_POST['name'];
            $options['category_id'] = $_POST['category_id'];
            $options['price'] = $_POST['price'];
            $options['about'] = $_POST['about'];
            $options['is_new_hot_sale'] = $_POST['is_new_hot_sale'];
            $errors = false;

            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';

            }
            if ($errors == false) {
                $id = Product::createProduct($options);

                if ($id){


                    Product::createVarian($id, $_POST['variant1']);
                    Product::createVarian($id, $_POST['variant2']);
                    Product::createVarian($id, $_POST['variant3']);


                    //if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                    //    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    foreach ($_FILES["userfile"]["error"] as $key => $error) {
                        if ($error == UPLOAD_ERR_OK) {
                            $tmp_name = $_FILES["userfile"]["tmp_name"][$key];
                            $name = Guid::getGUID();
                            // basename() может спасти от атак на файловую систему;
                            // может понадобиться дополнительная проверка/очистка имени файла
                            //$name = basename($_FILES["pictures"]["name"][$key]);
                            $filename = $name . '.jpg';
                            $dirname = $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/";
                            move_uploaded_file($tmp_name, $dirname.$filename);
                            Image::uploadPhoto($id,$filename);
                        }
                }
                }
            }

        }
        require_once ROOT.'/views/admin_product/create.php';
        return true;
    }
    public function actionUpdate($id)
    {
        self::checkAdmin();
        $productId = $id;
        $product = Product::getProductById($productId);
        $imagesList = Image::getImagesByProductId($productId);
        $variantsList = Product::getVariantById($productId);



        require_once ROOT.'/views/admin_product/update.php';
        return true;
    }
}