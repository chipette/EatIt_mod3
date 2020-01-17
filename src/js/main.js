import $ from 'jquery';
import 'bootstrap'; // j'importe bootstrap.js depuis node_modules
import owlCarousel from 'owl.carousel';




$(document).ready(function () {

  var js_accordion = $(".js-accordion"),
    collapse_trigger = js_accordion.find(".btn-link");
  if (js_accordion.length > 0) {
    //   Open first accordion by default
    js_accordion
      .find(".card")
      .first()
      .find(".collapse")
      .css("display", "block");

    //   Add class expanded on first accordion by default
    js_accordion
      .find(".card")
      .first()
      .find(".btn-link")
      .addClass("expanded");

    //   click event for accordion
    collapse_trigger.click(function() {
      var currentCollapse = $(this)
          .closest(".card")
          .find(".collapse"),
        remainingCollapse = $(this)
          .closest(js_accordion)
          .find(".collapse")
          .not(currentCollapse),
        remainingBtn = $(this)
          .closest(js_accordion)
          .find(".btn-link")
          .not(this);
      
    //     toggle the clicked accordion
      currentCollapse.slideToggle();
      $(this).toggleClass("expanded");
      
    //     close all other accordion if any.
      remainingCollapse.slideUp();
      remainingBtn.removeClass("expanded");
    });
  }



  $(".carousel_partenaires").owlCarousel({
    items: 3,
    loop: true,
    margin: 30,
    nav: true,
    navText: ['<i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>','<i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i>'],
    responsive:{
      0:{
          items:1
      },
      768:{
          items:2
      },
      992:{
          items:3
      }
    } 
  });



  $(".carousel_avis").owlCarousel({
    items: 3,
    loop: true,
    margin: 30,
    nav: true,
    navText: ['<i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>','<i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i>'],
    responsive:{
      0:{
          items:1
      },
      768:{
          items:2
      },
      992:{
          items:3
      }
    } 
  });

});