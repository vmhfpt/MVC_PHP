<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>

<section class="app-bread-crumb container-fluid">
        <div class="container">
          <ul class="">
            <li class=""><a href="" class="">Trang chủ</a> /</li>
            <li data-dir-product="<?=IMAGE_DIR_PRODUCT?>" data-dir-library="<?=IMAGE_DIR_LIBRARY?>" class="get-dir"><a href="" class="">Điện thoại</a></li>
          </ul>
        </div>
      </section>

      <section class="app-detail-title container-fluid">
        <div class="container">
          <div class="app-detail-title__content">
            <div class="app-detail-title__content-item price-price-init" data-price="<?=$item['price'] - ($item['price'] * $item['price_sale'])?>" >
              <h2 class="data-name-product"><?=$item['name']?></h2>
            </div>
            <div class="app-detail-title__content-item">
              <span class="">Cam kết Zin 100%, Đẹp Như Mới</span>
            </div>
            <div class="app-detail-title__content-item">
              <div class="app-detail-title__content-item-rank">
                <ul class="">
                  <li class="">
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </li>
                  <li class="">
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </li>
                  <li class="">
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </li>
                  <li class="">
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </li>
                  <li class="">
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </li>
                </ul>
              </div>
              <div class="app-detail-title__content-item-vote">
                <span class="">25 đánh giá</span>
              </div>
              <div class="app-detail-title__content-item-sale">Trả góp 0%</div>
            </div>
          </div>
        </div>
      </section>

      <section class="app-detail-top container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12  app-click-show__library">
              <div class="app-detail-top__content">
                <div class="app-detail-top__content-carousel-top">
                <div class="app-detail-top__content-carousel-top-detail owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                      <div class="owl-stage">
                         <?php foreach($firstLibraryColor as $key => $value){?>
                            <div class="owl-item">
                              <a href="#slide=true"
                                ><img
                                  src="<?=IMAGE_DIR_LIBRARY.$value['thumb']?>"
                                  alt=""
                                  class=""
                              /></a>
                            </div>
                         <?php }?>
                        
                      </div>
                    </div>
  </div>
                </div>
                <div class="app-detail-top__content-carousel-bottom">
                <div class="app-detail-top__content-carousel-bottom-detail owl-carousel owl-theme owl-loaded">
                      <div class="owl-stage-outer">
                        <div class="owl-stage">
                         
                          <?php foreach($firstLibraryColor as $key => $value){?>
                            <div data-slide="<?=$key + 1?>" class="click-show-slide owl-item">
                            <img
                              src="<?=IMAGE_DIR_LIBRARY.$value['thumb']?>"
                              alt=""
                              class=""
                            />
                          </div>
                          <?php }?>
      </div>
    </div>
  </div>
                </div>
           
              </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12">
              <div class="app-detail-top__center">

                <div class="app-detail-top__center-cost">
                     <div class="">
                        <span class="">Giá tại:</span>
                        <select name="" id="" class="">
                            <option value="" class="">Hà Nội</option>
                            <option value="" class="">TP Hồ Chí Minh</option>
                            <option value="" class="">Đà Nẵng</option>
                        </select>
                     </div>
                     <div class="">
                        <b class="app-detail-top__center-cost-sale" id="show-price-product"><?= currency_format(($item['price'] - ($item['price'] * (float)$item['price_sale'])) + ( $firstColor['price'] - ($firstColor['price'] * $firstColor['price_sale'] ))) ?></b>
                        <span class="app-detail-top__center-cost-promotion" data-price-sale="<?=$item['price'] - ($item['price'] * $item['price_sale'])?>" data-price="<?=$item['price']?>" ><?= currency_format($item['price']) ?></span>
                     </div>
                     
                </div>
               
                <div class="app-detail-top__center-filter"  >
                    <div class="app-detail-top__center-filter-attribute get-data-attribute-product" id="show-attribute-price-product" data-array='<?=json_encode($listPriceAttributeProduct)?>' data-total='<?=json_encode($totalArrayAttribute)?>'>
                      
                       <?php foreach($listPriceAttributeProduct as $key => $value){?>
                        <div data-attribute-product="<?=$value['attribute_price_id']?>"  data-value="<?=$value['value']?>" data-price="<?=($value['price'] - ($value['price'] * $value['price_sale']))?>" data-name="<?=$value['type_name']?>" class="<?=$value['type_name']?> app-detail-top__center-filter-attribute-item ">
                            <span class="app-detail-top__center-filter-attribute-item-tab"><?=$value['type_name']?></span>
                            <b class=""><?=$value['value']?></b>
                            <span class="price-change"> + <?= currency_format(($value['price'] - ($value['price'] * $value['price_sale']))) ?></span>
                        </div>
                        
                       <?php }?>
                      
                    </div>
                   
                    <div class="app-detail-top__center-filter-color" data-color='<?= json_encode($listColorProduct)?>' >
                      <?php foreach($listColorProduct as $key => $value) {?>
                        <div data-name="<?=$value['value']?>" data-thumb="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>"  data-price="<?=($item['price'] - ($item['price'] * (float)$item['price_sale'])) + ($value['price'] - ($value['price'] * $value['price_sale']))?>" data-color="<?=$value["attribute_prd_id"]?>" class="app-detail-top__center-filter-color-item <?=$value['attribute_prd_id'] == $firstColor['attribute_product_id'] ? "item_same-active": "" ?>">
                            <div class="">
                                <img src="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>" alt="" class="">
                            </div>
                            <div class="app-detail-top__center-filter-color-item-detail">
                                <span class=""><?=$value['value']?></span>
                                <span class=""><?= currency_format(($item['price'] - ($item['price'] * (float)$item['price_sale'])) + ($value['price'] - ($value['price'] * $value['price_sale']))) ?></span>
                            </div>
                         </div>
                      <?php }?>        
                    </div>
                </div>
              
                <?php if(!empty($listCoupon)){?>
                  <div class="app-detail-top__center-promotion app-detail-top__center-promotion-get" data-coupon='<?=json_encode($listCoupon)?>'>
                    <div class="app-detail-top__center-promotion-title-tab">
                        <span class="">Quà tặng mã giảm giá</span>
                    </div>
                    <div class="app-detail-top__center-promotion-detail">
                        <ul class="">
                            <?php foreach($listCoupon as $key => $value){?>
                              <li class=""><i class="fa fa-check-circle" aria-hidden="true"></i> <?=$value['coupon_name']?></li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <?php }?>
               

                
                <?php if(!empty($giftProduct)){?>

                  <div class="app-detail-top__center-promotion app-detail-top__center-promotion-total" data-total="<?=count($giftProduct)?>">
                    <div class="app-detail-top__center-promotion-title-tab">
                        <span class="">Quà tặng kèm</span>
                    </div>
                    <div class="app-detail-top__center-promotion-detail">
                        <?php foreach($giftProduct as $key => $value){?>
                          <div class="app-detail-top__center-promotion-product-detail">
                            <div class="app-detail-top__center-promotion-product-detail-img">
                                <img src="<?=IMAGE_DIR_PRODUCT.$value['thumb']?>" alt="" class="">
                            </div>
                            <div class="app-detail-top__center-promotion-product-detail-title">
                                
                                    <a href="/product/<?=$value['platform_slug']?>/<?=$value['product_slug']?>" class=""><b class=""><?=$value['product_name_gift']?></b></a>

                                    <a href="" class=""><span class="">Giá : <b class=""><?=currency_format($value['price'] - ($value['price'] * $value['price_sale']))?></b></span>

                                    </a>
                               
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
                <?php }?>


              

                <div class="app-detail-top__center-promotion">
                    <div class="app-detail-top__center-promotion-title-tab">
                        <span class="">Bảo hành cơ bản</span>
                    </div>
                    <div class="app-detail-top__center-promotion-detail">
                        <ul class="">
                            <li class=""><i class="fa fa-check-circle" aria-hidden="true"></i> Bảo hành 6 tháng tại hệ thống Di Động Thông Minh<a href="" class="link-to-detail">chi tiết</a></li>
                            <li class=""><i class="fa fa-check-circle" aria-hidden="true"></i>Bảo hành toàn diện cả nguồn, màn hình, vân tay</li>
                            <li class=""><i class="fa fa-check-circle" aria-hidden="true"></i>  1 đổi 1 trong 30 ngày nếu máy có lỗi từ nhà sản xuất</li>
                        </ul>
                    </div>
                </div>

                <div class="app-detail-top__center-payload">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="app-detail-top__center-payload-btn app-detail-top__center-payload-btn-orange add-to-cart">
                                <span class="">mua ngay</span>
                                <span class="">Giao tận nơi hoặc nhận tại cửa hàng</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="app-detail-top__center-payload-btn app-detail-top__center-payload-btn-green">
                                <span class="">mua trả góp 0%</span>
                                <span class="">Duyệt hồ sơ trong 5 phút</span>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="app-detail-top__center-payload-btn app-detail-top__center-payload-btn-green">
                                <span class="">trả góp qua thẻ</span>
                                <span class="">Visa, Mastercard, JCB, Amex</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <script>
                  function addCart(item){
                    var shopCart = JSON.parse(localStorage.getItem("carts"));
                    if(shopCart == null){
                        localStorage.setItem("carts", JSON.stringify([item]));
                    }else {
                      function checkArray(arr, id){
                          for(var i = 0; i < arr.length; i ++){
                            if(arr[i].id == id){
                              return(true);
                            }
                          }
                          return (false);
                        }
                      function isEqual(object) {
                          shopCart = JSON.parse(localStorage.getItem("carts"));
                          for(var i = 0; i < shopCart.length; i ++){
                             if((object.id === shopCart[i].id) && (shopCart[i].stringPriceAttribute === object.stringPriceAttribute)){
                               return true;
                             }
                          }
                          return false;
                      
                        }
                    
                       // isEqual(item);
                        if(checkArray(shopCart, item.id) == true && isEqual(item) == true){
                        var newArr = shopCart.map((value, key) => {
                              if(value.id == item.id){
                                return {
                                  ...value,
                                  quantity : (Number((value.quantity)) + 1)
                                }
                              }else {
                                  return (value);
                              }
                        });
                           localStorage.setItem("carts", JSON.stringify(newArr));
                        }else {
                            localStorage.setItem("carts", JSON.stringify([...shopCart, item]));
                        }

                    }
                    //console.log(JSON.parse(localStorage.getItem("carts")));
                    window.location.replace("/cart");
                  }


                  var attributeArrCart = [];
                  var dataListCouponProduct = false;
                  var giftProductTotal = false;
                
                $(document).on("click", ".add-to-cart", function() {
                  attributeArrCart = [];
                    var thumb = $('.item_same-active').attr('data-thumb');
                    if($('.app-detail-top__center-promotion-total')){
                      giftProductTotal = $('.app-detail-top__center-promotion-total').attr('data-total');
                    }
                    
                    $('.item_same-active-attribute').map((index,value) => {
                       let objectArr = {
                        name : $(value).attr('data-name'),
                        value :  $(value).attr('data-value'),
                          price_attribute_product :  $(value).attr("data-attribute-product"),
                       }
                       attributeArrCart.push(objectArr);
                    });
                    
                   var dataListAttributeProductPrice = ( JSON.parse($('.get-data-attribute-product').attr("data-array")));
                   var dataListColorProduct = JSON.parse($('.app-detail-top__center-filter-color').attr('data-color'));
                   
                   if($(".app-detail-top__center-promotion-get").length != 0){
                     var dataListCouponProduct = JSON.parse($(".app-detail-top__center-promotion").attr('data-coupon'));
                   }
                   
                   
                   var nameProduct = $('.data-name-product').text();
                   var priceCurrent = $('#show-price-product').text();
                   priceCurrent = (priceCurrent.replaceAll('.', '').slice(0, -1));
                   var colorCurrent = {
                      name : $('.item_same-active').attr('data-name'),
                      id : $('.item_same-active').attr('data-color'),
                      price : Number($('.item_same-active').attr('data-price'))
                   }
                  
                   let objectCart = {
                      name : nameProduct,
                      priceCurrent : Number(priceCurrent),
                      quantity : 1,
                      thumb : thumb,
                      attributePriceCurrent : attributeArrCart,
                      dataListAttributeProductPrice : dataListAttributeProductPrice,
                      dataListColorProduct : dataListColorProduct,
                      colorCurrent : colorCurrent,
                      dataListCouponProduct  : dataListCouponProduct,
                      giftProduct : Number(giftProductTotal),
                      priceInitProduct : Number($('.price-price-init').attr('data-price')),
                      urlProduct : window.location.pathname,
                      id : Number(colorCurrent.id),
                      stringPriceAttribute : String(JSON.stringify(attributeArrCart)),
                      priceInitProduct : Number($('.app-detail-top__center-cost-promotion').attr('data-price')),
                      priceSaleInitProduct : Number($('.app-detail-top__center-cost-promotion').attr('data-price-sale'))
                   }
                 
                   //console.log(objectCart);
                   if(attributeArrCart.length == (JSON.parse($('.get-data-attribute-product').attr("data-total"))).length){
                     $('#alert-add-cart').remove();
                     addCart(objectCart);
                   }else {
                     $('#alert-add-cart').remove();
                     $('#show-attribute-price-product').before(`<span id="alert-add-cart" style="color : red" >* Vui lòng lựa chọn phiên bản phù hợp </span>`);
                   }
                });

                </script>

                <div class="app-detail-top__center-last">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="app-detail-top__center-last-tab">
                              <div class="app-detail-top__center-last-tab-call">
                                <span class="">Gọi đặt mua : </span>
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                                <span class="">085 5100 001 (Miễn phí 7:30 - 21:30)</span>
                              </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                                <div class="app-detail-top__center-last-tab">
                                    <div class="app-detail-top__center-last-tab-share">
                                        <i class="fa fa-link" aria-hidden="true"></i>
                                        <span class="">Sao chép đường dẫn</span>
                                    </div>
                                </div>
                    
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="app-detail-top__center-last-tab">
                                <div class="app-detail-top__center-last-tab-share">
                                    <i class="fa fa-clipboard" aria-hidden="true"></i>
                                    <span class="">Sao chép thông tin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

              </div>
            </div>
            <div class="col-lg-3 col-md-12 col-sm-12">
              <div class="app-detail-top__content-right">
                 <div class="app-detail-top__content-right-address">
                  <span class="">Có 2 cửa hàng có sẵn sản phẩm</span>
                   <div class="app-detail-top__content-right-address-list">
                    <div class="app-detail-top__content-right-address-item">
                      <div class="app-detail-top__content-right-address-item-title">
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_store.svg" alt="" class="" />
                           <span class="">119 Thái Thịnh Đống Đa Hà Nội</span>
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_link.svg" alt="" class=""/>
                      </div>


                      <div class="app-detail-top__content-right-address-item-detail">
                        <div class="app-detail-top__content-right-address-item-detail-phone">
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/icon_phone.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-text">096611995</span>
                            </div>
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/conhang.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-item-active">Còn hàng</span>
                            </div>
                        </div>
                        <div class="app-detail-top__content-right-address-item-detail-map">
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                             <img src="https://didongthongminh.vn/modules/products/assets/images/icon_map.svg" alt="" class="" />
                             <span class="">Xem bản đồ</span>
                           </div>
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                            <img src="https://didongthongminh.vn/modules/products/assets/images/icon_save.svg" alt="" class="" />
                            <span class="app-detail-top__content-right-address-item-detail-map-text">Đặt giữ hàng</span>
                           </div>
                        </div>
                      </div>


                    </div>
                    <div class="app-detail-top__content-right-address-item">
                      <div class="app-detail-top__content-right-address-item-title">
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_store.svg" alt="" class="" />
                           <span class="">119 Thái Thịnh Đống Đa Hà Nội</span>
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_link.svg" alt="" class=""/>
                      </div>


                      <div class="app-detail-top__content-right-address-item-detail">
                        <div class="app-detail-top__content-right-address-item-detail-phone">
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/icon_phone.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-text">096611995</span>
                            </div>
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/hethang.svg" alt="" class="" />
                               <span class="">Chưa về hàng</span>
                            </div>
                        </div>
                        <div class="app-detail-top__content-right-address-item-detail-map">
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                             <img src="https://didongthongminh.vn/modules/products/assets/images/icon_map.svg" alt="" class="" />
                             <span class="">Xem bản đồ</span>
                           </div>
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                            <img src="https://didongthongminh.vn/modules/products/assets/images/notification.svg" alt="" class="" />
                            <span class="app-detail-top__content-right-address-item-detail-map-text">Nhận thông báo</span>
                           </div>
                        </div>
                      </div>


                    </div>
                    <div class="app-detail-top__content-right-address-item">
                      <div class="app-detail-top__content-right-address-item-title">
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_store.svg" alt="" class="" />
                           <span class="">119 Thái Thịnh Đống Đa Hà Nội</span>
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_link.svg" alt="" class=""/>
                      </div>


                      <div class="app-detail-top__content-right-address-item-detail">
                        <div class="app-detail-top__content-right-address-item-detail-phone">
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/icon_phone.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-text">096611995</span>
                            </div>
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/hethang.svg" alt="" class="" />
                               <span class="">Chưa về hàng</span>
                            </div>
                        </div>
                        <div class="app-detail-top__content-right-address-item-detail-map">
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                             <img src="https://didongthongminh.vn/modules/products/assets/images/icon_map.svg" alt="" class="" />
                             <span class="">Xem bản đồ</span>
                           </div>
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                            <img src="https://didongthongminh.vn/modules/products/assets/images/notification.svg" alt="" class="" />
                            <span class="app-detail-top__content-right-address-item-detail-map-text">Nhận thông báo</span>
                           </div>
                        </div>
                      </div>


                    </div>
                    <div class="app-detail-top__content-right-address-item">
                      <div class="app-detail-top__content-right-address-item-title">
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_store.svg" alt="" class="" />
                           <span class="">119 Thái Thịnh Đống Đa Hà Nội</span>
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_link.svg" alt="" class=""/>
                      </div>


                      <div class="app-detail-top__content-right-address-item-detail">
                        <div class="app-detail-top__content-right-address-item-detail-phone">
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/icon_phone.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-text">096611995</span>
                            </div>
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/hethang.svg" alt="" class="" />
                               <span class="">Chưa về hàng</span>
                            </div>
                        </div>
                        <div class="app-detail-top__content-right-address-item-detail-map">
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                             <img src="https://didongthongminh.vn/modules/products/assets/images/icon_map.svg" alt="" class="" />
                             <span class="">Xem bản đồ</span>
                           </div>
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                            <img src="https://didongthongminh.vn/modules/products/assets/images/notification.svg" alt="" class="" />
                            <span class="app-detail-top__content-right-address-item-detail-map-text">Nhận thông báo</span>
                           </div>
                        </div>
                      </div>


                    </div>
                    <div class="app-detail-top__content-right-address-item">
                      <div class="app-detail-top__content-right-address-item-title">
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_store.svg" alt="" class="" />
                           <span class="">119 Thái Thịnh Đống Đa Hà Nội</span>
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_link.svg" alt="" class=""/>
                      </div>


                      <div class="app-detail-top__content-right-address-item-detail">
                        <div class="app-detail-top__content-right-address-item-detail-phone">
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/icon_phone.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-text">096611995</span>
                            </div>
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/hethang.svg" alt="" class="" />
                               <span class="">Chưa về hàng</span>
                            </div>
                        </div>
                        <div class="app-detail-top__content-right-address-item-detail-map">
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                             <img src="https://didongthongminh.vn/modules/products/assets/images/icon_map.svg" alt="" class="" />
                             <span class="">Xem bản đồ</span>
                           </div>
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                            <img src="https://didongthongminh.vn/modules/products/assets/images/notification.svg" alt="" class="" />
                            <span class="app-detail-top__content-right-address-item-detail-map-text">Nhận thông báo</span>
                           </div>
                        </div>
                      </div>


                    </div>
                    <div class="app-detail-top__content-right-address-tab">
                       Khu vực khác
                    </div>
                    <div class="app-detail-top__content-right-address-item">
                      <div class="app-detail-top__content-right-address-item-title">
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_store.svg" alt="" class="" />
                           <span class="">119 Thái Thịnh Đống Đa Hà Nội</span>
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_link.svg" alt="" class=""/>
                      </div>


                      <div class="app-detail-top__content-right-address-item-detail">
                        <div class="app-detail-top__content-right-address-item-detail-phone">
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/icon_phone.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-text">096611995</span>
                            </div>
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/hethang.svg" alt="" class="" />
                               <span class="">Chưa về hàng</span>
                            </div>
                        </div>
                        <div class="app-detail-top__content-right-address-item-detail-map">
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                             <img src="https://didongthongminh.vn/modules/products/assets/images/icon_map.svg" alt="" class="" />
                             <span class="">Xem bản đồ</span>
                           </div>
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                            <img src="https://didongthongminh.vn/modules/products/assets/images/notification.svg" alt="" class="" />
                            <span class="app-detail-top__content-right-address-item-detail-map-text">Nhận thông báo</span>
                           </div>
                        </div>
                      </div>


                    </div>
                    <div class="app-detail-top__content-right-address-item">
                      <div class="app-detail-top__content-right-address-item-title">
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_store.svg" alt="" class="" />
                           <span class="">119 Thái Thịnh Đống Đa Hà Nội</span>
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_link.svg" alt="" class=""/>
                      </div>


                      <div class="app-detail-top__content-right-address-item-detail">
                        <div class="app-detail-top__content-right-address-item-detail-phone">
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/icon_phone.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-text">096611995</span>
                            </div>
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/hethang.svg" alt="" class="" />
                               <span class="">Chưa về hàng</span>
                            </div>
                        </div>
                        <div class="app-detail-top__content-right-address-item-detail-map">
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                             <img src="https://didongthongminh.vn/modules/products/assets/images/icon_map.svg" alt="" class="" />
                             <span class="">Xem bản đồ</span>
                           </div>
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                            <img src="https://didongthongminh.vn/modules/products/assets/images/notification.svg" alt="" class="" />
                            <span class="app-detail-top__content-right-address-item-detail-map-text">Nhận thông báo</span>
                           </div>
                        </div>
                      </div>


                    </div>
                    <div class="app-detail-top__content-right-address-item">
                      <div class="app-detail-top__content-right-address-item-title">
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_store.svg" alt="" class="" />
                           <span class="">119 Thái Thịnh Đống Đa Hà Nội</span>
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_link.svg" alt="" class=""/>
                      </div>


                      <div class="app-detail-top__content-right-address-item-detail">
                        <div class="app-detail-top__content-right-address-item-detail-phone">
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/icon_phone.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-text">096611995</span>
                            </div>
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/hethang.svg" alt="" class="" />
                               <span class="">Chưa về hàng</span>
                            </div>
                        </div>
                        <div class="app-detail-top__content-right-address-item-detail-map">
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                             <img src="https://didongthongminh.vn/modules/products/assets/images/icon_map.svg" alt="" class="" />
                             <span class="">Xem bản đồ</span>
                           </div>
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                            <img src="https://didongthongminh.vn/modules/products/assets/images/notification.svg" alt="" class="" />
                            <span class="app-detail-top__content-right-address-item-detail-map-text">Nhận thông báo</span>
                           </div>
                        </div>
                      </div>


                    </div>
                    <div class="app-detail-top__content-right-address-item">
                      <div class="app-detail-top__content-right-address-item-title">
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_store.svg" alt="" class="" />
                           <span class="">119 Thái Thịnh Đống Đa Hà Nội</span>
                           <img src="https://didongthongminh.vn/modules/products/assets/images/icon_link.svg" alt="" class=""/>
                      </div>


                      <div class="app-detail-top__content-right-address-item-detail">
                        <div class="app-detail-top__content-right-address-item-detail-phone">
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/icon_phone.svg" alt="" class="" />
                               <span class="app-detail-top__content-right-address-item-detail-phone-text">096611995</span>
                            </div>
                            <div class="app-detail-top__content-right-address-item-detail-phone-item">
                               <img src="https://didongthongminh.vn/modules/products/assets/images/hethang.svg" alt="" class="" />
                               <span class="">Chưa về hàng</span>
                            </div>
                        </div>
                        <div class="app-detail-top__content-right-address-item-detail-map">
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                             <img src="https://didongthongminh.vn/modules/products/assets/images/icon_map.svg" alt="" class="" />
                             <span class="">Xem bản đồ</span>
                           </div>
                           <div class="app-detail-top__content-right-address-item-detail-map-item">
                            <img src="https://didongthongminh.vn/modules/products/assets/images/notification.svg" alt="" class="" />
                            <span class="app-detail-top__content-right-address-item-detail-map-text">Nhận thông báo</span>
                           </div>
                        </div>
                      </div>


                    </div>
                   </div>
                 </div>

                 <div class="app-detail-top__content-right-center">
                    <ul class="">
                      <li class="">- Máy mới nguyên seal, fullbox, kích hoạt online 23/9/2022</li>
                      <li class="">- Bảo hành tại Apple đến 22/9/2023</li>
                      <li class="">- Quá hạn bảo hành Apple được bảo hành tao Di động thông minh đủ 12 tháng, kể từ ngày mua máy.</li>
                    </ul>
                 </div>
                 

                 <div class="app-detail-top__content-right-product">
                    <div class="app-detail-top__content-right-product-item">
                      <div class="app-detail-top__content-right-product-item-img">
                          <img src="https://didongthongminh.vn/images/products/2022/11/24/resized/1_1649230516.webp" alt="" class="" />
                      </div>
                      <div class="app-detail-top__content-right-product-item-detail">
                         <span class=""> iPhone 13 Pro Cũ Đẹp 128GB</span>
                          <span class="">Giá: <b class="">20.890.000đ</b></span>
                      </div>
                    </div>
                    <div class="app-detail-top__content-right-product-item">
                      <div class="app-detail-top__content-right-product-item-img">
                          <img src="https://didongthongminh.vn/images/products/2022/12/15/resized/iPhone-13-Pro-Max_(2)(3).webp" alt="" class="" />
                      </div>
                      <div class="app-detail-top__content-right-product-item-detail">
                         <span class=""> iPhone 13 Pro Max Cũ Đẹp 128GB</span>
                          <span class="">Giá: <b class="">20.890.000đ</b></span>
                      </div>
                    </div>
                 </div>


              </div>
            </div>
          </div>
        </div>
      </section>

    



      <section class="app-detail-bottom container-fluid">
        <div class="container">
          <div class="app-detail-bottom__content">
            <div class="app-detail-bottom__item ">
              <div class="app-detail-promotion__tab">
          
                <img data="https://didongthongminh.vn/modules/products/assets/images/danhgia.svg" alt="icon" class="img-responsive icon_cat lazy-loaded" width="42" height="36" src="https://didongthongminh.vn/modules/products/assets/images/icon_pk.svg">
                <span>Bài viết đánh giá</span>
            
            </div>

             <div class="app-detail-bottom__item-content">
                  <?=$item['content']?>
             </div>

             <div class="app-detail-bottom__item-content-btn"><button class="show-more-detail">Xem thêm </button></div>
            
            </div>
            <div class="app-detail-bottom__item ">
              <div class="app-detail-promotion__tab">
          
                <img  alt="icon" class="img-responsive icon_cat lazy-loaded" width="42" height="36" src="https://didongthongminh.vn/modules/products/assets/images/thongso.svg">
                <span>Thông số kỹ thuật</span>
            
            </div>
               <div class="app-detail-bottom__item-product-right">
                <table>
                  <?php foreach($attributeProduct as $key => $value){?>
                    <tr>
                    <td><?=$value['description']?></td>
                    <td><?=$value['value']?></td>
                  
                  </tr>
                  <?php }?>
                  
                 
                </table>
                 
                <div class="app-detail-bottom__item-product-right-btn">
                  <button class="">Xem cấu hình chi tiết</button>
                </div>
                
                


                <div class=" app-detail-bottom__item-product-right-new">
                  <div class="app-detail-promotion__tab">
          
                    <img  alt="icon" class="img-responsive icon_cat lazy-loaded" width="42" height="36" src="https://didongthongminh.vn/modules/products/assets/images/new.svg">
                    <span>tin tức</span>
                
                </div>

                  <div class="">
                    <div class="app-new-suggest__center">
                      
                      <?php foreach($postSuggest as $key => $value){?>
                        <div class="app-new-suggest__center-item">
                        <div class="app-new-suggest__center-item-img">
                          <img src="<?=IMAGE_DIR_POST.$value['thumb']?>" alt="">
                        </div>
                        <div class="app-new-suggest__center-item-detail">
                          <div class="app-new-suggest__center-item-detail-title">
                            <a href="/new/<?=$value['slug']?>"><span><?=$value['title']?>
                              </span></a>
                          </div>
      
                          <div class="app-new-suggest__center-item-detail-time">
                            <span><i class="fa fa-calendar" aria-hidden="true"></i>
                            <?=$value['createdAt']?></span>
                            <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
                          </div>
                        </div>
                      </div>
                      <?php }?>
                    </div>
                  </div>
                </div>
              

               </div>
            </div>
            <div class="app-detail-bottom__item ">
              <div class="app-detail-bottom__item-review-title">
                <b class="">Đánh giá iPad Gen 10 256GB 5G Chính hãng</b>
              </div>

              <div class="app-detail-bottom__item-review-content">
                <div class="app-detail-bottom__item-review-content-item ">
                   <div class="app-detail-bottom__item-review-content-item-total">
                         <div class="app-detail-bottom__item-review-content-item-total-top">
                          <span class="">4.7</span>
                          <span class="">/5</span>
                         </div>
                         <div class="app-detail-bottom__item-review-content-item-total-center">
                          <ul class="">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          </ul>
                         </div>
                         <div class="app-detail-bottom__item-review-content-item-total-bottom">
                          <span class="">(26 đánh giá )</span>

                         </div>
                   </div>
                </div>
                <div class="app-detail-bottom__item-review-content-item ">
                   <div class="app-detail-bottom__item-review-content-item-vote">

                    <div class="app-detail-bottom__item-review-content-item-vote-flex">
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                           <ul class="">
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                           </ul>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                            <div style="width : 20%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                         </div>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <span class="">85%</span>
                      </div>
                    </div>

                    <div class="app-detail-bottom__item-review-content-item-vote-flex">
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                           <ul class="">
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                           </ul>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                            <div style="width : 50%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                         </div>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <span class="">50%</span>
                      </div>
                    </div>
                    <div class="app-detail-bottom__item-review-content-item-vote-flex">
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                           <ul class="">
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                           </ul>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                            <div style="width : 74%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                         </div>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <span class="">74%</span>
                      </div>
                    </div>
                    <div class="app-detail-bottom__item-review-content-item-vote-flex">
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                           <ul class="">
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                           </ul>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                            <div style="width : 12%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                         </div>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <span class="">12%</span>
                      </div>
                    </div>
                    <div class="app-detail-bottom__item-review-content-item-vote-flex">
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                           <ul class="">
                             <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                             <li><i class="fa fa-star " aria-hidden="true"></i></li>
                           </ul>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                            <div style="width : 32%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                         </div>
                      </div>
                      <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                         <span class="">32%</span>
                      </div>
                    </div>


                   </div>
                </div>
                <div class="app-detail-bottom__item-review-content-item">
                    <button class="">viết đánh giá</button>
                </div>
              </div>




              <div class="app-detail-bottom__item-comment-content ">

                 <div class="">
                  <div class="app-detail-bottom__item-comment-content-item">
                    <div class="app-detail-bottom__item-comment-content-item-top">
                      <div class="app-detail-bottom__item-comment-content-item-top-left">
                          <span class="">Thế tài</span>
                          <ul class="">
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          </ul>
                      </div>
                      <div class="app-detail-bottom__item-comment-content-item-top-right">
                        <span class="">23:07:54 04/02/2023</span>
                      </div>
                    </div>
                    <div class="app-detail-bottom__item-comment-content-item-bottom">
                      <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
                    </div>
                </div>
                <div class="app-detail-bottom__item-comment-content-item">
                  <div class="app-detail-bottom__item-comment-content-item-top">
                    <div class="app-detail-bottom__item-comment-content-item-top-left">
                        <span class="">Thế tài</span>
                        <ul class="">
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                    <div class="app-detail-bottom__item-comment-content-item-top-right">
                      <span class="">23:07:54 04/02/2023</span>
                    </div>
                  </div>
                  <div class="app-detail-bottom__item-comment-content-item-bottom">
                    <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
                  </div>

                  <div class="app-detail-bottom__item-comment-content-item-child">
                    


                    <div class="app-detail-bottom__item-comment-content-item">
                      <div class="app-detail-bottom__item-comment-content-item-top">
                        <div class="app-detail-bottom__item-comment-content-item-top-left">
                            <span class="">Thế tài</span>
                            <ul class="">
                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                              <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            </ul>
                        </div>
                        <div class="app-detail-bottom__item-comment-content-item-top-right">
                          <span class="">23:07:54 04/02/2023</span>
                        </div>
                      </div>
                      <div class="app-detail-bottom__item-comment-content-item-bottom">
                        <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
                      </div>
                  </div>

                  
                  </div>
              </div>
              <div class="app-detail-bottom__item-comment-content-item">
                <div class="app-detail-bottom__item-comment-content-item-top">
                  <div class="app-detail-bottom__item-comment-content-item-top-left">
                      <span class="">Thế tài</span>
                      <ul class="">
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      </ul>
                  </div>
                  <div class="app-detail-bottom__item-comment-content-item-top-right">
                    <span class="">23:07:54 04/02/2023</span>
                  </div>
                </div>
                <div class="app-detail-bottom__item-comment-content-item-bottom">
                  <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
                </div>
            </div>
            <div class="app-detail-bottom__item-comment-content-item">
              <div class="app-detail-bottom__item-comment-content-item-top">
                <div class="app-detail-bottom__item-comment-content-item-top-left">
                    <span class="">Thế tài</span>
                    <ul class="">
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    </ul>
                </div>
                <div class="app-detail-bottom__item-comment-content-item-top-right">
                  <span class="">23:07:54 04/02/2023</span>
                </div>
              </div>
              <div class="app-detail-bottom__item-comment-content-item-bottom">
                <p class="">shop cho tôi hỏi giá iphone 14 pro max 128gb là 28tr990 bản màu gold là đã áp dụng giảm giá 500k khi thanh toán qua kredivo chưa. nếu chưa thì áp giảm giá còn 28tr490 đúng không .</p>
              </div>
          </div>
                 </div>
                

                 <div class="app-detail-bottom__item-comment-content-btn">
                   <button class="">Xem thêm</button>
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
                <img src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg" alt="">
              </div>
              <div class="app-phone-suggest__title-left-text">
                Top Tab đáng mua nhất
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
            <div class="app-top-sale__day-carousel app-information__content-four owl-carousel owl-theme owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="width: 3577px; transform: translate3d(-1192px, 0px, 0px); transition: all 0s ease 0s;"><div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/12/resized/AIR_2.jpeg" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              </div><div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/06/resized/iPad-Gen-10-Xanh(3).webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              </div><div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/29/resized/Tab-A7-Lite.webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              </div><div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/29/resized/Tab-A8-2022.webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              </div><div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/12/resized/iPad-Air-5-Tim(1).webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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

              <div class="app-top-sale__day-carousel-item owl-item active" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/12/resized/AIR_2.jpeg" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              <div class="app-top-sale__day-carousel-item owl-item active" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/06/resized/iPad-Gen-10-Xanh(3).webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              <div class="app-top-sale__day-carousel-item owl-item active" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/29/resized/Tab-A7-Lite.webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              <div class="app-top-sale__day-carousel-item owl-item active" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/29/resized/Tab-A8-2022.webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              <div class="app-top-sale__day-carousel-item owl-item active" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/12/resized/iPad-Air-5-Tim(1).webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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

            <div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/12/resized/AIR_2.jpeg" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              </div><div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/06/resized/iPad-Gen-10-Xanh(3).webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              </div><div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/29/resized/Tab-A7-Lite.webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              </div><div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/29/resized/Tab-A8-2022.webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              </div><div class="app-top-sale__day-carousel-item owl-item cloned" style="width: 227.4px; margin-right: 11px;">
                <div class="app-top-sale__day-carousel-item-img-top-sale">
                  -40%
                </div>
                <div class="app-top-sale__day-carousel-item-img">
                  <img src="https://didongthongminh.vn/images/products/2022/12/12/resized/iPad-Air-5-Tim(1).webp" alt="">
                </div>

                <div class="app-top-sale__day-carousel-item-detail">
                  <div class="app-top-sale__day-carousel-item-detail-title">
                    <a href="">Iphone 14 Pro Max 128Gb chính hãng VN/A</a>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-price">
                    <b>32.990.000đ</b> <span>34.390.000đ</span>
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
              </div></div>
        </div>

            <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div><div class="owl-dots disabled"></div></div>
          </div>
        </div>
      </section>

      <section class="app-name-product__suggest container-fluid">
        <div class="container">
          <div class="row">
            <div class="col-md-2 col-sm-6 col-6">
              <div class="app-name-product__suggest-item">
                <ul>
                  <li class=""><a href="" class=""> Poco x4 Pro</a></li>
                  <li class=""><a href="" class=""> Iphone cũ giá rẻ</a></li>
                  <li class=""><a href="" class=""> Iphone 11 cũ</a></li>
                  <li class="">
                    <a href="" class=""> Iphone 12 Pro Max Cũ 256GB</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-2 col-sm-6 col-6">
              <div class="app-name-product__suggest-item">
                <ul>
                  <li class=""><a href="" class=""> Poco x4 Pro</a></li>
                  <li class=""><a href="" class=""> Iphone cũ giá rẻ</a></li>
                  <li class=""><a href="" class=""> Iphone 11 cũ</a></li>
                  <li class="">
                    <a href="" class=""> Iphone 12 Pro Max Cũ 256GB</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-2 col-sm-6 col-6">
              <div class="app-name-product__suggest-item">
                <ul>
                  <li class=""><a href="" class=""> Poco x4 Pro</a></li>
                  <li class=""><a href="" class=""> Iphone cũ giá rẻ</a></li>
                  <li class=""><a href="" class=""> Iphone 11 cũ</a></li>
                  <li class="">
                    <a href="" class=""> Iphone 12 Pro Max Cũ 256GB</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-smd-6 col-sm-6 col-6">
              <div class="app-name-product__suggest-item">
                <ul>
                  <li class=""><a href="" class=""> Poco x4 Pro</a></li>
                  <li class=""><a href="" class=""> Iphone cũ giá rẻ</a></li>
                  <li class=""><a href="" class=""> Iphone 11 cũ</a></li>
                  <li class="">
                    <a href="" class=""> Iphone 12 Pro Max Cũ 256GB</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="app-fixed-mobile">
        <div class="app-fixed-mobile__detail">
           <div class="app-fixed-mobile__detail-left">
                 <ul class="">
                   <li class="">
                      <img src="https://didongthongminh.vn/images/menus/dien_thoai.webp" alt="" class="">
                      <span class="">Điện thoại</span>
                   </li>

                   <li class="">
                    <img src="https://didongthongminh.vn/images/menus/untitled-3-1.webp" alt="" class="">
                    <span class="">iPad</span>
                 </li>

                 <li class="">
                  <img src="https://didongthongminh.vn/images/menus/untitled-2-1.webp" alt="" class="">
                  <span class="">Laptop</span>
               </li>
               <li class="">
                <img src="https://didongthongminh.vn/images/menus/4-658125.webp" alt="" class="">
                <span class="">Âm thanh</span>
             </li>
             <li class="">
              <img src="https://didongthongminh.vn/images/menus/adapter-sac-macbook-pro-15-inch-17-inch-magsafe-85-mc556-thumb-650x650-1.webp" alt="" class="">
              <span class="">Phụ kiện</span>
           </li>
           <li class="">
            <img src="https://didongthongminh.vn/images/menus/3-844473.webp" alt="" class="">
            <span class="">Hàng cũ</span>
         </li>
         <li class="">
          <img src="https://didongthongminh.vn/images/menus/ipad-cu-gia_re.webp" alt="" class="">
          <span class="">iPad cũ</span>
       </li>
       <li class="">
        <img src="https://didongthongminh.vn/images/menus/dh-1.webp" alt="" class="">
        <span class="">Smartwatch</span>
     </li>
     <li class="">
      <img src="https://didongthongminh.vn/images/menus/9-1.webp" alt="" class="">
      <span class="">Thu cũ</span>
   </li>
   <li class="">
    <img src="https://didongthongminh.vn/images/menus/a1-1.webp" alt="" class="">
    <span class="">Tin công nhệ</span>
 </li>
                 </ul>
           </div>
           <div class="app-fixed-mobile__detail-right ">
               <div class="app-fixed-mobile__detail-right-title">
                  <img src="https://didongthongminh.vn/images/menus/icon-dien-thoai.svg" alt="" class="">
                  <span class="">Điện thoại</span>
               </div>

               <div class="app-fixed-mobile__detail-right-content">
                <div class="app-fixed-mobile__detail-right-content-item">
                    <div class="app-fixed-mobile__detail-right-content-item-title"><span class="">
                      Chọn theo hãng
                    </span></div>

                    <div class="">
                        <ul class="">
                          <li class="">iPhone</li>
                          <li class="">Redmi</li>
                          <li class="">Samsung</li>
                          <li class="">Xiaomi</li>
                          <li class="">Tecno</li>
                          <li class="">Realme</li>
                          <li class="">Poco</li>
                          <li class="">Oppo</li>
                          <li class="">Hãng khác</li>

                        </ul>
                    </div>
                </div>

                <div class="app-fixed-mobile__detail-right-content-item">
                  <div class="app-fixed-mobile__detail-right-content-item-title"><span class="">
                    Chọn theo mức giá
                  </span></div>

                  <div class="">
                      <ul class="">
                        <li class="">Dưới 2 triệu</li>
                        <li class="">Từ 2-3 triệu</li>
                        <li class="">Từ 4-7 triệu</li>
                        <li class="">Từ 7-13 triệu</li>
                        <li class="">Từ 13-20 triệu</li>
                        <li class="">Trên 20 triều</li>
                       

                      </ul>
                  </div>
              </div>

              <div class="app-fixed-mobile__detail-right-content-item">
                <div class="app-fixed-mobile__detail-right-content-item-title"><span class="">
                  Điện Thoại Xả Hàng
                </span></div>

                <div class="">
                    <ul class="">
                      <li class="">iPad Mini 6 Rẻ Không Tưởng</li>
                      <li class="">iPhone 14 Giá Sập Sàn</li>
                      <li class="">iPhone 11 Pro Mã Cũ Siêu Rẻ</li>        

                    </ul>
                </div>
            </div>


            <div class="app-fixed-mobile__detail-right-content-item">
              <div class="app-fixed-mobile__detail-right-content-item-title"><span class="">
                Mục đích dùng
              </span></div>

              <div class="">
                  <ul class="">
                    <li class="">Chơi game / Cấu hình cao</li>
                    <li class="">Pin khủng trên 5000 mAh</li>
                    <li class="">Sạc pin nhanh</li>   
                    <li class="">Chụp ảnh đẹp</li> 
                    <li class="">Làm máy hotline</li> 
                    <li class="">Phù hợp học sinh</li>      

                  </ul>
              </div>
          </div>

          <div class="app-fixed-mobile__detail-right-content-item">
            <div class="app-fixed-mobile__detail-right-content-item-title"><span class="">
              Tình trạng
            </span></div>

            <div class="">
                <ul class="">
                  <li class="">Hàng mới</li>
                  <li class="">Cũ đẹp như mới</li>
                  <li class="">Mơí Kích Hot Sale</li>   
                  <li class="">Xước nhỏ</li> 
                  <li class="">Hàng trưng bày</li> 
                  <li class="">Đổi bảo hành</li>      
                  <li class="">Refurbished</li> 
                  <li class="">Tin đồn</li> 
                </ul>
            </div>
        </div>

               </div>
           </div>
        </div>


         <div class="app-fixed-mobile__tab-bottom">
             <ul class="">
               <a href="" class="">
                <li class="">
                   <img src="https://didongthongminh.vn/modules/products/assets/images/home.svg" alt="" class="">
                   <span class="">Trang chủ</span>
               </li>
              </a>

              <a href="javascript:;" class="show-tab-category">
                <li class="">
                   <img src="https://didongthongminh.vn/modules/products/assets/images/danhmuc.svg" alt="" class="">
                   <span class="">Danh mục</span>
               </li>
              </a>

              <a href="" class="">
                <li class="">
                   <img src="https://didongthongminh.vn/modules/products/assets/images/didongthongminh.svg" alt="" class="">
                   <span class="">Liên hệ</span>
               </li>
              </a>

              <a href="" class="">
                <li class="">
                   <img src="https://didongthongminh.vn/modules/products/assets/images/shop.svg" alt="" class="">
                   <span class="">Cửa hàng</span>
               </li>
              </a>


              <a href="" class="">
                <li class="">
                   <img src="https://didongthongminh.vn/modules/products/assets/images/news_icon.svg" alt="" class="">
                   <span class="">Tin tức</span>
               </li>
              </a>

             

             </ul>
         </div>
         
      </section>
      <script src="<?= SITE_URL_POST ?>/javascript/detail.js"> </>
<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>