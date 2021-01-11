<?php use app\controllers\Assets; ?>
<?php $content_confidens = ot_get_option('content_confidens', false);?>
<div class="col-12" style="padding: 0;">
    <div class="confidence">
        <img src="<?php Assets::image('logo3.png')?>" alt="">
        <h4><?php echo $content_confidens?></h4>
    </div>
</div>