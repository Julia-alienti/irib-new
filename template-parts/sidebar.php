<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<div class="side_bar">
    <button class="pull2">Навигация</button>
    <div class="wr_side">
        <?php
        $args = array(
            'type' => 'post',
            'parent' => 1,
            'orderby' => 'id',
            'order' => 'DESC',
            'hide_empty' => 0,
            'hierarchical' => false,
            'pad_counts' => false,
        );
        $categories = get_categories($args);
        if( $categories ) {
            foreach ($categories as $cat) { $cat_this_id = $cat->term_id; ?>
                <div class="side_item">
                    <h4><?php echo $cat->name; ?></h4>
                    <?php
                    $posts = get_posts( array(

                        'numberposts'     => -1, // тоже самое что posts_per_page
                        'category'        => $cat_this_id,
                    ) );
                    if($posts) { ?>
                        <ul>
                        <?php
                        foreach ($posts as $post) {
                            setup_postdata($post); ?>
                            <li><a href="<?php the_permalink(); ?>">- <?php the_title(); ?></a></li>
                        <?php }
                        wp_reset_postdata();?>
                        </ul>
                    <?php } ?>
                </div>
            <?php }
        }
        ?>
    </div>
</div>