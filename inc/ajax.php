<?php
function true_load_posts(){
    $args = unserialize( stripslashes( $_POST['query'] ) );
    $args['paged'] = $_POST['page'] + 1; // следующая страница
    $args['post_status'] = 'publish';
    // обычно лучше использовать WP_Query, но не здесь
    query_posts( $args );
    // если посты есть
    if( have_posts() ) :
        // запускаем цикл
        while( have_posts() ): the_post();
            echo '<li class="product-list__item">';
            get_template_part('template-parts/content');
            echo '</li>';
        endwhile;
    endif;
    die();
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');