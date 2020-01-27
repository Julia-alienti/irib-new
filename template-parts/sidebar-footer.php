<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="footer-box">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="<?php echo get_home_url(); ?>"><img src="<?php the_field('logo_2','options'); ?>" alt="img"></a>
                            <?php $field=get_field('copy','options'); if($field){ ?>
                            <div class="copyr hidden-xs hidden-sm"><?php echo $field;?>© aquaexpert copyright, <?php echo date('Y');?></div>
                            <?php }?>
                        </div>
                        <div class="footer-menu">
                            <?php wp_nav_menu( array( 'menu_class'      => 'menu','container'       => false, 'theme_location' => 'footer-1' ) ); ?>
<!---->
<!--                            <ul>-->
<!--                                <li><a href="#">Проектирование скважин</a></li>-->
<!--                                <li><a href="#">Бурение скважин</a></li>-->
<!--                                <li><a href="#">Геотермальное отопление</a></li>-->
<!--                                <li><a href="#">Обустройство скважин</a></li>-->
<!--                                <li><a href="#">Сервисное обслуживание</a></li>-->
<!--                                <li><a href="#">Ремонт скважин</a></li>-->
<!--                                <li><a href="#">Ликвидация скважин</a></li>-->
<!--                                <li><a href="#">Видеодиагностика скважин</a></li>-->
<!--                            </ul>-->
                        </div>
                    </div>
                    <div class="footer-right">
                        <div class="footer-menu">
                            <?php wp_nav_menu( array( 'menu_class'      => 'menu','container'       => false, 'theme_location' => 'footer-2' ) ); ?>

<!--                            <ul>-->
<!--                                <li><a href="#">О компании</a></li>-->
<!--                                <li><a href="#">Карта глубин</a></li>-->
<!--                                <li><a href="#">Стоимость услуг</a></li>-->
<!--                                <li><a href="#">Гарантии</a></li>-->
<!--                                <li><a href="#">Блог</a></li>-->
<!--                                <li><a href="#">Контакты</a></li>-->
<!--                            </ul>-->
                        </div>
                    </div>
                </div>
                <div class="footer-contacts">
                    <?php if( have_rows('phones','options') ):?>
                        <?php  while ( have_rows('phones','options') ) : the_row();
                            $phone = get_sub_field('phones_number');
                            $phone_link = get_sub_field('phones_link'); ?>
                            <a href="tel:<?php echo $phone_link; ?>"><?php echo $phone; ?>,</a>
                        <?php endwhile;?>
                    <?php  endif; ?>
                    <?php $field=get_field('mail','options'); if($field){ ?>
                    <a href="mailto:<?php echo $field;?>"><?php echo $field;?></a>
                    <?php }?>
                </div>
                <?php $field=get_field('copy','options'); if($field){ ?>
                <div class="copyr visible-xs visible-sm"><?php echo $field;?> <?php echo date('Y');?></div>
                <?php }?>
            </div>
        </div>
    </div>
</footer>