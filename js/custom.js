jQuery(document).ready(function($){
    // Sidebar menu and top menu.
    $("#primary-menu").superfish();
    $("#primary-menu").after("<div id='my-menu'>");
    $("#primary-menu").clone().appendTo("#my-menu");
    $("#my-menu").find("*").attr('style', '');
    $("#my-menu").find("ul").removeClass("sf-menu");
    $("#my-menu").mmenu({
        extensions: [
            "widescreen",
            "pagedim-black",
            "effect-menu-slide",
            "effect-listitems-slide",
            "fx-menu-zoom",
            "fx-panels-zoom",
            "theme-dark"],
        navbar: {
            title: "Chystota"
        }
    });
    let api = $("#my-menu").data("mmenu");
    api.bind("closed", function() {
        $(".toggle-mnu").removeClass("on");
    });

    $(".mobile-mnu").click(function() {
        let mmAPI = $("#my-menu").data("mmenu");
        mmAPI.open();
        let thiss = $(this).find(".toggle-mnu");
        mmAPI.bind("open:finish", function(){
            thiss.addClass("on");
        });

        mmAPI.bind("close:finish", function(){
            thiss.removeClass("on");
        });

        $(".main-mnu").slideToggle();
        return false;
    }); // end sidebar menu.


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
    })
});// end ready
