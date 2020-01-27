<?php $url = get_bloginfo('template_directory');
$class = '';
if(is_page_template('tpl_contacts.php')){
    $class = ' b-footer_black-top b-footer_contacts';
}elseif(is_page_template('tpl_about.php')){
    $class = ' b-footer_blue-top';
}elseif (is_404()){
    $class = ' b-footer_black-top';
}?>
<footer class="b-footer<?php echo $class; ?>">
    <div class="b-wrap">
        <div class="footer-col">
            <?php $field=get_field('logo','options'); $field2=get_field('logo2','options'); if($field||$field2){ ?>
                <?php if(!is_front_page()){ ?>
                    <a href="<?php echo get_home_url(); ?>" class="logo"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" data-src="<?php echo $field?$field:$field2;?>"<?php if($field2){ echo ' data-srcset="'.$field2.' 2x"'; }?> alt="" class="js-img"></a>
                <?php }else{ ?>
                    <div class="logo"><img src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" data-src="<?php echo $field?$field:$field2;?>"<?php if($field2){ echo ' data-srcset="'.$field2.' 2x"'; }?> alt="" class="js-img"></div>
                <?php }?>
            <?php }?>
        </div>
        <div class="footer-col">
            <?php wp_nav_menu( array( 'menu_class'      => 'footer-nav','container'       => false, 'theme_location' => 'footer' ) ); ?>
        </div>
        <div class="footer-col">
            <?php wp_nav_menu( array( 'menu_class'      => 'footer-nav','container'       => false, 'theme_location' => 'primary' ) ); ?>
            <div class="copyright">
                <?php  $field=get_field('dev_link','options'); $field2=get_field('dev_text','options'); if($field||$field2){ ?>
                <a href="<?php echo $field;?>"><?php echo $field2;?></a>
                <?php }?>
                <span>Copyright &copy; <?php echo date('Y');?></span>
            </div>
        </div>
        <div class="footer-col footer-contacts">
            <?php $field=get_field('address','options'); if($field){ ?>
            <div class="addr">
                <address><?php echo $field;?></address>
            </div>
            <?php }?>
            <?php $field=get_field('time','options'); if($field){ ?>
            <div class="work-time"><?php echo $field;?></div>
            <?php }?>
            <?php $field=get_field('mail','options'); if($field){ ?>
            <div class="email"><a href="mailto:<?php echo $field;?>"><?php echo $field;?></a></div>
            <?php }?>
            <div class="contacts">
                <?php $field=get_field('phone','options'); if($field){
                    $phone_link = preg_replace('![^+0-9]!', '', $field); ?>
                    <a href="tel:<?php echo $phone_link; ?>" class="contacts__phone"><?php echo $field;?></a>
                <?php }?>
                <button type="button" class="btn order-call">Заказать звонок</button>
            </div>
            <?php if(function_exists('irib_get_social')){irib_get_social();}?>
        </div>
    </div>
</footer>

<div class="go_top"></div>

</div>

<!-- ///// Заказать звонок //////-->
<div id="call-modal" class="form-modal">
    <div class="call_form">
    <?php echo do_shortcode('[contact-form-7 id="51" title="Заказать звонок"]');?>
    </div>
    <div class="modal-success">
        <p>Спасибо за заявку!</p>
    </div>
</div>

<!-- ///// Заказать //////-->
<div id="order-modal" class="form-modal">
    <div class="call_form">
        <?php echo do_shortcode('[contact-form-7 id="159" title="Заказать"]');?>
    </div>
    <div class="modal-success">
        <p>Спасибо за заявку!</p>
    </div>
</div>
<!--///////////-->
<?php $field = get_field('product_video',$id_page); if($field){ ?>
<div class="modal" id="videoModal">
    <a href="#" class="bClose"></a>
    <iframe src="/" data-src="<?php echo $field;?>" class="js-iframe" allowfullscreen id="video"></iframe>
</div>
<?php }?>

<script>
var map_icon = '<?php echo $url;?>/img/map_marker.png';
    <?php $field = get_field('map_coords','options'); if($field){ ?>
    var coords_lat   = '<?php echo $field['lat'];?>',
        coords_lng   = '<?php echo $field['lng'];?>';
    <?php }?>
</script>
<?php wp_footer();?>

</body>
</html>
