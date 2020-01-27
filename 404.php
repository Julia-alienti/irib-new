<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header();
?>
<?php $url = get_bloginfo('template_directory');?>
<main class="b-main">
<?php $field=get_field('title_404','options'); $field2=get_field('text_404','options'); if($field||$field2){ ?>
    <p class="page-404__text"><strong><?php echo $field;?></strong> <?php echo $field2;?></p>
<?php }?>
    <div class="page-404__bg-layer"></div>

    <div class="b-wrap">
        <img src="<?php echo $url;?>/img/404_bottle1.png" alt="" class="bottle1">
        <img src="<?php echo $url;?>/img/404_bottle3.png" alt="" class="bottle3">
    </div>

    <div class="page-404__mid-layer"></div>

    <div class="b-wrap">
<?php $field=get_field('img_404','options'); if($field){ ?>
        <img src="<?php echo $field;?>" alt="" class="txt-404">
<?php }?>
        <img src="<?php echo $url;?>/img/404_bottle2.png" alt="" class="bottle2">
    </div>

    <div class="page-404__top-layer"></div>

    <div class="btn-center"><a href="<?php echo get_home_url(); ?>" class="btn">На главную</a></div>

</main>
<?php get_footer(); ?>