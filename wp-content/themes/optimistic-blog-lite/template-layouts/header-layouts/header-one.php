<?php
/**
 * Template part for header layout
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Optimistic_Blog_Lite
 */

?>
    <header class="general-header header-layout-one">
        <div class="general-header-inner">
            <?php
                $enable_top_header = optimistic_blog_lite_get_option( 'optimistic_blog_lite_enable_top_header' );
                if( $enable_top_header == 1 ) :
            ?>
                    <div class="header-top-wrapper">
                        <div class="header-top-inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="top-search-form-container">
                                            <?php 
                                                get_search_form(); 
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="social-networks">
                                            <ul class="social-links">
                                                <?php
                                                    if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_facebook_link' ) ) {
                                                ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_facebook_link' ) ); ?>"></a>
                                                        </li>
                                                <?php
                                                    }
                                                    if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_twitter_link' ) ) {
                                                ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_twitter_link' ) ); ?>"></a>
                                                        </li>
                                                <?php
                                                    }
                                                    if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_instagram_link' ) ) {
                                                ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_instagram_link' ) ); ?>"></a>
                                                        </li>
                                                <?php
                                                    }
                                                    if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_youtube_link' ) ) {
                                                ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_youtube_link' ) ); ?>"></a>
                                                        </li>
                                                <?php
                                                    }
                                                    if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_snapchat_link' ) ) {
                                                ?>
                                                        <li>
                                                            <a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_snapchat_link' ) ); ?>"></a>
                                                        </li>
                                                <?php
                                                    }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endif;
            ?>
            <div class="container">
                <?php
                    if( has_custom_logo() ) :
                ?>  
                    <div class="site-logo">
                        <?php
                            the_custom_logo();
                        ?>
                    </div>
                <?php
                    else :
                ?>
                    <div class="site-info">
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
                            </a>
                        </h1>
                        <h5 class="site-description">
                            <?php echo esc_html( get_bloginfo( 'description' ) ); ?>
                        </h5>
                    </div>
                <?php
                    endif;
                ?>
            </div>
            <div class="main-nav-container clearfix">
                <div class="menu-container clearfix">
                    <nav id="site-navigation" class="main-navigation" role="navigation">
                        <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                    'menu_class'        => 'primary-menu',
                                    'container'     => 'div',
                                    'container_class'   => 'primary-menu-container',
                                    'fallback_cb'    => 'optimistic_blog_lite_primary_navigation_fallback',
                                )
                            );
                        ?>
                    </nav><!-- #site-navigation -->
                </div><!-- .menu-container.clearfix -->
            </div>
        </div>
    </header>