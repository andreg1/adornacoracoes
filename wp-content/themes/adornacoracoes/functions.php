<?php
/**
 * adornacoracoes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package adornacoracoes
 */

if ( ! function_exists( 'adornacoracoes_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function adornacoracoes_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on adornacoracoes, use a find and replace
		 * to change 'adornacoracoes' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'adornacoracoes', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'adornacoracoes' ),
		) );
       function wpb_custom_new_menu() {
  register_nav_menus(
    array(
      'my-custom-menu' => __( 'My Custom Menu' ),
      /*'extra-menu' => __( 'Extra Menu' )*/
    )
  );
}
add_action( 'init', 'wpb_custom_new_menu' );

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
		add_theme_support( 'custom-background', apply_filters( 'adornacoracoes_custom_background_args', array(
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
add_action( 'after_setup_theme', 'adornacoracoes_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adornacoracoes_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adornacoracoes_content_width', 640 );
}
add_action( 'after_setup_theme', 'adornacoracoes_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adornacoracoes_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adornacoracoes' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'adornacoracoes' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'adornacoracoes_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adornacoracoes_scripts() {
	wp_enqueue_style( 'adornacoracoes-style', get_stylesheet_uri() );

	wp_enqueue_script( 'adornacoracoes-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'adornacoracoes-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'adornacoracoes_scripts' );

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

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'home' ) );
    return $query;
}

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}


/**
POLYLANG
*/
load_theme_textdomain('adornacoracoes', get_template_directory() . '/languages');

add_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_textdomain('adornacoracoes', get_template_directory() . '/languages');
}

/**
 * ACF Options Page
 */
if ( function_exists( 'acf_add_options_page' ) ) {

  // Main Theme Settings Page
  $parent = acf_add_options_page( array(
    'page_title' => 'Traduções',
    'menu_title' => 'Tradução',
    'redirect'   => 'Theme Settings',
  ) );

  $languages = array( 'pt', 'en', 'fr' );
  foreach ( $languages as $lang ) {
    acf_add_options_sub_page( array(
      'page_title' => 'Tradução (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Tradução (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "options-${lang}",
      'post_id'    => $lang,
      'parent'     => $parent['menu_slug']
    ) );
  }
}

if ( function_exists( 'acf_add_options_page' ) ) {

  // Main Theme Settings Page
  $parent = acf_add_options_page( array(
    'page_title' => 'Assets',
    'menu_title' => 'Assets',
    'redirect'   => 'Theme Settings',
  ) );
}

?>
