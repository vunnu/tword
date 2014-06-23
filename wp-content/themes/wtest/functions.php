<?php
/**
 * wtest functions and definitions
 *
 * @package wtest
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'wtest_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wtest_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wtest, use a find and replace
	 * to change 'wtest' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wtest', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wtest' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wtest_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // wtest_setup
add_action( 'after_setup_theme', 'wtest_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wtest_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wtest' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'wtest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wtest_scripts() {
	wp_enqueue_style( 'wtest-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wtest-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'wtest-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wtest_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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


function cwd_wp_bootstrap_scripts_styles() {
//     Loads Bootstrap minified JavaScript file.
    wp_enqueue_script('bootstrapjs', '//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js', array('jquery'),'3.0.0', true );
    // Loads Bootstrap minified CSS file.
    wp_enqueue_style('bootstrapwp', '//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css', false ,'3.0.0');
    // Loads our main stylesheet.
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array('wtest') ,'1.0');
//    wp_enqueue_style('globalcss', get_stylesheet_directory_uri() . '/superglobal.css', array('wtest') ,'1.0');
}

add_action('wp_enqueue_scripts', 'cwd_wp_bootstrap_scripts_styles');

register_nav_menus( array(
    'main_top_menu' => 'Main Top Menu',
    'main_page_menu' => 'Main Page Menu',
    'footer_menu' => 'Footer Menu'
) );



function my_wp_nav_menu_args( $args = '' ) {
    $args['container'] = false;
    return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );