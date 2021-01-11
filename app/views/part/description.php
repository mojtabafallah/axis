<?php use app\controllers\Assets;
$des_1 = ot_get_option('section_1_des', false);
$des_2 = ot_get_option('section_2_des', false);
$des_3 = ot_get_option('section_3_des', false);

?>
<div class="col-12" style="padding: 0;">
    <div class="gold_description">
        <div class="container main-container">
            <div class="col-12" style="display: flex;align-items: center;justify-content: center;">
                <div class="aksis_details">
                    <div class="aksis_logo_custom">
                        <img src="<?php echo Assets::image('logo2.png')?>" alt="">
                    </div>
                    <div class="welcom_sentence">
                       <?php echo $des_1?>
                    </div>
                    <div class="gland_proud">
                        <?php echo $des_2?>
                    </div>

                    <div class="aksis_desctiption">
                        <?php echo $des_3?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>