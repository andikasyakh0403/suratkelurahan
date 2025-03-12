/* js ^^ */
$(document).ready(function(){

    $("#slider-hero").owlCarousel({
        nav: true,
        items: 1,
        loop:true,
        autoplaySpeed:1000,
        autoplay:true,
        navtext: [
            "<i class='fa fa-angel-left'></i>",
            "<i class='fa fa-angel-right'></i>"
        ],
        navContainer: "#slider-hero-nav",
    });


    $('#tenaga-pendidik-slider').owlCarousel({
        loop: true,
        nav: true,
        // mouseDrag: false,
        items: 3,
        dots: false,
        margin: 30,
        navText: [
            '<i class="fa fa-angle-left" aria-hiden="true"></i>',
            '<i class="fa fa-angle-right" aria-hiden="true"></i>',
        ],
        navContainer: '#slider-tools-1',
    });

    $('#alumni-slider').owlCarousel({
        loop: true,
        nav: true,
        // mouseDrag: false,
        items:2,
        dots: false,
        margin: 20,
        naviText: [
            '<i class="fa fa-angle-left" aria-hiden="true"></i>',
            '<i class="fa fa-angle-right" aria-hiden="true"></i>'
        ],
        navContainer: '#slider-tools-2',
    });
});
