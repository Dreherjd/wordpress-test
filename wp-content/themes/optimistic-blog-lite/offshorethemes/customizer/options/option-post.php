<?php
/**
 * Customizer Options - Post Page
 *
 * @package Optimistic_Blog_Lite
 */

$defaults = optimistic_blog_lite_get_default_theme_options();

// Section - Post
$wp_customize->add_section( 'optimisitic_blog_lite_post_page_option', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Single Post Settings', 'optimistic-blog-lite' ),
	'description'	=> esc_html__( 'Configurations for home page posts.', 'optimistic-blog-lite' ),
	'panel'			=> 'optimistic_blog_lite_theme_options'	
) );

// Enable Related Posts
$wp_customize->add_setting( 'optimistic_blog_lite_enable_related_post', array(
	'sanitize_callback'		=> 'optimistic_blog_lite_sanitize_checkbox',
	'default'				=> $defaults['optimistic_blog_lite_enable_related_post'] 
) ); 

$wp_customize->add_control( 'optimistic_blog_lite_enable_related_post', array(
	'label'					=> esc_html__( 'Show Related Posts', 'optimistic-blog-lite' ),
	'section'				=> 'optimisitic_blog_lite_post_page_option',
	'type'					=> 'checkbox'
) );

// Number of Related Posts
$wp_customize->add_setting( 'optimistic_blog_lite_related_posts_no', array(
	'sanitize_callback'		=> 'optimistic_blog_lite_sanitize_number',
	'default'				=> $defaults['optimistic_blog_lite_related_posts_no'] 
) ); 

$wp_customize->add_control( 'optimistic_blog_lite_related_posts_no', array(
	'label'					=> esc_html__( 'Numbers of Related Posts', 'optimistic-blog-lite' ),
	'section'				=> 'optimisitic_blog_lite_post_page_option',
	'type'					=> 'number',
	'active_callback'		=> 'optimistic_blog_lite_is_active_related_posts'
) );