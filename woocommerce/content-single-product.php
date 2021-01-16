<?php use app\views\Views;

get_header(); ?>


    <!-- start of the product_info -->
    <div class="container main-container">
        <div class="col-12">
            <?php
            // The tax query
            $tax_query[] = array(
                'taxonomy' => 'product_visibility',
                'field' => 'name',
                'terms' => 'featured',
                'operator' => 'IN', // or 'NOT IN' to exclude feature products
            );

            $args = array(
                'p' => get_the_ID(),
                'post_type' => 'product',
                'post_status' => 'publish',
            );

            $loop = new WP_Query($args);

            if ($loop->have_posts()):
                $loop->the_post();
                global $product;
                $data = $product->get_data();

                ?>
                <div class="article_product">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-3" style="padding: 0;">
                        <div class="article_product_image">

                            <img src="<?php the_post_thumbnail_url() ?>" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                        <div class="article_product_discription">
                            <h4><?php echo $data['name'] ?></h4>
                            <div>
                                <?php echo $data['description'] ?>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- start of the related product -->
    <div class="container main-container">
        <div class="related_section">
            <?php
            global $product;
            $id = $product->get_id();

            $data = $product->get_data();

            $id_cate = $data['category_ids'];
            $names_cate = '';
            foreach ($id_cate as $id) {
                $term = get_term_by('id', $id, 'product_cat');
                $names_cate .= $term->name . '  ';


                $args = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    'ignore_sticky_posts' => 1,
                    'posts_per_page' => '12',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                            'terms' => $id,
                            'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                        ),
                        array(
                            'taxonomy' => 'product_visibility',
                            'field' => 'slug',
                            'terms' => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                            'operator' => 'NOT IN'
                        )
                    )
                );
                $products = new WP_Query($args);

            }
            ?>
            <div class="col-10">
                <div class="related_product">
                    <div class="col-12">
                        <div class="title_related_product">
                            <h4>محصولات <?php echo '   ' . $names_cate . '   ' ?></h4>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="related_product_section">

                            <div class="carousel" data-flickity='{ "groupCells": true }'>

                                <?php

                                while ($products->have_posts()):
                                    $products->the_post(); ?>


                                    <a href="<?php echo
                                    get_permalink() ?>">
                                        <div class="carousel-cell">
                                            <div class="related_product_image">
                                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                            </div>
                                        </div>
                                    </a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>