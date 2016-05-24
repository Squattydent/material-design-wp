<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materializecss-theme
 */

get_header(); ?>
	<div class="container main-content">
		<div class="row">
			<div class="col s12 m8 l9" id="archive-container">
				<?php
		if ( have_posts() ) : ?>
		<?php if (!empty(the_archive_description())) { ?>
			<div class="row">
				<div class="col s12" id="archive-description-container">
						<p><?php the_archive_description(); ?></p>
				</div>
			</div>
		<?php } /* Start the Loop */
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
			</div>
			<div class="col s12 m4 l3" id="sidebar-container">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php get_footer();