<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 05.10.2017
 * Time: 16:14
 */
class AdminController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        require_once ROOT.'/views/admin/index.php';
        return true;
    }
}