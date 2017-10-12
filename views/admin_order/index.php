<?php include ROOT.'/views/layouts/header_admin.php'?>
<div class="admin-content">
    <div class="admin-logo">
        Заказы
    </div>
    <div class="orders_list">
        <div class="orders_table">
            <table>
                <thead>
                <tr class="table_head_tr">
                    <td style="width: 360px">номер заказа</td>
                    <td style="width: 120px">статус</td>
                    <td style="width: 150px;">сумма</td>
                    <td style="width: 150px">время заказа</td>
                    <td style="width: 100px">&nbsp;</td>
                </tr>
                </thead>
                <?php foreach ($orderList as $order):?>
                <tr>
                    <td style="width: 360px"><span style="color: blue;">№<?php echo $order['order_num'];?></span> <span style="color: #9dacad;">от</span> <?php echo $order['order_email'];?></td>
                    <td style="width: 120px"><?php echo Order::getStatusText($order['status']);?></td>
                    <td style="width: 150px;"><?php echo number_format( Order::getOrderTotalPrice($order['products']), 0, ',', ' ' );?>руб.</td>
                    <td style="width: 150px"><?php echo date("d.m.Y",strtotime($order['timestamp']));?> в <?php echo date("H:i",strtotime($order['timestamp']));?></td>
                    <td style="width: 100px"><a href="/admin/order/view/<?php echo $order['id'];?>">посмотреть</a></td>
                </tr><?php endforeach;?>
            </table>
        </div>
    </div>
</div>
<?php include ROOT.'/views/layouts/footer_admin.php'?>
