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
			<div id="list-search-container">
				<div class="list-post-background" <?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						echo 'style="background-image: url(';
						the_post_thumbnail_url('medium');
						echo ')"';
					} else { /* -- */ } ?>>
				<h2><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				</div>
				<div class="right">
					<a href="<?php echo get_permalink(); ?>" class="btn-floating btn-large waves-effect waves-light list-link-btn right"><i class="material-icons">link</i></a>
				</div>
				<div class="list-post-content">
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php materializecss_theme_posted_on(); ?>
					</div>
					<!-- .entry-meta -->
					<?php	endif; ?>
					<!-- .entry-header -->
					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div>
					<!-- .entry-content -->
				</div>
			</div>
	</article>
	<!-- #post-## -->