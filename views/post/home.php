
<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>

<section class="app-top-sale__day container-fluid">
  <div class="container">
    <div class="app-top-sale__day-gb">
      <div class="app-top-sale__day-title">
        <h3>TOP iPhone bán chạy trong năm</h3>
        <div class="app-top-sale__day-title-img">
          <img src="https://cdn.tgdd.vn/mwgcart/mwg-site/ContentMwg/images/newyear2023/Background/bg-tuan-le-top-right2.png" alt="" />
        </div>
        <div class="app-top-sale__day-title-img-right">
          <img src="https://cdn.tgdd.vn/mwgcart/mwg-site/ContentMwg/images/newyear2023/Background/bg-tuan-le-top-right2.png" alt="" />
        </div>
      </div>

      <div class="app-top-sale__day-carousel app-information__content owl-carousel owl-theme owl-loaded">
        <div class="owl-stage-outer">
          <div class="owl-stage">

            <?php
            foreach ([] as $key => $value) {
            ?>
              <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>" class="">
                <div class="app-top-sale__day-carousel-item owl-item">
                  <div class="app-top-sale__day-carousel-item-img">
                    <img src="<?= $IMAGE_DIR_PRODUCT . $value['hinh'] ?> " alt="" />
                    <div class="app-top-sale__day-carousel-item-img-position">
                      <div class="app-top-sale__day-carousel-item-img-position-center">
                        <div class="app-top-sale__day-carousel-item-img-position-center-top">
                          <div class="app-top-sale__day-carousel-item-img-position-center-icon">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                          </div>
                          <div class="discount-val">-<?= (float)$value['giam_gia'] * 100 ?>%</div>
                        </div>
                        <div class="app-top-sale__day-carousel-item-img-position-center-price">
                          <?= currency_format($value['don_gia'] * (float)$value['giam_gia']) ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="app-top-sale__day-carousel-item-detail">
                    <div class="app-top-sale__day-carousel-item-detail-title">
                      <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>"><?= $value['ten_hh'] ?></a>
                    </div>
                    <div class="app-top-sale__day-carousel-item-detail-price">
                      <b><?= currency_format($value['don_gia'] - ($value['don_gia'] * (float)$value['giam_gia'])) ?></b> <span><?= currency_format($value['don_gia']) ?></span>
                    </div>
                    <div class="app-top-sale__day-carousel-item-time-sale">
                      <i class="fa fa-clock-o" aria-hidden="true"></i><span>
                        Còn: <span class="highlight-time">2</span> ngày
                        <span class="highlight-time">18</span> giờ</span>
                    </div>
                    <div class="app-top-sale__day-carousel-item-total-product">
                      <div style="width: 60%" class="app-top-sale__day-carousel-item-total-product-tag"></div>
                      <div class="app-top-sale__day-carousel-item-quantity-product">
                        Đã bán 82/100
                      </div>
                    </div>
                    <div class="app-top-sale__day-carousel-item-detail-bottom">
                      <div class="app-top-sale__day-carousel-item-detail-bottom-vote">
                        <ul>
                          <li>
                            <i class="vote-active fa fa-star" aria-hidden="true"></i>
                          </li>
                          <li>
                            <i class="vote-active fa fa-star" aria-hidden="true"></i>
                          </li>
                          <li>
                            <i class="vote-active fa fa-star" aria-hidden="true"></i>
                          </li>
                          <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                          </li>
                          <li>
                            <i class="fa fa-star" aria-hidden="true"></i>
                          </li>
                        </ul>
                      </div>
                      <div class="app-top-sale__day-carousel-item-detail-like-product">
                        <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu
                        thích
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="app-banner-center container-fluid">
  <div class="container">
    <div class="">
      <img src="https://didongthongminh.vn/images/banners/resized/banner-dai_1667447003.webp" alt="" />
    </div>
    <div class="row">
      <div class="col-sm-6">
        <img src="https://didongthongminh.vn/images/banners/resized/samsung-a04s_1671616567.webp" alt="" />
      </div>
      <div class="col-sm-6">
        <img src="https://didongthongminh.vn/images/banners/resized/macbook-cu_1671590677.webp" alt="" />
      </div>
    </div>
  </div>
</section>

<section class="app-phone-suggest container-fluid">
  <div class="container">
    <div class="app-phone-suggest__title">
      <div class="app-phone-suggest__title-left">
        <div class="app-phone-suggest__title-left-icon">
          <img src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg" alt="" />
        </div>
        <div class="app-phone-suggest__title-left-text">
          Top Xiaomi bán chạy
        </div>
      </div>
      <div class="app-phone-suggest__title-right">
        <ul>
          <li><button>iphone</button></li>
          <li><button>iphone cũ</button></li>
          <li><button>Samsung</button></li>
          <li><button>Xiaomi</button></li>
          <li><button>REDMI</button></li>
          <li><button>Tecno</button></li>
          <li><button>POCO</button></li>
          <li>
            <button class="app-phone-suggest__title-right-active">
              Xem tất cả 1196 Điện thoại
            </button>
          </li>
        </ul>
      </div>
    </div>

    <div class="app-phone-suggest__product">

      <?php
      foreach ([] as $key => $value) {
      ?>


        <div class="app-phone-suggest__product-item">
          <div class="app-top-sale__day-carousel-item-img">
            <img src="<?= $IMAGE_DIR_PRODUCT . $value['hinh'] ?> " alt="" />
            <div class="app-top-sale__day-carousel-item-img-position">
              <div class="app-top-sale__day-carousel-item-img-position-center">
                <div class="app-top-sale__day-carousel-item-img-position-center-top">
                  <div class="app-top-sale__day-carousel-item-img-position-center-icon">
                    <i class="fa fa-bolt" aria-hidden="true"></i>
                  </div>
                  <div class="discount-val">-<?= (float)$value['giam_gia'] * 100 ?>%</div>
                </div>
                <div class="app-top-sale__day-carousel-item-img-position-center-price">
                  <?= currency_format($value['don_gia'] * (float)$value['giam_gia']) ?>
                </div>
              </div>
            </div>
          </div>

          <div class="app-top-sale__day-carousel-item-detail">
            <div class="app-top-sale__day-carousel-item-detail-title">
              <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>"><?= $value['ten_hh'] ?></a>
            </div>
            <div class="app-top-sale__day-carousel-item-detail-price">
              <b><?= currency_format($value['don_gia'] - ($value['don_gia'] * (float)$value['giam_gia'])) ?></b> <span><?= currency_format($value['don_gia']) ?></span>
            </div>
            <div class="app-top-sale__day-carousel-item-time-sale">
              <i class="fa fa-clock-o" aria-hidden="true"></i><span>
                Còn: <span class="highlight-time">2</span> ngày
                <span class="highlight-time">18</span> giờ</span>
            </div>
            <div class="app-top-sale__day-carousel-item-total-product">
              <div style="width: 60%" class="app-top-sale__day-carousel-item-total-product-tag"></div>
              <div class="app-top-sale__day-carousel-item-quantity-product">
                Đã bán 82/100
              </div>
            </div>
            <div class="app-top-sale__day-carousel-item-detail-bottom">
              <div class="app-top-sale__day-carousel-item-detail-bottom-vote">
                <ul>
                  <li>
                    <i class="vote-active fa fa-star" aria-hidden="true"></i>
                  </li>
                  <li>
                    <i class="vote-active fa fa-star" aria-hidden="true"></i>
                  </li>
                  <li>
                    <i class="vote-active fa fa-star" aria-hidden="true"></i>
                  </li>
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                </ul>
              </div>
              <div class="app-top-sale__day-carousel-item-detail-like-product">
                <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu thích
              </div>
            </div>
          </div>
        </div>

      <?php
      }
      ?>

    </div>
  </div>
</section>

<section class="app-phone-suggest container-fluid">
  <div class="container">
    <div class="app-phone-suggest__title">
      <div class="app-phone-suggest__title-left">
        <div class="app-phone-suggest__title-left-icon">
          <img src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg" alt="" />
        </div>
        <div class="app-phone-suggest__title-left-text">
          Top samsung bán chạy
        </div>
      </div>
      <div class="app-phone-suggest__title-right">
        <ul>
          <li><button>Tai Nghe Giá Rẻ</button></li>
          <li><button>Tai nghe</button></li>
          <li><button>Tai nghe Samsung</button></li>
          <li><button>Phụ kiện Apple</button></li>

          <li>
            <button class="app-phone-suggest__title-right-active">
              Xem tất cả 401 phụ kiện
            </button>
          </li>
        </ul>
      </div>
    </div>
    <div class="app-phone-suggest__product-flex">
      <div class="app-top-sale__day-carousel app-information__content-second owl-carousel owl-theme owl-loaded">
        <div class="owl-stage-outer">
          <div class="owl-stage">

            <?php
            foreach ([] as $key => $value) {
            ?>
               <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>" class="">
               <div class="app-top-sale__day-carousel-item owl-item">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -<?= (float)$value['giam_gia'] * 100 ?>%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="<?= $IMAGE_DIR_PRODUCT . $value['hinh'] ?>" alt="" />
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>"><?= $value['ten_hh'] ?></a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b><?= currency_format($value['don_gia'] - ($value['don_gia'] * (float)$value['giam_gia'])) ?></b> <span><?= currency_format($value['don_gia']) ?></span>
                  </div>

                  <div class="sale-product">
                    <span>Giảm 100.000đ khi mua kèm iPhone 14</span>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-bottom">
                    <div class="app-top-sale__day-carousel-item-detail-bottom-vote">
                      <ul>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      </ul>
                    </div>
                    <div class="app-top-sale__day-carousel-item-detail-like-product">
                      <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu thích
                    </div>
                  </div>
                </div>
              </div>
               </a>
            <?php
            }
            ?>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>

<section class="app-phone-suggest container-fluid">
  <div class="container">
    <div class="app-phone-suggest__title">
      <div class="app-phone-suggest__title-left">
        <div class="app-phone-suggest__title-left-icon">
          <img src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg" alt="" />
        </div>
        <div class="app-phone-suggest__title-left-text">
          Top oppo bán chạy
        </div>
      </div>
      <div class="app-phone-suggest__title-right">
        <ul>
          <li><button>Máy tính Apple</button></li>
          <li><button>Macbook cũ 99%</button></li>
          <li><button>Gaming</button></li>

          <li>
            <button class="app-phone-suggest__title-right-active">
              Xem tất cả 1200 máy tính
            </button>
          </li>
        </ul>
      </div>
    </div>
    <div class="app-phone-suggest__product-flex">
      <div class="app-top-sale__day-carousel app-information__content-third owl-carousel owl-theme owl-loaded">
        <div class="owl-stage-outer">
          <div class="owl-stage">

          <?php
            foreach ([] as $key => $value) {
            ?>
               <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>" class="">
               <div class="app-top-sale__day-carousel-item owl-item">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -<?= (float)$value['giam_gia'] * 100 ?>%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="<?= $IMAGE_DIR_PRODUCT . $value['hinh'] ?>" alt="" />
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>"><?= $value['ten_hh'] ?></a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b><?= currency_format($value['don_gia'] - ($value['don_gia'] * (float)$value['giam_gia'])) ?></b> <span><?= currency_format($value['don_gia']) ?></span>
                  </div>

                  <div class="sale-product">
                    <span>Giảm 100.000đ khi mua kèm iPhone 14</span>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-bottom">
                    <div class="app-top-sale__day-carousel-item-detail-bottom-vote">
                      <ul>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      </ul>
                    </div>
                    <div class="app-top-sale__day-carousel-item-detail-like-product">
                      <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu thích
                    </div>
                  </div>
                </div>
              </div>
               </a>
            <?php
            }
            ?>
          </div>
        </div>


      </div>
    </div>
  </div>
</section>

<section class="app-phone-suggest container-fluid">
  <div class="container">
    <div class="app-phone-suggest__title">
      <div class="app-phone-suggest__title-left">
        <div class="app-phone-suggest__title-left-icon">
          <img src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg" alt="" />
        </div>
        <div class="app-phone-suggest__title-left-text">
          Top Vivo bán chạy
        </div>
      </div>
      <div class="app-phone-suggest__title-right">
        <ul>
          <li><button>iPad cũ</button></li>
          <li><button>Apple iPad</button></li>
          <li><button>Samsung Tab</button></li>
          <li><button>Máy tính bảng khác</button></li>

          <li>
            <button class="app-phone-suggest__title-right-active">
              Xem tất cả 148 máy tính bảng
            </button>
          </li>
        </ul>
      </div>
    </div>
    <div class="app-phone-suggest__product-flex">
      <div class="app-top-sale__day-carousel app-information__content-four owl-carousel owl-theme owl-loaded">
        <div class="owl-stage-outer">
          <div class="owl-stage">

          <?php
            foreach ([] as $key => $value) {
            ?>
               <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>" class="">
               <div class="app-top-sale__day-carousel-item owl-item">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -<?= (float)$value['giam_gia'] * 100 ?>%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="<?= $IMAGE_DIR_PRODUCT . $value['hinh'] ?>" alt="" />
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>"><?= $value['ten_hh'] ?></a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b><?= currency_format($value['don_gia'] - ($value['don_gia'] * (float)$value['giam_gia'])) ?></b> <span><?= currency_format($value['don_gia']) ?></span>
                  </div>

                  <div class="sale-product">
                    <span>Giảm 100.000đ khi mua kèm iPhone 14</span>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-bottom">
                    <div class="app-top-sale__day-carousel-item-detail-bottom-vote">
                      <ul>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      </ul>
                    </div>
                    <div class="app-top-sale__day-carousel-item-detail-like-product">
                      <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu thích
                    </div>
                  </div>
                </div>
              </div>
               </a>
            <?php
            }
            ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="app-phone-suggest container-fluid">
  <div class="container">
    <div class="app-phone-suggest__title">
      <div class="app-phone-suggest__title-left">
        <div class="app-phone-suggest__title-left-icon">
          <img src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg" alt="" />
        </div>
        <div class="app-phone-suggest__title-left-text">
          Phụ kiện tai nghe
        </div>
      </div>
      <div class="app-phone-suggest__title-right">
        <ul>
          <li><button>iPad cũ</button></li>
          <li><button>Apple iPad</button></li>
          <li><button>Samsung Tab</button></li>

          <li>
            <button class="app-phone-suggest__title-right-active">
              Xem tất cả 148 máy tính bảng
            </button>
          </li>
        </ul>
      </div>
    </div>
    <div class="app-phone-suggest__product-flex">
      <div class="app-top-sale__day-carousel app-information__content-five owl-carousel owl-theme owl-loaded">
        <div class="owl-stage-outer">
          <div class="owl-stage">

          <?php
            foreach ([] as $key => $value) {
            ?>
               <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>" class="">
               <div class="app-top-sale__day-carousel-item owl-item">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -<?= (float)$value['giam_gia'] * 100 ?>%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="<?= $IMAGE_DIR_PRODUCT . $value['hinh'] ?>" alt="" />
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>"><?= $value['ten_hh'] ?></a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b><?= currency_format($value['don_gia'] - ($value['don_gia'] * (float)$value['giam_gia'])) ?></b> <span><?= currency_format($value['don_gia']) ?></span>
                  </div>

                  <div class="sale-product">
                    <span>Giảm 100.000đ khi mua kèm iPhone 14</span>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-bottom">
                    <div class="app-top-sale__day-carousel-item-detail-bottom-vote">
                      <ul>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li>
                          <i class="vote-active fa fa-star" aria-hidden="true"></i>
                        </li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      </ul>
                    </div>
                    <div class="app-top-sale__day-carousel-item-detail-like-product">
                      <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu thích
                    </div>
                  </div>
                </div>
              </div>
               </a>
            <?php
            }
            ?>


          </div>
        </div>


      </div>
    </div>
  </div>
</section>

<section class="app-banner-bottom container-fluid">
  <div class="container">
    <div class="app-phone-suggest__title">
      <div class="app-phone-suggest__title-left">
        <div class="app-phone-suggest__title-left-icon">
          <img src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg" alt="" />
        </div>
        <div class="app-phone-suggest__title-left-text">
          24h công nghệ
        </div>
      </div>
      <div class="app-phone-suggest__title-right">
        <ul>
          <li>
            <button class="app-phone-suggest__title-right-active">
              Xem tất cả 1196 Tin
            </button>
          </li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        <img src="https://didongthongminh.vn/images/banners/resized/123666_1669950047.webp" alt="" />
      </div>
      <div class="col-sm-4">
        <img src="https://didongthongminh.vn/images/banners/resized/123jpg_1672121541.webp" alt="" />
      </div>
      <div class="col-sm-4">
        <img src="https://didongthongminh.vn/images/banners/resized/1234-1_1672121619.webp" alt="" />
      </div>
    </div>
  </div>
</section>

<section class="app-new-suggest container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-7 col-sm-12">
        <div class="app-new-suggest__top">
          <div class="app-new-suggest__top-image">
            <img src="https://didongthongminh.vn/images/news/2022/12/large/anh-bia_1672047783.webp" alt="" />
          </div>
          <div class="app-new-suggest__top-detail">
            <a href=""><span class="app-new-suggest__top-detail-title">Tết Sum Vầy - Đủ Đầy Quà Tặng - Tri Ân Khách Hàng Tới 500
                triệu</span></a>

            <a href=""><span class="app-new-suggest__top-detail-description">Dịp mua sắm tết 2023, Di Động Thông Minh tổ chức khuyến
                mãi tết linh đình. Đây là dịp tri ân khách hàng, với mong
                muốn đem sản ...
              </span></a>
          </div>
          <div class="app-new-suggest__top-time">
            <span><i class="fa fa-calendar" aria-hidden="true"></i>
              20/11/2022</span>

            <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-5 col-sm-12">
        <div class="app-new-suggest__center">
          <div class="app-new-suggest__center-item">
            <div class="app-new-suggest__center-item-img">
              <img src="https://didongthongminh.vn/upload_images/images/2022/12/03/ro-ri-them-thong-so-ky-thuat-cua-xiaomi-13-series.jpg" alt="" />
            </div>
            <div class="app-new-suggest__center-item-detail">
              <div class="app-new-suggest__center-item-detail-title">
                <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất?
                  </span></a>
              </div>

              <div class="app-new-suggest__center-item-detail-time">
                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                  20/11/2022</span>
                <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
              </div>
            </div>
          </div>
          <div class="app-new-suggest__center-item">
            <div class="app-new-suggest__center-item-img">
              <img src="https://didongthongminh.vn/upload_images/images/2022/12/22/gia%CC%81ng_sinh_ro%CC%A3%CC%82n_ra%CC%80ng.png" alt="" />
            </div>
            <div class="app-new-suggest__center-item-detail">
              <div class="app-new-suggest__center-item-detail-title">
                <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất? Chọn
                    màu theo phong thuỷ</span></a>
              </div>

              <div class="app-new-suggest__center-item-detail-time">
                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                  20/11/2022</span>
                <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
              </div>
            </div>
          </div>
          <div class="app-new-suggest__center-item">
            <div class="app-new-suggest__center-item-img">
              <img src="https://didongthongminh.vn/upload_images/images/2022/11/28/dem-nguoc-ngay-xiaomi-13-series-ra-mat.jpg" alt="" />
            </div>
            <div class="app-new-suggest__center-item-detail">
              <div class="app-new-suggest__center-item-detail-title">
                <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất? Chọn
                    màu theo phong thuỷ</span></a>
              </div>

              <div class="app-new-suggest__center-item-detail-time">
                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                  20/11/2022</span>
                <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
              </div>
            </div>
          </div>
          <div class="app-new-suggest__center-item">
            <div class="app-new-suggest__center-item-img">
              <img src="https://didongthongminh.vn/upload_images/images/2022/12/03/Ba%CC%89n_sao_cu%CC%89a_CT_2010_(1280_%C3%97_720_px).png" alt="" />
            </div>
            <div class="app-new-suggest__center-item-detail">
              <div class="app-new-suggest__center-item-detail-title">
                <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất? Chọn
                    màu theo phong thuỷ</span></a>
              </div>

              <div class="app-new-suggest__center-item-detail-time">
                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                  20/11/2022</span>
                <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
              </div>
            </div>
          </div>
          <div class="app-new-suggest__center-item">
            <div class="app-new-suggest__center-item-img">
              <img src="https://didongthongminh.vn/upload_images/images/2022/12/28/iphone-12-pro-max-co-may-mau.jpg" alt="" />
            </div>
            <div class="app-new-suggest__center-item-detail">
              <div class="app-new-suggest__center-item-detail-title">
                <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất? Chọn
                    màu theo phong thuỷ</span></a>
              </div>

              <div class="app-new-suggest__center-item-detail-time">
                <span><i class="fa fa-calendar" aria-hidden="true"></i>
                  20/11/2022</span>
                <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="app-new-suggest__top-image">
          <img src="https://didongthongminh.vn/upload_images/images/he-thong-cua-hang-didongthongminh.webp" alt="" />
        </div>
        <div class="app-new-suggest__top-detail">
          <a href=""><span class="app-new-suggest__top-detail-introduce-title"><b class="">Di Động Thông Minh</b> - Điện Thoại Chính Hãng
              Giá Rẻ</span></a>
          <a href=""><span class="app-new-suggest__top-detail-introduce-description">Cụm từ quen thuộc "Di Động Thông Minh" - hoá ra lại ẩn chứa
              đạo lý vận hành của vạn vật. Hãy đọc ngay để hiểu hành trình
              phát triển thương hiệu của chúng tôi.
            </span></a>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $('.app-nav').removeClass('app-nav__active');
  $('.app-header__top-item:nth-child(2)').removeClass('show-nav-app');
</script>

<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>