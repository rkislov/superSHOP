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
        self::checkAdmin();
        $userList = User::getUsersList();
        require_once ROOT.'/views/admin_user/index.php';
        return true;
    }
    public function actionView($userId)
    {
        self::checkAdmin();
        $user = User::getUserById($userId);
        $orders = Order::getOrdersByUserId($userId);
        $total=0;
        foreach ($orders as $order){
            $total+= Order::getOrderTotalPrice($order['products']);
        }
        require_once ROOT.'/views/admin_user/view.php';
        return true;
    }

}