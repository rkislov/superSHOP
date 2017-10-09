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
                    <input type="text" name="name" placeholder="Велосипеды" value="<?php echo $category['name'];?>">
                </div>

                <div class="category_status">
                    <p>Видимость</p>
                    <select name="status">

                        <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Да</option>
                        <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                    </select>
                </div>
                <div class="category_add_button">
                    <input type="submit" name="submit" value="изменить">
                </div>
            </form>
        </div>
        <div class="categories">
            <table>
                <thead>
                <tr>
                    <td>Название</td>
                    <td>Стоимость</td>
                    <td><a href="/admin/product/create/toCategory/<?php echo $category['id'];?>">Добавить</a></td>
                </tr>
                </thead>
                <?php foreach ($productListByCategory as $product):?>
                    <tr>
                        <td><?php echo $product['name'];?></td>
                        <td><?php echo $product['price'];?>&nbsp;руб.</td>
                        <td><a href="/admin/product/update/<?php echo $product['id'];?>">Просмотр</a></td>
                    </tr>
                <?php endforeach;?>
            </table>

        </div>
    </div>
    </div>
<?php include ROOT.'/views/layouts/footer_admin.php'?><?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 05.10.2017
 * Time: 22:08
 */