// Note: This requires jQuery!

$(document).ready(function(){

  // Add scrolling effect to all anchors
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor behavior
      event.preventDefault();

      // Store the hash
      var hash = this.hash;

      // Use jQuery's animate() method to create smooth scrolling
      // The number (800) specifies the number of milliseconds it will take to scroll
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){
   
        // Add hash (#) to the URL when done scrolling
        window.location.hash = hash;
      });
    }
  });
});


$(document).ready(function(){
    $(this).scrollTop(0);
});


$(function() {
  $( ".box" ).draggable();
});





$(document).ready(function(){
  var scrollTop = 0;
  $(window).scroll(function(){
    scrollTop = $(window).scrollTop();
     $('.counter').html(scrollTop);
    
    if (scrollTop >= 600) {
      $('#header').addClass('changed');
      $('#logo').addClass('changedlogo');
      $('.nav').addClass('changednav');
      $('.box').addClass('changedbox');
    } else if (scrollTop < 600) {
      $('#header').removeClass('changed');
      $('#logo').removeClass('changedlogo');
      $('.nav').removeClass('changednav');
      $('.box').removeClass('changedbox');
    } 

    if (scrollTop >= 60) {
      $('.box').addClass('changedbox');
    } else if (scrollTop < 60) {
      $('.box').removeClass('changedbox');
    } 
    
  }); 
  
});



// jQuery(function($){
//   'use strict';

//   // -------------------------------------------------------------
//   //   Basic Navigation
//   // -------------------------------------------------------------
//   (function () {
//     var $frame  = $('#basic');
//     var $slidee = $frame.children('ul').eq(0);
//     var $wrap   = $frame.parent();

//     // Call Sly on frame
//     $frame.sly({
//       horizontal: 1,
//       itemNav: 'basic',
//       smart: 1,
//       activateOn: 'click',
//       mouseDragging: 1,
//       touchDragging: 1,
//       releaseSwing: 1,
//       startAt: 3,
//       scrollBar: $wrap.find('.scrollbar'),
//       scrollBy: 1,
//       pagesBar: $wrap.find('.pages'),
//       activatePageOn: 'click',
//       speed: 300,
//       elasticBounds: 1,
//       easing: 'easeOutExpo',
//       dragHandle: 1,
//       dynamicHandle: 1,
//       clickBar: 1,

//     });
//   }());
// }());
