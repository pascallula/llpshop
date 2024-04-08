<?php
/**
* Color Settings.
* @package Carpenter Shop
*/

$carpenter_shop_default = carpenter_shop_get_default_theme_options();

$wp_customize->add_setting( 'carpenter_shop_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'carpenter_shop_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'carpenter-shop' ),
        'section'    => 'colors',
        'settings'   => 'carpenter_shop_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'carpenter_shop_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'carpenter_shop_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'carpenter-shop' ),
        'section'    => 'colors',
        'settings'   => 'carpenter_shop_border_color',
    ) ) 
);