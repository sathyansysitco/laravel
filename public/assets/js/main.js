// range slide js
const sliders = document.querySelectorAll(".range");

sliders.forEach(slider => {
    const slideValue = slider.querySelector(".slider-value span");
    const sliderInput = slider.querySelector(".field input");

  
    slideValue.textContent = sliderInput.value;
    let max = sliderInput.max;
    slideValue.style.left = (sliderInput.value / max) * 100 + '%';

    sliderInput.oninput = () => {
        let iValue = sliderInput.value;
        slideValue.textContent = iValue;
        
       
        slideValue.style.left = (iValue / max) * 100 + '%';
    };
});

$('.act-top-slider .owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    smartSpeed: 1000,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:2
        }
    }
});
$('.act-cat .owl-carousel').owlCarousel({
    navText: ["<img src='" + BASEURL + "assets/media/Arrow.png'>","<img src='" + BASEURL +"assets/media/Arrow-r.png'>"],
    loop:true,
    margin:25,
    smartSpeed: 1000,
    dots:false,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
});


$('.search-wrapper .owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    dots:false,
    responsive:{
        0:{
            items:2,
            stagePadding:50
        },
        600:{
            items:3
        },
        1000:{
            items:5
       }
  }
})