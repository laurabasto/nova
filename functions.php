<?php
/**
 * nova functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package nova
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'nova_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function nova_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on nova, use a find and replace
		 * to change 'nova' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'nova', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'nova' ),
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
				'nova_custom_background_args',
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
	}
endif;
add_action( 'after_setup_theme', 'nova_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nova_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nova_content_width', 640 );
}
add_action( 'after_setup_theme', 'nova_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nova_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'nova' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'nova' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Footer', 'nova' ),
			'id'            => 'footer-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'nova' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'nova_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nova_scripts() {
	wp_enqueue_style( 'nova-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'slick-css',  get_template_directory_uri().'/css/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'vc-css-component',  get_template_directory_uri().'/vc_extend/vc_css_component.css', array(), _S_VERSION );
	wp_enqueue_style( 'slick-theme',  get_template_directory_uri().'/css/slick-theme.css', array(), _S_VERSION );
	wp_style_add_data( 'nova-style', 'rtl', 'replace' );

	wp_enqueue_script( 'nova-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'nova-plugins', get_template_directory_uri() . '/js/nova_plugins.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'waypoints-plugins', get_template_directory_uri() . '/js/jquery.waypoints.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'counterup-plugins', get_template_directory_uri() . '/js/jquery.counterup.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nova_scripts' );
/**
 * VC elements.
 */
require get_template_directory() . '/vc_extend/vc_functions.php';
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
function wpb_custom_new_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'wpb_custom_new_menu' );


function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');
//[year]
function themeNova_telephone( $wp_customize ) {
    $wp_customize->add_setting('telephone', array(
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'telephone_control', array(
        'label' => __('Teléfono', 'Nova'),
        'section' => 'title_tagline',
        'settings' => 'telephone',
    )));
}
add_action('customize_register', 'themeNova_telephone');

function themeNova_mail( $wp_customize ) {
    $wp_customize->add_setting('mail', array(
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'mail_control', array(
        'label' => __('Correo Electrónico', 'Nova'),
        'section' => 'title_tagline',
        'settings' => 'mail',
    )));
}
add_action('customize_register', 'themeNova_mail');


add_image_size( 'vc_slider_content', 800, 533, true );
add_image_size( 'thumb-sustentabilidad', 800, 800, true );
add_image_size( 'thumb-timeline', 1000, 410, true );

function wpse124075_setup_theme() {
    global $content_width;
    if ( ! isset( $content_width ) ) {
        $content_width = 1000; // your value here, in pixels
    }
}
add_action( 'after_setup_theme', 'wpse124075_setup_theme' );

add_shortcode( 'icon_info', 'settings_icon_info' );

function settings_icon_info( $atts) {
	$a = shortcode_atts( array(
			'class-icon' => '',
			'text' => '',
		), $atts );
		
  $output = '<div class="icon_info"><i class="'.$a['class-icon'].'" aria-hidden="true"></i> <span>'.$a['text'].'<span></div>';
 	return $output;
}

function get_excerpt( $count, $id_post ) {
$permalink = get_permalink( $id_post);
$excerpt = get_the_excerpt();
$excerpt = strip_tags($excerpt); //retira las etiqueta de html
$excerpt = substr($excerpt, 0, $count);
$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
$excerpt = '<p>'.$excerpt.'...</p>';
return $excerpt;
}

add_filter( 'use_widgets_block_editor', '__return_false' );