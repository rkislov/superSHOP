<?php include ROOT.'/views/layouts/header.php';?>
<div class="cart-container">
    <div class="catalog-logo">
        Корзина
    </div>
<div class="items_in_cart">
    <div class="cart-table">
        <?php if ($productsInCart): ?>
        <table>
            <thead>
            <tr>
                <td width="100px">товар</td>
                <td width="200px">&nbsp</td>
                <td width="200px">Доступность</td>
                <td width="200px">стоимость</td>
                <td width="200px">количество</td>
                <td>итого</td>
                <td width="50px">&nbsp</td>
            </tr>
            </thead>
            <?php foreach($products as $product):?>
            <tr>
                <td width="100px"><img src="<?php echo Product::getImage($product['id']);?>" width="100px" height="100px"></td>
                <td width="200px" style="font-family: Supermolot color:#616161;"><?php echo $product['name'];?></td>
                <td width="200px" style="text-align: center; color:red; font-family: Supermolot; font-size: 12px;"><?php echo Product::getAvailabilityCart($product['availability']);?></td>
                <td width="200px" style="text-align: center; color:#616161; font-family: 'Supermolot Light'; font-size: 16px;"><?php echo number_format( $product['price'], 0, ',', ' ' );?>руб.</td>
                <td width="200px" style="text-align: center; color:#616161; font-family: Supermolot; font-size: 16px;"><?php echo $productsInCart[$product['id']];?></td>
                <td style="text-align: center; color:black; font-family: Supermolot; font-size: 16px;"><?php echo number_format( ($product['price']*$productsInCart[$product['id']]), 0, ',', ' ' );?>руб.</td>
                <td width="50px"><a href="/cart/delete/<?php echo $product['id'];?>">
                        <i class="fa fa-times"></i>
                    </a></td>
            </tr>
            <?php endforeach;?>
        </table>

        </div>
    <div class="back_line">
        <div class="cart_itog pull-right">
            Итого:&nbsp;<span><?php echo number_format( Cart::getTotalPrice($products), 0, ',', ' ' );?>руб.</span>
        </div>
        <div class="cart_back">
            <a href="/" >Вернуться к покупкам</a>
        </div>
        <div class="cart_checkout pull-right">
            <a href="/cart/checkout"><i class="fa fa-shopping-cart"></i>&nbsp;Оформить заказ</a>
        </div>
    </div>
</div>
    <?php else: ?>
    <h1 style="width: 1160px; text-align: center; line-height: 130px">Корзина пуста</h1>

    <div class="cart_back">
        <a href="/" >Вернуться к покупкам</a>
    </div>
    <?php endif; ?>
<?php include ROOT.'/views/layouts/footer_else.php';?>
