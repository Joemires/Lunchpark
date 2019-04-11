$(document).ready( function() {
    $('.eatery-section [data-type=menu-section] > div').hide()
    $('.eatery-section [data-type=menu-section] > [data-secName=' + $('.eatery-section .nav li.active').data('menu') + ']').show()



    $('.eatery-section .nav li').click( function(e) {

        var activeLink = $('.eatery-section .nav li.active').data('menu');
        var currentLink = $(this).data('menu')

        if (activeLink != currentLink) {
            $(this).siblings().removeClass('active');
            $(this).addClass('active')
            $('.eatery-section [data-type=menu-section] > div').hide()
            $('.eatery-section [data-type=menu-section] > [data-secName=' + currentLink + ']').show()
        }
    })

    $('.action-box [data-purchase=pay]').unbind('click').click(function() {
        /* Act on the event */
        $.post('includes/customer', {action: 'one-time order', item_id: $('.desc-box > h4').data('menu_id'), cat: 'menu'}, function(data, textStatus, xhr) {
            /*optional stuff to do after success */
            var json = JSON.parse(data)
            console.log(json);
            
            if (json.login == true) {
                if (json.status == 'OK') {
                    window.location = 'checkout.php'
                }
            } else {
                swal({
                    title: "Not Login",
                    text: "You are currently not logged in",
                    type: "error",
                    showCancelButton: false,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Log me in",
                    closeOnConfirm: false

                    },
                    function() {
                    $.post('includes/customer', {action: 'store_booking_session', url: window.location.href}, function(data, textStatus, xhr) {
                        /*optional stuff to do after success */
                        console.log(data);
                        if (JSON.parse(data)['response'] == 200) {
                            window.location = 'customer/login'
                        }
                    });
                })
            }
        });
    });

})
