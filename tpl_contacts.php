<?php

/*
Template Name: Контакты
*/

get_header();  $id_page=get_the_ID(); ?>
<main class="b-main">
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="b-wrap">
            <?php if(function_exists('bcn_display')){bcn_display();}?>
        </div>
    </div>
    <!-- /breadcrumbs -->

    <div class="contacts-page">
        <div class="b-wrap">
            <h2><?php the_title();?></h2>

            <h3>Офис и производство</h3>

            <?php if( have_rows('contacts',$id_page) ):?>
                <?php $count_block = 1; while ( have_rows('contacts',$id_page) ) : the_row();?>
                    <div class="contacts-box<?php if($count_block==1){ echo ' address'; }?>">
                        <?php $field = get_sub_field('contacts_icon'); if($field){ ?>
                        <img src="<?php echo $field;?>" alt="" class="js-img">
                        <?php }?>
                        <?php $field = get_sub_field('contacts_name'); if($field){ ?>
                        <strong><?php echo $field;?>:</strong>
                        <?php }?>
                        <?php $field = get_sub_field('contacts_link'); $field2 = get_sub_field('contacts_text'); if($field){ ?>
                            <a href="tel:<?php echo $field;?>"><?php echo $field2;?></a>
                        <?php }else{ ?>
                            <?php if($field2){ ?>
                                <span><?php echo $field2;?></span>
                            <?php }?>
                        <?php }?>
                    </div>
                <?php $count_block++; endwhile;?>
            <?php endif; ?>
        </div>
    </div>

    <div class="map">
        <div id="map"></div>
        <div class="map_overlay"></div>
    </div>

</main>
<?php get_footer();