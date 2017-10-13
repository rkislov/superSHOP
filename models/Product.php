<?php
/**
 * Класс Product - модель для работы с товарами
 */
class Product
{
    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 8;
    /**
     * Возвращает массив последних товаров
     * @param type $count [optional] <p>Количество</p>
     * @param type $page [optional] <p>Номер текущей страницы</p>
     * @return array <p>Массив с товарами</p>
     */
    public static function getRandomProducts($count = self::SHOW_BY_DEFAULT)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT id, name, price, is_new_hot_sale FROM product '
            . ' ORDER BY RAND() '
            . 'LIMIT :count';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new_hot_sale'] = $row['is_new_hot_sale'];
            $i++;
        }
        return $productsList;
    }
    /**
     * Возвращает массив последних товаров
     * @param type $count [optional] <p>Количество</p>
     * @param type $page [optional] <p>Номер текущей страницы</p>
     * @return array <p>Массив с товарами</p>
     */
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT id, name, price, is_new_hot_sale FROM product '
            . ' ORDER BY timestamp DESC '
            . 'LIMIT :count';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new_hot_sale'] = $row['is_new_hot_sale'];
            $i++;
        }
        return $productsList;
    }
    /**
     * Возвращает список товаров в указанной категории
     * @param type $categoryId <p>id категории</p>
     * @param type $page [optional] <p>Номер страницы</p>
     * @return type <p>Массив с товарами</p>
     */
    public static function getProductsListByCategoryPager($categoryId, $page = 1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT id, name, price,is_new_hot_sale FROM product '
            . 'WHERE category_id = :category_id '
            . 'ORDER BY timestamp ASC LIMIT :limit OFFSET :offset';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_STR);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['is_new_hot_sale'] = $row['is_new_hot_sale'];
            $i++;
        }
        return $products;
    }
    public static function getProductsListByCategory($categoryId)
    {

        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT id, name, price,is_new_hot_sale FROM product '
            . 'WHERE category_id = :category_id '
            . 'ORDER BY timestamp ASC ';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_STR);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['is_new_hot_sale'] = $row['is_new_hot_sale'];
            $i++;
        }
        return $products;
    }
    /**
     * Возвращает продукт с указанным id
     * @param string $id <p>id товара</p>
     * @return array <p>Массив с информацией о товаре</p>
     */
    public static function getProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM product WHERE id = :id';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполнение коменды
        $result->execute();
        // Получение и возврат результатов
        return $result->fetch();
    }
    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryId
     * @return integer
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM product WHERE category_id = :category_id';
        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_STR);
        // Выполнение коменды
        $result->execute();
        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }
    /**
     * Возвращает список товаров с указанными индентификторами
     * @param array $idsArray <p>Массив с идентификаторами</p>
     * @return array <p>Массив со списком товаров</p>
     */
    public static function getProdustsByIds($idsArray)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Превращаем массив в строку для формирования условия в запросе
         $i=0;
        $products = array();
        foreach ($idsArray as $id)
        {
            $sql = "SELECT * FROM product WHERE id= :id";
            $result = $db->prepare($sql);
            $result->bindParam(':id',$id, PDO::PARAM_STR);
            $result->execute();
            $row = $result->fetch();
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['availability'] = $row['availability'];
            $i++;
        }

        //$idsString = implode(',', $idsArray);
        //$idsString = implode(',', $rightIds);

       // $sql = "SELECT * FROM product WHERE IN ($idsString)";
        //$result = $db->query($sql);
        // Указываем, что хотим получить данные в виде массива
        //$result->setFetchMode(PDO::FETCH_ASSOC);
        // Получение и возврат результатов
        //$i = 0;
        //$products = array();
        //while ($row = $result->fetch()) {
        //    $products[$i]['id'] = $row['id'];
        //    $products[$i]['name'] = $row['name'];
        //    $products[$i]['price'] = $row['price'];
        //    $i++;
        //}
        return $products;
    }

    /**
     * Возвращает список рекомендуемых товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getRecommendedProducts()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, is_new_hot_sale FROM product '
            . 'WHERE is_recommended = "1" '
            . 'ORDER BY timestamp DESC');
        $i = 0;
        $productsList = array();
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new_hot_sale'] = $row['is_new_hot_sale'];
            $i++;
        }
        return $productsList;
    }
    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getProductsList()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, code FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['code'] = $row['code'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }
    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'DELETE FROM product WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        return $result->execute();
    }
    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @param array $options <p>Массив с информацей о товаре</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateProductById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE product
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                category_id = :category_id, 
                brand = :brand, 
                availability = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        return $result->execute();
    }
    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createProduct($options)
    {

        $id = Guid::getGUID();
        // Соединение с БД
        $db = Db::getConnection();


        // Текст запроса к БД
        $sql = 'INSERT INTO product (id, name, price, category_id, is_new_hot_sale, about) VALUES (:id, :name, :price, :category_id, :is_new_hot_sale,:about)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_STR);
        $result->bindParam(':is_new_hot_sale', $options['is_new_hot_sale'], PDO::PARAM_INT);
        $result->bindParam(':about', $options['about'], PDO::PARAM_STR);
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            //return $db->lastInsertId();
            return $id;
        }
        // Иначе возвращаем 0
        return 0;
    }
    /**
     * Возвращает текстое пояснение наличия товара:<br/>
     * <i>0 - Под заказ, 1 - В наличии</i>
     * @param integer $availability <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getAvailabilityText($availability)
    {
        switch ($availability) {
            case '1':
                return '<i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;есть в наличии';
                break;
            case '0':
                return '<i class="fa fa-times" aria-hidden="true"></i>&nbsp;нет в наличие';
                break;
        }
    }
    public static function getAvailabilityCart($availability)
    {
        switch ($availability) {
            case '1':
                return 'есть в наличии';
                break;
            case '0':
                return 'нет в наличие';
                break;
        }
    }
    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {

        $db = Db::getConnection();
        $sql = 'SELECT filename FROM images WHERE product_id = :id ORDER BY RAND() LIMIT 1';
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_STR);

        $result->execute();
        while ($row = $result->fetch()){
            $fileName[0]['filename'] = $row['filename'];
        }



        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/upload/images/products/';
        // Путь к изображению товара
        $pathToProductImage = $path .  $fileName[0]['filename'];
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {

            return $pathToProductImage;
        }

        return $path . $noImage;
    }

    public static function getImages($id)
    {
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/upload/images/products/';
        $db = Db::getConnection();
        $sql = 'SELECT filename FROM images WHERE product_id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_STR);

        $result->execute();
        $i=0;
        while ($row = $result->fetch()){
            $fileName[$i]['filename'] = $row['filename'];
            $pathToProductsImages[$i] = $path .  $fileName[$i]['filename'];
            $i++;
        }







            return $pathToProductsImages;

    }


    public static function createVarian($productId,$variant)
    {
        $db= Db::getConnection();
        $id = Guid::getGUID();
        $sql = 'INSERT INTO variant (id,product_id,name) VALUE (:id,:product_id,:name)';
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id, PDO::PARAM_STR);
        $result->bindParam(':product_id',$productId, PDO::PARAM_STR);
        $result->bindParam(':name',$variant, PDO::PARAM_STR);
        return $result->execute();

    }
    public static function getVariantsById($id)
    {
        $db =Db::getConnection();
        $sql = 'SELECT id, name FROM variant  WHERE product_id =:product_id';
        $result = $db -> prepare($sql);
        $result->bindParam(':product_id', $id, PDO::PARAM_STR);
        $result->execute();
        $variansList = array();
        $i=0;
        while ($row = $result->fetch()){
            $variansList[$i]['id'] = $row['id'];
            $variansList[$i]['name'] = $row['name'];
            $i++;
        }

        return $variansList;
    }
}