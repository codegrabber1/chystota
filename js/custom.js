jQuery(document).ready(function($){
    // lang switcher
    $('#ru').on('click', function(){
        $(this).addClass('active');
        $("#ua").removeClass('active');
    });
    $('#ua').on('click', function(){
        $(this).addClass('active');
        $("#ru").removeClass('active');
    });
    $('#citynames')
        .dropdown()
        ;

    // Phone dropdown.
    $('.ui.dropdown').dropdown();

    // function handleSelectedValue(){
    //     let selectedClass = $("#Mobility :selected").val();
    //     Cookies.set('selected', selectedClass, { expires: 7 });
    //
    //     let myCookie = Cookies.get('selected');
    //
    //     if(myCookie === selectedClass){
    //         $('.show_phone').html(myCookie);
    //         //alert(myCookie );
    //     }
    //
    //     // $('.f-phone').html(getPhone);
    //     // $('.subfooter_phone').html(getPhone);
    //     // $('.show_phone').html(getPhone);
    // }


    //Changing phone number on the top.
    $('#Mobility').on('change', function () {

        if(Cookies.get('selected')){
            Cookies.remove('selected');
            
            let selOpt = $("#Mobility :selected");
            let val = selOpt.val();

            localStorage.setItem('getPhone', val);
            let getPhone = localStorage.getItem('getPhone');
            $('.show_phone').html(getPhone);
            $('.ui.dropdown').dropdown('set selected', val);

        } else{
            
            let selOpt = $("#Mobility :selected");
            let val = selOpt.val();

            Cookies.set('selected', val);
            $v = Cookies.get('selected');
            
            $('.show_phone').html($v);
        }

        // if (val != a) {
        //     alert("Вибереш номер " + a);
        //     Cookies.set('selected', a);
        //     //$a = Cookies.get('selected');
        //     $('.show_phone').html($a);
        // } else {
        //     alert("Вибереш номер " + val);
        //     Cookies.set('selected', val);
        //     // $v=Cookies.get();
        //     //     alert("Вибрав номер"+ $v);
        //     $('.show_phone').html($v);
        //     //location.reload();
        // }
        // document.cookie = 'getPhone';
        // alert(document.cookie);



       // $cookie = Cookies.get('selected');
        //console.log( $cookie);
        //alert(a +" -> " +  $cookie);
        //alert(a +" -> " +  $cookie);

        // if(a != val){
        //
        //     a.html($cookie);
        //     location.reload();
        // } else {
        //
        //     Cookies.set('selected', val, { expires: 7 });
        //
        //     $cookie= Cookies.get('selected');
        //
        //     a.html($cookie);
        //     location.reload();
        // }


        //let getPhone = localStorage.getItem('getPhone');
        // let ph = selOpt.val();
        // alert('hel');

        
        // //alert(getPhone);
        // $('.f-phone').html(getPhone).attr('selected','selected');
        // $('.subfooter_phone').html(getPhone).attr('selected','selected');

        
        // $('.show_phone').slideDown('slow', function () {
        //     if ($(this).hasClass('active')) {
        //         $(this).removeClass('active').css('display', 'none');
        //     } else {
        //         $(this).addClass('active').css('display', 'block');
        //     }
        // });
    });

    //Changing phone number on the top.
    $('#mobil').on('change', function () {
        let val = $("#mobil :selected").val();
        $('.f-phone').html(val);
        $('.subfooter_phone').html(val);
        $('.show_phone').html(val);

        // $('.show_phone').slideDown('slow', function () {
        //      if ($(this).hasClass('active')) {
        //          $(this).removeClass('active').css('display', 'none');
        //      } else {
        //          $(this).addClass('active').css('display', 'block');
        //      }
        //  });
    }); // #Change phone number in header.

    // Switch city.
    let cityLink = $('#geocity');
    let showCity = localStorage.getItem('nameTown');
    //let storeNum = localStorage.getItem('storeNum');
    let store = localStorage.getItem('storeNum');
    if (store === 'true'){
        cityLink.css('dsiplay', 'none');
        $('.show_phone').slideDown('slow', function () {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active').css('display', 'none');
            } else {
                $(this).addClass('active').css('display', 'block');                
            }
            $('.custom-select .text').html(showCity);
                   
            //$("#Mobility .item").html(showCity);
        });
               
    } else {
        cityLink.delay(2000).toggle(1000, function (e) {
            $(this).css('dsiplay', 'block');

            $('a.cityName').on('click', function () {
                let nameTown = $(this).data('option');
                localStorage.setItem('nameTown', nameTown);
                let showCity = localStorage.getItem('nameTown');
                
                $('.custom-select .text').html(showCity);
                
                let m = $("#Mobility .item:selected").html();
                // if (m != showCity){
                //     if($('.menu .item').hasClass('selected')){
                //         $('.menu .item').removeClass('active selected')
                //     }
                // }
                
                $('.show_phone').slideDown('slow', function () {
                    
                    if ($(this).hasClass('active')) {
                        $(this).removeClass('active').css('display', 'none');
                    } else {
                        $(this).addClass('active').css('display', 'block');
                        localStorage.setItem('storeNum', 'true');
                    }
                    
                });
                // Change the background of the name of city.
                if (!$(this).hasClass('active')) {
                    $('a.cityName').removeClass('active');
                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active');
                }

                // Hide the block with the cities.
                cityLink.delay(1000).fadeOut(1000);
            });
        });
    }
    // Smooth scrolling.
    $('.sticky-button').on('click', function(e){
        let href = $(this).attr('href'), elem = $(document).find(href);
        if (elem.length > 0) {
            let posY = elem.eq(0).offset().top;
            $('html, body').animate({
                scrollTop: posY
            }, 1500);
        }
        return false;

    });

    // Top menu.
    $('.mobile-mnu').on('click',function(e){
        e.preventDefault();
        $('.toggle-mnu, .mobile-menu').toggleClass('on');
        $('body').toggleClass('lock');
    }); // end top menu.

    // Change phone number in header.
    // $('#mobil').on('change', function(){
    //     $('.show_phone').slideDown('slow', function(){
    //         if($(this).hasClass('active')){
    //             $(this).removeClass('active').css('display','none');
    //         }else{
    //             $(this).addClass('active').css('display','block');
    //         }
    //     });
    // }); // #Change phone number in header.

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
    
});// end ready




