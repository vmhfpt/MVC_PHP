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

    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
</head>

<body>
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
                <form action="hang-hoa/liet-ke.php" method="GET" class="app-header__top-item">
                    <div class="app-header__top-item-input">
                        <input value="" name="keywords" placeholder="Bạn tìm gì ..." />
                    </div>
                    <div class="app-header__top-item-icon">
                        <button class=""> <i class="fa fa-search" aria-hidden="true"></i></button>
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
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <a href="">
                        <div class="app-header__top-item-icon-cart-quantity"></div>
                    </a>
                </div>
                <div class="app-header__top-item">
                    <a href="<?= false  ?  '/dashboard' :   '/tai-khoan?dang-nhap' ?>" class=""> <i class="fa fa-user-o" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </header>