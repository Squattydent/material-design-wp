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
		<div class="row">
			<?php
       if ( is_single() ) { 
			/*-----------------------------------------------------
			Single articl content 
			-----------------------------------------------------*/?>
				<div class="col s12" id="single-content-container">
					<?php if ( has_post_thumbnail() ) { ?>
					<div class="post-featured-img">
						<?php $thumbnail = get_post( get_post_thumbnail_id() );	?>
						<img class="materialboxed responsive-img" alt="<?php echo get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true ); ?>" title="<?php echo $thumbnail->post_title; ?>" data-caption="<?php echo $thumbnail->post_excerpt; ?>" src="<?php the_post_thumbnail_url('large'); ?>">
						<br>
						<a href="<?php the_post_thumbnail_url('full'); ?>" target="_blank" class="waves-effect waves-dark btn full-img-btn">Full Size Image</a>
					</div>
					<?php } /*-- Post thumbnail  --*/	?>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</div>
				<?php if ( 'post' === get_post_type() ) { ?>
				<div class="col s12" id="single-entry-meta-container">
					<div class="entry-meta">
						<?php materializecss_theme_posted_on();?>
					</div>
				</div>
				<?php } /*-- Posted On  --*/ ?>
				<div class="col s12" id="single-related-posts-container">
					<div class="row" style="margin:0;">
						<?php	
					$prev_post = get_previous_post();
					$prev_ex_con = ( $prev_post->post_excerpt ) ? $prev_post->post_excerpt : strip_shortcodes( $prev_post->post_content );
					$prev_text = wp_trim_words( apply_filters( 'the_excerpt', $prev_ex_con ), 15 );

					$next_post = get_next_post();
					$next_ex_con = ( $next_post->post_excerpt ) ? $next_post->post_excerpt : strip_shortcodes( $next_post->post_content );
					$next_text = wp_trim_words( apply_filters( 'the_excerpt', $next_ex_con ), 15 );

					if (!empty($prev_post) && !empty($next_post)) {
						$adjacent_posts = "2";
					}
					else {
						$adjacent_posts = "1";
					} 
					if (!empty( $prev_post )) { ?>
							<div class="col s12 m12 l<?php echo 12 / $adjacent_posts; ?>" style="padding:0;">
								<div class="adjacent-post" id="prev-post-container">
									<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post->post_title; ?></a>
									<p>
										<?php echo $prev_text; ?>
									</p>
									<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="left"><i class="material-icons">keyboard_arrow_left</i></a>
								</div>
							</div>
							<?php }
					    if (!empty( $next_post )) { ?>
							<div class="col s12 m12 l<?php echo 12 / $adjacent_posts; ?>" style="padding:0;">
								<div class="adjacent-post" id="next-post-container">
									<a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a>
									<p>
										<?php echo $next_text; ?>
									</p>
									<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="right"><i class="material-icons">keyboard_arrow_right</i></a>
								</div>
							</div>
							<?php } ?>
					</div>
				</div>
				<?php } else /* End of if is single */ { ?>
				<div class="col s12" id="list-post-container">
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
				</div>
				<?php } ?>
		</div>
	</article>