$('#main_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

$('#multi_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:4
        }
    },
    dots:true,
    autoplay:true,
})

$('#course_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:4
        }
    },
    dots:false,
    autoplay:false,
})



$('#related_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:3
        }
    },
    dots:true,
    autoplay:true,
})

$(document).ready(function (){
    $('.search-icon').click(function (){
        $('.searchbox').slideToggle();
    })
});
$(document).ready(function (){
    $('.lesson-course > ul > li').click(function (){
        $(this).find('ul').slideToggle();
    })
});

$(document).ready(function (){
    $('#access_title').click(function (){
        $('.list-access-dl').slideToggle();
    })
});
