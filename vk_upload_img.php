<?php

class Vk_Upload_Img {

  private $access_token;

  public function __construct($access_token) {

    $this->access_token = $access_token;
  }

  public function method($method, $params = null) {

    $p = "";
    if ($params && is_array($params)) {
      foreach ($params as $key => $param) {
        $p .= ($p == "" ? "" : "&") . $key . "=" . urlencode($param);
      }
    }

    $request = "https://api.vk.com/method/" . $method . "?" . ($p ? $p . "&" : "") . "access_token=" . $this->access_token . "&v=5.101";
    $response = file_get_contents($request);
    echo "<pre>";

    if ($response) {
      return json_decode($response);
    }
    return false;
  }

  public function upload_image($file, $group_id = null) {

    $params = array();
    if ($group_id) {
      $params['gid'] = $group_id;
    }

    //Получаем сервер для загрузки изображения
    $response = $this->method("photos.getWallUploadServer", $params);
    if (isset($response) == false) {
      exit;
    }

    $server = $response->response->upload_url;

    //Отправляем файл на сервер
    $ch = curl_init($server);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array('photo' => class_exists("CURLFile", false) ? new CURLFile($file) : "@" . $file));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data; charset=UTF-8'));
    $json = json_decode(curl_exec($ch));
    curl_close($ch);

    //Сохраняем файл на стену
    $photo = $this->method("photos.saveWallPhoto", array(
      "server" => $json->server,
      "photo" => ($json->photo),
      "hash" => $json->hash,
      "gid" => $group_id,
    ));

    echo "<pre>";
    // print_r($photo->response[0]->id);exit;

    if (isset($photo->response[0]->id)) {
      return $photo->response[0]->id;
    } else {
      return false;
    }
  }
}