<?php
function child_theme_enqueue_styles() {

    //styles
    wp_enqueue_style( 'customfp-style',get_stylesheet_directory_uri() . '/style.css',  array(), '1.0.0' );
    wp_enqueue_style( 'customfp', get_stylesheet_directory_uri() . '/css/style.min.css',  array(), '1.0.0');

    //display anchor with id testimonials only on front page
    if ( !is_page_template( 'front-page.php' ) ) {
        $custom_css = "a[href='#testimonials']{display:none;}";
        wp_add_inline_style( 'customfp-style', $custom_css );
    }

    //scripts
    wp_enqueue_script('customfp-jquery', get_stylesheet_directory_uri() . '/libs/jquery/jquery-3.6.0.min.js', array(),'3.6.0', true);
    wp_enqueue_script('customfp-bootstrap', get_stylesheet_directory_uri() . '/libs/bootstrap/js/bootstrap.bundle.min.js', array(),'5.1.3', true);
    wp_enqueue_script('customfp-slick', get_stylesheet_directory_uri() . '/libs/slick-carousel/slick/slick.min.js', array(),'1.8.0', true);
    wp_enqueue_script('customfp-common', get_stylesheet_directory_uri() . '/js/common.min.js', array('customfp-jquery'),'1.0.0', true);
    wp_enqueue_script( 'contact-form',get_template_directory_uri() . '/js/contact-form.min.js', array(), '', true );

}
add_action('wp_enqueue_scripts', 'child_theme_enqueue_styles');

