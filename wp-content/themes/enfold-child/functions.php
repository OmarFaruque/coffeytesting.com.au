<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/



add_image_size( 'map-thumb', 40, 55, true ); // 44 pixels wide by 55 pixels tall, hard crop mode

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
 
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'map-thumb' => __( 'Map Thumb' ),
    ) );
}


require_once(get_stylesheet_directory() . '/inc/custom_posts.php');
require_once(get_stylesheet_directory() . '/inc/additional_function.php');

/* Following code changes "You are here:" in front of breadcrumbs */ 
add_filter('avia_breadcrumbs_args', 'avia_change_you_are_here_breadcrumb', 10, 1);
function avia_change_you_are_here_breadcrumb($args){
$args['before'] = "";
return $args;
}


/**
 * Allowed block types in Gutenberg
 *
*/

add_filter( 'allowed_block_types', 'misha_allowed_block_types' );
 
function misha_allowed_block_types( $allowed_blocks ) {
 
	return array(
		'core/freeform'
		
	);
 
}

/**
 * Gutenberg Block template for posts
 *
*/
function be_post_block_template() {

  $post_type_object = get_post_type_object( 'post' );
  $post_type_object->template = array(
    array( 'core-embed/youtube' ),
    array( 'core/freeform' ),
  );
}
add_action( 'init', 'be_post_block_template' );


/**
 * Remove Gravity Forms register notifications on plugins page
 *
*/

add_action('admin_head', 'gravity_remove_notification');

function gravity_remove_notification() {
  echo '<style>
    tr[data-slug="gravity-forms"] + tr.plugin-update-tr {
	display: none;
}
  </style>';
}


/**
 * Hide sublabels in Gravity Forms
 *
*/

add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );



/**
 * Hide Yoast Message
 *
*/


add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    #wpseo-metabox-root .fPPzuK {
      display: none;
    } 
  </style>';
}

// if(!function_exists('location_add_meta_box')){
  function location_add_meta_box() {
      add_meta_box(
        'locationMeta',
        __( 'Additional Information', 'coffey' ),
        'locationMetacallback',
        'location'
      );		
  }
  add_action( 'add_meta_boxes', 'location_add_meta_box' );
  // }
  
  
  // Change Login Logo

function wpb_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(/wp-content/uploads/2019/08/logo-1.png);
            width: 192px;
            height:74px;
    background-size: 192px 88px;
    background-repeat: no-repeat;
    padding-bottom: 0;
    margin-right: 30px;
        }
       
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

// Change Login Link

function wpb_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );
 
function wpb_login_logo_url_title() {
    return 'Coffey Testing - Login';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );


  
require_once(get_stylesheet_directory() . '/inc/email-template.php');