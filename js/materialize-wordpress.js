/**
 * File materialize-wordpress.js.
 *
 * Contains all Javascript functions and calls to enhance this Material Wordpress Theme project
 */

/*-------------------------------------------
# Everything we need to initialize in the Materialize CSS Framework
--------------------------------------------*/
$(document).ready(function() {
	/* Mobile Side Navigation */
	$(".button-collapse").sideNav({
		menuWidth: 300
	});
	/* Image Captions & Materialbox */
	$('.materialboxed').materialbox();
});


/*----------------------------------------
Dropdown Side Menu
-----------------------------------------*/

$('.menu-item-has-children').click(function() {
	if ($(this).children('.sub-menu').is(":hidden")) {
		$(this).children('.sub-menu').slideDown(200);
	} else {
		$(this).children('.sub-menu').slideUp(200);
	}
});

$('.side-nav li li a').click(function(e) {
	e.stopPropagation();
});
$('aside li li a').click(function(e) {
	e.stopPropagation();
});


/*------------------------------------------
Window Scroll events & functions
-------------------------------------*/

$(window).scroll(function() {
	titleAnimation();
	navAnimation();
});


$(document).ready(function() {
	$('.menu-item-has-children > a').click(function(event) {
		event.preventDefault();
	});
	titleAnimation();
	navAnimation();
});




function titleAnimation() {
	var scrollTop = $(window).scrollTop();
	var titleEvent = $('header').css("height").replace("px", "") - ($('nav').css("height").replace("px", "") * 3 );
	if (scrollTop > titleEvent) {
		$('.header-title').hide();
		$('.brand-logo').show();
	} else {
		$('.header-title').show();
		$('.brand-logo').hide();
	}
}

function navAnimation() {
	var scrollTop = $(window).scrollTop();
	var navEvent = $('header').css("height").replace("px", "") - $('#main-navigation').css("height").replace("px", "");
	if (scrollTop > navEvent) {
		$('#main-navigation').addClass('light-blue darken-1').removeClass('transparent').css("box-shadow", "0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)");
		$('#header-search').slideUp('100');
	} else {
		$('#main-navigation').addClass('transparent').removeClass('light-blue darken-1').css("box-shadow", "none");
		$('#header-search').slideDown('100');
	}
}


/*---------------------------------------
Header Search Animations
-----------------------------------*/

$( "#search-loupe" ).click(function() {
  $("label").slideToggle('100');
	$("#search-close").slideToggle('100');
});

$( "#search-close" ).click(function() {
  $("label").slideToggle('100');
	$("#search-close").slideToggle('100');
});