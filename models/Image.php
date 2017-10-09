<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 06.10.2017
 * Time: 16:17
 */
class Image
{
    public static function uploadPhoto($product_id, $filename)
    {
        $db = Db::getConnection();
        $id = Guid::getGUID();
        $sql = 'INSERT INTO images (id, product_id, filename) VALUES(:id,:product_id,:filename)';
        $result= $db->prepare($sql);
        $result->bindParam(':id',$id, PDO::PARAM_STR);
        $result->bindParam(':product_id',$product_id, PDO::PARAM_STR);
        $result->bindParam(':filename',$filename, PDO::PARAM_STR);
        return $result->execute();
    }
    public  static function getImagesByProductId($id)
    {

        $db =Db::getConnection();
        $sql ='SELECT id, filename FROM images WHERE product_id = :id';
        $result = $db->prepare($sql);
        $result -> bindParam(':id',$id,PDO::PARAM_STR);
        $result->execute();
        $i=0;
        $imagesList = array();
        while ($row = $result->fetch()){
            $imagesList[$i]['id'] = $row['id'];
            $imagesList[$i]['filename'] = $row['filename'];
            $i++;
        }
        return $imagesList;
    }
    public static function deleteImageById($id)
    {
        $db =Db::getConnection();
        $sql = 'DELETE FROM images WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        return $result->execute();
    }
}