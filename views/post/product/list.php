<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>

<section class="app-bread-crumb container-fluid">
        <div class="container">
          <ul class="">
            <li class=""><a href="" class="">Trang chủ</a> /</li>
            <li class=""><a href="" class="">Điện thoại</a></li>
          </ul>
        </div>
      </section>
      <section class="app-carousel-category container-fluid">
        <div class="container">
          <div class="app-carousel-category__content">
            <div class="app-carousel-category__content-item">
              <div class="">
                <img
                  src="https://didongthongminh.vn/images/banners/resized/xiaomi-chinh-hang_1670476494.webp"
                  alt=""
                  class=""
                />
              </div>
              <div class="">
                <img
                  src="https://didongthongminh.vn/images/banners/resized/samsung_1670476132.webp"
                  alt=""
                  class=""
                />
              </div>
            </div>
          </div>
        </div>
      </section>


      <section class="app-category-filter__brand container-fluid">
        <div class="container">
          <div class="container-filter__brand">
            <div class="container-filter__brand-content">
              
              <div class="container-filter__brand-content-list">
                <ul id="show-list-delete-filter">
                 
                  
                  
                
                 
                 
                </ul>
              </div>
            
            </div>
          </div>
        </div>
      </section>



      <section class="app-category-filter__brand container-fluid">
        <div class="container">
          <div class="container-filter__brand">
            <div class="container-filter__brand-content">
              
              <div class="container-filter__brand-content-list">
                <ul>
                  
                 <?php if(!isset($_GET['key'])){ foreach($listBrand as $key => $value){?>
                  <a href="javascript:;" >
                    <li> <div data-filter="b<?=$value['id']?>" type-filter="brand" class="container-filter__attribute-content-list-absolute-item container-filter__brand-content-list-btn" >
                       <?=$value['name']?>
                    </div></li>
                  </a>
                 <?php }}?>
                 
                 
                </ul>
              </div>
            
            </div>
          </div>
        </div>
      </section>
    <style >
      .select-delete-filter {
        cursor: pointer;
        border : 1px solid red;
        border-radius: 3px;
        gap : 8px;
        display : flex !important;
        padding : 6px 10px;
      }
      .container-filter__attribute-content-list-relative {
        position: relative;
      }
      .container-filter__attribute-content-list-absolute {
        display : none;
        top : 120%;
        left : 0px;
        position: absolute;
        
        gap : 10px;
        background: white;
        padding : 10px;
        box-shadow: 0px 0px 5px black;
        border-radius: 3px;
      }
      .container-filter__attribute-content-list {
        height : 110px;
        
      }
      .container-filter__attribute-content-item-list {
         padding : 6px 10px;
         border : 1px solid #eeeeee;
         border-radius: 3px;
      }
      .show-result-filter{
        padding : 6px 10px;
         border : 1px solid #eeeeee;
         border-radius: 3px;
         background: #ff6700;
         color : white;
      }
      .close-filter {
        padding : 6px 10px;
         border : 1px solid red;
         border-radius: 3px;
         background: white;
         color : red;
      }
      .point-filter {
        position: absolute;
        top : -6px;
        background: white;
        width : 12px;
        height : 12px;
        left : 40px;
        border-top: 1px solid #eeeeee;
        border-left: 1px solid #eeeeee;
        transform: rotate(45deg);
      }
      .active-filter {
        border : 1px solid #ff6700;
        
      }
      .app-category-sort__content-item-sort {
        position: relative;
      }
      .app-category-sort__content-item-sort-list{
        position: absolute;
        left :0px;
        top : 100%;
        background: white;
        border : 1px solid #eeeeee;
        box-shadow: 0px 0px 5px black;
        z-index: 999;
      
        flex-direction: column;
        display : none;
        width : 140px;
      }
      .app-category-sort__content-item-sort-list span {
        padding : 5px 5px;
      }
      .app-category-sort__content-item-sort-list span:first-child {
        border-bottom: 1px solid #eeeeee;
      }
      .app-category-sort__content-item-sort-list span:hover {
        background: #ff6700;
        color : white;
      }
      .app-top-sale__day-carousel-item-detail-attribute {
        margin : 5px 0px;
      }
      .app-top-sale__day-carousel-item-detail-attribute li{
         position: relative;
         left : 18px;
         line-height: 20px;
         font-size: 15px;
       
     }
    </style>


      <section class="app-category-filter__attribute container-fluid">
        <div class="container">
            <div class="container-filter__attribute">
                <div class="container-filter__attribute-content">
              
                    <div class="container-filter__attribute-content-list">
                      <ul>
                        <a href="">
                          <li>
                          <div class="container-filter__attribute-content-list-btn">
                            <div class=""><i class="fa fa-filter" aria-hidden="true"></i> Bộ lọc</div>
                          </div>
                          
                      </li>
                        </a>

                        <!-- <a href="javascript:;">
                            <li class="container-filter__attribute-content-list-relative">
                            <div class="container-filter__attribute-content-list-btn click-filter-get">
                              <span class="">RAM</span>
                              <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </div>
                            <div class="container-filter__attribute-content-list-absolute">
                                 <div class="point-filter"></div>
                                 <div data-filter="1" type-filter="ram" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">2GB</div>
                                 <div data-filter="2" type-filter="ram" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">4GB</div>
                                 <div data-filter="3" type-filter="ram" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">6GB</div>
                            </div>
                            
                           </li>
                          </a>
                         
                          <a href="javascript:;">
                            <li class="container-filter__attribute-content-list-relative">
                            <div class="container-filter__attribute-content-list-btn click-filter-get">
                              <span class="">Bộ nhớ trong</span>
                              <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </div>
                            <div class="container-filter__attribute-content-list-absolute">
                                 <div class="point-filter"></div>
                                 <div data-filter="4" type-filter="rom" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">32GB</div>
                                 <div data-filter="5" type-filter="rom" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">64GB</div>
                                 <div data-filter="6" type-filter="rom" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">128GB</div>
                            </div>
                            
                           </li>
                          </a> -->
                          <a href="javascript:;">
                            <li class="container-filter__attribute-content-list-relative">
                            <div class="container-filter__attribute-content-list-btn click-filter-get">
                              <span class="">Danh mục</span>
                              <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </div>
                            <div class="container-filter__attribute-content-list-absolute">
                                 <div class="point-filter"></div>
                                 <?php foreach($categoryFilter as $key => $value){?>
                                  <div data-filter="c<?=$value['id']?>" type-filter="ca" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list"><?=$value['name']?></div>
                                 <?php }?>
                                 
                    
                            </div>
                            
                           </li>
                          </a>
                          <?php foreach($listFilter as $key => $value){?>
                              <a href="javascript:;">
                              <li class="container-filter__attribute-content-list-relative">
                              <div class="container-filter__attribute-content-list-btn click-filter-get">
                                <span class=""><?=$value['description']?></span>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                              </div>
                              <div class="container-filter__attribute-content-list-absolute">
                                  <div class="point-filter"></div>
                                  <?php foreach($this->attribute->getValueByType($value['id']) as $key1 => $value1){?>
                                    <div data-filter="<?=$value1['id']?>" type-filter="<?=$value['url_query']?>" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list"><?=$value1['value']?></div>
                                  <?php }?>
                              </div>
                              
                            </li>
                            </a>
                          <?php }?>


                          <?php if(!isset($_GET['key'])) {?>
                          <a href="javascript:;">
                            <li class="container-filter__attribute-content-list-relative">
                            <div class="container-filter__attribute-content-list-btn click-filter-get">
                              <span class="">Giá</span>
                              <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </div>
                            <div class="container-filter__attribute-content-list-absolute">
                                 <div class="point-filter"></div>
                                 <div data-filter="p1" type-filter="price" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">Dưới 2 triệu</div>
                                 <div data-filter="p2" type-filter="price" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">Từ 2 - 4 triệu</div>
                                 <div data-filter="p3" type-filter="price" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">Từ 4 - 7 triệu</div>
                                 <div data-filter="p4" type-filter="price" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">Từ 7 - 13 triệu</div>
                                 <div data-filter="p5" type-filter="price" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">Từ 13 - 20 triệu</div>
                                 <div data-filter="p6" type-filter="price" class="container-filter__attribute-content-list-absolute-item container-filter__attribute-content-item-list">Trên 20 triệu</div>
                            </div>
                            
                           </li>
                          </a>
                          <?php }?>

                         
                         
                         

                          



                          
                      </ul>
                    </div>
                  
                  </div>
            </div>
        </div>
      </section>
      
     <section class="app-category-sort container-fluid">
        <div class="container">
            <div class="app-category-sort__content">
                <div class="app-category-sort__content-item "><span class="">403</span> <b class="">sản phẩm</b>
                </div>



                <div class="app-category-sort__content-item ">
                    <div class="app-category-sort__content-item-icon"><i class="fa fa-bolt" aria-hidden="true"></i><span class="">Flashsale</span></div>
                    <div class="app-category-sort__content-item-icon"><i class="fa fa-star-o" aria-hidden="true"></i> <span class="">Hàng mới</span></div>
                    <div class="app-category-sort__content-item-icon">
                        <i class="fa fa-bullseye" aria-hidden="true"></i> <span class="">Hàng cũ</span>
                    </div>
                </div>




                <div class="app-category-sort__content-item app-category-sort__content-item-sort">
                <?php if(!isset($_GET['key'])) {?>
                  <span class="app-category-sort__content-item-click">Sắp xếp </span><i class="fa fa-angle-down" aria-hidden="true"></i>
                  <div class="app-category-sort__content-item-sort-list">
                     <span class="orderby" data-sort="asc" >Tăng dần theo giá</span>
                     <span class="orderby" data-sort="desc" >Giảm dần theo giá</span>
                  </div>
                  <?php }?>
              </div>

            </div>
        </div>
     </section>


     <section class="app-phone-suggest container-fluid">
        <div class="container" id="show-products">
         

          
        
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
      <script>

var  filterArray = [];
var urlFilter = "";




 var filterCategory = [];
var filterPrice = [];
var filterRam = [];
var filterRom = [];
var arrayFilter = [];
var sort = "";
var page = "";
var stringUrl = "";

function getUrlVars() {

    var parts = window.location.href.replace(
        /[?&]+([^=&]+)=([^&]*)/gi,
        function (m) {
            stringUrl = stringUrl + String(m);
        }
    );
    return stringUrl;
}


if (getUrlVars() != "") {
    urlFilter = getUrlVars();
}
//?ca=1,2,3&p=1,2,39&r=7
function nullArr(array) {
    if (array.length == 0) {
        return true;
    } else {
        return false;
    }
}
function handleFilter() {
  
  

  filterArray = filterArray.filter(obj => {
    return !Object.values(obj).every(val => Array.isArray(val) && val.length === 0);
  });



//console.log(filterArray);

  let result = filterArray.reduce((acc, curr) => {
    let key = Object.keys(curr)[0];
    let value = curr[key].join(',');
    return acc + `&${key}=${value}`; 
}, '');


  if(sort != ""){
    result = result + `&sort=${sort}`;
  }
  if(page != ""){
    result = result + `&page=${page}`;
  }
  result = result.replace('&', '?');

  
  
    urlFilter = "";
    urlFilter = result;
    var demoArr = [];
    // if (nullArr(filterCategory) == false) {
    //     if (nullArr(demoArr) == true) {
    //         demoArr.push("?ca=" + String(filterCategory.reverse()));
    //     } else {
    //         demoArr.push("&ca=" + String(filterCategory.reverse()));
    //     }
    // }
    // if (nullArr(filterPrice) == false) {
    //     if (nullArr(demoArr) == true) {
    //         demoArr.push("?pr=" + String(filterPrice.reverse()));
    //     } else {
    //         demoArr.push("&pr=" + String(filterPrice.reverse()));
    //     }
    // }
    // if (nullArr(filterRam) == false) {
    //     if (nullArr(demoArr) == true) {
    //         demoArr.push("?ra=" + String(filterRam.reverse()));
    //     } else {
    //         demoArr.push("&ra=" + String(filterRam.reverse()));
    //     }
    // }
    // if (nullArr(filterRom) == false) {
    //     if (nullArr(demoArr) == true) {
    //         demoArr.push("?ro=" + String(filterRom.reverse()));
    //     } else {
    //         demoArr.push("&ro=" + String(filterRom.reverse()));
    //     }
    // }
    // if (sort != "") {
    //     if (nullArr(demoArr) == true) {
    //         demoArr.push("?sort=" + sort);
    //     } else {
    //         demoArr.push("&sort=" + sort);
    //     }
    // }
    // if (page != "") {
    //     if (nullArr(demoArr) == true) {
    //         demoArr.push("?page=" + page);
    //     } else {
    //         demoArr.push("&page=" + page);
    //     }
    // }

    // for (var i = 0; i < demoArr.length; i++) {
    //     urlFilter = urlFilter + demoArr[i];
    // }
   //  history.pushState({}, null, window.location.pathname);

     //history.pushState({}, null, window.location.href +  urlFilter);
  //  var url = String(urlFilter);
    

 // alert(stringUrl);
 //console.log( ('/api' + window.location.pathname + result));
    $.ajax({
        type: "POST",
        url: ('/api' + window.location.pathname + result),
        
        dataType: "json",
        success: function (result) {
           
            $('.show-result-filter').empty();
            $('.show-result-filter').text(`Xem ${result.length} kết quả`);
        },
    });
}

$(document).on("click", ".show-select", function () { // button delete filter
    page = 0;
    var elementDelete = Number($(this).data("delete"));
    var type = $(this).data("filter");
    if (type == "ca") {
        filterCategory = filterCategory.filter(function (e) {
            return e !== elementDelete;
        });
        $(this).remove();
    }
    if (type == "pr") {
        filterPrice = filterPrice.filter(function (e) {
            return e !== elementDelete;
        });
        $(this).remove();
    }
    if (type == "ro") {
        filterRom = filterRom.filter(function (e) {
            return e !== elementDelete;
        });
        $(this).remove();
    }
    if (type == "ra") {
        filterRam = filterRam.filter(function (e) {
            return e !== elementDelete;
        });
        $(this).remove();
    }
    handleFilter();
});
$(document).on("click", ".filter-category", function () {

    if (filterCategory.includes($(this).data("filter")) == false) {
        filterCategory.push($(this).data("filter"));
        page = 0;
        handleFilter();

        $(".show-delete").append(
            ` <a class="show-select" data-filter="ca" data-delete="${$(
                this
            ).data("filter")}" href="javascript:;">${$(
                this
            ).text()} &times;</a>`
        );
    }
});

//pagination-more
//orderby










/*************************************************************** */
$(document).on("click", ".app-phone-suggest__product-paginate", function () {
    // handleFilter();
    page = $(this).attr('next-page');
    handleFilter();

    history.pushState({}, null, window.location.pathname);
    history.pushState({}, null, window.location.href + urlFilter);
    var url = String("/get" + window.location.pathname + urlFilter);

    $.ajax({
        type: "POST",
        url: String(url),
        dataType: "html",
        success: function (result) {
          $('#show-products').empty();
          $('#show-products').html(result);
          $('.container-filter__attribute-content-list-absolute').fadeOut();
            $([document.documentElement, document.body]).animate({
            scrollTop: $(".app-phone-suggest__product").offset().top
          }, 1200);
        },
    });
});
$(document).on("click", ".orderby", function () {

  if ($(this).attr("data-sort") == "asc") {
      sort = "asc";
  }
  if ($(this).attr("data-sort") == "desc") {
      sort = "desc";
  }
  $(".app-category-sort__content-item-sort-list").slideToggle({
  start: function () {
    $(this).css({
      display: "flex"
    })
  }
});
  handleFilter();

  history.pushState({}, null, window.location.pathname);
history.pushState({}, null, window.location.href + urlFilter);
var url = String("/get" + window.location.pathname + urlFilter);
$.ajax({
    type: "POST",
    url: String(url),
    dataType: "html",
    success: function (result) {
      $('#show-products').empty();
      $('#show-products').html(result);
      $('.container-filter__attribute-content-list-absolute').fadeOut();
        $([document.documentElement, document.body]).animate({
        scrollTop: $(".app-phone-suggest__product").offset().top
       }, 1200);
    },
});



});
$(document).on("click", ".app-category-sort__content-item-click", function () {
  $(".app-category-sort__content-item-sort-list").slideToggle({
  start: function () {
    $(this).css({
      display: "flex"
    })
  }
});
});
$(document).on("click", ".close-filter", function () {

  $('.container-filter__attribute-content-list-absolute').fadeOut();
});
$(document).on("click", ".show-result-filter", function () {

history.pushState({}, null, window.location.pathname);
history.pushState({}, null, window.location.href + urlFilter);
var url = String("/get" + window.location.pathname + urlFilter);
$.ajax({
    type: "POST",
    url: String(url),
    dataType: "html",
    success: function (result) {
      $('#show-products').empty();
      $('#show-products').html(result);
      $('.container-filter__attribute-content-list-absolute').fadeOut();
        $([document.documentElement, document.body]).animate({
        scrollTop: $(".app-phone-suggest__product").offset().top
       }, 1200);
    },
});


});

$(document).on("click", ".select-delete-filter-item", function () {
  
  var dataFilter = $(this).attr('data-filter');
  var typeFilter = $(this).attr("type-filter");
  for (let i = 0; i < filterArray.length; i++) {
                        if (filterArray[i].hasOwnProperty(typeFilter)) {
                         
                           let arrNew = filterArray[i][typeFilter].filter((item) => {
                               if(String(item) != dataFilter){
                                return true;
                               }
                               return false;
                            });
                            filterArray[i][typeFilter] = arrNew ;
                           // console.log(arrNew );
                            break;
                        }
                    }
                   
                    
  //console.log(dataFilter, typeFilter);
  $(`.container-filter__attribute-content-item-list[data-filter="${dataFilter}"]`).removeClass('active-filter');
  $(`.container-filter__attribute-content-item-list[data-filter="${dataFilter}"]`).addClass('container-filter__attribute-content-list-absolute-item');
   $(this).remove();
   handleFilter();
});



// $(document).on("click", ".container-filter__attribute-content-list-absolute-item", function () {
//  


//  console.log(typeFilter);
//  console.log(dataFilter);
 
// });



$('.click-filter-get').click(function(e){
            $(this).css('border', '1px solid #ff6700');
            var index = $('.click-filter-get').index(this);
            $('.container-filter__attribute-content-list-absolute').css('display', 'none');
            $('.container-filter__attribute-content-list-absolute').eq(index).css("display", "flex").hide().fadeToggle();
        })
        $('.container-filter__attribute-content-list-absolute-item').click(function(e){
           $('.show-result-filter,.close-filter').remove();
            $('.container-filter__attribute-content-list-absolute').append('<div class="show-result-filter"> <i class="fa fa-spinner fa-spin"></i></div> <div class="close-filter">Đóng</div>')
            $(this).removeClass('container-filter__attribute-content-list-absolute-item');
             if($(this).hasClass('active-filter')){
              var dataFilter = $(this).attr('data-filter');
              var typeFilter = $(this).attr("type-filter");
              $(`.select-delete-filter-item[data-filter="${dataFilter}"]`).remove();
               $(this).removeClass('active-filter');
               for (let i = 0; i < filterArray.length; i++) {
                        if (filterArray[i].hasOwnProperty(typeFilter)) {
                         
                           let arrNew = filterArray[i][typeFilter].filter((item) => {
                               if(String(item) != dataFilter){
                                return true;
                               }
                               return false;
                            });
                            filterArray[i][typeFilter] = arrNew ;
                            break;
                        }
                    }
                   
             }else {
               var typeFilter = $(this).attr("type-filter");
               var dataFilter = $(this).attr("data-filter");
              
               var text = $(this).text();
              //demo.hasOwnProperty('age')
              let checkExist = filterArray.find(obj => obj.hasOwnProperty(typeFilter));
               if (checkExist) {
                let result = filterArray.some(obj => obj[typeFilter] && obj[typeFilter].includes(dataFilter));
                if(!result){
                  for (let i = 0; i < filterArray.length; i++) {
                        if (filterArray[i].hasOwnProperty(typeFilter)) {
                            filterArray[i][typeFilter].push(dataFilter);
                          
                            break;
                        }
                    }
                }
                
               
                
               } else {
             
                 let object = {}
                 object[typeFilter] = [dataFilter];
                 filterArray.push(object);
       
               
               }
             
               
              $('#show-list-delete-filter').append(`<a href="javascript:;" type-filter="${typeFilter}" data-filter="${dataFilter}" class="select-delete-filter-item">
                    <li class="select-delete-filter" >  
                       <div class="">
                          ${text}
                        </div> 
                        <div class="select-delete-filter-close">&times;</div>
                    </li>
                  </a>`);
               $(this).addClass('active-filter');
             }
            
             handleFilter();
        });
      function renderProduct(){
        $.ajax({
        type: "POST",
        url: '/get' + window.location.pathname + window.location.search,
        dataType: "html",
        success: function (result) {
            $('#show-products').empty();
            $('#show-products').html(result);
            $([document.documentElement, document.body]).animate({
        scrollTop: $(".app-phone-suggest__product").offset().top
       }, 1200);
        },
    });
        //console.log();
      }
      renderProduct();
        

        window.onpopstate = function(event) {
          $.ajax({
        type: "POST",
        url: '/get' + window.location.pathname + window.location.search,
        dataType: "html",
        success: function (result) {
            $('#show-products').empty();
            $('#show-products').html(result);
            $([document.documentElement, document.body]).animate({
        scrollTop: $(".app-phone-suggest__product").offset().top
       }, 1200);
        },
    });
       };
        
      </script>

<?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>