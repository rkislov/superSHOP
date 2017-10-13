<? include ROOT.'/views/layouts/header_admin.php';?>
<div class="admin-content">
    <div class="admin-logo">
        Просмотр пользователя
    </div>
    <div class="user_info_table">
        <div class="user_info_table_header">
            Информация о пользователе
        </div>

        <span style="display: inline-block;width: 300px; margin-left: 40px;">
                            <div class="checout_p">
                                Контактное лицо(ФИО):
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $user['name'];?>
                            </div>
                            <div class="checout_p">
                                Контактный телефон:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $user['telefon'];?>
                            </div>
                            <div class="checout_p">
                                Email:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $user['email'];?>
                            </div>
                        </span>
        <span style="display: inline-block">
                            <div class="checout_p">
                                Город:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $user['city'];?>
                            </div>
                            <div class="checout_p">
                                Улица:
                            </div>
                            <div style="font-family: 'Supermolot Light';color: black">
                                <?php echo $user['street'];?>
                            </div>
                            <div>
                                <span style="display: inline-block">
                                    <div class="checout_p">
                                    Дом:
                                </div>
                                <div style="font-family: 'Supermolot Light';color: black">
                                    <?php echo $user['build'];?>
                                </div>
                                </span>
                                <span style="display: inline-block; margin-left:20px; ">
                                    <div class="checout_p">
                                    Квартира:
                                </div>
                                <div style="font-family: 'Supermolot Light';color: black;">
                                   <?php echo $user['room'];?>
                                </div>
                                </span>

                            </div>

                        </span>

    </div>
    <div class="user_info_order">
        <div class="user_info_table_header">
            История заказов
        </div>
<table>
    <? foreach ($orders as $order):?>
    <tr></tr>
        <td style="width: 400px; color: blue;">№<? echo $order['order_num']?></td>
        <td style="width: 300px; color: #9dacad;"><?php echo number_format( Order::getOrderTotalPrice($order['products']), 0, ',', ' ' );?>руб.</td>
        <td style="width: 200px; color: #9dacad;"><?php echo date("d.m.Y",strtotime($order['timestamp']));?> в <?php echo date("H:i",strtotime($order['timestamp']));?></td>
    <? endforeach;?>
</table>
        <div class="pull-right user_orders_summ" style="margin-right: 30px;">
            <span style="color: blue; text-transform: uppercase; font-family: 'Proxima Nova Bold';width: 20px;">Итоговая сумма заказов</span>
            <span style="font-family: 'Proxima Nova'; font-size: 30px;"><?php echo number_format( $total, 0, ',', ' ' );?></span>
            <span>руб.</span>
        </div>
    </div>
    <a class="pull-right del_user"  href="/admin/user/delete/<?echo $user['id']?>">Удалить пользователя</a>
</div>
<? include ROOT.'/views/layouts/footer_admin.php';?>
