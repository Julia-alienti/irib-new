<?php

/*

Template Name: Партнерам

*/

get_header(); $id_page=get_the_ID();?>
<?php $url = get_bloginfo('template_directory');?>
<main class="b-main">

    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="b-wrap">
            <?php if(function_exists('bcn_display')){bcn_display();}?>
        </div>
    </div>
    <!-- /breadcrumbs -->

    <!-- partners -->
    <div class="partners">
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/leaves6.png" alt="" class="js-img partners-leaves" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <img src="<?php echo $url;?>/img/leaves8.png" alt="" class="js-img partners-leaves2" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <img src="<?php echo $url;?>/img/partners_water_left.png" alt="" class="js-img partners-water-left">
            <img src="<?php echo $url;?>/img/partners_water_left.png" alt="" class="js-img partners-water-right">
            <img src="<?php echo $url;?>/img/leaves7.png" alt="" class="js-img partners-leaves3" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">

            <h2><?php the_title();?></h2>
            <div class="partners-content">
                <div class="scroll-box-2">
                    <?php
                    if ( have_posts() ) {
                        while ( have_posts() ) {
                            the_post();
                            the_content();
                        } // end while
                    } // end if
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /partners -->

    <!-- clients -->
    <div class="clients">
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/partners_bubbles.png" srcset="<?php echo $url;?>/img/partners_bubbles@2x.png 2x" alt="" class="js-img partners-bubbles" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <img src="<?php echo $url;?>/img/partners_bubbles2.png" srcset="<?php echo $url;?>/img/partners_bubbles2@2x.png 2x" alt="" class="js-img partners-bubbles2" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <?php $field=get_field('partners_title','options'); if($field){ ?>
            <h2><?php echo $field;?></h2>
            <?php }?>
            <?php if( have_rows('partners','options') ):?>
            <div class="clients-slider">
                <?php while ( have_rows('partners','options') ) : the_row();?>
                    <div>
                        <div class="clients-logo"><img src="<?php the_sub_field('partners_img'); ?>" srcset="<?php the_sub_field('partners_img_2'); ?> 2x" alt=""></div>
                    </div>

                <?php endwhile;?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- /clients -->

</main>
<?php get_footer();