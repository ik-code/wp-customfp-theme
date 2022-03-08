<?php
function register_widget_areas() {

    register_sidebar( array(
        'name'          => 'Footer area one',
        'id'            => 'footer_area_one',
        'description'   => 'This widget area discription',
        'before_widget' => '<nav class="nav foooter__box-nav d-flex flex-wrap justify-content-center">',
        'after_widget'  => '</nav>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

}

add_action( 'widgets_init', 'register_widget_areas' );