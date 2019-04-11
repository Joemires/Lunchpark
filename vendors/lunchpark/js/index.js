$(document).ready( function() {

    $('.mobile-search').hide();

    // ion.sound({
    //     sounds: [
    //         {name: "bubble_sms"}
    //     ],
    //     path: "http://localhost/Exercise/Lunchpark%20Fancy/vendors/ion_sound/sounds/",
    //     preload: true,
    //     volume: 1.0
    // });

    AOS.init({
      // startEvent: 'load'
    });
    // $(document).on('load', function() {
    //   console.log("Ok");
    // })
    // $('.animatedParent').on('DOMContentLoaded', function() {
    //   console.log("Hello");
    //   alert("Yes")
    // })

    window.addEventListener('scroll', function() {
      // this.alert("Hello")
    })

    // $(window).scroll( function() {

    //   $('.animatedParent').find('.aos-animate').each( function(evt) {

    //     let scrollPos = $(window).scrollTop();
    //     console.log(scrollTo);


    //     let animateoffset = $(this).offset().top;
    //     if(animateoffset >= scrollPos) {
    //       $(this).not('.played').each( function() {

    //         ion.sound.play("bubble_sms");
    //         $(this).addClass('played')

    //       })

    //     } else {
    //       $(this).removeClass('played');
    //     }

    //   })
    // })
    $('.carousel .search-icon .fa').on({
        click: function () {
            $('.mobile-search').show()
            $('.full-container').hide()
            $('nav.navbar').addClass('navbar-static-top bounceInRight')
        }
    })

    $('.mobile-search .search-close > .fa').on({
        click: function () {
            $('.mobile-search').hide()
            $('.full-container').show()
        }
    })

    $('.carousel').carousel();
    // alert("Hell")

    $('.dropdown-search input').on({
      focus: function() {
        $(this).siblings('ul').show();
      },
      blur: function() {
        var clicked = false;
        $('.dropdown-search ul li').on({
          click: function() {
            $(this).parent().siblings('input').val($(this).html())
            $(this).parent().hide()
          }
        })
      }
    })
    // $('.dropdown-search input').on('focus', function() {
    //   // console.log();
    //   $(this).siblings('ul').show()
    // }).on('blur', function() {
    //   $('.dropdown-search ul li').on('click', function() {
    //     // console.log();
    //     // console.log($(this).html());
    //     $(this).parent().siblings('input').val($(this).html())
    //     $(this).parent().hide()
    //   })

    // })

    $('#recent-menu-block > .row').slick({
      slidesToShow: 4,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      dots: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3
          }
        },
        {
          breakpoint: 800,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    })

    $('.eatries-logos').slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 1500,
      arrows: false,
      dots: false,
          pauseOnHover: false,
          responsive: [{
          breakpoint: 768,
          settings: {
              slidesToShow: 3
          }
      }, {
          breakpoint: 520,
          settings: {
              slidesToShow: 2
          }
      }]
    });

    $('#customer-review-block .container').slick({
      // centerMode: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      arrows: false,
      autoplaySpeed: 2000,
      dots: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });

  })
