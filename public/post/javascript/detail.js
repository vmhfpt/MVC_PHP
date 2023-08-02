

$(document).on("click", ".app-detail-top__center-filter-attribute-item", function() {
   var nameClass = $(this).attr('data-name');
   $('.' + nameClass).removeClass('item_same-active-attribute');
   $(this).addClass('item_same-active-attribute');
   var totalPriceAttribute = 0;
   $('.item_same-active-attribute').map((index,value) => {
       totalPriceAttribute = totalPriceAttribute + Number($(value).attr("data-price")) ;
    });
    $('#show-price-product').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(totalPriceAttribute + Number($('.item_same-active').attr('data-price'))));
});




                  var owls = $(".app-detail-top__content-carousel-bottom-detail");
var owl = $(".app-detail-top__content-carousel-top-detail");

owl.owlCarousel({
    //onDragged: callback,
    onChanged: callback,
    items: 1,
    margin: 11,
    autoplay: false,
    center: true,
    loop: true,
    dots: false,
    nav: true,
    autoplayTimeout: 5000,

});



owls.owlCarousel({
    items: 1,
    margin: 11,
    autoplay: false,

    loop: false,
    dots: false,
    nav: false,
    autoplayTimeout: 5000,

    responsive: {
        0: {
            items: 6,
        },
        600: {
            items: 6,
        },

        800: {
            items: 6,
        },
        1000: {
            items: 6,
        },
        1200: {
            items: 6,
        },
    },
});
              $(document).on("click", ".click-show-slide", function() {
                $(
                    ".app-detail-top__content-carousel-bottom-detail .owl-item"
                ).removeClass("carousel-active-border");
                $(this).addClass("carousel-active-border");

                let point = $(this).attr("data-slide");

                $(".app-detail-top__content-carousel-top-detail").trigger("to.owl.carousel", Number(point) - 1, [300]);
            });

        function callback(event) {
            // var item     = event.item.index;
   
            let current =
                event.item.index + 1 - event.relatedTarget._clones.length / 2;
            let itemsCount = event.item.count;

            if (current > itemsCount) {
                current = 1;
            }

            if (current === 0) {
                current = event.item.count;
            }
            $(".app-detail-top__content-carousel-bottom-detail").trigger("to.owl.carousel", current - 1, [300]);
            $('.app-detail-top__content-carousel-bottom-detail .owl-item').removeClass('carousel-active-border');
            var selectors = $('.click-show-slide');
            selectors.eq(current - 1).addClass('carousel-active-border');
        }
        $(window).on('popstate', function(event) {
            if (location.href.search('slide=true') >= 0) {

                $('.app-click-show__library').addClass('position-carousel');
                $(".app-detail-top__content-carousel-top-detail").trigger("refresh.owl.carousel", [300]);
                $(".app-detail-top__content-carousel-bottom-detail").trigger("refresh.owl.carousel", [300]);
            } else {
                $('.app-click-show__library').removeClass('position-carousel');
                $(".app-detail-top__content-carousel-top-detail").trigger("refresh.owl.carousel", [300]);
                $(".app-detail-top__content-carousel-bottom-detail").trigger("refresh.owl.carousel", [300]);
            }
        });


                     $(document).on("click", ".app-detail-top__center-filter-color-item", function() {
                     
                       
       

                         var attribute_product_id = $(this).attr("data-color");
                         var dirProduct = $('.get-dir').attr('data-dir-product');
                         var dirLibrary = $('.get-dir').attr('data-dir-library');
                         var priceColor = $(this).attr('data-price');
                         $('#show-price-product').text(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(priceColor));
                         $('.app-detail-top__center-filter-color-item').removeClass('item_same-active');
                         $(this).addClass('item_same-active');
                     
                        $('#show-top-library').empty();
                        $.ajax({
                            method: "POST",
                            url: "/api/get-color-product",
                            data: {
                              attribute_product_id : attribute_product_id
                            }
                        })
                        .done(function(msg) {
                          msg = JSON.parse(msg);

                          var checkInventory = (msg.item);
                          //alert(3);
                          // console.log(checkInventory);
                          if(checkInventory.quantity_in_inventory == null){
                            $('.app-detail-top__center-payload').empty();
                            $('.app-detail-top__center-cost-inventory').text('Không kinh doanh');
                          }else {
                            if(Number(checkInventory.quantity_current) - Number(checkInventory.quantity_temp_order) > 0){
                                $('.app-detail-top__center-cost-inventory').text(`Còn ${Number(checkInventory.quantity_current) - Number(checkInventory.quantity_temp_order)} sản phẩm`);
                                $('.app-detail-top__center-payload').empty();
                                $('.app-detail-top__center-payload').html(`<div class="row">
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
                                
                            </div>`);
                            }else {
                                $('.app-detail-top__center-payload').empty();
                                $('.app-detail-top__center-cost-inventory').text('Tạm hết hàng');
                            }
                          }
                           var template = '';
                           var template1 = '';
                            $('.get-data-attribute-product').attr('data-array', `${String(JSON.stringify(msg.priceAttributeProduct))}`);
                            $('.get-data-attribute-product').attr('data-total', `${String(JSON.stringify(msg.totalArrayAttribute))}`);
                            $('#show-attribute-price-product').empty();
                            msg.priceAttributeProduct.map((value, key) => {
                              $('#show-attribute-price-product').append(` <div data-attribute-product="${value.attribute_price_id}"  data-value="${value.value}" data-price="${value.price - (value.price * value.price_sale)}" data-name="${value.type_name}"  class="${value.type_name} app-detail-top__center-filter-attribute-item ">
                            <span class="app-detail-top__center-filter-attribute-item-tab">${value.type_name}</span>
                            <b class="">${value.value}</b>
                            <span class="price-change"> + ${new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format( Number(value.price - (value.price * value.price_sale)))}</span>
                        </div>`);
                            });
                         
                            msg.library.map((value, key) => {                   
                                template = template + `<div class="owl-item">
                                        <a href="#slide=true"
                                          ><img
                                            src="${dirLibrary}${value.thumb}"
                                            alt=""
                                            class=""
                                        /></a>
                                      </div>` ;
                                template1 = template1 + `<div data-slide="${key + 1}" class="click-show-slide owl-item">
                                        <img
                                          src="${dirLibrary}${value.thumb}"
                                          alt=""
                                          class=""
                                        />
                                      </div>`
                            });

                            $('.app-detail-top__content-carousel-top').empty();
                            $('.app-detail-top__content-carousel-bottom').empty();
                            $('.app-detail-top__content-carousel-top').html(`<div class="app-detail-top__content-carousel-top-detail owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                      <div class="owl-stage">
                        
                          ${template}
                      </div>
                    </div>
</div>`);
$('.app-detail-top__content-carousel-bottom').html(` <div class="app-detail-top__content-carousel-bottom-detail owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                      <div class="owl-stage">
                      ${template1}
                      </div>
                    </div>
                  </div>`);
                        $('.app-detail-top__content-carousel-top-detail').owlCarousel({
                                onChanged: callback,
                                items: 1,
                                margin: 11,
                                autoplay: false,
                                center: true,
                                loop: true,
                                dots: false,
                                nav: true,
                                autoplayTimeout: 5000,
                            });
                            $('.app-detail-top__content-carousel-bottom-detail').owlCarousel({
                              items: 1,
                              margin: 11,
                              autoplay: false,

                              loop: false,
                              dots: false,
                              nav: false,
                              autoplayTimeout: 5000,

                              responsive: {
                                  0: {
                                      items: 6,
                                  },
                                  600: {
                                      items: 6,
                                  },

                                  800: {
                                      items: 6,
                                  },
                                  1000: {
                                      items: 6,
                                  },
                                  1200: {
                                      items: 6,
                                  },
                              },
                          });

                      
                           
                        });
                    });
                
