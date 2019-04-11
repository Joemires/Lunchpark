
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })


    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function(evt){
        evt.preventDefault();
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }
        if (check == true) {

            var form_data = $('.login100-form').serialize();

            if ($('form #form_type').val() == 'signup') {
                $.ajax({
                    url: '../include/customer',
                    type: 'POST',
                    dataType: '',
                    data: 'action=customer_signup&' + form_data
                })
                .done(function(data) {
                    console.log(data);
                    var json = JSON.parse(data);
                    if (json.status == 'success') {
                        popupAlert('success', json.message, "fa fa-check-circle", '', 4500);
                    } else {
                        popupAlert('danger', json.message, "fa fa-times-circle", '', 4500);
                    }
                })
                .fail(function() {
                    popupAlert('danger', 'Server error, please try again in a minute', "fa fa-times-circle", '', 5000);
                })
            }


            if ($('form #form_type').val() == 'login') {
                $.ajax({
                    url: '../includes/customer',
                    type: 'post',
                    dataType: '',
                    data: '&action=customer_login' + '&' + form_data
                })
                .done(function(data) {
                    console.log(data);
                    var json = JSON.parse(data);
                    console.log(json);
                    if (parseInt(json.response) == 200 && json.status == 'OK') {
                        console.log(json.callback);
                        popupAlert('success', 'Login was successful, redirecting in a minute', "fa fa-check-circle", '', 95000);
                        setTimeout( function(){
                            if (json.callback != '') {
                                console.log(json.callback.url);
                                window.location.href=json.callback.url;
                            } else {
                                // window.location.href="index.php";
                            }
                        }, 5050)
                    } else {
                        popupAlert('danger', 'E-Mail not found on our record, try again with a different mail', "fa fa-times-circle", '', 5000);
                    }
                })
                .fail(function() {
                    popupAlert('danger', 'Server error, please try again in a minute', "fa fa-times-circle", '', 5000);
                })
            }

        }
        return check;


    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        } else if ($(input).attr('type') == 'checkbox' && $(input).attr('name') == 'accept_terms') {
            if ($(input + ':checked').val() != 'on') {
                return false;
            }
        } else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }

    var popupAlert = function(type, content, icon, title, timer) {
        $('body').append('<div class="alert alert-popup alert-' + type + ' alert-dismissable fade show" role="alert"> <strong> <i class="icon ' + icon + '"> </i>' + title + ' </strong> ' + content + ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"> &times; </span> </button> </div>');

        if (timer != '') {
            setTimeout( function() {
              $('.alert').fadeOut(600, function() {
                $(this).alert('close');
              });
            }, timer)
        }
    }

    // popupAlert('danger', 'Server error, please try again in a minute', "fa fa-times-circle", '', '');


})(jQuery);
