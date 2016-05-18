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
		<?php
if ( is_single() ) { ?>
		<?php if ( has_post_thumbnail() ) { ?>
		  <div class="post-featured-img">
				<?php 
				$thumbnail = get_post( get_post_thumbnail_id() );
				?>
				<img class="materialboxed responsive-img" alt="<?php echo get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true ); ?>" title="<?php echo $thumbnail->post_title; ?>" data-caption="<?php echo $thumbnail->post_excerpt; ?>" src="<?php the_post_thumbnail_url('large'); ?>">
		  <br>
				<a href="<?php the_post_thumbnail_url('full'); ?>" target="_blank" class="waves-effect waves-light btn deep-orange">Full Size Image</a>
		  </div>
		<?php } ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php materializecss_theme_posted_on(); ?>
			</div>
			<!-- .entry-meta -->
			<?php	endif; ?>
			<footer class="entry-footer">
				<?php materializecss_theme_entry_footer(); ?>
			</footer>
			<?php } else { ?>
			<h2><a href="<?php echo get_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
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
				<?php 	} ?>
	</article>
	<!-- #post-## -->