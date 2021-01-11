<?php use app\controllers\Assets; ?>
<footer>
    <div class="footer_Custom">
        <div class="container main-container">



            <div class="col-12 col-sm-4 col-lg-3">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer_menu',
                    'container_class' => 'custom-menu-class' ) );
                ?>

            </div>
            <div class="col-12 col-sm-4 col-lg-3">
                <ul>
                    <?php $posts_query = new WP_Query('posts_per_page=5');
                    while ($posts_query->have_posts()) : $posts_query->the_post();
                        ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; wp_reset_query(); ?>
                </ul>
            </div>
            <div class="col-12 col-sm-4 col-lg-3">

                <div class="work_time">
                    <span>ساعت کاری :</span>
                    <span>شنبه تا  چهارشنبه ۹ الی ۱۸</span>
                    <span><span class="location_custom"></span>تهران , کارگر خیابانی شمال</span>
                    <span><span class="phone_footer_custom"> </span><span class="end_custom">    ۳۳۳</span> <span class="first_custom">۰۲۱</span> </span>
                    <span><span class="web_custom"></span>www.AxisGold.com</span>

                </div>
            </div>
            <div class="col-12  col-lg-3">
                <div class="contacUs">
                    <ul>
                        <li><a href="#">درباره ما</a></li>
                        <li><a href="#">تماس با ما</a></li>
                    </ul>
                </div>
                <div class="nemad_section_footer">
                    <img src="<?php echo Assets::image('nemad.png') ?>" alt=""> نماد اعتماد الکترونیکی
                </div>
                <div class="social_media_section">
                    <ul>
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                        <li><a href="#"><span class="fa fa-telegram"></span></a></li>
                        <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                        <li><a href="#"><span class="aparat"><img src="<?php echo Assets::image('aparat.png')?>" alt=""></span></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <div class="footer_last_section">
        <div class="container main-container footer_last_section_custom">
            <p class="owner">تمامی حقوق این وبسایت متعلق به شرکت اکسیس گلد می باشد.</p>
            <div class="English_owner">
                <img src="<?php echo Assets::image('footer_last_image.png')?>" alt="">
                <p>atalysor DesignStudio Team...</p>
            </div>
        </div>
    </div>
</footer>


</body>
<script src="<?php Assets::js('jquery.min.js')?>"></script>
<script src="<?php Assets::js('jquery-ui.js')?>"></script>
<script src="<?php Assets::js('bootstrap.min.js')?>"></script>
<script src="<?php Assets::js('fontawesome.min.js')?>"></script>
<script src="<?php Assets::js('functions.js')?>"></script>
<script src="<?php Assets::js('flickity.pkgd.min.js')?>"></script>
<?php wp_footer(); ?>
</html>
