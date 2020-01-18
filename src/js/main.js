import $ from 'jquery';
import 'bootstrap'; // j'importe bootstrap.js depuis node_modules
import owlCarousel from 'owl.carousel';




$(document).ready(function () {

  //affichage menu déroulant progressif au survol
  $('.mobile_nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });

  //affichage menu déroulant progressif au survol
  $('.main_nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
  });

  //animation accordéon
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


  //Animation caroussel restos
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


  //Animation caroussel avis
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


  //Smooth scroll footer nav
  function scrollNavFooter() {
    $('.footer_nav a').click(function(){  
      //Toggle Class
      $(".active").removeClass("active");      
      $(this).closest('li').addClass("active");
      var theClass = $(this).attr("class");
      $('.'+theClass).parent('li').addClass('active');
      //Animate
      $('html, body').stop().animate({
          scrollTop: $( $(this).attr('href') ).offset().top - 60
      }, 400);
      return false;
    });
    $('.scrollTop a').scrollTop();
  }
  scrollNavFooter();


});