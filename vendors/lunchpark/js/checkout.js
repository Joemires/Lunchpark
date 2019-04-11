$(document).ready( function() {

    var qtyChange = function(val, max_val, optr) {
        val = parseInt(val);
        if (optr == 'fa-minus') {
            if (val > 1) {
                return val - 1;
            } else {
                return 1;
            }
        } else if(optr == 'fa-plus') {
            if (val < max_val) {
                return val + 1;
            } else {
                return max_val;
            }
        }
    }

    $('.qty .fa').click( function(e) {
        var optr = e.currentTarget.classList[1];
        $(this).siblings('input').val(qtyChange($(this).siblings('input').val(), $(this).siblings('input').data('max_qty'), optr)); 
    });

    // $('.container.section > .row').hide()
    // $('.container.section > .row:first').show()
    
    $('.row[data-page] .form_actions .btn').click( function(e) {
        // alert("hello")
        var additional_form_data = '';
        var form_data = $('form').not('.additional form').serialize();
        $('.additional form input[type=checkbox]:checked').each( function() {
            // console.log($(this).parent().siblings().find('input[type=text]'));
            var item_qty = $(this).parent().siblings().find('input[type=text]').val();
            additional_form_data += $(this).val() + '->' + item_qty + ', ';
            
        })
        
        form_data = form_data + '&suppl=' + additional_form_data;
        
        $.ajax({
            url: 'customer/page.php',
            type: 'post',
            data: form_data,
            success: function(data) {
                // console.log(data);
                $('.row[data-page]').remove()
                $('.container.section').append(data)
                $('.row[data-page]').addClass('current')
                var page = $('.row[data-page]').data('page');
                $('.container nav li').removeClass();
                $('.container nav li[data-page=' + page + ']').addClass('current')
                
                $('.container nav li[data-page=' + page + ']').prev().each( function() {
                    $(this).addClass('completed')
                })
            }
        })
    })
    
});
