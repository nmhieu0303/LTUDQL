<?php
    require_once 'init.php';

    $id = $_GET['id'];
    $post = findPostById($id);
    if(!$post){
        http_response_code(404);
        echo 'Media not found';
        return;
    }

    header('Content-Type: image/jpeg');
    echo $post['images'];
?>