<?php
/**
 * Info setup
 *
 * @package Optimistic Blog Lite
 */

if ( ! function_exists( 'optimistic_blog_lite_info_setup' ) ) :

	/**
	 * Info setup.
	 *
	 * @since 1.0.0
	 */
	function optimistic_blog_lite_info_setup() {

		$config = array(

			// Welcome content.
			'welcome_content' => sprintf( esc_html__( '%1$s ia a clean, minimal and beautiful Free WordPress Theme. Optimistic Blog Lite design is reponsive and cross browser compatible. The theme is suitable to set up websites for blogs of different genre like, travel, fashion, music, sport, technology etc... The theme consists of different layouts which can be customized as users requirement', 'optimistic-blog-lite' ), 'Optimistic Blog Lite' ),

			// Tabs.
			'tabs' => array(
				'getting-started' => esc_html__( 'Getting Started', 'optimistic-blog-lite' ),
				'support'         => esc_html__( 'Support', 'optimistic-blog-lite' ),
				'useful-plugins'  => esc_html__( 'Useful Plugins', 'optimistic-blog-lite' ),
				'demo-content'    => esc_html__( 'Demo Content', 'optimistic-blog-lite' ),
				'upgrade-to-pro'  => esc_html__( 'Upgrade to Pro', 'optimistic-blog-lite' ),
			),

			// Quick links.
			'quick_links' => array(

				'theme_url' => array(
					'text' => esc_html__( 'Theme Details', 'optimistic-blog-lite' ),
					'url'  => 'https://offshorethemes.com/wordpress-themes/optimistic-blog-lite/',
				),

				'demo_url' => array(
					'text' => esc_html__( 'View Demo', 'optimistic-blog-lite' ),
					'url'  => 'https://offshorethemes.com/demo/optimisticbloglite/',
				),

				'documentation_url' => array(
					'text' => esc_html__( 'View Documentation', 'optimistic-blog-lite' ),
					'url'  => 'https://offshorethemes.com/docs/optimisticblog/',
				),

				'rating_url' => array(
					'text' => esc_html__( 'Rate This Theme','optimistic-blog-lite' ),
					'url'  => 'https://wordpress.org/support/theme/optimistic-blog-lite/reviews/#new-post',
				),

				'upgrade_to_pro' => array(
					'text' => esc_html__( 'Buy Pro Themes','optimistic-blog-lite' ),
					'url'  => 'https://offshorethemes.com/wordpress-themes/optimistic-blog-pro/',
				)

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__( 'Theme Documentation', 'optimistic-blog-lite' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'optimistic-blog-lite' ),
					'button_text' => esc_html__( 'View Documentation', 'optimistic-blog-lite' ),
					'button_url'  => 'https://offshorethemes.com/docs/optimisticblog/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				
				'three' => array(
					'title'       => esc_html__( 'Theme Options', 'optimistic-blog-lite' ),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__( 'Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'optimistic-blog-lite' ),
					'button_text' => esc_html__( 'Customize', 'optimistic-blog-lite' ),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
					),
				
				'five' => array(
					'title'       => esc_html__( 'Demo Content', 'optimistic-blog-lite' ),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf( esc_html__( 'To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'optimistic-blog-lite' ), esc_html__( 'One Click Demo Import', 'optimistic-blog-lite' ) ),
					'button_text' => esc_html__( 'Demo Content', 'optimistic-blog-lite' ),
					'button_url'  => admin_url( 'themes.php?page=optimistic-blog-lite-info&tab=demo-content' ),
					'button_type' => 'secondary',
					)
				
				),

			// Support.
			'support' => array(
				'one' => array(
					'title'       => esc_html__( 'Contact Support', 'optimistic-blog-lite' ),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__( 'Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'optimistic-blog-lite' ),
					'button_text' => esc_html__( 'Contact Support', 'optimistic-blog-lite' ),
					'button_url'  => 'https://offshorethemes.com/forum/wordpress-themes/optimistic-blog-lite/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'two' => array(
					'title'       => esc_html__( 'Theme Documentation', 'optimistic-blog-lite' ),
					'icon'        => 'dashicons dashicons-format-aside',
					'description' => esc_html__( 'Please check our full documentation for detailed information on how to setup and customize the theme.', 'optimistic-blog-lite' ),
					'button_text' => esc_html__( 'View Documentation', 'optimistic-blog-lite' ),
					'button_url'  => 'https://offshorethemes.com/docs/optimisticblog/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				'three' => array(
					'title'       => esc_html__( 'Child Theme', 'optimistic-blog-lite' ),
					'icon'        => 'dashicons dashicons-admin-tools',
					'description' => esc_html__( 'For advanced theme customization, it is recommended to use child theme rather than modifying the theme file itself. Using this approach, you wont lose the customization after theme update.', 'optimistic-blog-lite' ),
					'button_text' => esc_html__( 'Learn More', 'optimistic-blog-lite' ),
					'button_url'  => 'https://developer.wordpress.org/themes/advanced-topics/child-themes/',
					'button_type' => 'link',
					'is_new_tab'  => true,
					),
				),

			// Useful plugins.
			'useful_plugins' => array(
				'description' => esc_html__( 'Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'optimistic-blog-lite' ),
				),

			// Demo content.
			'demo_content' => array(
				'description' => sprintf( esc_html__( 'To import demo content for this theme, %1$s plugin is needed. Please make sure plugin is installed and activated. After plugin is activated, you will see Import Demo Data menu under Appearance.', 'optimistic-blog-lite' ), '<a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank">' . esc_html__( 'One Click Demo Import', 'optimistic-blog-lite' ) . '</a>' ),
				),

			// Upgrade content.
			'upgrade_to_pro' => array(
				'description' => esc_html__( 'If you want more advanced features then you can upgrade to the premium version of the theme.', 'optimistic-blog-lite' ),
				'button_text' => esc_html__( 'Buy Pro Themes', 'optimistic-blog-lite' ),
				'button_url'  => 'https://offshorethemes.com/wordpress-themes/optimistic-blog-pro/',
				'button_type' => 'primary',
				'is_new_tab'  => true,
				),
			);

		Optimistic_Blog_Lite::init( $config );
	}

endif;

add_action( 'after_setup_theme', 'optimistic_blog_lite_info_setup' );
