<?php
include_once "./api/base.php";


$file = find("upload", $_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <h1 class="header">檔案上傳練習</h1>
    <!----建立你的表單及設定編碼----->


    <?php
    if (isset($_GET['upload']) && $_GET['upload'] == 'success')
        echo "上傳成功";


    ?>


    <form action="./api/edit.php" method="POST" enctype="multipart/form-data">

        <ul>
            <li>描述:<input type="text" name="description" value="<?= $file['description']; ?>"></li>
            <li>類型:<?= $file['type']; ?></li>
            <li>大小:<?= $file['size']; ?></li>
            <li>
                <?php
                if (is_image($file['type'])) {
                    echo "<img src='./upload/{$file['file_name']}' style='width:150px'>";
                } else {
                    $icon = dummy_icon($file['type']);
                    // echo $icon;
                    echo "<img src='./material/{$icon}' style='width:80px'>";
                }
                ?>
            </li>
            <li>檔案:<input type="file" name="file_name"></li>
            <input type="hidden" name="id" value="<?= $file['id']; ?>">
            <li><input type="submit" value="修改"></li>
        </ul>


    </form>
</body>

</html>