<?php
/**
 * Customizer Options For Blog Page
 *
 * @package Optimistic_Blog_Lite
 */

$defaults = optimistic_blog_lite_get_default_theme_options();

// Section - Home
$wp_customize->add_section( 'optimisitic_blog_lite_home_page_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'HomePage Layout Settings', 'optimistic-blog-lite' ),
	'description'	=> esc_html__( 'Configurations for home page posts.', 'optimistic-blog-lite' ),
	'panel'			=> 'optimistic_blog_lite_theme_options'	
) );

// Posts List Layout
$wp_customize->add_setting( 'optimistic_blog_lite_post_list_layout', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_select',
	'default'			=> $defaults['optimistic_blog_lite_post_list_layout'],
) );

$wp_customize->add_control( 'optimistic_blog_lite_post_list_layout', array(
	'label'				=> esc_html__( 'Select Post Listing Layout', 'optimistic-blog-lite' ),
	'section'			=> 'optimisitic_blog_lite_home_page_option',
	'type'				=> 'radio', 
	'choices'			=> array(
		'layout_one'	=> esc_html__( 'One Column List Layout', 'optimistic-blog-lite' ),
		'layout_two'	=> esc_html__( 'Two Columns List Layout', 'optimistic-blog-lite' ),
		'layout_three'	=> esc_html__( 'Masonry Grid Layout', 'optimistic-blog-lite' ),
	),
) );
