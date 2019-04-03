<?php
/**
 * optimistic-blog-lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Optimistic_Blog_Lite
 */

if ( ! function_exists( 'optimistic_blog_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function optimistic_blog_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on optimistic-blog-lite, use a find and replace
		 * to change 'optimistic-blog-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'optimistic-blog-lite', get_template_directory() . '/languages' );

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
		add_image_size( 'optimistic-blog-lite-thumbnail-1', 300, 182, true );
		add_image_size( 'optimistic-blog-lite-thumbnail-2', 640, 425, true );
		add_image_size( 'optimistic-blog-lite-thumbnail-3', 748, 421, true );
		add_image_size( 'optimistic-blog-lite-thumbnail-4', 360, 216, true ); 
		add_image_size( 'optimistic-blog-lite-thumbnail-5', 200, 120, true ); 
		add_image_size( 'optimistic-blog-lite-thumbnail-6', 950, 400, true ); // Banner One Image Size

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'optimistic-blog-lite' ),
			'menu-2' => esc_html__( 'Footer Menu', 'optimistic-blog-lite' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'optimistic_blog_lite_custom_background_args', array(
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
			'height'      => 130,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add theme support for post-formats
		add_theme_support( 'post-formats', array( 'gallery', 'link', 'audio', 'video' ) );
	}
endif;
add_action( 'after_setup_theme', 'optimistic_blog_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function optimistic_blog_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'optimistic_blog_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'optimistic_blog_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function optimistic_blog_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'optimistic-blog-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'optimistic-blog-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s wow fadeInUp"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisement Area', 'optimistic-blog-lite' ),
		'id'            => 'adspace-1',
		'description'   => esc_html__( 'Add advertisement here.', 'optimistic-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'optimistic-blog-lite' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'optimistic-blog-lite' ),
		'before_widget' => '<div class="col-md-4"><div class="footer-block"><div id="%1$s" class="widget footer-widget-content %2$s">',
		'after_widget'  => '</div></div></div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );


}
add_action( 'widgets_init', 'optimistic_blog_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function optimistic_blog_lite_scripts() {

	wp_enqueue_style( 'optimistic-blog-lite-style', get_stylesheet_uri() );

	wp_enqueue_style( 'optimistic-blog-lite-fonts', optimistic_blog_lite_fonts_url() );

	wp_enqueue_style( 'optimistic-blog-lite-custom-style', get_template_directory_uri() . '/offshorethemes/assets/dist/css/main.min.css' );

	wp_enqueue_script( 'optimistic-blog-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'optimistic-blog-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if( WP_DEBUG ) {

		wp_enqueue_script('bootstrap', get_template_directory_uri() .'/offshorethemes/assets/src/js/vendor/bootstrap.js' , array('jquery'), '20151215', true);

		wp_enqueue_script('owl', get_template_directory_uri() .'/offshorethemes/assets/src/js/plugins/owl.js' , array('jquery'), '20151215', true);

		wp_enqueue_script('sticky-sidebar', get_template_directory_uri() .'/offshorethemes/assets/src/js/plugins/sticky-sidebar.js' , array('jquery'), '20151215', true);

		wp_enqueue_script('swiper', get_template_directory_uri() .'/offshorethemes/assets/src/js/plugins/swiper.js' , array('jquery'), '20151215', true);

		wp_enqueue_script('wow', get_template_directory_uri() .'/offshorethemes/assets/src/js/plugins/wow.js' , array('jquery'), '20151215', true);

		wp_enqueue_script('jquery-meanmenu', get_template_directory_uri() .'/offshorethemes/assets/src/js/plugins/jquery.meanmenu.js' , array('jquery'), '20151215', true);

		wp_enqueue_script('optimistic-blog-lite-custom', get_template_directory_uri() .'/offshorethemes/assets/src/js/custom/custom.js' , array('jquery', 'masonry'), '20151215', true);

	} else {
		wp_enqueue_script( 'optimistic-blog-lite-bundle', get_template_directory_uri() . '/offshorethemes/assets/dist/js/bundle.min.js', array('jquery'), '20151215', true );

		wp_enqueue_script( 'optimistic-blog-lite-custom', get_template_directory_uri() . '/offshorethemes/assets/dist/js/custom.js', array('jquery', 'masonry'), '20151215', true );
	}
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'optimistic_blog_lite_scripts' );



/**
 * Admin Enqueue scripts and styles.
*/
if ( ! function_exists( 'optimistic_blog_lite_admin_scripts' ) ) {

    function optimistic_blog_lite_admin_scripts( $hook ) {

    	if( $hook != 'edit.php' && $hook != 'post.php' && $hook != 'post-new.php' && 'widgets.php' != $hook )

        return;

        wp_enqueue_script('optimistic-blog-lite-admin-script', get_template_directory_uri() . '/offshorethemes/assets/dist/js/optimisticbloglite-admin.js', array( 'jquery', 'customize-controls' ) );       

        wp_enqueue_style( 'optimistic-blog-lite-admin-style', get_template_directory_uri() . '/offshorethemes/assets/dist/css/optimisticbloglite-admin.css');    
    }
}
add_action('admin_enqueue_scripts', 'optimistic_blog_lite_admin_scripts');


/**
 * Require init.
*/
require  trailingslashit( get_template_directory() ).'offshorethemes/init.php';