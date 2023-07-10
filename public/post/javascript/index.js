$(document).on("click", ".show-more-detail", function() {
  $('.app-detail-bottom__item-content').css('height', 'auto');
  $(this).addClass('close-more-detail');
  $(this).removeClass('show-more-detail');
  $(this).text('Thu gọn');
})



$(document).on("click", ".close-more-detail", function() {
  $(this).removeClass('close-more-detail');
  $(this).addClass('show-more-detail');
  $('.app-detail-bottom__item-content').css('height', '700px');
  $(this).text('Xem thêm');
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





$(".click-show-slide").click(function() {
    $(
        ".app-detail-top__content-carousel-bottom-detail .owl-item"
    ).removeClass("carousel-active-border");
    $(this).addClass("carousel-active-border");

    let point = $(this).attr("data-slide");

    owl.trigger("to.owl.carousel", Number(point) - 1, [300]);
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



    owls.trigger("to.owl.carousel", current - 1, [300]);
    $('.app-detail-top__content-carousel-bottom-detail .owl-item').removeClass('carousel-active-border');
    var selectors = $('.click-show-slide');
    selectors.eq(current - 1).addClass('carousel-active-border');
}
$(window).on('popstate', function(event) {
    if (location.href.search('slide=true') >= 0) {

        $('.app-click-show__library').addClass('position-carousel');
        owl.trigger("refresh.owl.carousel", [300]);
        owls.trigger("refresh.owl.carousel", [300]);
    } else {
        $('.app-click-show__library').removeClass('position-carousel');
        owl.trigger("refresh.owl.carousel", [300]);
        owls.trigger("refresh.owl.carousel", [300]);
    }
});

$(".app-detail-promotion__content-flex").owlCarousel({
    items: 1,
    margin: 22,
    autoplay: false,

    loop: false,
    dots: false,
    nav: true,
    autoplayTimeout: 5000,


    responsive: {
        0: {
            items: 2,
            center: true,
            autoplay: false,
        },
        600: {
            items: 3,
        },

        800: {
            items: 3,
        },
        1000: {
            items: 4,
        },
        1200: {
            items: 4,
        },
    },
});







 function getTotalCart(arr){
 	  	$('.app-header__top-item-icon-cart-quantity').empty();
 	  if(arr == null){
 	  		$('.app-header__top-item-icon-cart-quantity').text(0)
 	  }else {
 	  	var sum = 0;
 	  	for(var i = 0; i < arr.length; i ++){
 	  		 sum = sum + Number(arr[i].quantity);
 	  	}
 	  	$('.app-header__top-item-icon-cart-quantity').text( String(sum));
 	  }
 }


getTotalCart(JSON.parse(localStorage.getItem("carts")));

var selector = $('.item');
        var sum = selector.length;
        for (var i = 0; i < selector.length; i++) {
            $('.show-nav').append(`<li id="${i + 1}" class="nav-item" data-show=${i + 1}></li>`);
        }
        var count = 1;
        function runSlide(item, type) {
            
            $('.item').removeClass("pot-prev pot-next")
            selector.hide();
            $(".nav-item").removeClass("active-nav");
            $(`#${item}`).addClass("active-nav");
            
            $(".carousel-detail__nav-item").removeClass("carousel-detail__active");
            $(`#carousel-detail__nav-${item}`).addClass("carousel-detail__active");
          selector.eq(item - 1).css("display", "block");
 
          if(type == 1){
            selector.eq(item - 1).addClass('pot-next');
          }else {
            selector.eq(item - 1).addClass('pot-prev');
          }
      
        }
        runSlide(count, 2);


        setInterval(function () {

            count++;
            if (count > sum) {
                count = 1;
            }
            runSlide(count, 2);
        }, 4500);



        $('.button-click').click(function () {

            if ($(this).attr("data-slide") == 'next') {
                count++;
                if (count > sum) {
                    count = 1;
                }
                runSlide(count, 2);

            } else {
                count--;
                if (count <= 0) {
                    count = sum;
                }
                runSlide(count, 1);

            }
        })
        $(document).on("click", ".nav-item", function () {
            count = Number($(this).attr("data-show"));
            runSlide(count, 2);
        });

        $(document).on("click", ".carousel-detail__nav-item", function () {
            count = Number($(this).attr("data-show"));
            runSlide(count, 2);
        });      







      $(".app-information__content, .app-information__content-second, .app-information__content-third, .app-information__content-four, .app-information__content-five").owlCarousel({
        items: 1,
        margin: 11,
        autoplay: true,
        
        loop: true,
        dots: false,
        nav: true,
        autoplayTimeout: 5000,
    

        responsive: {
          0: {
            items: 2,
            center: true,
            autoplay: false,
          },
          600: {
            items: 3,
          },

          800: {
            items: 3,
          },
          1000: {
            items: 4,
          },
          1200: {
            autoplay: true,
            items: 5,
          },
        },
      });

      $('.show-tab-category').click(function(){
          $('.app-fixed-mobile__detail').toggleClass("hidden-custom");
      })
    $('.app-fixed-mobile__detail-left li').click(function(){
        $('.app-fixed-mobile__detail-right').toggle();
    })


    $(document).on("click", ".show-nav-app", function() {
      $('.remove-item').remove();
      $('.app-nav').slideToggle({
        duration: 200,
        start: function() {
          jQuery(this).attr('style', 'display: flex !important');
        }
      })
    });