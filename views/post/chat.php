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
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
</head>

<body>
    <header class="app-header container-fluid">
        <div class="container">
            <div class="app-header__top">
                <div class="app-header__top-item">
                    <a href="" class=""><img class="logo-desktop" src="https://didongthongminh.vn/images/config/lg_1648528949.svg" alt="" /></a>
                    <a href="" class=""><img class="logo-mobile" src="https://didongthongminh.vn/images/config/logo_1648529142.svg" alt="" /></a>
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
                    <a href="" class=""> <i class="fa fa-user-o" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </header>

    <main>

    </main>

    <div class="show-app__chat">
        <div class="app-chat__content action-check">
            <!-- <div class="app-chat__container">
                <div class="app-chat__tab">
                    <div class="app-chat__tab-image ">
                        <div class="app-chat__tab-image-name">
                            <div class="">H</div>
                            <div class="app-chat__tab-image-point"></div>
                        </div>
                    </div>
                    <div class="app-chat__tab-name ">
                        <div class="app-chat__tab-name-title"><span>Vu Minh Hung (Bạn)</span></div>
                        <div class="app-chat__tab-name-status"><span>Đang hoạt động</span></div>
                    </div>
                    <div class="app-chat__tab-close ">
                        <div>×</div>
                    </div>
                </div>
                <div class="app-chat__detail" id="chat">
                    <div class="app-chat__detail-item">
                        <div class="app-chat__detail-item-flex">
                            <div class="app-chat__detail-my-chat-image"></div>
                            <div class="app-chat__detail-my-chat-content"><span> ${value.content}</span></div>
                        </div>
                        <div class="app-chat__detail-someone-date-my-chat">
                            <div><span class="time-current" data-chat="2023-05-14T15:21:50.000Z">${value.createdAt}</span></div>
                        </div>
                    </div>
                    <div class="app-chat__detail-item ">
                        <div class="app-chat__detail-someone">
                            <div class="app-chat__detail-someone-name">
                                <div class="app-chat__detail-someone-name-char border-admin">
                                    <div>H</div>
                                    <div class="app-chat__supper-admin"> AD </div>
                                    <div class="2"></div>
                                </div>
                            </div>
                            <div>
                                <div class="app-chat__detail-someone-name"><span>${value.name}</span></div>
                                <div class="app-chat__detail-someone-content"><span> ${value.content}</span></div>
                            </div>
                        </div>
                        <div class="app-chat__detail-someone-date-someone">
                            <div><span class="time-current" data-chat="2023-05-13T02:04:40.000Z">${value.createdAt}</span></div>
                        </div>
                    </div>




                </div>


                <div class="app-chat__post-comment">
                    <div class="app-chat__post-comment-input "><input id="input-post" type="text" placeholder="Aa" value=""></div>
                    <div class="app-chat__post-comment-button ">
                        <div><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div> -->


            <!-- <div class="app-chat__container">
                <div class="app-chat__tab">
                    <div class="app-chat__tab-image ">
                        <div class="app-chat__tab-image-name">
                            <div><i class="fa fa-bolt" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="app-chat__tab-quick-start"><span>Trò chuyện nhanh</span></div>
                    <div class="app-chat__tab-close ">
                        <div>×</div>
                    </div>
                </div>
                <div class="app-chat__tab-register">
                    <form>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group "><label>Tên *</label>
                                <input class="input-name-chat" type="text" placeholder="Nhập tên" value="">
                                <span class="error-name-chat" style="color : red">* Bắt buộc</span>
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group "><label>Email *</label>
                                <input class="input-email-chat" type="email" placeholder="Nhập email" value="">
                                <span class="error-email-chat" style="color : red">* Bắt buộc</span>
                            </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group ">
                                    <label>Số điện thoại *</label>
                                    <input class="input-phone-chat" type="number" placeholder="Nhập số điện thoại" value="">
                                    <span class="error-phone-number-chat" style="color : red">* Bắt buộc</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="row">
                               
                                <div class="col-sm-6 col-6"><a href="javascript:;"><button type="button" class="app-chat__tab-button-register">Đăng nhập nhanh</button></a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->
        </div>
    </div>

    <div class="chat-now">
        <a href="javascript:;" class="show-chat-click"> <img src="https://vuminhhung.netlify.app/static/media/200w.002949c9c69a8105b467.gif" alt=""></a>
    </div>

    <footer class="app-footer container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 support-paying">
                    <div class="app-footer-item">
                        <ul>
                            <li class="app-footer-item__title">Thông tin liên hệ</li>
                            <li><a href="">Giới thiệu công ty</a></li>
                            <li><a href="">Hệ thống cửa hàng</a></li>
                            <li><a href="">Chính sách bảo mật</a></li>
                            <li><a href="">Mail : online@dcenter.vn</a></li>
                            <li class="app-footer-item__title">Hỗ trợ thanh toán</li>
                            <div class="app-footer-paying__icon">
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/visa.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/master_card.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/jbc.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/money.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/inter.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/tragop.svg" alt="" />
                                </div>
                            </div>

                            <div class="app-footer-paying__icon">
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/bct.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://images.dmca.com/Badges/_dmca_premi_badge_4.png?ID=2dc901db-8576-4fea-ac8f-709448f10282" alt="" />
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="app-footer-item">
                        <ul>
                            <li class="app-footer-item__title">Thông tin khác</li>
                            <li><a href="">Chính sách đổi trả</a></li>
                            <li><a href="">Quy chế hoạt động</a></li>
                            <li><a href="">Chính sách bảo hành</a></li>
                            <li><a href="">Tuyển dụng</a></li>
                            <li><a href="">Khách hàng doanh nghiệp</a></li>
                            <li><a href="">Tin tức</a></li>
                            <li><a href="">Trade-in thu cũ lên đời</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="app-footer-item">
                        <ul>
                            <li class="app-footer-item__title">Thông tin hỗ trợ</li>
                            <li><a href="">Mua và thanh toán Online</a></li>
                            <li><a href="">Mua trả góp Online</a></li>
                            <li><a href="">Trung tâm bảo hành chính hãng</a></li>
                            <li><a href="">Quy định về viêc sao lưu dữ liệu</a></li>
                            <li><a href="">Hướng dẫn thanh toán chuyển đổi</a></li>
                            <li><a href="">Dịch vụ bảo hành điền thoại</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="app-footer-item">
                        <ul>
                            <li class="app-footer-item__title">Gọi tư vấn & khiếu nại</li>
                            <li><a href="">Gọi mua hàng : 0855100001</a></li>
                            <li><a href="">Hỗ trợ ký thuật : 18006502</a></li>
                            <li><a href="">Hợp tác kinh doanh : 19006122</a></li>
                            <li class="app-footer-item__title">Kết nối với chúng tôi</li>
                            <div class="app-footer-paying__icon">
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/fb.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/ytb.svg" alt="" />
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="app-copyright container-fluid">
        <span class="">@ Bản quyền thuộc về Công Ty Cổ Phần Viễn Thông Di Động Thông
            Minh</span>
    </div>


    <script>
        var errorInputEmail = true;
        var errorInputName = true;
        var errorInputPhone = true;
        var chatUser = JSON.parse(localStorage.getItem("user"));
        $(document).on("input keyup paste", ".input-name-chat", function() {
            text = $(this).val();
            if (text.length <= 5 || text.length > 20) {
                errorInputName = true;
                $('.error-name-chat').text('* Tên không hợp lệ');

            } else {
                errorInputName = false;
                $('.error-name-chat').text('');
            }
        });
        $(document).on("input keyup paste", ".input-email-chat", function() {
            text = $(this).val();

            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text)) {
                $('.error-email-chat').text('');
                errorInputEmail = false;
            } else {
                $('.error-email-chat').text('* Email không hợp lệ');
                errorInputEmail = true;

            }
        });
        $(document).on("input keyup paste", ".input-phone-chat", function() {
            text = $(this).val();
            if (/(84|0[3|5|7|8|9])+([0-9]{8})\b/g.test(text)) {
                $('.error-phone-number-chat').text('');
                errorInputPhone = false;
            } else {
                errorInputPhone = true;
                $('.error-phone-number-chat').text('* Số điện thoại không hợp lệ');

            }
        });
        $(document).on("click", ".app-chat__tab-button-register", function() {
            if (errorInputEmail == false && errorInputName == false && errorInputPhone == false) {
                var object = {
                    id: null,
                    name: $(".input-name-chat").val(),
                    email: $(".input-email-chat").val(),
                    phone_number: $(".input-phone-chat").val(),
                    conversation_id: false
                }
                localStorage.setItem("user", JSON.stringify(object));
                chatUser = JSON.parse(localStorage.getItem("user"));
                $('.action-check').html(`<div class="app-chat__container">
                <div class="app-chat__tab">
                    <div class="app-chat__tab-image ">
                        <div class="app-chat__tab-image-name">
                        <div class="">${chatUser.name[(chatUser.name).lastIndexOf(" ") + 1]}</div>
                            <div class="app-chat__tab-image-point"></div>
                        </div>
                    </div>
                    <div class="app-chat__tab-name ">
                      <div class="app-chat__tab-name-title"><span>${chatUser.name} (Bạn)</span></div>
                        <div class="app-chat__tab-name-status"><span>Đang hoạt động</span></div>
                    </div>
                    <div class="app-chat__tab-close ">
                        <div>×</div>
                    </div>
                </div>
                <div class="app-chat__detail" id="chat">
                    <div class="app-chat__detail-item ">
                            <div class="app-chat__detail-someone">
                                <div class="app-chat__detail-someone-name">
                                    <div class="app-chat__detail-someone-name-char border-admin">
                                        <div>S</div>
                                        <div class="app-chat__supper-admin"> AD </div>
                                        <div class="2"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="app-chat__detail-someone-name"><span>Hệ thống</span></div>
                                    <div class="app-chat__detail-someone-content"><span> Bạn cần hỗ trợ điều gì ?</span></div>
                                </div>
                            </div>
                            <div class="app-chat__detail-someone-date-someone">
                                <div><span class="time-current" >Ngay lúc này</span></div>
                            </div>
                        </div>
                </div>


                <div class="app-chat__post-comment">
                    <div class="app-chat__post-comment-input "><input id="input-post" type="text" placeholder="Aa" value=""></div>
                    <div class="app-chat__post-comment-button ">
                        <div><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>`);
            }
        });

        function checkLogin() {

            if (chatUser == null) {
                $('.action-check').html(` <div class="app-chat__container">
    <div class="app-chat__tab">
        <div class="app-chat__tab-image ">
            <div class="app-chat__tab-image-name">
                <div><i class="fa fa-bolt" aria-hidden="true"></i></div>
            </div>
        </div>
        <div class="app-chat__tab-quick-start"><span>Trò chuyện nhanh</span></div>
        <div class="app-chat__tab-close ">
            <div>×</div>
        </div>
    </div>
    <div class="app-chat__tab-register">
        <form>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group "><label>Tên *</label>
                    <input class="input-name-chat" type="text" placeholder="Nhập tên" value="">
                    <span class="error-name-chat" style="color : red">* Bắt buộc</span>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group "><label>Email *</label>
                    <input class="input-email-chat" type="email" placeholder="Nhập email" value="">
                    <span class="error-email-chat" style="color : red">* Bắt buộc</span>
                </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group ">
                        <label>Số điện thoại *</label>
                        <input class="input-phone-chat" type="number" placeholder="Nhập số điện thoại" value="">
                        <span class="error-phone-number-chat" style="color : red">* Bắt buộc</span>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                   
                    <div class="col-sm-6 col-6"><a href="javascript:;"><button type="button" class="app-chat__tab-button-register">Đăng nhập nhanh</button></a></div>
                </div>
            </div>
        </form>
    </div>
</div>`);
            } else {
                $('.action-check').html(`<div class="app-chat__container">
    <div class="app-chat__tab">
        <div class="app-chat__tab-image ">
            <div class="app-chat__tab-image-name">
                <div class="">${chatUser.name[(chatUser.name).lastIndexOf(" ") + 1]}</div>
                <div class="app-chat__tab-image-point"></div>
            </div>
        </div>
        <div class="app-chat__tab-name ">
            <div class="app-chat__tab-name-title"><span>${chatUser.name} (Bạn)</span></div>
            <div class="app-chat__tab-name-status"><span>Đang hoạt động</span></div>
        </div>
        <div class="app-chat__tab-close ">
            <div>×</div>
        </div>
    </div>
    <div class="app-chat__detail" id="chat">
       
    </div>


    <div class="app-chat__post-comment">
        <div class="app-chat__post-comment-input "><input id="input-post" type="text" placeholder="Aa" value=""></div>
        <div class="app-chat__post-comment-button ">
            <div><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
        </div>
    </div>
</div>`);
            }
        }
        checkLogin();
    </script>









    <script>
         var listOnline = [];
        // var idUser = 12 ;
        // var nameUser = 'hun vu minh';
        function checkOnline(id)  {
            
            let exists = Object.values(listOnline).includes((id));
            
            if(exists){
                return "app-chat__is-online";
            }
            return "app-chat__is-offline" ;
      }
        let host = "http://localhost:3000/";
        let socket = io.connect(host);
        $(document).ready(function() {
            if(chatUser && chatUser.id != null){
                socket.emit('login',{userId: chatUser.id});
            }

            $('.show-chat-click').click(function() {
                $('.show-app__chat').toggle();
                $("#chat").scrollTop($("#chat")[0].scrollHeight);
            });
            $('.app-chat__tab-close ').click(function() {
                $('.show-app__chat').toggle();
            });

            $(document).on("keyup paste", "#input-post", function(e) {
                var text = $(this).val();
                if (text !== '') {
                    // socket.emit("sendDataClientTyping", idUser);
                } else {
                    // socket.emit("sendDataClientTyping", null);
                }

                if (e.keyCode === 13 && e.shiftKey === false) {
                    postComment(text);
                }

            });

            $(document).on("click", ".app-chat__post-comment-button", function(e) {
                postComment($('#input-post').val());
            });

            function postComment(value) {
                if (value !== "" && value[0] !== " ") {
                    $('#input-post').val("");
                    //socket.emit("sendDataClientPrivate", msg);
                    chatUser = JSON.parse(localStorage.getItem("user"));
                    if (chatUser.id == null) {
                        $.ajax({
                                method: "POST",
                                url: `${host}register`,
                                data: {
                                    name: chatUser.name,
                                    email: chatUser.email,
                                    password: '123456789',
                                    phone_number: chatUser.phone_number
                                }

                            })
                            .done(function(msg) {
                                var newObject = {
                                    ...chatUser,
                                    id: msg.data._id
                                }
                                localStorage.setItem("user", JSON.stringify(newObject));
                                const contentPost = {
                                    ...newObject,
                                    content: value
                                }
                              //  console.log(contentPost);
                                socket.emit('login',{userId: msg.data._id});
                                socket.emit("sendDataClientPrivate", contentPost);
                            })
                    } else {
                        chatUser = JSON.parse(localStorage.getItem("user"));
                        const contentPost = {
                          ...chatUser,
                          content: value
                        }
                        socket.emit("sendDataClientPrivate", contentPost);
                    }
                    //console.log(chatUser);
                    // alert(1);
                    // $('#input-post').val("");
                    // const msg = {
                    //     name: nameUser,
                    //     content: value,
                    //     id: idUser,
                    //     thumb :  null
                    // };
                    // socket.emit("sendDataClient", msg);
                    // socket.emit("sendDataClientTyping", null);
                }

            }
            socket.on("sendDataServerOnline", (item) => {
                listOnline = (item.users);
                $('.check-online').removeClass('app-chat__is-online');
                $('.check-online').addClass('app-chat__is-offline');

               for(const key in listOnline) {
                    $('.' + listOnline[key]).addClass('app-chat__is-online');
                    $('.' + listOnline[key]).removeClass('app-chat__is-offline');
                }
            });
            socket.on("sendDataServerPrivateAddNewChat", (items) => {
                console.log("sendDataServerPrivateAddNewChat >> ", items);
                chatUser = JSON.parse(localStorage.getItem("user"));
                if(chatUser.conversation_id == false){
                    var newObject = {
                        ...chatUser,
                        conversation_id: items.dataMessenger.conversation_id
                    }
                    localStorage.setItem("user", JSON.stringify(newObject));
                    renderComment(items.dataMessenger);
                }
            });
            socket.on("sendDataServerPrivateAddNewChatList", (item) => {
               
               console.log("sendDataServerPrivateAddNewChatList >> ", item);
            });

            socket.on("sendDataServerPrivate", (item) => {
                renderComment(item.dataMessage);
              console.log("sendDataServerPrivate >> ", item);
            });
            socket.on("sendDataServerNewTopMessage", (item) => {

              console.log("sendDataServerNewTopMessage >>" ,item);
            });

            socket.on("sendDataServerTypingPrivate", (item) => {
                chatUser = JSON.parse(localStorage.getItem("user"));
                if($('#chat').find('.app-chat__detail-text-typing').length !== 0){
                    if (item.data === null ) {
                        $('.add-typing-chat').remove();
                    }
                }else {
                    if(item.data != null && item.data.user_id !==  chatUser.id && item.data.conversation_id ===  chatUser.conversation_id){
                        $('#chat').append(`<div class="app-chat__detail-item add-typing-chat">
                           <div class="app-chat__detail-someone">
                            <div class="app-chat__detail-text-typing"><span>Ai đó đang nhập </span></div>
                            <div>
                                <div class="app-chat__detail-typing"><img src="https://vuminhhung.netlify.app/static/media/typing.4912cac814f4413ba9df.gif" alt=""></div>
                            </div>
                            </div>
                        </div>`);
                        $("#chat").scrollTop($("#chat")[0].scrollHeight);
                    }else {
                        $('.add-typing-chat').remove();
                    }
                }

        
           });


            socket.on("sendDataServerPrivateReplyByAdmin", (item) => {
                chatUser = JSON.parse(localStorage.getItem("user"));
                console.log("sendDataServerPrivateReplyByAdmin >>" ,item);
                if(item.conversation_id == chatUser.conversation_id){
                    $('#chat').append(`  <div class="app-chat__detail-item ">
                            <div class="app-chat__detail-someone">
                                <div class="app-chat__detail-someone-name">
                                    <div class="app-chat__detail-someone-name-char border-admin">
                                        <div>S</div>
                                        <div class="app-chat__supper-admin"> AD </div>
                                        <div class="2"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="app-chat__detail-someone-name"><span>Hệ thống</span></div>
                                    <div class="app-chat__detail-someone-content"><span> Admin "${item.name}" đã tham gia cuộc trò chuyện</span></div>
                                </div>
                            </div>
                            <div class="app-chat__detail-someone-date-someone">
                                <div><span class="time-current" >Ngay lúc này</span></div>
                            </div>
                        </div>`);
                }
             });


            
            function renderComment(dataMessage){
                chatUser = JSON.parse(localStorage.getItem("user"));
                //console.log(chatUser.conversation_id, dataMessage);
                if(chatUser.conversation_id == dataMessage.conversation_id){
                    if(chatUser.id == dataMessage.user_id._id){
                        $('#chat').append(`<div class="app-chat__detail-item">
                            <div class="app-chat__detail-item-flex">
                                <div class="app-chat__detail-my-chat-image"></div>
                                <div class="app-chat__detail-my-chat-content"><span> ${dataMessage.content}</span></div>
                            </div>
                            <div class="app-chat__detail-someone-date-my-chat">
                                <div><span class="time-current" >${dataMessage.createdAt}</span></div>
                            </div>
                        </div>`);
                    }else {
                        $('#chat').append(`<div class="app-chat__detail-item ">
                        <div class="app-chat__detail-someone">
                            <div class="app-chat__detail-someone-name">
                                <div class="app-chat__detail-someone-name-char border-admin">
                                    <div>${dataMessage.user_id.name[(dataMessage.user_id.name).lastIndexOf(" ") + 1]}</div>
                                    <div class="app-chat__supper-admin"> AD </div>
                                    <div class="${dataMessage.user_id._id}  check-online ${checkOnline(dataMessage.user_id._id)}"></div>
                                </div>
                            </div>
                            <div>
                                <div class="app-chat__detail-someone-name"><span>${dataMessage.user_id.name}</span></div>
                                <div class="app-chat__detail-someone-content"><span> ${dataMessage.content}</span></div>
                            </div>
                        </div>
                        <div class="app-chat__detail-someone-date-someone">
                            <div><span class="time-current" data-chat="2023-05-13T02:04:40.000Z">${dataMessage.createdAt}</span></div>
                        </div>
                    </div>`);
                    }
                    $("#chat").scrollTop($("#chat")[0].scrollHeight);
                }
            }



             
             
             if(chatUser && chatUser.conversation_id != false){
                const myTimeout = setTimeout(myGreeting, 1000);
             }
            function myGreeting() {
                chatUser = JSON.parse(localStorage.getItem("user"));
                $.ajax({
                        method: "POST",
                        url: `${host}get-chat-private`,
                        data: {
                            id : chatUser.conversation_id
                        }

                    })
                    .done(function(msg) {
                        msg.map((value, key) => {
                        //console.log(value)
                        if(chatUser.id == value.user_id._id){
                            $('#chat').append(`<div class="app-chat__detail-item">
                            <div class="app-chat__detail-item-flex">
                                <div class="app-chat__detail-my-chat-image"></div>
                                <div class="app-chat__detail-my-chat-content"><span> ${value.content}</span></div>
                            </div>
                            <div class="app-chat__detail-someone-date-my-chat">
                                <div><span class="time-current" >${value.createdAt}</span></div>
                            </div>
                        </div>`);
                        
                        }else {
                            $('#chat').append(`<div class="app-chat__detail-item ">
                        <div class="app-chat__detail-someone">
                            <div class="app-chat__detail-someone-name">
                                <div class="app-chat__detail-someone-name-char border-admin">
                                    <div>${value.user_id.name[(value.user_id.name).lastIndexOf(" ") + 1]}</div>
                                       <div class="app-chat__supper-admin"> AD </div>
                                    <div class="${value.user_id._id}  check-online ${checkOnline(value.user_id._id)}"></div>
                                </div>
                            </div>
                            <div>
                                <div class="app-chat__detail-someone-name"><span>${value.user_id.name}</span></div>
                                <div class="app-chat__detail-someone-content"><span> ${value.content}</span></div>
                            </div>
                        </div>
                        <div class="app-chat__detail-someone-date-someone">
                            <div><span class="time-current" >${value.createdAt}</span></div>
                        </div>
                    </div>`);
                    
                        }
                      
                         });
                         
                    })

            }

        });
    </script>

</body>

</html>