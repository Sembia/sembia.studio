<?php
/**
 * Sembia functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sembia
 */

if ( ! function_exists( 'sembia_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sembia_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Sembia, use a find and replace
	 * to change 'sembia' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'sembia', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'sembia' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sembia_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


}
endif;
add_action( 'after_setup_theme', 'sembia_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sembia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sembia_content_width', 640 );
}
add_action( 'after_setup_theme', 'sembia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sembia_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sembia' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sembia' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sembia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
 function sembia_scripts() {
    wp_enqueue_style('sembia-style', get_template_directory_uri() . '/dist/css/site.min.css', array(), '5', 'screen');
    wp_enqueue_script('sembia-site-js', get_template_directory_uri() . '/dist/js/site.js', array('jquery'), '5', true);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'sembia_scripts' );

// Add support for woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
//Add .form-control to woo fields
add_filter('woocommerce_form_field_args',  'wc_form_field_args',10,3);
  function wc_form_field_args($args, $key, $value) {
  $args['input_class'] = array( 'form-control' );
  return $args;
}

// Register Custom Navigation Walker
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

// Custom files
require get_template_directory() . '/inc/utils.php';
require get_template_directory() . '/inc/page-extras.php';
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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


/**
 * Force Visual Composer to initialize as "built into the theme".
 * This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'livingfuture_vcSetAsTheme' );
function livingfuture_vcSetAsTheme() {
    vc_set_as_theme();
}
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    // Load Visual composer components
    require_once get_template_directory() . '/inc/vc/vc_remove.php';
    require_once get_template_directory() . '/inc/vc/vc_custom_param_types.php';
    require_once get_template_directory() . '/inc/vc/vc_components.php';

    add_filter('vc_shortcodes_css_class', function ($class_string, $tag) {
        $tags_to_clean = [
            'vc_row',
            'vc_column',
            'vc_row_inner',
            'vc_column_inner'
        ];
        if (in_array($tag, $tags_to_clean)) {

            $class_string = str_replace(' wpb_row', '', $class_string);
            $class_string = str_replace(' vc_row-fluid', '', $class_string);
            $class_string = str_replace(' vc_column_container', '', $class_string);
            $class_string = str_replace('wpb_column', '', $class_string);

            // replace vc_, but exclude any custom css
            // attached via vc_custom_XXX (negative lookahead)
            $class_string = preg_replace('/vc_(?!custom)/i', '', $class_string);

            // replace all vc_
            // $class_string = preg_replace('/vc_/i', '', $class_string);
        }
        $class_string = preg_replace('|col-sm|', 'col-sm', $class_string);
        return $class_string;
    }, 10, 2);

}
