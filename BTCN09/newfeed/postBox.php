

<form action="./index.php" method="post" class="newfeed__item newfeed__post" enctype="multipart/form-data">  
    <div class="d-flex mb-2">
        <!-- AVATAR IN BOX POST -->
        <a href="#" class="newfeed__item--img">
            
            <img class="newfeed--avatar--img" src="avatar.php?id=<?php echo $currentUser['id'];?>" alt="">
        </a>
        <!-- INPUT TEXT -->
        <textarea  id="newfeed__post--input-text" class="textarea"  name="content-post" contenteditable placeholder="Hello <?php echo $currentUser['id']?>, how are you today?"></textarea>
    </div>
    <!-- INPUT MEDIA WILL SHOW WHEN POST IMG OR VIDEO -->
    <div id="newfeed__post--input-media">
        <img id="img-preview" src="">
    </div>
    <!-- start of attachment selector -->
    <div class="d-flex justify-content-around align-items-center">
        <!-- list attachment -->
        <ul class="newfeed__post--attachment-selector d-flex m-0 p-0">
            <li class="newfeed__post--attachment-item ">
                <a class = "position-relative"href="#"><i class="far fa-image "></i>
                    <input name = "img-post" id= "input-img" type="file" accept="image/*" title="Chọn file để tải lên" style="cursor: pointer;"  onchange="loadFile(event)">
                </a>
            </li>
            <li class="newfeed__post--attachment-item">
                <a href="#"><i class="fas fa-video"></i></a>
            </li>
            <li class="newfeed__post--attachment-item">
                <a href="#"><i class="fas fa-user-tag"></i></a>
            </li>
            <li class="newfeed__post--attachment-item">
                <a href="#"><i class="fas fa-map-marked-alt"></i></a>
            </li>
        </ul>
        <button  type="submit" class="btn btn-outline-primary rounded-pill pl-4 pr-4">POST</button>
    </div>
   
    <!-- end of attachment selector -->
</form>