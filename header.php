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
			<header class="light-blue darken-1">
				<div class="navbar-fixed">
					<nav class="transparent" id="main-navigation">
						<div class="container">
							<div class="nav-wrapper">
								<a href="#!" class="brand-logo"><?php headerTitle();?></a>
								<a href="#" data-activates="primary-menu" class="button-collapse show-on-large"><i class="material-icons">menu</i></a>
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'side-nav' ) ); ?>
								<ul class="right" id="header-search">
									<li id="search-loupe"><i class="material-icons left" style="cursor: pointer;">search</i></li>
									<li><?php echo get_search_form(); ?></li>
									<li id="search-close"><i class="material-icons right" style="cursor: pointer;">close</i></li>
								</ul>
							</div>
						</div>
					</nav>
					<div class="container title-container">
						<div class="row">
							<div class="col s12">
								<h1 class="white-text header-title"><?php headerTitle();?></h1>
							</div>
						</div>
					</div>
				</div>
			</header>