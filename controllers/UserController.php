<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 04.10.2017
 * Time: 20:07
 */
class UserController
{
    public function actionRegister()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
       $name = false;
       $email = false;
       $pasword = false;
       $result = false;

       $errors = false;
       if (isset($_POST['submit'])){
           $name = $_POST['name'];
           $email = $_POST['email'];
           $pass1 = $_POST['pass1'];
           $pass2 = $_POST['pass2'];

           $errors =false;
           if ($pass1 != $pass2){
               $errors[] ="пароль не совпадает";
           } else {
               $password = $pass1;
           }
           if (!User::checkName($name)) {
               $errors[] = 'Имя не должно быть короче 2-х символов';
           }
           if (!User::checkEmail($email)) {
               $errors[] = 'Неправильный email';
           }
           if (!User::checkPassword($password)) {
               $errors[] = 'Пароль не должен быть короче 6-ти символов';
           }
           if (User::checkEmailExists($email)) {
               $errors[] = 'Такой email уже используется';
           }

           if ($errors==false){
               $result = User::register($name, $email, $password);
               header("Location: /cabinet");
           }
       }


        require_once ROOT.'/views/user/register.php';
        return true;
    }
    public function actionLogin()
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $email= false;
        $password=false;

        if (isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors=false;
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $userId = User::checkUserData($email,$password);
            if ($userId == false){
                $errors[] ='Не правильный  email или пароль';
            } else{
                User::auth($userId);
                header("Location: /cabinet");
            }

        }
        require_once ROOT.'/views/user/login.php';
        return true;
    }
    public function actionLogout()
    {
        session_start();

        unset($_SESSION['user']);

        header("Location: /");
    }
}