<?php
/**
 * Options For Customizers
 *
 * @package Optimistic_Blog_Lite
 */

$wp_customize->add_panel( 'optimistic_blog_lite_theme_options', array(
	'title'			=> esc_html__( 'Theme Options', 'optimistic-blog-lite' ),
	'description'	=> esc_html__( 'Optimistic Blog Customization Options', 'optimistic-blog-lite' ),
	'priority'		=> 10	
) );

$wp_customize->add_panel( 'optimistic_blog_lite_font_color_options', array(
	'title'			=> esc_html__( 'Fonts & Colors', 'optimistic-blog-lite' ),
	'description'	=> esc_html__( 'Optimistic Blog Fonts & Colors Options', 'optimistic-blog-lite' ),
	'priority'		=> 10	
) );

// Header
require_once trailingslashit( get_template_directory() ) . '/offshorethemes/customizer/options/option-header.php';
// Banner
require_once trailingslashit( get_template_directory() ) . '/offshorethemes/customizer/options/option-banner.php';
// Homepage
require_once trailingslashit( get_template_directory() ) . '/offshorethemes/customizer/options/option-home.php';
// Archive Page
require_once trailingslashit( get_template_directory() ) . '/offshorethemes/customizer/options/option-archive.php';
// Post Page
require_once trailingslashit( get_template_directory() ) . '/offshorethemes/customizer/options/option-post.php';
// Others
require_once trailingslashit( get_template_directory() ) . '/offshorethemes/customizer/options/option-others.php';
// Links
require_once trailingslashit( get_template_directory() ) . '/offshorethemes/customizer/options/option-links.php';
// Footer
require_once trailingslashit( get_template_directory() ) . '/offshorethemes/customizer/options/option-footer.php'; 