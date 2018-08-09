<?php

$html = file_get_contents('./index.html');

include_once('./session.php');
$file_name = 'jpg.jpg';
$path = './dir/';
$origin_img_path = $path.$file_name;

//画像情報の取得
list($width, $height, $type) = @getimagesize($origin_img_path);//画像情報を変数に入れる

var_dump($width);
var_dump($height);
var_dump($type);

$resized_name = 'resized.';

//画像形式のチェック
switch ($type) {

    //JPEG.JPGのとき
    case IMAGETYPE_JPEG:
    //イメージIDとやらを作るらしい？
    $origin_img_id = imagecreatefromjpeg($origin_img_path);
    var_dump($origin_img_id);

    $data_array = resize_img($origin_img_id, $width, $height, $type);
    $new_img_id = $data_array[0];
    $resize_width = $data_array[1];
    $resize_hight = $data_array[2];
    //画像の複製とサイズ変更
    imagecopyresized($new_img_id,$origin_img_id,0,0,0,0,$width,$height,$resize_width,$resize_hight);
    //画像をファイルに保存
    imagejpeg($new_img_id,$origin_img_path);
    //メモリの解放
    imagedestroy($new_img_id);
    imagedestroy($origin_img_id);

    break;

    //PNGのとき
    case IMAGETYPE_PNG:
    //イメージIDとやらを作るらしい？
    $origin_img_id = imagecreatefrompng($origin_img_path);
    var_dump($origin_img_id);

    $data_array = resize_img($origin_img_id, $width, $height, $type);
    $new_img_id = $data_array[0];
    $resize_width = $data_array[1];
    $resize_hight = $data_array[2];
    //画像の複製とサイズ変更
    imagecopyresized($new_img_id,$origin_img_id,0,0,0,0,$width,$height,$resize_width,$resize_hight);
    //画像をファイルに保存
    imagejpeg($new_img_id,$origin_img_path);
    //メモリの解放
    imagedestroy($new_img_id);
    imagedestroy($origin_img_id);


    break;

    //GIFのとき
    case IMAGETYPE_GIF:
    //イメージIDとやらを作るらしい？
    $origin_img_id = imagecreatefromgif($origin_img_path);
    var_dump($origin_img_id);

    $data_array = resize_img($origin_img_id, $width, $height, $type);
    $new_img_id = $data_array[0];
    $resize_width = $data_array[1];
    $resize_hight = $data_array[2];
    //画像の複製とサイズ変更
    imagecopyresized($new_img_id,$origin_img_id,0,0,0,0,$width,$height,$resize_width,$resize_hight);
    //画像をファイルに保存
    imagejpeg($new_img_id,$origin_img_path);
    //メモリの解放
    imagedestroy($new_img_id);
    imagedestroy($origin_img_id);


    break;

    default:
        throw new RuntimeException("サポートしていない画像形式です: $type");
}


$img_path = "";
$html = preg_replace('/{{origin_img_path}}/',$origin_img_path,$html);
$html = preg_replace('/{{img}}/',$img_path,$html);

echo $html;





//取得した画像の値からサイズの計算とかをして画像のサイズを変更する関数
function resize_img($file_path,$origin_width, $origin_height, $type){

    //横幅800pxで縦幅を可変にした。
    $resize_width = 800;
    $resize_hight = round($origin_height/($origin_width/$resize_width));

    //変更後のイメージIDを作るらしい？
    $new_img_id = imagecreatetruecolor($resize_width,$resize_hight);

    return array($new_img_id, $resize_width, $resize_hight);
}