<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 13.10.2017
 * Time: 11:02
 */
class AdminUserController extends AdminBase
{
    public function actionIndex()
    {
        $userList = User::getUsersList();
        require_once ROOT.'/views/admin_user/index.php';
        return true;
    }
}