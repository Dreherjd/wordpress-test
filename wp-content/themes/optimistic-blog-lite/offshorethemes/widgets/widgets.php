<?php
/**
 * Widgets Classes
 *
 * @package Optimistic_Blog_Lite
 */

if ( ! class_exists( 'Optimistic_Blog_Lite_Author_Widget' ) ) :
	/**
	* Author Widget
	*/
	class Optimistic_Blog_Lite_Author_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'widget-about-me',
				'description'	=> esc_html__( 'Displays short information of Author. Place it in "Sidebar"', 'optimistic-blog-lite' )
			);

			parent::__construct( 'sidebar-widget-one', esc_html__( 'OBL: Author', 'optimistic-blog-lite' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$author_page        = !empty( $instance['author_page'] ) ? $instance['author_page'] : ''; 

            $facebook_link    	= !empty( $instance['link_facebook'] ) ? $instance['link_facebook'] : '';

            $twitter_link     	= !empty( $instance['link_twitter'] ) ? $instance['link_twitter'] : ''; 

            $instagram_link   	= !empty( $instance['link_instagram'] ) ? $instance['link_instagram'] : '';

            $youtube_link     	= !empty( $instance['link_youtube'] ) ? $instance['link_youtube'] : '';

            $snapchat_link     	= !empty( $instance['link_snapchat'] ) ? $instance['link_snapchat'] : '';

            $author_sign     	= !empty( $instance['author_sign'] ) ? $instance['author_sign'] : '';

			echo $args[ 'before_widget' ];

				$page_args = array(
					'page_id'	=> absint( $author_page ),
					'post_type' => 'page'
				); 

				$page_query = new WP_Query( $page_args );

				if( $page_query->have_posts() ) :
					while( $page_query->have_posts() ) :
						$page_query->the_post();
						if( has_post_thumbnail() ) :
				?>
							<div class="widget-about-me-profile">
								<?php
									the_post_thumbnail( 'style-blog-thumbnail-archive', array( 'alt' => the_title_attribute( array( 'echo' => false ) ) ) );
								?>
							</div>
				<?php
						endif;
				?>
					<div class="widget-extra-info-holder">
						<div class="widget-author-name">
							<h3>
								<?php
									the_title();
								?>
							</h3>
						</div>
						<div class="widget-author-bio">
							<?php
								the_content();
							?>
						</div>
						<?php
							if( $facebook_link || $twitter_link || $instagram_link || $youtube_link || $snapchat_link) :
						?>
						<div class="widget-author-social">
							<ul class="social-links">
								<?php
									if( $facebook_link ) :
								?>
								<li><a href="<?php echo esc_url( $facebook_link ); ?>"></a></li>
								<?php
									endif;
									if( $twitter_link ) :
								?>
								<li><a href="<?php echo esc_url( $twitter_link ); ?>"></a></li>
								<?php
									endif;
									if( $instagram_link ) :
								?>
								<li><a href="<?php echo esc_url( $instagram_link ); ?>"></a></li>
								<?php
									endif;
									if( $youtube_link ) :
								?>
								<li><a href="<?php echo esc_url( $youtube_link ); ?>"></a></li>
								<?php
									endif;
									if( $snapchat_link ) :
								?>
								<li><a href="<?php echo esc_url( $snapchat_link ); ?>"></a></li>
								<?php
									endif;
								?>
							</ul>
						</div>
						<?php
							endif;
							if( $author_sign ) : 
						?>
								<div class="widget-author-signature">
									<img src="<?php echo esc_url( $author_sign ); ?>">
								</div>
						<?php
							endif;
						?>
					</div>
				<?php 
					endwhile;
					wp_reset_postdata();
				endif;
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

            $instance['author_page']        = absint( $new_instance['author_page'] );

            $instance['link_facebook']    	= esc_url_raw( $new_instance['link_facebook'] );

            $instance['link_twitter']     	= esc_url_raw( $new_instance['link_twitter'] );

            $instance['link_instagram']   	= esc_url_raw( $new_instance['link_instagram'] );

            $instance['link_youtube']     	= esc_url_raw( $new_instance['link_youtube'] );

            $instance['link_snapchat']     	= esc_url_raw( $new_instance['link_snapchat'] );

            $instance['author_sign']     	= esc_url_raw( $new_instance['author_sign'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
                'author_page'       => '',
                'link_facebook'   	=> '',
                'link_twitter'    	=> '',
                'link_instagram'  	=> '',
                'link_youtube'    	=> '',
                'link_snapchat'    	=> '',
                'author_sign'		=> '',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );

            $author_sign_img = esc_url( $instance['author_sign'] );

			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'author_page' ) )?>"><strong><?php echo esc_html__( 'Author Page', 'optimistic-blog-lite' ); ?></strong></label>
				<?php
					wp_dropdown_pages( array(
	                    'id'               => esc_attr( $this->get_field_id( 'author_page' ) ),
	                    'class'            => 'widefat',
	                    'name'             => esc_attr( $this->get_field_name( 'author_page' ) ),
	                    'selected'         => esc_attr( $instance[ 'author_page' ] ),
	                    'show_option_none' => esc_html__( '&mdash; Select Page &mdash;', 'optimistic-blog-lite' ),
	                    )
	                );
				?>
			</p>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('link_facebook') ); ?>">
                    <strong><?php esc_html_e('Facebook Link', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_facebook') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_facebook') ); ?>" type="text" value="<?php echo esc_url( $instance['link_facebook'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('link_twitter') ); ?>">
                    <strong><?php esc_html_e('Twitter Link', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_twitter') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_twitter') ); ?>" type="text" value="<?php echo esc_url( $instance['link_twitter'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('link_instagram') ); ?>">
                    <strong><?php esc_html_e('Instagram Link', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_instagram') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_instagram') ); ?>" type="text" value="<?php echo esc_url( $instance['link_instagram'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('link_youtube') ); ?>">
                    <strong><?php esc_html_e('Youtube Link', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_youtube') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_youtube') ); ?>" type="text" value="<?php echo esc_url( $instance['link_youtube'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr( $this->get_field_name('link_snapchat') ); ?>">
                    <strong><?php esc_html_e('Snapchat Link', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('link_snapchat') ); ?>" name="<?php echo esc_attr( $this->get_field_name('link_snapchat') ); ?>" type="text" value="<?php echo esc_url( $instance['link_snapchat'] ); ?>" />   
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('author_sign')); ?>">
                    <strong><?php esc_html_e('Add Signature', 'optimistic-blog-lite'); ?></strong>
                </label>
                <br/>
                <?php
                if (!empty($author_sign_img)) :
                    echo '<img class="custom_media_image widefat" src="' . esc_url( $author_sign_img ) . '"/><br />';
                endif;
                ?>
                <input type="text" class="widefat custom_media_url"
                       name="<?php echo esc_attr($this->get_field_name('author_sign')); ?>"
                       id="<?php echo esc_attr($this->get_field_id('author_sign')); ?>" value="<?php echo esc_url( $author_sign_img ); ?>">
                <input type="button" class="button button-primary custom_media_button" id="custom_media_button"
                       name="<?php echo esc_attr($this->get_field_name('author_sign')); ?>"
                       value="<?php esc_attr_e('Upload', 'optimistic-blog-lite') ?>"/>
            </p>
			<?php			
		}
	}
endif;

if ( ! class_exists( 'Optimistic_Blog_Lite_Social_Widget' ) ) :
	/**
	* Social Widget
	*/
	class Optimistic_Blog_Lite_Social_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'widget-social-links',
				'description'	=> esc_html__( 'Displays Social Links. Place it in "Sidebar"', 'optimistic-blog-lite' )
			);

			parent::__construct( 'sidebar-widget-two', esc_html__( 'OBL: Social', 'optimistic-blog-lite' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			echo $args[ 'before_widget' ];

				echo $args[ 'before_title' ];
					echo esc_html( $title );
				echo $args[ 'after_title' ];
			?>
				<div class="widget-extra-info-holder">
					<div class="widget-social-links">
						<ul class="social-links-list">
							<?php
								if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_facebook_link' ) ) :
							?>
							<li class="facebook-link">
								<a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_facebook_link' ) ); ?>" class="clearfix" target="_blank">
									<?php esc_html_e( 'Facebook', 'optimistic-blog-lite'); ?>          
									<span class="social-icon">
										<i class="fa fa-facebook"></i>
									</span>     
								</a>
							</li>
							<?php
								endif;
								if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_twitter_link' ) ) :
							?>
							<li class="twitter-link">
								<a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_twitter_link' ) ); ?>" class="clearfix" target="_blank">
									<?php esc_html_e( 'Twitter', 'optimistic-blog-lite'); ?>       
									<span class="social-icon">
										<i class="fa fa-twitter"></i>
									</span>
								</a>
							</li>
							<?php
								endif;
								if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_googleplus_link' ) ) :
							?>
							<li class="googleplus-link">
								<a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_googleplus_link' ) ); ?>" class="clearfix" target="_blank">
									<?php esc_html_e( 'Google Plus', 'optimistic-blog-lite'); ?>   
									<span class="social-icon">
										<i class="fa fa-google-plus"></i>
									</span>
								</a>
							</li>
							<?php
								endif;
								if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_instagram_link' ) ) :
							?>
							<li class="instagram-link">
								<a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_instagram_link' ) ); ?>" class="clearfix" target="_blank">
									<?php esc_html_e( 'Instagram', 'optimistic-blog-lite'); ?>          
									<span class="social-icon">
										<i class="fa fa-instagram"></i>
									</span>
								</a>
							</li>
							<?php
								endif;
								if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_linkedin_link' ) ) :
							?>
							<li class="linkedin-link">
								<a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_linkedin_link' ) ); ?>" class="clearfix" target="_blank">
									<?php esc_html_e( 'Linked In', 'optimistic-blog-lite'); ?>      
									<span class="social-icon">
										<i class="fa fa-linkedin"></i>
									</span>
								</a>
							</li>
							<?php
								endif;
								if( optimistic_blog_lite_get_option( 'optimistic_blog_lite_youtube_link' ) ) :
							?>
							<li class="youtube-link">
								<a href="<?php echo esc_url( optimistic_blog_lite_get_option( 'optimistic_blog_lite_youtube_link' ) ); ?>" class="clearfix" target="_blank">
									<?php esc_html_e( 'Youtube', 'optimistic-blog-lite'); ?>
									<span class="social-icon">
										<i class="fa fa-youtube"></i>
									</span>
								</a>
							</li>
							<?php
								endif;
							?>
						</ul>
					</div>
				</div>
			<?php
				
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

            $instance['title']  = sanitize_text_field( $new_instance['title'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
                'title'       => '',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );

            $facebook_link = optimistic_blog_lite_get_option( 'optimistic_blog_lite_facebook_link' );
            $twitter_link = optimistic_blog_lite_get_option( 'optimistic_blog_lite_twitter_link' );
            $instagram_link = optimistic_blog_lite_get_option( 'optimistic_blog_lite_instagram_link' );
            $googleplus_link = optimistic_blog_lite_get_option( 'optimistic_blog_lite_googleplus_link' );
            $youtube_link = optimistic_blog_lite_get_option( 'optimistic_blog_lite_youtube_link' );
            $linkedin_link = optimistic_blog_lite_get_option( 'optimistic_blog_lite_linkedin_link' );
            $snapchat_link = optimistic_blog_lite_get_option( 'optimistic_blog_lite_snapchat_link' );
			?>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                    <strong><?php esc_html_e('Title', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>
			<?php		
			if( empty( $facebook_link ) || empty( $twitter_link ) || empty( $instagram_link ) || empty( $googleplus_link ) || empty( $youtube_link ) || empty( $linkedin_link ) || empty( $snapchat_link ) ) :
			?>
				<p>
					<a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=optimisitic_blog_links_options' ) ); ?>">
                       <?php esc_html_e('Insert Links','optimistic-blog-lite'); ?>
                   </a>
				</p>
			<?php	
			endif;
		}
	}
endif;

if ( ! class_exists( 'Optimistic_Blog_Lite_Trending_Posts_Widget' ) ) :
	/**
	* Trending Posts Widget
	*/
	class Optimistic_Blog_Lite_Trending_Posts_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'widget-popular-post',
				'description'	=> esc_html__( 'Displays posts based on number of comments. Place it in "Sidebar"', 'optimistic-blog-lite' )
			);

			parent::__construct( 'sidebar-widget-four', esc_html__( 'OBL: Most Commented', 'optimistic-blog-lite' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$posts_no = !empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;

			echo $args[ 'before_widget' ];

				echo $args[ 'before_title' ];
					echo esc_html( $title );
				echo $args[ 'after_title' ];

			$trending_args = array(
				'order' => 'DESC',
				'orderby' => 'comment_count', 
				'posts_per_page' => absint( $posts_no ),
				'post_type' => 'post'
			);

			$trending_query = new WP_Query( $trending_args );
			if( $trending_query->have_posts() ) :
			?>
				<div class="widget-extra-info-holder">
					<?php
						while( $trending_query->have_posts() ) :
							$trending_query->the_post();
					?>
							<div class="widget-posts clearfix">
								<div class="post-thumb">
									<?php
										the_post_thumbnail( 'optimistic-blog-lite-thumbnail-5' );
									?>
								</div>
								<div class="post-title">
									<h5>
										<a href="<?php the_permalink(); ?>">
											<?php
												the_title();
											?>
										</a>
									</h5>
								</div>
							</div>
					<?php
						endwhile;
						wp_reset_postdata();
					?>
				</div>
			<?php
			endif;
				
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

            $instance['title']  	= sanitize_text_field( $new_instance['title'] );

            $instance['post_no']  	= absint( $new_instance['post_no'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
                'title'       => '',
                'post_no'	  => 5,
            );

            $instance = wp_parse_args( (array) $instance, $defaults );

			?>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                    <strong><?php esc_html_e('Title', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>

			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>">
                    <strong><?php esc_html_e('No of Popular Posts', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />   
            </p>
			
			<?php
		}
	}
endif;

if ( ! class_exists( 'Optimistic_Blog_Lite_Recent_Posts_Widget' ) ) :
	/**
	* Recent Posts Widget
	*/
	class Optimistic_Blog_Lite_Recent_Posts_Widget extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'widget-recent-posts',
				'description'	=> esc_html__( 'Displays recent posts in slider. Place it in "Sidebar"', 'optimistic-blog-lite' )
			);

			parent::__construct( 'sidebar-widget-five', esc_html__( 'OBL: Recent Posts', 'optimistic-blog-lite' ), $opts );
		}

		function widget( $args, $instance ) {
			
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$posts_no = !empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;

			echo $args[ 'before_widget' ];

				echo $args[ 'before_title' ];
					echo esc_html( $title );
				echo $args[ 'after_title' ];

			$recent_args = array(
				'posts_per_page' => absint( $posts_no ),
				'post_type' => 'post'
			);

			$recent_query = new WP_Query( $recent_args );
			if( $recent_query->have_posts() ) :
			?>
				<div class="widget-extra-info-holder">
					<div class="widget-recent-posts">
                        <div class="widget-rpag-gallery-container">
                        	<div class="swiper-wrapper">
								<?php
									while( $recent_query->have_posts() ) :
										$recent_query->the_post();
								?>
										<div class="swiper-slide">
											<?php
												if( has_post_thumbnail() ) :
													the_post_thumbnail( 'optimistic-blog-lite-thumbnail-3' );
												else: ?>
													<img src="<?php echo esc_url( get_template_directory_uri()).'/offshorethemes/assets/dist/img/noimage.png' ?>">
											<?php endif; ?>

											<div class="mask"></div>
											<div class="slide-content">
												<div class="post-title">
													<h5>
														<a href="<?php the_permalink() ?>">
															<?php
																the_title();
															?>
														</a>
													</h5>
												</div>
											</div>
										</div>
										
								<?php
									endwhile;
									wp_reset_postdata();
								?>
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>
			<?php
			endif;
				
			echo $args[ 'after_widget' ]; 
		}

		function update( $new_instance, $old_instance ) {

			$instance = $old_instance;

            $instance['title']  	= sanitize_text_field( $new_instance['title'] );

            $instance['post_no']  	= absint( $new_instance['post_no'] );

            return $instance;
		}

		function form( $instance ) {
			$defaults = array(
                'title'       => '',
                'post_no'	  => 5,
            );

            $instance = wp_parse_args( (array) $instance, $defaults );

			?>
			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('title') ); ?>">
                    <strong><?php esc_html_e('Title', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>" name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />   
            </p>

			<p>
                <label for="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>">
                    <strong><?php esc_html_e('No of Popular Posts', 'optimistic-blog-lite'); ?></strong>
                </label>
                <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('post_no') ); ?>" name="<?php echo esc_attr( $this->get_field_name('post_no') ); ?>" type="number" value="<?php echo esc_attr( $instance['post_no'] ); ?>" />   
            </p>
			
			<?php
		}
	}
endif;
