<?php
get_header();

$type_sort = "best_sell";

if (isset($_POST['btn_sell'])) $type_sort = "sell";
if (isset($_POST['btn_view'])) $type_sort = "view";
if (isset($_POST['btn_news'])) $type_sort = "news";
if (isset($_POST['btn_cheap'])) $type_sort = "cheap";
if (isset($_POST['btn_expensive'])) $type_sort = "expensive";


?>

<div class="col-12 col-xl-10" style="float: left">
    <?php
    switch ($type_sort) {
        case  "sell" :
        {
            $cate = get_queried_object();
            $cateID = $cate->term_id;
            $args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'orderby'   => 'meta_value_num',
                'meta_key'  => 'total_sales',
                'order'   => 'ASC',
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => '12',
                'tax_query'             => array(
                    array(
                        'taxonomy'      => 'product_cat',
                        'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                        'terms'         => $cateID,
                        'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                    ),
                    array(
                        'taxonomy'      => 'product_visibility',
                        'field'         => 'slug',
                        'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                        'operator'      => 'NOT IN'
                    )
                )
            );
            $products = new WP_Query($args);
            break;
        }
        case "view" :
        {
            $cate = get_queried_object();
            $cateID = $cate->term_id;
            $args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'orderby'   => 'meta_value_num',
                'meta_key'  => 'post_views_count',
                
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => '12',
                'tax_query'             => array(
                    array(
                        'taxonomy'      => 'product_cat',
                        'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                        'terms'         => $cateID,
                        'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                    ),
                    array(
                        'taxonomy'      => 'product_visibility',
                        'field'         => 'slug',
                        'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                        'operator'      => 'NOT IN'
                    )
                )
            );
            $products = new WP_Query($args);
            break;
        }
        case "cheap" :
        {
            $cate = get_queried_object();
            $cateID = $cate->term_id;
            $args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'orderby'   => 'meta_value_num',
                'meta_key'  => '_price',
                'order'   => 'ASC',
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => '12',
                'tax_query'             => array(
                    array(
                        'taxonomy'      => 'product_cat',
                        'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                        'terms'         => $cateID,
                        'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                    ),
                    array(
                        'taxonomy'      => 'product_visibility',
                        'field'         => 'slug',
                        'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                        'operator'      => 'NOT IN'
                    )
                )
            );
            $products = new WP_Query($args);

            break;
        }
        case "expensive" :
        {
            $cate = get_queried_object();
            $cateID = $cate->term_id;
            $args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'orderby'   => 'meta_value_num',
                'meta_key'  => '_price',
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => '12',
                'tax_query'             => array(
                    array(
                        'taxonomy'      => 'product_cat',
                        'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                        'terms'         => $cateID,
                        'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                    ),
                    array(
                        'taxonomy'      => 'product_visibility',
                        'field'         => 'slug',
                        'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                        'operator'      => 'NOT IN'
                    )
                )
            );
            $products = new WP_Query($args);

            break;
        }
        case "news" :
        {
            $args = array(
                'post_type' => 'product',
                'orderby' => 'date',

                'posts_per_page' => 12,
            );
            $products = new WP_Query($args);

            wp_reset_query();
            break;
        }

    }
    ?>
    <div class="col-10">
        <form action="" method="post">
            <input type="submit" name="btn_view" value="پر بازدیدترین ها">
            <input type="submit" name="btn_sell" value="پر فروش ترین ها">
            <input type="submit" name="btn_news" value="جدیدترین ها">
            <input type="submit" name="btn_cheap" value="ارزان ترین ها">
            <input type="submit" name="btn_expensive" value="گران ترین ها">
        </form>
    </div>
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
                        $data =[];
                        while ($products->have_posts()):
                            $products->the_post();
                            global $product;
                            $id = $product->get_id();
                            $data[] = $product->get_data();
                            # get a list of sort columns and their data to pass to array_multisort
                            $sort = array();
                            foreach($data as $k=>$v) {
                                $sort['title'][$k] = $v['title'];
                                $sort['price'][$k] = $v['price'];
                            }
                            # sort by event_type desc and then title asc
                            array_multisort($sort['price'], SORT_DESC, $sort['title'], SORT_ASC,$data);


                       ?>

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


<?php get_footer(); ?>
