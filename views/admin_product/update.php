<?php include ROOT.'/views/layouts/header_admin.php'?>
<div class="admin-content">
    <div class="admin-logo">
        Добавление товара
    </div>

    <div class="new_item_form">
        <form action="#" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="category_id" value="<?php echo $product['category_id'];?>">
            <div class="item_information">
                <div class="item_logo">
                    Информция о товаре
                </div>
                <div class="item_text">
                    <p style="position:relative;top:10px;">Название товара:</p>
                    <input type="text" name="name" placeholder="Велосипед" value="<?php echo $product['name'];?>"
                           style="width: 295px;line-height: 30px;outline: none;"/>
                    <p style="position:relative;top:10px;">Описание товара:</p>
                    <textarea name="about" cols="39" rows="5" style="outline: none;"><?php echo $product['about'];?></textarea>
                </div>
                <div class="radio_group">
                    <p>Бейджик:</p>
                    <div class="radio">
                        <input type="radio" name="is_new_hot_sale" value="0" <?php if ($product['is_new_hot_sale'] == 0) echo ' checked="checked"' ;?>/>Отсутсвует
                    </div>
                    <div class="radio">
                        <input type="radio" name="is_new_hot_sale" value="1" <?php if ($product['is_new_hot_sale'] == 1) echo ' checked="checked"' ;?>/>NEW
                    </div>
                    <div class="radio">
                        <input type="radio" name="is_new_hot_sale" value="2" <?php if ($product['is_new_hot_sale'] == 2) echo ' checked="checked"' ;?>/>HOT
                    </div>
                    <div class="radio">
                        <input type="radio" name="is_new_hot_sale" value="3" <?php if ($product['is_new_hot_sale'] == 3 ) echo ' checked="checked"' ;?>/>SALE
                    </div>

                    <div class="item_price">
                        <p>Цена:</p>
                        <input type="text" name="price" placeholder="5000"
                               style="width: 70px; outline: none;" value="<?php echo $product['price'];?>"> руб.
                    </div>
                </div>
            </div>
            <div class="item_foto">
                <div class="item_logo">
                    фотографии товара
                </div>
                <div class="foto">
                    <div class="foto-img">
                        <img id="image_preview1" src="/upload/images/products/<?php echo $imagesList[0]['filename'];?>">
                    </div>
                    <div class="file_upload">
                        <button type="button">Загрузить</button>

                        <input type="file" class="image" name="userfile[]" id="image_preview1"/>

                    </div>

                </div>
                <div class="foto">
                    <div class="foto-img">
                        <img id="image_preview2" src="/upload/images/products/<?php echo $imagesList[1]['filename'];?>">
                    </div>
                    <div class="file_upload">
                        <button type="button">Загрузить</button>

                        <input type="file" class="image" name="userfile[]" id="image_preview2"/>
                    </div>
                </div>
                <div class="foto">
                    <div class="foto-img">
                        <img id="image_preview3" src="/upload/images/products/<?php echo $imagesList[2]['filename'];?>">
                    </div>
                    <div class="file_upload">
                        <button type="button">Загрузить</button>

                        <input type="file" class="image" name="userfile[]" id="image_preview3"/>
                    </div>
                </div>
                <div class="foto">
                    <div class="foto-img">
                        <img id="image_preview4" src="/upload/images/products/no-image.jpg">
                    </div>
                    <div class="file_upload">
                        <button type="button">Загрузить</button>

                        <input type="file" class="image" name="userfile[]" id="image_preview4"/>
                    </div>

                </div>
            </div>
            <div class="item_variant">
                <div class="item_logo">
                    Вариации товара
                </div>
                <div class="varians">
                    <div class="single_variant">
                        <input type="text" id="variant" name="variant1" placeholder="Вариант 1" value="<?php echo $variantsList[0]['name'];?>">
                        <button class="clearbtn">Удалить</button>
                    </div>
                    <div class="single_variant">
                        <input type="text" id="variant" name="variant2" placeholder="Вариант 2" value="<?php echo $variantsList[1]['name'];?>">
                        <button class="clearbtn">Удалить</button>
                    </div>
                    <div class="single_variant">
                        <input type="text" id="variant" name="variant3" placeholder="Вариант 3" value="<?php echo $variantsList[2]['name'];?>">
                        <button calss="clearbtn">Удалить</button>
                    </div>
                </div>
            </div>
            <div class="item_change" style="position: relative;
    top:60px;
    left: 730px;">
                <input type="submit" class="item_change_button" name="submit" value="Изменить товар" style="background: transparent;
    outline: none;
    border: none;
    color:#099d48;
    text-decoration: underline;
    text-decoration-style: dashed;">
                <a href="/admin/product/delete/<?php echo $product['id'];?>" style="background: transparent;
    outline: none;
    border: none;
    color:#bb3232;
    text-decoration: underline;
    text-decoration-style: dashed;
position: relative;
right: 810px;">Удалить товар</a>
            </div>
        </form>
    </div>
</div>
<?php include ROOT.'/views/layouts/footer_admin.php'?>
