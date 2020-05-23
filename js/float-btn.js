jQuery(document).ready(function($){
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
        })
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
                loop: true,
                autoplay: true
            },
            648: {
                items: 1.50,
                nav: false,
                center: false,
                stagePadding: 20,
                loop: true,
                autoplay: true
            },
            768: {
                items: 1,
                nav: false,
                center: false,
                stagePadding: 20,
                loop: true,
                autoplay: true
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
});
