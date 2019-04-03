<?php
/**
 * Load hooks.
 *
 * @package Optimistic_Blog_Lite
 */

/*======================================================
			Doctype hook of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_doctype_action' ) ) :
	/**
     * Doctype declaration of the theme.
     *
     * @since 1.0.0
     */
	function optimistic_blog_lite_doctype_action() {
	?>
		<!doctype html>
		<html <?php language_attributes(); ?>>
	<?php		
	}
endif;
add_action( 'optimistic_blog_lite_doctype', 'optimistic_blog_lite_doctype_action', 10 );


/*======================================================
			Head hook of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_head_action' ) ) :
    /**
     * Head declaration of the theme.
     *
     * @since 1.0.0
     */
 	function optimistic_blog_lite_head_action() {
 	?>
 	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
 	<?php	
 	}
endif;
add_action( 'optimistic_blog_lite_head', 'optimistic_blog_lite_head_action', 10 );

/*======================================================
			Body Before hook of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_body_before_action' ) ) :
    /**
     * Body Before declaration of the theme.
     *
     * @since 1.0.0
     */
 	function optimistic_blog_lite_body_before_action() {
 	?>
 		<body <?php body_class(); ?>>
 	<?php	
 	}
endif;
add_action( 'optimistic_blog_lite_body_before', 'optimistic_blog_lite_body_before_action', 10 );

/*======================================================
            Header hook of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_header_action' ) ) :
    /**
     * Header declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_header_action() {

        $header_layout = optimistic_blog_lite_get_option( 'optimistic_blog_lite_header_layout' );

        if( $header_layout == 'header_one' ) {

            get_template_part( 'template-layouts/header-layouts/header', 'one' );

        } else {

            get_template_part( 'template-layouts/header-layouts/header', 'two' );
            
        }
    }
endif;
add_action( 'optimistic_blog_lite_header', 'optimistic_blog_lite_header_action', 10 );

/*======================================================
            Banner hook of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_banner_action' ) ) :
    /**
     * Banner declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_banner_action() {
        
        if( is_home() || is_front_page() ) {

            $enable_banner = optimistic_blog_lite_get_option( 'optimistic_blog_lite_enable_banner' );

            $banner_layout = optimistic_blog_lite_get_option( 'optimistic_blog_lite_banner_layout' );

            if( $enable_banner == 1 ) {

                if( $banner_layout == 'banner_one' ) {

                    get_template_part( 'template-layouts/banner-layouts/banner', 'one' );

                }

                if( $banner_layout == 'banner_two' ) {

                    get_template_part( 'template-layouts/banner-layouts/banner', 'two' );

                }

            }   

        }

    }
endif;
add_action( 'optimistic_blog_lite_banner', 'optimistic_blog_lite_banner_action', 10 );

/*======================================================
            Get Content hook of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_get_content_action' ) ) :
    /**
     * Get Content declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_get_content_action() {
        $content_layout = optimistic_blog_lite_get_option( 'optimistic_blog_lite_post_list_layout' );

        if( $content_layout == 'layout_one' ) {

            get_template_part( 'template-parts/content/content', 'one' );

        } else if( $content_layout == 'layout_two' ) {

            get_template_part( 'template-parts/content/content', 'two' );

        } else {

            get_template_part( 'template-parts/content/content', 'three' );

        } 
    }
endif;
add_action( 'optimistic_blog_lite_get_content', 'optimistic_blog_lite_get_content_action', 10 );

/*======================================================
			Get Archive Content hook of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_archive_content_action' ) ) :
    /**
     * Get Archive Content declaration of the theme.
     *
     * @since 1.0.0
     */
 	function optimistic_blog_lite_archive_content_action() {
        $content_layout = optimistic_blog_lite_get_option( 'optimistic_blog_lite_archive_layout' );

        if( $content_layout == 'layout_one' ) {

            get_template_part( 'template-parts/content/content', 'one' );

        } else if( $content_layout == 'layout_two' ) {

            get_template_part( 'template-parts/content/content', 'two' );

        } else {

            get_template_part( 'template-parts/content/content', 'three' );
            
        } 
 	}
endif;
add_action( 'optimistic_blog_lite_archive_content', 'optimistic_blog_lite_archive_content_action', 10 );

/*======================================================
            Breadcrumb Hook of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_breadcrumb_action' ) ) :
    /**
     * Breadcrumb declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_breadcrumb_action() {
    ?>
        <div class="breadcrumb-wrapper">

            <div class="breadcrumb" style="background:url(<?php if( has_header_image() ) { header_image(); } ?>)">
               <div class="container">
                <?php
                    $breadcrumb_args = array(
                        'show_browse' => false,
                    );
                    optimistic_blog_lite_breadcrumb_trail( $breadcrumb_args );
                ?>
                </div>
                <div class="mask"></div>
            </div>
        </div>
    <?php
    }
endif;
add_action( 'optimistic_blog_lite_breadcrumb', 'optimistic_blog_lite_breadcrumb_action', 10 );

/*======================================================
            Pagination Hook of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_pagination_action' ) ) :
    /**
     * Pagination declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_pagination_action() {
    ?>
        <div class="row clearfix">
            <div class="col-sm-12">
                <?php
                    the_posts_pagination( 
                        array(
                            'mid_size'  => 2,
                            'prev_text' => esc_html__( '&laquo;', 'optimistic-blog-lite' ),
                            'next_text' => esc_html__( '&raquo;', 'optimistic-blog-lite' ),
                        ) 
                    );
                ?>
            </div>
        </div>
    <?php
    }
endif;
add_action( 'optimistic_blog_lite_pagination', 'optimistic_blog_lite_pagination_action', 10 );


/*======================================================
        Footer Start of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_footer_start_action' ) ) :
    /**
     * Footer Start Declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_footer_start_action() {
    ?>
        <footer class="general-footer">
            <div class="footer-mask"></div>
            <div class="footer-inner">
                <div class="container">
    <?php
    }
endif;
add_action( 'optimistic_blog_lite_footer_start', 'optimistic_blog_lite_footer_start_action', 10 );

/*======================================================
        Footer Top of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_footer_top_action' ) ) :
    /**
     * Footer Top Declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_footer_top_action() {
        if( is_active_sidebar( 'footer-1' ) ) :
    ?>
            <div class="row">
                <?php dynamic_sidebar( 'footer-1' ); ?>
            </div><!-- .row -->
    <?php
        endif;
    }
endif;
add_action( 'optimistic_blog_lite_footer_top', 'optimistic_blog_lite_footer_top_action', 10 );

/*======================================================
        Footer Bottom of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_footer_bottom_action' ) ) :
    /**
     * Footer Bottom Declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_footer_bottom_action() {
    ?>
        <div class="copyright-and-nav-row">
                <div class="row">
                    <?php
                        $copyright_text = optimistic_blog_lite_get_option( 'optimistic_blog_lite_copyright_text' );

                    ?>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="copyrights">
                                    <p>
                                    <?php
                                        if( !empty( $copyright_text ) ) { 

                                            echo esc_html( apply_filters( 'optimistic_blog_lite_copyright_text', $copyright_text . ' ' ) ); 

                                        } else { 

                                            echo esc_html( apply_filters( 'optimistic_blog_lite_copyright_text', $content = esc_html__('Copyright  &copy; ','optimistic-blog-lite') . date( 'Y' ) . ' ' . get_bloginfo( 'name' ) .' - ' ) );
                                        
                                        }

                                        printf( 'WordPress Theme : By %1$s', '<a href=" ' . esc_url('https://offshorethemes.com/') . ' " rel="designer" target="_blank">'.esc_html__('Offshorethemes','optimistic-blog-lite').'</a>' );
                                    ?>
                                    </p>
                                </div>
                                <!-- // copyrights -->
                            </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <?php
                            if( has_nav_menu( 'menu-2' ) ) :
                                wp_nav_menu( array( 
                                    'theme_location'    => 'menu-2',
                                    'menu_class'        => 'footer-navigation' 
                                ) );
                            endif;
                        ?>
                    </div>
                </div>
                <!-- // row -->
            </div>
    <?php
    }
endif;
add_action( 'optimistic_blog_lite_footer_bottom', 'optimistic_blog_lite_footer_bottom_action', 10 );

/*======================================================
        Footer End of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_footer_end_action' ) ) :
    /**
     * Footer End Declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_footer_end_action() {
    ?>
                </div>
                <!-- // container -->
            </div>
            <!-- // footer inner -->
        </footer>
    <?php
    }
endif;
add_action( 'optimistic_blog_lite_footer_end', 'optimistic_blog_lite_footer_end_action', 10 );

/*======================================================
        Footer of the theme
======================================================*/
if( ! function_exists( 'optimistic_blog_lite_footer_action' ) ) :
    /**
     * Footer Declaration of the theme.
     *
     * @since 1.0.0
     */
    function optimistic_blog_lite_footer_action() {
        wp_footer();
    ?>
            </body>
        </html>
    <?php
    }
endif;
add_action( 'optimistic_blog_lite_footer', 'optimistic_blog_lite_footer_action', 10 );
