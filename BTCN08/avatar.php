<?php
    require_once 'init.php';

    $id = $_GET['id'];
    $user = findUserById($id);

    if(!$user){
        http_response_code(404);
        echo 'Avatar not found';
        return;
    }

    header('Content-Type: image/jpeg');
    echo $user['avatar'];
?>