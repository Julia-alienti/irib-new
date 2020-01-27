<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $url = get_bloginfo('template_directory');?>
<head>
    <title><?php echo wp_get_document_title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
    <meta name = "format-detection" content = "telephone=no" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">
    <?php wp_head();?>
    <style>
        .loaded .b-page{
            opacity: 0;
        }
        .icon-load {
            background: url("<?php echo $url;?>/img/loading.gif") no-repeat;
            background-size: 100%;
            width: 40px;
            height: 40px;
            position: fixed;
            left: 50%;
            top: 50%;
            margin-left: -20px;
            margin-top: -20px;
            display: none;
        }
        .loaded .icon-load {
            display: block;
        }
    </style>
</head>
<body class="loaded">
<div class="icon-load"></div>

<div class="b-page<?php if(!is_front_page()){ echo ' inner-page';} if(is_404()){ echo ' page-404'; } ?>">

    <div class="menu-overlay"></div>

    <!-- header -->
    <header class="b-head">
        <div class="b-wrap">
            <?php $field=get_field('logo','options'); $field2=get_field('logo2','options'); if($field||$field2){ ?>
            <?php if(!is_front_page()){ ?>
                <a href="<?php echo get_home_url(); ?>" class="logo"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" data-src="<?php echo $field?$field:$field2;?>"<?php if($field2){ echo ' data-srcset="'.$field2.' 2x"'; }?> alt="" class="js-img"></a>
            <?php }else{ ?>
                <div class="logo"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" data-src="<?php echo $field?$field:$field2;?>"<?php if($field2){ echo ' data-srcset="'.$field2.' 2x"'; }?> alt="" class="js-img"></div>
            <?php }?>
            <?php }?>
            <div class="b-head__right">
                <div class="b-head__right-top">
                    <?php get_search_form();?>
                    <?php $field=get_field('time','options'); if($field){ ?>
                    <div class="work-time"><?php echo $field;?></div>
                    <?php }?>
                    <div class="contacts">
                        <?php $field=get_field('phone','options'); if($field){
                            $phone_link = preg_replace('![^+0-9]!', '', $field); ?>
                        <a href="tel:<?php echo $phone_link; ?>" class="contacts__phone"><?php echo $field;?></a>
                        <?php }?>
                        <button type="button" class="btn order-call">Заказать звонок</button>
                    </div>
                </div>
                <div class="b-head__right-bottom">

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
                    <?php wp_nav_menu( array( 'menu_class'      => 'nav','container'       => false, 'theme_location' => 'primary' ) ); ?>
                </div>
            </div>
        </div>
        <div class="burger"><span></span></div>
    </header>
    <!-- /header -->

<!--    --><?php //?>
<!--    --><?php //if( have_rows('phones',$id_page) ):?>
<!--        --><?php //while ( have_rows('phones',$id_page) ) : the_row();?>
<!--            --><?php //the_sub_field('phones_number'); ?>
<!--        --><?php //endwhile;?>
<!--    --><?php // endif; ?>
<!--    --><?php //wp_nav_menu( array( 'menu_class'      => 'menu','container'       => false, 'theme_location' => 'top','items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>' ,'walker'        => new magomra_walker_nav_top_menu ) ); ?>
<!---->
<!--    --><?php //_e('Apply','novum'); ?>
<!--    --><?php //if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
<!--        --><?php //dynamic_sidebar( 'sidebar-1' ); ?>
<!--    --><?php //endif; ?>
<!---->
<!--    --><?php //if( have_rows('phones','options') ):?>
<!---->
<!--        --><?php // while ( have_rows('phones','options') ) : the_row();
//            $phone = get_sub_field('phones_number');
//            $phone_link = preg_replace('![^+0-9]!', '', $phone); ?>
<!---->
<!--            <a href="tel:--><?php //echo $phone_link; ?><!--">--><?php //echo $phone; ?><!--</a>-->
<!--        --><?php //endwhile;?>
<!---->
<!--    --><?php // endif; ?>
