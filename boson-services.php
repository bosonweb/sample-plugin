<?php
/*
   Plugin Name: Boson Web - Services Module
   Plugin URI: http://bosonweb.net
   Description: This plugin allows you to manage your services.
   Version: 1.0
   Author: Boson Web
   Author URI: http://bosonweb.net
   License: GPL2
   */

function custom_post_type_services() {

    /********************
     SERVICES POST TYPE
    ********************/
    $labels_services = array(
            'name'                => _x( 'Services', 'Post Type General Name', 'vanilla' ),
            'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'vanilla' ),
            'menu_name'           => __( 'Services', 'vanilla' ),
            'parent_item_colon'   => __( 'Parent Service', 'vanilla' ),
            'all_items'           => __( 'All Services', 'vanilla' ),
            'view_item'           => __( 'View Service', 'vanilla' ),
            'add_new_item'        => __( 'Add New Service', 'vanilla' ),
            'add_new'             => __( 'Add New', 'vanilla' ),
            'edit_item'           => __( 'Edit Service', 'vanilla' ),
            'update_item'         => __( 'Update Service', 'vanilla' ),
            'search_items'        => __( 'Search Service', 'vanilla' ),
            'not_found'           => __( 'Not Found', 'vanilla' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'vanilla' ),
    );
    $args_services = array(
            'label'               => __( 'services', 'vanilla' ),
            'description'         => __( 'Some of the services you provide', 'vanilla' ),
            'labels'              => $labels_services,
            'supports'            => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 4,
            'menu_icon'           => 'dashicons-yes',
            'can_export'          => true,
            'has_archive'         => true, // index Page
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
    );
    
    // Registering your Custom Post Type
    register_post_type( 'services', $args_services );

}

/* Hook into the 'init' action so that the function
 * Containing our post type registration is not
 * unnecessarily executed.
 */
add_action( 'init', 'custom_post_type_services', 0 );


/****************************
LOAD TEMPLATES
*****************************/

// SINGLE TEMPAGE
add_filter('single_template', 'service_single_template');
function service_single_template($single) {
	$cptName = 'services';
    global $wp_query, $post;
    $plugin_path = plugin_dir_path( __FILE__ );
    if ($post->post_type == $cptName){
        if(file_exists($plugin_path . '/templates/single-'.$cptName.'.php')) {
            return $plugin_path . '/templates/single-'.$cptName.'.php'; 
        }
    }
    return $single;
}

// ARCHIVE PAGE TEMPAGE
add_filter('archive_template', 'service_archive_template');
function service_archive_template($archive) {
    $cptName = 'services';
    global $wp_query, $post;
    $plugin_path = plugin_dir_path( __FILE__ );
    if ($post->post_type == $cptName){
        if(file_exists($plugin_path . 'templates/archive-'.$cptName.'.php')) {
            return $plugin_path . '/templates/archive-'.$cptName.'.php';
        }
    }
    return $archive;
}

/****************************
LOAD ACF FIELDS
*****************************/
require_once('acf-fields.php');


/****************************
ADD SAMPLE PAGE
*****************************/
register_activation_hook( __FILE__, 'add_default_page_services');

function add_default_page_services()
{
    $post = array(
          'comment_status' => 'closed',
          'ping_status' =>  'closed' ,
          'post_author' => 1,
          'post_date' => date('Y-m-d H:i:s'),
          'post_name' => 'Services',
          'post_status' => 'publish' ,
          'post_title' => 'Services',
          'post_type' => 'page'
    );  
    //insert page and save the id
    $pageItem = wp_insert_post( $post, false );

    //save the id in the database
    update_option( 'hclpage', $pageItem );
}

?>