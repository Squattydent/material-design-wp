<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materializecss-theme
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="card content">
			<div class="card-content">
				<?php
				if ( is_single() ) { ?>
					<h1><?php the_title(); ?></h1>
					<?php } else { ?>
					<h2><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php 	}
					if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php materializecss_theme_posted_on(); ?>
					</div>
					<!-- .entry-meta -->
					<?php	endif; ?>
						<!-- .entry-header -->
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						<!-- .entry-content -->
						<footer class="entry-footer">
							<?php materializecss_theme_entry_footer(); ?>
						</footer>
						<!-- .entry-footer -->
			</div>
		</div>
	</article>
	<!-- #post-## -->