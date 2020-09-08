<?php 
/*
* Email Template 
*/

if(!class_exists('emialTemplates')){
    class emialTemplates{

    public function __construct(){
        add_action( 'init', array($this, 'registerEmailTemplateCallback') );
        add_action( 'init', array($this, 'formPostCallback') );
        add_filter( 'protected_title_format', array($this, 'remove_protected_text') );
        add_filter('the_content', array($this, 'theContentFilterCallback'));
    }


    public function theContentFilterCallback($content){
        global $post;
        if( get_post_type( $post->ID ) == 'email-template' && $post->post_password && !post_password_required() ){
            ob_start();
            ?>
                <hr>
                <div id="sendEmailWrap">
                    <h3><?php _e('Send Email to:', 'email_template'); ?></h3>
                    <form action="" id="emailSend" method="post">
                        <div class="from-group">
                            <div class="flex_column av_one_two  first el_before_av_one_fourth">
                                <?php wp_nonce_field( 'email_submit_action', 'email_submit_nonce' ); ?>
                                <input type="mail" class="form-control w-100" name="email" value="" />
                                <input type="hidden" name="post_id" value="<?php echo $post->ID; ?>">
                                <input name="email_submit" type="submit" value="<?php _e('Send', 'email_template'); ?>" class="btn btn-primary">
                            </div>
                            
                        </div>
                    </form>
                </div>
            <?php 
            $content .= ob_get_clean();
        }

        return $content;
    }

    
    public function remove_protected_text($format) {
        global $post;
        
        if( get_post_type( $post->ID ) == 'email-template'){
            $format = __('%s');
        }
        return $format;
    }

    
    public function formPostCallback(){
        if(isset($_POST['email_submit']) && wp_verify_nonce( $_POST['email_submit_nonce'], 'email_submit_action' )){
            $post = get_post($_POST['post_id']);
            $headers = array('Content-Type: text/html; charset=UTF-8');

            $to = wp_mail( 
                $_POST['email'], 
                $post->post_title, 
                $post->post_content, 
                $headers, 
                '' 
            );

            // if($to){
            //     echo 'email Send';
            // }else{
            //     echo 'email send failed';
            // }
        }
    }

    public function registerEmailTemplateCallback(){
        $labels = array(
            'name'                  => _x( 'Email Template', 'Post type general name', 'emailtemplate' ),
            'singular_name'         => _x( 'Email Template', 'Post type singular name', 'emailtemplate' ),
            'menu_name'             => _x( 'Email Templates', 'Admin Menu text', 'emailtemplate' ),
            'name_admin_bar'        => _x( 'Email Template', 'Add New on Toolbar', 'emailtemplate' ),
            'add_new'               => __( 'Add New', 'emailtemplate' ),
            'add_new_item'          => __( 'Add New Email Template', 'emailtemplate' ),
            'new_item'              => __( 'New Email Template', 'emailtemplate' ),
            'edit_item'             => __( 'Edit Email Template', 'emailtemplate' ),
            'view_item'             => __( 'View Email Template', 'emailtemplate' ),
            'all_items'             => __( 'All Email Templates', 'emailtemplate' ),
            'search_items'          => __( 'Search Email Templates', 'emailtemplate' ),
            'parent_item_colon'     => __( 'Parent Email Templates:', 'emailtemplate' ),
            'not_found'             => __( 'No email template found.', 'emailtemplate' ),
            'not_found_in_trash'    => __( 'No email template found in Trash.', 'emailtemplate' ),
            'featured_image'        => _x( 'Email Template Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'emailtemplate' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'emailtemplate' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'emailtemplate' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'emailtemplate' ),
            'archives'              => _x( 'Email Template archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'emailtemplate' ),
            'insert_into_item'      => _x( 'Insert into Email Template', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'emailtemplate' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Email Template', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'emailtemplate' ),
            'filter_items_list'     => _x( 'Filter email template list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'emailtemplate' ),
            'items_list_navigation' => _x( 'Email Templates list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'emailtemplate' ),
            'items_list'            => _x( 'Email Templates list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'emailtemplate' ),
        );
        
        $args = array(
            'labels'             => $labels,
            'menu_icon'          => 'dashicons-email-alt2',
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'email-template' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'supports'           => array( 'title', 'editor' ),
        );
        register_post_type( 'email-template', $args );
    }
}
new emialTemplates;
}
