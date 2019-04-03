<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */

$banner_post_cat = optimistic_blog_lite_get_option( 'optimistic_blog_lite_banner_cat' );
$banner_post_nos = optimistic_blog_lite_get_option( 'optimistic_blog_lite_banner_post_no' );

$banner_width = optimistic_blog_lite_get_option( 'optimistic_blog_lite_banner_width' );

$banner_args = array(
    'cat'               => absint( $banner_post_cat ),
    'posts_per_page'    => absint( $banner_post_nos ),
    'post_type'         => 'post',
    'post_status'       => 'publish'
);

$banner_query = new WP_Query( $banner_args );

if( $banner_query->have_posts() ) :
?>
<section class="general-banner banner-layout-four">
    <div class="general-banner-inner">
        <div class="<?php if( $banner_width == 'box_width' ) : echo esc_attr( 'container opbanner-space' ); else: echo esc_attr('fullwithd');  endif; ?>">
            <!-- Swiper -->
            <div class="<?php if( $banner_width == 'box_width' ) : echo esc_attr( 'banner-style-four-box-width' ); else : echo esc_attr( 'banner-style-four-container' ); endif; ?> owl-carousel">
                <?php
                    while( $banner_query->have_posts() ) :
                        $banner_query->the_post();
                        if( has_post_thumbnail() ) :
                            ?>
                            <div class="item banner-card">
                                <?php
                                    if( has_post_thumbnail() ) :
                                ?>
                                <div class="featured-post-image">
                                    <?php
                                        the_post_thumbnail( 'optimistic-blog-lite-thumbnail-2', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
                                    ?>
                                    <div class="mask"></div>
                                </div>
                                <?php
                                    endif;
                                ?>
                                <!-- // featured-post-image -->
                                <div class="featured-content-holder">
                                    <?php
                                        $show_category = optimistic_blog_lite_get_option( 'optimistic_blog_lite_enable_post_cat' );
                                        if( $show_category == 1 ) :
                                    ?>
                                            <div class="featured-content-meta">
                                                <?php
                                                    /* translators: used between list items, there is a space after the comma */
                                                    $categories_list = get_the_category_list( esc_html__( ' ', 'optimistic-blog-lite' ) );
                                                    if ( $categories_list ) {
                                                        /* translators: 1: list of categories. */
                                                        printf( '<span class="cat-links">' . esc_html__( ' %1$s', 'optimistic-blog-lite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
                                                    }
                                                ?>
                                            </div>
                                    <?php
                                        endif;

                                        $show_title = optimistic_blog_lite_get_option( 'optimistic_blog_lite_enable_post_title' );

                                        if( $show_title == 1 ) :
                                    ?>
                                            <div class="featured-content-title">
                                                <h2>
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php
                                                            the_title();
                                                        ?>
                                                    </a>
                                                </h2>
                                            </div>
                                    <?php
                                        endif;

                                        $show_date = optimistic_blog_lite_get_option( 'optimistic_blog_lite_enable_post_date' );

                                        if( $show_date == 1 ) :
                                    ?>
                                            <div class="featured-posted-date">
                                                <span class="posted-date">
                                                    <?php
                                                        optimistic_blog_lite_get_post_date();
                                                    ?>
                                                </span>
                                            </div>
                                    <?php
                                        endif;
                                    ?>
                                </div>
                            </div>
                            <?php
                        endif;
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</section>
<?php
endif;