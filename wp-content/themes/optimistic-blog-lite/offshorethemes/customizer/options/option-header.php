<?php
/**
 * Customizer Options - Header
 *
 * @package Optimistic_Blog_Lite
 */

$defaults = optimistic_blog_lite_get_default_theme_options();

// Section - Header
$wp_customize->add_section( 'optimisitic_blog_lite_header_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Header Settings', 'optimistic-blog-lite' ),
	'description'	=> esc_html__( 'Configure Theme Header Section', 'optimistic-blog-lite' ),
	'panel'			=> 'optimistic_blog_lite_theme_options'	
) );

// Header Layout
$wp_customize->add_setting( 'optimistic_blog_lite_header_layout', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_select',
	'default'			=> $defaults['optimistic_blog_lite_header_layout'],
) );

$wp_customize->add_control( 'optimistic_blog_lite_header_layout', array(
	'label'				=> esc_html__( 'Choose Header Layout', 'optimistic-blog-lite' ),
	'section'			=> 'optimisitic_blog_lite_header_options',
	'type'				=> 'select',
	'choices'			=> array(
		'header_one' 	=> esc_html__( 'Header Layout One', 'optimistic-blog-lite' ),
		'header_two' 	=> esc_html__( 'Header Layout Two', 'optimistic-blog-lite' ),
	) 
) );

// Enable Top Header
$wp_customize->add_setting( 'optimistic_blog_lite_enable_top_header', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_checkbox',
	'default'			=> $defaults['optimistic_blog_lite_enable_top_header'],
) );

$wp_customize->add_control( 'optimistic_blog_lite_enable_top_header', array(
	'label'				=> esc_html__( 'Enable Top Header', 'optimistic-blog-lite' ),
	'section'			=> 'optimisitic_blog_lite_header_options',
	'type'				=> 'checkbox', 
) );

