<?php
/**
 * understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'understrap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function understrap_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on understrap, use a find and replace
	 * to change 'understrap' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'understrap', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'understrap' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'understrap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // understrap_setup
add_action( 'after_setup_theme', 'understrap_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function understrap_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'understrap' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Home Main', 'understrap' ),
		'id'            => 'widget-home',
		'description'   => '',
		'before_widget' => '<div class="row" style="margin-top: 20px;"><div class="container">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}

add_action( 'widgets_init', 'understrap_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function understrap_scripts() {

	wp_enqueue_style( 'minified-styles', get_template_directory_uri() . '/min.css');

	wp_enqueue_style( 'fonts', 'http://fonts.googleapis.com/css?family=Roboto');

	wp_enqueue_script( 'minified-scripts', get_template_directory_uri() . '/dist/x.js', array('jquery'), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'understrap_scripts' );


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

/*
*	This code adds theme support for featured images
*/

add_theme_support( 'post-thumbnails' );

/*
*	This code adds support for the boats and services info on the homepage
*/

// add_action( 'init', 'create_post_type' );
// function create_post_type() {
//   register_post_type( 'boat',
//     array(
//       'labels' => array(
//         'name' => __( 'Boats' ),
//         'singular_name' => __( 'Boat' ),
//          'add_new_item' => __('Add New Boat')
//       ),
//       'public' => true,
//       'has_archive' => true,
//       'supports' => array( 'title', 'editor', 'thumbnail' )
//     )
//   );
//   register_post_type( 'service',
//     array(
//       'labels' => array(
//         'name' => __( 'Services' ),
//         'singular_name' => __( 'Service' ),
//         'add_new_item' => __('Add New Service')
//       ),
//       'public' => true,
//       'has_archive' => true,
//       'supports' => array( 'title', 'editor', 'thumbnail' )
//     )
//   );
// }