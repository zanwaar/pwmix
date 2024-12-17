$(document).ready(function(){

	$('.nav__langs-current').click(function(event){
		if($(this).parent().hasClass('active')){
			$(this).parent().removeClass('active');
		}
		else{
			$(this).parent().addClass('active');
		}
	});
	
	$(document).mouseup(function (e){
		if (!$('.nav__langs').is(e.target) && $('.nav__langs').has(e.target).length === 0){
			$(".nav__langs").removeClass('active');
		}
	});

});


