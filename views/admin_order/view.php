<?php include ROOT.'/views/layouts/header_admin.php'?>
    <div class="admin-content">
        <div class="admin-logo">
            Заказ <span style="color: blue">№<?php echo $order['order_num'];?></span> <?php echo Order::getStatusTextOrderView($order['status']);?>
        </div>
        <div class="order_content" style="padding-bottom: 40px;">
            <div class="order_content_table">
                <table>
                    <thead>
                        <tr>
                            <td colspan="5">Содержание</td>
                        </tr>
                    </thead>
                    <?php foreach ($products as $product):?>
                    <tr style="padding-bottom: 10px">
                        <td style="width: 300px"><span style="color: blue;"> <?php echo mb_strimwidth($product['name'],0,30,"...")?></span></td>
                        <td style="width: 150px"><?php echo number_format( $product['price'], 0, ',', ' ' );?>руб.</td>
                        <td style="width: 100px"><?php echo $productsQuantity[$product['id']]; ?></td>
                        <td style="width: 150px"><?php echo number_format( ($product['price']*$productsQuantity[$product['id']]), 0, ',', ' ' );?>руб.</td>
                        <td><a href="/admin/order/deleteProduct/<?php echo $order['id'];?>/<?php echo $product['id'];?>">убрать из заказа</a></td>
                    </tr>
                    <?php endforeach;?>
                </table>
                <div class="order_itog_summ pull-right">
                    <span style="width: 50px; color: blue; text-transform: uppercase;">Итоговая сумма:</span> <?php echo number_format( Order::getOrderTotalPrice($order['products']), 0, ',', ' ' );?>руб.
                </div>
            </div>


        </div>
        <div class="order_ship_info">
            <div class="order_ship_info_content">
                <div class="order_ship_info_logo">
                    Информация о заказе
                </div>
                <div class="checkout_order_ship" style="width: 1140px; height: 260px;display: block; margin: 10px; margin-top: 40px">
                    <span style="display: inline-block;width: 300px; margin-left: 40px;">
                            <div class="checout_p">
                                Контактное лицо(ФИО):
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $order['order_user'];?>
                            </div>
                            <div class="checout_p">
                                Контактный телефон:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $order['order_telefon'];?>
                            </div>
                            <div class="checout_p">
                                Email:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $order['order_email'];?>
                            </div>
                        </span>
                    <span style="display: inline-block">
                            <div class="checout_p">
                                Город:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $order['city'];?>
                            </div>
                            <div class="checout_p">
                                Улица:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $order['street'];?>
                            </div>
                            <div>
                                <span style="display: inline-block">
                                    <div class="checout_p">
                                    Дом:
                                </div>
                                <div style="font-family: 'Supermolot Light';color: black">
                                    <?php echo $order['build'];?>
                                </div>
                                </span>
                                <span style="display: inline-block; margin-left:20px; ">
                                    <div class="checout_p">
                                    Квартира:
                                </div>
                                <div style="font-family: 'Supermolot Light';color: black;">
                                   <?php echo $order['room'];?>
                                </div>
                                </span>

                            </div>

                        </span>
                    <span style="display: inline-block; margin-left: 120px; top:-50px; position: relative;">
                            <div class="checout_p">
                                Способ доставки:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black; width: 280px;">
                                <?php echo Order::getShipText($order['order_ship']);?>

                            </div>
                            <div class="checout_p">
                                Коментарий к заказу:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $order['comment'];?>

                            </div>
                        </span>
                </div>
            </div>
        </div>
        <a class="order_delete pull-right" href="/admin/order/delete/<?php echo $order['id'];?>">отменить заказ</a>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'?>