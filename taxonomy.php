<?php get_header();
$term      = get_queried_object();
$term_id   = $term->term_id;
global $term_tax;
$term_tax  = $term->taxonomy;
$this_term = $term_tax . '_' . $term_id;
$url = get_bloginfo('template_directory');

$parent = $term->parent;
global $button_name;
$button_name = get_field('catalog_more_text','options');
$load_more_name = get_field('catalog_load_more_text','options');
$nothing_name = get_field('catalog_nothing_text','options');
?>
    <main class="b-main">
        <!-- breadcrumbs -->
        <div class="breadcrumbs">
            <div class="b-wrap">
                <?php if(function_exists('bcn_display')){bcn_display();}?>
            </div>
        </div>
        <!-- /breadcrumbs -->
        <?php
        if($parent===0){
            ?>
            <!-- products -->
            <div class="products">
                <div class="b-wrap">
                    <img src="<?php echo $url;?>/img/product_bubbles.png" srcset="<?php echo $url;?>/img/product_bubbles@2x.png 2x" alt="" class="js-img products-bubbles" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
                    <?php the_archive_title( '<h2>', '</h2>' ); ?>
                    <ul class="products-list">
                        <?php
                        $args = array(
                            'type' => 'post',
                            'parent' => $term_id,
                            'orderby'         => 'menu_order',
                            'order'           => 'ASC',
                            'hide_empty' => 0,
                            'hierarchical' => true,
                            'taxonomy' => $term_tax,
                            'pad_counts' => false,
                        );
                        $categories = get_categories($args);

                        if( $categories ) {
                            global $cat;
                            global $front_page;
                            $front_page = false;
                            foreach ($categories as $cat) {
                                get_template_part('template-parts/content','cat');
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- /products -->


        <?php }else{ ?>
            <!-- products -->
            <div class="products products_list">
                <img src="<?php echo $url;?>/img/product_bubbles4.png" srcset="<?php echo $url;?>/img/product_bubbles4@2x.png 2x" alt="" class="js-img products-bubbles4" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
                <img src="<?php echo $url;?>/img/product_bubbles4.png" srcset="<?php echo $url;?>/img/product_bubbles4@2x.png 2x" alt="" class="js-img products-bubbles5" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
                <img src="<?php echo $url;?>/img/product_bubbles5.png" srcset="<?php echo $url;?>/img/product_bubbles5@2x.png 2x" alt="" class="js-img products-bubbles6" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">

                <div class="b-wrap">
                    <?php the_archive_title( '<h2>', '</h2>' ); ?>

                    <?php if (  $wp_query->have_posts() ) { ?>
                        <ul class="products-list products-list_load" id="content_term">
                            <?php /* Start the Loop */
                            while ($wp_query->have_posts()) : $wp_query->the_post();
                                echo '<li class="product-list__item">';
                                get_template_part('template-parts/content');
                                echo '</li>';
                            endwhile;?>
                            <script>
                                var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                                var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                                var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
                            </script>
                        </ul>
                        <?php
                        if ($wp_query->max_num_pages > 1) { ?>
                        <div class="load-btn">
                            <a href="#" id="true_loadmore"><?php echo $load_more_name?$load_more_name:'Загрузить ещё';?></a>
                        </div>
                        <?php }
                    }else { ?>
                        <p><?php echo $nothing_name?$nothing_name:'К сожалению, ничего не найдено, посмотрите другие наши категории и продукты';?></p>
                        <?php
                    }
                    ?>


                </div>
            </div>
            <!-- /products -->

        <?php } ?>

        <!-- about us -->
        <div class="about about_product">
            <div class="b-wrap">
                <img src="<?php echo $url;?>/img/leaves.png" srcset="<?php echo $url;?>/img/leaves@2x.png 2x" alt="" class="js-img pref-leaves" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
                <img src="<?php echo $url;?>/img/about_bg1_2.png" alt="" class="js-img about-bg1">
                <img src="<?php echo $url;?>/img/about_bg2_2.png" alt="" class="js-img about-bg2">
                <?php
                $tax_image  = get_field('tax_photo', $this_term);
                $tax_image2 = get_field('tax_photo2', $this_term);
                $tax_name   = get_field('tax_title', $this_term);
                $tax_text   = get_field('tax_text', $this_term);
                if($tax_image){ ?>
                    <div class="about__img">
                        <img src="<?php echo $tax_image;?>"<?php if($tax_image2){ ?> srcset="<?php echo $tax_image2;?> 2x"<?php } ?> alt="" class="js-img">
                    </div>
                <?php } ?>
                <div class="about__text">
                    <?php if($tax_name){ ?>
                        <h2><?php echo $tax_name;?></h2>
                    <?php } ?>
                    <?php if($tax_text){ ?>
                        <div class="scroll-box">
                            <?php echo $tax_text;?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /about us -->

    </main>
<?php get_footer();