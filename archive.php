<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header();  ?>
    <section class="content">
        <div class="conteiner">
            <div class="wrap_content wrap_content2">
                <div class="breadcrumbs"><?php if(function_exists('bcn_display')){bcn_display();}?></div>
                <?php the_archive_title( '<h1>', '</h1>' ); ?>
                <div class="wr_page">

                    <div class="left_cont">
                        <div class="wrap_spec">
                            <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post();
                                    get_template_part( 'template-parts/content' );
                            endwhile; ?>

                        <?php
                        the_posts_pagination(array(
                            'prev_text' => '',
                            'next_text' => '',
                        ));
                        else : ?>
                            <p>К сожалению, ничего не найдено, посмотрите другие наши категории и продукты</p>
                            <?php
                        endif;
                        ?>
                        </div>
                    </div>
                    <?php get_sidebar();?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
<?php get_footer();
