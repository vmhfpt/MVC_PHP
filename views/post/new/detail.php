<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>
<section class="app-bread-crumb container-fluid">
        <div class="container">
          <ul class="">
            <li class=""><a href="" class="">Trang chủ</a> /</li>
            <li class=""><a href="" class=""><?=$item['title']?></a></li>
          </ul>
        </div>
      </section>

      <section class="app-filter-category container-fluid ">
         <div class="container">
             <div class="app-filter-category__content">
             <ul class="">
                  
                  <?php foreach($listCategory as $key => $value){?>
                    <a href="/category/new/<?=$value['slug']?>" class=""> <li class=""><?=$value['name']?></li></a>
                  <?php }?>
               </ul>
             </div>
         </div>
      </section>

     <section class="app-new container-fluid ">
         <div class="container">
             <div class="app-new__content">
              <div class="app-new__content-item ">
                   <div class="app-detail-post">
                        <div class="app-detail-post__content">
                             <div class="app-detail-post__content-title">
                                  <div class="app-detail-post__content-title-h3">
                                    <h3 class=""><?=$item['title']?></h3>
                                  </div>

                                  <div class="app-detail-post__content-title-date">
                                       <div class="app-detail-post__content-title-date-item">
                                          <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> <?=$item['createdAt']?></span>
                                          <span class="">
                                            <i class="fa fa-eye" aria-hidden="true"></i> 35
                                          </span>
                                       </div>

                                       <div class="app-detail-post__content-title-date-author">
                                          <span class="">Tác Giả: <b class="">HongHanh</b> Hồng Hạnh</span>
                                       </div>
                                  </div>
                             </div>

                             <div class="app-detail-post__content-news">
                                  <?=$item['content']?>
                             </div>

                             <div class="app-detail-post__content-next-suggest">
                                 <span class=""><b class="">Bạn đang xem:</b><?=$item['title']?></span>
                          <?php if(isset($postPrev['slug'])){?>
                            <span class=""><a href="/new/<?=$postPrev['slug']?>" class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Bài trước</a></span>
                          <?php }?>
                                
                             </div>
                        </div>
                        <div class="app-detail-post__relevant">
                            <div class="app-detail-promotion__tab">
          
                                <img data="https://didongthongminh.vn/modules/products/assets/images/danhgia.svg" alt="icon" class="img-responsive icon_cat lazy-loaded" width="42" height="36" src="https://didongthongminh.vn/modules/products/assets/images/icon_pk.svg">
                                <span>Bài viết liên quan</span>
                            
                            </div>

                            <div class="app-detail-post__relevant-content">
                                <div class="row">
                                   
                                   
                                    <?php foreach( $postSuggest as $key => $value){?>
                                      <div class="col-sm-4 ">
                                        <div class="app-detail-post__relevant-content-item">
                                            <div class="app-detail-post__relevant-content-item-img">
                                                <img src="<?=IMAGE_DIR_POST.$value['thumb']?>" alt="" class="">

                                                <a href="/new/<?=$value['slug']?>" class=""><span class=""><?=$value['title']?></span></a>
                                            </div>

                                            <div class="app-detail-post__relevant-content-item-detail">
                                                <span class=""><i class="fa fa-calendar" aria-hidden="true"></i> <?=$value['createdAt']?></span>
                                                <span class="">
                                                  <?=$value['name']?>
                                                </span>
                                             </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>


                     
                   </div>
              </div>
              <div class="app-new__content-item" >
                  <div class="app-new__content-item-right">
                    <div class="app-new__content-item-right-search">
                           <input type="text" name="" id="" placeholder="Từ khóa tìm kiếm">
                           <button class=""><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>


                    <div class="app-new__content-item-right-new-hot">
                         <div class="app-new__content-item-right-tag">
                          <h3 class="">chủ đề hot</h3>
                         </div>
                         <div class="app-new__content-item-right-content">
                         <?php foreach($listCategory as $key => $value){?>
                    <a href="/category/new/<?=$value['slug']?>" class=""> 
                    <div class="app-new__content-item-right-content-item">
                          <span class=""><?=$value['name']?></span>
                      </div>
                  </a>
                  <?php }?>
                    

                         </div>
                    </div>


                    <div class="app-new__content-item-right-many-view">
                      <div class="app-new__content-item-right-tag">
                        <h3 class="">Tin đánh giá</h3>
                       </div>

                       <div class="app-new__content-item-right-many-view-content">
                       <?php foreach($secondPost as $key => $value){?>
                          <a href="/new/<?=$value['slug']?>" class="">
                          <div class="app-new__content-item-right-many-view-item">
                            <div class="app-new__content-item-right-many-view-item-left"><?=($key +1)?></div>
                            <div class="app-new__content-item-right-many-view-item-right"><?=$value['title']?></div>
                        </div>
                          </a>
                        <?php }?>
                       </div>
                    </div>

                    <div class="app-new__content-item-right-promotion">
                      <div class="app-new__content-item-right-tag">
                        <h3 class="">Tin khuyến mại</h3>
                       </div>

                       <div class="app-new__content-item-right-promotion-content">
                          <div class="row">
                              <div class="col-sm-12">
                                <div class="app-new__content-item-right-promotion-content-item">
                                    <img src="<?=IMAGE_DIR_POST.$thirdPost[0]['thumb']?>" alt="" class="">

                           <a href="/new/<?=$thirdPost[0]['slug']?>" class="">    <span class=""><?=$thirdPost[0]['title']?></span></a>
                                </div>
                              </div>


                      <?php foreach($thirdPost as $key => $value){?>
                         <?php if($key == 0) continue; ?>
                        <div class="col-sm-12 col-md-6">
                                <div class="app-new__content-item-right-promotion-content-item">
                                  <img src="<?=IMAGE_DIR_POST.$value['thumb']?>" alt="" class="">

                         <a href="/new/<?=$value['slug']?>" class="">  <span class=""><?=$value['title']?></span></a>
                              </div>
                              </div>
                      <?php }?>
                             
                             
                              
                          </div>
                       </div>
                    </div>


                    <div class="app-new__content-item-right-recruitment">
                      <div class="app-new__content-item-right-tag">
                        <h3 class="">Mẹo hay</h3>
                       </div>

                       <div class="app-new__content-item-right-recruitment-content">

                          
<?php foreach($fourthPost as $key => $value){?>
  <a href="/new/<?=$value['slug']?>" class="">
  <div class="app-new__content-item-right-recruitment-content-item">
     <div class="app-new__content-item-right-recruitment-content-item-title">
         <span class=""><?= $value['title']?></span>

         <span class=""><?= $value['name']?></span>
     </div>
     <div class="app-new__content-item-right-recruitment-content-item-date">
       <span class="">Ngày đăng</span>
       <span class="">31/03/2023</span>
     </div>
</div>
  </a>
<?php }?>
</div>
                    </div>


                    <div class="app-new__content-item-right-product-post">
                      <div class="app-new__content-item-right-tag">
                        <h3 class="">Sản phẩm mới</h3>
                       </div>
                       <div class="app-new__content-item-right-product-post-content">
                        
                        <?php foreach($top5Product as $key => $value){?>
                          <div class="app-new__content-item-right-product-post-content-item">
                            <div class="app-new__content-item-right-product-post-content-item-img">
                                <img src="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>" alt="" class="">
                            </div>
                            <div class="app-new__content-item-right-product-post-content-item-detail">
                               <a href="/product/<?=$value['platform_slug']?>/<?=$value['slug']?>" class=""><span class=""><?=$value['name']?></span></a>
                               <a href="/product/<?=$value['platform_slug']?>/<?=$value['slug']?>" class=""><span class="">Liên hệ</span></a>
                               <a href="/product/<?=$value['platform_slug']?>/<?=$value['slug']?>" class=""><span class="app-new__content-item-right-product-post-content-item-detail-emphasize"><?=currency_format($value['price'])?></span></a>
                            </div>
                           
                        </div>
                        <?php }?>
                       </div>
                    </div>
                  </div>
              </div>
             </div>
         </div>
     </section>

<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>