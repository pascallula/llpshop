<?php
/**
* Footer Settings.
*
* @package Carpenter Shop
*/

$carpenter_shop_default = carpenter_shop_get_default_theme_options();

$wp_customize->add_section( 'footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Setting', 'carpenter-shop' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

$wp_customize->add_setting( 'footer_column_layout',
	array(
	'default'           => $carpenter_shop_default['footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'carpenter_shop_sanitize_select',
	)
);
$wp_customize->add_control( 'footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'carpenter-shop' ),
	'section'     => 'footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'carpenter-shop' ),
		'2' => esc_html__( 'Two Column', 'carpenter-shop' ),
		'3' => esc_html__( 'Three Column', 'carpenter-shop' ),
	    ),
	)
);

$wp_customize->add_setting( 'footer_copyright_text',
	array(
	'default'           => $carpenter_shop_default['footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'carpenter-shop' ),
	'section'  => 'footer_widget_area',
	'type'     => 'text',
	)
);