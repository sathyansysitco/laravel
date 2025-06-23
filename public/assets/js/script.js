const megaClose=document.querySelector('.mega-close');
const megaBox=document.querySelector('.mega-box');
const linkNav=document.querySelectorAll('.nav-item');
megaClose.addEventListener('mouseover', ()=>{
  megaBox.classList.add('hidden'); 
});

linkNav.forEach(link=>{
  link.addEventListener('click' , ()=>{
   
    megaBox.classList.remove('hidden');
  });
  
})





// Function to navigate to specific slide
function goToSlide(index) {
  swiper.slideTo(index);
}


// JavaScript to control search box visibility
document.addEventListener('DOMContentLoaded', () => {
    const searchLink = document.querySelector('.search-nav-link');
    const headerSearch = document.querySelector('.header-search');
    const closeBtn = document.querySelector('.the-close');

    // Toggle header search visibility on search link click
    searchLink.addEventListener('click', (e) => {
        e.preventDefault(); // Prevent default link behavior
        headerSearch.style.display = 'block';
    });

    // Close header search on close button click
    closeBtn.addEventListener('click', () => {
        headerSearch.style.display = 'none';
    });

    // Close header search when clicking outside
    document.addEventListener('click', (e) => {
        if (!headerSearch.contains(e.target) && !searchLink.contains(e.target)) {
            headerSearch.style.display = 'none';
        }
    });
});
(function () {
  // Ensure DOM is fully loaded
  document.addEventListener('DOMContentLoaded', () => {
      // Select elements specific to this script
      const searchLink = document.querySelector('.search-nav-link');
      const headerSearch = document.querySelector('.header-search');
      const closeBtn = document.querySelector('.the-close');

      // Only proceed if elements exist to avoid errors
      if (searchLink && headerSearch && closeBtn) {
          // Toggle header search visibility on search link click
          searchLink.addEventListener('click', (e) => {
              e.preventDefault(); // Prevent default link behavior
              headerSearch.style.display = 'block';
          });

          // Close header search on close button click
          closeBtn.addEventListener('click', () => {
              headerSearch.style.display = 'none';
          });

          // Close header search when clicking outside
          document.addEventListener('click', (e) => {
              if (!headerSearch.contains(e.target) && !searchLink.contains(e.target)) {
                  headerSearch.style.display = 'none';
              }
          });
      }
  });
})();




document.addEventListener("DOMContentLoaded", function () {
  try {
    // Ensure elements exist before proceeding
    const pId = document.getElementById('pas_id');
    const pidField = document.getElementById('p_id_field');
    const enterBtn = document.querySelector('.m-ok');
    const pidFieldInput = pidField ? pidField.querySelector('input') : null;

    if (pId && pidField && enterBtn && pidFieldInput) {
      // Show input field on click
      pId.addEventListener('click', () => {
        pidField.style.display = 'block';
      });

      // Hide input field on button click
      enterBtn.addEventListener('click', () => {
        pidField.style.display = 'none';
      });

      // Update pId content on keyup in input
      pidFieldInput.addEventListener('keyup', () => {
    pId.textContent = `Employee Id: ${pidFieldInput.value}`;
});
    }
  } catch (error) {
    console.error("An error occurred in the IIFE:", error);
  }
});

 
  $('.list-banner .owl-carousel').owlCarousel({
    loop:true,
    margin:15,
    dots:false,
    smartSpeed: 1000,
    nav:true,
    navText: ["","<img src='https://dev.oryx-tourism.com/dev/b2c/dev/assets/media/ban-l.svg'>"],
    responsive:{
        0:{
            items:1,
            navText: ["",""],
            stagePadding:30
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
});

(function (){ 
  // Function Logic Here. 
  const mainImg=document.getElementById('main-img');
  
  const link=document.querySelectorAll('.sec label');
  link.forEach(link=>{
    link.addEventListener('mouseover', ()=>{
      const lImage=link.nextElementSibling;
      mainImg.src=lImage.src;
    });
  });
  })();


(function (){ 
  // Function Logic Here. 
  const mainImgnew=document.getElementById('list-main-img');
  
  const linknew=document.querySelectorAll('.list-sub-img');
  linknew.forEach(link=>{
    link.addEventListener('mouseover', ()=>{
      
      mainImgnew.src=link.src;
    });
  });
  })();


function showModal(){
  $('#exampleModal').modal('show');
};


// banner
$(document).ready(function(e) {
  $('.selectpicker').selectpicker();
});
var swiper = new Swiper(".mySwiper", {
    spaceBetween: 0,
    speed: 1500,
    loop: true,
    autoplay:false,
    effect: "slide",
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination:false
   
  });

  // events slider
  $('.event-slider').owlCarousel({
    loop:true,
    margin:15,
    dots:false,
    smartSpeed: 1000,
    nav:true,
    navText: ["<img src='https://dev.oryx-tourism.com/dev/b2c/dev/assets/media/Arrow.png'>","<img src='https://dev.oryx-tourism.com/dev/b2c/dev/assets/media/Arrow-r.png'>"],
    responsive:{
        0:{
            items:1,
            navText: ["",""],
            stagePadding:30
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
});

  $('.similar .owl-carousel').owlCarousel({
    loop:true,
    margin:15,
    dots:false,
    smartSpeed: 1000,
    nav:true,
    navText: ["","<img src='https://dev.oryx-tourism.com/dev/b2c/dev/assets/media/Arrow-r.png'>"],
    responsive:{
        0:{
            items:1,
            navText: ["",""],
            stagePadding:30
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
});

$(".custom-carousel").owlCarousel({
  autoWidth: true,
  loop: false,
  dots:false,
  responsive:{
        0:{
            items:1,
            navText: ["",""],
            stagePadding:30
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
$(document).ready(function () {
  $(".custom-carousel .item").click(function () {
    $(".custom-carousel .item").not($(this)).removeClass("active");
    $(this).toggleClass("active");
  });
});




// NEW
function toglePass(svg) {
  var pass = svg.previousElementSibling;

  if (pass.type === "password") {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
}

// show pass js
var passIco = document.querySelectorAll(".showpass");
passIco.forEach((pass) => {
  var field = pass.previousElementSibling;
  pass.addEventListener("click", () => {
    if (field.type === "password") {
      field.type = "text";
      pass.classList.remove("fa-eye");
      pass.classList.add("fa-eye-slash");
    } else {
      pass.classList.add("fa-eye");
      pass.classList.remove("fa-eye-slash");
      field.type = "password";
    }
  });
});

// hotel clone area--replace

$(document).ready(function () {

  // Function to handle click on plus button inside .room-plus
  $(".room-plus").on("click", ".plus-btn", function () {
    var clone = $(".clone-body:last-child").clone();
    
    // Reset values to zero for all input fields within the cloned element
    clone.find(".qty-amount").val(0);
    clone.find(".passenger-adult").val(1);
    clone.find(".passenger-children").val(0);
    clone.find(".passenger-infant").val(0);
    clone.find(".child-age-container").empty(); // Clear child age inputs
    clone.appendTo(".clone-area");
    attachEventHandlers(clone); // Attach event handlers to the cloned element
    updateTotals();
  });

  // Function to handle click on minus button inside .room-plus
  $(".room-plus").on("click", ".minus-btn", function () {
    if ($(".clone-body").length > 1) {
      $(".clone-body:last-child").remove();
    }
    updateTotals(); // Update totals when a clone is removed
  });

  // Attach event handlers to the passenger quantity buttons
  function attachEventHandlers(element) {
    element
      .find(".plus-btn")
      .off()
      .on("click", function () {
        var inputField = $(this).siblings(".qty-amount");
        var value = parseInt(inputField.val());
        inputField.val(value + 1);
        adjustMinusButtonState(inputField);
        updateTotals(); // Update totals when a value is changed
      });

    element
      .find(".minus-btn")
      .off()
      .on("click", function () {
        var inputField = $(this).siblings(".qty-amount");
        var value = parseInt(inputField.val());
        if (value > 0) {
          // Ensure value doesn't go below zero
          inputField.val(value - 1);
          adjustMinusButtonState(inputField);
          updateTotals(); // Update totals when a value is changed
        }
      });

    // Attach event handlers for child quantity buttons within the element
    element
      .find(".child-qty .plus-btn")
      .off()
      .on("click", function () {
        
        var inputField = $(this).siblings(".passenger-children");
        var childAgeContainer = element.find(".child-age-container");
        var value = parseInt(inputField.val());
        value++;
        inputField.val(value);

        // Duplicate child-age area
        const newChildAge = document.createElement("div");
        newChildAge.className = "child-age";
        newChildAge.innerHTML = `
        <div class="chi-tit">
            <h6>Child <span class="mx-2">${value}</span> age</h6>
        </div>
        <div class="chi-inp">
            <select name="ages[]" class="ages">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>`;
        childAgeContainer.append(newChildAge);
        updateTotals();
      });

    element
      .find(".child-qty .minus-btn")
      .off()
      .on("click", function () {
        var inputField = $(this).siblings(".passenger-children");
        var childAgeContainer = element.find(".child-age-container");
        var value = parseInt(inputField.val());
        if (value > 0) {
          value--;
          inputField.val(value);

          // Remove the last child-age area
          if (childAgeContainer.children().length > 0) {
            childAgeContainer.children().last().remove();
          }
        }
        updateTotals();
      });
  }

  // Adjust the state of the minus button based on the input value
  function adjustMinusButtonState(inputField) {
    var value = parseInt(inputField.val());
    var minusButton = inputField.siblings(".minus-btn");
    if (value <= 0) {
      minusButton.attr("disabled", "disabled");
    } else {
      minusButton.removeAttr("disabled");
    }
  }

  // Update total passengers and rooms
  function updateTotals() {
    var totalPassengers = 0;
    var totalRooms = $(".clone-body").length;

    $(".clone-body").each(function () {
      var adult = parseInt($(this).find(".passenger-adult").val());
      var children = parseInt($(this).find(".passenger-children").val());
      var infant = parseInt($(this).find(".passenger-infant").val());
      totalPassengers += adult + children + infant;
    });

    $(".passenger-total-amount").html(totalPassengers);
    $(".passenger-total-room").html(totalRooms);
  }

  // Initially attach event handlers to existing elements
  attachEventHandlers($(".clone-body"));
});

// flight book modal slider
$(".flight-book-slider").owlCarousel({
  loop: false,
  margin: 10,
  nav: true,
  dots: false,

  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 3,
    },
  },
});

$(document).ready(function () {
  $("#testimonial-slider").owlCarousel({
    items: 1,
    nav: true,
    autoPlay: true,
    loop: true,
    dots: false,
    margin: 0,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
});

// room img slider
$("#room-slider").owlCarousel({
  loop: false,
  margin: 0,
  nav: true,
  navigationText: [
    "<i class='fa-solid fa-angle-left'></i>",
    "<i class='fa-solid fa-angle-right'></i>",
  ],
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

$("#hotel-slider").owlCarousel({
  loop: true,
  margin: 20,
  responsiveClass: true,
  nav: true,
  loop: false,
  dots: false,
  responsive: {
    0: {
      items: 1,
      nav: true,
    },
    600: {
      items: 3,
      nav: false,
    },
    1000: {
      items: 4,
    },
  },
});

$("#easy-trip-slider").owlCarousel({
  loop: true,
  margin: 20,
  responsiveClass: true,
  nav: false,
  loop: false,
  dots: false,
  responsive: {
    0: {
      items: 1,
      nav: true,
    },
    600: {
      items: 3,
      nav: false,
    },
    1000: {
      items: 5,
    },
  },
});

$("#flight-slider").owlCarousel({
  loop: false,
  margin: 0,
  nav: true,
  navigationText: [
    "<i class='fa-solid fa-angle-left'></i>",
    "<i class='fa-solid fa-angle-right'></i>",
  ],
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 6,
    },
  },
});

// Get all selectRmCard elements
const selectRmCards = document.querySelectorAll(".selectRmCard");
// Loop through each selectRmCard element
selectRmCards.forEach((selectRmCard) => {
  // Get the .rmType and .scardRight elements within the current selectRmCard
  const rmType = selectRmCard.querySelector(".rmType");
  const scardRight = selectRmCard.querySelector(".scardRight");

  // Calculate the offset of .scardRight within the current selectRmCard
  const scardRightOffsetTop = scardRight.offsetTop;

  // Add a scroll event listener to the window
  window.addEventListener("scroll", () => {
    // Calculate the scroll position
    const scrollPosition = window.scrollY;

    // If the scroll position is greater than the offset of .scardRight
    if (scrollPosition > scardRightOffsetTop) {
      // Add the 'sticky' class to .rmType within the current selectRmCard
      rmType.classList.add("sticky-r");
    } else {
      // Remove the 'sticky' class from .rmType within the current selectRmCard
      rmType.classList.remove("sticky-r");
    }
  });
});

// search
function toggleSearchPopBody(input) {
  var searchPopBody = input.parentNode.nextElementSibling;
  if (
    searchPopBody.style.display === "none" ||
    searchPopBody.style.display === ""
  ) {
    searchPopBody.style.display = "block";
  } else {
    searchPopBody.style.display = "none";
  }
}

document.addEventListener("DOMContentLoaded", function () {
  var searchInputs = document.querySelectorAll('.search-in input[type="text"]');
  searchInputs.forEach(function (input) {
    input.addEventListener("click", function (event) {
      event.stopPropagation();
      toggleSearchPopBody(this);
    });
  });

  document.addEventListener("click", function (event) {
    var isClickInsideSearchBox = false;
    var searchBoxes = document.querySelectorAll(".search-box");
    searchBoxes.forEach(function (searchBox) {
      if (searchBox.contains(event.target)) {
        isClickInsideSearchBox = true;
      }
    });

    if (!isClickInsideSearchBox) {
      var searchPopBodies = document.querySelectorAll(".search-pop-body");
      searchPopBodies.forEach(function (searchPopBody) {
        searchPopBody.style.display = "none";
      });
    }
  });
});

const selectDropdowns = document.querySelectorAll(".c-select");

selectDropdowns.forEach((selectDropd) => {
  const select = selectDropd.querySelector(".select");
  const selected = selectDropd.querySelector(".selected");
  const options = selectDropd.querySelectorAll(".c-menu li");
  const cmenu = selectDropd.querySelector(".c-menu");

  select.addEventListener("click", () => {
    cmenu.classList.toggle("c-menu-active");
  });

  options.forEach((option) => {
    option.addEventListener("click", () => {
      selected.innerText = option.innerText;
      cmenu.classList.remove("c-menu-active");
      options.forEach((option) => {
        option.classList.remove("active-op");
      });
      option.classList.add("active-op");
    });
  });
  // click outside js
  document.body.addEventListener("click", (event) => {
    const isinsideDropdown = selectDropd.contains(event.target);
    if (!isinsideDropdown) {
      cmenu.classList.remove("c-menu-active");
    }
  });
});

const rheader = document.querySelector(".rmHeader");
const cardArea = document.querySelector(".rmBottom");
const caOffset = cardArea.offsetTop;
window.addEventListener("scroll", () => {
  scrlPos = window.scrollY;
  if (scrlPos > caOffset) {
    rheader.classList.add("sticky");
  } else {
    rheader.classList.remove("sticky");
  }
});

function replaceContent() {
  var saveBtn = document.querySelector(".search-btn button");
  saveBtn.innerHTML = "<div class='loader-btn'></div>";
}