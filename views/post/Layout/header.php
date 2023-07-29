<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/css/cart.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/css/category.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/css/detail.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/css/form.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/css/grid.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/css/index.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/css/introduce.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/css/new.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/responsive/cart.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/responsive/detail.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/responsive/form.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/responsive/index.css">
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/responsive/new.css">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/carousel/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= SITE_URL_POST ?>/carousel/dist/assets/owl.theme.default.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?= SITE_URL_POST ?>/carousel/dist/owl.carousel.min.js"></script>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
</head>

<body>
<style>
      .app-header__top-item {
                        position: relative;
                    }
     .app-header__top-item-auto-complete {
        z-index: 999;
        position: absolute;
        top : 100%;
        left : 0px;
        width : 100%;
        background: white;
        box-shadow: 0px 0px 9px black;
        border-radius: 2px;
        padding : 10px 13px;
        display : none;
        flex-direction: column;
        gap : 10px;
     }
     .app-header__top-item-auto-complete-item {
        display : flex;
        gap : 10px;
     }
     .app-header__top-item-auto-complete-item img {
        width : 50px;
        height : 50px;
        object-fit: cover;
     }
     .app-header__top-item-auto-complete-item-detail {
        display : flex;
        flex-direction: column;
        gap : 5px;
        font-size: 13px;
     }
     .app-header__top-item-auto-complete-item-detail span:first-child {
        font-weight: 500;
        line-height: 15px;
     }
     .app-header__top-item-auto-complete-item-detail span:last-child {
       color : red;
     }
</style>
    <header class="app-header container-fluid">
        <div class="container">
            <div class="app-header__top">
                <div class="app-header__top-item">
                    <a href="/index.html" class=""><img class="logo-desktop" src="https://didongthongminh.vn/images/config/lg_1648528949.svg" alt="" /></a>
                    <a href="/" class=""><img class="logo-mobile" src="https://didongthongminh.vn/images/config/logo_1648529142.svg" alt="" /></a>
                </div>
                <div class="app-header__top-item show-nav-app">
                    <div class="app-header__top-item-icons">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <div class="app-header__top-item-title">Danh mục</div>
                </div>
                <div class="app-header__top-item">
                    <div class="app-header__top-item-title-address">
                        Xem giá, <span> tồn kho</span> tại :
                    </div>

                    <div class="app-header__top-item-title-zone">
                        Đà Nẵng<i class="fa fa-caret-down" aria-hidden="true"></i>
                    </div>
                </div>
            
                <form autocomplete="off" action="/plat-form/tim-kiem" method="GET" class="app-header__top-item">
                    <div class="app-header__top-item-input">
                        <input id="key-search" value="<?=isset($_GET['key']) ? $_GET['key'] : ''?>" name="key" placeholder="Bạn tìm gì ..." autocomplete="off" />
                    </div>
                    <div class="app-header__top-item-icon">
                        <button type="submit" class=""> <i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                    <div class="app-header__top-item-auto-complete">
                      
                      <a href="" class=""><div class="app-header__top-item-auto-complete-item">
                            <div class=""><img src="https://didongthongminh.vn/images/products/2023/05/12/resized/Xiaomi-redmi-note-10-je-5g.jpg" alt="" class=""></div>
                            <div class="app-header__top-item-auto-complete-item-detail">
                                <span class=""> Vòng đeo tay thông minh Xiaomi Mi Band 6 - Chính hãng  </span>
                                <span class="">2.790.000d</span>
                            </div>
                      </div></a>
                      <a href="" class=""><div class="app-header__top-item-auto-complete-item">
                            <div class=""><img src="https://didongthongminh.vn/images/products/2023/05/12/resized/Xiaomi-redmi-note-10-je-5g.jpg" alt="" class=""></div>
                            <div class="app-header__top-item-auto-complete-item-detail">
                                <span class=""> Vòng đeo tay thông minh Xiaomi Mi Band 6 - Chính hãng  </span>
                                <span class="">2.790.000d</span>
                            </div>
                      </div></a>
                      
                    </div>
                </form>
              
                <div class="app-header__top-item">
                    <div class="">
                        <img src="https://didongthongminh.vn/templates/default/images/call.svg" alt="" />
                    </div>
                    <div class="app-header__top-item-detail-ship">
                        <span>Gọi mua hàng </span>
                        <b> 0855100001</b>
                    </div>
                </div>
                <div class="app-header__top-item">
                    <div class="">
                        <img src="https://didongthongminh.vn/templates/default/images/store-w.svg" alt="" />
                    </div>
                    <div class="app-header__top-item-detail-ship">
                        <span>Cửa hàng gần bạn </span>
                    </div>
                </div>
                <div class="app-header__top-item">
                    <a style="color : white" href="/cart" class=""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                    <a href="/cart">
                        <div class="app-header__top-item-icon-cart-quantity"></div>
                    </a>
                </div>
                <div class="app-header__top-item">
                    <a href="<?= isset($_SESSION['user'])  ?  '/dashboard' :   '/login' ?>" class=""> <i class="fa fa-user-o" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </header>
    <script >
   $('#key-search').on('keyup paste', function() {
       text = $(this).val();
       if(text == ''){
        $(".app-header__top-item-auto-complete").fadeOut(50);
        return true;
       }
       $.ajax({
                        method: "POST",
                        url: `/api/get-autocomplete`,
                        data: {
                            key : text
                        }

                    })
                    .done(function(msg) {
                        $(".app-header__top-item-auto-complete").empty();
                       
                        msg = JSON.parse(msg);
                        if(msg.data.length == 0){
                            $(".app-header__top-item-auto-complete").fadeOut(50);
                            return true;
                        }
                       
                        
                        $(".app-header__top-item-auto-complete").fadeIn({
                            start: function () {
                                $(this).css({
                                display: "flex"
                                })
                            }
                        });
                        console.log(msg);
                        msg.data.map((value, key) => {
                            $('.app-header__top-item-auto-complete').append(`<a href="/product/${value.platform_slug}/${value.slug}" class=""><div class="app-header__top-item-auto-complete-item">
                            <div class=""><img src="${msg.rootUrl}${value.thumb}" alt="" class=""></div>
                            <div class="app-header__top-item-auto-complete-item-detail">
                                <span class=""> ${value.name}   </span>
                                <span class="">${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.price_init)}</span>
                            </div>
                      </div></a>`);
                        });
                         
                    })
    });
                 
    </script>