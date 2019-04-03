<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */

get_header(); 

    $sidebar_position = esc_attr( get_post_meta($post->ID, 'optimistic_blog_lite_page_layouts', true) );

    if( empty( $sidebar_position ) ) {
        $sidebar_position = 'rightsidebar';
    }
?>

<div class="general-single-page-layout single-page-layout-one">
    <?php
    	/**
		* Hook - optimistic_blog_lite_breadcrumb.
		*
		* @hooked optimistic_blog_lite_breadcrumb_action - 10
		*/
		do_action( 'optimistic_blog_lite_breadcrumb' );
    ?>
    <div class="single-page-wrapper">
        <div class="single-page-inner">
            <div class="container">
                <div class="row">
                    <?php
                        $class = null;

                        if( $sidebar_position == 'leftsidebar' || $sidebar_position == 'rightsidebar' ) {
                            $class = 'col-sm-8 col-xs-12';
                        } else {
                            $class = 'col-sm-12 col-xs-12';
                        }

                        if( $sidebar_position == 'leftsidebar' && is_active_sidebar( 'sidebar-1' ) ) {

                            get_sidebar();

                        }
                    ?>
                	<div class="sticky_portion <?php echo esc_attr( $class ); ?>">
                        <div class="main-post-area-holder">
                        	<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/content', 'page' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

								endwhile; // End of the loop.
							?>
                        </div>
                    </div>
                    <?php
                        if( $sidebar_position == 'rightsidebar' && is_active_sidebar( 'sidebar-1' ) ) {

                            get_sidebar();

                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer();