<?php
/**
 * Template part for displaying single post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */
?>

<article class="single-page-details-holder">
    <div class="single-page-layout-two-top-style">
        <div class="single-post-layout-two-fimage-and-few-meta">
            <?php
                if( has_post_format('video') ) {
                    $post_content = apply_filters( 'the_content', get_the_content($post->ID) );
                    $video = get_media_embedded_in_content( $post_content, array( 'video', 'audio', 'object', 'embed', 'iframe' ) );
            ?>
                    <div class="post-fimage post-fvideo">
                        <div class="covervid-wrapper">
                            <?php echo $video[0]; ?>
                        </div>
            <?php                       
                } else {
                    $featured_image = '';
                    if( has_post_thumbnail() ) {
                        $featured_image = get_the_post_thumbnail_url($post->ID, 'full');
            ?>
                        <div class="post-fimage" style="background:url(<?php if( $featured_image ) { echo esc_url( $featured_image );  } ?>)">
            <?php
                    }
                }
            ?>
                <div class="mask"></div>
                <div class="container single-page-other-information-holder post-ttl-n-meta">
                    <?php
                        $show_categories = optimistic_blog_lite_get_option( 'optimistic_blog_lite_enable_categories' );
                        if( $show_categories == 1 ) :
                    ?>
                            <div class="posted-category">
                                <div class="post-meta-category">
                                    <?php optimistic_blog_lite_get_categories(); ?>
                                </div>
                            </div>
                    <?php
                        endif;
                    ?>
                    <div class="post-title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    
                    <?php optimistic_blog_lite_post_meta(); ?>
                    
                </div>
            </div>
        </div>
        <div class="container single-page-other-information-holder">
            <div class="post-the-content">
                <?php 
                    the_content(); 
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'optimistic-blog-lite' ),
                        'after'  => '</div>',
                        ) );
                ?>
            </div>
            <?php
                $show_tags = optimistic_blog_lite_get_option( 'optimistic_blog_lite_enable_tags' );
                if( $show_tags == 1 ) :
            ?>
                    <div class="tags-meta-and-others clearfix">
                        <div class="post-tags">
                            <?php
                                optimistic_blog_lite_get_tags();
                            ?>
                        </div>
                    </div>
            <?php
                endif;
            ?>
        </div>
    </div><!-- // single-page-layout-two-top-style -->
</article>