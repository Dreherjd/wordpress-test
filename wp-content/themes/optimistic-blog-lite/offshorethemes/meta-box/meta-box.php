<?php
/**
 * Meta Boxes.
 *
 * @package Optimistic_Blog_Lite
 */

function optimistic_blog_lite_meta_init() { 

    add_meta_box('optimistic_blog_lite_display_layout', 
        esc_html__( 'Display Layout Options', 'optimistic-blog-lite' ), 
        'optimistic_blog_lite_display_layout_callback', 
        array('page','post'), 
        'normal', 
        'high'
    );
}
add_action( 'admin_init', 'optimistic_blog_lite_meta_init' );

/**
 * Page and Post Page Display Layout Metabox function
*/
$optimistic_blog_lite_page_layouts = array(

    'leftsidebar' => array(
        'value'     => 'leftsidebar',
        'label'     => esc_html__( 'Left Sidebar', 'optimistic-blog-lite' ),
        'thumbnail' => get_template_directory_uri() . '/offshorethemes/assets/dist/img/left-sidebar.png',
    ),

    'rightsidebar' => array(
        'value'     => 'rightsidebar',
        'label'     => esc_html__( 'Right (Default)', 'optimistic-blog-lite' ),
        'thumbnail' => get_template_directory_uri() . '/offshorethemes/assets/dist/img/right-sidebar.png',
    ),

     'nosidebar' => array(
        'value'     => 'nosidebar',
        'label'     => esc_html__( 'Full width', 'optimistic-blog-lite' ),
        'thumbnail' => get_template_directory_uri() . '/offshorethemes/assets/dist/img/no-sidebar.png',
    )
);

/**
 * Function for Page layout meta box
*/
if ( ! function_exists( 'optimistic_blog_lite_display_layout_callback' ) ) {

    function optimistic_blog_lite_display_layout_callback(){

        global $post, $optimistic_blog_lite_page_layouts;

        wp_nonce_field( basename( __FILE__ ), 'optimistic_blog_lite_settings_nonce' ); ?>
        <table>
            <tr>
              <td>            
                <?php
                  $i = 0;  
                  foreach ($optimistic_blog_lite_page_layouts as $field) {  
                  $optimistic_blog_lite_page_metalayouts = esc_attr( get_post_meta( $post->ID, 'optimistic_blog_lite_page_layouts', true ) ); 
                ?>            
                  <div class="radio-image-wrapper slidercat" id="slider-<?php echo intval( $i ); ?>">
                    <label class="description">
                        <span>
                          <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" />
                        </span></br>
                        <input type="radio" name="optimistic_blog_lite_page_layouts" value="<?php echo esc_attr( $field['value'] ); ?>" <?php checked( esc_html( $field['value'] ), 
                            $optimistic_blog_lite_page_metalayouts ); if( empty( $optimistic_blog_lite_page_metalayouts ) && esc_html( $field['value'] ) =='rightsidebar'){ echo "checked='checked'";  } ?>/>
                         <?php echo esc_html( $field['label'] ); ?>
                    </label>
                  </div>
                <?php  $i++; }  ?>
              </td>
            </tr>            
        </table>
    <?php
    }
}

/**
 * Save the custom metabox data
*/
if ( ! function_exists( 'optimistic_blog_lite_save_page_settings' ) ) {

    function optimistic_blog_lite_save_page_settings( $post_id ) { 

        global $optimistic_blog_lite_page_layouts, $post;

         if ( !isset( $_POST[ 'optimistic_blog_lite_settings_nonce' ] ) || !wp_verify_nonce( sanitize_key( $_POST[ 'optimistic_blog_lite_settings_nonce' ] ) , basename( __FILE__ ) ) ) 
          
            return;

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE) 

            return;        

        if (isset( $_POST['post_type'] ) && 'page' == $_POST['post_type']) {  

            if (!current_user_can( 'edit_page', $post_id ) )  

                return $post_id;  

        } elseif (!current_user_can( 'edit_post', $post_id ) ) {  

                return $post_id;  

        }  

        foreach ($optimistic_blog_lite_page_layouts as $field) {  

            $old = esc_attr( get_post_meta( $post_id, 'optimistic_blog_lite_page_layouts', true) );

            if ( isset( $_POST['optimistic_blog_lite_page_layouts']) ) { 

                $new = sanitize_text_field( wp_unslash( $_POST['optimistic_blog_lite_page_layouts'] ) );

            }
            if ($new && $new != $old) {  

                update_post_meta($post_id, 'optimistic_blog_lite_page_layouts', $new);  

            } elseif ('' == $new && $old) { 

                delete_post_meta($post_id,'optimistic_blog_lite_page_layouts', $old); 

            } 
         } 
    }
}
add_action('save_post', 'optimistic_blog_lite_save_page_settings');