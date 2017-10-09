<?php include ROOT.'/views/layouts/header_admin.php'?>
<div class="admin-content">
    <div class="admin-logo">
        Добавление товара
    </div>

<div class="new_item_form">
    <form action="#" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="category_id" value="<?php echo $categoryId;?>">
        <div class="item_information">
            <div class="item_logo">
                Информция о товаре
            </div>
            <div class="item_text">
                <p style="position:relative;top:10px;">Название товара:</p>
                <input type="text" name="name" placeholder="Велосипед" value=""
                style="width: 295px;line-height: 30px;outline: none;"/>
                <p style="position:relative;top:10px;">Описание товара:</p>
                <textarea name="about" cols="39" rows="5" style="outline: none;"></textarea>
            </div>
            <div class="radio_group">
                <p>Бейджик:</p>
                <div class="radio">
                    <input type="radio" name="is_new_hot_sale" value="0" checked="checked"/>Отсутсвует
                </div>
                <div class="radio">
                    <input type="radio" name="is_new_hot_sale" value="1"/>NEW
                </div>
                <div class="radio">
                    <input type="radio" name="is_new_hot_sale" value="2"/>HOT
                </div>
                <div class="radio">
                    <input type="radio" name="is_new_hot_sale" value="3"/>SALE
                </div>

            <div class="item_price">
                <p>Цена:</p>
                <input type="text" name="price" placeholder="5000"
                       style="width: 70px; outline: none;" value=""> руб.
            </div>
            </div>
        </div>
        <div class="item_foto">
            <div class="item_logo">
                фотографии товара
            </div>
            <div class="foto">
                <div class="foto-img">
                    <img id="image_preview1" src="/upload/images/products/no-image.jpg">
                </div>
                <div class="file_upload">
                    <button type="button">Загрузить</button>

                    <input type="file" class="image" name="userfile[]" id="image_preview1"/>

                </div>

            </div>
            <div class="foto">
                <div class="foto-img">
                    <img id="image_preview2" src="/upload/images/products/no-image.jpg">
                </div>
                <div class="file_upload">
                    <button type="button">Загрузить</button>

                    <input type="file" class="image" name="userfile[]" id="image_preview2"/>
                </div>
            </div>
            <div class="foto">
                <div class="foto-img">
                    <img id="image_preview3" src="/upload/images/products/no-image.jpg">
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
                    <input type="text" id="variant" name="variant1" placeholder="Вариант 1" value="">
                    <button class="clearbtn">Удалить</button>
                </div>
                <div class="single_variant">
                    <input type="text" id="variant" name="variant2" placeholder="Вариант 2" value="">
                    <button class="clearbtn">Удалить</button>
                </div>
                <div class="single_variant">
                    <input type="text" id="variant" name="variant3" placeholder="Вариант 3" value="">
                    <button calss="clearbtn">Удалить</button>
                </div>
            </div>
        </div>
        <div class="item_submit">
            <input type="submit" name="submit" value="Создать товар">
        </div>
    </form>
</div>
</div>
<?php include ROOT.'/views/layouts/footer_admin.php'?>
