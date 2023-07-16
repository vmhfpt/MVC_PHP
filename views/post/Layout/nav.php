<nav class="app-nav container-fluid app-nav__active">
    <div class="container">
        <div class="app-header__flex">
        <div class="app-header__flex-item">
            <ul>
                <?php foreach($this->category->getAllPlatform() as $key => $value){?>
                    <li>
                <img
                  class="icon-desktop"
                  src="https://didongthongminh.vn/images/menus/icon-dien-thoai.svg"
                  alt=""
                />
                <img
                  class="icon-mobile"
                  src="https://didongthongminh.vn/images/menus/dien-thoai.webp"
                  alt=""
                />
                <?=$value['name']?> <i class="fa fa-angle-right" aria-hidden="true"></i>
                <?php if($this->category->getCategoryByPlatformID($value['id'])){?>
                    <div class="app-header__flex-item-nav-child">
                  <div class="app-header__flex-item-nav-child-list">
                    <div class="app-header__flex-item-nav-child-item">
                      <ul class="">
                        <li class="app-header__flex-item-nav-child-list-active">
                          Chọn theo hãng
                        </li>

                        <?php foreach($this->category->getCategoryByPlatformID($value['id']) as $key1 => $child){?>
                            <li><a href=""><?=$child['name']?> </a></li>

                        <?php }?>
                        
                      </ul>
                    </div>
                  
                  </div>
                </div>

                <?php }?>
              
              </li>
                <?php }?>
             
            </ul>
          </div>
            <div class="app-header__flex-item remove-item">




                <div class="app-header__flex-item-carousel">
                    <div class="item"><img src="https://didongthongminh.vn/images/slideshow/2022/12/27/slideshow_large/banner-website_1672105716.webp" alt="" /></div>
                    <div class="item"><img src="https://didongthongminh.vn/images/slideshow/2022/12/28/slideshow_large/year-celebration_1672202283.webp" alt="" /></div>
                    <div class="item"><img src="https://didongthongminh.vn/images/slideshow/2022/12/30/slideshow_large/galaxy-s22-ultra-3_1672364553.webp" alt="" /></div>
                    <div class="item"><img src="https://didongthongminh.vn/images/slideshow/2022/12/22/slideshow_large/last-chance-offer_1671682927.webp" alt="" /></div>
                    <div class="item"><img src="https://didongthongminh.vn/images/slideshow/2022/12/24/slideshow_large/galaxy-note-20-ultra_1671848648.webp" alt="" /></div>

                    <div class="button">
                        <div class="prev">
                            <div class="button-click" data-slide="prev">
                                <i class="fa fa-chevron-left" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="next">
                            <div class="button-click" data-slide="next">
                                <i class="fa fa-chevron-right" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>

                    <div class="nav">
                        <ul class="show-nav">
                        </ul>
                    </div>


                </div>






                <div class="app-header__flex-item-carousel-detail">
                    <ul>
                        <li id="carousel-detail__nav-1" data-show="1" class="carousel-detail__nav-item ">
                            <a href="#">Tết đong đầy đủ đầy quà tặng</a>
                        </li>
                        <li id="carousel-detail__nav-2" class="carousel-detail__nav-item" data-show="2"><a href="#">Redmi 10 sale siêu khủng</a></li>
                        <li id="carousel-detail__nav-3" class="carousel-detail__nav-item" data-show="3"><a href="#">Galaxy A53 5G Giá sập sàn</a></li>
                        <li id="carousel-detail__nav-4" class="carousel-detail__nav-item" data-show="4"><a href="#">Xả kho Tecno không lo về giá</a></li>
                        <li id="carousel-detail__nav-5" class="carousel-detail__nav-item" data-show="5"><a href="#">Note 20 Ultra Giá cực ngon</a></li>
                    </ul>
                </div>
            </div>
            <div class="app-header__flex-item remove-item">
                <div class="app-header__flex-item-image">
                    <img src="https://didongthongminh.vn/images/video/resized/2-5_1669864243.webp" alt="" />
                    <div class="app-header__flex-item-image-icon-play">
                        <img src="https://didongthongminh.vn/templates/default/images/play.svg" alt="" />
                    </div>
                </div>
                <div class="app-header__flex-item-image">
                    <img src="https://didongthongminh.vn/images/video/resized/12345_1671757676.jpeg" alt="" />
                    <div class="app-header__flex-item-image-icon-play">
                        <img src="https://didongthongminh.vn/templates/default/images/play.svg" alt="" />
                    </div>
                </div>
                <div class="app-header__flex-item-image">
                    <img src="https://didongthongminh.vn/images/video/resized/612-thumbail_1670306908.webp" alt="" />
                    <div class="app-header__flex-item-image-icon-play">
                        <img src="https://didongthongminh.vn/templates/default/images/play.svg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<main>