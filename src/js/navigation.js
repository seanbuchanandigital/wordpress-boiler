$ = jQuery;

$(window).scroll(function(){
    var scroll = $(window).scrollTop();
    if (scroll > 100) {
        const header = $("header");
        const isStick = header.hasClass("sticky");

        if(!isStick){
            $("header").addClass('sticky uk-box-shadow-small');
            UIkit.sticky("header", { animation: "uk-animation-slide-top" });
        }
    } else {
            $("header").removeClass('sticky uk-box-shadow-small');
    }
});

$(document).ready(function(){
    const width = $(window).width();
    if(width <= 960){
        $(".offcanvas-container").addClass('uk-offcanvas-bar');
        UIkit.offcanvas('#offcanvas-push', { flip: "true", mode: "push", overlay: "true" });
    } else {
        $(".offcanvas-container").removeClass('uk-offcanvas-bar');
    }
});

$(window).resize(function() {
    $(window).width();
    let width = $(window).width();
    if(width <= 960){
        $(".offcanvas-container").addClass('uk-offcanvas-bar');
        UIkit.offcanvas('#offcanvas-push', { flip: "true", mode: "push", overlay: "true" });
    } else {
        $(".offcanvas-container").removeClass('uk-offcanvas-bar');
        $("#offcanvas-push").removeClass('uk-offcanvas');
    }
});