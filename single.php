<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package materializecss-theme
 */

get_header(); ?>
	<div class="container single-container">
		<div class="row">
			<div class="col s12 m8 l9">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php 
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				endwhile; // End of the loop.
				?>
			</div>
			<div class="col s12 m4 l3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php get_footer();