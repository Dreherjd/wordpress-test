<?php
/**
 * Customizer Options - Header
 *
 * @package Optimistic_Blog_Lite
 */

$defaults = optimistic_blog_lite_get_default_theme_options();

// Section - Header
$wp_customize->add_section( 'optimisitic_blog_lite_links_options', array(
	'priority'		=> 20,
	'title'			=> esc_html__( 'Socila Media Links', 'optimistic-blog-lite' ),
	'description'	=> esc_html__( 'Configure Theme Links Section. Social icons will be displayed only when valid social link is set.', 'optimistic-blog-lite' ),
	'panel'			=> 'optimistic_blog_lite_theme_options'	
) );

// Facebook Link
$wp_customize->add_setting( "optimistic_blog_lite_facebook_link", array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $defaults["optimistic_blog_lite_facebook_link"]
) );

$wp_customize->add_control( "optimistic_blog_lite_facebook_link", array(
	'label'				=> esc_html__( 'Facebook Link', 'optimistic-blog-lite' ),
	'section'			=> 'optimisitic_blog_lite_links_options',
	'type'				=> 'url',
) );

// Twitter Link
$wp_customize->add_setting( "optimistic_blog_lite_twitter_link", array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $defaults["optimistic_blog_lite_twitter_link"]
) );

$wp_customize->add_control( "optimistic_blog_lite_twitter_link", array(
	'label'				=> esc_html__( 'Twitter Link', 'optimistic-blog-lite' ),
	'section'			=> 'optimisitic_blog_lite_links_options',
	'type'				=> 'url',
) );

// Instagram Link
$wp_customize->add_setting( "optimistic_blog_lite_instagram_link", array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $defaults["optimistic_blog_lite_instagram_link"]
) );

$wp_customize->add_control( "optimistic_blog_lite_instagram_link", array(
	'label'				=> esc_html__( 'Instagram Link', 'optimistic-blog-lite' ),
	'section'			=> 'optimisitic_blog_lite_links_options',
	'type'				=> 'url',
) );

// Youtube Link
$wp_customize->add_setting( "optimistic_blog_lite_youtube_link", array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $defaults["optimistic_blog_lite_youtube_link"]
) );

$wp_customize->add_control( "optimistic_blog_lite_youtube_link", array(
	'label'				=> esc_html__( 'Youtube Link', 'optimistic-blog-lite' ),
	'section'			=> 'optimisitic_blog_lite_links_options',
	'type'				=> 'url',
) );

// Snapchat Link
$wp_customize->add_setting( "optimistic_blog_lite_snapchat_link", array(
	'sanitize_callback' => 'esc_url_raw',
	'default'			=> $defaults["optimistic_blog_lite_snapchat_link"]
) );

$wp_customize->add_control( "optimistic_blog_lite_snapchat_link", array(
	'label'				=> esc_html__( 'Snapchat Link', 'optimistic-blog-lite' ),
	'section'			=> 'optimisitic_blog_lite_links_options',
	'type'				=> 'url',
) );
