<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cleanews
 */

?>

</div><!-- #content -->

<a href="#" class="topbutton"></a><!-- Back to top button -->

<footer id="colophon" class="site-footer" role="contentinfo">

    <div class="row"><!-- Start Foundation row -->

        <?php get_sidebar( 'footer' ); ?>

    </div><!-- End Foundation row -->



    <div class="copyright small-12 columns text-center">
        <?php echo esc_html('&copy; ') . esc_html(date_i18n(__('Y','cleanews'))); ?> <?php bloginfo( 'name' ); ?>
        
         <a class="powered-by-link" href="<?php echo esc_url( __( 'http://themeastronaut.com/cleanews/', 'cleanews' ) ); ?>"><?php printf( __( '- Powered by %s', 'cleanews' ), 'Cleanews' ); ?></a>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
