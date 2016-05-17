<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package materializecss-theme
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col s12 m8 l9">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<div class="card">
					<div class="card-content">
						<?php the_post_navigation();
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>
			<div class="col s12 m4 l3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php get_footer();