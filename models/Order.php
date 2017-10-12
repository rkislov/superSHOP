<?php
class Order
{
    public static function save($userName, $userPhone, $userComment, $userId, $products)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO product_order (user_name, user_phone, user_comment, user_id, products)'
            .'VALUES (:user_name, :user_phone, :user_comment, :user_id, :products)';

        $products = json_encode($products);


        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();

    }
    public static function saveStage1($userName, $userTelefon, $userEmail, $userId, $products)
    {
        $id = Guid::getGUID();
        $db = Db::getConnection();
        $products = json_encode($products);
        $i=0;
        $numRows = "SELECT COUNT(*) FROM order_info where date_format(timestamp, '%Y%m') = date_format(now(), '%Y%m')";
        $count = $db->prepare($numRows);
        $count->execute();


        $orderNum = date('y').date('m').($i+$count->fetchColumn());
        $sql = 'INSERT INTO order_info (id, order_num , order_user, order_telefon, order_email, user_id, products)'
        .'VALUES (:id, :order_num, :order_user, :order_telefon, :order_email, :user_id, :products)';




        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':order_num', $orderNum, PDO::PARAM_STR);
        $result->bindParam(':order_user', $userName, PDO::PARAM_STR);
        $result->bindParam(':order_telefon', $userTelefon, PDO::PARAM_STR);
        $result->bindParam(':order_email', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        if($result->execute()){

            return $id;

        }




    }


    public static function saveStage2( $orderId, $userCity, $userStreet, $userBuild, $userRoom, $userShip, $userComment)
    {
        $db = Db::getConnection();




        $sql = 'UPDATE order_info SET city = :city, street = :street, build = :build, room =:room, comment = :comment, order_ship = :ship WHERE id =:id';




        $result = $db->prepare($sql);
        $result->bindParam(':id', $orderId, PDO::PARAM_STR);
        $result->bindParam(':city', $userCity, PDO::PARAM_STR);
        $result->bindParam(':street', $userStreet, PDO::PARAM_STR);
        $result->bindParam(':build', $userBuild, PDO::PARAM_STR);
        $result->bindParam(':room', $userRoom, PDO::PARAM_STR);
        $result->bindParam(':ship', $userShip, PDO::PARAM_INT);
        $result->bindParam(':comment', $userComment, PDO::PARAM_INT);


        return $result->execute();




    }
    public static function saveStage3($orderId)
    {
        $db = Db::getConnection();




        $sql = 'UPDATE order_info SET status=1 WHERE id =:id';




        $result = $db->prepare($sql);
        $result->bindParam(':id', $orderId, PDO::PARAM_STR);


        return $result->execute();




    }
    public static function getOrdersList()
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Получение и возврат результатов
        $result = $db->query('SELECT id, user_name, user_phone, date, status FROM product_order ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_name'] = $row['user_name'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }
    /**
     * Возвращает текстое пояснение статуса для заказа :<br/>
     * <i>1 - Новый заказ, 2 - В обработке, 3 - Доставляется, 4 - Закрыт</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }
    public static function getShipText($ship)
    {
        switch ($ship) {
            case '0':
                return 'Курьерская доставка с оплатой при получении';
                break;
            case '1':
                return 'Почта России с наложенным платежом';
                break;
            case '2':
                return 'Доставка через терминал QIWI Post';
                break;

        }
    }
    /**
     * Возвращает заказ с указанным id
     * @param string $id <p>id</p>
     * @return array <p>Массив с информацией о заказе</p>
     */
    public static function getOrderById($id)
    {

        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'SELECT * FROM order_info WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        // Выполняем запрос
        $result->execute();
        // Возвращаем данные
        return $result->fetch();
    }
    /**
     * Удаляет заказ с заданным id
     * @param integer $id <p>id заказа</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'DELETE FROM product_order WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    /**
     * Редактирует заказ с заданным id
     * @param integer $id <p>id товара</p>
     * @param string $userName <p>Имя клиента</p>
     * @param string $userPhone <p>Телефон клиента</p>
     * @param string $userComment <p>Комментарий клиента</p>
     * @param string $date <p>Дата оформления</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = "UPDATE product_order
            SET 
                user_name = :user_name, 
                user_phone = :user_phone, 
                user_comment = :user_comment, 
                date = :date, 
                status = :status 
            WHERE id = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':user_name', $userName, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }

}