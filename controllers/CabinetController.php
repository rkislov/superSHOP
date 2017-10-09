<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 05.10.2017
 * Time: 11:24
 */
class CabinetController
{
public function actionIndex()
{
    $categories = Category::getCategoriesList();
    $userId = User::checkLogged();
    $user = User::getUserById($userId);

    $name = $user['name'];
    if($user['telefon']!=false){
        $telefon = $user['telefon'];
    }else{
        $telefon = false;
    }
    $email = $user['email'];
    if($user['city']!=false){
        $city = $user['city'];
    }else{
        $city = false;
    }
    if($user['street']!=false){
        $street = $user['street'];
    }else{
        $street = false;
    }
    if($user['build']!=false){
        $build = $user['build'];
    }else{
        $build = false;
    }
    if($user['room']!=false){
        $room = $user['room'];
    }else{
        $room = false;
    }
    if (isset($_POST['submit'])){
        $name = $_POST['name'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $street = $_POST['street'];
        $build = $_POST['build'];
        $room = $_POST['room'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $errors = false;
        if(!User::checkName($name)){
            $errors[]= "Имя не должно быть менее двух символов";
        }
        if ($pass1 !=false && $pass2!=false){
            if($pass1 ==$pass2){
                if(!User::checkPassword($pass1)){
                    $errors[] = "Пароль не должен содержать менее 6-ти символов";
                }

            }else{
                $errors[] = "Пароли не совпадают";
            }
        }
        if ($errors == false) {
            if($pass1 != false && $pass2 !=false){
                if($pass1 == $pass2){
                    $password = $pass1;
                        User::editPassword($userId, $password);
                }
            }
            $result = User::edit($userId, $name,$telefon,$email,$city,$street,$build,$room);

        }

    }
    $result =false;
    require_once ROOT .'/views/cabinet/index.php';
    return true;
}
}