// Back to Top Button 
  const backToTop = document.getElementById("backToTop");

      window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
          backToTop.classList.add("show");
        } else {
          backToTop.classList.remove("show");
        }
      });

      backToTop.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });

// Header Sticky JS
    var activeSticky = $("#active-sticky"),
      winDow = $(window);
    winDow.on("scroll", function () {
      var scroll = $(window).scrollTop(),
        isSticky = activeSticky;
      if (scroll < 150) {
        isSticky.removeClass("is-sticky");
      } else {
        isSticky.addClass("is-sticky");
      }
    });

    /*==============================================================================
		 	Mobile Menu JS
	  ===============================================================================*/
    var $offcanvasNav = $("#offcanvas-menu a");
    $offcanvasNav.on("click", function () {
      var link = $(this);
      var closestUl = link.closest("ul");
      var activeLinks = closestUl.find(".active");
      var closestLi = link.closest("li");
      var linkStatus = closestLi.hasClass("active");
      var count = 0;

      closestUl.find("ul").slideUp(function () {
        if (++count == closestUl.find("ul").length)
          activeLinks.removeClass("active");
      });
      if (!linkStatus) {
        closestLi.children("ul").slideDown();
        closestLi.addClass("active");
      }
    });


$(".hero-slider").owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    nav: true,
    dots: false,
    animateOut: "fadeOut",
    animateIn: "fadeIn",
     navText: [
        "<i class='fa-solid fa-angle-left'></i>",
        "<i class='fa-solid fa-angle-right'></i>",
      ],
});


const track = document.getElementById('teamTrack');
let cards = Array.from(document.querySelectorAll('.team-card'));

// Duplicate cards to make infinite loop smooth
cards.forEach(card => {
    let clone = card.cloneNode(true);
    track.appendChild(clone);
});

// Update cards array
cards = Array.from(document.querySelectorAll('.team-card'));

function setActiveCenter() {
    let center = window.innerWidth / 2;
    let activeCard = null;
    let smallest = Infinity;

    cards.forEach(card => {
        let rect = card.getBoundingClientRect();
        let cardCenter = rect.left + rect.width / 2;

        let distance = Math.abs(center - cardCenter);

        if (distance < smallest) {
            smallest = distance;
            activeCard = card;
        }
    });

    cards.forEach(c => c.classList.remove('active'));
    if (activeCard) activeCard.classList.add('active');
}

setInterval(setActiveCenter, 120);

$(function () {
  $(".testimonial-slider").slick({
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    prevArrow: '<i class="fa fa-chevron-left prev"</i>',
    nextArrow: '<i class="fa fa-chevron-right next"</i>',
  });
  
});

// Active button toggle
  $(document).ready(function () {
    var mixer = mixitup('#mix-service-all');
    // Set 'All' as default active
    $('.filter[data-filter="all"]').addClass('active');

    $('.filter').on('click', function () {
      $('.filter').removeClass('active');
      $(this).addClass('active');
    });

  });






  