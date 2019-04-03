<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */

$postformat = get_post_format();
$post_id = get_the_ID();
$post_thumbnail = 'optimistic-blog-lite-thumbnail-1';
$content_item = optimistic_blog_lite_post_format_media( $postformat, $post_id, $post_thumbnail );
?>
<article class="post-details-holder layout-two-post-details-holder wow fadeInUp">
    <div class="row">
        <div class="col-sm-5 col-xs-12">
        	<?php
        		if( has_post_thumbnail() ) :
        	?>
        			<div class="post-image">
                        <?php
                        	the_post_thumbnail( $post_thumbnail, array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
                        ?>
                    </div>
            <?php
            	endif;
            ?>
        </div>
        <div class="col-sm-7 col-xs-12">
            <?php
                if( 'post' == get_post_type() ) :
            ?>
                    <div class="post-meta-category">
                        <p><?php optimistic_blog_lite_get_categories(); ?></p>
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
            
        </div>
    </div>
</article>
