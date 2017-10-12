<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 12.10.2017
 * Time: 15:04
 */
class AdminOrderController extends AdminBase
{
    public function actionIndex()
    {
        self::checkAdmin();

        $orderList = Order::getOrdersList();

        require_once ROOT .'/views/admin_order/index.php';
        return true;
    }
    public function actionView($id)
    {
        self::checkAdmin();
        $order = Order::getOrderById($id);
        $productQuantity = json_decode($order['products'], true);
        $productIds = array_keys($productQuantity);
        $products = Product::getProdustsByIds($productIds);

        require_once ROOT.'/views/admin_order/view.php';
        return true;
    }
}