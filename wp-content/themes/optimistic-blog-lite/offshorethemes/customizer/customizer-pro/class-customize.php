<?php
/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Optimistic_Blog_Lite_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		require_once get_theme_file_path('offshorethemes/customizer/customizer-pro/section-pro.php');

		// Register custom section types.
		$manager->register_section_type( 'Optimistic_Blog_Lite_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Optimistic_Blog_Lite_Customize_Section_Pro(
				$manager,
				'optimisticbloglite',
				array(
					'title'    => '',
					'pro_text' => esc_html__( 'Upgrade To Optimistic Blog Pro','optimistic-blog-lite' ),
					'pro_url'  => 'https://offshorethemes.com/wordpress-themes/optimistic-blog-pro/',
					'priority'  => 1,
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'optimistic-blog-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . 'offshorethemes/customizer/customizer-pro/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'optimistic-blog-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . 'offshorethemes/customizer/customizer-pro/customize-controls.css' );
	}
}

// Doing this customizer thang!
Optimistic_Blog_Lite_Customize::get_instance();
