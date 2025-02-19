<?php
/**
 * J.Vuichard SA functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package J.Vuichard_SA
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function menuiserie_charpente_semsales_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on J.Vuichard SA, use a find and replace
		* to change 'menuiserie-charpente-semsales' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'menuiserie-charpente-semsales', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'menuiserie-charpente-semsales' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'menuiserie_charpente_semsales_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support(
		'custom-header',
		apply_filters(
			'menuiserie_charpente_semsales_custom_header_args',
			array(
				'width'              => 1920,
				'height'             => 1080,
				'flex-height'        => true,
				'flex-width'         => true,
				'default-image'      => '',
			)
		)
	);
}
add_action( 'after_setup_theme', 'menuiserie_charpente_semsales_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function menuiserie_charpente_semsales_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'menuiserie_charpente_semsales_content_width', 640 );
}
add_action( 'after_setup_theme', 'menuiserie_charpente_semsales_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function menuiserie_charpente_semsales_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'menuiserie-charpente-semsales' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'menuiserie-charpente-semsales' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'menuiserie_charpente_semsales_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function menuiserie_charpente_semsales_scripts() {
	wp_enqueue_style( 'menuiserie-charpente-semsales-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'menuiserie-charpente-semsales-style', 'rtl', 'replace' );

	wp_enqueue_script( 'menuiserie-charpente-semsales-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'menuiserie_charpente_semsales_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function register_footer_widget_areas() {
	register_sidebar(array(
		'name'          => esc_html__('Footer Widget 1', 'menuiserie-charpente-semsales'),
		'id'            => 'footer-1',
		'description'   => esc_html__('Add widgets here.', 'menuiserie-charpente-semsales'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Widget 2', 'menuiserie-charpente-semsales'),
		'id'            => 'footer-2',
		'description'   => esc_html__('Add widgets here.', 'menuiserie-charpente-semsales'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));

	register_sidebar(array(
		'name'          => esc_html__('Footer Widget 3', 'menuiserie-charpente-semsales'),
		'id'            => 'footer-3',
		'description'   => esc_html__('Add widgets here.', 'menuiserie-charpente-semsales'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'register_footer_widget_areas');

function add_custom_image_sizes() {
    add_image_size('mobile-header', 576, 300, true);      // Pour mobile standard
    add_image_size('mobile-header-2x', 1152, 600, true);  // Pour mobile haute densité
    add_image_size('tablet-header', 768, 400, true);      // Pour tablette standard
    add_image_size('tablet-header-2x', 1536, 800, true);  // Pour tablette haute densité
	add_image_size('desktop-header', 1920, 1080, true);
}
add_action('after_setup_theme', 'add_custom_image_sizes');