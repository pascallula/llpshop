<?php
/**
* Header Options.
*
* @package Carpenter Shop
*/

$carpenter_shop_default = carpenter_shop_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'carpenter-shop' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'carpenter_shop_header_layout_topbar_text',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_header_layout_topbar_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_header_layout_topbar_text',
    array(
    'label'    => esc_html__( 'Header Text', 'carpenter-shop' ),
    'section'  => 'button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_header_layout_wishlist_text',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_header_layout_wishlist_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_header_layout_wishlist_text',
    array(
    'label'    => esc_html__( 'Wishlist Text', 'carpenter-shop' ),
    'section'  => 'button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_header_layout_wishlist_link',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_header_layout_wishlist_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'carpenter_shop_header_layout_wishlist_link',
    array(
    'label'    => esc_html__( 'Wishlist Link', 'carpenter-shop' ),
    'section'  => 'button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'carpenter_shop_header_layout_compare_text',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_header_layout_compare_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_header_layout_compare_text',
    array(
    'label'    => esc_html__( 'Compare Text', 'carpenter-shop' ),
    'section'  => 'button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_header_layout_compare_link',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_header_layout_compare_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'carpenter_shop_header_layout_compare_link',
    array(
    'label'    => esc_html__( 'Compare Link', 'carpenter-shop' ),
    'section'  => 'button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting( 'carpenter_shop_header_layout_phone_number',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_header_layout_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_header_layout_phone_number',
    array(
    'label'    => esc_html__( 'Header Phone Number', 'carpenter-shop' ),
    'section'  => 'button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting('carpenter_shop_sticky',
    array(
        'default' => $carpenter_shop_default['carpenter_shop_sticky'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'carpenter_shop_sanitize_checkbox',
    )
);
$wp_customize->add_control('carpenter_shop_sticky',
    array(
        'label' => esc_html__('Enable Sticky Header', 'carpenter-shop'),
        'section' => 'button_header_setting',
        'type' => 'checkbox',
    )
);