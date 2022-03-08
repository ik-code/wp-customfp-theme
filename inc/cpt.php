<?php
function register_cpt_testimonial() {

    /**
     * Post Type: Testimonials.
     */

    $labels = [
        "name" => __( "Testimonials", "customfp" ),
        "singular_name" => __( "Testimonial", "customfp" ),
        "menu_name" => __( "Testimonials", "customfp" ),
        "all_items" => __( "All Testimonials", "customfp" ),
        "add_new" => __( "Add Testimonial", "customfp" ),
        "add_new_item" => __( "Add New Testimonial", "customfp" ),
        "edit_item" => __( "Edit Testimonial", "customfp" ),
        "new_item" => __( "New Testimonial", "customfp" ),
        "view_item" => __( "View Testimonial", "customfp" ),
        "view_items" => __( "View Testimonials", "customfp" ),
        "search_items" => __( "Search Testimonials", "customfp" ),
        "not_found" => __( "No Testimonials found", "customfp" ),
        "not_found_in_trash" => __( "No Testimonials found in Trash", "customfp" ),
        "parent" => __( "Parent Testimonial", "customfp" ),
        "featured_image" => __( "Featured Image for this Testimonial", "customfp" ),
        "set_featured_image" => __( "Set Featured Image for this Testimonial", "customfp" ),
        "remove_featured_image" => __( "Remove Featured Image for this Testimonial", "customfp" ),
        "use_featured_image" => __( "Use as Featured Image for this Testimonial", "customfp" ),
        "archives" => __( "Testimonial Archives", "customfp" ),
        "insert_into_item" => __( "Insert into Testimonial", "customfp" ),
        "uploaded_to_this_item" => __( "Uploaded to this Testimonial", "customfp" ),
        "filter_items_list" => __( "Filter Testimonials List", "customfp" ),
        "items_list_navigation" => __( "Testimonials List Navigation", "customfp" ),
        "items_list" => __( "Testimonials List", "customfp" ),
        "attributes" => __( "Testimonials Attributes", "customfp" ),
        "name_admin_bar" => __( "Testimonial", "customfp" ),
        "item_published" => __( "Testimonial Published", "customfp" ),
        "item_published_privately" => __( "Testimonial Published Privately", "customfp" ),
        "item_reverted_to_draft" => __( "Testimonial Reverted to Draft", "customfp" ),
        "item_scheduled" => __( "Testimonial Scheduled", "customfp" ),
        "item_updated" => __( "Testimonial Updated", "customfp" ),
        "parent_item_colon" => __( "Parent Testimonial", "customfp" ),
    ];

    $args = [
        "label" => __( "Testimonials", "customfp" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "testimonial", "with_front" => true ],
        "query_var" => true,
        "supports" => [ "title" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "testimonial", $args );
}

add_action( 'init', 'register_cpt_testimonial' );
