<?php
/**
 * Enqueue customizer css.
 */

function shoppable_wardrobe_customize_enqueue_style() {

	wp_enqueue_style( 'shoppable-wardrobe-customize-controls', get_stylesheet_directory_uri() . '/inc/customizer/customizer.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'shoppable_wardrobe_customize_enqueue_style', 99 );

/**
 * Kirki Customizer
 *
 * @return void
 */
add_action( 'init' , 'shoppable_wardrobe_kirki_fields', 999, 1 );

function shoppable_wardrobe_kirki_fields(){

	/**
	* If kirki is not installed do not run the kirki fields
	*/

	if ( !class_exists( 'Kirki' ) ) {
		return;
	}

	//Leading Brands
	Kirki::add_section( 'blog_leading_brands', array(
	    'title'          => esc_html__( 'Leading Brands', 'shoppable-wardrobe' ),
	    'description'  	 => esc_html__( 'WooCommerce plugin is required for this section.', 'shoppable-wardrobe' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => 26,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Leading Brands Section', 'shoppable-wardrobe' ),
		'type'         => 'toggle',
		'settings'     => 'leading_brands_section',
		'section'      => 'blog_leading_brands',
		'default'      => false,
		'priority'	   => 10,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Title', 'shoppable-wardrobe' ),
		'type'        => 'text',
		'settings'    => 'leading_brands_title',
		'section'     => 'blog_leading_brands',
		'default'     => '',
		'priority'	   => 20,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Sub Title', 'shoppable-wardrobe' ),
		'type'        => 'text',
		'settings'    => 'leading_brands_sub_title',
		'section'     => 'blog_leading_brands',
		'default'     => '',
		'priority'	   => 30,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Image One', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'brands_image_one',
		'section'      => 'blog_leading_brands',
		'default'      => '',
		'priority'	   => 40,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Image One Category', 'shoppable-wardrobe' ),
		'type'        => 'select',
		'settings'    => 'brand_category_one',
		'section'     => 'blog_leading_brands',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Category One', 'shoppable-wardrobe' ),
		'choices'     => shoppable_wardrobe_get_product_categories(),
		'priority'	  => 50,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Image Two', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'brands_image_two',
		'section'      => 'blog_leading_brands',
		'default'      => '',
		'priority'	   => 60,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Image Two Category', 'shoppable-wardrobe' ),
		'type'        => 'select',
		'settings'    => 'brand_category_two',
		'section'     => 'blog_leading_brands',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Category Two', 'shoppable-wardrobe' ),
		'choices'     => shoppable_wardrobe_get_product_categories(),
		'priority'	  => 70,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Image Three', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'brands_image_three',
		'section'      => 'blog_leading_brands',
		'default'      => '',
		'priority'	   => 80,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Image Three Category', 'shoppable-wardrobe' ),
		'type'        => 'select',
		'settings'    => 'brand_category_three',
		'section'     => 'blog_leading_brands',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Category Three', 'shoppable-wardrobe' ),
		'choices'     => shoppable_wardrobe_get_product_categories(),
		'priority'	  => 90,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Image Four', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'brands_image_four',
		'section'      => 'blog_leading_brands',
		'default'      => '',
		'priority'	   => 100,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Image Four Category', 'shoppable-wardrobe' ),
		'type'        => 'select',
		'settings'    => 'brand_category_four',
		'section'     => 'blog_leading_brands',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Category Four', 'shoppable-wardrobe' ),
		'choices'     => shoppable_wardrobe_get_product_categories(),
		'priority'	  => 110,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Image Five', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'brands_image_five',
		'section'      => 'blog_leading_brands',
		'default'      => '',
		'priority'	   => 120,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Image Five Category', 'shoppable-wardrobe' ),
		'type'        => 'select',
		'settings'    => 'brand_category_five',
		'section'     => 'blog_leading_brands',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Category Five', 'shoppable-wardrobe' ),
		'choices'     => shoppable_wardrobe_get_product_categories(),
		'priority'	  => 130,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Image Six', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'brands_image_six',
		'section'      => 'blog_leading_brands',
		'default'      => '',
		'priority'	   => 140,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Image Six Category', 'shoppable-wardrobe' ),
		'type'        => 'select',
		'settings'    => 'brand_category_six',
		'section'     => 'blog_leading_brands',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Category Six', 'shoppable-wardrobe' ),
		'choices'     => shoppable_wardrobe_get_product_categories(),
		'priority'	  => 150,
	) );

	

	// Responsive
	Kirki::add_field( 'hello-shoppable', array(
	    'type'        => 'custom',
	    'settings'    => 'coupons_responsive_separator',
	    'section'     => 'blog_leading_brands',
	    'default'     => esc_html__( 'Responsive', 'shoppable-wardrobe' ),
	    'priority'	  => 160,
	    'active_callback' => array(
			array(
				'setting'  => 'leading_brands_section',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Leading Brands', 'shoppable-wardrobe' ),
		'type'         => 'toggle',
		'settings'     => 'mobile_leading_brands',
		'section'      => 'blog_leading_brands',
		'default'      => true,
		'priority'	   => 170,
		'active_callback' => array(
			array(
				'setting'  => 'leading_brands_section',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );

	//Vendors
	Kirki::add_section('blog_vendors',array(
		'title'          => esc_html__( 'Vendors', 'shoppable-wardrobe' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => 27,
	));

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Vendors Section', 'shoppable-wardrobe' ),
		'type'         => 'toggle',
		'settings'     => 'vendors_section',
		'section'      => 'blog_vendors',
		'default'      => false,
		'priority'	   => 10,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Vendor one', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'blog_vendor_one',
		'section'      => 'blog_vendors',
		'default'      => '',
		'priority'	   => 20,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Vendor two', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'blog_vendor_two',
		'section'      => 'blog_vendors',
		'default'      => '',
		'priority'	   => 30,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Vendor three', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'blog_vendor_three',
		'section'      => 'blog_vendors',
		'default'      => '',
		'priority'	   => 40,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Vendor four', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'blog_vendor_four',
		'section'      => 'blog_vendors',
		'default'      => '',
		'priority'	   => 50,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Vendor five', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'blog_vendor_five',
		'section'      => 'blog_vendors',
		'default'      => '',
		'priority'	   => 60,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Vendor six', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'blog_vendor_six',
		'section'      => 'blog_vendors',
		'default'      => '',
		'priority'	   => 70,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	// Responsive
	Kirki::add_field( 'hello-shoppable', array(
	    'type'        => 'custom',
	    'settings'    => 'comments_responsive_separator',
	    'section'     => 'blog_vendors',
	    'default'     => esc_html__( 'Responsive', 'shoppable-wardrobe' ),
	    'priority'	  => 80,
	    'active_callback' => array(
			array(
				'setting'  => 'vendors_section',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );

	kirki::add_field('hello-shoppable',array(
		'label'        => esc_html__( 'Vendors', 'shoppable-wardrobe' ),
		'type'         => 'toggle',
		'settings'     => 'mobile_vendors',
		'section'      => 'blog_vendors',
		'default'      => true,
		'priority'	   => 90,
		'active_callback' => array(
			array(
				'setting'  => 'vendors_section',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );

	//views
	Kirki::add_section( 'blog_views', array(
	    'title'          => esc_html__( 'Views', 'shoppable-wardrobe' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => 28,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Views Section', 'shoppable-wardrobe' ),
		'type'         => 'toggle',
		'settings'     => 'views_section',
		'section'      => 'blog_views',
		'default'      => false,
		'priority'	   => 10,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Page 1', 'shoppable-wardrobe' ),
		'type'        => 'select',
		'settings'    => 'views_page_one',
		'section'     => 'blog_views',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 1', 'shoppable-wardrobe' ),
		'choices'     => shoppable_wardrobe_get_pages(),
		'priority'	  => 20,
	));	

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Page 2', 'shoppable-wardrobe' ),
		'type'        => 'select',
		'settings'    => 'views_page_two',
		'section'     => 'blog_views',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 2', 'shoppable-wardrobe' ),
		'choices'     => shoppable_wardrobe_get_pages(),
		'priority'	  => 30,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'       => esc_html__( 'Page 3', 'shoppable-wardrobe' ),
		'type'        => 'select',
		'settings'    => 'views_page_three',
		'section'     => 'blog_views',
		'default'     => '',
		'placeholder' => esc_html__( 'Select Page 3', 'shoppable-wardrobe' ),
		'choices'     => shoppable_wardrobe_get_pages(),
		'priority'	  => 40,
	) );

	// Responsive
	Kirki::add_field( 'hello-shoppable', array(
	    'type'        => 'custom',
	    'settings'    => 'details_responsive_separator',
	    'section'     => 'blog_views',
	    'default'     => esc_html__( 'Responsive', 'shoppable-wardrobe' ),
	    'priority'	  => 50,
	    'active_callback' => array(
			array(
				'setting'  => 'views_section',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Views', 'shoppable-wardrobe' ),
		'type'         => 'toggle',
		'settings'     => 'mobile_views',
		'section'      => 'blog_views',
		'default'      => true,
		'priority'	   => 60,
		'active_callback' => array(
			array(
				'setting'  => 'views_section',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );

	//Featured Ad
	Kirki::add_section( 'blog_featured_ad', array(
	    'title'          => esc_html__( 'Featured Ad', 'shoppable-wardrobe' ),
	    'panel'          => 'blog_homepage_options',
	    'capability'     => 'edit_theme_options',
	    'priority'       => 29,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Featured Ad Section', 'shoppable-wardrobe' ),
		'type'         => 'toggle',
		'settings'     => 'featured_ad_section',
		'section'      => 'blog_featured_ad',
		'default'      => false,
		'priority'	   => 10,
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Featured Ad 1', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'blog_featured_ad_one',
		'section'      => 'blog_featured_ad',
		'default'      => '',
		'priority'	   => 20,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Featured Ad 2', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'blog_featured_ad_two',
		'section'      => 'blog_featured_ad',
		'default'      => '',
		'priority'	   => 30,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Featured Ad 3', 'shoppable-wardrobe' ),
		'type'         => 'image',
		'settings'     => 'blog_featured_ad_three',
		'section'      => 'blog_featured_ad',
		'default'      => '',
		'priority'	   => 40,
		'choices'     => array(
			'save_as' => 'id',
		),
	) );

	// Responsive
	Kirki::add_field( 'hello-shoppable', array(
	    'type'        => 'custom',
	    'settings'    => 'memorials_responsive_separator',
	    'section'     => 'blog_featured_ad',
	    'default'     => esc_html__( 'Responsive', 'shoppable-wardrobe' ),
	    'priority'	  => 50,
	    'active_callback' => array(
			array(
				'setting'  => 'featured_ad_section',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );

	Kirki::add_field( 'hello-shoppable', array(
		'label'        => esc_html__( 'Featured Ad', 'shoppable-wardrobe' ),
		'type'         => 'toggle',
		'settings'     => 'mobile_featured_ad',
		'section'      => 'blog_featured_ad',
		'default'      => true,
		'priority'	   => 60,
		'active_callback' => array(
			array(
				'setting'  => 'featured_ad_section',
				'operator' => '==',
				'value'    => true,
			),
		),
	) );

}