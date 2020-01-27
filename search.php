<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
    <div class="banner  banner--news">
        <div class="banner__content">
            <?php the_archive_title( '<span class="banner__title  banner__title--black">', '</span>' ); ?>
            <div class="breadcrumb"><?php if(function_exists('bcn_display')){bcn_display();}?></div>
        </div>
    </div>
    <div class="news__wrapper">
        <section class="news">
            <div class="news__list">
                <?php if ( have_posts() ) : ?>
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                <?php else : ?>
                    <h1 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h1>
                <?php endif; ?>
                <?php
                if ( have_posts() ) : ?>
                    <?php
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content', get_post_format() );
                    endwhile;
                    the_posts_pagination( array(
                        'prev_text' => '<span class="screen-reader-text news__prev-button">' . __( 'Previous', 'twentyseventeen' ) . '</span>',
                        'next_text' => '<span class="screen-reader-text news__next-button">' . __( 'Next', 'twentyseventeen' ) . '</span>',
                    ) );
                else : ?>
                    <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
                    <?php
				get_search_form();
                endif; ?>
            </div>
            <?php get_sidebar(); ?>
        </section>
    </div>


<?php get_footer();
