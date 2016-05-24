<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materializecss-theme
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="col s12" id="list-search-container">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php materializecss_theme_posted_on(); ?>
				</div>
				<!-- .entry-meta -->
				<?php endif; ?>
				<!-- .entry-header -->
				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
	</article>
	<!-- #post-## -->