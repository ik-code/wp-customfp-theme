<?php
/**
 * Add nav-link and active class to anchors Footer Menu
 */
function add_class_to_href( $classes, $item ) {

    if ( in_array('current_page_item', $item->classes) ) {
        add_filter( 'nav_menu_link_attributes', function($atts) {
            $atts['class'] = "nav-link active";
            return $atts;
        }, 100, 1 );
    }else{
        add_filter( 'nav_menu_link_attributes', function($atts) {
            $atts['class'] = "nav-link";
            return $atts;
        }, 100, 1 );
    }
    return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_href', 10, 2 );



function remove_editor() {
    if (isset($_GET['post'])) {
        $id = $_GET['post'];
        $template = get_post_meta($id, '_wp_page_template', true);
        switch ($template) {
            case 'front-page.php':
                remove_post_type_support('page', 'editor');
                break;
            default :
                // Don't remove any other template.
                add_action( 'wp_head', 'hide_testimonial_anchor' );
                function hide_testimonial_anchor(){
                    return '<style> a[href="#testimonials"]{display:none;} </style>';
                }
                break;
        }
    }
}
add_action('init', 'remove_editor');
