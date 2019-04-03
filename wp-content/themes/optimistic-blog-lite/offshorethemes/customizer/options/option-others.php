<?php
/**
 * Customizer Options - Default Image
 *
 * @package Optimistic_Blog_Lite
 */

$defaults = optimistic_blog_lite_get_default_theme_options();

// Section - Others
$wp_customize->add_section( 'optimisitic_blog_lite_other_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Home/Category/Search Page Layout', 'optimistic-blog-lite' ),
	'description'	=> esc_html__( 'Configurations for other', 'optimistic-blog-lite' ),
	'panel'			=> 'optimistic_blog_lite_theme_options'	
) );

// Excerpt Length
$wp_customize->add_setting( 'optimistic_blog_lite_excerpt_length', array(
	'default' 			=> $defaults['optimistic_blog_lite_excerpt_length'],		
	'sanitize_callback' => 'optimistic_blog_lite_sanitize_number'
) );

$wp_customize->add_control( 'optimistic_blog_lite_excerpt_length', array(		
	'label' 		=> esc_html__('Excerpt Length', 'optimistic-blog-lite'),
	'description' 	=> esc_html__( 'Select number of words to display in excerpt', 'optimistic-blog-lite' ),
	'section' 		=> 'optimisitic_blog_lite_other_option',
	'type'      	=> 'number',
	'input_attrs' 	=> array( 'min' => 20, 'max' => 250, 'step'  => 1 ),			
) );

// Sidebar Position
$wp_customize->add_setting( 'optimistic_blog_lite_sidebar_position', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_select',
	'default'			=> $defaults['optimistic_blog_lite_sidebar_position'],
) );

$wp_customize->add_control( 'optimistic_blog_lite_sidebar_position', array(
	'label'				=> esc_html__( 'Sidebar Position', 'optimistic-blog-lite' ),
	'section'			=> 'optimisitic_blog_lite_other_option',
	'type'				=> 'radio',
	'choices'			=> array(
		'left' 	=> esc_html__( 'Left Sidebar', 'optimistic-blog-lite' ),
		'right' 	=> esc_html__( 'Right Sidebar', 'optimistic-blog-lite' ),
	) 
) );
