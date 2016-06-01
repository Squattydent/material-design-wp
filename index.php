<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materializecss-theme
 */

get_header(); ?>

	<div class="container main-content">
		<div class="row">
			<div class="col s12 m8 l9" id="home-container">
		<?php
		if ( have_posts() ) : ?>
			<div class="row">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>
				<div class="col s12 m12 l6" id="list-article-container">
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				</div>
				<?php endwhile; ?>
				</div>
			<?php 
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
