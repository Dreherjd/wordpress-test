<?php
/**
 * Optimistic Blog Theme Customizer Option - Footer
 *
 * @package Optimistic_Blog_Lite
 */

$defaults = optimistic_blog_lite_get_default_theme_options();

// Section - Others
$wp_customize->add_section( 'optimisitic_blog_lite_footer_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Footer Settings', 'optimistic-blog-lite' ),
	'description'	=> esc_html__( 'Configurations for footer', 'optimistic-blog-lite' ),
	'panel'			=> 'optimistic_blog_lite_theme_options'	
) );

// Copyright Text
$wp_customize->add_setting( 'optimistic_blog_lite_copyright_text', array(
	'sanitize_callback'		=> 'sanitize_text_field',
	'default'				=> $defaults['optimistic_blog_lite_copyright_text'] 
) ); 

$wp_customize->add_control( 'optimistic_blog_lite_copyright_text', array(
	'label'					=> esc_html__( 'Coyright Text', 'optimistic-blog-lite' ),
	'section'				=> 'optimisitic_blog_lite_footer_option',
	'type'					=> 'text'
) );