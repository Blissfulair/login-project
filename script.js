jQuery(document).ready(function($){
	$('.login').on('click', function(){
		$('#signup').toggleClass('hide');
		$('#login').toggleClass('hide');
	});
});