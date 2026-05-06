// ___ Global vars ___
let gbl_rootUrl = 'Assets/custom/back-end';


// ___ Accessing html component ___
let admin_search_bar_container = $('.admin_search_bar_container');



// ___ JQuerry functions ___
// Once page is done loading 
$(document).ready(function(){
	$(window).on('load', function(){
		// $('.loader-wrapper').slideOut();
		$('.loader-wrapper').fadeOut();
		// $('.loader-wrapper').hide();
	
		$('.myTab').css('display', 'none');
		$('#tab_marcacoes').css('display', 'block');
	});	
});

// Switch between tabs on BTN click
function openTab(tabID, elmt){
	$('.myTab').css('display', 'none');
	$('#'+tabID).css('display', 'block');
	$('.nav-link').removeClass('active');
	$(elmt).addClass('active');

	admin_search_bar_container.css('display', 'block');

	if(tabID=='tab_marcacoes'){
		// Do something
	}
	//...
}