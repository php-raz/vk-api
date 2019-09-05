<?php
session_start();

$file = $_FILES['photo'];
$access_token = $_SESSION['token'];
$user_id = $_SESSION['id'];

if (
  isset($file, $access_token, $user_id) &&
  !empty($file) &&
  !empty($access_token) &&
  !empty($user_id)
) {
  require_once 'vk_upload_img.php';

  $message = $_POST['msg'];

  $dir = 'files';
  mkdir($dir);
  $file_name = $dir . '/' . $file['name'];
  move_uploaded_file($file['tmp_name'], $file_name);
  $image_path = str_replace('\\', '/', dirname(__FILE__)) . '/' . $file_name;

  $vk = new Vk_Upload_Img($access_token);
  $upload_img = $vk->upload_image($image_path);

  unlink($file_name);
  rmdir($dir);

  //Публикуем пост на стену
  $params = array(
    "owner_id" => $user_id,
    "message" => $message,
    "attachments" => "photo" . $user_id . "_" . $upload_img,
  );
  $post = $vk->method("wall.post", $params);
  header('Location: form.php');
  echo 'Картинка отправлена';
} else {
  echo 'sdfsd';
}
