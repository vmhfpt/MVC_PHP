<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>

<style>
    .app-installment__content {
        width : 700px;
    }
    .app-installment__first-block {
        padding : 20px;
        display : flex;
        justify-content: space-between;
    }
    .app-installment__first-block-left {
        display : flex;
        gap : 15px;
    }
    .app-installment__first-block-left-detail {
        display : flex;
        flex-direction: column;
        font-size: 15px;
        gap : 3px;
    }
    .app-installment__first-block-left-detail>span{
       color: #20863D;
    }
    .app-installment__first-block-left img {
        width : 140px;
    }
    .app-installment__first-block-right {
        display : flex;
        flex-direction: column;
        font-size: 15px;
    }
    .app-installment__first-block-right span:first-child {
        color: #FF6700;
    }
    .app-installment__second-block {
        font-size: 15px;
        padding : 15px 20px;
        border-top : 1px solid #eeeeee;
        border-bottom:  1px solid #333;
        display : flex;
        justify-content: space-between;
    }
    .app-installment__second-block span:last-child {
        color : #FF6700;
    }
    .app-installment__third-block {
        font-size: 15px;
        padding : 15px 20px;
    }
    .app-installment__fourth-block {
        background: #F8F8F8 ;
        width : 48%;
        display : flex;
        gap : 10px;
        padding : 10px 15px;
        margin : 0px 20px;
        border-top : 3px solid #FF6700;
    }
    .app-installment__fourth-block-left i {
        color :#FF6700;
        font-size: 30px;
    }
    .app-installment__fourth-block-left {
        margin : auto 1px;
        
    }
    .app-installment__fourth-block-right {
        display : flex;
        flex-direction: column;
        line-height: 18px;
    }
    .app-installment__fourth-block-right span:first-child {
        font-size: 16px;
    }
    .app-installment__fourth-block-right span:last-child {
        font-size: 12px;
    }
    .app-installment__fiveth-block {
        margin : 15px 20px;
        display : flex;
        flex-direction: column;
        gap : 8px;
        font-size: 14.7px;
    }
    .app-installment__fiveth-block span:first-child b{
      color :#FF6700;
    }
    .app-installment__sixth-block {
        display : flex;
        gap : 10px;
        margin : 0px 20px 20px 20px;
    }
    .app-installment__sixth-block button {
        border : 1px solid #eeeeee;
        background : none;
        font-size: 14px;
        font-weight: 600;
        padding : 10px 20px;
        border-radius: 3px;
        cursor: pointer;
    }

  .app-installment__seventh-block  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.app-installment__seventh-block td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 9px;
  font-size: 15px;
 
}

.app-installment__seventh-block tr:nth-child(odd) {
  background-color: #F1F1F1;
  
}
.app-installment__seventh-block {
    margin : 0px 20px;
}
.app-installment__seventh-block-title-table img {
    width : 140px;
}
.app-installment__seventh-block-select {
    display : flex;
    gap: 10px;
    align-items: center;
}
.app-installment__seventh-block-select select {
    padding : 8px;
    font-size: 15px;
    font-weight: 700;
    color :#FF6700;
    border : 1px solid #FF6700
}
.app-installment__seventh-block-select-checkbox {
    display : flex;
    align-items: center;
    gap : 5px;
}
.app-installment__seventh-block-button {
    cursor: pointer;
    display : flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color : white;
    line-height: 17px;
    border-radius: 3px;
    padding : 8px 0px;
   background: -webkit-linear-gradient(left, #FF6700, #F9920F);
}
.app-installment__seventh-block-buttons {
    margin-top : 20px;
    cursor: pointer;
    display : flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color : white;
    line-height: 17px;
    border-radius: 3px;
    padding : 8px 0px;
   background: -webkit-linear-gradient(left, #FF6700, #F9920F);
}
.app-installment-tr-warning {
    background: #fff4de !important;
}
.app-installment__sixth-block-btn-active {
    border : 1px solid #FF6700 !important;
}
.text-emphasize-installment{
    color :#FF6700;
    font-weight: 700 !important;
}
.app-installment__eighth-block-top-title {
    display : flex;
    justify-content: space-between;
}
.app-installment__eighth-block {
    margin : 0px 20px 20px 20px;
    padding : 20px 25px 20px 25px;
    background: rgba(255, 117, 133, 0.1294117647);
}
.app-installment__eighth-block-top-title {
    font-size: 15px;
}
.app-installment__eighth-block-top-title-color {
    color :#FF6700;
    cursor: pointer;
}
.app-installment__eighth-block-top-item {
    display : flex;
    font-size: 15px;
    margin : 5px 20px 5px 0px;
    justify-content: space-between;
}  
.app-installment__eighth-block-top-item span:last-child {
    font-weight: 700;
}
.app-installment__eighth-block-bottom {
    display : flex;
    flex-direction: column;
    font-size: 15px;
    border-top : 1px solid #333;
    padding-top : 10px;
}
.app-installment__eighth-block-bottom i {
    color:#FF6700;
}
.form-group-select-installment {
    padding : 10px;
    border : 1px solid #eeeeee !important;
}
.app-installment__first-block-right-init{
    text-decoration: line-through;
}
.installment-last_block-title {
    color : #198754;
}
.installment-last_block-list li{
  list-style: none;
  padding : 3px 0px;
}
</style>


<div class="show-popup-state"></div>
<div class="app-cart container-fluid">
        <div class="container app-cart-container__center">
            <div class="app-cart-container " style="width : 850px !important;">
                <div class="app-cart-top__title">
                    <span class=""><i class="fa fa-angle-left" aria-hidden="true"></i> Mua thêm sản phẩm khác</span>
                    <span  class="get-dir"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Đăng nhập</span>
               </div>

                <div  class="app-cart__content">
                    <div class="app-installment__first-block">
                         <div class="app-installment__first-block-left">
                            <div class="">
                                <img src="<?=IMAGE_DIR_PRODUCT.$item['thumb']?>" alt="" class="">
                            </div>
                            <div class="app-installment__first-block-left-detail">
                               <a href="" class=""><span class="app-installment__first-block-left-detail-get-name"><?=$item['product_name']?></span></a>
                               <span class="">Màu: <?=$item['value']?> </span>
                            </div>
                         </div>
                         <div class="app-installment__first-block-right">
                             <span data-price="<?=($price)?>" class="app-installment__first-block-right-get-price"><?=currency_format($price)?></span>
                             <span class="app-installment__first-block-right-init"><?=currency_format($item['price_inits'])?></span>
                         </div>
                    </div>
                    <div class="app-installment__second-block">
                        <span class="">Tổng tiền :</span>
                        <span data-total="<?=($price)?>" class="app-installment__second-block-total"><?=currency_format($price)?> </span>
                    </div>
                    <div class="app-installment__third-block">
                        <span class="">Chọn phương thức trả góp phù hợp : </span>
                    </div>
                    <div class="app-installment__fourth-block">
                        <div class="app-installment__fourth-block-left">
                           <i class="fa fa-university" aria-hidden="true"></i>
                        </div>
                        <div class="app-installment__fourth-block-right">
                             <span class="">CÔNG TY TÀI CHÍNH</span>
                             <span class="">Xét duyệt qua điện thoại</span>
                        </div>
                    </div>
                    <div class="app-installment__fiveth-block">
                        <span>Các kỳ hạn có gói <b>Trả góp 0% - 1%</b>: 3 tháng, 6 tháng, 8 tháng, 9 tháng, 12 tháng</span>
                        <span><b>Chọn số tháng trả góp</b></span>
                    </div>
                    <div class="detail-select-installment" >
                    <div class="app-installment__sixth-block">
                        <button data-month="3" class="app-installment__sixth-block-btn app-installment__sixth-block-btn-active"> 3 tháng </button>
                        <button data-month="6" class="app-installment__sixth-block-btn" > 6 tháng </button>
                        <button data-month="8" class="app-installment__sixth-block-btn"> 8 tháng </button>
                        <button data-month="9" class="app-installment__sixth-block-btn"> 9 tháng </button>
                        <button data-month="12" class="app-installment__sixth-block-btn"> 12 tháng </button>
                    </div>

                    <div class="app-installment__seventh-block">
                    <table>
                    <tr class="app-installment__seventh-block-title-table" >
                        <th>Công ty</th>
                        <th><img src="https://didongthongminh.vn/images/credit/original/homecredit_1644633754.svg" alt="" class=""></th>
                        <th><img src="https://didongthongminh.vn/images/credit/original/fe_1644892719.svg" alt="" class=""></th>
                    </tr>
                    <tr>
                        <td>Giá sản phẩm</td>
                        <td>6.490.000d</td>
                        <td>6.490.000d</td>
                    </tr>
                    <tr>
                        <td>Giá mua trả góp</td>
                        <td>6.490.000d</td>
                        <td>6.490.000d</td>
                    </tr>
                    <tr>
                        <td class="app-installment__seventh-block-select">
                            <span>Trả trước</span> 
                            <select name="" id="percent" class="">
                                <option value="0" class="" >0%</option>
                                <option value="10" class="">10%</option>
                                <option value="20" class="">20%</option>
                                <option value="30" class="" selected>30%</option>
                                <option value="40" class="">40%</option>
                                <option value="50" class="" >50%</option>
                                <option value="60" class="" >60%</option>
                                <option value="70" class="">70%</option>
                                <option value="80" class="">80%</option>
                            </select> 
                       </td>
                        <td>6.490.000d</td>
                        <td>6.490.000d</td>
                    </tr>
                    <tr>
                        <td>Lãi suất thực / phẳng</td>
                        <td>2.8%</td>
                        <td>3.55%</td>
                    </tr>
                    <tr>
                        <td>Giấy tờ cần có</td>
                        <td>CMND + Bằng lái xe / hộ khẩu</td>
                        <td>CMND + Bằng lái xe / hộ khẩu</td>
                    </tr>
                    <tr>
                        <td>Góp mỗi tháng</td>
                        <td>6.490.000d</td>
                        <td>6.490.000d</td>
                    </tr>
                    <tr class="app-installment-tr-warning">
                        <td>Gốc + lãi</td>
                        <td>6.490.000d</td>
                        <td>6.490.000d</td>
                    </tr>
                    <tr class="app-installment-tr-warning">
                        <td>Phí thu hộ</td>
                        <td>6.490d/tháng</td>
                        <td>6.490d/tháng</td>
                    </tr>
                    <tr class="app-installment-tr-warning">
                        <td class="app-installment__seventh-block-select-checkbox" ><span>Bảo hiểm</span> <input id="insurance-check" type="checkbox" class="" checked></td>
                        <td>6.490d/tháng</td>
                        <td>6.490d/tháng</td>
                    </tr>
                    <tr>
                        <td>Tổng tiền phải trả</td>
                        <td class="text-emphasize-installment">6.490.000d</td>
                        <td class="text-emphasize-installment">6.490.000d</td>
                    </tr>
                    <tr>
                        <td>Chênh lệch với mua trả thẳng</td>
                        <td>6.490.000d</td>
                        <td>6.490.000d</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <div class="app-installment__seventh-block-button" data-value="2.8" >
                                <span class="">ĐẶT MUA</span>
                                <span class="">Xét duyệt online</span>
                            </div>
                        </td>
                        <td>
                            <div class="app-installment__seventh-block-button" data-value="3.55">
                            <span class="">ĐẶT MUA</span>
                                <span class="">Xét duyệt tại cửa hàng</span>
                            </div>
                        </td>
                    </tr>
                   
                    </table>
                    </div>
                    </div>


                    <div class="detail-form-installment" style="display : none">
                        <div class="app-installment__eighth-block">
                           
                        </div>

                        <div class="" >
                        <div class="app-cart__content-form">
                        <form action="" class="scroll-to-here">


                            <div class="app-cart__content-form-gender">
                                <div class="app-cart__content-form-gende-item">
                                    <input type="radio" name="gender" class="" >
                                    <label for="" class="">Anh</label>
                                </div>

                                <div class="app-cart__content-form-gende-item">
                                    <input type="radio" name="gender" class="">
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

                                                <input placeholder="Họ và tên" type="text" class="installment-input-name">
                                                <span style="margin-top : 4px;color : red; font-size : 12px" class="error-name">* Bắt buộc nhập</span>
                                            </div>
                                        </div>

                                    <?php

                                    }else {
                                    ?>
                                             <input placeholder="Họ và tên" type="hidden" class="installment-input-name" value="<?=$_SESSION['user']['name']?>">
                                    <?php }?>

                                    <div class="<?= !isset($_SESSION['user']) ? "col-sm-6" : "col-sm-12" ?>">
                                        <div class="form-group">

                                            <input placeholder="Số điện thoại" type="number" class="installment-input-phone">
                                            <span style="margin-top : 4px;color : red; font-size : 12px" class="error-phone-number">* Bắt buộc nhập</span>
                                        </div>
                                    </div>

                                    <?php
                                    if (!isset($_SESSION['user'])) {

                                    ?>
                                        <div class="col-sm-6">
                                            <div class="form-group">

                                                <input placeholder="Email" type="email" class="installment-input-email">
                                                <span style="margin-top : 4px;color : red; font-size : 12px" class="error-email">* Bắt buộc nhập</span>
                                            </div>
                                        </div>

                                    <?php

                                    } else {
                                    ?>
                                        <input placeholder="Email" type="hidden" class="installment-input-email" value="<?=$_SESSION['user']['email']?>">
                                    <?php }?>
                                    <div class="col-sm-6">
                                            <div class="form-group">

                                                <input  type="date" class="installment-input-date" placeholder="Ngày sinh">
                                                <span style="margin-top : 4px;color : red; font-size : 12px" class="error-email">* Bắt buộc nhập</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">

                                                <input placeholder="Nhập số CMND/CCCD" type="number" class="installment-input-identify">
                                                <span style="margin-top : 4px;color : red; font-size : 12px" class="error-email">* Bắt buộc nhập</span>
                                            </div>
                                        </div>
                                        <div class="<?= !isset($_SESSION['user']) ? "col-sm-6" : "col-sm-12" ?>">
                                            <div class="form-group">

                                                <input placeholder="Nhập địa chỉ hộ khẩu" type="text" class="installment-input-address-user">
                                                <span style="margin-top : 4px;color : red; font-size : 12px" class="error-email">* Bắt buộc nhập</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">

                                                <select name="" id="" class="form-group-select-installment installment-input-address-shop">
                                                    <option value="" class="">Vui lòng chọn cửa hàng</option>
                                                    <option value="12 Hai Bà Trưng, Đống Đa, Hà Nội" class="">12 Hai Bà Trưng, Đống Đa, Hà Nội</option>
                                                </select>
                                                <span style="margin-top : 4px;color : red; font-size : 12px" class="error-email">* Bắt buộc nhập</span>
                                            </div>
                                        </div>

                                </div>

                            </div>
                            <div class="">
                            <div class="app-cart__content-form-button-submit">

                              <button type="button" class="app-cart__content-form-button-submit-btn">Tiếp tục trả góp</button>
                            </div>
                            </div> 
                               



                         </form>
                         </div>
                        </div>
                    </div>

                </div>

                <div class="app-cart-last" style="width : 850px !important ; text-align : center; " ><span class="">Bằng cách đặt hàng, bạn đồng ý với Điều khoản sử dụng của Didongthongminh</span></div>
            </div>
        </div>
    </div>
    <script>
        var interestRate;
        var percentInstallment = $('#percent').val();
        var insuranceInstallment = $('#insurance-check').is(':checked');
        var totalInstallment = $('.app-installment__second-block-total').attr('data-total');
        var monthInstallment = $('.app-installment__sixth-block-btn-active').attr('data-month');
        function loadInstallment(percent, insurance, total, month){
            $.ajax({
                    method: "POST",
                    url: "/installment-handle",
                    data: {
                        percent,
                        insurance,
                        total,
                        month
                    }
                })
                .done(function(msg) {
                    $('.app-installment__seventh-block').empty();
                    $('.app-installment__seventh-block').html(msg);
                    // msg = JSON.parse(msg);
                    // $('#district-show').empty();
                    // $('#district-show').append(`<option value="null"> Quận/ Huyện</option>`);
                    // msg.map((value, key) => {
                    //     $('#district-show').append(`<option value=${value.maqh}>${value.name}</option>`);
                    // })
                });
        }
        $(document).on("click", ".app-installment__seventh-block-button", function(){
            interestRate = $(this).attr('data-value');
            
            let template = ` <div class="app-installment__eighth-block-top">
                                <div class="app-installment__eighth-block-top-title">
                                    <div class=""><b class="">Thông tin trả góp</b></div>
                                    <div class="app-installment__eighth-block-top-title-color">
                                       <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                       <span class="">Chọn lại</span>
                                    </div>
                                </div>
                                <div class="app-installment__eighth-block-top-item">
                                    <span>Gói trả góp:</span>
                                    <span>Lãi suất ${interestRate}%</span>
                                </div>
                                <div class="app-installment__eighth-block-top-item">
                                    <span>Trả trước (${percentInstallment}%):</span>
                                    <span>${$('#app-installment__seventh-block-title-table-getprice').text()}</span>
                                </div>
                                <div class="app-installment__eighth-block-top-item">
                                    <span>Góp mỗi tháng (trong ${monthInstallment} tháng):</span>
                                    <span class="app-installment__eighth-block-top-item-get-price" >${interestRate == '2.8' ? $('#havepayforhomecredit').text() : $('#havepayforfecredit').text() }</span>
                                </div>
                                <div class="app-installment__eighth-block-top-item"  >
                                    <b class="">TỔNG TIỀN</b>
                                    <span id="app-installment__eighth-block-top-item-get-total">${interestRate == '2.8' ? $('.text-emphasize-installment').eq(0).text(): $('.text-emphasize-installment').eq(1).text() }</span>
                                </div>
                            </div>
                            <div class="app-installment__eighth-block-bottom">
                                <span class="">Giấy tờ cần có: <b>CMND + Bằng lái xe / hộ khẩu </b></span>
                                <span class="">Công ty tài chính: <b>${interestRate == '2.8' ? 'Home credit' : 'FE credit' }</b></span>
                                <i>- Sau khi hồ sơ được duyệt, khách hàng mang theo CMND, GPLX / Hộ khẩu đến cửa hàng để ký hợp đồng và nhận sản phẩm.</i>
                            </div>`;
                            $('.app-installment__eighth-block').html(template);

          $('.detail-select-installment').hide();
          $('.detail-form-installment').show();
          $([document.documentElement, document.body]).animate({
                        scrollTop: $(".app-installment__fiveth-block").offset().top
                    }, 600);
        });
        $(document).on("click", ".app-installment__eighth-block-top-title-color", function(){
          $('.detail-select-installment').show();
          $('.detail-form-installment').hide();
          $([document.documentElement, document.body]).animate({
                        scrollTop: $(".app-installment__fiveth-block").offset().top
                    }, 600);
        });
        
        //console.log(percent, insurance, total, month);
        loadInstallment(percentInstallment, insuranceInstallment, totalInstallment, monthInstallment);
        //app-installment__sixth-block-btn
        $(document).on("click", ".app-installment__sixth-block-btn", function(){
            monthInstallment = ($(this).attr('data-month'));
            $('.app-installment__sixth-block-btn').removeClass('app-installment__sixth-block-btn-active');
            $(this).addClass('app-installment__sixth-block-btn-active');
            loadInstallment(percentInstallment, insuranceInstallment, totalInstallment, monthInstallment);
        });
        $(document).on("change", "#percent", function(){
            percentInstallment = ($(this).val());
            loadInstallment(percentInstallment, insuranceInstallment, totalInstallment, monthInstallment);
        });
        $(document).on("change", "#insurance-check", function(){
            insuranceInstallment = $('#insurance-check').is(':checked');
            //console.log(insuranceInstallment);
            loadInstallment(percentInstallment, insuranceInstallment, totalInstallment, monthInstallment);
        });
        $(document).on("click", ".app-cart__content-form-button-submit-btn", function(){ 
            // return true;
            
            let nameUser = $('.installment-input-name').val();
            let phoneNumber = $('.installment-input-phone').val();
            let email = $('.installment-input-email').val();
            let identifyID = $('.installment-input-identify').val();
            let addressUser = $('.installment-input-address-user').val();
            let addressShop = $('.installment-input-address-shop').val();
            let dateBirth = $('.installment-input-date').val();

            const url = new URL(window.location.href);
            const params = new URLSearchParams(url.search);




            let productId = params.get('product_id'); 
            let nameProduct = $('.app-installment__first-block-left-detail-get-name').text();
            let priceInit = $('.app-installment__first-block-right-get-price').attr('data-price');
            let interestRates = interestRate;
            let prepay = $('#app-installment__seventh-block-title-table-getprice').text();
            let priceTotal = $('#app-installment__eighth-block-top-item-get-total').text();
            let month = monthInstallment;
            let payEachMonth = $('.app-installment__eighth-block-top-item-get-price').text();
            //console.log(nameProduct, priceInit, interestRates, prepay, priceTotal, month,payEachMonth);

            $.ajax({
                    method: "POST",
                    url: "/installment-add",
                    data: {
                        nameUser,
                        phoneNumber,
                        email,
                        identifyID,
                        addressUser,
                        addressShop,
                        dateBirth,

                        productId,
                        nameProduct,
                        priceInit,
                        interestRates,
                        prepay,
                        priceTotal,
                        month,
                        payEachMonth
                    }
                })
                .done(function(msg) {
                    $('.scroll-to-here').empty();
                     msg = JSON.parse(msg);
    
                     let template = ` <div class="installment-last_block">
                                    <h2 class="installment-last_block-title">Đăng ký thủ tục thành công</h2>
                                    <ul class="installment-last_block-list">
                                        <li class=""><b> Mã hồ sơ: </b> ${msg.code}</li>
                                        <li class=""><b> Họ và tên: </b> ${msg.nameUser}</li>
                                        <li class=""><b> Ngày sinh: </b> ${msg.dateBirth}</li>
                                        <li class=""><b> CMND/CCCD: </b> ${msg.identifyId}</li>
                                        <li class=""><b> Địa chỉ: </b> ${msg.addressUser}</li>
                                        <li class=""><b> Số điện thoại: </b> ${msg.phoneNumber}</li>
                                        <li class=""><b> Email: </b> ${msg.email}</li>
                                        <li class=""><b> Ngày đăng ký: </b> ${msg.dateCurrently}</li>
                                        <li class=""><b> Trạng thái: </b> Chưa nộp hồ sơ tại cửa hàng</li>
                                        <li class=""><b> Địa chỉ nộp hồ sơ: </b> ${msg.addressShop}</li>
                                        <li class=""><a href="/index.html" class=""><div class="app-installment__seventh-block-buttons" >
                                            <span class="">Quay về trang chủ</span>
                                            
                                        </div></a></li>
                                    </ul>
                                </div>`;
                                $('.scroll-to-here').html(template);
                                $([document.documentElement, document.body]).animate({
                                    scrollTop: $(".scroll-to-here").offset().top
                                }, 600);
                });
        });
        //app-cart__content-form-button-submit-btn
    </script>

    <?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>