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
	<footer class="page-footer primary-color">
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
					<h5 class="white-text"></h5>
				</div>
			</div>
		</div>
		<div class="footer-copyright dark-primary-color">
			<div class="container">
				<span>Theme by <a class="white-text" href="http://www.lugdev.com/" rel="designer">Lugdev.com</a></span>
				<a class="grey-text text-lighten-4 right" href="<?php echo esc_url( __( 'https://wordpress.org/', 'materializecss-theme' ) ); ?>">
				<?php printf( esc_html__( 'Proudly powered by %s', 'materializecss-theme' ), 'WordPress' ); ?>
				</a>
			</div>
		</div>
	</footer>

	<!-- Share Modal -->
	<div id="share-modal" class="modal">
		<div class="modal-content">
			<a href="#!" class=" modal-action modal-close btn-flat right"><i class="material-icons">close</i></a>
			<h4>Share</h4>
			<ul>
				<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" target="_blank"><i class="fa fa-facebook" id="fb-share-icon" aria-hidden="true"></i>Facebook</a></li>
				<li><a href="https://twitter.com/intent/tweet?text=<?php headerTitle();?> <?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" target="_blank"><i class="fa fa-twitter" id="twitter-share-icon" aria-hidden="true"></i>Twitter</a></li>
				<li><a href="https://plus.google.com/share?url=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" target="_blank"><i class="fa fa-google-plus" id="gplus-share-icon" aria-hidden="true"></i>Google Plus</a></li>
				<li><a href="mailto:?subject=<?php headerTitle();?>&body=<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>" target="_blank"><i class="fa fa-envelope-o" id="email-share-icon" aria-hidden="true"></i>Email</a></li>
			</ul>
		</div>
	</div>

	<?php wp_footer(); ?>
	<!--Import jQuery before materialize.js-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- Compiled and minified Materialize JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
  <!-- JQuery Ui Min js  -->
	<script src="<?php echo site_url(); ?>/wp-content/themes/materializecss-theme/js/jquery-ui.min.js"></script>
	<!-- Our File materialize-wordpress.js  -->
	<script src="<?php echo site_url(); ?>/wp-content/themes/materializecss-theme/js/materialize-wordpress.js"></script>
	</body>

	</html>