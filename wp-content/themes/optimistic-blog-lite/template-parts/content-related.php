<?php
/**
 * Template part for displaying related posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */

$show_related_posts = optimistic_blog_lite_get_option( 'optimistic_blog_lite_enable_related_post' );
$related_posts_no = optimistic_blog_lite_get_option( 'optimistic_blog_lite_related_posts_no' );

$related_args = array(
    'no_found_rows'       => true,
    'ignore_sticky_posts' => true,
    'posts_per_page'      => absint( $related_posts_no ),
);

$current_object = get_queried_object();

if ( $current_object instanceof WP_Post ) {

    $current_id = $current_object->ID;

    if ( absint( $current_id ) > 0 ) {
        // Exclude current post.
        $related_args['post__not_in'] = array( absint( $current_id ) );

        // Include current posts categories.
        $categories = wp_get_post_categories( $current_id );

        if ( ! empty( $categories ) ) {
            $related_args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $categories,
                    'operator' => 'IN',
                )
            );
        }
    }
}

$related_posts = new WP_Query( $related_args );

$post_id = get_the_ID();
$post_layout = get_post_meta( $post_id, 'post_layout_radio', true );

$related_post_class = '';

if( $post_layout == 'nrml_rght' || $post_layout == 'nrml_left' ) {
	$related_post_class = 'related-post-carousel owl-carousel';
} else {
	$related_post_class = 'related-post-carousel-three-cards owl-carousel';
}

if( $related_posts->have_posts() && ( $show_related_posts == 1 ) ) :
?>
	<div class="related-posts-wrapper">
        <div class="related-posts-inner">
            <div class="<?php echo esc_attr( $related_post_class ); ?>">
            	<?php
            		while( $related_posts->have_posts() ) :
            			$related_posts->the_post();
            			$postformat = get_post_format();
						$post_id = get_the_ID();
						$post_thumbnail = 'optimistic-blog-lite-thumbnail-1';
						$content_item = optimistic_blog_lite_post_format_media( $postformat, $post_id, $post_thumbnail );
				?>
						<div class="grid-item item">
						    <article class="post-details-holder layout-three-post-details-holder wow fadeInUp">
						        <div class="post-image <?php if( $postformat == 'gallery' ) { echo esc_attr__( 'gallery-post', 'optimistic-blog-lite' ); } if( $postformat == 'link' ) { echo esc_attr__( 'link-post', 'optimistic-blog-lite' ); } ?>">
						            <?php
						            	if( $postformat == 'gallery' ) {
						                    if( is_array( $content_item ) ) {
						            	?>
						            			<div class="inpostgallery-container">
						                            <div class="swiper-wrapper">
						                            <?php
						                            	foreach( $content_item as $image_url ) :
						                            ?>
						                                <div class="swiper-slide">
						                                    <img src='<?php echo esc_url( $image_url ); ?>' alt="<?php the_title_attribute(); ?>">
						                                </div>   
						                            <?php
						                            	endforeach;
						                            ?>                                 
						                            </div>
						                            <div class="swiper-button-next swiper-button-white"></div>
						                           	<div class="swiper-button-prev swiper-button-white"></div>
						                        </div>
						            	<?php
						                    } else {
						                ?>
						                        <img src='<?php echo esc_url( $content_item ); ?>'>
						                <?php
						                    }
						            	} else if( $postformat == 'video' ) {
						                    if( is_string( $content_item ) ) {
							                    echo $content_item;
							               	} else {
							                    if( has_post_thumbnail() ) {
							                        the_post_thumbnail( $post_thumbnail, array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
							                    }
							                } 						            			
						            	} else if( $postformat == 'audio' ) {
						                    if( is_string( $content_item ) ) {
							                    echo $content_item;
							               	} else {
							                    if( has_post_thumbnail() ) {
							                        the_post_thumbnail( $post_thumbnail, array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
							                    }
							                } 						            			
						            	} else if( $postformat == 'link' ) {
						            	?>
						            		<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						                        <?php
						                            echo esc_html( get_the_author() );
						                        ?>
						                    </a>
						            	<?php
						            	} else {
						            	?>
						            		<img src="<?php echo esc_url( $content_item ); ?>" alt="<?php the_title_attribute(); ?>">
						            	<?php
						            	}
						            	?>
						        </div>
						        <!-- // post image -->
						        <div class="post-extra-details">
						            <div class="post-title">
						                <h2>
						                	<a href="<?php the_permalink(); ?>">
						                		<?php the_title(); ?>
						                	</a>
						                </h2>
						            </div>
						        </div>
						        <!-- // post extra details -->
						    </article>
						    <!-- // article -->
						</div>			<?php
            		endwhile;
            		wp_reset_postdata();
            	?>
            </div>
        </div>
    </div>
<?php
endif;

?>

