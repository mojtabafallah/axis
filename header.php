<?php use app\controllers\Assets;

$tell = ot_get_option('tell', false);
$menu_left = ot_get_option('menu_left', array());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo Assets::css('bootstrap-rtl.min.css') ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('font-awesome.min.css') ?> ">
    <link rel="stylesheet" href="<?php echo Assets::css('style.css') ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('responsive.css') ?>">
</head>
<body>
<!-- start of the header -->
<header class="header_custom">
    <div class="container main-container">
        <div class="col-12 header_search_custom">

            <div class="phone_number">
                <span class="fa fa-phone phone_header_custom"></span>
                <span class="first_of_the_number">021</span>
                <span class="end_of_the_number"><?php echo $tell?></span>
            </div>


            <div class="header_search_form">
                <form action="">
                    <input type="text">
                    <button class="header_seach_form_button"><span class="fa fa-search"></span></button>
                </form>
            </div>


            <div class="header_logo">
                <img src="<?php echo Assets::image('logo.png') ?>" alt="">
            </div>

        </div>
    </div>
    <div class="container main-container">
        <div class="menu_section ">
            <div class="col-8" style="padding: 0;">
                <div class="first_menu">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'my-custom-menu',
                        'container_class' => 'custom-menu-class' ) );
                    ?>
                </div>
            </div>
            <div class="col-4">
                <div class="second_menu">
                    <ul>
                        <?php foreach ($menu_left as $menu):?>
                            <li><a href="<?php echo $menu['link']?>"><?php echo $menu['text']?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="layout_custom"></div>
        <div class="second_menu_section">

            <div class="second_menu_section_1">
                <span class="fa fa-bars bar_custom"></span>
                <div class="mobile_menu_1">
                    <img src="<?php echo Assets::image('logo.png') ?>" alt="">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'my-custom-menu',
                        'container_class' => 'custom-menu-class' ) );
                    ?>

                            <ul>
                                <?php foreach ($menu_left as $menu):?>
                                    <li><a href="<?php echo $menu['link']?>"><?php echo $menu['text']?></a></li>
                                <?php endforeach;?>
                            </ul>

                </div>

            </div>
            <div class="layout2"></div>
            <div class="second_menu_section_2">
                <span class="fa fa-bars bar_custom_2"></span>
                <div class="mobile_menu_2">

                    <div class="phone_number mobile_phone_number">
                        <span class="fa fa-phone phone_header_custom"></span>
                        <span class="first_of_the_number">021</span>
                        <span class="end_of_the_number"><?php echo $tell?></span>
                    </div>
                    <ul>
                        <?php foreach ($menu_left as $menu):?>
                            <li><a href="<?php echo $menu['link']?>"><?php echo $menu['text']?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>