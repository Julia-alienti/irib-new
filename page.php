<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); $id_page=get_the_ID(); ?>
    <section class="content">
        <div class="conteiner">
            <div class="wrap_content wrap_content2">
                <div class="breadcrumbs"><?php if(function_exists('bcn_display')){bcn_display();}?></div>
                <h1><?php the_title();?></h1>
                <div class="wr_page">
                    <div class="left_cont">
                        <div class="wrap_page">
                            <div class="page_img"><img src="<?php the_field('single_img',$id_page); ?>" alt="">
                                <span><img src="<?php bloginfo('template_directory')?>/img/icons/logo_img.png" alt=""></span>
                            </div>
                            <div class="page_txt">
                                <?php
                                if ( have_posts() ) {
                                    while ( have_posts() ) {
                                        the_post();
                                        the_content();
                                    } // end while
                                } // end if
                                ?>
                            </div>
                            <?php if( have_rows('phones','options') ):?>
                                    <?php while ( have_rows('phones','options') ) : the_row();?>
                                        <p><span><?php the_sub_field('phones_number'); ?></span> - <?php the_sub_field('phones_address'); ?></p>
                                    <?php endwhile;?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php get_sidebar();?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
<?php get_footer();?>

