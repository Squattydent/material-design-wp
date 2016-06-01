<?php
/**
 * materializecss-theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package materializecss-theme
 */

if ( ! function_exists( 'materializecss_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function materializecss_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on materializecss-theme, use a find and replace
	 * to change 'materializecss-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'materializecss-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'materializecss-theme' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'materializecss_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	
	add_image_size( 'archive-list-img', 420, 420 );
	add_image_size( 'featured-img', 1200, 1200 );
	
}
endif;
add_action( 'after_setup_theme', 'materializecss_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function materializecss_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'materializecss_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'materializecss_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function materializecss_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'materializecss-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'materializecss-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<span class="widget-title">',
		'after_title'   => '</span>',
	) );
}
add_action( 'widgets_init', 'materializecss_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materializecss_theme_scripts() {
	wp_enqueue_style( 'materializecss-theme-style', get_stylesheet_uri() );

	/* We Won't need the Navigation Support from _s original Theme */
	// wp_enqueue_script( 'materializecss-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	/* We won't use the Skip Link funtionnalities anyway */
	// wp_enqueue_script( 'materializecss-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'materializecss_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
/* No use of the Custom Header for now */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// =========================================================================
// DISPLAY APPROPRIATE TITLE IN HEADER
// =========================================================================

function headerTitle() {
	if (is_category()) {
		single_cat_title();
	} elseif (is_page() or is_single()) {
	the_title();
	} elseif (is_author()) {
		the_author();
	} elseif (is_search()) {
		printf( esc_html__( 'Search Results for: %s', 'materializecss-theme' ), '<span>' . get_search_query() . '</span>' );
	} elseif (is_tag()) {
		single_tag_title();
	} elseif (is_404()) {
		echo "Code 404";
	} elseif (is_archive()) {
		the_archive_title ();
	}
	
}

// =========================================================================
// REMOVE WP HARD CODED IMAGES DIMENSIONS
// =========================================================================

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}


// =========================================================================
// DYNAMIC THEME COLORS & SOCIAL SETTINGS
// =========================================================================

function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Theme Config</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_theme_page("Theme Config", "Theme Config", "manage_options", "theme-config", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function display_color_help_element()
{
	?>
    	<p>Create your default Material Palette to give a nice look to your blog. To help you understand the roles of colors on Material Design, report to <a href="http://www.materialpalette.com/" target="_blank">Material Palette</a>.</p>
    <?php
}

function display_primary_color_element()
{
	?>
			<label>Used on Header & Footer Backgroud + Titles</label><br>
    	<input type="text" name="primary_color" id="primary_color" value="<?php echo get_option('primary_color'); ?>" />
    <?php
}

function display_dark_primary_color_element()
{
	?>
			<label>Used in copyright footer background</label><br>
    	<input type="text" name="dark_primary_color" id="dark_primary_color" value="<?php echo get_option('dark_primary_color'); ?>" />
    <?php
}

function display_light_primary_color_element()
{
	?>
			<label>Not used at the moment</label><br>
    	<input type="text" name="light_primary_color" id="light_primary_color" value="<?php echo get_option('light_primary_color'); ?>" />
    <?php
}

function display_accent_color_element()
{
	?>
			<label>Used on links in contents, should be dark enough to display on white or light grey background.</label><br>
    	<input type="text" name="accent_color" id="accent_color" value="<?php echo get_option('accent_color'); ?>" />
    <?php
}

function display_button_color_element()
{
	?>
			<label>Used on all buttons !</label><br>
    	<input type="text" name="button_color" id="button_color" value="<?php echo get_option('button_color'); ?>" />
    <?php
}

function display_primary_text_element()
{
	?>
			<label>Used on mosts texts and contents</label><br>
    	<input type="text" name="primary_text" id="primary_text" value="<?php echo get_option('primary_text'); ?>" />
    <?php
}

function display_secondary_text_element()
{
	?>
			<label>Used on widget titles and secondary contents</label><br>
    	<input type="text" name="secondary_text" id="secondary_text" value="<?php echo get_option('secondary_text'); ?>" />
    <?php
}

function display_divider_color_element()
{
	?>
			<label>Used to divide elements and as input border</label><br>
    	<input type="text" name="divider_color" id="divider_color" value="<?php echo get_option('divider_color'); ?>" />
    <?php
}

function display_social_help_element()
{
	?>
    	<p>Display links to your social pages in the footer of the Website.</p>
    <?php
}

function display_facebook_url_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" style="width:100%;"/>
    <?php
}

function display_gplus_url_element()
{
	?>
    	<input type="text" name="gplus_url" id="gplus_url" value="<?php echo get_option('gplus_url'); ?>" style="width:100%;"/>
    <?php
}

function display_instagram_url_element()
{
	?>
    	<input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" style="width:100%;"/>
    <?php
}

function display_twitter_url_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" style="width:100%;"/>
    <?php
}

function display_github_url_element()
{
	?>
    	<input type="text" name="github_url" id="github_url" value="<?php echo get_option('github_url'); ?>" style="width:100%;"/>
    <?php
}

function display_pinterest_url_element()
{
	?>
    	<input type="text" name="pinterest_url" id="pinterest_url" value="<?php echo get_option('pinterest_url'); ?>" style="width:100%;"/>
    <?php
}

function display_email_address_element()
{
	?>
    	<input type="email" name="email_address" id="email_address" value="<?php echo get_option('email_address'); ?>" style="width:100%;"/>
    <?php
}




function display_theme_config_fields()
{
	/*- Colors -*/
	add_settings_section("section", "Color Options", null, "theme-options");
	add_settings_field("color_help", "Material Color Palette", "display_color_help_element", "theme-options", "section");
	add_settings_field("primary_color", "Primary Color", "display_primary_color_element", "theme-options", "section");
	add_settings_field("dark_primary_color", "Dark Primary Color", "display_dark_primary_color_element", "theme-options", "section");
	add_settings_field("light_primary_color", "Light Primary Color", "display_light_primary_color_element", "theme-options", "section");
	add_settings_field("button_color", "Buttons Color", "display_button_color_element", "theme-options", "section");
	add_settings_field("accent_color", "Accent Color", "display_accent_color_element", "theme-options", "section");
	add_settings_field("primary_text", "Primary Text", "display_primary_text_element", "theme-options", "section");
	add_settings_field("secondary_text", "Secondary Text", "display_secondary_text_element", "theme-options", "section");
	add_settings_field("divider_color", "Divider Color", "display_divider_color_element", "theme-options", "section");
	register_setting("section", "primary_color");
	register_setting("section", "dark_primary_color");
	register_setting("section", "light_primary_color");
	register_setting("section", "button_color");
	register_setting("section", "accent_color");
	register_setting("section", "primary_text");
	register_setting("section", "secondary_text");
	register_setting("section", "divider_color");
	/*- Social -*/
	add_settings_field("social_help", "Social Configuration", "display_social_help_element", "theme-options", "section");
	add_settings_field("facebook_url", "Facebook", "display_facebook_url_element", "theme-options", "section");
	add_settings_field("gplus_url", "Google Plus", "display_gplus_url_element", "theme-options", "section");
	add_settings_field("twitter_url", "Twitter", "display_twitter_url_element", "theme-options", "section");
	add_settings_field("instagram_url", "Instagram", "display_instagram_url_element", "theme-options", "section");
	add_settings_field("pinterest_url", "Pinterest", "display_pinterest_url_element", "theme-options", "section");
	add_settings_field("github_url", "Github", "display_github_url_element", "theme-options", "section");
	add_settings_field("email_address", "Email Address", "display_email_address_element", "theme-options", "section");
	register_setting("section", "facebook_url");
	register_setting("section", "gplus_url");
  register_setting("section", "twitter_url");
	register_setting("section", "instagram_url");
	register_setting("section", "pinterest_url");
	register_setting("section", "github_url");
	register_setting("section", "email_address");
}

add_action("admin_init", "display_theme_config_fields");

add_action('wp_head','material_styling');

function material_styling() { 
	$primary_color = get_option('primary_color');
	if (empty($primary_color)) {
		$primary_color = "#2196F3";
	}
	$dark_primary_color = get_option('dark_primary_color');
	if (empty($dark_primary_color)) {
		$dark_primary_color = "#1976D2";
	}
	$light_primary_color = get_option('light_primary_color');
  if (empty($light_primary_color)) {
		$light_primary_color = "#BBDEFB";
	}
	$button_color = get_option('button_color');
	if (empty($button_color)) {
		$button_color = "#FF5722";
	}
	$accent_color = get_option('accent_color');
  if (empty($accent_color)) {
		$accent_color = "#FF5722";
	}
	$primary_text = get_option('primary_text');
	if (empty($primary_text)) {
		$primary_text = "#212121";
	}
	$secondary_text = get_option('secondary_text');
	if (empty($secondary_text)) {
		$secondary_text = "#727272";
	}
	$divider_color = get_option('divider_color');
	if (empty($divider_color)) {
		$divider_color = "#e0e0e0";
	} ?>
	<style type="text/css">
		html {
		color: <?php echo $primary_text; ?>;
		}
		.menu-header {
		border-bottom: 1px solid <?php echo $divider_color; ?>;
		}
		.menu-header a,
		.menu-header a:hover {
			color: <?php echo $secondary_text; ?>!important;
		}
		{
			color: <?php echo $secondary_text; ?>;
		}
		header {
		background-color:<?php echo $primary_color; ?>;
		}
		.primary-color {
		background-color:<?php echo $primary_color; ?>!important;
		}
		.dark-primary-color {
		background-color:<?php echo $dark_primary_color; ?>!important;
		}
		label {
		color: <?php echo $secondary_text; ?>;
		}
		hr {
		color: <?php echo $divider_color; ?>;
		background-color: <?php echo $divider_color; ?>;
		}
		a {
		color: <?php echo $accent_color; ?>;
		}
		a:hover {
		color: <?php echo $accent_color; ?>;
		}
		h1,h2,h3,h4,h5,h6 {
		color: <?php echo $primary_color; ?>;
		}
		.btn:hover,
		.btn-large:hover {
		color: <?php echo $button_color; ?>;
		}
		blockquote {
		border-left: 5px solid <?php echo $accent_color; ?>;
		}
		.widget-title {
		color: <?php echo $secondary_text; ?>;
		}
		.widget {
		border-bottom: 0px solid <?php echo $divider_color; ?>;
		}
		input[type="button"],
		input[type="reset"],
		input[type="submit"] {
		background-color: <?php echo $button_color; ?>;
		}

		input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover {
		background-color: <?php echo $button_color; ?>;
		}
		
		input:not([type]),
		input[type=text],
		input[type=password],
		input[type=email],
		input[type=url],
		input[type=time],
		input[type=date],
		input[type=datetime],
		input[type=datetime-local],
		input[type=tel],
		input[type=number],
		input[type=search] {
			border-bottom: 1px solid <?php echo $divider_color; ?>;
		}

		input:not([type]):focus:not([readonly]),
		input[type=text]:focus:not([readonly]),
		input[type=password]:focus:not([readonly]),
		input[type=email]:focus:not([readonly]),
		input[type=url]:focus:not([readonly]),
		input[type=time]:focus:not([readonly]),
		input[type=date]:focus:not([readonly]),
		input[type=datetime]:focus:not([readonly]),
		input[type=datetime-local]:focus:not([readonly]),
		input[type=tel]:focus:not([readonly]),
		input[type=number]:focus:not([readonly]),
		input[type=search]:focus:not([readonly]),
		textarea.materialize-textarea:focus:not([readonly]) {
		border-bottom: 1px solid <?php echo $accent_color; ?>;
		box-shadow: 0 1px 0 0 <?php echo $accent_color; ?>;
		}
		textarea {
		border-bottom: 1px solid <?php echo $divider_color; ?>;
		}
		textarea:focus {
		border-bottom: 1px solid <?php echo $accent_color; ?>;
		box-shadow: 0 1px 0 0 <?php echo $accent_color; ?>;
		}
		#footer-menu li a,
		#footer-menu ul li a
		{
		color: <?php echo $button_color; ?>;
		}
		.side-nav a,
		.side-nav a:hover {
		color:<?php echo $primary_text; ?>;
		}
		.sub-menu .current-menu-item a {
		color: <?php echo $primary_color; ?>;
		}
		#search-btn, #close-btn, #btn-share {
			background-color:<?php echo $button_color; ?>;
		}
		#share-modal a, #share-modal h4 {
			color:<?php echo $secondary_text; ?>;
		}
		#share-modal a:hover {
			color:<?php echo $primary_text; ?>;
		}
		.adjacent-post {
			background-color:<?php echo $primary_color; ?>;
		}
		.related-post-title{
			color:<?php echo $secondary_text; ?>;
		}
		.widget_nav_menu .sub-menu .current-menu-item a {
				color: <?php echo $accent_color; ?>!important;
		}
		.list-post-background {
			background-color:<?php echo $primary_color; ?>;
		}
		.list-link-btn,
		.list-link-btn:hover {
			background-color:<?php echo $button_color; ?>;
		}
		.posts-navigation a {
			color:<?php echo $accent_color; ?>;
		}
	</style>
<?php }


// =========================================================================
// REMOVE JUNK FROM HEAD
// =========================================================================
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version

remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links

remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)

remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );


// =========================================================================
// OPEN GRAPH PROTOCOLE
// =========================================================================


add_action('wp_head','open_graph');

function open_graph() {
	if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
		<meta property="og:url" content="<?php the_permalink() ?>"/>
		<meta property="og:title" content="<?php single_post_title(''); ?>" />
		<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php the_post_thumbnail_url('medium'); ?>" />
	<?php }

