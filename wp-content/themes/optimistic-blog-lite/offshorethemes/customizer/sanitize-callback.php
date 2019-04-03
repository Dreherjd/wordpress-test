<?php
/**
 * Default Options.
 *
 * @package Optimistic_Blog_Lite
 */

/**
 * Sanitization Function - Checkbox
 * 
 * @param $checked
 * @return bool
 */
if( !function_exists( 'optimistic_blog_lite_sanitize_checkbox' ) ) :

	function optimistic_blog_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

endif;

/**
 * Sanitization Function - Select
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('optimistic_blog_lite_sanitize_select') ) :

	function optimistic_blog_lite_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
	
endif;

/**
 * Sanitization Function - Number
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
if ( !function_exists('optimistic_blog_lite_sanitize_number') ) :

	function optimistic_blog_lite_sanitize_number( $input, $setting ) {

		$number = absint( $input );

		// If the input is a positibe number, return it; otherwise, return the default.
		return ( $number ? $number : $setting->default );
	}
	
endif;

/**
 * Sanitization Function - Text Area
 *
 * @param $input
 * @param $setting
 * @return sanitized output
 *
 */
function optimistic_blog_lite_sanitize_textarea_field( $input ) {
       return wp_kses_post( force_balance_tags( $input ) );
   }