<?php include ROOT.'/views/layouts/header.php';?>

    <div class="site-content">
        <div class="row">
            <div id="topCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/upload/images/products/promobg.jpg" alt="">
                        <div class="item_name">Название <br>
                            промотовара
                        </div>
                        <div class="item_about">Описание промотовара</div>

                    </div>
                </div>
                <div class="carousel-inner">
                    <div class="item">
                        <img src="/upload/images/products/info.jpeg" alt="">
                    </div>
                </div>
            </div>
            <div class="corousel-control">
                <div class="new_item pull-left">
                    Новые товары
                </div>
                <div class="buttons pull-right">
                    <a href="#"><i class="glyphicon glyphicon-chevron-left prev-slide"></i></a>
                    <a href="#"><i class="glyphicon glyphicon-chevron-right next-slide"></i></a>
                </div>
            </div>
        </div>

    <a href="#" class="item_button">Посмотреть
        <span>+</span>
    </a>
    <div class="features_items"><!--features_items-->

                    <?php foreach ($randomProducts as $product):?>
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

    <div class="promo">
        <div class="img-container1">
            <img src="/upload/images/products/banner1.jpg">
        </div>
        <div class="img-container1">
            <img src="/upload/images/products/banner2.jpg">
        </div>
        <div class="img-container2">
            <img src="/upload/images/products/banner3.jpg">
        </div>
    </div>
    <div class="recommended">
        <div class="reccommended_control">
            <div class="recommended_text pull-left">
                Популярные товары
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


    <div class="prefooter">
        <div class="prefooter_header">
            О магазине
        </div>
        <div class="prefooter_text">
            Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.





        </div>
    </div>
    </div>
</div>
<?php include ROOT.'/views/layouts/footer.php';?>