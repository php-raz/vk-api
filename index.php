<?php session_start(); ?>
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

                <p>Перед отправкой изображений на стену vk Вы должны ввести <strong>access_token</strong> и <strong>user_id</strong>.
                </p>
                <small><a href="http://zenno.pro/kak-poluchit-access-token-prilozheniya-vk-com/" target="_blank">Как
                        получить access token приложения vk.com</a></small>

                <form action="form2.php" method="post">
                    <div class="form-group">
                        <label for="token">Access token</label>
                        <input type="text" name="token" required class="form-control" id="token"
                               placeholder="Введите access token">
                    </div>
                    <div class="form-group">
                        <label for="id">User id</label>
                        <input type="text" name="id" required class="form-control" id="id"
                               placeholder="Введите user id">
                    </div>
                    <div class="form-group ">
                        <input type="submit" value="Сохранить" name="save_token_id"
                               class="btn btn-success pull-right">
                    </div>
                </form>

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