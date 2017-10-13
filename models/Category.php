<?php
	
class Category
{

	public static function getCategoriesList()
	{
		$db = Db::getConnection();
		
		$categoriesList = array();
		
		$result = $db->query('SELECT id, name FROM category ORDER BY timestamp ASC LIMIT 0,4');
		
		
		$i=0;
		while($row=$result->fetch()){
			$categoriesList[$i]['id'] = $row['id'];
			$categoriesList[$i]['name'] = $row['name'];
			$i++ ;
		}
		
		
		return $categoriesList;


	}
	public static function getCategoriesListAdmin()
    {
        $db =Db::getConnection();

        $result = $db->query('SELECT id,name,status,timestamp FROM category ORDER BY timestamp ASC');

        $categoryList= array();
        $i=0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] =$row['id'];
            $categoryList[$i]['name'] =$row['name'];
            $categoryList[$i]['status'] =$row['status'];
            $categoryList[$i]['timestamp'] =$row['timestamp'];
            $i++;
        }
        return $categoryList;
    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateCategoryById($id, $name, $sortOrder, $status)
    {
        $db = Db::getConnection();

        $sql =  $sql = "UPDATE category
            SET 
                name = :name, 
                sort_order = :sort_order, 
                status = :status
            WHERE id = :id";


        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':sort_order', $sortOrder, PDO::PARAM_INT);
        $result->bindParam(':status',$status,PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getCategoryById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result-> bindParam(':id',$id,PDO::PARAM_STR);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        $row=$result->fetch();
        return $row['name'];
    }
    public static function getCategoryRowById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM category WHERE id = :id';

        $result = $db->prepare($sql);
        $result-> bindParam(':id',$id,PDO::PARAM_STR);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        $row=$result->fetch();
        return $row;
    }
    public static function getStatusText($status)
    {
        switch ($status){
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }
    public static function createCategory($name, $status)
    {
        $id = Guid::getGUID();
        echo $name;
        echo $id;
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO category (id, name, status) '
            . 'VALUES (:id, :name, :status)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }


}


?>