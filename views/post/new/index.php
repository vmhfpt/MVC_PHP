<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>

<section class="app-bread-crumb container-fluid">
        <div class="container">
          <ul class="">
            <li class=""><a href="" class="">Trang chủ</a> /</li>
            <li class=""><a href="" class="">Tin tức & Sự kiện</a></li>
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
                 <div class="row">
                     <div class="col-sm-12 col-md-8 mt-1">
                         <div class="app-new__content-first-item">
                             <div class="">
                              <img src="<?=IMAGE_DIR_POST.$firstPost[0]['thumb']?>" alt="" class="">
                             </div>

                          <div class="app-new__content-first-item-detail">
                            <a href="/new/<?=$firstPost[0]['slug']?>" class=""><h2 class="">
                              <?=$firstPost[0]['title']?></h2></a>
                          </div>

                          <div class="app-new__content-first-item-date">
                               
                              <span class="">
                                <i class="fa fa-calendar" aria-hidden="true"></i> <?=$firstPost[0]['createdAt']?>
                              </span>
                              <span class=""><i class="fa fa-eye" aria-hidden="true"></i> 64</span>
                          </div>


                          <div class="">
                            <p class=""><?=$firstPost[0]['description']?></p>
                          </div>
                             
                         </div>
                     </div>
                     <div class="col-sm-12 col-md-4 mt-1">
                         <div class="app-new__content-item-second">
                              <div class="app-new__content-item-second-img">
                                <img src="<?=IMAGE_DIR_POST.$firstPost[1]['thumb']?>" alt="" class="">
                              </div>

                              <div class="app-new__content-item-second-title">
                                 <a href="/new/<?=$firstPost[1]['slug']?>" class=""><h3 class="">
                                 <?=$firstPost[1]['title']?>
                                 </h3></a>
                              </div>
                              <div class="app-new__content-first-item-date">
                               
                                <span class="">
                                  <i class="fa fa-calendar" aria-hidden="true"></i>  <?=$firstPost[1]['createdAt']?>
                                </span>
                                <span class=""><i class="fa fa-eye" aria-hidden="true"></i> 64</span>
                            </div>
                         </div>
                         <div class="app-new__content-item-second-list">
                         
                         <?php for($i = 2; $i <= 4; $i ++){?>
                          <a href="/new/<?=$firstPost[$i]['slug']?>" class="">
                          <div class="app-new__content-item-second-list-block">
                          <div class="app-new__content-item-second-list-block-title">
                            <span class=""><?=$firstPost[$i]['title']?></span>
                          </div>
                          <div class="app-new__content-first-item-date">
                           
                            <span class="">
                              <i class="fa fa-calendar" aria-hidden="true"></i> <?=$firstPost[$i]['createdAt']?>
                            </span>
                            <span class=""><?=$firstPost[$i]['name']?></span>
                        </div>
                      </div>
                          </a>
                         <?php }?>
                        



                         </div>
                     </div>
                      
                     <?php foreach($dataItem as $key => $value){?>
                      <a href="/new/<?=$value['slug']?>" class="">
                      <div class="col-sm-12 ">
                           <div class="app-new__content-item-third-item">
                               <div class="app-new__content-item-third-img ">
                                   <img src="<?=IMAGE_DIR_POST.$value['thumb']?>" alt="" class="">
                               </div>
                               <div class="app-new__content-item-third-detail ">
                                 <div class="">
                                  <h3 class=""><?=$value['title']?></h3>
                                </div>
                                <div class="app-new__content-first-item-date">
                             
                                  <span class="">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <?=$value['createdAt']?>
                                  </span>
                                  <span class=""><i class="fa fa-eye" aria-hidden="true"></i> <?=$value['name']?></span>
                              </div>
                              <div class="app-new__content-item-third-item-thumbnail">
                                 <p class=""> <?=$value['description']?></p>
                              </div>
                               </div>
                               
                           </div>
                      </div>
                      </a>
                     <?php }?>

     <div class="col-sm-12 ">
          <div class="app-new__content-item-second-pagination">
               <ul class="">
               <?=$page > 1 ? ' <a href="?page='.($page -1).'" class=""><li class=""><</li></a>' : ''?>
                 
                 
                 
                  <?php for($i = 1; $i <= ceil($totalItem / $limitShow); $i ++) {?>

                    <a href="?page=<?=$i?>" class=""><li class="<?=$page == $i ? 'app-new__content-item-second-pagination-active' : '' ?>"><?=$i?></li></a>
                  <?php }?>
                  
                  <?= $page >= ceil($totalItem / $limitShow) ? '' :  '<a href="?page='.($page + 1).'" class=""><li class="">></li></a>' ?>
               </ul>
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