<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 03.10.2017
 * Time: 18:01
 */
include_once ROOT.'/models/User.php';
abstract class AdminBase
{
    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserbyId($userId);

        if ($user['role'] == 'admin'){
            return true;
        }

        die('Досиуп запрещен');
    }
}