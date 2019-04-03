<?php
/**
 * Optimistic Blog Theme Customizer Options Callback Functions
 *
 * @package Optimistic_Blog_Lite
 */

if( ! function_exists( 'optimistic_blog_lite_is_active_banner' ) ) :

	function optimistic_blog_lite_is_active_banner( $control ) {
		if( $control->manager->get_setting( 'optimistic_blog_lite_enable_banner' )->value() == true ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if( ! function_exists( 'optimistic_blog_lite_is_active_banner_layout' ) ) :

	function optimistic_blog_lite_is_active_banner_layout( $control ) {
		if( ( $control->manager->get_setting( 'optimistic_blog_lite_enable_banner' )->value() == true ) && ( ( $control->manager->get_setting( 'optimistic_blog_lite_banner_layout' )->value() == 'banner_one' ) || ( $control->manager->get_setting( 'optimistic_blog_lite_banner_layout' )->value() == 'banner_two' ) || ( $control->manager->get_setting( 'optimistic_blog_lite_banner_layout' )->value() == 'banner_four' ) ) ) {
			return true;
		} else {
			return false;
		}
	}

endif;

if( ! function_exists( 'optimistic_blog_lite_is_active_related_posts' ) ) :

	function optimistic_blog_lite_is_active_related_posts( $control ) {
		if( $control->manager->get_setting( 'optimistic_blog_lite_enable_related_post' )->value() == true ) {
			return true;
		} else {
			return false;
		}
	}

endif;

