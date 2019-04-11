$(document).ready( function(){
   $('.header .nav-container > ul li').not('.right').on({
       click: function() {
           $('.header .nav-container > ul li').removeClass('active');
           $(this).addClass('active')
       }
   }) 

   $('.form-con .form-group input').on({
       focus: function(e) {
        //    console.log($($(this).parent()));
            $(this).parent().addClass('drawLine');
           
       },
       blur: function() {
            $(this).parent().removeClass('drawLine')
       }
   })
});