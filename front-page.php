<?php get_header();
$id_page=get_the_ID();
$url = get_bloginfo('template_directory');?>
<!-- intro -->
<!-- desktop slider -->
<?php if( have_rows('main_slide',$id_page) ):?>
<div id="fullpage">
    <?php $count_block = 1; while ( have_rows('main_slide',$id_page) ) : the_row();?>
        <?php $cat = get_sub_field('main_slide_cat');
        $this_cat_id  = $cat->term_id;
        $term_tax = 'catalog';
        $link = get_term_link($this_cat_id,$term_tax);
        ?>
        <div class="section title-block-3"<?php $field = get_sub_field('main_slide_bg'); if($field){ ?> style="background: <?php echo $field;?>;"<?php }?> data-anchor="slide<?php echo $count_block;?>">
            <img src="<?php echo $url;?>/img/border.svg" alt="" class="screen1-item-5">
            <?php if( have_rows('main_slide_images') ):?>
                <?php while ( have_rows('main_slide_images') ) : the_row();?>
                    <?php the_sub_field('main_slide_images_img'); ?>
                <?php endwhile;?>
            <?php endif; ?>
            <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">
            <img src="img/screen3_bottle.png" srcset="img/screen3_bottle@2x.png 2x" alt="" class="screen3-item-1">
            <img src="img/screen3_fruits.png" srcset="img/screen3_fruits@2x.png 2x" alt="" class="screen3-item-2">
            <img src="img/leaves.png" srcset="img/leaves@2x.png 2x" alt="" class="screen1-item-4">
            <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">

            <div class="screen1_text screen3_text">
                <img src="<?php echo $url;?>/img/logo_big.png" data-srcset="<?php echo $url;?>/img/logo_big@2x.png 2x" alt="">
                <?php if($cat){ ?>
                    <h3><?php echo $cat->term_id;?></h3>
                <?php }?>
                <p>«Ириб» – это экологически чистые соки и нектары, произведенные из свежих фруктов и овощей, выращенных в Дагестане и специально отобранных для производства соков. Особая обработка натурального сырья позволяет донести до вас восхитительный вкус дагестанских фруктов в их первозданном виде.</p>
                <?php if($link){ ?>
                <a href="<?php echo $link;?>" class="btn btn_white btn_yellow">Подробнее</a>
                <?php }?>
            </div>
        </div>
        <?php the_sub_field('main_slide'); ?>


    <?php $count_block++; endwhile;?>
    <div class="full-page-nav">
        <div class="full-page-nav-buttons-outer">
        <?php $count_block = 1; while ( have_rows('main_slide',$id_page) ) : the_row();?>
            <div class="slide<?php echo $count_block;?>_page<?php if($count_block==1){ echo ' active';}?>"><a href="#slide<?php echo $count_block;?>"></a></div>
        <?php $count_block++; endwhile;?>
        </div>
    </div>



    <div class="section title-block-3" data-anchor="slide1">
        <img src="img/border.svg" alt="" class="screen1-item-5">
        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">
        <img src="img/screen3_bottle.png" srcset="img/screen3_bottle@2x.png 2x" alt="" class="screen3-item-1">
        <img src="img/screen3_fruits.png" srcset="img/screen3_fruits@2x.png 2x" alt="" class="screen3-item-2">
        <img src="img/leaves.png" srcset="img/leaves@2x.png 2x" alt="" class="screen1-item-4">
        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">
        <div class="screen1_text screen3_text">
            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">
            <h3>Соки и нектары</h3>
            <p>«Ириб» – это экологически чистые соки и нектары, произведенные из свежих фруктов и овощей, выращенных в Дагестане и специально отобранных для производства соков. Особая обработка натурального сырья позволяет донести до вас восхитительный вкус дагестанских фруктов в их первозданном виде.</p>
            <button type="button" class="btn btn_white btn_yellow">Подробнее</button>
        </div>
    </div>

    <div class="section title-block-2" data-anchor="slide2">
        <img src="img/screen2_wood.png" alt="" class="screen2-item-1">
        <img src="img/border.svg" alt="" class="screen1-item-5">
        <img src="img/screen2_bottle.png" srcset="img/screen2_bottle@2x.png 2x" alt="" class="screen2-item-2">
        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">

        <div class="screen1_text screen2_text">
            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">
            <h3>Природная вода</h3>
            <p>Природная вода источника «Бекенез» уникальна по количеству полезных природных микроэлементов, которые благотворно влияют на организм человека. Обладает мягким вкусом, утоляет жажду и благодаря уникальному сбалансированному составу идеально подходит для ежедневного употребления.</p>
            <button type="button" class="btn btn_white btn_blue">Подробнее</button>
        </div>
    </div>

    <div class="section title-block-1" data-anchor="slide3">
        <img src="img/screen1_snow.png" srcset="img/screen1_snow@2x.png 2x" alt="" class="screen1-item-1">
        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">
        <img src="img/screen1_blueberries.png" srcset="img/screen1_blueberries@2x.png 2x" alt="" class="screen1-item-3">
        <img src="img/leaves.png" srcset="img/leaves@2x.png 2x" alt="" class="screen1-item-4">
        <img src="img/border.svg" alt="" class="screen1-item-5">
        <img src="img/screen1_bottle.png" srcset="img/screen1_bottle@2x.png 2x" alt="" class="screen1-item-6">
        <img src="img/screen1_rasp.png" srcset="img/screen1_rasp@2x.png 2x" alt="" class="screen1-item-7">
        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">
        <div class="screen1_text">
            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">
            <h3>Холодный чай</h3>
            <p>Лучшие традиции Советских лимонадов в сочетании с современными технологиями - вот секрет гармоничного, сочного вкуса сладких газированных прохладительных напитков Ириб с ярким ароматом фруктов и ягод, которые прекрасно утоляют жажду в жаркий летний день!</p>
            <button type="button" class="btn btn_white btn_pink">Подробнее</button>
        </div>
    </div>

    <div class="section title-block-4" data-anchor="slide4">
        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">
        <img src="img/screen4_tree2.png" srcset="img/screen4_tree2@2x.png 2x" alt="" class="screen4-item-1">
        <img src="img/border.svg" alt="" class="screen1-item-5">
        <img src="img/screen4_bottle.png" srcset="img/screen4_bottle@2x.png 2x" alt="" class="screen4-item-2">
        <img src="img/screen4_lemon.png" srcset="img/screen4_lemon@2x.png 2x" alt="" class="screen4-item-3">
        <img src="img/screen4_glass.png" srcset="img/screen4_glass@2x.png 2x" alt="" class="screen4-item-4">
        <img src="img/screen4_bubbles.png" srcset="img/screen4_bubbles@2x.png 2x" alt="" class="screen4-item-5">
        <div class="screen1_text screen3_text">
            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">
            <h3>Лимонады</h3>
            <p>Напитки «Gold Grand» являются прекрасным решением для украшения праздничного стола или повседневной трапезы. Обладая приятным и незабываемым вкусом, газированный лимонад встречает насыщенным ароматом свежих и натуральных фруктов. Лимонад производится из натуральных компонентов, которые имеют положительное воздействие на организм.</p>
            <button type="button" class="btn btn_white btn_green">Подробнее</button>
        </div>
    </div>

    <div class="section title-block-5" data-anchor="slide5">
        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">
        <img src="img/border.svg" alt="" class="screen1-item-5">
        <img src="img/screen5_bottle.png" srcset="img/screen5_bottle@2x.png 2x" alt="" class="screen5-item-1">
        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">
        <div class="screen1_text screen5_text">
            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">
            <h3>Спортивные напитки</h3>
            <p>Во время соревнований и интенсивных тренировок организм спортсменов особо нуждается в восстановлении запасов утраченной жидкости, получении дополнительной порции электролитов, витаминов и энергии. Спортивный напиток PROFI это низкокалорийный негазированный спортивный напиток, состав которого близок к изотоническому. </p>
            <button type="button" class="btn btn_white btn_red">Подробнее</button>
        </div>
    </div>

    <div class="section title-block-6" data-anchor="slide6">
        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">
        <img src="img/border.svg" alt="" class="screen1-item-5">
        <img src="img/screen6_bottle.png" srcset="img/screen6_bottle@2x.png 2x" alt="" class="screen5-item-1">
        <img src="img/screen6_mug.png" srcset="img/screen6_mug@2x.png 2x" alt="" class="screen6-item-1">
        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">
        <div class="screen1_text screen2_text">
            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">
            <h3>Квас</h3>
            <p>«ИРИБ» - крупная производственная компания, которая обладает современными технологиями и оборудованием для производства качественной востребованной продукции. Мы тщательно контролируем все процессы на каждом этапе, чтобы производить натуральные соки, нектары, минеральную воду и другие напитки </p>
            <button type="button" class="btn btn_white btn_brown">Подробнее</button>
        </div>
    </div>



</div>
<!-- /desktop slider -->
<?php endif; ?>

<!-- mobile slider -->
<!--<div class="mobile_slider">-->
<!--    <div class="section_mob title-block-3">-->
<!--        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">-->
<!--        <img src="img/screen3_bottle.png" srcset="img/screen3_bottle@2x.png 2x" alt="" class="screen3-item-1">-->
<!--        <img src="img/screen3_fruits.png" srcset="img/screen3_fruits@2x.png 2x" alt="" class="screen3-item-2">-->
<!--        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">-->
<!--        <div class="screen1_text screen3_text">-->
<!--            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">-->
<!--            <h3>Соки и нектары</h3>-->
<!--            <p>«Ириб» – это экологически чистые соки и нектары, произведенные из свежих фруктов и овощей, выращенных в Дагестане и специально отобранных для производства соков. Особая обработка натурального сырья позволяет донести до вас восхитительный вкус дагестанских фруктов в их первозданном виде.</p>-->
<!--            <button type="button" class="btn btn_white btn_yellow">Подробнее</button>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="section_mob title-block-2">-->
<!--        <img src="img/screen2_wood.png" alt="" class="screen2-item-1">-->
<!--        <img src="img/screen2_bottle.png" srcset="img/screen2_bottle@2x.png 2x" alt="" class="screen2-item-2">-->
<!--        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">-->
<!--        <div class="screen1_text screen2_text">-->
<!--            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">-->
<!--            <h3>Природная вода</h3>-->
<!--            <p>Природная вода источника «Бекенез» уникальна по количеству полезных природных микроэлементов, которые благотворно влияют на организм человека. Обладает мягким вкусом, утоляет жажду и благодаря уникальному сбалансированному составу идеально подходит для ежедневного употребления.</p>-->
<!--            <button type="button" class="btn btn_white btn_blue">Подробнее</button>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="section_mob title-block-1">-->
<!--        <img src="img/screen1_snow.png" srcset="img/screen1_snow@2x.png 2x" alt="" class="screen1-item-1">-->
<!--        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">-->
<!--        <img src="img/screen1_blueberries.png" srcset="img/screen1_blueberries@2x.png 2x" alt="" class="screen1-item-3">-->
<!--        <img src="img/screen1_bottle.png" srcset="img/screen1_bottle@2x.png 2x" alt="" class="screen1-item-6">-->
<!--        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">-->
<!--        <div class="screen1_text">-->
<!--            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">-->
<!--            <h3>Холодный чай</h3>-->
<!--            <p>Лучшие традиции Советских лимонадов в сочетании с современными технологиями - вот секрет гармоничного, сочного вкуса сладких газированных прохладительных напитков Ириб с ярким ароматом фруктов и ягод, которые прекрасно утоляют жажду в жаркий летний день!</p>-->
<!--            <button type="button" class="btn btn_white btn_pink">Подробнее</button>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="section_mob title-block-4">-->
<!--        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">-->
<!--        <img src="img/screen4_tree2.png" srcset="img/screen4_tree2@2x.png 2x" alt="" class="screen4-item-1">-->
<!--        <img src="img/screen4_bottle.png" srcset="img/screen4_bottle@2x.png 2x" alt="" class="screen4-item-2">-->
<!--        <img src="img/screen4_glass.png" srcset="img/screen4_glass@2x.png 2x" alt="" class="screen4-item-4">-->
<!--        <div class="screen1_text screen3_text">-->
<!--            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">-->
<!--            <h3>Лимонады</h3>-->
<!--            <p>Напитки «Gold Grand» являются прекрасным решением для украшения праздничного стола или повседневной трапезы. Обладая приятным и незабываемым вкусом, газированный лимонад встречает насыщенным ароматом свежих и натуральных фруктов. Лимонад производится из натуральных компонентов, которые имеют положительное воздействие на организм.</p>-->
<!--            <button type="button" class="btn btn_white btn_green">Подробнее</button>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="section_mob title-block-5">-->
<!--        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">-->
<!--        <img src="img/screen5_bottle.png" srcset="img/screen5_bottle@2x.png 2x" alt="" class="screen5-item-1">-->
<!--        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">-->
<!--        <div class="screen1_text screen5_text">-->
<!--            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">-->
<!--            <h3>Спортивные напитки</h3>-->
<!--            <p>Во время соревнований и интенсивных тренировок организм спортсменов особо нуждается в восстановлении запасов утраченной жидкости, получении дополнительной порции электролитов, витаминов и энергии. Спортивный напиток PROFI это низкокалорийный негазированный спортивный напиток, состав которого близок к изотоническому. </p>-->
<!--            <button type="button" class="btn btn_white btn_red">Подробнее</button>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="section_mob title-block-6">-->
<!--        <img src="img/screen1_water.png" srcset="img/screen1_water@2x.png 2x" alt="" class="screen1-item-2">-->
<!--        <img src="img/screen6_bottle.png" srcset="img/screen6_bottle@2x.png 2x" alt="" class="screen5-item-1">-->
<!--        <img src="img/screen6_mug.png" srcset="img/screen6_mug@2x.png 2x" alt="" class="screen6-item-1">-->
<!--        <img src="img/screen1_bubbles.png" srcset="img/screen1_bubbles@2x.png 2x" alt="" class="screen1-item-8">-->
<!--        <div class="screen1_text screen2_text">-->
<!--            <img src="img/logo_big.png" data-srcset="img/logo_big@2x.png 2x" alt="">-->
<!--            <h3>Квас</h3>-->
<!--            <p>«ИРИБ» - крупная производственная компания, которая обладает современными технологиями и оборудованием для производства качественной востребованной продукции. Мы тщательно контролируем все процессы на каждом этапе, чтобы производить натуральные соки, нектары, минеральную воду и другие напитки </p>-->
<!--            <button type="button" class="btn btn_white btn_brown">Подробнее</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- /mobile slider -->
<!-- /intro -->

<div class="b-main-page">
    <?php if( have_rows('main_cat',$id_page) ):?>
    <!-- products -->
    <div class="products">
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/product_bubbles.png" srcset="<?php echo $url;?>/img/product_bubbles@2x.png 2x" alt="" class="js-img products-bubbles" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <?php $field=get_field('main_cat_title',$id_page); if($field){ ?>
                <h2><?php echo $field;?></h2>
            <?php }?>
            <ul class="products-list">
                <?php
                global $cat;
                global $front_page;
                $front_page = true;
                while ( have_rows('main_cat',$id_page) ) : the_row();
                    $cat = get_sub_field('main_cat_item');
                    get_template_part('template-parts/content','cat');
                endwhile;?>
            </ul>
        </div>
    </div>
    <!-- /products -->
    <?php endif; ?>
    <?php if( have_rows('main_benefits', $id_page) ):?>
        <!-- preferences -->
        <div class="preferences">
            <div class="b-wrap">
                <img src="<?php echo $url;?>/img/pref_bubbles.png" srcset="<?php echo $url;?>/img/pref_bubbles@2x.png 2x" alt="" class="js-img pref-bubbles" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
                <img src="<?php echo $url;?>/img/leaves.png" srcset="<?php echo $url;?>/img/leaves@2x.png 2x" alt="" class="js-img pref-leaves" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
                <?php $field=get_field('main_benefits_title',$id_page); if($field){ ?>
                    <h2><?php echo $field;?></h2>
                <?php }?>
                <ul class="preferences__list">
                    <?php while ( have_rows('main_benefits',$id_page) ) : the_row();?>
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
    <!-- about us -->
    <div class="about">
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/about_bg1.png" alt="" class="js-img about-bg1">
            <img src="<?php echo $url;?>/img/about_bg2.png" alt="" class="js-img about-bg2">
            <?php
            $about_image  = get_field('about_photo', $id_page);
            $about_image2 = get_field('about_photo2', $id_page);
            $about_name   = get_field('about_title', $id_page);
            $about_text   = get_field('about_text', $id_page);
            $about_page   = get_field('about_page', $id_page);
            if($about_image){ ?>
                <div class="about__img">
                    <img src="<?php echo $about_image;?>"<?php if($about_image2){ ?> srcset="<?php echo $about_image2;?> 2x"<?php } ?> alt="" class="js-img">
                </div>
            <?php } ?>
            <div class="about__text">
                <?php if($about_name){ ?>
                    <h2><?php echo $about_name;?></h2>
                <?php } ?>
                <?php if($about_text){ ?>
                    <?php echo $about_text;?>
                <?php } ?>
                <?php if($about_page){ ?>
                    <div class="btn-center"><a href="<?php echo $about_page;?>" class="btn btn_more">Подробнее</a></div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- /about us -->
    <?php
    $posts = get_posts( array(

        'numberposts'     => 3, // тоже самое что posts_per_page
        'category'        => 1,
    ) );
    if($posts) { ?>
    <!-- news -->
    <div class="news">
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/news_bubbles.png" srcset="<?php echo $url;?>/img/news_bubbles@2x.png 2x" alt="" class="js-img news-bubbles" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">

            <h2>Новости</h2>
            <ul class="news__list">
                <?php
                global $post;
                foreach ($posts as $post) {
                    setup_postdata($post);
                    get_template_part('template-parts/content','news');
                }
                wp_reset_postdata();?>
            </ul>
        </div>
    </div>
    <!-- /news -->
    <?php } ?>
</div>

<?php get_footer();
