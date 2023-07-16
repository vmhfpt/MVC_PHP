<?php $this->loadView('post/Layout/header') ?>
<?php $this->loadView('post/Layout/nav') ?>

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
                            <span class="">Liên hệ</span>
                       </div>
                       <div class="app-cart__content-total-item">
                        <span class="">Mã giảm giá:</span>
                        <span class="">0đ</span>
                   </div>
                    </div>

                    <div class="app-cart__content-form">
                         <form action="" class="">
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
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                           
                                            <input placeholder="Họ và tên" type="text" class="">
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            
                                            <input placeholder="Số điện thoại" type="number" class="">
                                       </div>
                                    </div>
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
                           <div class="app-cart__content-form-address">
                               <span class="">Chọn địa chỉ để biết thời gian và phí vận chuyển (nếu có)</span>
                               <div class="row">
                                  <div class="col-sm-6">
                                     <div class="form-group">
                                          <div class="form-group-option">
                                            <select name="" id="">
                                                <option value="">Tỉnh/ Thành phố</option>
                                             </select>
                                          </div>
                                     </div>
                                  </div>
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group-option">
                                          <select name="" id="">
                                              <option value="">Quận/ Huyện</option>
                                           </select>
                                        </div>
                                   </div>
                                  </div>
                                  <div class="col-lg-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="form-group-option">
                                          <select name="" id="">
                                              <option value="">Phường/ Xã</option>
                                           </select>
                                        </div>
                                   </div>
                                  </div>
                                  <div class="col-lg-6 col-sm-12">
                                      <div class="form-group">
                                          <input type="text" class="" placeholder="Số nhà, tên đường">
                                      </div>
                                  </div>
                               </div>
                           </div>

                           <div class="">
                               <div class="form-group">
                                  <input type="text" class="" placeholder="Yêu cầu khác (không bắt buộc)">
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
                                     <span class="">Dùng mã giảm giá</span>
                                     <i class="fa fa-caret-down" aria-hidden="true"></i>
                                </div>

                                <div class="app-cart__content-form-button-coupon-add">
                                     <div class="row">
                                         <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                                             <div class="form-group">
                                                 <input type="text" name="" id="" placeholder="Nhập mã giảm giá">
                                             </div>
                                         </div>

                                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 ">
                                             <div class="form-group-btns">
                                                 <button class="">Áp dụng</button>
                                             </div>
                                         </div>
                                     </div>
                                </div>
                           </div>

                           <div class="app-cart__content-form-total-cost">
                              <span class="">Tổng tiền:</span>
                              <span class="">37.880.000đ</span>
                           </div>

                           <div class="app-cart__content-form-button-submit">
                            <button class="">Đặt hàng</button>
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
                   <a href="../trang-chinh" class=""><button class="">Quay về  trang chủ</button></a>
                 </div>`);
        }
        function renderDataListCouponProduct(list){
            if(list.length == 0){
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
            totalProduct = totalProduct + value.quantity;
            totalPrice = totalPrice + (value.quantity * value.priceCurrent);
            $('.show-cart-list').append(`<div data-id="${value.id}" data-string-price-attribute='${value.stringPriceAttribute}' class="app-cart__content-item">
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
        $('.app-cart__content-item-second-color-detail').removeAttr("style");
        $('.temp-price').text(`Tạm tính (${totalProduct}) sản phẩm`);
        $('.temp-total-price').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalPrice));
        //temp-total
      //  $('.temp-total').text(arrCart.length);
    //    $('.app-cart__content-total-item-show').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(getTotalCartDetail(arrCart)));
    
    }
    renderCarts();
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
    $('.list-cart-attribute').eq(indexCartGlobal).children('.item-cart-same-active').map((index, value) => {
        totalPriceAttribute = totalPriceAttribute + Number($(value).attr("data-price")) ;
    })
    $('.cart-show-color').remove();
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
                           changeColorProduct(object, arrCart[indexCartGlobal].id, arrCart[indexCartGlobal].stringPriceAttribute, totalPriceAttribute + object.price, (dirProduct+thumb), arr, msg, arr);
                           //console.log(arr);
                        });
                    
    
  });
  
  </script>
    <?php $this->loadView('post/Layout/top') ?>
<?php $this->loadView('post/Layout/footer') ?>