<?php
function irib_get_social(){ ?>
    <div class="socials">
        <?php $field=get_field('soc_1','options'); if($field){ ?>
            <a href="<?php echo $field;?>" class="vk"></a>
        <?php }?>
        <?php $field=get_field('soc_2','options'); if($field){ ?>
            <a href="<?php echo $field;?>" class="fb"></a>
        <?php }?>
        <?php $field=get_field('soc_3','options'); if($field){ ?>
            <a href="<?php echo $field;?>" class="inst"></a>
        <?php }?>
        <?php $field=get_field('soc_4','options'); if($field){ ?>
            <a href="<?php echo $field;?>" class="yt"></a>
        <?php }?>
    </div>
<?php }
function irib_get_related($id){
    $url = get_bloginfo('template_directory');
    $field_products = get_field('related',$id)
    ?>
    <!-- recommended -->
    <div class="recommended">
        <div class="b-wrap">
            <img src="<?php echo $url;?>/img/product_bubbles3.png" srcset="<?php echo $url;?>/img/product_bubbles3@2x.png 2x" alt="" class="js-img product-bubbles3" data-paroller-factor="0.3" data-paroller-type="foreground" data-paroller-direction="vertical">
            <?php $field=get_field('related_title','options'); if($field){ ?>
                <h2><?php echo $field;?></h2>
            <?php }?>

            <div class="recommended-slider">
                <?php if( $field_products ){
                    foreach($field_products as $field_product)
                    {
                        echo '<div>';
                        global $post;
                        $post = $field_product;
                        setup_postdata($post);
                        get_template_part( 'template-parts/content' );
                        echo '</div>';
                    }
                }else {
                    $posts = get_posts( array(
                        'numberposts'     => 5,
                        'post_type'       => array('product'),
                    ) );
                    if($posts) {
                        foreach ($posts as $post) { ?>
                            <div>
                                <?php
                                global $post;
                                setup_postdata($post);
                                get_template_part( 'template-parts/content' );
                                ?>
                            </div>
                            <?php
                        } wp_reset_postdata();
                    }

                    ?>

                <?php }?>
            </div>
        </div>
    </div>
    <!-- /recommended -->
<?php }
