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
	$(".button-collapse").sideNav();
});


/*----------------------------------------
Dropdown Primary Menu
-----------------------------------------*/
/*
$('#primary-menu > .menu-item-has-children').click(function() {
	$(".sub-menu").css({
		"background-color": $('nav').css("background-color")
	});
	if ($(this).children().is(":hidden")) {
		$(this).children().slideDown("fast");
	} else {
		$(this).show();
		$(this).children().slideUp("fast");
	}
});
*/
$(document).ready(function() {
    $( '.menu-item-has-children' ).hover(
        function(){
            $(this).children('.sub-menu').slideDown(200);
        },
        function(){
            $(this).children('.sub-menu').slideUp(200);
        }
    );
}); // end ready