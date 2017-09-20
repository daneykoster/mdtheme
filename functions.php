<?php
/**
 * MDtheme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MDtheme
 */

if ( ! function_exists( 'mdtheme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mdtheme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on MDtheme, use a find and replace
		 * to change 'mdtheme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mdtheme', get_template_directory() . '/languages' );

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
		add_theme_support( 'custom-background', apply_filters( 'mdtheme_custom_background_args', array(
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
add_action( 'after_setup_theme', 'mdtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mdtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mdtheme_content_width', 640 );
}
add_action( 'after_setup_theme', 'mdtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mdtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mdtheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mdtheme' ),
		'before_widget' => '<section id="%1$s" class=" card widgetq %2$s"><div class="card-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="card-title">',
		'after_title'   => '</h2></div><div class="card-action">',
	) );
}
add_action( 'widgets_init', 'mdtheme_widgets_init' );

// Register custom menus and menu walkers
require get_template_directory() . '/assets/inc/enqueue-scripts.php';

// page navi blog
require get_template_directory() . '/assets/inc/pagination.php';


// Register custom menus and menu walkers
require get_template_directory() . '/assets/inc/menu.php'; 

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/assets/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/assets/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/assets/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/assets/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/assets/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/assets/inc/woocommerce.php';
}

/**
 * Add one or more classes to the WordPress search form's 'Search' button
 * @author Alain Schlesser (alain.schlesser@gmail.com)
 * @link http://www.brightnucleus.com/add-class-wordpress-search-button/
 *
 * @param  string  $form   the search form HTML output
 * @return string          modified version of the search form HTML output
 *
 * @see http://codex.wordpress.org/Function_Reference/get_search_form
 * @see http://developer.wordpress.org/reference/hooks/get_search_form/
 */
function as_adapt_search_form( $form ) {
    // $forms contains the rendered HTML output of the standard search form
    // the exact output is changed if your theme has declared HTML5 support
    // with the following minimum settings:
    //
    // add_theme_support( 'html5', array( 'search-form' ) );
    //
    // see http://codex.wordpress.org/Function_Reference/add_theme_support
    // add Foundation classes to the button class
    //
    // we do a string replace and search for 'search-submit', which is the one
    // class that is already defined for the HTML5 search form
    //
    // if HTML5 search-form support has not been defined, this will leave the
    // HTML output unchanged
    $form = str_replace(
        'search-submit',
        'btn waves-effect',
        $form
    );
    // return the modified string
    return $form;
}
// run the search form HTML output through the newly defined filter
add_filter( 'get_search_form', 'as_adapt_search_form' );


// remove query from string
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

//remove p tag
//remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
?>


