
<div class="newfeed__item">
    <div class="d-flex">
        <!-- Avatar -->
        <a href="#" class="newfeed__item--img">
            <img class="newfeed--avatar--img" src="<?php echo './users/'.$currentUser['id'].'.jpg'?>" alt="">
        </a>
        <!-- Info post -->
        <div class="newfeed__item--info">
            <div>
                <a href="#" class="info--username">Nguyễn Minh Hiếu</a>
                <a class="newfeed__item--more">
                    <i class="fas fa-angle-down"></i>
                </a>
            </div>
            <div class="d-flex align-items-center">
                <span class="info--time">15 phút</span>
                <div class="info--separator">-</div>
                <a href="#" class="info--privacy">
                    <i class="fas fa-globe-americas"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- Content text -->
    <p class="newfeed__item--caption">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa earum ratione ducimus amet pariatur, sapiente voluptas corrupti cumque, vel, et maxime assumenda repudiandae https://curnonwatch.com/ corporis optio eveniet vitae labore libero vero nobis
        eius repellendus? Voluptas corrupti et id?
    </p>
    <!-- content media -->
    <div class="newfeed__item--media">
        <img src="./assets/img/avatar.jpg" alt="" class="newfeed__item--img img-fluid">
    </div>
    <!-- Interactives -->
    <div class="newfeed__item--interactives">
        <div class="interactives__item">
            <div class="interactives__item--icon" onclick="like(this)">
                <i class="far fa-heart"></i>
            </div>
            <span class="interactives__item--number">500</span>
        </div>
        <div id="interactives__item--comment" class="interactives__item">
            <a class="interactives__item--icon">
                <i class="fas fa-comment-alt"></i>
            </a>
            <span class="interactives__item--number">500</span>
        </div>
        <div id="interactives__item--share" class="interactives__item">
            <a class="interactives__item--icon">
                <i class="fas fa-share-alt"></i>
            </a>
            <span class="interactives__item--number">500</span>
        </div>
    </div>

</div>