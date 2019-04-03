<?php
/**
 * Customizer Options For Blog Page
 *
 * @package Optimistic_Blog_Lite
 */

$postformat = get_post_format();
$post_id = get_the_ID();
$post_thumbnail = 'optimistic-blog-lite-thumbnail-3';
$content_item = optimistic_blog_lite_post_format_media( $postformat, $post_id, $post_thumbnail );
?>
<article class="post-details-holder wow fadeInUp">
    <?php
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
                            the_post_thumbnail( $post_thumbnail, array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
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
    <div class="post-title">
       	<h2>
            <a href="<?php the_permalink(); ?>">
                <?php
                    the_title();
                ?>
            </a>
        </h2>
    </div>

    <?php optimistic_blog_lite_post_meta(); ?>

    <div class="post-the-content clearfix layout-one-first-letter">
        <?php
        	the_excerpt();
        ?>
    </div>
    <div class="post-permalink">
    	<a href="<?php the_permalink(); ?>">
    		<?php esc_html_e( 'Continue Reading', 'optimistic-blog-lite' ); ?>
    	</a>
    </div>
    
</article>