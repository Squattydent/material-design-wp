<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package materializecss-theme
 */

get_header(); ?>
	<div class="container main-content">
		<div class="row">
			<div class="col s12 m8 l9" id="search-container">
				<?php
					if ( have_posts() ) : ?>
					<div class="row">
						<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post(); ?>
							<div class="col s12 m12 l6" id="list-article-container">
								<?php get_template_part( 'template-parts/content', 'search' ); ?>
							</div>
							<?php endwhile; ?>
					</div>
					<?php the_posts_navigation();
				else : ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</div>
			<div class="col s12 m4 l3" id="sidebar-container">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php get_footer();