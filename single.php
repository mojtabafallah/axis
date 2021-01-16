<?php use app\views\Views;

get_header();?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


    <?php the_content();

    setPostViews(get_the_ID());
    ?>


<?php endwhile; endif; ?>

<?php get_footer(); ?>
