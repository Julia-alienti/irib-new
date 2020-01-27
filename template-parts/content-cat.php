<?php
global $cat;
global $front_page;
$this_cat_id  = $cat->term_id;
$term_tax = 'catalog';
$this_cat     = $term_tax . '_' . $this_cat_id;
$tax_image_bg = get_field('tax_preview_bg', $this_cat);
$tax_color    = get_field('tax_preview_color', $this_cat);
$tax_border_color    = get_field('tax_preview_border_color', $this_cat);
if(!$tax_border_color){
    $tax_border_color = $tax_color;
}
$tax_image    = get_field('tax_preview', $this_cat);
$tax_image_pos= get_field('tax_preview_custom_position', $this_cat);

$link = get_term_link($this_cat_id,$term_tax);
?>
<li class="product-list__item">
    <div class="product-list__link">
        <?php if($tax_image_bg){ ?>
            <style>
                .product-custom-<?php echo $this_cat_id;?>:before {
                    background: url(<?php echo wp_get_attachment_image_url($tax_image_bg , 'medium'); ?>) no-repeat center;
                    -webkit-background-size: cover !important;
                    <?php if(!$tax_image_pos&&$this_cat_id!==7&&$this_cat_id!==9&&$this_cat_id!==10){ ?>

                    background-size: cover !important;
                    height: 27.4rem !important;
                    width: 27.6rem !important;
                    top: 0 !important;
                    left: 0 !important;
                <?php }?>

                }
                .product-custom-<?php echo $this_cat_id;?>:hover {
                    border-color: <?php echo $tax_border_color;?> !important;
                }
                @media only screen and (max-width: 950px) {
                    .product.product-custom-<?php echo $this_cat_id;?> {
                        border-color: <?php echo $tax_border_color;?>;
                    }
                    .product-custom-<?php echo $this_cat_id;?>:before {
                        background-size: 100% !important;
                    <?php if(!$tax_image_pos&&$this_cat_id!==7&&$this_cat_id!==9&&$this_cat_id!==10){ ?>
                        width: 36rem !important;
                        left: 50% !important;
                        margin-left: -18rem;

                    <?php }?>

                    }
                }
            </style>
        <?php } ?>
        <?php if($tax_image){ ?>
            <a  href="<?php echo $link; ?>" class="product product-custom-<?php echo $this_cat_id; if($tax_image_pos){ echo ' product-3';}?>"<?php if($tax_color){ ?> style="background: <?php echo $tax_color;?>;"<?php } ?>>
                                                <img src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" data-src="<?php echo $tax_image;?>" alt="" class="js-img">
                                            </a>
        <?php } ?>
        <a href="<?php echo $link; ?>" class="product-name"><?php echo $cat->name; ?></a>
        <?php if(!$front_page){ ?>
        <a href="<?php echo $link; ?>" class="btn btn_more">Подробнее</a>
        <?php } ?>
    </div>
</li>