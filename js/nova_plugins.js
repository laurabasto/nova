jQuery(function($){
$('.skills-wrapper').slick({
	dots: true,
	autoplay: true,
  	autoplaySpeed: 2000,
  	arrows: false,
  	fade: true,
});
$('.skills-content-wrapper').slick({
	slidesToShow: 3,
	dots: false,
	slidesToScroll: 1,
	autoplay: true,
	arrows: true,
	autoplaySpeed: 2000,
	responsive: [{

      breakpoint: 991,
      settings: {
        slidesToShow: 2,
      }

    }, {

      breakpoint: 767,
      settings: {
        slidesToShow: 1,
      }

    }]
});
$('.date-box').slick({
  slidesToShow: 6,
  dots: false,
  slidesToScroll: 1,
  autoplay: true,
  arrows: true,
  autoplaySpeed: 2000,
  asNavFor: '.post-box',
  focusOnSelect: true,
  responsive: [{

      breakpoint: 991,
      settings: {
        slidesToShow:  3,
      }

    }, {

      breakpoint: 767,
      settings: {
        slidesToShow: 2
      }

    }]
});
$('.post-box').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  asNavFor: '.date-box',
  autoplaySpeed: 2000,
  dots: false,
  centerMode: true,
  arrows: false,
});


$('.counter').counterUp({
    delay: 10,
    time: 5000
});

});//fin del jquery