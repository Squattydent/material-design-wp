<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materializecss-theme
 */

?>
</main>
	<footer class="page-footer light-blue darken-1">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="white-text">
							<?php bloginfo( 'name' ); ?>
						</a>
					</h5>
					<p class="grey-text text-lighten-4"><?php bloginfo('description'); ?></p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Footer Menu</h5>
					<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu') ); ?>
				</div>
			</div>
		</div>
		<div class="footer-copyright light-blue darken-3">
			<div class="container">
				<span>Theme by <a class="white-text" href="http://www.lugdev.com/" rel="designer">Lugdev.com</a></span>
				<a class="grey-text text-lighten-4 right" href="<?php echo esc_url( __( 'https://wordpress.org/', 'materializecss-theme' ) ); ?>">
				<?php printf( esc_html__( 'Proudly powered by %s', 'materializecss-theme' ), 'WordPress' ); ?>
				</a>
			</div>
		</div>
	</footer>

	<?php wp_footer(); ?>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- Compiled and minified Materialize JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
	<!-- Our File materialize-wordpress.js  -->
	<script src="<?php echo site_url(); ?>/wp-content/themes/materializecss-theme/js/materialize-wordpress.js"></script>
	</body>

	</html>