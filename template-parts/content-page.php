<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materializecss-theme
 */

?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="card">
			<div class="card-content">
				<h1><?php the_title(); ?></h1>
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</article>