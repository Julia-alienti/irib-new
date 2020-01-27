<div class="product-list__link">
    <?php
    $tax_name = 'catalog';
    $post_id      = $post->ID;

    $cats_post =get_the_terms($post_id,$tax_name);
    $this_cat_id = $cats_post[0]->term_id;


    $this_cat     = $tax_name . '_' . $this_cat_id;
    $tax_image_bg = get_field('tax_preview_bg', $this_cat);
    $tax_color    = get_field('tax_preview_color', $this_cat);
    $tax_image    = get_field('tax_preview_bg', $this_cat);
    $post_image = get_field('product_preview_bg'); if($post_image){ ?>
    <style>
        .product.product-2:before {
            background-image: url(<?php echo wp_get_attachment_image_url($post_image , 'medium'); ?>);
        }

    </style>
    <?php } ?>

    <?php if($tax_image_bg){ ?>
        <style>
            .product.product-<?php echo $post_id;?>:before {
                background-image: url(<?php echo wp_get_attachment_image_url($tax_image_bg , 'medium'); ?>);
            }
            .product.product-<?php echo $this_cat_id;?>:before {
                background: url(<?php echo wp_get_attachment_image_url($tax_image_bg , 'medium'); ?>) no-repeat center !important;
                -webkit-background-size: cover;
                background-size: cover;
                height: 27.4rem !important;
                width: 27.6rem !important;
                top: 0 !important;
                left: 0 !important;
            }
            .product.product-<?php echo $this_cat_id;?>:hover {
                border-color: <?php echo $tax_color;?> !important;
            }
        </style>
    <?php } ?>

    <span class="product product-<?php echo $post_id;?>"<?php if($tax_color){ ?> style="background: <?php echo $tax_color;?>;"<?php } ?>>
        <img src="<?php the_post_thumbnail_url();?>" alt="">
    </span>
    <span class="product-name"><?php the_title();?></span>
    <p class="product-list__descrip"><?php echo get_the_excerpt(); ?></p>
    <a href="<?php the_permalink();?>" class="btn btn_more">Подробнее</a>
</div>
