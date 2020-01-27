<?php
function create_post_type() { // создаем новый тип записи
register_post_type( 'product', // указываем названия типа
array(
'labels' => array(
'name' => __( 'Продукция' ), // даем названия разделу для панели управления
'singular_name' => __( 'Продукт' ), // даем названия одной записи
//                'add_new' => _x('Добавить новый'),// далее полная русификация админ. панели
'add_new_item' => __('Добавить новый продукт'),
'edit_item' => __('Редактировать продукт'),
'new_item' => __('Новый продукт'),
'all_items' => __('Все продукты'),
'view_item' => __('Просмотр продукта'),
'search_items' => __('Поиск продукта'),
'not_found' => __('Нет продукта'),
'not_found_in_trash' => __('Продукты не найдены'),
'menu_name' => 'Продукция'
),
'public' => true,
    'show_in_rest' => true,
'menu_position' => 5, // указываем место в левой баковой панели
'rewrite' => array('slug' => 'product'), // указываем slug для ссылок например: mysite/reviews/
'supports' => array('title', 'thumbnail', 'editor', 'excerpt') // тут мы активируем поддержку миниатюр
)
);
}
add_action( 'init', 'create_post_type' );
add_action( 'init', 'create_products_tax' );
function create_products_tax(){
register_taxonomy(
'catalog',
'product',
array(
'label' => __('Каталог'),
'rewrite' => array('slug' => 'catalog'),
'hierarchical' => true,
'show_admin_column'     => true,
)
);
}