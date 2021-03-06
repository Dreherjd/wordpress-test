<?php    
/**
 * The template for displaying Services on the Front Page.
 *
 * This is the template that displays a list of services on the Front Page.
 *
 * @package cleanews
 */
?>
    <div class="service-item group">
                
        <!--Services Featured Image as BG Image--> 
        <?php if( has_post_thumbnail() ) { ?>
            <div class="service-background desaturate" style="background: url( <?php the_post_thumbnail_url( 'large' ); ?> );"></div>
        <?php } ?>

        <!--Services Title--> 
        <div class="services-title">
            <a class="services-link" href="<?php the_permalink(); ?>" title="<?php echo esc_html__( 'Learn more about ', 'cleanews' ) . get_the_title(); ?>">

                <?php cleanews_the_post_icon(); ?>
                <h2 class="entry-title"><?php the_title(); ?></h2>
        
            </a>
        </div>

        <!--Services Content--> 
        <div class="services-lede">
            <?php the_excerpt(); ?>
        </div>
        
        <a class="button more-link" role="button" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Learn More &rarr;', 'cleanews' ); ?></a>

    </div><!-- .service-item .group -->
