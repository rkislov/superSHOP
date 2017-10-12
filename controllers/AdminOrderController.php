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
        $productsQuantity = json_decode($order['products'], true);
        $productIds = array_keys($productsQuantity);
        $products = Product::getProdustsByIds($productIds);

        require_once ROOT.'/views/admin_order/view.php';
        return true;
    }
    public function actionDeleteProduct($orderId, $productId)
    {
        echo $productId;
        self::checkAdmin();
        if (Order::deleteOrderProductItem($orderId,$productId)==1){
            header("Location: /admin/order/view/$orderId");
        } else{
            header("Location: /admin/order");
        }

    }
    public function actionDelete($id)
    {
        self::checkAdmin();
        Order::deleteOrderById($id);
        header("Location: /admin/order");
    }
}