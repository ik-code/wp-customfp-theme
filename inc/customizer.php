<?php

// =========================================================================
// REGISTER CUSTOMIZER - PANEL, SECTION, SETTINGS AND CONTROL
// =========================================================================
function customfp_register_theme_customizer( $wp_customize ) {
    // Create Text Blocks panel.
    $wp_customize->add_panel( 'text_blocks', array(
        'priority'       => 10,
        'theme_supports' => '',
        'title'          => __( 'Text Blocks', 'customfp' ),
        'description'    => __( 'Set editable text for certain content.', 'customfp' ),
    ) );


    // Add section.
    $wp_customize->add_section( 'footer_copyright_text' , array(
        'title'    => __('Footer Copyright Text','customfp'),
        'panel'    => 'text_blocks',
        'priority' => 10
    ) );
    // Add setting
    $wp_customize->add_setting( 'footer_copyright_text_block', array(
        'default'           => __( 'Footer Copyright Text', 'customfp' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
            $wp_customize,
            'custom_title_text',
            array(
                'label'    => __( 'Footer Copyright', 'customfp' ),
                'section'  => 'footer_copyright_text',
                'settings' => 'footer_copyright_text_block',
                'type'     => 'text'
            )
        )
    );



    // Sanitize text
    function sanitize_text( $text ) {
        return sanitize_text_field( $text );
    }
}
add_action( 'customize_register', 'customfp_register_theme_customizer' );

