<?php

/*

Template Name: О нас

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

    <!-- about us -->
    <div class="about about_top">
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/leaves.png" srcset="<?php echo $url;?>/img/leaves@2x.png 2x" alt="" class="js-img about-leaves" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <img src="<?php echo $url;?>/img/leaves3.png" alt="" class="js-img about-leaves2" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">

            <img src="<?php echo $url;?>/img/about_bg1.png" alt="" class="js-img about-bg1">
            <img src="<?php echo $url;?>/img/about_bg2.png" alt="" class="js-img about-bg2">
            <?php $field = get_the_post_thumbnail_url(); if($field){ ?>
            <div class="about__img">
                <img src="<?php echo $field;?>" alt="" class="js-img">
            </div>
            <?php }?>
            <div class="about__text">
                <h2><?php the_title();?></h2>
                <div class="scroll-box">
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
    <!-- /about us -->
<?php if( have_rows('benefits', 'options') ):?>
    <!-- preferences -->
    <div class="preferences preferences_bottom-trans">
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/pref_bubbles.png" srcset="<?php echo $url;?>/img/pref_bubbles@2x.png 2x" alt="" class="js-img pref-bubbles" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <?php $field=get_field('benefits_title','options'); if($field){ ?>
            <h2><?php echo $field;?></h2>
            <?php }?>
            <ul class="preferences__list">
                <?php while ( have_rows('benefits','options') ) : the_row();?>
                <li class="preferences__list-item">
                    <div class="preferences__icon"><img src="<?php the_sub_field('benefits_img'); ?>"<?php $field=get_sub_field('benefits_img_2'); if($field){ ?> data-srcset="<?php echo $field;?> 2x"<?php }?> alt="" class="js-img"></div>
                    <p><?php the_sub_field('benefits_text'); ?></p>
                </li>
                <?php endwhile;?>
            </ul>
        </div>
    </div>
    <!-- /preferences -->
<?php endif; ?>
    <?php if( have_rows('certificates','options') ):?>
    <!-- certificates -->
    <div class="certificates">
        <img src="<?php echo $url;?>/img/cert_bubbles.png" srcset="<?php echo $url;?>/img/cert_bubbles@2x.png 2x" alt="" class="js-img cert-bubbles" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
        <img src="<?php echo $url;?>/img/cert_bubbles2.png" srcset="<?php echo $url;?>/img/cert_bubbles2@2x.png 2x" alt="" class="js-img cert-bubbles2" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
        <img src="<?php echo $url;?>/img/leaves4.png" alt="" class="js-img cert_leaves" data-paroller-factor="0.2" data-paroller-type="foreground" data-paroller-direction="vertical">
        <img src="<?php echo $url;?>/img/leaves5.png" alt="" class="js-img cert_leaves2" data-paroller-factor="0.2" data-paroller-type="foreground" data-paroller-direction="vertical">
        <div class="b-wrap">
            <?php $field=get_field('certificates_title','options'); if($field){ ?>
            <h2><?php echo $field;?></h2>
            <?php }?>
            <div class="certificates-slider">
                <?php while ( have_rows('certificates','options') ) : the_row();?>
                    <div>
                        <div class="certificate-bord"><div class="certificate-img"><img src="<?php the_sub_field('certificates_img'); ?>" alt=""></div></div>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
    <!-- /certificates -->
    <?php endif; ?>
    <?php if( have_rows('reviews','options') ):?>
    <!-- opinions -->
    <div class="about about_product opinions">
        <img src="<?php echo $url;?>/img/opinions_bg1.png" alt="" class="js-img opinions-bg1">
        <img src="<?php echo $url;?>/img/opinions_bg2.png" alt="" class="js-img opinions-bg2">
        <div class="b-wrap">
            <?php $field=get_field('reviews_title','options'); if($field){ ?>
            <h2><?php echo $field;?></h2>
            <?php }?>
            <div class="opinions-slider">
                <?php while ( have_rows('reviews','options') ) : the_row();?>
                    <div>
                        <div class="opinions-slider__content">
                            <div class="opinions-slider__name"><?php the_sub_field('reviews_name'); ?></div>
                            <p><?php the_sub_field('reviews_text'); ?></p>
                            <span><?php the_sub_field('reviews_date'); ?></span>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
    <!-- /opinions -->
    <?php endif; ?>
</main>
<?php get_footer();