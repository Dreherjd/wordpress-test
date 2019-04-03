<?php
/**
 * components functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cleanews
 */

if ( ! function_exists( 'cleanews_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the aftercomponentsetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */



function cleanews_setup() {


	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'cleanews' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'cleanews', get_template_directory() . '/languages' );

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

	add_image_size( 'cleanews-featured-image', 800, 9999 );
	add_image_size( 'cleanews-portfolio-featured-image', 800, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'cleanews' ),
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
        'gallery',
        ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'cleanews_custom_background_args', array(
		'default-color' => 'eeeeee',
		'default-image' => '',
       ) ) );


}
endif;
add_action( 'after_setup_theme', 'cleanews_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cleanews_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cleanews_content_width', 640 );
}
add_action( 'after_setup_theme', 'cleanews_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cleanews_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'cleanews' ),
        'description'   => esc_html__( 'Widgets in this sidebar will appear throughout the site. It is the default sidebar if no others are in use.', 'cleanews' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s ">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widgets', 'cleanews' ),
        'description'   => esc_html__( 'Widgets appearing above the footer of the site.', 'cleanews' ),
        'id'            => 'sidebar-footer',
        'before_widget' => '<div id="%1$s" class="widget small-6 medium-4 large-3 columns %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
        ) );


    register_sidebar( array(
        'name'          => esc_html__( 'Top Widget (Left)', 'cleanews' ),
        'description'   => esc_html__( 'Widgets will appear above the under the header.', 'cleanews' ),
        'id'            => 'top-widget-left',
        'before_widget' => '<div id="%1$s" class="top-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Top Widget (Middle)', 'cleanews' ),
        'description'   => esc_html__( 'Widgets will appear above the under the header.', 'cleanews' ),
        'id'            => 'top-widget-middle',
        'before_widget' => '<div id="%1$s" class="top-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Top Widget (Right)', 'cleanews' ),
        'description'   => esc_html__( 'Widgets will appear above the under the header.', 'cleanews' ),
        'id'            => 'top-widget-right',
        'before_widget' => '<div id="%1$s" class="top-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
        ) );

}
add_action( 'widgets_init', 'cleanews_widgets_init' );



function cleanews_logo() {
    add_theme_support('custom-logo', array(
        'size' => 'cleanews-logo',
        'flex-height'            => true,
        'flex-width'            => true,
        ));
}

add_action('after_setup_theme', 'cleanews_logo');



/**
 * Enqueue Foundation scripts and styles.
 * 
 * @link: http://wordpress.tv/2014/06/11/steve-zehngut-build-a-wordpress-theme-with-foundation-and-underscores/
 * @link: http://wordpress.tv/2014/03/31/steve-zehngut-theme-development-with-foundation-framework/
 * @link: http://www.justinfriebel.com/wordpress-underscores-with-the-foundation-framework-09-23-2014/
 * 
 */
function cleanews_foundation_enqueue() {
        wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/assets/foundation/css/foundation.min.css' );    // This is the Foundation CSS
        wp_enqueue_script( 'foundation-js-jquery', get_template_directory_uri() . '/assets/foundation/js/foundation.min.js', array( 'jquery' ), true );
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/fonts/font-awesome.css' );  
    }
    add_action( 'wp_enqueue_scripts', 'cleanews_foundation_enqueue' );

/**
 * Enqueue scripts and styles.
 */
function cleanews_scripts() {
	wp_enqueue_style( 'cleanews-style', get_stylesheet_uri() );

    wp_enqueue_style( 'dashicons' );

    if ( is_page_template( 'page-templates/frontpage-portfolio.php' ) ) {
        wp_enqueue_script( 'cleanews-front-scripts-jquery', get_stylesheet_directory_uri() . '/assets/js/frontpage-functions.js', array( 'jquery' ), '20160515', true ); 
        wp_enqueue_script( 'slick_carousel-jquery', get_stylesheet_directory_uri() . '/assets/js/slick/slick.min.js', array( 'jquery' ), '20160515', true ); 
        wp_enqueue_style( 'slick_style', get_stylesheet_directory_uri() . '/assets/js/slick/slick.css' );
        wp_enqueue_style( 'slick_theme_style', get_stylesheet_directory_uri() . '/assets/js/slick/slick-theme.css' );
    }
    wp_enqueue_script( 'cleanews-navigation', get_template_directory_uri() . '/assets/js/navigation-custom.js', array(), '20120206', true );

    /* Toggle Main Search script */
    wp_enqueue_script( 'cleanews-toggle-search-jquery', get_template_directory_uri() . '/assets/js/toggle-search.js', array( 'jquery' ), '20150925', true );

    /* Masonry for Footer widgets */
    wp_enqueue_script( 'cleanews-masonry', get_template_directory_uri() . '/assets/js/masonry-settings.js', array( 'masonry' ), '20150925', true );

    /* Add dynamic back to top button */
    wp_enqueue_script( 'cleanews-topbutton-jquery', get_template_directory_uri(). '/assets/js/topbutton.js', array( 'jquery' ), '20150926', true );

    wp_enqueue_script( 'cleanews-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'cleanews_scripts' );

require_once( trailingslashit( get_template_directory() ) . 'trt-customize-pro/cleanews/class-customize.php' );


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
 * -----------------------------------------------------------------------------
 * cleanews custom functions below
 * -----------------------------------------------------------------------------
 */

function cleanews_google_fonts() {
    $query_args = array(

        'family' => 'Roboto:300,400,500,700,900'
        );
    wp_enqueue_style( 'cleanews-googlefonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
}

add_action('wp_enqueue_scripts', 'cleanews_google_fonts');


/*
 * Add Excerpts to Pages
 */
function cleanews_add_excerpt_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'cleanews_add_excerpt_to_pages' );

/**
 * Modify Underscores nav menus to work with Foundation
 */
function cleanews_nav_menu( $menu ) {

    $menu = str_replace( 'menu-item-has-children', 'menu-item-has-children has-dropdown', $menu );
    $menu = str_replace( 'sub-menu', 'sub-menu dropdown', $menu );
    return $menu;
    
}
add_filter( 'wp_nav_menu', 'cleanews_nav_menu' );

/**
 * Walker Menu for Front Page nav
 */
class cleanews_front_page_walker extends Walker_Nav_Menu {

    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
            );
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    // add main/sub classes to li's and links
    function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        // depth dependent classes
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
            );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $li_class_names = esc_attr( implode( ' ', apply_filters( '', array_filter( $classes ), $item ) ) );
        $fa_class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

        // build html
        /*
         * Card Front
         */
        $foundationTouch = 'ontouchstart="this.classList.toggle(\'hover\');"';
        $output .= $indent . '<li ' . $foundationTouch . ' id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . /* $class_names . */ '">';
        $output .= '<div class="large button card-front">';

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after . '<i class="fa ' . $li_class_names . ' card-icon"></i>',
            $args->after
            );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        $output .= '</div>';

        /** 
         * Card Back
         */
        $output .= '<div class="panel card-back">';
        $output .= '<i class="fa ' . $fa_class_names . ' card-icon"></i>';
        $output .= '<div class="hub-info">';
        
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->attr_title, $item->ID ),
            $args->link_after,
            $args->after
            );
        
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        
        $output .= '<p>';
        $output .= isset( $item->description ) ? $item->description : '';
        $output .= '</p></div><!-- .hub-info -->';
        $output .= '<small class="clear">';
        $output .= isset( $item->xfn ) ? $item->xfn : ''; 
        $output .= '</small>';
        $output .= '</div><!-- .card-back -->';
    }
}




/**
 * cleanews Related Theme Subpage
 */

add_action( 'admin_menu', 'cleanews_helpandinformation_sp' );
function cleanews_helpandinformation_sp() {
    add_theme_page( __('Cleanews Support', 'cleanews'), __('Cleanews Support', 'cleanews'), 'edit_theme_options', 'cleanews-helpandinformation.php', 'cleanews_helpandinformation_text');
}

function cleanews_helpandinformation_text(){ ?>

<div class="information-cards">
<h1><?php echo __('Cleanews Information and Links', 'cleanews') ?></h1>
<div class="information-card">
    <div class="information-card-box information-card-left">
        <a href="http://themeastronaut.com/contact-us/" target="_blank">
         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/support.png"> 
        </a>
        <h2><?php echo __('Help and Information', 'cleanews') ?></h2>
        <p><?php echo __('Need Help setting up Cleanews? We have an awesome customer support who stand ready to assist you with your questions related to the theme.', 'cleanews') ?></p>
        <a class="information-button" href="http://themeastronaut.com/contact-us/" target="_blank"><?php echo __('Theme Support', 'cleanews') ?></a>
    </div>
</div>
<div class="information-card">
    <div class="information-card-box information-card-top">
        <a href="http://themeastronaut.com/" target="_blank">
         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/features.png"> 
        </a>
        <h2><?php echo __('Get more features', 'cleanews') ?></h2>
        <p><?php echo __('If you are getting serious about using Cleanews, consider upgrading to the premium version for $24 to unlock lots of great new features!', 'cleanews') ?></p>
        <a class="information-button" href="http://themeastronaut.com/cleanews/" target="_blank"><?php echo __('Read More', 'cleanews') ?></a>
    </div>
</div>
<div class="information-card">
    <div class="information-card-box information-card-right">
        <a href="https://wordpress.org/support/theme/cleanews/reviews/?filter=5" target="_blank">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/review.png"> 
        </a>
        <h2><?php echo __('Review Cleanews', 'cleanews') ?></h2>
        <p><?php echo __('Enjoy using Cleanews? Leave thoughtful feedback for us, that makes everyone very happy, let us know what you think!', 'cleanews') ?></p>
        <a class="information-button" href="https://wordpress.org/support/theme/cleanews/reviews/?filter=5" target="_blank"><?php echo __('Review cleanews', 'cleanews') ?></a>
    </div>
</div>
</div>
<?php }

/**
 * cleanews Related Theme Subpage CSS
 */

function cleanews_helpandinformation( $hook ) {
    if ( 'appearance_page_cleanews-helpandinformation' !== $hook ) {
        return;
    }
    wp_enqueue_style( 'cleanews-helpandinformation-css', get_template_directory_uri() . '/assets/styles/helpandinformation.css');
}
add_action( 'admin_enqueue_scripts', 'cleanews_helpandinformation' );

