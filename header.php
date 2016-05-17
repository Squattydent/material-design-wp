<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materializecss-theme
 */

?>
	<!DOCTYPE html>
	<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--Import Google Icon Font-->
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- Compiled and minified Materilize CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<main>
			<nav class="light-blue darken-1">
				<div class="container">
					<div class="nav-wrapper">
						<a href="<?php echo site_url(); ?>" class="brand-logo">
							<?php bloginfo( 'name' ); ?>
						</a>
						<a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'right hide-on-med-and-down' ) ); ?>
						<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu', 'menu_class' => 'side-nav' ) ); ?>
					</div>
				</div>
			</nav>