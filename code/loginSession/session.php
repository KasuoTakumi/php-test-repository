<?php


$user_name = $_POST["loginUser"];
$user_pass = $_POST["loginPass"];

getFormData($user_pass);

//関数の作成
function getFormData($user_pass){
    $cost = "12";
    global $hash_pass;
    $hash_pass = password_hash($user_pass, PASSWORD_DEFAULT, ['cost' => $cost]);
    
}


print($hash_pass);


session_start();
$_SESSION['count'] = 1;

?>