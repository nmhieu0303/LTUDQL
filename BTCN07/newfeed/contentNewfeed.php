<?php
$posts = getPostsOfUser((int)$currentUser['id']);
?>

<div class="content__newfeed w-75 m-auto ">
    <!-- POST BOX -->
    <div class="area-post w-100 mt-2 mb-2 bg-white shadow">
        <?php include './newfeed/postBox.php' ?>
    </div>

    <!-- News -->
    <?php renderNewFeed(); ?>
    
</div>