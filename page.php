<?php
get_header()?>


<div class="container--header">

    <div class="col-12 col-xl-10" style="float: left">
        <div class="nav-bar">
            <nav>
                <a href="#">خانه</a><i class="fa fa-angle-double-left"></i>
                <a href="#">انواع لوله</a>
                <i class="fa fa-angle-double-left"></i> لوله مانیسمان
            </nav>
        </div>
        <?php
        $args = array( 'post_type' => 'product' );

        $loop = new WP_Query( $args );

        if($loop->have_posts() ):
            $loop->the_post();
            global $product;
            ?>


            <div class="pricelist-top">
                <div class="col-12 col-md-4">

                    <?php
                    $terms = get_the_terms( $post->ID, 'product_cat' );
                    $description="";

                    foreach ( $terms as $term ){
                        $category_name = $term->name;
                        $description=$term->description;

                        $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id );
                    }
                    ?>
                    <img src="<?php  echo $image; ?>" data-id="<?php echo $loop->post->ID;?>" alt="">
                </div>

                <div class="col-12 col-md-8">
                    <h2><?php echo $category_name ?></h2>
                    <p>
                        <?php echo $description?>
                    </p>
                    <button id="btn-pricelist">
                        <i class="fa fa-chevron-down"></i>نمایش بیشتر
                    </button>
                    <button id="close-btn-pricelist">
                        <i class="fa fa-chevron-up"></i>بستن
                    </button>
                </div>
            </div>

            <div class="content-price">
                <h2><?php echo $category_name ?></h2>
                <div class="title-table">
                    <strong><?php echo $category_name ?></strong>
                    <a href="#"><button>روز های قبل</button></a>
                </div>

            </div>
        <?php endif;?>
    </div>
    <div class="col-12 col-xl-2">
        <div class="slidbar">
            <div class="header-slider">
                <i class="fa fa-bars"></i> دسته بندی ها
            </div>
            <ul>
                <li><a href="#">تیرآهن</a></li>
                <li><a href="#">تیرآهن</a></li>
                <li><a href="#">تیرآهن</a></li>
                <li><a href="#">تیرآهن</a></li>
                <li><a href="#">تیرآهن</a></li>
            </ul>
        </div>
        <div class="slidbar">
            <div class="header-slider">
                <i class="fa fa-filter"></i> فیلتر ها
            </div>
            <ul>
                <li><a href="#">تیرآهن</a></li>
                <li><a href="#">تیرآهن</a></li>
                <li><a href="#">تیرآهن</a></li>
                <li><a href="#">تیرآهن</a></li>
                <li><a href="#">تیرآهن</a></li>
            </ul>
        </div>
    </div>
</div>






<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


    <?php the_content(); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
