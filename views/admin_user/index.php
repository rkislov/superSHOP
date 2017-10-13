<?php include ROOT .'/views/layouts/header_admin.php';?>
<div class="admin-content">
    <div class="admin-logo">
        Пользователи
    </div>
    <div class="user_list">
        <div class="user_list_table">
            <table>
                <thead>
                <tr>
                    <td style="width: 350px;">Имя</td>
                    <td style="width: 200px;">Email</td>
                    <td style="width: 200px;">Телефон</td>
                    <td>&nbsp</td>
                </tr>
                </thead>
                <? foreach ($userList as $user):?>
                <tr>
                    <td style="width: 350px; color: black"><? echo $user['name'];?></td>
                    <td style="width: 200px;"><? echo $user['email'];?></td>
                    <td style="width: 200px;"><? echo $user['telefon'];?></td>
                    <td><a href="/admin/user/view/<?echo $user['id'];?>">просмотр</a></td>
                </tr>
                <? endforeach;?>
            </table>
        </div>

    </div>
</div>
<?php include ROOT .'/views/layouts/footer_admin.php';?>
