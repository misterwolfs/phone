$(function() {
  mapController.initialize(); 


  $('.subnav li').on('click', function() {
  	console.log('test');
  	$( ".more").css('display', 'inline').animate({
	    width: "80%",
	   
	  }, 1500 );
  })

})
 