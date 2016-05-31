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
				<?php if (!empty(get_the_archive_description())) { ?>
					<div class="row archive-description-row">
						<div class="col s12" id="archive-description-container">
							<?php the_archive_description(); ?>
						</div>
					</div>
				<?php } /* Start the Loop */ ?>
				<div class="row">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="col s12 m12 l6" id="list-article-container">
						<?php 	get_template_part( 'template-parts/content', get_post_format() ); ?>
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