<?php
/**
 * Register Widgets
 *
 * @package Optimistic_Blog_Lite
 */


/**
 * Enqueue Scripts and Styles In Admin Backend
 */
if ( ! function_exists( 'optimistic_blog_lite_admin_scripts' ) ) {

    function optimistic_blog_lite_admin_scripts( $hook ) {

        if ( 'widgets.php' == $hook || is_admin() ) {

        	wp_enqueue_script( 'media-upload' );

			wp_enqueue_media();

			wp_enqueue_style( 'optimistic-blog-lite-admin-custom', get_template_directory_uri() . '/offshorethemes/widgets/admin/css/admin.custom.css' );

			wp_enqueue_script( 'optimistic-blog-lite-admin-custom', get_template_directory_uri() . '/offshorethemes/widgets/admin/js/admin.custom.js', array( 'jquery' ), '1.0.0' );
		}
    }
}
add_action('admin_enqueue_scripts', 'optimistic_blog_lite_admin_scripts');

// Load Widget Class
require_once trailingslashit( get_template_directory() ) . '/offshorethemes/widgets/widgets.php';

if ( ! function_exists( 'optimistic_blog_lite_widget_register' ) ) :

	function optimistic_blog_lite_widget_register() {

		/**
		 * Register Author Widget
		 */
		register_widget( 'Optimistic_Blog_Lite_Author_Widget' );

		/**
		 * Register Social Widget
		 */
		register_widget( 'Optimistic_Blog_Lite_Social_Widget' );
		
		/**
		 * Register Trending Post Widget
		 */
		register_widget( 'Optimistic_Blog_Lite_Trending_Posts_Widget' );

		/**
		 * Register Recent Post Widget
		 */
		register_widget( 'Optimistic_Blog_Lite_Recent_Posts_Widget' );

	}
endif;

add_action( 'widgets_init', 'optimistic_blog_lite_widget_register' );