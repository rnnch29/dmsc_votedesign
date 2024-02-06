$(document).ready(function () {
    $('.hero-banner .slider').slick({
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll:1,
    });

    $('.block-benefits-slider .slider').slick({
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll:1,
    });

    $('.how-to .mobile-slider .slider').slick({
        dots: true,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll:1,
        responsive: [
            {
              breakpoint: 1441,
              settings: {
                arrows: false,
              }
            },
          ]
    });

    responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]

    $('.block-platinum-card .slider').slick({
        dots: true,
        arrows: false,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll:1,
    });

    $('.how-to .slider').slick({
        dots: true,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll:1,
    });



    $('.wg-benefits-list .slider').slick({
        dots: false,
        arrows: true,
        infinite: false,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll:1,
        centerMode: true,
        variableWidth: true,
    });


    $(".menubar .menu-toggle").click(function(){
        $(this).toggleClass("close")
        $(".header-moblie").toggleClass("show") 
    });

    $(".hero-banner .item.vdo").click(function() {
        $(".hero-banner .item.vdo .cover").addClass("d-none")
    })

});
