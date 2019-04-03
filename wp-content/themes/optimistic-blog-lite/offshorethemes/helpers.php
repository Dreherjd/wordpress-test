<?php
/**
 * Helper Functions.
 *
 * @package Optimistic_Blog_Lite
 */


/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'optimistic_blog_lite_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function optimistic_blog_lite_fonts_url()
    {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Vollkorn font: on or off', 'optimistic-blog-lite')) {
            $fonts[] = 'Vollkorn:400,400i,600,700,700i,900';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Ruthie font: on or off', 'optimistic-blog-lite')) {
            $fonts[] = 'Ruthie';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Lato font: on or off', 'optimistic-blog-lite')) {
            $fonts[] = 'Lato:300,400,700';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Spectral SC font: on or off', 'optimistic-blog-lite')) {
            $fonts[] = 'Spectral+SC:400,600,700';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
endif;


/**
 * Funtion For Fallback
 */
if( !function_exists( 'optimistic_blog_lite_primary_navigation_fallback' ) ) {
    /**
     * Return Fallback Navigation Menu
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function optimistic_blog_lite_primary_navigation_fallback() {
        ?>
        <div class="primary-menu-container">
            <ul id="primary-menu" class="primary-menu">
                <?php wp_list_pages( array( 'title_li' => '' ) ); ?>
            </ul>
        </div>
        <?php
    }
}