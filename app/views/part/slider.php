<?php use app\controllers\Assets;

$picture_1 = ot_get_option('picture_1', false);
$link_picture_1 = ot_get_option('link_picture_1', false);
$text_picture_1 = ot_get_option('text_picture_1', false);

$picture_2 = ot_get_option('picture_2', false);
var_dump($picture_2);
$link_picture_2 = ot_get_option('link_picture_2', false);
$text_picture_2 = ot_get_option('text_picture_2', false);

$picture_3 = ot_get_option('picture_3', false);
$link_picture_3 = ot_get_option('link_picture_3', false);
$text_picture_3 = ot_get_option('text_picture_3', false);

$picture_4 = ot_get_option('picture_4', false);
$link_picture_4 = ot_get_option('link_picture_4', false);
$text_picture_4 = ot_get_option('text_picture_4', false);
?>
<div class="container main-container">
    <div class="col-12">
        <div class="the_most_selling_section">
            <img src="<?php echo Assets::image('most_selling.png') ?>" alt="">
            <h1>پرفروش ترین محصولات</h1>
        </div>

        <div class="col-12 col-md-6" style="padding-left: 10px;">
            <a href="<?php echo $link_picture_1?>">
                 <div class="selling_picture_custom">
                    <img src="<?php echo $picture_1 ?>" alt="">
                    <div class="selling_picture_custom_info">
                        <span class="fa fa-angle-right green"></span>
                        <span class="selling_picture_custom_info_title"><?php echo $text_picture_1 ?></span>
                    </div>
                </div>
            </a>
            <a href="<?php echo $link_picture_2?>">
            <div class="selling_picture_custom" style="padding-right: 10px;margin-top:25px ;">
                <img src="<?php echo $picture_2 ?>" alt="">
                <div class="selling_picture_custom_info">
                    <span class="fa fa-angle-right purple"></span>
                    <span class="selling_picture_custom_info_title"><?php echo $text_picture_2 ?></span>
                </div>
            </div>
            </a>
        </div>


        <div class="col-12 col-md-6">
            <a href="<?php echo $link_picture_3?>">
            <div class="selling_picture_custom">
                <img src="<?php echo $picture_3 ?>" alt="">
                <div class="selling_picture_custom_info selling_picture_custom_info_2">
                    <span class="fa fa-angle-right orange"></span>
                    <span class="selling_picture_custom_info_title selling_picture_custom_info_title2"><?php echo $text_picture_3 ?></span>
                </div>
            </div>
            </a>
            <a href="<?php echo $link_picture_4?>">
            <div class="selling_picture_custom">
                <img src="<?php echo $picture_4 ?>" alt="">
                <div class="selling_picture_custom_info selling_picture_custom_info_4">
                    <span class="fa fa-angle-left blue"></span>
                    <span class="selling_picture_custom_info_title selling_picture_custom_info_title2"><?php echo $text_picture_4 ?></span>
                </div>
            </div>
            </a>

        </div>

    </div>
</div>