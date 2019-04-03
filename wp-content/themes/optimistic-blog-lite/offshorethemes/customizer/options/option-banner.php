<?php
/**
 * Customizer Options - Banner
 *
 * @package Optimistic_Blog_Lite
 */

$defaults = optimistic_blog_lite_get_default_theme_options();

// Section - Header
$wp_customize->add_section( 'optimistic_blog_lite_banner_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Banner Slider Settings', 'optimistic-blog-lite' ),
	'description'	=> esc_html__( 'Configurations for Banner Section. It is just below the menu.', 'optimistic-blog-lite' ),
	'panel'			=> 'optimistic_blog_lite_theme_options'	
) );

// Enable Banner
$wp_customize->add_setting( 'optimistic_blog_lite_enable_banner', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_checkbox',
	'default'			=> $defaults['optimistic_blog_lite_enable_banner'],
) );

$wp_customize->add_control( 'optimistic_blog_lite_enable_banner', array(
	'label'				=> esc_html__( 'Enable Banner', 'optimistic-blog-lite' ),
	'section'			=> 'optimistic_blog_lite_banner_option',
	'type'				=> 'checkbox', 
) );

// Banner Layout
$wp_customize->add_setting( 'optimistic_blog_lite_banner_width', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_select',
	'default'			=> $defaults['optimistic_blog_lite_banner_width'],
) );

$wp_customize->add_control( 'optimistic_blog_lite_banner_width', array(
	'label'				=> esc_html__( 'Select Banner Width', 'optimistic-blog-lite' ),
	'section'			=> 'optimistic_blog_lite_banner_option',
	'type'				=> 'select', 
	'choices'			=> array(
		'full_width'	=> esc_html__( 'Full Width', 'optimistic-blog-lite' ),
		'box_width'		=> esc_html__( 'Box Width', 'optimistic-blog-lite' ),
	),
) );

// Banner Layout
$wp_customize->add_setting( 'optimistic_blog_lite_banner_layout', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_select',
	'default'			=> $defaults['optimistic_blog_lite_banner_layout'],
) );

$wp_customize->add_control( 'optimistic_blog_lite_banner_layout', array(
	'label'				=> esc_html__( 'Select Banner Layout', 'optimistic-blog-lite' ),
	'section'			=> 'optimistic_blog_lite_banner_option',
	'type'				=> 'select', 
	'choices'			=> array(
		'banner_one'	=> esc_html__( 'Banner One', 'optimistic-blog-lite' ),
		'banner_two'	=> esc_html__( 'Banner Two', 'optimistic-blog-lite' ),
	)
) );

// Banner Category Select
$wp_customize->add_setting( 'optimistic_blog_lite_banner_cat', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_number',
	'default'			=> $defaults['optimistic_blog_lite_banner_cat']
) );

$wp_customize->add_control( new Optimistic_Blog_Lite_Dropdown_Taxonomies_Control( $wp_customize, 'optimistic_blog_lite_banner_cat', array(
	'label'				=> esc_html__( 'Select Category For Banner', 'optimistic-blog-lite' ),
	'description'		=> esc_html__( 'Contents of the selected pages will be displayed on the banner', 'optimistic-blog-lite' ),
	'choices'			=> 'dropdown-taxonomies',
	'section'			=> 'optimistic_blog_lite_banner_option'
) ) );

// No of Posts
$wp_customize->add_setting( 'optimistic_blog_lite_banner_post_no', array(
	'sanitize_callback' => 'optimistic_blog_lite_sanitize_number',
	'default'			=> $defaults['optimistic_blog_lite_banner_post_no']
) );

$wp_customize->add_control( 'optimistic_blog_lite_banner_post_no', array(
	'label'				=> esc_html__( 'Posts Number', 'optimistic-blog-lite' ),
	'description'		=> esc_html__( 'Numbers of posts to be displayed', 'optimistic-blog-lite' ),
	'type'				=> 'number',
	'section'			=> 'optimistic_blog_lite_banner_option'
) );

// Display Post Category
$wp_customize->add_setting( 'optimistic_blog_lite_enable_post_cat', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_checkbox',
	'default'			=> $defaults['optimistic_blog_lite_enable_post_cat']
) );

$wp_customize->add_control( 'optimistic_blog_lite_enable_post_cat', array(
	'label'				=> esc_html__( 'Display Post Categories', 'optimistic-blog-lite' ),
	'section'			=> 'optimistic_blog_lite_banner_option',
	'type'				=> 'checkbox'
) );

// Display Post Title
$wp_customize->add_setting( 'optimistic_blog_lite_enable_post_title', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_checkbox',
	'default'			=> $defaults['optimistic_blog_lite_enable_post_title'],
) );

$wp_customize->add_control( 'optimistic_blog_lite_enable_post_title', array(
	'label'				=> esc_html__( 'Display Post Title', 'optimistic-blog-lite' ),
	'section'			=> 'optimistic_blog_lite_banner_option',
	'type'				=> 'checkbox'
) );

// Display Post Date
$wp_customize->add_setting( 'optimistic_blog_lite_enable_post_date', array(
	'sanitize_callback'	=> 'optimistic_blog_lite_sanitize_checkbox',
	'default'			=> $defaults['optimistic_blog_lite_enable_post_cat'],
) );

$wp_customize->add_control( 'optimistic_blog_lite_enable_post_date', array(
	'label'				=> esc_html__( 'Display Post Date', 'optimistic-blog-lite' ),
	'section'			=> 'optimistic_blog_lite_banner_option',
	'type'				=> 'checkbox'
) );