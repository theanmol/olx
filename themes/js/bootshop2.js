//Bootsshop-----------------------//
$(document).ready(function(){
	/* carousel of home page animation */
	$('#myCarousel').carousel({
	  interval: 4000
	})
	 $('#featured').carousel({
	  interval: 4000
	})
	$(function() {
		$('#gallery a').lightBox();
	});
	
	$('.subMenu > a').hover(function(e)
	{
		e.preventDefault();
		var subMenu = $(this).siblings('ul');
		var li = $(this).parents('li');
		var subMenus = $('#sidebar li.subMenu ul');
		var subMenus_parents = $('#sidebar li.subMenu');
		if(li.hasClass('open'))
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				subMenu.slideUp(500);
			} else {
				subMenu.fadeOut(250);
			}
			li.removeClass('open');
		} else 
		{
			if(($(window).width() > 768) || ($(window).width() < 479)) {
				subMenus.slideUp(500);			
				subMenu.slideDown(500);
			} else {
				subMenus.fadeOut(250);			
				subMenu.fadeIn(250);
			}
			subMenus_parents.removeClass('open');		
			li.addClass('open');	
		}
		
		
	},	function()
	{
		});
	var ul = $('#sidebar > ul');
	$('#sidebar > a').click(function(e)
	{
		e.preventDefault();
		var sidebar = $('#sidebar');
		if(sidebar.hasClass('open'))
		{
			sidebar.removeClass('open');
			ul.slideUp(250);
		} else 
		{
			sidebar.addClass('open');
			ul.slideDown(250);
		}
	});

});
