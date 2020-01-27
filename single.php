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

get_header(); $id_page=get_the_ID();  ?>
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
                                        the_content('',true);
                                    } // end while
                                } // end if
                                ?>
                            </div>
                            <?php if( have_rows('phones','options') ):?>
                            <div class="wrap_need">
                                <h2>Необходима предварительная запись по телефону</h2>
                                <div class="wr_need">
                                    <?php while ( have_rows('phones','options') ) : the_row();?>
                                        <p><span><?php the_sub_field('phones_number'); ?></span> - <?php the_sub_field('phones_address'); ?></p>
                                    <?php endwhile;?>
                                </div>
                            </div>
                            <?php else : endif; ?>
                        </div>
                    </div>
                    <?php get_sidebar();?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
<?php $cat=get_the_category( $id_page );  $cat_id=$cat[0]->term_id;
$rand_posts  = get_posts( array(
    'numberposts' => 4, // тоже самое что posts_per_page
    'category'       => $cat_id,
    'exclude'        =>  $id_page,
    'orderby'        => 'rand',
) );
if($rand_posts ) { ?>
    <div class="item__similar related">
        <div class="related__heading">
            Похожие элементы:
        </div>
        <div class="related__list">
            <?php
            foreach ($rand_posts  as $post) {
                setup_postdata($post); ?>
                <div class="related__item item-preview">
                    <a class="item-preview__image flare" href="<?php the_permalink();?>" title="<?php the_title();?>">
                        <img class="item-preview__pic" src="<?php the_post_thumbnail_url();?>" width="100" height="100" alt="<?php the_title();?>" >
                    </a>
                    <div class="item-preview__title">
                        <a class="link link_decoration_inverted link_color_inherit"><?php the_title(); ?></a>
                    </div>
                </div>
            <?php }
            wp_reset_postdata();?>


        </div>
    </div>
<?php } ?>
<?php if( have_rows('projects',$id_page) ):?>
    <div class="block7">
        <div class="container">
            <span class="title">наши проекты</span>
            <div class="slider-projects">
                <div class="swiper-container swiper-container-project">
                    <div class="swiper-wrapper">
                        <?php while ( have_rows('projects',$id_page) ) : the_row();?>
                            <div class="swiper-slide">
                                <?php
                                global $post;
                                $post=get_sub_field('projects_item');
                                setup_postdata($post);
                                get_template_part( 'content' );
                                ?>
                            </div>
                        <?php endwhile;?>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-next-project"></div>
                <div class="swiper-button-prev swiper-button-prev-project"></div>
            </div>
        </div>
    </div>
<?php endif; ?>

<a href="<?php $author_id=get_the_author_meta('ID'); ?><?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
    <?php
    $field=get_field('avatar','user_'.$author_id); if($field){ ?>
        <img src="<?php echo $field;?>" alt="author">
    <?php }?>
    <?php
    $user_name = get_the_author_meta('first_name'); $user_name2 = get_the_author_meta('last_name');
    if($user_name||$user_name2){
        echo '<span>'.$user_name .' '.$user_name2.'</span>';
    }else{
        $user_name = get_the_author_meta('nickname');
        echo '<span>'. $user_name .'</span>';
    }
    ?>
</a>
<?php
global $post;
$next_post = get_previous_post(true,'','category-projects');

if(!$next_post){
    //$first_post = get_boundary_post(true,'',false,'category-projects')[0];
    $first_post = get_boundary_post(true,'',false,'category-projects')[0];
//                ?>
    <!--                <pre>-->
    <!--                --><?php //print_r($first_post);?>
    <!--            </pre>-->
    <!--                --><?php
    $next_post = $first_post->ID;
}
if($next_post) { ?>
    <div class="offset-lg-1 col-lg-3 col-md-3">
        <a href="<?php echo get_permalink($next_post); ?>" id="next_href">
            <div id="next">
                <img src="<?php echo get_template_directory_uri() . '/assets/img/right-arrow.svg'; ?>" alt="arrow">
                <p><?php _e('Следующий проект', 'Mikord'); ?></p>
            </div>
        </a>
    </div>
    <?php
}
?>
<?php get_footer();?>

