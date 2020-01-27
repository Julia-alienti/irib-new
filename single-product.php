<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header();
$id_page=get_the_ID();
$url = get_bloginfo('template_directory');?>

<main class="b-main">

    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="b-wrap">
            <?php if(function_exists('bcn_display')){bcn_display();}?>
        </div>
    </div>
    <!-- /breadcrumbs -->

    <!-- product info -->
    <div class="product-info"<?php $field=get_field('product_bg_color',$id_page); if($field){ ?> style="background: <?php echo $field;?>;"<?php }?>>
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/product_bubbles2.png" srcset="<?php echo $url;?>/img/product_bubbles2@2x.png 2x" alt="" class="js-img products-bubbles2" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <h1><?php the_title(); ?></h1>
            <div class="product-info__slider">
                <?php if( have_rows('product_slider',$id_page) ):?>
                <div class="product-slider-nav">
                    <?php while ( have_rows('product_slider',$id_page) ) : the_row(); $image=get_sub_field('product_slider_img');?>
                        <div><div class="product-slider__thumb"><?php echo wp_get_attachment_image( $image, 'irib-thumbnail-product'); ?></div></div>
                    <?php endwhile;?>
                    <!--<div><div class="product-slider__thumb"><img src="img/product_slider/1_thumb.png" alt=""></div></div>-->
                </div>
                <div class="product-slider-for"<?php $field=get_field('product_slider_bg',$id_page); if($field){ ?> style="background-image: url(<?php echo $field;?>);"<?php }?>>
                    <?php while ( have_rows('product_slider',$id_page) ) : the_row(); $image=get_sub_field('product_slider_img');?>
                        <div><img src="<?php echo wp_get_attachment_image_url( $image, 'irib-large-product'); ?>" alt=""></div>
                    <?php endwhile;?>
                </div>
                <?php endif; ?>
                <?php $field = get_field('product_video',$id_page); $field2 = get_field('product_video_text','options');  if($field||$field2){ ?>
                    <div class="video-link"><a href="<?php echo $field;?>"><span><?php echo $field2;?></span></a></div>
                <?php }?>
            </div>
            <div class="product-info__text">
                <?php the_field('product_desc',$id_page); ?>
                <?php if( have_rows('product_benefits',$id_page) ):?>
                <div class="product-info__icons">
                    <?php while ( have_rows('product_benefits',$id_page) ) : the_row();?>
                    <div class="product-info__icon">
                            <div class="preferences__icon"><img src="<?php the_sub_field('benefits_img'); ?>"<?php $field=get_sub_field('benefits_img_2'); if($field){ ?> data-srcset="<?php echo $field;?> 2x"<?php }?> alt="" class="js-img"></div>
                            <p><?php the_sub_field('benefits_text'); ?></p>
                    </div>
                    <?php endwhile;?>
                </div>
                <?php endif; ?>
                <div class="btn-group">
                    <?php $field = get_field('product_button_text','options');  if($field){ ?>
                    <button type="button" class="btn btn_white btn_big btn-order"><?php echo $field;?></button>
                    <?php }?>
                    <?php echo do_shortcode('[addtoany]')?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!-- /product info -->

    <!-- tabs -->
    <div class="b-tabs">
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/leaves.png" srcset="<?php echo $url;?>/img/leaves@2x.png 2x" alt="" class="js-img pref-leaves" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <div class="tabs-container">
                <?php
                $options = get_field('info', $id_page);
                $tabs    = get_field('tabs', $id_page);
                ?>

                <ul class="tabs">
                    <?php if($options){ ?>
                    <li class="current"><a href="#"><?php $field = get_field('product_info_text','options');  if($field){ echo $field;}else{ echo 'Параметры'; } ?></a></li>
                    <?php }?>
                    <li<?php if(!$options){ echo ' class="current"'; } ?>><a href="#"><?php $field = get_field('product_desc_text','options');  if($field){ echo $field;}else{ echo 'Описание'; } ?></a></li>
                    <?php
                    if($tabs)
                    {
                        $html_tabs = '';
                        foreach($tabs as $tab)
                        {
                            $html_tabs .= '<li><a href="#">' . $tab['tabs_name'] . '</a></li>';
                        }
                        echo $html_tabs;
                    }
                    ?>
                </ul>
                <?php if($options){ ?>
                <div class="tab-box visible">
                    <div class="params">
                        <?php
                        if($options)
                        {
                            $html_options = '';
                            foreach($options as $option)
                            {
                                $html_options .= '<div class="row"><span>' . $option['info_name'] . '</span><span>' . $option['info_text'] . '</span></div>';
                            }
                            echo $html_options;
                        }
                        ?>
                    </div>
                </div>
                <?php }?>
                <div class="tab-box<?php if(!$options){ echo ' visible'; } ?>">
                    <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post();
                            the_content('', true);
                        } // end while
                    } // end if
                    ?>
                </div>
                <?php
                if($tabs)
                {
                    $html_tabs = '';
                    foreach($tabs as $tab)
                    {
                        $html_tabs .= '<div class="tab-box">' . $tab['tabs_text'] . '</div>';
                    }
                    echo $html_tabs;
                }
                ?>
            </div>
        </div>
    </div>
    <!-- /tabs -->

    <?php if(function_exists('irib_get_related')){irib_get_related($id_page);}?>

</main>
<?php get_footer(); ?>

