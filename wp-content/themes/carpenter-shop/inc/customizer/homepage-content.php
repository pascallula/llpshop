<?php
/**
* Header Banner Options.
*
* @package Carpenter Shop
*/

$carpenter_shop_default = carpenter_shop_get_default_theme_options();
$carpenter_shop_post_category_list = carpenter_shop_post_category_list();

$wp_customize->add_section( 'header_banner_setting',
    array(
    'title'      => esc_html__( 'Slider Settings', 'carpenter-shop' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting('carpenter_shop_display_header_title',
    array(
        'default' => $carpenter_shop_default['carpenter_shop_display_header_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'carpenter_shop_sanitize_checkbox',
    )
);
$wp_customize->add_control('carpenter_shop_display_header_title',
    array(
        'label' => esc_html__('Enable / Disable Title', 'carpenter-shop'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('carpenter_shop_display_header_text',
    array(
        'default' => $carpenter_shop_default['carpenter_shop_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'carpenter_shop_sanitize_checkbox',
    )
);
$wp_customize->add_control('carpenter_shop_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'carpenter-shop'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('carpenter_shop_header_banner',
    array(
        'default' => $carpenter_shop_default['carpenter_shop_header_banner'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'carpenter_shop_sanitize_checkbox',
    )
);
$wp_customize->add_control('carpenter_shop_header_banner',
    array(
        'label' => esc_html__('Enable Slider', 'carpenter-shop'),
        'section' => 'header_banner_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'carpenter_shop_header_banner_cat',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'carpenter_shop_sanitize_select',
    )
);
$wp_customize->add_control( 'carpenter_shop_header_banner_cat',
    array(
    'label'       => esc_html__( 'Slider Post Category', 'carpenter-shop' ),
    'section'     => 'header_banner_setting',
    'type'        => 'select',
    'choices'     => $carpenter_shop_post_category_list,
    )
);

$wp_customize->add_setting( 'carpenter_shop_homepage_section_shipping_title',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_homepage_section_shipping_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_homepage_section_shipping_title',
    array(
    'label'    => esc_html__( 'Free Shipping Title', 'carpenter-shop' ),
    'section'  => 'header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_homepage_section_shipping_text',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_homepage_section_shipping_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_homepage_section_shipping_text',
    array(
    'label'    => esc_html__( 'Free Shipping Text', 'carpenter-shop' ),
    'section'  => 'header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_homepage_section_exchange_title',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_homepage_section_exchange_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_homepage_section_exchange_title',
    array(
    'label'    => esc_html__( 'Return Exchange Title', 'carpenter-shop' ),
    'section'  => 'header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_homepage_section_exchange_text',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_homepage_section_exchange_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_homepage_section_exchange_text',
    array(
    'label'    => esc_html__( 'Return Exchange Text', 'carpenter-shop' ),
    'section'  => 'header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_homepage_section_support_title',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_homepage_section_support_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_homepage_section_support_title',
    array(
    'label'    => esc_html__( 'Quality Support Title', 'carpenter-shop' ),
    'section'  => 'header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_homepage_section_support_text',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_homepage_section_support_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_homepage_section_support_text',
    array(
    'label'    => esc_html__( 'Quality Support Text', 'carpenter-shop' ),
    'section'  => 'header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_homepage_section_shopping_title',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_homepage_section_shopping_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_homepage_section_shopping_title',
    array(
    'label'    => esc_html__( 'Safe Shopping Title', 'carpenter-shop' ),
    'section'  => 'header_banner_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_homepage_section_shopping_text',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_homepage_section_shopping_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_homepage_section_shopping_text',
    array(
    'label'    => esc_html__( 'Safe Shopping Text', 'carpenter-shop' ),
    'section'  => 'header_banner_setting',
    'type'     => 'text',
    )
);

// Product Settings

$wp_customize->add_section( 'product_column_setting',
    array(
    'title'      => esc_html__( 'Product Settings', 'carpenter-shop' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_home_pannel',
    )
);

$wp_customize->add_setting('carpenter_shop_product_section',
    array(
        'default' => $carpenter_shop_default['carpenter_shop_product_section'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'carpenter_shop_sanitize_checkbox',
    )
);
$wp_customize->add_control('carpenter_shop_product_section',
    array(
        'label' => esc_html__('Enable Product Section', 'carpenter-shop'),
        'section' => 'product_column_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'carpenter_shop_product_heading',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_product_heading'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_product_heading',
    array(
    'label'    => esc_html__( 'Section Heading', 'carpenter-shop' ),
    'section'  => 'product_column_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_product_button_text',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_product_button_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'carpenter_shop_product_button_text',
    array(
    'label'    => esc_html__( 'Button Text', 'carpenter-shop' ),
    'section'  => 'product_column_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'carpenter_shop_product_button_link',
    array(
    'default'           => $carpenter_shop_default['carpenter_shop_product_button_link'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control( 'carpenter_shop_product_button_link',
    array(
    'label'    => esc_html__( 'Button Link', 'carpenter-shop' ),
    'section'  => 'product_column_setting',
    'type'     => 'url',
    )
);

// Top Rated Item Category

$carpenter_shop_args = array(
    'type'                     => 'product',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'product_cat',
    'pad_counts'               => false
);

$categories = get_categories($carpenter_shop_args);
$cat_posts = array();
$m = 0;
$cat_posts[]='Select';
foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
        $m++;
    }
    $cat_posts[$category->slug] = $category->name;
}

$wp_customize->add_setting('carpenter_shop_featured_product_top_rated',array(
    'default'   => 'select',
    'sanitize_callback' => 'carpenter_shop_sanitize_select',
));
$wp_customize->add_control('carpenter_shop_featured_product_top_rated',array(
    'type'    => 'select',
    'choices' => $cat_posts,
    'label' => __('Top Rated Item Category ','carpenter-shop'),
    'section' => 'product_column_setting',
));

// Most Selling Item Category 

$carpenter_shop_args = array(
    'type'                     => 'product',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'product_cat',
    'pad_counts'               => false
);

$categories = get_categories($carpenter_shop_args);
$cat_posts = array();
$m = 0;
$cat_posts[]='Select';
foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
        $m++;
    }
    $cat_posts[$category->slug] = $category->name;
}

$wp_customize->add_setting('carpenter_shop_featured_product_most_selling',array(
    'default'   => 'select',
    'sanitize_callback' => 'carpenter_shop_sanitize_select',
));
$wp_customize->add_control('carpenter_shop_featured_product_most_selling',array(
    'type'    => 'select',
    'choices' => $cat_posts,
    'label' => __('Most Selling Item Category ','carpenter-shop'),
    'section' => 'product_column_setting',
));

// Most Viewed Item Category

$carpenter_shop_args = array(
    'type'                     => 'product',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'product_cat',
    'pad_counts'               => false
);

$categories = get_categories($carpenter_shop_args);
$cat_posts = array();
$m = 0;
$cat_posts[]='Select';
foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
        $m++;
    }
    $cat_posts[$category->slug] = $category->name;
}

$wp_customize->add_setting('carpenter_shop_featured_product_most_viewed',array(
    'default'   => 'select',
    'sanitize_callback' => 'carpenter_shop_sanitize_select',
));
$wp_customize->add_control('carpenter_shop_featured_product_most_viewed',array(
    'type'    => 'select',
    'choices' => $cat_posts,
    'label' => __('Most Viewed Item Category ','carpenter-shop'),
    'section' => 'product_column_setting',
));

// Most Search Item Category

$carpenter_shop_args = array(
    'type'                     => 'product',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'term_group',
    'order'                    => 'ASC',
    'hide_empty'               => false,
    'hierarchical'             => 1,
    'number'                   => '',
    'taxonomy'                 => 'product_cat',
    'pad_counts'               => false
);

$categories = get_categories($carpenter_shop_args);
$cat_posts = array();
$m = 0;
$cat_posts[]='Select';
foreach($categories as $category){
    if($m==0){
        $default = $category->slug;
        $m++;
    }
    $cat_posts[$category->slug] = $category->name;
}

$wp_customize->add_setting('carpenter_shop_featured_product_most_search',array(
    'default'   => 'select',
    'sanitize_callback' => 'carpenter_shop_sanitize_select',
));
$wp_customize->add_control('carpenter_shop_featured_product_most_search',array(
    'type'    => 'select',
    'choices' => $cat_posts,
    'label' => __('Most Search Item Category ','carpenter-shop'),
    'section' => 'product_column_setting',
));