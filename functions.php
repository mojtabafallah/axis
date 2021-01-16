<?php
include ('constants.php');
require_once 'vendor/autoload.php';
use app\controllers\MenuController;
use app\controllers\dbcontroller;

add_action('after_switch_theme', 'action_after_setup_theme');
add_action('admin_menu', array(MenuController::class, 'my_menu_pages'));



function wpb_custom_new_menu() {
    register_nav_menu('my-custom-menu',__( 'بالا در سر صفحه' ));
}

add_action( 'init', 'wpb_custom_new_menu' );

function wpb_custom_footer() {
    register_nav_menu('footer_menu',__( 'پایین در سر پا صفحه' ));
}

add_action( 'init', 'wpb_custom_footer' );

add_theme_support( 'post-thumbnails' );

function action_after_setup_theme()
{
  dbcontroller::connection();
}

add_action('admin_head', 'my_custom_css');

function open_media()
{
    wp_enqueue_media(  );
}
add_action('admin_enqueue_scripts','open_media');
function my_custom_css()
{
    echo '<style>
 
  </style>';
}


/*count view*/

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}