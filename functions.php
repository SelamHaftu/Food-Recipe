<?php

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
		 * If you're building a theme based on foodzone, use a find and replace
		 * to change 'foodzone' to the name of your theme in all the template files.
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
		add_theme_support( 'custom-background', apply_filters( 'foodzone_custom_background_args', array(
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
	wp_register_script('bootstrap', get_template_directory_uri(). '/assets/js/bootstrap.bundle.min.js', array( 'jquery' ), '4.4.1', true);
		wp_enqueue_script('bootstrap');
		
		wp_register_script( 'site', get_template_directory_uri().'/assets/js/site.js', array( 'jquery', 'bootstrap' ), $theme->get( 'Version' ), true );
		wp_enqueue_script( 'site' );

		wp_register_style( 'bootstrap', get_stylesheet_directory_uri().'/assets/css/bootstrap.min.css', array(), '4.4.1', 'all' );
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


function foodzone_add_editor_style (){
	add_editor_style('assets/css/mystyle.css');
} 
add_action('admin_init','foodzone_add_editor_style');
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

function foodrecipie_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'foodzone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'foodzone' ),
		'before_widget' => '<section id="%1$s" class="widget side-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="cards mb-3"><div class="card-body"><h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'foodrecipie_widgets_init' );
add_theme_support( 'post-thumbnails' ); 
if ( ! isset( $content_width ) ) $content_width = 900;


function foodrecipie_custom_logo_setup() {
	$defaults = array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
	);
	add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'foodrecipie_custom_logo_setup' );
?>