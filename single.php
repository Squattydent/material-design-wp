<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package materializecss-theme
 */

get_header(); ?>
	<div class="container main-content">
		<div class="row">
			<div class="col s12 m8 l9" id="article-container">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				<?php 
				if ( comments_open() || get_comments_number() ) : ?>
				<div class="row">
					<div class="col s12" id="single-comments-container">
						<?php comments_template(); ?>
					</div>
				</div>
			  <?php
				endif;
				endwhile; // End of the loop.
				?>
			</div>
			<div class="col s12 m4 l3" id="sidebar-container">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
	<?php get_footer();