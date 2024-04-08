<?php
/**
 * Custom Print Shop Theme Customizer
 *
 * @package Custom Print Shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function custom_print_shop_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'custom_print_shop_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'custom_print_shop_customize_partial_blogdescription',
		)
	);

	//About Section
		$wp_customize->add_section( 'custom_print_shop_about_theme' , array(
	    	'title' => esc_html__( 'About Theme', 'custom-print-shop' ),
	    	'priority' => 10,
		) );

		$wp_customize->add_setting('custom_print_shop_demo_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('custom_print_shop_demo_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Demo</h3>Our premium version of Travel Booking Agency has unlimited sections with advanced control fields. Dedicated support and no limititation in any field.<br> <a target='_blank' href='". esc_url('https://themescaliber.com/demo/custom-print-shop-pro/') ." '>View Demo</a>",
			'section'=> 'custom_print_shop_about_theme'
		));
		
		$wp_customize->add_setting('custom_print_shop_doc_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('custom_print_shop_doc_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Documentation</h3>We have well prepared documentation that provides the general guidelines and suggestions needed for this theme.<br> <a target='_blank' href='". esc_url('https://themescaliber.com/demo/doc/custom-print-shop/') ." '>View Documentation</a>",
			'section'=> 'custom_print_shop_about_theme'
		));

		$wp_customize->add_setting('custom_print_shop_forum_link',array(
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('custom_print_shop_forum_link',array(
			'type'=> 'hidden',
			'description' => "<h3>Theme Support</h3>Regarding any theme issue, we offer 24/7 support. You can get assistance from our support staff in resolving any problem. Please get in touch with us.<br><a target='_blank' href='". esc_url('https://wordpress.org/support/theme/custom-print-shop/') ." '>Support Forum</a>",
			'section'=> 'custom_print_shop_about_theme'
		));


	//add home page setting pannel
	$wp_customize->add_panel( 'custom_print_shop_panel_id', array(
	    'priority' => 20,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'custom-print-shop' ),
	) );

    $custom_print_shop_font_array= array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Color / Font Pallete
	$wp_customize->add_section( 'custom_print_shop_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'custom-print-shop' ),
		'priority'   => 30,
		'panel' => 'custom_print_shop_panel_id'
	) );

	// This is Body Color setting
	$wp_customize->add_setting( 'custom_print_shop_body_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_body_color', array(
		'label' => __('Body Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_body_color',
	)));

	//This is Body FontFamily  setting
	$wp_customize->add_setting('custom_print_shop_body_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
		'custom_print_shop_body_font_family', array(
		'section'  => 'custom_print_shop_typography',
		'label'    => __( 'Body Fonts','custom-print-shop'),
		'type'     => 'select',
		'choices'  => $custom_print_shop_font_array,
	));

    //This is Body Fontsize setting
	$wp_customize->add_setting('custom_print_shop_body_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_body_font_size',array(
		'label'	=> __('Body Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_typography',
		'setting'	=> 'custom_print_shop_body_font_size',
		'type'	=> 'text'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_setting( 'custom_print_shop_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_theme_color', array(
  		'label' => __('Theme Color Option','custom-print-shop'),
	    'section' => 'custom_print_shop_typography',
	    'settings' => 'custom_print_shop_theme_color',
  	)));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'custom_print_shop_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_paragraph_color', array(
		'label' => __('Paragraph Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('custom_print_shop_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'custom_print_shop_paragraph_font_family', array(
	    'section'  => 'custom_print_shop_typography',
	    'label'    => __( 'Paragraph Fonts','custom-print-shop'),
	    'type'     => 'select',
	    'choices'  => $custom_print_shop_font_array,
	));

	$wp_customize->add_setting('custom_print_shop_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_typography',
		'setting'	=> 'custom_print_shop_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'custom_print_shop_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_atag_color', array(
		'label' => __('"a" Tag Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('custom_print_shop_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'custom_print_shop_atag_font_family', array(
	    'section'  => 'custom_print_shop_typography',
	    'label'    => __( '"a" Tag Fonts','custom-print-shop'),
	    'type'     => 'select',
	    'choices'  => $custom_print_shop_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'custom_print_shop_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_li_color', array(
		'label' => __('"li" Tag Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('custom_print_shop_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'custom_print_shop_li_font_family', array(
	    'section'  => 'custom_print_shop_typography',
	    'label'    => __( '"li" Tag Fonts','custom-print-shop'),
	    'type'     => 'select',
	    'choices'  => $custom_print_shop_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'custom_print_shop_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_h1_color', array(
		'label' => __('h1 Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('custom_print_shop_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'custom_print_shop_h1_font_family', array(
	    'section'  => 'custom_print_shop_typography',
	    'label'    => __( 'h1 Fonts','custom-print-shop'),
	    'type'     => 'select',
	    'choices'  => $custom_print_shop_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('custom_print_shop_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_h1_font_size',array(
		'label'	=> __('h1 Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_typography',
		'setting'	=> 'custom_print_shop_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'custom_print_shop_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_h2_color', array(
		'label' => __('h2 Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('custom_print_shop_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'custom_print_shop_h2_font_family', array(
	    'section'  => 'custom_print_shop_typography',
	    'label'    => __( 'h2 Fonts','custom-print-shop'),
	    'type'     => 'select',
	    'choices'  => $custom_print_shop_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('custom_print_shop_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_h2_font_size',array(
		'label'	=> __('h2 Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_typography',
		'setting'	=> 'custom_print_shop_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'custom_print_shop_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_h3_color', array(
		'label' => __('h3 Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('custom_print_shop_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'custom_print_shop_h3_font_family', array(
	    'section'  => 'custom_print_shop_typography',
	    'label'    => __( 'h3 Fonts','custom-print-shop'),
	    'type'     => 'select',
	    'choices'  => $custom_print_shop_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('custom_print_shop_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_h3_font_size',array(
		'label'	=> __('h3 Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_typography',
		'setting'	=> 'custom_print_shop_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'custom_print_shop_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_h4_color', array(
		'label' => __('h4 Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('custom_print_shop_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'custom_print_shop_h4_font_family', array(
	    'section'  => 'custom_print_shop_typography',
	    'label'    => __( 'h4 Fonts','custom-print-shop'),
	    'type'     => 'select',
	    'choices'  => $custom_print_shop_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('custom_print_shop_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_h4_font_size',array(
		'label'	=> __('h4 Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_typography',
		'setting'	=> 'custom_print_shop_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'custom_print_shop_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_h5_color', array(
		'label' => __('h5 Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('custom_print_shop_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'custom_print_shop_h5_font_family', array(
	    'section'  => 'custom_print_shop_typography',
	    'label'    => __( 'h5 Fonts','custom-print-shop'),
	    'type'     => 'select',
	    'choices'  => $custom_print_shop_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('custom_print_shop_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_h5_font_size',array(
		'label'	=> __('h5 Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_typography',
		'setting'	=> 'custom_print_shop_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'custom_print_shop_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_h6_color', array(
		'label' => __('h6 Color', 'custom-print-shop'),
		'section' => 'custom_print_shop_typography',
		'settings' => 'custom_print_shop_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('custom_print_shop_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'custom_print_shop_h6_font_family', array(
	    'section'  => 'custom_print_shop_typography',
	    'label'    => __( 'h6 Fonts','custom-print-shop'),
	    'type'     => 'select',
	    'choices'  => $custom_print_shop_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('custom_print_shop_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_h6_font_size',array(
		'label'	=> __('h6 Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_typography',
		'setting'	=> 'custom_print_shop_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section( 'custom_print_shop_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'custom-print-shop' ),
		'priority'   => 30,
		'panel' => 'custom_print_shop_panel_id'
	) );

	$wp_customize->add_setting('custom_print_shop_width_options',array(
        'default' => 'Full Layout',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control('custom_print_shop_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','custom-print-shop'),
        'section' => 'custom_print_shop_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','custom-print-shop'),
            'Contained Layout' => __('Contained Layout','custom-print-shop'),
            'Boxed Layout' => __('Boxed Layout','custom-print-shop'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('custom_print_shop_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	) );
	$wp_customize->add_control('custom_print_shop_theme_options', array(
        'type' => 'radio',
        'label' => __('Sidebar Layout','custom-print-shop'),
        'section' => 'custom_print_shop_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','custom-print-shop'),
            'Right Sidebar' => __('Right Sidebar','custom-print-shop'),
            'One Column' => __('One Column','custom-print-shop'),
            'Three Columns' => __('Three Columns','custom-print-shop'),
            'Four Columns' => __('Four Columns','custom-print-shop'),
            'Grid Layout' => __('Grid Layout','custom-print-shop')
        ),
    ));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('custom_print_shop_single_post_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	) );
	$wp_customize->add_control('custom_print_shop_single_post_sidebar', array(
        'type' => 'radio',
        'label' => __('Single Post Sidebar Layout','custom-print-shop'),
        'section' => 'custom_print_shop_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','custom-print-shop'),
            'Right Sidebar' => __('Right Sidebar','custom-print-shop'),
            'One Column' => __('One Column','custom-print-shop'),
        ),
    ));

    $wp_customize->add_setting('custom_print_shop_single_page_sidebar_layout', array(
		'default'           => 'One Column',
		'sanitize_callback' => 'custom_print_shop_sanitize_choices',
	));
	$wp_customize->add_control('custom_print_shop_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'custom-print-shop'),
		'section'        => 'custom_print_shop_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'custom-print-shop'),
			'Right Sidebar' => __('Right Sidebar', 'custom-print-shop'),
			'One Column'    => __('One Column', 'custom-print-shop'),
		),
	));

	$wp_customize->add_setting( 'custom_print_shop_single_page_breadcrumb',array(
		'default' => false,
      	'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('custom_print_shop_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','custom-print-shop' ),
        'section' => 'custom_print_shop_left_right'
    ));

    $wp_customize->add_setting('custom_print_shop_breadcrumb_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_breadcrumb_color', array(
		'label'    => __('Breadcrumb Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_left_right',
	)));

	$wp_customize->add_setting('custom_print_shop_breadcrumb_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_breadcrumb_background_color', array(
		'label'    => __('Breadcrumb Background Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_left_right',
	)));

	$wp_customize->add_setting('custom_print_shop_breadcrumb_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_breadcrumb_hover_color', array(
		'label'    => __('Breadcrumb Hover Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_left_right',
	)));

	$wp_customize->add_setting('custom_print_shop_breadcrumb_hover_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_breadcrumb_hover_bg_color', array(
		'label'    => __('Breadcrumb Hover Background Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_left_right',
	)));

	// Preloader
	$wp_customize->add_setting( 'custom_print_shop_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('custom_print_shop_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','custom-print-shop' ),
        'section' => 'custom_print_shop_left_right'
    ));

    $wp_customize->add_setting('custom_print_shop_preloader_type',array(
        'default'   => 'center-square',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control( 'custom_print_shop_preloader_type', array(
		'label' => __( 'Preloader Type','custom-print-shop' ),
		'section' => 'custom_print_shop_left_right',
		'type'  => 'select',
		'settings' => 'custom_print_shop_preloader_type',
		'choices' => array(
		    'center-square' => __('Center Square','custom-print-shop'),
		    'chasing-square' => __('Chasing Square','custom-print-shop'),
	    ),
	));

	$wp_customize->add_setting( 'custom_print_shop_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_preloader_color', array(
  		'label' => 'Preloader Color',
	    'section' => 'custom_print_shop_left_right',
	    'settings' => 'custom_print_shop_preloader_color',
  	)));

  	$wp_customize->add_setting( 'custom_print_shop_preloader_bg_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_preloader_bg_color', array(
  		'label' => 'Preloader Background Color',
	    'section' => 'custom_print_shop_left_right',
	    'settings' => 'custom_print_shop_preloader_bg_color',
  	)));

  	// Header Section
	$wp_customize->add_section('custom_print_shop_header',array(
		'title'	=> __('Header','custom-print-shop'),
		'priority'	=> null,
		'panel' => 'custom_print_shop_panel_id',
	));

	$wp_customize->add_setting('custom_print_shop_topbar_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('custom_print_shop_topbar_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide Topbar','custom-print-shop'),
	   'section' => 'custom_print_shop_header',
	));

    $wp_customize->add_setting('custom_print_shop_topbar_faqs_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('custom_print_shop_topbar_faqs_text',array(
		'label'	=> __('Add FAQs Text','custom-print-shop'),
		'section' => 'custom_print_shop_header',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('custom_print_shop_topbar_faqs_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('custom_print_shop_topbar_faqs_url',array(
		'label'	=> __('Add FAQs URL','custom-print-shop'),
		'section' => 'custom_print_shop_header',
		'type'	=> 'text'
	));

    $wp_customize->add_setting('custom_print_shop_topbar_contact_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('custom_print_shop_topbar_contact_text',array(
		'label'	=> __('Add Contact Text','custom-print-shop'),
		'section' => 'custom_print_shop_header',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('custom_print_shop_topbar_contact_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('custom_print_shop_topbar_contact_url',array(
		'label'	=> __('Add Contact URL','custom-print-shop'),
		'section' => 'custom_print_shop_header',
		'type'	=> 'text'
	));

    $wp_customize->add_setting('custom_print_shop_topbar_shipping_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('custom_print_shop_topbar_shipping_text',array(
		'label'	=> __('Add Shipping Text','custom-print-shop'),
		'section' => 'custom_print_shop_header',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('custom_print_shop_wishlist_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('custom_print_shop_wishlist_url',array(
		'label'	=> __('Add Wishlist URL','custom-print-shop'),
		'section' => 'custom_print_shop_header',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('custom_print_shop_navigation_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control('custom_print_shop_navigation_case',array(
        'type' => 'select',
        'label' => __('Navigation Case','custom-print-shop'),
        'section' => 'custom_print_shop_header',
        'choices' => array(
            'uppercase' => __('Uppercase','custom-print-shop'),
            'capitalize' => __('Capitalize','custom-print-shop'),
        ),
	) );

	$wp_customize->add_setting( 'custom_print_shop_nav_font_size', array(
		'default'           => 15,
		'sanitize_callback' => 'custom_print_shop_sanitize_float',
	) );
	$wp_customize->add_control( 'custom_print_shop_nav_font_size', array(
		'label' => __( 'Navigation Font Size','custom-print-shop' ),
		'section'     => 'custom_print_shop_header',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting('custom_print_shop_font_weight_menu_option',array(
        'default' => '500',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
    ));
    $wp_customize->add_control('custom_print_shop_font_weight_menu_option',array(
        'type' => 'select',
        'label' => __('Navigation Font Weight','custom-print-shop'),
        'section' => 'custom_print_shop_header',
        'choices' => array(
            '100' => __('100','custom-print-shop'),
            '200' => __('200','custom-print-shop'),
            '300' => __('300','custom-print-shop'),
            '400' => __('400','custom-print-shop'),
            '500' => __('500','custom-print-shop'),
            '600' => __('600','custom-print-shop'),
            '700' => __('700','custom-print-shop'),
            '800' => __('800','custom-print-shop'),
            '900' => __('900','custom-print-shop'),
        ),
	) );

	$wp_customize->add_setting('custom_print_shop_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_menu_color', array(
		'label'    => __('Menu Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_header',
		'settings' => 'custom_print_shop_menu_color',
	)));

	$wp_customize->add_setting('custom_print_shop_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_header',
		'settings' => 'custom_print_shop_menu_hover_color',
	)));

	$wp_customize->add_setting('custom_print_shop_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_header',
		'settings' => 'custom_print_shop_submenu_menu_color',
	)));

	$wp_customize->add_setting( 'custom_print_shop_submenu_hover_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'custom_print_shop_submenu_hover_color', array(
  		'label' => __('Submenu Hover Color', 'custom-print-shop'),
	    'section' => 'custom_print_shop_header',
	    'settings' => 'custom_print_shop_submenu_hover_color',
  	)));

  	$wp_customize->add_setting( 'custom_print_shop_menu_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_menu_settings_premium_features', array(
    	'type'=> 'hidden',
        'description' => "<h3>More Features in the Premium Version!</h3>
        	<ul>
        		<li>Menu Background Colors</li>
        		<li>Menu Item Fonts</li>
        		<li>Responsive Menu Colors</li>
        		<li>Header Search Icons Colors</li>
        		<li>... and Other Premium Features</li>
        	</ul>
        	<a target='_blank' href='". esc_url('https://www.themescaliber.com/themes/print-on-demand-wordpress-theme/') ." '>Upgrade Now</a>",
        'section' => 'custom_print_shop_header'
        )
    );

	//home page Banner
	$wp_customize->add_section( 'custom_print_shop_slidersettings' , array(
    	'title'      => __( 'Banner Settings', 'custom-print-shop' ),
		'priority'   => null,
		'panel' => 'custom_print_shop_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial(
		'custom_print_shop_slider_hide_show',
		array(
			'selector'        => '#banner h1',
			'render_callback' => 'custom_print_shop_customize_partial_custom_print_shop_slider_hide_show',
		)
	);

	$wp_customize->add_setting('custom_print_shop_slider_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('custom_print_shop_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide Banner','custom-print-shop'),
	   'section' => 'custom_print_shop_slidersettings',
	));

	$wp_customize->add_setting('custom_print_shop_banner_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'custom_print_shop_banner_image',array(
        'label' => __('Banner Background Image','custom-print-shop'),
        'description' => __('Image size (1400px x 750px)','custom-print-shop'),
        'section' => 'custom_print_shop_slidersettings'
	)));

 	$wp_customize->add_setting('custom_print_shop_designation_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('custom_print_shop_designation_text',array(
		'label'	=> __('Banner Small Text','custom-print-shop'),
		'section'	=> 'custom_print_shop_slidersettings',
		'type'		=> 'text',
	));

   $wp_customize->add_setting('custom_print_shop_tagline_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('custom_print_shop_tagline_title',array(
		'label'	=> __('Banner Title','custom-print-shop'),
		'section'	=> 'custom_print_shop_slidersettings',
		'type'		=> 'text'
	));

 	$wp_customize->add_setting('custom_print_shop_content_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('custom_print_shop_content_text',array(
		'label'	=> __('Banner Content Text','custom-print-shop'),
		'section'	=> 'custom_print_shop_slidersettings',
		'type'		=> 'text',
	));

	$wp_customize->add_setting('custom_print_shop_banner_button_label',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_banner_button_label',array(
		'label' => __('Button','custom-print-shop'),
		'section' => 'custom_print_shop_slidersettings',
		'setting' => 'custom_print_shop_banner_button_label',
		'type' => 'text'
	));
	$wp_customize->add_setting('custom_print_shop_top_button_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));

	$wp_customize->add_control('custom_print_shop_top_button_url',array(
		'label'	=> __('Add Button URL','custom-print-shop'),
		'section'	=> 'custom_print_shop_slidersettings',
		'setting'	=> 'custom_print_shop_top_button_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('custom_print_shop_show_hide_product',array(
       'default' => false,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('custom_print_shop_show_hide_product',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide Product','custom-print-shop'),
	   'section' => 'custom_print_shop_slidersettings',
	));
	
	$args = array(
       'type'      => 'product',
        'taxonomy' => 'product_cat'
    );
	$categories = get_categories($args);
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('custom_print_shop_product_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'custom_print_shop_sanitize_choices',
	));
	$wp_customize->add_control('custom_print_shop_product_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Banner Product Category','custom-print-shop'),
		'section' => 'custom_print_shop_slidersettings',
	));

	$wp_customize->add_setting('custom_print_shop_product_banner_button_label',array(
		'default' => 'Buy Now',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('custom_print_shop_product_banner_button_label',array(
		'label' => __('Product Button','custom-print-shop'),
		'section' => 'custom_print_shop_slidersettings',
		'setting' => 'custom_print_shop_product_banner_button_label',
		'type' => 'text'
	));

	//Featured Product Section
	$wp_customize->add_section('custom_print_shop_featured_tour_section',array(
		'title'	=> __('Featured Product Section','custom-print-shop'),
		'panel' => 'custom_print_shop_panel_id',
	));

	$wp_customize->add_setting('custom_print_shop_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('custom_print_shop_section_title',array(
		'label'	=> esc_html__('Section Title','custom-print-shop'),
		'section'=> 'custom_print_shop_featured_tour_section',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('custom_print_shop_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('custom_print_shop_section_text',array(
		'label'	=> esc_html__('Section Small Content','custom-print-shop'),
		'section'=> 'custom_print_shop_featured_tour_section',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('custom_print_shop_featured_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('custom_print_shop_featured_number',array(
		'label'	=> esc_html__('No of Tabs to show','custom-print-shop'),
		'description' => __('Publish and Refresh the page after select the number of tab','custom-print-shop'),
		'section'=> 'custom_print_shop_featured_tour_section',
		'type'=> 'number'
	));	

	$custom_print_shop_category_post = get_theme_mod('custom_print_shop_featured_number','');
    for ( $custom_print_shop_j = 1; $custom_print_shop_j <= $custom_print_shop_category_post; $custom_print_shop_j++ ) {
		$wp_customize->add_setting('custom_print_shop_featured_text'.$custom_print_shop_j,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('custom_print_shop_featured_text'.$custom_print_shop_j,array(
			'label'	=> esc_html__('Tab ','custom-print-shop').$custom_print_shop_j,
			'section'=> 'custom_print_shop_featured_tour_section',
			'type'=> 'text'
		));

	        $args = array(
	       	'type'             => 'product',
	        'child_of'        => 0,
	        'parent'          => '',
	        'orderby'         => 'term_group',
	        'order'           => 'ASC',
	        'hide_empty'      => false,
	        'hierarchical'    => 1,
	        'number'          => '',
	        'taxonomy'        => 'product_cat',
	        'pad_counts'      => false
    	);

        $categories = get_categories($args);
        $cats = array();
        $custom_print_shop_i = 0;
        $cat_post[]= 'select';
        foreach($categories as $category){
            if($custom_print_shop_i==0){
                    $default = $category->slug;
                    $custom_print_shop_i++;
            }
            $cat_post[$category->slug] = $category->name;
        }

        $wp_customize->add_setting('custom_print_shop_product_category'.$custom_print_shop_j,array(
            'default'       => 'select',
            'sanitize_callback' => 'custom_print_shop_sanitize_choices',
        ));     
        $wp_customize->add_control('custom_print_shop_product_category'.$custom_print_shop_j,array(
            'type'    => 'select',
            'choices' => $cat_post,
            'label' => __('Select Category to display products','custom-print-shop'),
            'section' => 'custom_print_shop_featured_tour_section',
        ));
	}

	$wp_customize->add_setting( 'custom_print_shop_featured_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_featured_settings_premium_features', array(
    	'type'=> 'hidden',
        'description' => "<h3>More Features in the Premium Version!</h3>
        	<ul>
        		<li>Section Background Image Option</li>
        		<li>Choose Tab Icon Options</li>
        		<li>... and Other Premium Features</li>
        	</ul>
        	<a target='_blank' href='". esc_url('https://www.themescaliber.com/themes/print-on-demand-wordpress-theme/') ." '>Upgrade Now</a>",
        'section' => 'custom_print_shop_featured_tour_section'
        )
    );

	//Blog Post
	$wp_customize->add_section('custom_print_shop_blog_post',array(
		'title'	=> __('Post Settings','custom-print-shop'),
		'panel' => 'custom_print_shop_panel_id',
	));	

	$wp_customize->add_setting('custom_print_shop_blog_post_alignment',array(
        'default' => 'left',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
    ));
	$wp_customize->add_control('custom_print_shop_blog_post_alignment', array(
        'type' => 'select',
        'label' => __( 'Blog Post Alignment', 'custom-print-shop' ),
        'section' => 'custom_print_shop_blog_post',
        'choices' => array(
            'left' => __('Left Align','custom-print-shop'),
            'right' => __('Right Align','custom-print-shop'),
            'center' => __('Center Align','custom-print-shop')
        ),
    ));

	$wp_customize->add_setting('custom_print_shop_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','custom-print-shop'),
       'section' => 'custom_print_shop_blog_post'
    ));

    $wp_customize->add_setting('custom_print_shop_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize,'custom_print_shop_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','custom-print-shop'),
		'transport' => 'refresh',
		'section'	=> 'custom_print_shop_blog_post',
		'setting'	=> 'custom_print_shop_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('custom_print_shop_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','custom-print-shop'),
       'section' => 'custom_print_shop_blog_post'
    ));

    $wp_customize->add_setting('custom_print_shop_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize,'custom_print_shop_author_icon',array(
		'label'	=> __('Add Post Author Icon','custom-print-shop'),
		'transport' => 'refresh',
		'section'	=> 'custom_print_shop_blog_post',
		'setting'	=> 'custom_print_shop_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('custom_print_shop_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','custom-print-shop'),
       'section' => 'custom_print_shop_blog_post'
    ));

    $wp_customize->add_setting('custom_print_shop_comment_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize,'custom_print_shop_comment_icon',array(
		'label'	=> __('Add Post Comment Icon','custom-print-shop'),
		'transport' => 'refresh',
		'section'	=> 'custom_print_shop_blog_post',
		'setting'	=> 'custom_print_shop_comment_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('custom_print_shop_time_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Time','custom-print-shop'),
       'section' => 'custom_print_shop_blog_post'
    ));

    $wp_customize->add_setting('custom_print_shop_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize,'custom_print_shop_time_icon',array(
		'label'	=> __('Add Post Time Icon','custom-print-shop'),
		'transport' => 'refresh',
		'section'	=> 'custom_print_shop_blog_post',
		'setting'	=> 'custom_print_shop_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('custom_print_shop_feature_image_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_feature_image_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured Image','custom-print-shop'),
       'section' => 'custom_print_shop_blog_post'
    ));

    $wp_customize->add_setting('custom_print_shop_show_hide_post_categories',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_show_hide_post_categories',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post category','custom-print-shop'),
       'section' => 'custom_print_shop_blog_post'
    ));

    $wp_customize->add_setting( 'custom_print_shop_featured_image_border_radius', array(
		'default' => 0,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'custom_print_shop_featured_image_border_radius', array(
		'label' => __( 'Featured image border radius','custom-print-shop' ),
		'section' => 'custom_print_shop_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting( 'custom_print_shop_featured_image_box_shadow', array(
		'default' => 0,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'custom_print_shop_featured_image_box_shadow', array(
		'label' => __( 'Featured image box shadow','custom-print-shop' ),
		'section' => 'custom_print_shop_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

	$wp_customize->add_setting('custom_print_shop_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','custom-print-shop'),
       'description' => __('Ex: "/", "|", "-", ...','custom-print-shop'),
       'section' => 'custom_print_shop_blog_post'
    ));

    $wp_customize->add_setting('custom_print_shop_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control('custom_print_shop_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','custom-print-shop'),
        'section' => 'custom_print_shop_blog_post',
        'choices' => array(
            'No Content' => __('No Content','custom-print-shop'),
            'Full Content' => __('Full Content','custom-print-shop'),
            'Excerpt Content' => __('Excerpt Content','custom-print-shop'),
        ),
	) );

    $wp_customize->add_setting( 'custom_print_shop_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'custom_print_shop_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','custom-print-shop' ),
		'section'  => 'custom_print_shop_blog_post',
		'type'  => 'number',
		'settings' => 'custom_print_shop_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'custom_print_shop_button_excerpt_suffix', array(
		'default'   => __('[...]','custom-print-shop' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'custom_print_shop_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','custom-print-shop' ),
		'section'     => 'custom_print_shop_blog_post',
		'type'        => 'text',
		'settings' => 'custom_print_shop_button_excerpt_suffix'
	) );

	$wp_customize->add_setting( 'custom_print_shop_post_button_text', array(
		'default'   => esc_html__('Read More','custom-print-shop' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'custom_print_shop_post_button_text', array(
		'label' => esc_html__('Post Button Text','custom-print-shop' ),
		'section'     => 'custom_print_shop_blog_post',
		'type'        => 'text',
		'settings'    => 'custom_print_shop_post_button_text'
	) );

	$wp_customize->add_setting('custom_print_shop_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','custom-print-shop'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'custom_print_shop_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting('custom_print_shop_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','custom-print-shop'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'custom_print_shop_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'custom_print_shop_button_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float'
	) );
	$wp_customize->add_control('custom_print_shop_button_border_radius', array(
        'label'  => __('Button Border Radius','custom-print-shop'),
        'type'=> 'number',
        'section'  => 'custom_print_shop_blog_post',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));

    $wp_customize->add_setting( 'custom_print_shop_post_blocks', array(
        'default'			=> 'Without box',
        'sanitize_callback'	=> 'custom_print_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'custom_print_shop_post_blocks', array(
        'section' => 'custom_print_shop_blog_post',
        'type' => 'select',
        'label' => __( 'Post blocks', 'custom-print-shop' ),
        'choices' => array(
            'Within box'  => __( 'Within box', 'custom-print-shop' ),
            'Without box' => __( 'Without box', 'custom-print-shop' ),
    )));

    $wp_customize->add_setting('custom_print_shop_navigation_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_navigation_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Navigation','custom-print-shop'),
       'section' => 'custom_print_shop_blog_post'
    ));

    $wp_customize->add_setting( 'custom_print_shop_post_navigation_type', array(
        'default'			=> 'numbers',
        'sanitize_callback'	=> 'custom_print_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'custom_print_shop_post_navigation_type', array(
        'section' => 'custom_print_shop_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Type', 'custom-print-shop' ),
        'choices' => array(
            'numbers'  => __( 'Number', 'custom-print-shop' ),
            'next-prev' => __( 'Next/Prev Button', 'custom-print-shop' ),
    )));

    $wp_customize->add_setting( 'custom_print_shop_post_navigation_position', array(
        'default'			=> 'bottom',
        'sanitize_callback'	=> 'custom_print_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'custom_print_shop_post_navigation_position', array(
        'section' => 'custom_print_shop_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Position', 'custom-print-shop' ),
        'choices' => array(
            'top'  => __( 'Top', 'custom-print-shop' ),
            'bottom' => __( 'Bottom', 'custom-print-shop' ),
            'both' => __( 'Both', 'custom-print-shop' ),
    )));

    $wp_customize->add_setting( 'custom_print_shop_post_settings_premium_features',array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_post_settings_premium_features', array(
    	'type'=> 'hidden',
        'description' => "<h3>More Features in the Premium Version!</h3>
        	<ul>
        		<li>Section Heading Option</li>
        		<li>Animated Elements Colors</li>
        		<li>... and Other Premium Features</li>
        	</ul>
        	<a target='_blank' href='". esc_url('https://www.themescaliber.com/themes/print-on-demand-wordpress-theme/') ." '>Upgrade Now</a>",
        'section' => 'custom_print_shop_blog_post'
        )
    );

    //Single Post Settings
	$wp_customize->add_section('custom_print_shop_single_post',array(
		'title'	=> __('Single Post Settings','custom-print-shop'),
		'panel' => 'custom_print_shop_panel_id',
	));	

	$wp_customize->add_setting( 'custom_print_shop_single_post_breadcrumb',array(
		'default' => true,
		'transport' => 'refresh',
      	'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('custom_print_shop_single_post_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Post Breadcrumb','custom-print-shop' ),
        'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize,'custom_print_shop_single_postdate_icon',array(
		'label'	=> __('Add Sigle Post Date Icon','custom-print-shop'),
		'transport' => 'refresh',
		'section'	=> 'custom_print_shop_single_post',
		'setting'	=> 'custom_print_shop_single_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('custom_print_shop_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

   	$wp_customize->add_setting('custom_print_shop_single_postauthor_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize,'custom_print_shop_single_postauthor_icon',array(
		'label'	=> __('Add Sigle Post Author Icon','custom-print-shop'),
		'transport' => 'refresh',
		'section'	=> 'custom_print_shop_single_post',
		'setting'	=> 'custom_print_shop_single_postauthor_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('custom_print_shop_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_single_postcomment_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize,'custom_print_shop_single_postcomment_icon',array(
		'label'	=> __('Add Sigle Post Comment Icon','custom-print-shop'),
		'transport' => 'refresh',
		'section'	=> 'custom_print_shop_single_post',
		'setting'	=> 'custom_print_shop_single_postcomment_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('custom_print_shop_single_post_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_single_posttime_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize,'custom_print_shop_single_posttime_icon',array(
		'label'	=> __('Add Sigle Post Time Icon','custom-print-shop'),
		'transport' => 'refresh',
		'section'	=> 'custom_print_shop_single_post',
		'setting'	=> 'custom_print_shop_single_posttime_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('custom_print_shop_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_feature_image',array(
       'type' => 'checkbox',
       'label' => __(' Show / Hide Single Post Image','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting( 'custom_print_shop_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float',
	) );
	$wp_customize->add_control( 'custom_print_shop_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','custom-print-shop' ),
		'section'     => 'custom_print_shop_single_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'custom_print_shop_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'custom_print_shop_sanitize_float',
	));
	$wp_customize->add_control('custom_print_shop_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','custom-print-shop' ),
		'section' => 'custom_print_shop_single_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('custom_print_shop_single_post_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_single_post_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','custom-print-shop'),
       'description' => __('Ex: "/", "|", "-", ...','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

     $wp_customize->add_setting('custom_print_shop_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
 	));
 	$wp_customize->add_control('custom_print_shop_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Categories','custom-print-shop'),
		'section' => 'custom_print_shop_single_post'
	));

	$wp_customize->add_setting('custom_print_shop_category_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_category_color', array(
		'label'    => __('Category Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_single_post',
	)));

	$wp_customize->add_setting('custom_print_shop_category_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_category_background_color', array(
		'label'    => __('Category Background Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_single_post',
	)));

    $wp_customize->add_setting('custom_print_shop_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    
    $wp_customize->add_setting( 'custom_print_shop_comment_width', array(
		'default' => 100,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'custom_print_shop_comment_width', array(
		'label' => __( 'Comment Textarea Width', 'custom-print-shop'),
		'section' => 'custom_print_shop_single_post',
		'type' => 'number',
		'settings' => 'custom_print_shop_comment_width',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    $wp_customize->add_setting('custom_print_shop_comment_title',array(
       'default' => __('Leave a Reply','custom-print-shop'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_comment_submit_text',array(
       'default' => __('Post Comment','custom-print-shop'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Button Text','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting('custom_print_shop_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','custom-print-shop'),
       'section' => 'custom_print_shop_single_post'
    ));

    $wp_customize->add_setting( 'custom_print_shop_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float'
	) );
	$wp_customize->add_control( 'custom_print_shop_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','custom-print-shop' ),
		'section' => 'custom_print_shop_single_post',
		'type' => 'number',
		'settings' => 'custom_print_shop_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'custom_print_shop_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'custom_print_shop_sanitize_choices'
    ));
    $wp_customize->add_control( 'custom_print_shop_post_order', array(
        'section' => 'custom_print_shop_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'custom-print-shop' ),
        'choices' => array(
            'categories' => __('Categories', 'custom-print-shop'),
            'tags' => __( 'Tags', 'custom-print-shop' ),
    )));

    //404 page settings
	$wp_customize->add_section('custom_print_shop_404_page',array(
		'title'	=> __('404 & No Result Page Settings','custom-print-shop'),
		'priority'	=> null,
		'panel' => 'custom_print_shop_panel_id',
	));

	$wp_customize->add_setting('custom_print_shop_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','custom-print-shop'),
       'section' => 'custom_print_shop_404_page'
    ));

    $wp_customize->add_setting('custom_print_shop_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','custom-print-shop'),
       'section' => 'custom_print_shop_404_page'
    ));

    $wp_customize->add_setting('custom_print_shop_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','custom-print-shop'),
       'section' => 'custom_print_shop_404_page'
    ));

    $wp_customize->add_setting('custom_print_shop_no_result_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_no_result_title',array(
       'type' => 'text',
       'label' => __('No Result Page Title','custom-print-shop'),
       'section' => 'custom_print_shop_404_page'
    ));

    $wp_customize->add_setting('custom_print_shop_no_result_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_no_result_text',array(
       'type' => 'text',
       'label' => __('No Result Page Text','custom-print-shop'),
       'section' => 'custom_print_shop_404_page'
    ));

    $wp_customize->add_setting('custom_print_shop_show_search_form',array(
        'default' => true,
        'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('custom_print_shop_show_search_form',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Search Form','custom-print-shop'),
      	'section' => 'custom_print_shop_404_page',
	));

	//Footer
	$wp_customize->add_section('custom_print_shop_footer_section',array(
		'title'	=> __('Footer Section','custom-print-shop'),
		'priority'	=> null,
		'panel' => 'custom_print_shop_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'custom_print_shop_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'custom_print_shop_customize_partial_custom_print_shop_show_back_to_top',
		)
	);

	$wp_customize->add_setting('custom_print_shop_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('custom_print_shop_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','custom-print-shop'),
      	'section' => 'custom_print_shop_footer_section',
	));

	$wp_customize->add_setting('custom_print_shop_back_to_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize, 'custom_print_shop_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','custom-print-shop'),
		'section'	=> 'custom_print_shop_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('custom_print_shop_scroll_icon_font_size',array(
		'default'=> 18,
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','custom-print-shop'),
		'section'=> 'custom_print_shop_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	$wp_customize->add_setting('custom_print_shop_scroll_icon_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_scroll_icon_color', array(
		'label'    => __('Back To Top Icon Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_footer_section',
	)));

	$wp_customize->add_setting('custom_print_shop_back_to_top_text',array(
		'default'	=> __('Back to Top','custom-print-shop'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('custom_print_shop_back_to_top_text',array(
		'label'	=> __('Back to Top Button Text','custom-print-shop'),
		'section'	=> 'custom_print_shop_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('custom_print_shop_back_to_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control('custom_print_shop_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','custom-print-shop'),
        'section' => 'custom_print_shop_footer_section',
        'choices' => array(
            'Left' => __('Left','custom-print-shop'),
            'Right' => __('Right','custom-print-shop'),
            'Center' => __('Center','custom-print-shop'),
        ),
	) );

	$wp_customize->add_setting( 'custom_print_shop_footer_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_footer_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Footer','custom-print-shop' ),
      'section' => 'custom_print_shop_footer_section'
    ));

	$wp_customize->add_setting('custom_print_shop_footer_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_footer_background_color', array(
		'label'    => __('Footer Background Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_footer_section',
	)));

	$wp_customize->add_setting('custom_print_shop_footer_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'custom_print_shop_footer_background_img',array(
        'label' => __('Footer Background Image','custom-print-shop'),
        'section' => 'custom_print_shop_footer_section'
	)));

	$wp_customize->add_setting('custom_print_shop_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices',
    ));
    $wp_customize->add_control('custom_print_shop_footer_widget_layout',array(
        'type' => 'radio',
        'label'  => __('Footer widget layout', 'custom-print-shop'),
        'section'     => 'custom_print_shop_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'custom-print-shop'),
        'choices' => array(
            '1'     => __('One', 'custom-print-shop'),
            '2'     => __('Two', 'custom-print-shop'),
            '3'     => __('Three', 'custom-print-shop'),
            '4'     => __('Four', 'custom-print-shop')
        ),
    ));

    $wp_customize->add_setting('custom_print_shop_widgets_heading_fontsize',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float',
	));	
	$wp_customize->add_control('custom_print_shop_widgets_heading_fontsize',array(
		'label'	=> __('Footer Widgets Heading Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('custom_print_shop_widgets_heading_font_weight',array(
        'default' => '',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
    ));
    $wp_customize->add_control('custom_print_shop_widgets_heading_font_weight',array(
        'type' => 'select',
        'label' => __('Footer Widgets Heading Font Weight','custom-print-shop'),
        'section' => 'custom_print_shop_footer_section',
        'choices' => array(
            '100' => __('100','custom-print-shop'),
            '200' => __('200','custom-print-shop'),
            '300' => __('300','custom-print-shop'),
            '400' => __('400','custom-print-shop'),
            '500' => __('500','custom-print-shop'),
            '600' => __('600','custom-print-shop'),
            '700' => __('700','custom-print-shop'),
            '800' => __('800','custom-print-shop'),
            '900' => __('900','custom-print-shop'),
        ),
	) );

    $wp_customize->add_setting('custom_print_shop_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control('custom_print_shop_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading Alignment','custom-print-shop'),
    'section' => 'custom_print_shop_footer_section',
    'choices' => array(
    	'Left' => __('Left','custom-print-shop'),
        'Center' => __('Center','custom-print-shop'),
        'Right' => __('Right','custom-print-shop')
      ),
	) );

	$wp_customize->add_setting('custom_print_shop_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control('custom_print_shop_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content Alignment','custom-print-shop'),
    'section' => 'custom_print_shop_footer_section',
    'choices' => array(
    	'Left' => __('Left','custom-print-shop'),
        'Center' => __('Center','custom-print-shop'),
        'Right' => __('Right','custom-print-shop')
        ),
	) );

    $wp_customize->add_setting( 'custom_print_shop_copyright_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_copyright_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Copyright','custom-print-shop' ),
      'section' => 'custom_print_shop_footer_section'
    ));

    $wp_customize->add_setting('custom_print_shop_copyright_alignment',array(
        'default' => 'Center',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control('custom_print_shop_copyright_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Alignment','custom-print-shop'),
        'section' => 'custom_print_shop_footer_section',
        'choices' => array(
            'Left' => __('Left','custom-print-shop'),
            'Right' => __('Right','custom-print-shop'),
            'Center' => __('Center','custom-print-shop'),
        ),
	) );

	$wp_customize->add_setting('custom_print_shop_copyright_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_copyright_color', array(
		'label'    => __('Copyright Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_footer_section',
	)));

	$wp_customize->add_setting('custom_print_shop_copyright__hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_copyright__hover_color', array(
		'label'    => __('Copyright Hover Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_footer_section',
	)));

	$wp_customize->add_setting('custom_print_shop_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'custom_print_shop_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'custom-print-shop'),
		'section'  => 'custom_print_shop_footer_section',
	)));

	$wp_customize->add_setting('custom_print_shop_copyright_fontsize',array(
		'default'	=> 16,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float',
	));	
	$wp_customize->add_control('custom_print_shop_copyright_fontsize',array(
		'label'	=> __('Copyright Font Size','custom-print-shop'),
		'section'	=> 'custom_print_shop_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('custom_print_shop_copyright_top_bottom_padding',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float',
	));	
	$wp_customize->add_control('custom_print_shop_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top Bottom Padding','custom-print-shop'),
		'section'	=> 'custom_print_shop_footer_section',
		'type'		=> 'number'
	));

    $wp_customize->selective_refresh->add_partial(
		'custom_print_shop_footer_copy',
		array(
			'selector'        => '#footer p',
			'render_callback' => 'custom_print_shop_customize_partial_custom_print_shop_footer_copy',
		)
	);
	
	$wp_customize->add_setting('custom_print_shop_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('custom_print_shop_footer_copy',array(
		'label'	=> __('Copyright Text','custom-print-shop'),
		'section'	=> 'custom_print_shop_footer_section',
		'type'		=> 'text'
	));

	//Mobile Media Section
	$wp_customize->add_section( 'custom_print_shop_mobile_media_options' , array(
    	'title'      => __( 'Mobile Media Options', 'custom-print-shop' ),
		'priority'   => null,
		'panel' => 'custom_print_shop_panel_id'
	) );

	$wp_customize->add_setting('custom_print_shop_responsive_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize, 'custom_print_shop_responsive_open_menu_icon',array(
		'label'	=> __('Open Menu Icon','custom-print-shop'),
		'section'	=> 'custom_print_shop_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('custom_print_shop_open_menu_label',array(
       'default' => __('Open Menu','custom-print-shop'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_open_menu_label',array(
       'type' => 'text',
       'label' => __('Open Menu Label','custom-print-shop'),
       'section' => 'custom_print_shop_mobile_media_options'
    ));

	$wp_customize->add_setting('custom_print_shop_responsive_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Custom_Print_Shop_Icon_Changer(
        $wp_customize, 'custom_print_shop_responsive_close_menu_icon',array(
		'label'	=> __('Close Menu Icon','custom-print-shop'),
		'section'	=> 'custom_print_shop_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('custom_print_shop_close_menu_label',array(
       'default' => __('Close Menu','custom-print-shop'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('custom_print_shop_close_menu_label',array(
       'type' => 'text',
       'label' => __('Close Menu Label','custom-print-shop'),
       'section' => 'custom_print_shop_mobile_media_options'
    ));

    $wp_customize->add_setting('custom_print_shop_responsive_show_back_to_top',array(
        'default' => true,
        'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('custom_print_shop_responsive_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back to Top Button','custom-print-shop'),
      	'section' => 'custom_print_shop_mobile_media_options',
	));

	$wp_customize->add_setting( 'custom_print_shop_responsive_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('custom_print_shop_responsive_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','custom-print-shop' ),
        'section' => 'custom_print_shop_mobile_media_options'
    ));

    $wp_customize->add_setting( 'custom_print_shop_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Sidebar','custom-print-shop' ),
      'section' => 'custom_print_shop_mobile_media_options'
    ));

    $wp_customize->add_setting('custom_print_shop_hide_topbar_responsive',array(
		'default' => true,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('custom_print_shop_hide_topbar_responsive',array(
     	'type' => 'checkbox',
		'label' => __('Show / Hide Top Header','custom-print-shop'),
		'section' => 'custom_print_shop_mobile_media_options',
	));

	$wp_customize->add_setting('custom_print_shop_slider_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
	));
	$wp_customize->add_control('custom_print_shop_slider_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Banner','custom-print-shop'),
      	'section' => 'custom_print_shop_mobile_media_options',
	));

	//Woocommerce Section
	$wp_customize->add_section( 'custom_print_shop_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'custom-print-shop' ),
		'priority'   => null,
		'panel' => 'custom_print_shop_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'custom_print_shop_products_per_row' , array(
		'default'           => '3',
		'sanitize_callback' => 'custom_print_shop_sanitize_choices',
	) );

	$wp_customize->add_control('custom_print_shop_products_per_row', array(
		'label' => __( 'Product per row', 'custom-print-shop' ),
		'section'  => 'custom_print_shop_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('custom_print_shop_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'custom_print_shop_sanitize_float'
	));	
	$wp_customize->add_control('custom_print_shop_product_per_page',array(
		'label'	=> __('Product per page','custom-print-shop'),
		'section'	=> 'custom_print_shop_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('custom_print_shop_shop_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','custom-print-shop'),
       'section' => 'custom_print_shop_woocommerce_options',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('custom_print_shop_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'custom_print_shop_sanitize_choices',
	));
	$wp_customize->add_control('custom_print_shop_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page layout', 'custom-print-shop'),
		'section'        => 'custom_print_shop_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'custom-print-shop'),
			'Right Sidebar' => __('Right Sidebar', 'custom-print-shop'),
		),
	));

	// single product page sidebar
	$wp_customize->add_setting( 'custom_print_shop_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ) );
    $wp_customize->add_control('custom_print_shop_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Enable / Disable Single Product Page Sidebar','custom-print-shop'),
		'section' => 'custom_print_shop_woocommerce_options'
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('custom_print_shop_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'custom_print_shop_sanitize_choices',
	));
	$wp_customize->add_control('custom_print_shop_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page layout', 'custom-print-shop'),
		'section'        => 'custom_print_shop_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'custom-print-shop'),
			'Right Sidebar' => __('Right Sidebar', 'custom-print-shop'),
		),
	));

	$wp_customize->add_setting('custom_print_shop_shop_page_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_shop_page_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page pagination','custom-print-shop'),
       'section' => 'custom_print_shop_woocommerce_options',
    ));

    $wp_customize->add_setting('custom_print_shop_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','custom-print-shop'),
       'section' => 'custom_print_shop_woocommerce_options',
    ));

    $wp_customize->add_setting('custom_print_shop_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','custom-print-shop'),
       'section' => 'custom_print_shop_woocommerce_options',
    ));

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control( 'custom_print_shop_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('custom_print_shop_woocommerce_product_border',array(
       'default' => false,
       'sanitize_callback'	=> 'custom_print_shop_sanitize_checkbox'
    ));
    $wp_customize->add_control('custom_print_shop_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','custom-print-shop'),
       'section' => 'custom_print_shop_woocommerce_options',
    ));

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_product_padding_top',array(
		'default' => 0,
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_product_padding_right',array(
		'default' => 0,
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_product_box_shadow',array(
		'default' => 0,
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control( 'custom_print_shop_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('custom_print_shop_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'custom_print_shop_sanitize_choices'
	));
	$wp_customize->add_control('custom_print_shop_sale_position',array(
        'type' => 'select',
        'label' => __('Sale badge Position','custom-print-shop'),
        'section' => 'custom_print_shop_woocommerce_options',
        'choices' => array(
            'left' => __('Left','custom-print-shop'),
            'right' => __('Right','custom-print-shop'),
        ),
	) );

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_sale_top_padding',array(
		'default' => 5,
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control( 'custom_print_shop_woocommerce_sale_top_padding',	array(
		'label' => esc_html__( 'Sale Top Bottom Padding','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_sale_left_padding',array(
	 	'default' => 0,
	 	'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_woocommerce_sale_left_padding',	array(
	 	'label' => esc_html__( 'Sale Right Left Padding','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'custom_print_shop_woocommerce_sale_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_woocommerce_sale_border_radius',array(
		'label' => esc_html__( 'Sale Border Radius','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'custom_print_shop_product_sale_font_size',array(
		'default' => '',
		'sanitize_callback' => 'custom_print_shop_sanitize_float'
	));
	$wp_customize->add_control('custom_print_shop_product_sale_font_size',array(
		'label' => esc_html__( 'Sale Font Size','custom-print-shop' ),
		'type' => 'number',
		'section' => 'custom_print_shop_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));
}
add_action( 'customize_register', 'custom_print_shop_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Custom_Print_Shop_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );
		
		// Register custom section types.
		$manager->register_section_type( 'Custom_Print_Shop_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Custom_Print_Shop_Customize_Section_Pro(
				$manager,
				'custom_print_shop_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Custom Print Shop Pro', 'custom-print-shop' ),
					'pro_text' => esc_html__( 'Get Pro','custom-print-shop' ),
					'pro_url'  => esc_url( 'https://www.themescaliber.com/themes/print-on-demand-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'custom-print-shop-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'custom-print-shop-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Custom_Print_Shop_Customize::get_instance();