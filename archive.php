<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materializecss-theme
 */

get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col s12 m8 l9">
				<?php
		if ( have_posts() ) : ?>
					<h1><?php	single_cat_title(); ?></h1>
					<p>
						<?php the_archive_description(); ?>
					</p>
					<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
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