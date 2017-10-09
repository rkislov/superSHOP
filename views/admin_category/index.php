<?php include ROOT.'/views/layouts/header_admin.php'?>
    <div class="admin-content">
        <div class="admin-logo">
            Категории
        </div>
        <div class="new_category">
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="#" method="post">
                <div class="category_name">
                    <p>Введите название категории</p>
                    <input type="text" name="name" placeholder="Велосипеды" value="">
                </div>

                <div class="category_status">
                    <p>Отображение</p>
                    <select name="status">

                        <option value="1" selected="selected">Да</option>
                        <option value="0">Нет</option>
                    </select>
                </div>
                <div class="category_add_button">
                    <input type="submit" name="submit" value="cоздать">
                </div>
            </form>
        </div>
        <div class="categories">
            <table>
                <thead>
                    <tr>
                        <td>Название</td>
                        <td>Количество товаров</td>
                        <td>&nbsp;</td>
                    </tr>
                </thead>
                <?php foreach ($categoriesList as $category):?>
                <tr>
                    <td><?php echo $category['name'];?></td>
                    <td><?php echo Product::getTotalProductsInCategory($category['id']);?></td>
                    <td><a href="/admin/category/update/<?php echo $category['id'];?>">Просмотр</a></td>
                </tr>
                <?php endforeach;?>
            </table>
        </div>
    </div>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'?>