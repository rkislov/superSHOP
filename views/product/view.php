<?php include ROOT.'/views/layouts/header.php';?>

<div class="product">
    <div class="product_category_logo">
        <?php echo Category::getCategoryById($product['category_id']);?>
    </div>
    <div class="back_to_catalog">
        <a href="/catalog/<?php echo $product['category_id'];?>">вернуться в каталог</a>
    </div>
    <div class="product_container">
        <div class="product_container_foto">
            <div class="photo-frame" id="foto_frame">
                <a href="<?php echo Product::getImage($product['id'])?>">
                    <img class="photo_frame" id="photo_frame" src="<?php echo Product::getImage($product['id'])?>" width="400px" height="440px">
                </a>
            </div>
            <div class="mini_foto_corusel">

            <?php foreach ($pathToProductsImages as $image):?>

                    <img class="single_mini_foto" id="mini_foto" src="<?php echo $image;?>" width="50px" height="50px"/>

            <?php endforeach;?>
            </div>
        </div>

        <div class="product_container_about">
            <div class="product_container_about_name">
                <?php echo $product['name'];?>
            </div>
            <div class="product_container_about_about">
                <?php echo $product['about'];?>
            </div>
            <div class="product_container_about_variant">
                Выберите вариант:
                <select name="varian">
                    <?php foreach ($productOptions as $option):?>
                        <option  data-variant="<?php echo $option['id'];?>" value="<?php echo $option['id'];?>"><?php echo $option['name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <div class="product_container_price">
            <div class="product_container_price_block">
                <div class="product_container_price_block_price">
                    <?php echo number_format( $product['price'], 0, ',', ' ' );?>руб.
                </div>
                <div class="product_container_price_block_avaylability">
                    <?php echo Product::getAvailabilityText($product['availability']);?>

                </div>

                <div class="add_to_cart">
                    <a href="#" data-id="<?php echo $product['id']; ?>"
                       class="add-to-cart" <?php if ($product['availability'] == 0) echo 'style="display:none;"';?>>
                        <i class="fa fa-shopping-cart"></i>&nbsp;купить
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="category_corusel">
        <div class="reccommended_control">
            <div class="recommended_text pull-left">
                Другие товары в категории " <?php echo Category::getCategoryById($product['category_id']);?> "
            </div>
            <div class="recommended_buttons pull-right">
                <a href="#" id="prev"><i class="glyphicon glyphicon-chevron-left prev-slide"></i></a>
                <a href="#" id="next"><i class="glyphicon glyphicon-chevron-right next-slide"></i></a>
            </div>

        </div>
        <div class=" recommended_container">
            <div class="cycle-slideshow"
                 data-cycle-fx=carousel
                 data-cycle-timeout=5000
                 data-cycle-carousel-visible=3
                 data-cycle-carousel-fluid=true
                 data-cycle-slides="div.single-products"
                 data-cycle-prev="#prev"
                 data-cycle-next="#next"
            >





                <?php foreach ($sliderProducts as $sliderItem): ?>
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="<?php echo Product::getImage($sliderItem['id']); ?>" width="180px" height="180px" alt="" />
                            <p><a href="/product/<?php echo $sliderProducts['id'];?>" class="product_name pull-left">
                                    <?php echo  mb_strimwidth($sliderItem['name'],0,20,"...");?>
                                </a>
                                <span class="product_price pull-right"><?php echo number_format( $sliderItem['price'], 0, ',', ' ' );?> руб.</span></p>


                            <?php if ($sliderItem['is_new_hot_sale'] == 1) echo '<img style="width: 40px; height: 40px; position:absolute; top:0px; left:0px;" src="/template/images/home/new.png" class="new" alt="">';?>
                            <?php if ($sliderItem['is_new_hot_sale'] == 2) echo '<img style="width: 40px; height: 40px; position:absolute; top:0px; left:0px;" src="/template/images/home/hot.png" class="new" alt="">';?>
                            <?php if ($sliderItem['is_new_hot_sale'] == 3) echo '<img style="width: 40px; height: 40px; position:absolute; top:0px; left:0px;" src="/template/images/home/sale.png" class="new" alt="">';?>

                        </div>
                    </div>

                <?php endforeach;?>








            </div>
        </div>
    </div>
</div>

<?php include ROOT.'/views/layouts/footer_else.php';?>