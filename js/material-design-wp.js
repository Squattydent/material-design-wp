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
	/* Modal Init */
	$('.modal-trigger').leanModal();
	/* Tooltips */
	$('.tooltipped').tooltip({delay: 50});
});


/*----------------------------------------
Dropdown Side Menu
-----------------------------------------*/
	$(".menu-item").click(function(e) {
    e.stopPropagation();
		$(">.sub-menu", this).slideToggle(200);
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
		$('#header-search').hide('slide', { direction: 'right'}, 150);
	} else {
		$('.header-title').show();
		$('.brand-logo').hide();
		$('#header-search').show('slide', { direction: 'right'}, 150);
	}
}

function navAnimation() {
	var scrollTop = $(window).scrollTop();
	var navEvent = $('header').css("height").replace("px", "") - $('#main-navigation').css("height").replace("px", "");
	if (scrollTop > navEvent) {
		$('#main-navigation').addClass('primary-color').removeClass('transparent').css("box-shadow", "0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)");
		$('#btn-share').hide();
	} else {
		$('#main-navigation').addClass('transparent').removeClass('primary-color').css("box-shadow", "none");
		$('#btn-share').show();
	}
}


/*---------------------------------------
Header Search Animations
-----------------------------------*/
$('#icon-search').click(function() {
  $("#the-search-form").show('slide', { direction: 'right', easing: 'easeInOutQuart'}, 400);
	$('#icon-search').hide();
	$('#icon-close').show();
});
$('#icon-close').click(function() {
	$("#the-search-form").hide('slide', { direction: 'right', easing: 'easeInOutQuart'}, 400);
	$('#icon-search').show();
	$('#icon-close').hide();
});



/*----------------------------------------------
Menu Active Item Styling and Opening
-----------------------------------------------*/
$(document).ready(function() {
  sideNavCurrentItem();
	widgetNavCurrentItem();
});

function sideNavCurrentItem() {
	var currenturl = window.location.href;
	$("#primary-menu a").each(function () {
		var href = $(this).attr('href');
		if (currenturl === href) {
			$(this).closest('.sub-menu').slideDown(200);
		}
	})
}

function widgetNavCurrentItem() {
	var currenturl = window.location.href;
	$(".widget_nav_menu a").each(function () {
		var href = $(this).attr('href');
		if (currenturl === href) {
			$(this).closest('.sub-menu').show();
		}
	})
}


/*----------------------------------------------
Add Ripple effect to Menu Items
-----------------------------------------------*/

$(document).ready(function() {
   addRippleEffect();
});

function addRippleEffect() {
	$("#primary-menu .menu-item").addClass("waves-effect");
}