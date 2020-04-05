jQuery(document).ready(function($){
    

    // Top menu.
    $('.mobile-mnu').click(function(){
        $('.toggle-mnu, .main-navigation').toggleClass('on');
        $('body').toggleClass('lock');
    }); // end top menu.

    // Change phone number in header.
    $('.item').on('click', function(){
        $('.show_phone').slideDown('slow', function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active').css('display','none');
            }else{
                $(this).addClass('active').css('display','block');
            }
        });
    }); // #Change phone number in header.
    $('#citynames')
        .dropdown()
    ;



    // Adding different classes to the features blocks.
    $('.block-item:nth-child(1)').each(function(){
            $(this).addClass("sofa");
        });
    $('.block-item:nth-child(2)').each(function(){
            $(this).addClass("carpet");
        });
    $('.block-item:nth-child(3)').each(function(){
            $(this).addClass("mattress");
        });

    // Accordion for the faq page.
    $(".set > a").on("click", function() {
        if ($(this).hasClass("active")) {
          $(this).removeClass("active");
          $(this)
            .siblings(".content")
            .slideUp(200);
          $(".set > a .svg-inline--fa")
            .removeClass("fa-angle-up")
            .addClass("fa-angle-down");
        } else {
          $(".set > a .svg-inline--fa")
            .removeClass("fa-angle-up")
            .addClass("fa-angle-down");
          $(this)
            .find(".svg-inline--fa")
            .removeClass("fa-angle-down")
            .addClass("fa-angle-up");
          $(".set > a").removeClass("active");
          $(this).addClass("active");
          $(".content").slideUp(200);
          $(this)
            .siblings(".content")
            .slideDown(200);
        }
    });

    // Carousel on the discount page.
    $('#discount-block').owlCarousel({
        loop:false,
        items: 3,
        //stagePadding: 20,
        margin: 10,
        responsiveClass:true,
        responsive:{
            0:{
                items: 1.50,
                nav: false,
                center: true,
                stagePadding: 20,
            },
            648:{
                items: 1.50,
                nav: false,
                center: false,
                stagePadding: 20,
            },
            768:{
                items: 3,
                nav: false,
                center: false,
                stagePadding: 20,
            },
            900:{
                items: 3,
                nav: false,
                stagePadding: 20,
                loop:false
            },
            1000:{
                items: 3,
                nav: false,
                //stagePadding: 20,
                loop:false
            }
        }
    });

    // Responsive slider.
    $('#resp-slider').owlCarousel({
        loop: true,
        items: 1,
        margin: 0,
        singleItem: true,
        nav: true,
        responsive : {
            0: {
                items: 1,
                nav: false,
                center: true,
                stagePadding: 20,
            },
            648: {
                items: 1.50,
                nav: false,
                center: false,
                stagePadding: 20
            },
            768: {
                items: 1,
                nav: false,
                center: false,
                stagePadding: 20,
            },
            900: {
                items: 1,
                nav: false,
                stagePadding: 20,
                loop: false
            },
            1000: {
                items: 1,
                nav: true,
                //stagePadding: 20,
                loop: false
            }
        }
    });

    // Phone dropdown.
    $('.ui.dropdown')
        .dropdown()
    ;
$(function () {
     
    $(window).scroll(function () {
       const elem = $('#resp-slider');
       
       const elemContent = $('.block-content');
       //const elemCont = $('.block-content');
       //let topHeight = elemCont.position();
       // alert(topHeight.top);
       let scroll = $(window).scrollTop() + $(window).height();
       let offset = elem.offset().top + elem.height();
       
       if ($(window).scrollTop() >= elemContent.outerHeight(true)) {
          //$('.float-btn-sticky').css('bottom', + topHeight.top + "px");
          if (scroll > offset) {
              $('.float-btn-sticky').fadeOut();
          } else {
              $('.float-btn-sticky').fadeIn();
          }
       }else {
          $('.float-btn-sticky').fadeOut();
       }
       
       
        
    });

});
    
});// end ready



