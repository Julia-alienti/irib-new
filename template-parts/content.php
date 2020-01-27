<?php global $button_name;?>
<div class="product-list__link">
    <?php
    $post_id      = $post->ID;
    $post_color    = get_field('product_preview_color', $post_id);
    $post_image = get_field('product_preview_bg',$post_id); if($post_image){ ?>
        <style>
            .product.product-2:before {
                background-image: url(<?php echo wp_get_attachment_image_url($post_image , 'medium'); ?>);
            }
            .product.product-<?php echo $post_id;?>:hover {
                border-color: <?php echo $post_color;?>;
            }
            @media only screen and (max-width: 950px) {
                .product.product-<?php echo $post_id;?> {
                    border-color: <?php echo $post_color;?>;
                }
            }
        </style>
    <?php } ?>

    <a href="<?php the_permalink();?>" class="product product-2 product-<?php echo $post_id;?>"<?php if($post_color){ ?> style="background: <?php echo $post_color;?>;"<?php } ?>>
        <img src="<?php the_post_thumbnail_url();?>" alt="">
    </a>
    <a href="<?php the_permalink();?>" class="product-name"><?php the_title();?></a>
    <p class="product-list__descrip"><?php echo get_the_excerpt(); ?></p>
    <a href="<?php the_permalink();?>" class="btn btn_more"><?php echo $button_name?$button_name:'Подробнее';?></a>
</div>
