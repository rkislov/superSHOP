<?php include ROOT.'/views/layouts/header.php';?>
<div class="catalog-container">
    <div class="catalog-logo">
        <?php echo $categoryName;?>
    </div>
    <div class="latest_product_block">
        <div class="heading">&nbsp;<div>
                <div class="catalog-features_items"><!--features_items-->

                    <?php foreach ($categoryProducts as $product):?>
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="<?php echo Product::getImage($product['id']); ?>" width="180px" height="180px" alt="" />
                                <p><a href="/product/<?php echo $product['id'];?>" class="product_name pull-left">
                                        <?php echo mb_strimwidth($product['name'],0,20,"...");?>
                                    </a>
                                    <span class="product_price pull-right"><?php echo number_format( $product['price'], 0, ',', ' ' );?> руб.</span></p>


                                <?php if ($product['is_new_hot_sale'] == 1) echo '<img style="width: 40px; height: 40px; position:absolute; top:0px; left:0px;" src="/template/images/home/new.png" class="new" alt="">';?>
                                <?php if ($product['is_new_hot_sale'] == 2) echo '<img style="width: 40px; height: 40px; position:absolute; top:0px; left:0px;" src="/template/images/home/hot.png" class="new" alt="">';?>
                                <?php if ($product['is_new_hot_sale'] == 3) echo '<img style="width: 40px; height: 40px; position:absolute; top:0px; left:0px;" src="/template/images/home/sale.png" class="new" alt="">';?>

                            </div>
                        </div>

                    <?php endforeach;?>


                </div><!--features_items-->

                <?php echo $pagination->get(); ?>
            </div>

<?php include ROOT.'/views/layouts/footer_else.php';?>
