$(document).ready(function() {
    $('.post-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay:true,
        autoplaySpeed: 3000,
        nextArrow:$('.next'),
        prevArrow:$('.prev'),


        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.js-example-basic-multiple').select2();

});

const body = document.querySelectorAll('p');

let display = (view) =>{
    for(let i=0; i<body.length; i++) {
        let remaining = 100;
        console.log(body[i].innerHTML);
        let bodyEdit = body[i].innerHTML.slice(0,100);
        // body[i].innerHTML=
        body[i].innerHTML = bodyEdit;
    }
}

display(body);

