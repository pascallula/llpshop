<?php
/**
* Layouts Settings.
*
* @package Carpenter Shop
*/

$carpenter_shop_default = carpenter_shop_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'layout_setting',
	array(
	'title'      => esc_html__( 'Global Layout Settings', 'carpenter-shop' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'global_sidebar_layout',
    array(
    'default'           => $carpenter_shop_default['global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'carpenter_shop_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'carpenter-shop' ),
    'section'     => 'layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'carpenter-shop' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'carpenter-shop' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'carpenter-shop' ),
        ),
    )
);
