<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package materializecss-theme
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col s12 m8 l9">
				<?php
					if ( have_posts() ) : ?>
						<h1 class="page-title">
							<?php printf( esc_html__( 'Search Results for: %s', 'materializecss-theme' ), '<span>' . get_search_query() . '</span>' ); ?>
						</h1>
					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile;
					the_posts_navigation();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div>
			<div class="col s12 m4 l3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php get_footer();