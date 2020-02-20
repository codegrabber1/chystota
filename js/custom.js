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
    //$('.block-item').addClass( "sofa, carpet, mattress" );

});// end ready
