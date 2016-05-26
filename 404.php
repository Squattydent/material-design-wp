<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package materializecss-theme
 */

get_header(); ?>

	<div class="container main-content">
		<div class="row">
			<div class="col s12 m8 l9" id="error-container">
				<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'materializecss-theme' ); ?></h3>
				<p>
					<?php esc_html_e( 'It looks like nothing was found at this location.', 'materializecss-theme' ); ?>
				</p>
			</div>
			<div class="col s12 m4 l3" id="sidebar-container">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php 
get_footer();