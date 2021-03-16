$(document).ready(function () {

var textHidden=$('.text-hidden');
$('.read-more').on('click',function(){
    if ($(this).prev().is(':hidden')){
        $(this).prev().slideDown(3000);
    }else{
        $(this).prev().slideUp(3000);
   
    }
})


      let img_height = $('.big').height();
 $('#visible .small').css({'height': img_height });
$(window).resize(function(){
     let img_width = $(window).width();
     let d=(467 * img_width) / 1250;
$('#visible img').css({'height': d });  
});


});
