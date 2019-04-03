<?php
/**
 * Recommended plugins
 *
 * @package Optimistic Blog Lite
 */

if ( ! function_exists( 'optimistic_blog_lite_recommended_plugins' ) ) :

	/**
	 * Recommend plugins.
	 *
	 * @since 1.0.0
	 */
	function optimistic_blog_lite_recommended_plugins() {

		$plugins = array(
			array(
				'name'     => esc_html__( 'Contact Form 7', 'optimistic-blog-lite' ),
				'slug'     => 'contact-form-7',
				'required' => false,
			),

			array(
				'name'     => esc_html__( 'WooCommerce', 'optimistic-blog-lite' ),
				'slug'     => 'woocommerce',
				'required' => false,
			),
			
			array(
				'name'     => esc_html__( 'One Click Demo Import', 'optimistic-blog-lite' ),
				'slug'     => 'one-click-demo-import',
				'required' => false,
			),
		);

		tgmpa( $plugins );

	}

endif;

add_action( 'tgmpa_register', 'optimistic_blog_lite_recommended_plugins' );
