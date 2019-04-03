<?php
/**
 * Default Options.
 *
 * @package Optimistic_Blog_Lite
 */

if ( ! function_exists( 'optimistic_blog_lite_get_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function optimistic_blog_lite_get_option( $key ) {

		if ( empty( $key ) ) {
			return;
		}

		$value = '';

		$default = optimistic_blog_lite_get_default_theme_options();

		$default_value = null;

		if ( is_array( $default ) && isset( $default[ $key ] ) ) {
			$default_value = $default[ $key ];
		}

		if ( null !== $default_value ) {
			$value = get_theme_mod( $key, $default_value );
		}
		else {
			$value = get_theme_mod( $key );
		}

		return $value;

	}

endif;

if ( ! function_exists( 'optimistic_blog_lite_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function optimistic_blog_lite_get_default_theme_options() {

		$defaults = array();

		// Header
		$defaults['optimistic_blog_lite_header_layout']			= 'header_one';
		$defaults['optimistic_blog_lite_enable_top_header']		= 1;
		$defaults['optimistic_blog_lite_ad_space']				= '';

		$defaults['optimistic_blog_lite_facebook_link']			= '';
		$defaults['optimistic_blog_lite_twitter_link']			= '';
		$defaults['optimistic_blog_lite_instagram_link']			= '';
		$defaults['optimistic_blog_lite_youtube_link']			= '';
		$defaults['optimistic_blog_lite_snapchat_link']			= '';
		$defaults['optimistic_blog_lite_linkedin_link']			= '';
		$defaults['optimistic_blog_lite_googleplus_link']		= '';

		// Banner 
		$defaults['optimistic_blog_lite_enable_banner']			= 0;
		$defaults['optimistic_blog_lite_banner_width']			= 'full_width';
		$defaults['optimistic_blog_lite_banner_layout']			= 'banner_one';
		$defaults['optimistic_blog_lite_banner_cat']			= 0;
		$defaults['optimistic_blog_lite_banner_post_no']		= 5;
		$defaults['optimistic_blog_lite_enable_post_cat']		= 1;
		$defaults['optimistic_blog_lite_enable_post_title']		= 1;
		$defaults['optimistic_blog_lite_enable_post_date']		= 1;

		// Post Page
		$defaults['optimistic_blog_lite_enable_related_post']	= 0;
		$defaults['optimistic_blog_lite_related_posts_no']		= 5;

		// Others
		$defaults['optimistic_blog_lite_excerpt_length']		= 30;
		$defaults['optimistic_blog_lite_sidebar_position']		= 'right';

		// Blog Page
		$defaults['optimistic_blog_lite_post_list_layout']		= 'layout_one';

		// Archive Page
		$defaults['optimistic_blog_lite_archive_layout']		= 'layout_two';

		// Footer
		$defaults['optimistic_blog_lite_copyright_text']		= '';

		return $defaults;
	}

endif;



