( function($) {
  'use strict';
$(function(e) {

/*-------------------------------------------------------------------------------
	  Sticky-Header
	-------------------------------------------------------------------------------*/
$(window).scroll(function(){
  var sticky = $('#header'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('sticky');
  else sticky.removeClass('sticky');
});

/*-------------------------------------------------------------------------------
	  Mobile Navigation
	-------------------------------------------------------------------------------*/

    $('li.has-child > a').after('<div class="child-trigger"><i></i></div>');

    $('#nav-toggle-label, .mobile-trigger').on('click', function() {
      $('body').toggleClass('mobile-open');
      $('.child-trigger').removeClass('child-open');
      $('.mobile-menu .sub-menu').slideUp(250);
      return false;
    });

    $('.mobile-trigger2').on('click', function() {
      $('body').toggleClass('mobile-open-2');
      $('.child-trigger').removeClass('child-open');
      $('.mobile-menu .sub-menu').slideUp(250);
      return false;
    });

    $('.child-trigger').on('click', function() {
      var $parent = $(this).parent().siblings('.has-child');
      $parent.find('.child-trigger').removeClass('child-open');
      $parent.find('.sub-menu').slideUp(250);

      $(this).next('.sub-menu').slideToggle(250);
      $(this).toggleClass('child-open');
      return false;
    });

    $('.mob-menu-overlay').on('click', function() {
      $('body').removeClass('mobile-open');
      $('body').removeClass('mobile-open-2');
      $('.child-trigger').removeClass('child-open');
      $('.mob-menu .sub-menu').slideUp(250);
      return false;
    });
/*-------------------------------------------------------------------------------
	  Video
	-------------------------------------------------------------------------------*/
$('.popup-youtube').magnificPopup({
		type: 'iframe'
	});
	$('.popup-vimeo').magnificPopup({
		type: 'iframe'
	});
	$('.popup-video').magnificPopup({
		type: 'iframe'
	});

/*------------------------------------------------------------------
	Intro-Slider
	-------------------------------------------------------------------*/
	$('#intro .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	dots:false,
	autoplay:true,
    autoplayTimeout:4000,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
	});



    /*------------------------------------------------------------------
         Event Verticle-slick-Slider
         -------------------------------------------------------------------*/

     if ($('.event-slider').length) {
       $('.event-slider').slick({
         slidesToShow: 1,
         autoplay: true,
         autoplaySpeed: 2000,
         speed: 2500,
         dots: false,
         arrows: true,
         prevArrow: $('.tl-left-arrow'),
         nextArrow: $('.tl-right-arrow'),
         vertical: true,
         responsive: [{
             breakpoint: 1024,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1,
             }
           },
           {
             breakpoint: 600,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           },
           {
             breakpoint: 480,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           }
         ]
       });
     }


     /*------------------------------------------------------------------
          blog-owl-Slider
          -------------------------------------------------------------------*/

          $('#blog .owl-carousel').owlCarousel({
            autoplay: false,
            lazyLoad: true,
            loop: true,
            margin: 20,
            dots:false,
            arrows:true,
            responsiveClass: true,
            autoHeight: true,
            autoplayTimeout: 3000,
            smartSpeed: 800,
            nav: true,
            responsive: {
              0: {
                items: 1
              },

              600: {
                items: 2
              },

              1024: {
                items: 3
              },

              1366: {
                items: 3
              }
            }

        	});


          /*------------------------------------------------------------------
               About Page team-slider
               -------------------------------------------------------------------*/

               $('#about-team .owl-carousel').owlCarousel({
                 autoplay: true,
                 lazyLoad: true,
                 loop: true,
                 margin: 20,
                 dots:false,
                 arrows:true,
                 responsiveClass: true,
                 autoHeight: true,
                 autoplayTimeout: 2000,
                 smartSpeed: 800,
                 nav: true,
                 responsive: {
                   0: {
                     items: 1
                   },

                   600: {
                     items: 2
                   },

                   1024: {
                     items: 3
                   },

                   1366: {
                     items: 4
                   }
                 }

               });


/*------------------------------------------------------------------
	Causes-Slider
	-------------------------------------------------------------------*/
	$('#causes .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
	dots:false,
	autoplay:true,
    autoplayTimeout:4000,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
	});

  /*------------------------------------------------------------------
    	range-slider
    	-------------------------------------------------------------------*/

      $(".js-range-slider").ionRangeSlider({
        type: "double",
        skin: "round",
        hide_min_max: true,
        min: 0,
        max: 1000,
        from: 1,
        to: 1000,
        grid: false,
        prefix: "$"
    });


/*------------------------------------------------------------------
	Testimonials-Slider
	-------------------------------------------------------------------*/
	$('#testimonials .owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:false,
	dots:true,
	autoplay:true,
    autoplayTimeout:4000,
    responsive:{
        0:{items:1},
        600:{items:1},
        1000:{items:1}
    }
	});
	});

/*------------------------------------------------------------------
	back to top
	-------------------------------------------------------------------*/
 var top = $('#back-top');
	top .hide();

		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				top .fadeIn();
			} else {
				top .fadeOut();
			}
		});
		$('#back-top a').on('click', function(e) {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
    $(document).ready(function(){
        $("#list-btn").click(function(){
          $("#grid-view").hide();
          $("#list-view").show();
          $("#list-btn").addClass('active');
          $("#grid-btn").removeClass('active');
        });
        $("#grid-btn").click(function(){
          $("#list-view").hide();
          $("#grid-view").show();
          $("#grid-btn").addClass('active');
          $("#list-btn").removeClass('active');
        });
    });

    //---------- countdown js--------------------//

    // const second = 1000,
    //       minute = second * 60,
    //       hour = minute * 60,
    //       day = hour * 24;
    //
    // let countDown = new Date('Sep 30, 2020 00:00:00').getTime(),
    //     x = setInterval(function() {
    //
    //       let now = new Date().getTime(),
    //           distance = countDown - now;
    //
    //       document.getElementById('days').innerText = Math.floor(distance / (day)),
    //         document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
    //         document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
    //         document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
    //
    //       //do something later when date is reached
    //       //if (distance < 0) {
    //       //  clearInterval(x);
    //       //  'IT'S MY BIRTHDAY!;
    //       //}
    //
    //     }, second)


/*------------------------------------------------------------------
	Countdown
	-------------------------------------------------------------------*/
  // 2019[year] - 8[month] - 20[day]

  $('#countdown').countdown('2020/05/20', function(event) {
	$(this).html(event.strftime('<span class="countdown-period">%-D <span>Day%!D</span></span> <span class="countdown-period">%H <span>Hours</span></span> <span class="countdown-period">%M <span>Minutes</span></span> <span class="countdown-period">%S <span>Seconds</span></span>'));
  });


})(jQuery);
