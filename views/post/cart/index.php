<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>
<div class="show-popup-state"></div>
<div class="app-cart container-fluid">
        <div class="container app-cart-container__center">
            <div class="app-cart-container">
                <div class="app-cart-top__title">
                    <span class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Mua thêm sản phẩm khác</span>
                    <span data-dir-product="<?=IMAGE_DIR_PRODUCT?>" class="get-dir"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Đăng nhập</span>
               </div>

                <div class="app-cart__content">
                    <div class="show-cart-list">
                       

                   </div>

                    <div class="app-cart__content-total">
                        <div class="app-cart__content-total-item">
                             <span class="temp-price"></span>
                             <span class="temp-total-price"></span>
                        </div>
                        <div class="app-cart__content-total-item">
                            <span class="">Phí vận chuyển:</span>
                            <span data-price="0" class="transport-fee">Liên hệ</span>
                       </div>
                       <div class="app-cart__content-total-item">
                        <span class="">Mã giảm giá:</span>
                        <span class="">0đ</span>
                   </div>
                    </div>






                    <div class="app-cart__content-form">
                        <form action="" class="scroll-to-here">
                            <div class="app-cart__content-form-gender">
                                <div class="app-cart__content-form-gende-item">
                                    <input type="radio" name="" id="">
                                    <label for="" class="">Anh</label>
                                </div>

                                <div class="app-cart__content-form-gende-item">
                                    <input type="radio" name="" id="">
                                    <label for="" class="">Chị</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="row">
                                    <?php
                                    if (!isset($_SESSION['user'])) {

                                    ?>
                                        <div class="col-sm-6">
                                            <div class="form-group">

                                                <input placeholder="Họ và tên" type="text" class="pay-input-name">
                                                <span style="margin-top : 4px;color : red; font-size : 12px" class="error-name">* Bắt buộc nhập</span>
                                            </div>
                                        </div>

                                    <?php

                                    }else {
                                    ?>
                                             <input placeholder="Họ và tên" type="hidden" class="pay-input-name" value="<?=$_SESSION['user']['name']?>">
                                    <?php }?>

                                    <div class="<?= !isset($_SESSION['user']) ? "col-sm-6" : "col-sm-12" ?>">
                                        <div class="form-group">

                                            <input placeholder="Số điện thoại" type="number" class="pay-input-phone">
                                            <span style="margin-top : 4px;color : red; font-size : 12px" class="error-phone-number">* Bắt buộc nhập</span>
                                        </div>
                                    </div>

                                    <?php
                                    if (!isset($_SESSION['user'])) {

                                    ?>
                                        <div class="col-sm-12">
                                            <div class="form-group">

                                                <input placeholder="Email" type="email" class="pay-input-email">
                                                <span style="margin-top : 4px;color : red; font-size : 12px" class="error-email">* Bắt buộc nhập</span>
                                            </div>
                                        </div>

                                    <?php

                                    } else {
                                    ?>
                                        <input placeholder="Email" type="hidden" class="pay-input-email" value="<?=$_SESSION['user']['email']?>">
                                    <?php }?>

                                </div>

                            </div>

                            <div class="app-cart__content-form-transport">
                                <span class="">Chọn cách thức mua hàng</span>
                                <div class="app-cart__content-form-transport-flex">
                                    <div class="app-cart__content-form-gende-item">
                                        <input type="radio" name="" id="">
                                        <label for="" class="">Giao tận nơi</label>
                                    </div>

                                    <div class="app-cart__content-form-gende-item">
                                        <input type="radio" name="" id="">
                                        <label for="" class="">Nhận tại cửa hàng</label>
                                    </div>
                                </div>

                            </div>
                            <div class="app-cart__content-form-address scroll-to-address">
                                <span class="">Chọn địa chỉ để biết thời gian và phí vận chuyển (nếu có)</span>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group-option">
                                                <select id="select-city">
                                                    <option value="null">Tỉnh/ Thành phố</option>
                                                    <?php
                                                    for ($i = 0; $i < count($listCity); $i++) {
                                                    ?>
                                                        <option value="<?= $listCity[$i]["matp"] ?>"><?= $listCity[$i]["name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group-option">
                                                <select id="district-show">
                                                    <option value="null"> Quận/ Huyện</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <div class="form-group-option">
                                                <select name="" id="show-warge">
                                                    <option value="null">Phường/ Xã</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="detail_address_input" placeholder="Số nhà, tên đường">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="form-group">
                                    <input type="text" class="note" placeholder="Yêu cầu khác (không bắt buộc)">
                                </div>
                            </div>

                            <div class="app-cart__content-form-checkbox">
                                <div class="form-group-check-box">
                                    <input type="checkbox" name="" id="">
                                    <label for="" class="">Gọi người khác nhận hàng (nếu có)</label>
                                </div>
                                <div class="form-group-check-box">
                                    <input type="checkbox" name="" id="">
                                    <label for="" class="">Chuyển danh bạ, dữ liệu qua máy mới</label>
                                </div>
                                <div class="form-group-check-box">
                                    <input type="checkbox" name="" id="">
                                    <label for="" class="">Xuất hóa đơn công ty</label>
                                </div>
                            </div>

                            <div class="app-cart__content-form-button-coupon-content">
                                <div class="app-cart__content-form-button-coupon">
                                    <img src="https://didongthongminh.vn/modules/products/assets/images/icon_giam.svg" alt="" class="">
                                    <span class="title-coupon">Dùng mã giảm giá</span>
                                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </div>

                                <div class="app-cart__content-form-button-coupon-add">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                                            <div class="form-group">
                                                <input type="text"  id="coupon-input" placeholder="Nhập mã giảm giá">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 ">
                                            <div class="form-group-btns">
                                                <button type="button" class="">Áp dụng</button>
                                            </div>
                                        </div>

                                        <div class="show-coupon-error"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="app-cart__content-form-total-cost">
                                <span class="">Tổng tiền: </span>
                                <span class="total-price-checkout"></span>
                            </div>

                            <div class="app-cart__content-form-button-submit">

                                <button type="button" class="">Đặt hàng</button>
                            </div>
                        </form>
                    </div>

                    





                </div>

                <div class="app-cart-last"><span class="">Bằng cách đặt hàng, bạn đồng ý với Điều khoản sử dụng của Didongthongminh</span></div>
            </div>
        </div>
    </div>
    <style>
        .cart-show-color {
            cursor: pointer;
        }
        .list-cart-attribute {
            flex-wrap: wrap;
            display : flex;
            gap : 10px;
        }
        .list-cart-attribute-item {
            cursor: pointer;
            position: relative;
            border : 1px solid #eeeeee;
            padding : 10px  10px;
            border-radius: 4px;
        }
        .list-cart-attribute-item-tab {
            background: #f9920f ;
            position: absolute;
            top : 0px;
            right : 0px;
            
            color : white;
            font-size: 10px;
            padding : 0px 2px;
            border-bottom-left-radius: 5px ;
        }
        .app-cart__content-item-second-color-detail {
            background: white;
            z-index: 999;
        }
        .list-cart-attribute-item-tab-active {
            border : 1px solid  #f9920f ;
        }
        .item-cart-same-active:after {
            content: "";
            width: 15px;
            height: 12px;
            display: block;
            position: absolute;
            background: #f9920f;
            top: -1px;
            left: -1px;
            z-index: 0;
            border-radius: 5px 0 5px 0;
        }
        .item-cart-same-active:before {
            content: "";
            left: 5px;
            top: -0.5px;
            width: 4px;
            height: 8px;
            border: solid #fff;
            border-width: 0 1.5px 1.5px 0;
            -webkit-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            transform: rotate(45deg);
            position: absolute;
            display: block;
            z-index: 1;
        }
        .item-cart-same-active {
            border : 1px solid #f9920f !important;
        }
    </style>
  <script>




var codeCoupon = false;
    var errorInputEmail = $('.pay-input-email').val() == '' ? true : false;
    var errorInputName = $('.pay-input-name').val() == '' ? true : false;
    var errorInputPhone = true;
    if ($('.pay-input-name').length == 0) {
        errorInputName = false;
    }
    if ($('.pay-input-email').length == 0) {
        errorInputEmail = false;
    }



    $('.pay-input-name').on('input keyup paste', function() {
        text = $(this).val();
        if (text.length <= 5 || text.length > 20) {
            errorInputName = true;
            $('.error-name').text('* Tên không hợp lệ');

        } else {
            errorInputName = false;
            $('.error-name').text('');
        }
    });
    $('.pay-input-email').on('input keyup paste', function() {
        text = $(this).val();

        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text)) {
            $('.error-email').text('');
            errorInputEmail = false;
        } else {
            $('.error-email').text('* Email không hợp lệ');
            errorInputEmail = true;

        }
    });

    $(document).on("click", ".tab-memo-close", function() {
        $('.popup-success-cart').css('animation', 'popup-delay-out 0.5s ease-in-out');
    });

    $('.pay-input-phone').on('input keyup paste', function() {
        text = $(this).val();
        if (/(84|0[3|5|7|8|9])+([0-9]{8})\b/g.test(text)) {
            $('.error-phone-number').text('');
            errorInputPhone = false;
        } else {
            errorInputPhone = true;
            $('.error-phone-number').text('* Số điện thoại không hợp lệ');

        }
    });

    function renderDataListAttributeProductPriceCurrent($arr){
        let template = '';
        $arr.map((value, key) => {
                template = template + `<div  class="list-cart-attribute-item item-cart-same-active">
                                        <span class="list-cart-attribute-item-tab">${value.name}</span>
                                         ${value.value}
                                      </div> `;
            })
            return template;
    }
    function renderDataListCouponProductCurrent(list){
            
            if(!list){
              return ``;
            }else {
                let template = '<div class="app-cart__content-item-second-gift">';
                list.map((value, key) => {
                    template = template + `<div class="app-cart__content-item-second-gift-item">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <span class="">${value.coupon_name}</span>
                                        </div>`;
                })
                template  = template  + '</div>';
                return template;
            }
            return template;
        }
    $('.app-cart__content-form-button-submit>button').click(function() {
        // console.log(">>> code : ", codeCoupon);
        // console.log(">> fee trasport :", $('.transport-fee').attr('data-price'));
        // console.log(">> total : ", $('.total-price-checkout').text().replaceAll('.', '').slice(0, -1));
        //return true;
        if ( errorInputEmail == false && errorInputName == false && errorInputPhone == false) {


            if ($('.detail_address_input').val() == '' || $('#select-city').val() == 'null' || $('#district-show').val() == 'null' || $('#show-warge').val() == 'null') {
                //
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(".scroll-to-address").offset().top
                }, 600);
            } else {
                
               $(this).html(`<i style="font-size : 23px !important" class=" fa fa-spinner fa-spin"></i>`);
               $(this).css('pointer-events', 'none');
                const payName = $('.pay-input-name').val();
                const payEmail = $('.pay-input-email').val();
                const payPhone = $('.pay-input-phone').val();
                const payNote = $('.note').val();
                //console.log($('.pay-input-name').val(),$('.pay-input-email').val(), $('.pay-input-phone').val(), $('.note').val());
                //return true;
                $.ajax({
                        method: "POST",
                        url: "/api/purchase",
                        data: {
                            carts: JSON.parse(localStorage.getItem("carts")),
                            detail_user: {
                                name: $('.pay-input-name').val(),
                                email: $('.pay-input-email').val(),
                                phone: $('.pay-input-phone').val(),
                                note: $('.note').val(),
                                address_code: {
                                    city: $('#select-city').val(),
                                    district: $('#district-show').val(),
                                    aware: $('#show-warge').val()
                                },
                                address: $('.detail_address_input').val()
                            },
                            total :  $('.total-price-checkout').text().replaceAll('.', '').slice(0, -1),
                            transport_fee : $('.transport-fee').attr('data-price'),
                            codeCoupon : codeCoupon


                        }
                    })
                    .done(function(msg) {
                        msg = JSON.parse(msg);
                       if (msg.status == 'success') {
                            //	 localStorage.removeItem("carts");
                            $('.app-cart__content').remove();

                            $('.app-cart-top__title').after(` <div class="empty-cart-container">
                   <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" alt="" class="">
                   <span class="">Không còn gì trong giỏ hàng !</span>
                   <a href="index.php" class=""><button class="">Quay về  trang chủ</button></a>
                 </div>`);
                            //alert('oder buy products success !!');

                            var dataItem = JSON.parse(localStorage.getItem("carts"));

                            var templateProduct = '';
                            var totalProduct = 0;
                            var totalCost = 0;
                            dataItem.map((value, key) => {
                                totalProduct = totalProduct + Number(value.quantity);
                                
                                templateProduct = templateProduct + `<div class="app-cart__content-item">
                             <div class="app-cart__content-item-first ">
                                 <img src="${value.thumb}" alt="" class="">
                               
                             </div>
                             <div class="app-cart__content-item-second ">
    
    
                                   <div class="app-cart__content-item-second-name">
                                        <a href="${value.urlProduct}" class=""><b class="">${value.name}</b></a>
                                   </div>
                                   <div class="list-cart-attribute">
                                     ${renderDataListAttributeProductPriceCurrent(value.attributePriceCurrent)} 
                                     <div  class="list-cart-attribute-item item-cart-same-active">
                                        <span class="list-cart-attribute-item-tab">Màu sắc</span>
                                         ${value.colorCurrent.name}
                                      </div> 
                                  </div>
                                   <div class="app-cart__content-item-second-title-promotion">
                                      <span class="">Khuyến mại: </span>
                                   </div>
    
                                   ${renderDataListCouponProductCurrent(value.dataListCouponProduct)}
                                  
                                   <div class="app-cart__content-item-second-color">
                                    ${value.giftProduct ? `<span class="">Và ${value.giftProduct} sản phẩm quà tặng khác </span>`: ``}
                                      
                                   </span>
                                  </div>

    
    
                             </div>
                            
                             <div class="app-cart__content-item-third">
                                <div class="app-cart__content-item-third-item">
                                    <span class="">${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.priceCurrent)}</span>
                                    <span class="">${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.priceInitProduct)}</span>
                                </div>
                                <div class="app-cart__content-item-third-item">
                                    <p>x${value.quantity}</p>
                                </div>
                             </div>


                        </div>`;
                            });

                            var template = `<section class="popup-success-cart">
         <div class="popup-success-cart__content">
          <div class="tab-memo">
              <div class=""><span class="">Đặt hàng thành công</span></div>
              <div class="tab-memo-close">&times;</div>
          </div>
         <div class="app-cart__content app-cart__content-over-flow">
                    <div class="">
                       ${templateProduct}       
                   </div>

                    <div class="app-cart__content-total">
                        <div class="app-cart__content-total-item">
                             <span class="">Tổng (${totalProduct}) sản phẩm:</span>
                             <span class=""> ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(msg.total)}</span>
                        </div>
                        <div class="app-cart__content-total-item">
                            <span class="">Phí vận chuyển:</span>
                            <span class="">${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(msg.transportfee)}</span>
                       </div>
                       <div class="app-cart__content-total-item">
                        <span class="">Mã giảm giá:</span>
                        <span class="">${msg.coupon}</span>
                   </div>
                    </div>

                    <div class="app-cart__content-form app-cart__content-form-detail-oder">
                        <ul class="">
                           <li class=""><b class="">Họ và tên</b> : ${msg.name}</li>
                           <li class=""><b class="">SĐT</b> : ${payPhone}</li>
                           <li class=""><b class="">Email</b> : ${msg.email}</li>
                           <li class=""><b class="">Địa chỉ nhận hàng</b> : ${msg.address}</li>
                           <li class=""><b class="">Ghi chú</b> : ${payNote}</li>
                           <li class=""><b class="">Mã đơn hàng</b> : ${msg.codeorder}</li>
                           <li class=""><b class="">Ngày đặt</b> : ${msg.date}</li>
                           <li class=""><b class="">Trạng thái</b> : Chưa tiếp nhận</li>

                        </ul>
                    </div>

                    

                </div>
         </div>
     </section> `;


                            $('.show-popup-state').empty();
                            $('.show-popup-state').append(template);
                            $('.app-header__top-item-icon-cart-quantity').text(0)
                            localStorage.removeItem("carts");

                        }
                    })
                

            }
        }else {
            $([document.documentElement, document.body]).animate({
                    scrollTop: $(".scroll-to-here").offset().top
                }, 600);
        }
});


    /************************************************* */

$('#select-city').change(function() {
        if ($(this).val() == 'null') {
            $('#show-warge').empty();
            $('#show-warge').append(` <option value="null">Phường/ Xã</option>`);
            $('#district-show').empty();
            $('#district-show').append(`<option value="null"> Quận/ Huyện</option>`);
        } else {
            $('#show-warge').empty();
            $('#show-warge').append(` <option value="null">Phường/ Xã</option>`);
            $.ajax({
                    method: "POST",
                    url: "/api/address/get-district",
                    data: {
                        id: String($(this).val()),
                    }
                })
                .done(function(msg) {
                    msg = JSON.parse(msg);
                    $('#district-show').empty();
                    $('#district-show').append(`<option value="null"> Quận/ Huyện</option>`);
                    msg.map((value, key) => {
                        $('#district-show').append(`<option value=${value.maqh}>${value.name}</option>`);
                    })
                });
        }

    });
    $('#district-show').change(function() {
        $.ajax({
                method: "POST",
                url: "/api/address/get-ward",
                data: {
                    id: String($(this).val()),
                   
                }
            })
            .done(function(msg) {
                /*<select name="" id="show-warge">
                                              <option value="">Phường/ Xã</option>
                                           </select>*/
                msg = JSON.parse(msg);

                $('#show-warge').empty();
                $('#show-warge').append(` <option value="null">Phường/ Xã</option>`);
                msg.map((value, key) => {
                    $('#show-warge').append(`<option value=${value.xaid}>${value.name}</option>`);
                })
            });
    })

    $('#show-warge').change(function() {
        $.ajax({
                method: "POST",
                url: "/api/address/get-transport-fee",
                data: {
                    ward: String($(this).val()),
                    city : $('#select-city').val(),
                    district : $('#district-show').val()
                }
            })
            .done(function(msg) {
                msg = JSON.parse(msg);

                if(msg){
                    $('.transport-fee').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(msg.ship));
                    $('.transport-fee').attr('data-price', Number(msg.ship));
                    $('.total-price-checkout').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(Number($('.temp-total-price').attr('data-price')) + Number(msg.ship)));
                    $('.total-price-checkout').attr('data-price', Number($('.temp-total-price').attr('data-price')) + Number(msg.ship))
                }else {
                    $('transport-fee').attr('data-price', Number(0));
                    $('.transport-fee').text('Free ship');
                    $('.total-price-checkout').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(Number($('.temp-total-price').attr('data-price')) + 0));
                    $('.total-price-checkout').attr('data-price', Number($('.temp-total-price').attr('data-price')) +0)
                }
            });
    })
  $('.form-group-btns>button').click(function(){
     var inputCoupon = $('#coupon-input').val();
     if(inputCoupon == ''){
        $('.show-coupon-error').html(`<span class="" style="color : red">* Vui lòng nhập mã giảm giá</span>`);
     }else {
        $('.show-coupon-error').html(``);

            var today = new Date();
            let dd = today.getDate();

            let mm = today.getMonth()+1; 
            let yyyy = today.getFullYear();
            if(dd<10) {
                dd='0'+dd;
            } 

            if(mm<10) {
                mm='0'+mm;
            } 
            today = yyyy+'-'+mm+'-'+dd;

            $.ajax({
                method: "POST",
                url: "/api/check-coupon",
                data: {
                    code : inputCoupon,
                    date : today
                }
            })
            .done(function(msg) {
                msg = JSON.parse(msg);
                if(msg.status == 'success'){
                    codeCoupon = msg.data.code;
                    //alert(msg.data.discount_amount);
                    $('.title-coupon').text(msg.data.name);
                    let totalCurrentPrice = Number($('.total-price-checkout').attr('data-price'));
                    
                    if(msg.data.type == "0"){
                        $('.total-price-checkout').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalCurrentPrice * (msg.data.discount_amount)));
                        
                    }else {
                        $('.total-price-checkout').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalCurrentPrice -  Number(msg.data.discount_amount)));
                       
                    }
                }else {
                    $('.show-coupon-error').html(`<span class="" style="color : red">${msg.message}</span>`);
                }

                
            });

     }
  })
  /*************************************************************************** */
    var indexCartGlobal = false;
    function renderCarts(){
        
        $('.show-cart-list').empty();
        

        var arrCart = JSON.parse(localStorage.getItem("carts"));
        var totalProduct = 0;
        var totalPrice = 0;
        console.log(arrCart);
        if (arrCart == null || arrCart.length == 0) {
            arrCart = [];
            $('.app-cart__content').remove();
            $('.app-cart-top__title').after(` <div class="empty-cart-container">
                   <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png" alt="" class="">
                   <span class="">Không còn gì trong giỏ hàng !</span>
                   <a href="/" class=""><button class="">Quay về  trang chủ</button></a>
                 </div>`);
        }
        function renderDataListCouponProduct(list){
            
            if(!list){
              return ``;
            }else {
                let template = '<div class="app-cart__content-item-second-gift">';
                list.map((value, key) => {
                    template = template + `<div class="app-cart__content-item-second-gift-item">
                                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                                        <span class="">${value.coupon_name}</span>
                                        </div>`;
                })
                template  = template  + '</div>';
                return template;
            }
            return template;
        }
        function renderDataListAttributeProductPrice(list, listCurrent, unique){
            let template = '';
            function checkActive(id){
               for(var i = 0; i < listCurrent.length; i ++){
                    if(id == listCurrent[i].price_attribute_product){
                        return (`item-cart-same-active`);
                    }
                };
                return (``);
                
            }
            list.map((value, key) => {
                template = template + `<div data-attribute-product="${value.attribute_price_id}"  data-value="${value.value}" data-price="${(value.price - (value.price * value.price_sale))}" data-name="${value.type_name}-${unique}" class="list-cart-attribute-item ${value.type_name}-${unique} ${checkActive(value.attribute_price_id)}">
                                        <span class="list-cart-attribute-item-tab">${value.type_name}</span>
                                         ${value.value}
                                      </div> `;
            })
            return template;
        }
        function renderDataListColorProduct(list){
            var dirProduct = $('.get-dir').attr("data-dir-product");
            let template = '';
            list.map((value, key) => {
                template = template + `<div data-thumb="${value.thumb}" data-name="${value.value}" data-id="${value.attribute_prd_id}" data-price="${value.price - (value.price * value.price_sale)}" class="app-cart__content-item-second-color-detail-item handle-color-cart child">
                                               <img src="${dirProduct}${value.thumb}" alt="" class="">
                                               <span class="">${value.value}</span>
                                           </div>`;
            })
            return template;
        }
        arrCart.map((value, key) => {
            
            totalProduct = totalProduct + Number(value.quantity);
            totalPrice = totalPrice + (value.quantity * value.priceCurrent);
            $('.show-cart-list').append(`<div data-color-current='${String(JSON.stringify(value.colorCurrent))}' data-attribute-price-current='${String(JSON.stringify(value.attributePriceCurrent))}' data-id="${value.id}" data-string-price-attribute='${value.stringPriceAttribute}' class="app-cart__content-item">
                            <div class="app-cart__content-item-first ">
                                <img src="${value.thumb}" alt="" class="">
                                <span data-delete="" class="delete-cart">
                                <i class="fa fa-times-circle-o" aria-hidden="true"></i> Xóa</span>
                            </div>
                            <div class="app-cart__content-item-second ">
    
    
                                  <div class="app-cart__content-item-second-name">
                                       <a href="${value.urlProduct}" class=""><b class="">${value.name}</b></a>
                                  </div>
                                  <div class="list-cart-attribute">
                                     ${renderDataListAttributeProductPrice(value.dataListAttributeProductPrice, value.attributePriceCurrent, key)} 
                                  </div>
                    
                                  <div class="app-cart__content-item-second-title-promotion">
                                     <span class="">Khuyến mại: </span>
                                  </div>
    
                                  ${renderDataListCouponProduct(value.dataListCouponProduct)}
                                 
                                  <div class="app-cart__content-item-second-color">
                                    ${value.giftProduct ? `<span class="">Và ${value.giftProduct} sản phẩm quà tặng khác </span>`: ``}
                                      <span class="cart-show-color cay-the-nhi" data-price="${value.colorCurrent.price}" >Màu: ${value.colorCurrent.name} <i class="fa fa-caret-down" aria-hidden="true"></i>
                                      <div class="app-cart__content-item-second-color-detail parent">
                                           ${renderDataListColorProduct(value.dataListColorProduct)}
                                      </div>
                                   </span>
                                  </div>
    
    
                            </div>
                            <div class="app-cart__content-item-third">
                               <div class="app-cart__content-item-third-item">
                                   <span class="show-item-price__cart">${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.priceCurrent)}</span>
                                   <span class="">${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value.priceInitProduct)}</span>
                               </div>
                               <div class="app-cart__content-item-third-item">
                                   <button class="decrease">-</button>
                                   <input type="number" class="cart-input" value="${value.quantity}">
                                   <button class="increase">+</button>
                               </div>
                            </div>
                       </div>`);
        });
        codeCoupon = false;
        $('.app-cart__content-item-second-color-detail').removeAttr("style");
        $('.temp-price').text(`Tạm tính (${totalProduct}) sản phẩm`);
        $('.temp-total-price').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalPrice));
        //temp-total
        $('.temp-total-price').attr('data-price', totalPrice)
      //  $('.temp-total').text(arrCart.length);
        $('.title-coupon').text('Dùng mã giảm giá');
        $('#coupon-input').val("");
        $('.total-price-checkout').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalPrice + Number($('.transport-fee').attr('data-price'))));
        $('.app-header__top-item-icon-cart-quantity').text(totalProduct);
        $('.total-price-checkout').attr('data-price', totalPrice + Number($('.transport-fee').attr('data-price')));
    //    $('.app-cart__content-total-item-show').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(getTotalCartDetail(arrCart)));
    }
    renderCarts();
    
    function changeCartQuantity(quantity, dataColorCurrent, dataAttributePriceCurrent){
        if(quantity <= 0 || quantity >=6 ){
            renderCarts();
            return true;
        }
        var shopCart = JSON.parse(localStorage.getItem("carts"));
        var newArr = shopCart.map((value, key) => {
            if (String(JSON.stringify(value.attributePriceCurrent)) == dataAttributePriceCurrent && String(JSON.stringify(value.colorCurrent)) == dataColorCurrent) {
                return {
                    ...value,
                    quantity: quantity
                }
            } else {
                return (value);
            }
        });
        localStorage.setItem("carts", JSON.stringify(newArr));
        renderCarts();
    }
    $(document).on("click", ".delete-cart", function() {
        var dataItem = JSON.parse(localStorage.getItem("carts"));
        var index = $('.delete-cart').index(this);
        var dataColorCurrent = $('.app-cart__content-item').eq(index).attr('data-color-current');
        var dataAttributePriceCurrent = $('.app-cart__content-item').eq(index).attr('data-attribute-price-current');

        var arrDelete = dataItem.filter(
            (item) => {
                //console.log(String(JSON.stringify(item.attributePriceCurrent)), dataAttributePriceCurrent)
                //console.log(String(JSON.stringify(item.colorCurrent)) , dataColorCurrent)
                if(String(JSON.stringify(item.attributePriceCurrent)) == dataAttributePriceCurrent && String(JSON.stringify(item.colorCurrent)) == dataColorCurrent){
                    return false;
                }else {
                    return true;
                }
            }
        );

        localStorage.setItem("carts", JSON.stringify(arrDelete));
        renderCarts();
    });
    $(document).on("click", ".increase", function() {
        var index = ($('.increase').index(this));
        $('.cart-input').eq(Number(index)).val(Number($('.cart-input').eq(Number(index)).val()) + 1);

        let quantityChange = $('.cart-input').eq(Number(index)).val();
        let dataColorCurrent = $('.app-cart__content-item').eq(index).attr('data-color-current');
        let dataAttributePriceCurrent = $('.app-cart__content-item').eq(index).attr('data-attribute-price-current');

        changeCartQuantity(quantityChange, dataColorCurrent, dataAttributePriceCurrent );
    });
    $(document).on("click", ".decrease", function() {
        var index = ($('.decrease').index(this));
        $('.cart-input').eq(Number(index)).val(Number($('.cart-input').eq(Number(index)).val()) - 1);
        let quantityChange = $('.cart-input').eq(Number(index)).val();
        let dataColorCurrent = $('.app-cart__content-item').eq(index).attr('data-color-current');
        let dataAttributePriceCurrent = $('.app-cart__content-item').eq(index).attr('data-attribute-price-current');
        changeCartQuantity(quantityChange, dataColorCurrent, dataAttributePriceCurrent );
    });
    $(document).on("change", ".cart-input", function() {
        var index = ($('.cart-input').index(this));
      //  var product_id = ($('.app-cart__content-item').eq(index).attr("data-id"));
        var quantityChange = $('.cart-input').eq(Number(index)).val();
        let dataColorCurrent = $('.app-cart__content-item').eq(index).attr('data-color-current');
        let dataAttributePriceCurrent = $('.app-cart__content-item').eq(index).attr('data-attribute-price-current');
        changeCartQuantity(quantityChange, dataColorCurrent, dataAttributePriceCurrent );
    });

    function changeAttributePriceProduct(attributePriceCurrentNew, stringPriceAttribute, id, priceCurrentNew){
        //console.log(attributePriceCurrentNew, stringPriceAttribute, id, priceCurrentNew);
        function checkUnique(array, string, id){
            for(var i = 0; i < array.length; i ++){
                if(array[i].stringPriceAttribute == string && array[i].id == id){
                    return false;
                }
            }
            return true;
        }
        var arrCart = JSON.parse(localStorage.getItem("carts"));
        var newArr = arrCart.map((value, key) => {
                              if((value.id == id) && (value.stringPriceAttribute == stringPriceAttribute) && (checkUnique(arrCart,String(JSON.stringify(attributePriceCurrentNew)),id) == true)){
                                return {
                                  ...value,
                                  attributePriceCurrent : attributePriceCurrentNew,
                                  priceCurrent : priceCurrentNew,
                                  stringPriceAttribute : String(JSON.stringify(attributePriceCurrentNew))
                                }
                                
                                
                              }else {
                                  return (value);
                              }
                        });
       localStorage.setItem("carts", JSON.stringify(newArr));
        //console.log(arrCart);
        renderCarts();
    }
    function changeColorProduct(colorCurrentNew, id, stringPriceAttribute, priceCurrentNew, newThumb,attributePriceCurrentNew, dataListAttributeProductPriceNew, next){
      var arrCart = JSON.parse(localStorage.getItem("carts"));
      function checkUniqueColor(array, string, id , stringPriceCurrentNewColor, next){
        for(var i = 0; i < array.length; i ++){
                if(  String(JSON.stringify(array[i].attributePriceCurrent)) == String(JSON.stringify(next)) && array[i].id == id && String(JSON.stringify(array[i].colorCurrent)) == stringPriceCurrentNewColor ){
                    return false;
                }
            }
        return true;
      }
      //&& (checkUniqueColor(arrCart, stringPriceAttribute, id, String(JSON.stringify(colorCurrentNew))) == true) 
      var newArr = arrCart.map((value, key) => {
        if((value.id == id) && (value.stringPriceAttribute == stringPriceAttribute) && (checkUniqueColor(arrCart, stringPriceAttribute, id, String(JSON.stringify(colorCurrentNew)), next) == true) ){
                                return {
                                  ...value,
                                  priceCurrent : priceCurrentNew,
                                  colorCurrent : colorCurrentNew,
                                  thumb : newThumb,
                                  id : Number(colorCurrentNew.id),
                                  attributePriceCurrent : attributePriceCurrentNew,
                                  dataListAttributeProductPrice : dataListAttributeProductPriceNew
                                }
                              }else {
                                  return (value);
                              }
                        });
        localStorage.setItem("carts", JSON.stringify(newArr));
        //console.log(arrCart);
        renderCarts();
     // console.log(colorCurrentNew, id, stringPriceAttribute, priceCurrentNew);
       
    }
    $(document).on("click", ".cart-show-color", function() {
        
       // console.log('run')
        var dirProduct = $('.get-dir').attr("data-dir-product");
        var index = ($('.cart-show-color').index(this));
        indexCartGlobal = index;
        $('.cay-the-nhi').removeClass('cart-show-color')
        $('.app-cart__content-item-second-color-detail').eq(Number(index)).slideToggle(200);
        

    });
    $(document).on("click", ".list-cart-attribute-item", function() {
      var attributeArrCart = [];
      var arrCart = JSON.parse(localStorage.getItem("carts"));
      var totalPriceAttribute = 0;
      var nameClass = $(this).attr('data-name');
      var indexItem = Number(nameClass[nameClass.length - 1]);
      $('.' + nameClass).removeClass('item-cart-same-active');
      $(this).addClass('item-cart-same-active');

      $('.list-cart-attribute').eq(indexItem).children('.item-cart-same-active').map((index, value) => {
        totalPriceAttribute = totalPriceAttribute + Number($(value).attr("data-price")) ;
        let objectArr = {
            name : $(value).attr('data-name').slice(0, -2),
            value :  $(value).attr('data-value'),
            price_attribute_product :  $(value).attr("data-attribute-product"),
        }
        attributeArrCart.push(objectArr);
      })
      
    
   changeAttributePriceProduct(attributeArrCart, $('.app-cart__content-item').eq(indexItem).attr('data-string-price-attribute'), Number($('.app-cart__content-item').eq(indexItem).attr('data-id')), (arrCart[indexItem].colorCurrent.price + totalPriceAttribute));
    
});
  $(document).on("click", ".handle-color-cart", function() {
    var arrCart = JSON.parse(localStorage.getItem("carts"));
    let name = $(this).attr("data-name");
    let price = $(this).attr("data-price");
    let id = $(this).attr("data-id");
    let thumb =  $(this).attr("data-thumb");
    var dirProduct = $('.get-dir').attr("data-dir-product");
    var object = {
        name : name,
        id : id,
        price : Number(price) + arrCart[indexCartGlobal].priceSaleInitProduct,
        
    }
    var totalPriceAttribute = 0;
    function renderDataListAttributeProductPriceNext(list, listCurrent, unique){
            let template = '';
            function checkActive(id){
               for(var i = 0; i < listCurrent.length; i ++){
                    if(id == listCurrent[i].price_attribute_product){
                        return (`item-cart-same-active`);
                    }
                };
                return (``);
                
            }
            list.map((value, key) => {
                template = template + `<div data-attribute-product="${value.attribute_price_id}"  data-value="${value.value}" data-price="${(value.price - (value.price * value.price_sale))}" data-name="${value.type_name}-${unique}" class="list-cart-attribute-item ${value.type_name}-${unique} ${checkActive(value.attribute_price_id)}">
                                        <span class="list-cart-attribute-item-tab">${value.type_name}</span>
                                         ${value.value}
                                      </div> `;
            })
            return template;
        }
   // alert(object.id);
   $.ajax({
    method: "POST",
    url: "api/get-attribute-price-product",
    data: {
        id : object.id
    }
 })
                        .done(function(msg) {
                         var arr = [];
                           msg = JSON.parse(msg);
                           arrCart[indexCartGlobal].attributePriceCurrent.map((value, key) => {
                              for(var i = 0; i < msg.length; i++){
                                if(value.name == msg[i].type_name  && value.value == msg[i].value){
                                    arr.push({name : msg[i].type_name, value : msg[i].value, price_attribute_product :  msg[i].attribute_price_id})
                                }
                              }
                           });
                           $('.list-cart-attribute').eq(indexCartGlobal).empty();
                           $('.list-cart-attribute').eq(indexCartGlobal).append( renderDataListAttributeProductPriceNext(msg, arr, indexCartGlobal));
                          
                            $('.list-cart-attribute').eq(indexCartGlobal).children('.item-cart-same-active').map((index, value) => {
                                totalPriceAttribute = totalPriceAttribute + Number($(value).attr("data-price")) ;
                            })
                            
                            console.log( totalPriceAttribute);
                            $('.cart-show-color').remove();
                           changeColorProduct(object, arrCart[indexCartGlobal].id, arrCart[indexCartGlobal].stringPriceAttribute, totalPriceAttribute + object.price, (dirProduct+thumb), arr, msg, arr);
                           //console.log(arr);
                        });
                    
    
  });
  
  </script>
    <?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>