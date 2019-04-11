$(document).ready( function() {

  AOS.init({
    // startEvent: 'load'
  });

  $(window).on('scroll', function(evt) {
    // console.log("Scrolled");
    // console.log($(window).scrollTop());
    var mobile_search_display = $('.mobile-search').attr('style').split(':')[1].trim();
    // console.log(mobile_search_display);
    if (mobile_search_display == 'block;') {
        // console.log(mobile_search_display);
        $('nav.hero-navbar').addClass('navbar-static-top')
    } else {
        if ($(window).scrollTop() > 50) {
            $('nav.hero-navbar').addClass('navbar-static-top')
        } else {
            $('nav.hero-navbar').removeClass('navbar-static-top')
        }
    }

  })

})
