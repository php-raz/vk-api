<?php session_start();?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=1130">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/modernizr-custom.js"></script>
</head>
<body>
<div class="wrapper">
    <div class="content-wrapper">
        <div class="container">
            <div class="content col-md-2"></div>
            <div class="content col-md-10">
                <p class="lead">Отправка изображения на стену vk</p>

                <?php

if ((!empty($_POST['token']) && isset($_POST['token'])) &&
  (!empty($_POST['id']) && isset($_POST['id']))
) {
  $_SESSION['token'] = $_POST['token'];
  $_SESSION['id'] = $_POST['id'];
}
?>

                <form action="load.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="photo">Загрузить картинку</label>
                        <input type="file" name="photo" required class="form-control" id="photo"
                               placeholder="Загрузить картинку">
                    </div>
                    <div class="form-group">
                        <label for="msg">Комментарий</label>
                        <textarea name="msg" required class="form-control" id="msg"
                                  placeholder="Введите комментарий к картинке"></textarea>
                    </div>
                    <div class="form-group ">
                        <input type="submit" value="Загрузить" name="load_img" class="btn btn-success pull-right">
                    </div>
                </form>

                <a href="index.php">Изменить access_token или user_id</a>
            </div>
        </div>
    </div>
    <div class="empty"></div>
</div>
<footer class="footer">

</footer>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>