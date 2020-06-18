$(document).ready(function(){
	$('#meni>li>ul').hide().click(function(e)){
		e.stopPropagation();
	});

$('#meni>li').toggle(function(){
	$(this).find('ul').slideDown();
	},function(){
		
		$(this)find('ul').slideUp();
	});
}); 
	