<?php
/**
 * Template part for displaying single post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */
?>
<article class="single-page-details-holder wow fadeInUp">
	<?php
        $postformat = get_post_format(); 
        $post_thumbnail = 'optimistic-blog-lite-thumbnail-3';
        $content_item = optimistic_blog_lite_post_format_media( $postformat, get_the_ID(), $post_thumbnail );
        if( "post" == get_post_type() ) :
    ?>
    <div class="post-image <?php if( $postformat == 'gallery' ) { echo esc_attr('gallery-post'); } if( $postformat == 'link' ) { echo esc_attr('link-post'); } ?>">
        <?php
            if( $postformat == "gallery" ) {
                if( is_array( $content_item ) ) {
                    ?>
                    <div class="inpostgallery-container">
                        <div class="swiper-wrapper">
                            <?php
                                foreach( $content_item as $image_url ) :
                            ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php the_title_attribute(); ?>">
                                </div>   
                            <?php
                                endforeach;
                            ?>                                 
                        </div>
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                    <?php
                }
            } else if( $postformat == "video" ) {
                if( is_string( $content_item ) ) {
                    echo $content_item;
                } else {
                    if( has_post_thumbnail() ) {
                        the_post_thumbnail( $post_thumbnail, array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
                    }
                }                   
            } else if( $postformat == "audio" ) {
                if( is_string( $content_item ) ) {
                    echo $content_item;
                } else {
                    if( has_post_thumbnail() ) {
                        the_post_thumbnail( $post_thumbnail, array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
                    }
                }                       
            } else if( $postformat == "link" ) {
                ?>
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                    <?php
                        echo esc_html( get_the_author() );
                    ?>
                </a>
                <?php
            } else {
                if( has_post_thumbnail() ) :
                    ?>
                    <div class="post-image">
                        <?php
                            the_post_thumbnail('full', array( 'class'=>'img-responsive', 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
                        ?>
                    </div>
                    <?php
                endif;
            }
        ?>
    </div>
    <?php
        endif;
    ?>
    <div class="single-page-other-information-holder">
        <?php
            $show_categories = optimistic_blog_lite_get_option( 'optimistic_blog_lite_enable_categories' );
            if( $show_categories == 1 ) :
        ?>
                <div class="posted-category">
                    <div class="post-meta-category">
                        <?php 
                            optimistic_blog_lite_get_categories(); 
                        ?>
                    </div>
                </div>
        <?php
            endif;
        ?>
        <div class="post-title">
            <h2>
                <?php the_title(); ?>
            </h2>
        </div>
      
        <?php optimistic_blog_lite_post_meta(); ?>
       
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
</article>