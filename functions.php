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


