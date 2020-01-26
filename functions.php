<?php
define('BOOTSTRAP_VERSION', '4.4.1');

// require_once('bs4navwalker.php');
// wp_nav_menu()

require_once( 'bootstrap-utilities.php' );
require_once( 'bs4navwalker.php' );


if ( ! function_exists( 'foodzone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function foodzone_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Thunder, use a find and replace
		 * to change 'thunder' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'foodzone', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'foodzone' ),
		) );
        register_nav_menus(array('primary' => 'Primary Navigation'));
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
		add_theme_support( 'custom-background', apply_filters( 'thunder_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'foodzone_setup' );


function foodzone_scripts() {

	// Get theme version number (located in style.css)
	$theme = wp_get_theme();
	wp_register_script('bootstrap', get_template_directory_uri(). '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), BOOTSTRAP_VERSION, true);
		wp_enqueue_script('bootstrap');
		
		wp_register_script( 'site', get_template_directory_uri().'/assets/js/site.js', array( 'jquery', 'bootstrap' ), $theme->get( 'Version' ), true );
		wp_enqueue_script( 'site' );

		wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css', array(), BOOTSTRAP_VERSION, 'all' );
		wp_enqueue_style( 'bootstrap' );

		wp_register_style( 'mystyle', get_stylesheet_directory_uri().'/assets/css/mystyle.css', array(), '20191212', 'all' );
		wp_enqueue_style( 'mystyle' );
		
		wp_register_style( 'screen', get_stylesheet_directory_uri().'/assets/style.css', array(), $theme->get( 'Version' ), 'screen' );
		wp_enqueue_style( 'screen' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'foodzone_scripts' );

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Widgets additions.
 */
require get_template_directory() . '/inc/widgets.php';


?>