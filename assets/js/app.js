$( document ).ready(function() { // Handler for .ready() called.
    // sebagai action ketika row diklik
    $('.header').click(function(){
         $(this).toggleClass('expand').nextUntil('tr.header').slideToggle(100);
    });
  
    $('.header').click();
  });