
<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>

<section class="app-top-sale__day container-fluid">
        <div class="container">
          <div class="app-top-sale__day-gb">
            <div class="app-top-sale__day-title">
              <h3>TOP THƯƠNG HIỆU APPLE</h3>
            
              
              <div class="app-top-sale__day-title-img">
                <img
                  src="https://cdn.tgdd.vn/mwgcart/mwg-site/ContentMwg/images/newyear2023/Background/bg-tuan-le-top-right2.png"
                  alt=""
                />
              </div>
              <div class="app-top-sale__day-title-img-right">
                <img
                  src="https://cdn.tgdd.vn/mwgcart/mwg-site/ContentMwg/images/newyear2023/Background/bg-tuan-le-top-right2.png"
                  alt=""
                />
              </div>
            </div>

            <div
              class="app-top-sale__day-carousel app-information__content owl-carousel owl-theme owl-loaded"
            >
              <div class="owl-stage-outer">
                <div class="owl-stage">
                 
                 
                  <?php foreach($topAppleSuggest as $key => $value){?>
                    <div class="app-top-sale__day-carousel-item owl-item">
                    <div class="app-top-sale__day-carousel-item-img">
                      <img
                        src="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>"
                        alt=""
                      />
                      <div class="app-top-sale__day-carousel-item-img-position">
                        <div
                          class="app-top-sale__day-carousel-item-img-position-center"
                        >
                          <div
                            class="app-top-sale__day-carousel-item-img-position-center-top"
                          >
                            <div
                              class="app-top-sale__day-carousel-item-img-position-center-icon"
                            >
                              <i class="fa fa-bolt" aria-hidden="true"></i>
                            </div>
                            <div class="discount-val">-<?= (float)$value['price_sale'] * 100 ?>%</div>
                          </div>
                          <div
                            class="app-top-sale__day-carousel-item-img-position-center-price"
                          >
                          <?= currency_format($value['price'] * (float)$value['price_sale']) ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="app-top-sale__day-carousel-item-detail">
                      <div class="app-top-sale__day-carousel-item-detail-title">
                        <a href="/product/<?=$value['platform_slug']?>/<?=$value['product_slug']?>"><?=$value['name']?></a>
                      </div>
                      <div class="app-top-sale__day-carousel-item-detail-price">
                        <b><?= currency_format($value['price'] - ($value['price'] * (float)$value['price_sale'])) ?></b> <span><?= currency_format($value['price']) ?></span>
                      </div>
                      <div class="app-top-sale__day-carousel-item-time-sale">
                        <i class="fa fa-clock-o" aria-hidden="true"></i
                        ><span>
                          Còn: <span class="highlight-time">2</span> ngày
                          <span class="highlight-time">18</span> giờ</span
                        >
                      </div>
                      <div
                        class="app-top-sale__day-carousel-item-total-product"
                      >
                        <div
                          style="width: 60%"
                          class="app-top-sale__day-carousel-item-total-product-tag"
                        ></div>
                        <div
                          class="app-top-sale__day-carousel-item-quantity-product"
                        >
                          Đã bán 82/100
                        </div>
                      </div>
                      <div
                        class="app-top-sale__day-carousel-item-detail-bottom"
                      >
                        <div
                          class="app-top-sale__day-carousel-item-detail-bottom-vote"
                        >
                          <ul>
                            <li>
                              <i
                                class="vote-active fa fa-star"
                                aria-hidden="true"
                              ></i>
                            </li>
                            <li>
                              <i
                                class="vote-active fa fa-star"
                                aria-hidden="true"
                              ></i>
                            </li>
                            <li>
                              <i
                                class="vote-active fa fa-star"
                                aria-hidden="true"
                              ></i>
                            </li>
                            <li>
                              <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                            <li>
                              <i class="fa fa-star" aria-hidden="true"></i>
                            </li>
                          </ul>
                        </div>
                        <div
                          class="app-top-sale__day-carousel-item-detail-like-product"
                        >
                          <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu
                          thích
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php }?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="app-banner-center container-fluid">
        <div class="container">
          <div class="">
            <img
              src="https://didongthongminh.vn/images/banners/resized/banner-dai_1667447003.webp"
              alt=""
            />
          </div>
          <div class="row">
            <div class="col-sm-6">
              <img
                src="https://didongthongminh.vn/images/banners/resized/samsung-a04s_1671616567.webp"
                alt=""
              />
            </div>
            <div class="col-sm-6">
              <img
                src="https://didongthongminh.vn/images/banners/resized/macbook-cu_1671590677.webp"
                alt=""
              />
            </div>
          </div>
        </div>
      </section>

      <section class="app-phone-suggest container-fluid">
        <div class="container">
          <div class="app-phone-suggest__title">
            <div class="app-phone-suggest__title-left">
              <div class="app-phone-suggest__title-left-icon">
                <img
                  src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg"
                  alt=""
                />
              </div>
              <div class="app-phone-suggest__title-left-text">
                Điện thoại đáng mua nhất
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
           
            <?php foreach($topPhoneSuggest as $key => $value){?>
              <div class="app-phone-suggest__product-item">
              <div class="app-top-sale__day-carousel-item-img">
                <img
                  src="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>"
                  alt=""
                />
                <div class="app-top-sale__day-carousel-item-img-position">
                  <div
                    class="app-top-sale__day-carousel-item-img-position-center"
                  >
                    <div
                      class="app-top-sale__day-carousel-item-img-position-center-top"
                    >
                      <div
                        class="app-top-sale__day-carousel-item-img-position-center-icon"
                      >
                        <i class="fa fa-bolt" aria-hidden="true"></i>
                      </div>
                      <div class="discount-val">-<?= (float)$value['price_sale'] * 100 ?>%</div>
                    </div>
                    <div
                      class="app-top-sale__day-carousel-item-img-position-center-price"
                    >
                    <?= currency_format($value['price'] * (float)$value['price_sale']) ?>
                    </div>
                  </div>
                </div>
              </div>

              <div class="app-top-sale__day-carousel-item-detail">
                <div class="app-top-sale__day-carousel-item-detail-title">
                  <a href="/product/<?=$value['platform_slug']?>/<?=$value['product_slug']?>"><?=$value['product_name']?></a>
                </div>
                <div class="app-top-sale__day-carousel-item-detail-price">
                  <b><?= currency_format($value['price'] - ($value['price'] * (float)$value['price_sale'])) ?></b> <span><?= currency_format($value['price']) ?></span>
                </div>
                <div class="app-top-sale__day-carousel-item-time-sale">
                  <i class="fa fa-clock-o" aria-hidden="true"></i
                  ><span>
                    Còn: <span class="highlight-time">2</span> ngày
                    <span class="highlight-time">18</span> giờ</span
                  >
                </div>
                <div class="app-top-sale__day-carousel-item-total-product">
                  <div
                    style="width: 60%"
                    class="app-top-sale__day-carousel-item-total-product-tag"
                  ></div>
                  <div class="app-top-sale__day-carousel-item-quantity-product">
                    Đã bán 82/100
                  </div>
                </div>
                <div class="app-top-sale__day-carousel-item-detail-bottom">
                  <div
                    class="app-top-sale__day-carousel-item-detail-bottom-vote"
                  >
                    <ul>
                      <li>
                        <i
                          class="vote-active fa fa-star"
                          aria-hidden="true"
                        ></i>
                      </li>
                      <li>
                        <i
                          class="vote-active fa fa-star"
                          aria-hidden="true"
                        ></i>
                      </li>
                      <li>
                        <i
                          class="vote-active fa fa-star"
                          aria-hidden="true"
                        ></i>
                      </li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    </ul>
                  </div>
                  <div
                    class="app-top-sale__day-carousel-item-detail-like-product"
                  >
                    <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu thích
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
           
          </div>
        </div>
      </section>

      

      <?php foreach($listPlatform as $key => $value){?>

        <section class="app-phone-suggest container-fluid">
        <div class="container">
          <div class="app-phone-suggest__title">
            <div class="app-phone-suggest__title-left">
              <div class="app-phone-suggest__title-left-icon">
                <img
                  src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg"
                  alt=""
                />
              </div>
              <div class="app-phone-suggest__title-left-text">
                <?=$value['name']?> đáng mua nhất
              </div>
            </div>
            <div class="app-phone-suggest__title-right">
              <ul>
                <?php foreach($this->category->getCategoryByPlatformID($value['id']) as $key3 => $child){?>
                  <li><button><a href="/plat-form/<?=$value['slug']?>?ca=c<?=$child['id']?>" class=""><?=$child['name']?></a></button></li>
                <?php }?>
               
               

                <li>
                  <button class="app-phone-suggest__title-right-active">
                    <a href="/plat-form/<?=$value['slug']?>" class="">Xem tất cả <?=$value['name']?></a>
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <div class="app-phone-suggest__product-flex">
            <div class="app-top-sale__day-carousel app-information__content-second owl-carousel owl-theme owl-loaded">
                <div class="owl-stage-outer">
                    <div class="owl-stage">
                        <?php foreach($this->product->getProductByPlatformID($value['id']) as $key1 => $product) {?>
                          <div class="app-top-sale__day-carousel-item owl-item">
                          <div class="app-top-sale__day-carousel-item-img-top-sale">
                            -<?= (float)$product['price_sale'] * 100 ?>%
                          </div>
                          <div class="app-top-sale__day-carousel-item-img">
                            <img
                              src="<?=IMAGE_DIR_PRODUCT.$product['thumb']?>"
                              alt=""
                            />
                          </div>

                          <div class="app-top-sale__day-carousel-item-detail">
                            <div class="app-top-sale__day-carousel-item-detail-title">
                              <a href="/product/<?=$product['platform_slug']?>/<?=$product['product_slug']?>"><?=$product['product_name']?></a>
                            </div>
                            <div class="app-top-sale__day-carousel-item-detail-price">
                              <b><?= currency_format($product['price'] - ($product['price'] * (float)$product['price_sale'])) ?></b> <span><?= currency_format($product['price']) ?></span>
                            </div>

                            <div class="sale-product">
                              <span>Giảm 100.000đ khi mua kèm iPhone 14</span>
                            </div>
                            <div class="app-top-sale__day-carousel-item-detail-bottom">
                              <div
                                class="app-top-sale__day-carousel-item-detail-bottom-vote"
                              >
                                <ul>
                                  <li>
                                    <i
                                      class="vote-active fa fa-star"
                                      aria-hidden="true"
                                    ></i>
                                  </li>
                                  <li>
                                    <i
                                      class="vote-active fa fa-star"
                                      aria-hidden="true"
                                    ></i>
                                  </li>
                                  <li>
                                    <i
                                      class="vote-active fa fa-star"
                                      aria-hidden="true"
                                    ></i>
                                  </li>
                                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                </ul>
                              </div>
                              <div
                                class="app-top-sale__day-carousel-item-detail-like-product"
                              >
                                <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu thích
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php }?>
            </div>
        </div>


            </div>
          </div>
        </div>
      </section>
      <?php }?>

      <section class="app-banner-bottom container-fluid">
        <div class="container">
          <div class="app-phone-suggest__title">
            <div class="app-phone-suggest__title-left">
              <div class="app-phone-suggest__title-left-icon">
                <img
                  src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg"
                  alt=""
                />
              </div>
              <div class="app-phone-suggest__title-left-text">
                24h công nghệ
              </div>
            </div>
            <div class="app-phone-suggest__title-right">
              <ul>
                <li>
                  <button class="app-phone-suggest__title-right-active">
                     <a href="/new" class="">Xem tất cả <?=count($listPostsSuggest)?> Tin</a>
                  </button>
                </li>
              </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <img
                src="https://didongthongminh.vn/images/banners/resized/123666_1669950047.webp"
                alt=""
              />
            </div>
            <div class="col-sm-4">
              <img
                src="https://didongthongminh.vn/images/banners/resized/123jpg_1672121541.webp"
                alt=""
              />
            </div>
            <div class="col-sm-4">
              <img
                src="https://didongthongminh.vn/images/banners/resized/1234-1_1672121619.webp"
                alt=""
              />
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
                  <img
                    src="<?=IMAGE_DIR_POST.$firstPost['thumb']?>"
                    alt=""
                  />
                </div>
                <div class="app-new-suggest__top-detail">
                  <a href="/new/<?=$firstPost['slug']?>"
                    ><span class="app-new-suggest__top-detail-title"
                      ><?=$firstPost['title']?></span
                    ></a
                  >

                  <a href="/new/<?=$firstPost['slug']?>"
                    ><span class="app-new-suggest__top-detail-description"
                      ><?=$firstPost['description']?> ...
                    </span></a
                  >
                </div>
                <div class="app-new-suggest__top-time">
                  <span
                    ><i class="fa fa-calendar" aria-hidden="true"></i>
                    20/11/2022</span
                  >

                  <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12">
              <div class="app-new-suggest__center">
                <?php foreach($listPostsSuggest as $key => $value){?>
                  <div class="app-new-suggest__center-item">
                  <div class="app-new-suggest__center-item-img">
                    <img
                      src="<?=IMAGE_DIR_POST.$value['thumb']?>"
                      alt=""
                    />
                  </div>
                  <div class="app-new-suggest__center-item-detail">
                    <div class="app-new-suggest__center-item-detail-title">
                      <a href="/new/<?=$value['slug']?>"
                        ><span
                          ><?=$value['title']?>
                        </span></a
                      >
                    </div>

                    <div class="app-new-suggest__center-item-detail-time">
                      <span
                        ><i class="fa fa-calendar" aria-hidden="true"></i>
                        <?=$value['createdAt']?></span
                      >
                      <span
                        ><i class="fa fa-eye" aria-hidden="true"></i> 520</span
                      >
                    </div>
                  </div>
                </div>
                <?php }?>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="app-new-suggest__top-image">
                <img
                  src="https://didongthongminh.vn/upload_images/images/he-thong-cua-hang-didongthongminh.webp"
                  alt=""
                />
              </div>
              <div class="app-new-suggest__top-detail">
                <a href=""
                  ><span class="app-new-suggest__top-detail-introduce-title"
                    ><b class="">Di Động Thông Minh</b> - Điện Thoại Chính Hãng
                    Giá Rẻ</span
                  ></a
                >
                <a href=""
                  ><span
                    class="app-new-suggest__top-detail-introduce-description"
                    >Cụm từ quen thuộc "Di Động Thông Minh" - hoá ra lại ẩn chứa
                    đạo lý vận hành của vạn vật. Hãy đọc ngay để hiểu hành trình
                    phát triển thương hiệu của chúng tôi.
                  </span></a
                >
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