<?php include ROOT .'/views/layouts/header.php';?>
<div class="checkout_container">
    <div class="catalog-logo">
        Оформление заказа
    </div>
    <div class="checkout1">
        <div class="checkout1_border_inactive">
            <span style="color: red;">1.</span> &nbsp;Контактная информация
        </div>
        <div class="checkout1_border_inactive">
            <span style="color: red;">2.</span> &nbsp;Информация о доставке
        </div>
        <div class="checkout1_border_active">
            <span style="color: red;">3.</span> &nbsp;Подтверждение заказа
        </div>
        <div>

            <div class="checkout3_block">
                <div class="order_info">
                    <div class="checkout_logo">
                        Состав заказа:
                    </div>
                    <div class="checkout_order_table">
                        <table style="width: 1140px; margin: 10px; text-align: center; font-family: 'Supermolot Light'; color: #b5b5b5">
                            <thead>
                                <tr style="border-bottom: 1px solid #b5b5b5; height: 30px;">
                                    <td style="width: 450px;">Товар</td>
                                    <td style="width: 200px;">Стоимость</td>
                                    <td style="width 200px;">Количсетво</td>
                                    <td style="width: 200px;">Итого</td>
                                </tr>

                            </thead>
                            <?php foreach ($products as $product):?>
                            <tr style="line-height: 40px;text-align: center; color: black">
                                <td style="width: 450px;"><?php echo $product['name'];?></td>
                                <td style="width: 200px;"><?php echo number_format( $product['price'], 0, ',', ' ' );?>руб.</td>
                                <td style="width 200px;"><?php echo $productsInCart[$product['id']];?></td>
                                <td style="width: 200px;"><?php echo number_format( ($product['price']*$productsInCart[$product['id']]), 0, ',', ' ' );?>руб.</td>
                            </tr>
                            <?php endforeach;?>

                        </table>
                        <div class="cart_itog pull-right"  style="margin: 10px;">
                            Итого:&nbsp;<span><?php echo number_format( Cart::getTotalPrice($products), 0, ',', ' ' );?>руб.</span>
                        </div>
                    </div>
                    <div class="checkout_order_ship" style="width: 1140px; height: 260px;display: block; margin: 10px; margin-top: 40px">
                        <div class="checkout_logo">
                            Доставка:
                        </div>
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
                            <div style="font-family: 'Supermolot Light';color: black">
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

                <form action="#" method="post">
                    <input type="hidden" name="orderId" value="<?php echo $order['id'];?>">
                    <input style="background: red; border: 0px; padding: 0.5em 0.5em;color: white; position: relative;left:50px;top:-20px;"
                           class="order_confirm" type="submit" name="submit" value="Подтвердить заказ">
                </form>

            </div>



        </div>
    </div>
    <?php include ROOT .'/views/layouts/footer_else.php';?>
