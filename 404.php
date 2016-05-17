<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package materializecss-theme
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div class="col s12 m8 l9">
				<div class="card">
					<div class="card-content">
						<h1>Code 404</h1>
						<h3><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'materializecss-theme' ); ?></h3>
						<p>
							<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'materializecss-theme' ); ?>
						</p>
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		<div class="col s12 m4 l3">
		<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php 
get_footer();