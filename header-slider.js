jQuery(document).ready(function($){

   

    var visible = $('#visible');
    visible.on('initialize.owl.carousel initialized.owl.carousel',function(event){
        $('.tablo-left').text(event.item.index);
        $('.tablo-right').text(event.item.count);
    });


    visible.owlCarousel({
        items: 1,
        loop: true, // бесконечная прокрутка
        //dots: false, // убрали точки
        smartSpeed: 500,
        margin: 0,
         autoplay:true,
         autoplayTimeout:2000,
         autoplayHoverPause:true,
    // //     responsive:{
    //      300:{
    //          items:1,
    //          //nav:true
    //      },
    //      850:{
    //          items:2,
    //      },
    //      1000:{
    //          items:3,
    //      }
    //  }  
    });

    //visible= $('.owl-carousel');
    visible.owlCarousel();
    $('#header-arrow-left').click(function() {
        visible.trigger('next.owl.carousel');
    })
    $('#header-arrow-right').click(function() {
        visible.trigger('prev.owl.carousel');
    })
    visible.on('changed.owl.carousel',function(e){
        $('.tablo-left').text(++e.page.index);
        $('.tablo-right').text(e.item.count);
    });

  
  });

