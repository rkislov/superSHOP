<?php
$targetFolder = '/upload/images/products';
$verifyToken = md5('unique_salt' . $_POST['timestamp']); // Создаём токен аналогичный тому, что получен из JavaScript
if (!empty($_FILES) && $_POST['token'] == $verifyToken) { // Если токены совпадают, значит, можно загружать файлы
    /* Создаём полный путь к загружаемому файлу */
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    $targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
    $fileTypes = array('jpg','jpeg','gif','png'); // Разрешённые расширения
    $fileParts = pathinfo($_FILES['Filedata']['name']); // Получаем расширение у загружаемого файла
    if (in_array($fileParts['extension'],$fileTypes)) {
        move_uploaded_file($tempFile,$targetFile); // Если расширение загружаемого файла разрешено, то загружаем файл
        echo '1';
    } else echo 'Invalid file type.'; // Выводим ошибку
}

?>