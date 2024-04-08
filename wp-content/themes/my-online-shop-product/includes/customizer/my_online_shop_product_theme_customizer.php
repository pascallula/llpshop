<?php
/**
 * My Online Shop Product register Theme Customizer
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

/*--------------------- Add Information to Home Page----------------------*/

 if(!class_exists('My_Online_Shop_Product_Theme_Setting_Customizer')){

    class My_Online_Shop_Product_Theme_Setting_Customizer{

        public function __construct()
        {
            add_action( 'customize_register', [$this, "my_online_shop_product_my_customize_register"] );
            add_action( 'customize_register', [$this, "my_online_shop_product_my_customize_register_global"] );    
            add_action( 'customize_register', [$this, "my_online_shop_product_my_customize_register_top_bar"] );
            add_action( 'customize_register', [$this, "my_online_shop_product_my_customize_register_nav_bar"] );
            add_action( 'customize_register', [$this, "my_online_shop_product_my_customize_register_custom_header_information"] );     
            add_action( 'customize_register', [$this, "my_online_shop_product_my_customize_register_slider"] );
            add_action( 'customize_register', [$this, "my_online_shop_product_my_customize_register_template_configuration"] ); 
            add_action( 'customize_register', [$this, "my_online_shop_product_my_customize_register_home_template"] ); 
            add_action( 'customize_register', [$this, "my_online_shop_product_my_customize_register_footer"] );  
        }

        public function my_online_shop_product_my_customize_register($wp_customize)
        {
            $wp_customize->register_control_type( 'My_Online_Shop_Product_Toggle_Button_Control' );
            
             //Theme Setting Panel to Customizer
             $wp_customize->add_panel('my_online_shop_product_theme_setting_panel_id', array(
                'title'         => esc_html__("My Online Shop Product", "my-online-shop-product"),
                'description'   => esc_html__( 'This field use to add global information to theme', "my-online-shop-product"),
                'priority'      => 240,
            ));
        }

        public function my_online_shop_product_my_customize_register_global($wp_customize)
        {
            //Theme Setting Global Section
              $wp_customize->add_section( 'my_online_shop_product_global_section_id', array(
                'title'         =>esc_html__('Add Theme Global Info', "my-online-shop-product"),
                'description'   =>esc_html__('Add Theme Global setting informations', "my-online-shop-product"),
                'panel'         =>'my_online_shop_product_theme_setting_panel_id',
                'priority'      => 90,
            ) );

            //Theme Read More Text
                $wp_customize->add_setting( 'my_online_shop_product_global_read_more_btn_text_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 'my_online_shop_product_global_read_more_btn_text_id', array(
                    'type'          => 'text',
                    'priority'      => 10,
                    'section'       => 'my_online_shop_product_global_section_id',
                    'label'         => esc_html__("Add Read More Btn Text", "my-online-shop-product"),
                ) );

            //Theme Setting SideBar Background Color 
                $wp_customize->add_setting( 'my_online_shop_product_side_bar_bg_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#f2f1ed',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_side_bar_bg_color_setting_id', array(
                    'label'         => esc_html__('Add SideBar Background Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'      => 20,
                ) ) );

            //Section Title Text Color
                $wp_customize->add_setting( 'my_online_shop_product_section_title_text_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#0000ff',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_section_title_text_color_setting_id', array(
                    'label'         => esc_html__('Change Section Title Text Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'      => 30,
                ) ) );

            //Title Text Color
                $wp_customize->add_setting( 'my_online_shop_product_title_text_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#81d742',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_title_text_color_setting_id', array(
                    'label'         => esc_html__('Change Title Text Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'      => 40,
                ) ) );

            //Sub Title Text Color
                $wp_customize->add_setting( 'my_online_shop_product_sub_title_text_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#dd3333',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_sub_title_text_color_setting_id', array(
                    'label'         => esc_html__('Change Sub Title Text Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'      => 50,
                ) ) );

            //Link Text Color
                $wp_customize->add_setting( 'my_online_shop_product_link_text_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#1e73be',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_link_text_color_setting_id', array(
                    'label'         => esc_html__('Change Link Text Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'      => 55,
                ) ) );   
    
            //Normal Text Color
                $wp_customize->add_setting( 'my_online_shop_product_normal_text_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#111111',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_normal_text_color_setting_id', array(
                    'label'         => esc_html__('Change Text Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'      => 60,
                ) ) );   

            //Card Background Color
                $wp_customize->add_setting( 'my_online_shop_product_card_background_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#ffffff',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_card_background_color_setting_id', array(
                    'label'         => esc_html__('Change Product Card Background Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'      => 70,
                ) ) );

            //Section Background Color
               $wp_customize->add_setting( 'my_online_shop_product_section_background_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#f3f3f3',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
    
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_section_background_color_setting_id', array(
                    'label'         => esc_html__('Change Section Background Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'      => 90,
                ) ) );

            //Theme Setting Button Text Color 
                $wp_customize->add_setting( 'my_online_shop_product_button_text_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#a9e37c',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_button_text_color_setting_id', array(
                    'label'         => esc_html__('Change Button Text Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'      => 100,
                ) ) );

            //Theme Setting Button Background Color
                $wp_customize->add_setting( 'my_online_shop_product_button_background_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#ffffff',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_button_background_color_setting_id', array(
                    'label'     => esc_html__('Change Button Background Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'  => 110,
                ) ) );

             //Theme Setting Hover Effect Color
                $wp_customize->add_setting( 'my_online_shop_product_hover_effect_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#63c6d4',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_hover_effect_color_setting_id', array(
                    'label'     => esc_html__('Setting Hover Effect Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'  => 120,
                ) ) );

            //Theme Setting Active Effect Color
                $wp_customize->add_setting( 'my_online_shop_product_active_effect_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#44bbff',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
        
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_active_effect_color_setting_id', array(
                    'label'     => esc_html__('Setting Active Effect Color', "my-online-shop-product" ),
                    'section'       => 'my_online_shop_product_global_section_id',
                    'priority'  => 130,
                ) ) );

        }

        public function my_online_shop_product_my_customize_register_top_bar($wp_customize)
        {
            //Theme Setting Top Bar Section
                $wp_customize->add_section( 'my_online_shop_product_top_bar_section_id', array(
                    'title'         =>esc_html__('Add Info to Top Bar', "my-online-shop-product"),
                    'description'   =>esc_html__('Add your phone number, social media link to TopBar', "my-online-shop-product"),
                    'panel'         =>'my_online_shop_product_theme_setting_panel_id',
                    'priority'      => 5,
                ) );

            //Theme Setting TopBar On-off Setting
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_display_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => false,
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 
                    new My_Online_Shop_Product_Toggle_Button_Control( $wp_customize,'my_online_shop_product_top_bar_display_setting_id', 
                        array(
                            'priority'      => 5,
                            'type'          => 'toggle',
                            'label'         => esc_html__( 'Show / Hide Top Bar', "my-online-shop-product" ),
                            'section'       => 'my_online_shop_product_top_bar_section_id',
                            'description'   => 'Toggle button to turn top bar on off'
                        )
                    )
                ); 

            //Theme Setting Phone Number Setting
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_phone_number_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 'my_online_shop_product_top_bar_phone_number_setting_id', array(
                    'type'          => 'text',
                    'priority'      => 10,
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'label'         => esc_html__("Add Phone Number", "my-online-shop-product"),
                ) );

                //Icon Color 
                $wp_customize->add_setting( 'my_online_shop_product_phone_icon_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#1e73be',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_phone_icon_setting_id', array(
                    'label'         => esc_html__('Add Phone Icon Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'priority'      => 15,
                ) ) );


            //Theme Setting Email Setting 
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_email_address_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 
                    
                $wp_customize->add_control( 'my_online_shop_product_top_bar_email_address_setting_id', array(
                    'type'          => 'text',
                    'priority'      => 20,
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'label'         => esc_html__('Add Email address', "my-online-shop-product"),
                ) );

                //Icon Color 
                $wp_customize->add_setting( 'my_online_shop_product_email_icon_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#dd9933',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_email_icon_setting_id', array(
                    'label'         => esc_html__('Add Email Icon Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'priority'      => 25,
                ) ) );

            //Theme Setting Youtube Setting
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_youtube_link_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 'my_online_shop_product_top_bar_youtube_link_setting_id', array(
                    'type'          => 'text',
                    'priority'      => 30,
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'label'         => esc_html__('Add Youtube Link', "my-online-shop-product"),
                ) );

                //Icon Color 
                $wp_customize->add_setting( 'my_online_shop_product_youtube_icon_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#ef503b',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_youtube_icon_setting_id', array(
                    'label'         => esc_html__('Add Youtube Icon Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'priority'      => 35,
                ) ) );

            //Theme Setting Facebook Setting 
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_facebook_link_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 
                        
                $wp_customize->add_control( 'my_online_shop_product_top_bar_facebook_link_setting_id', array(
                    'type'          => 'text',
                    'priority'      => 40,
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'label'         => esc_html__('Add Facebook Link', "my-online-shop-product"),
                ) );

                  //Icon Color 
                    $wp_customize->add_setting( 'my_online_shop_product_facebook_icon_setting_id', array(
                        'type'              => 'option',
                        'capability'        => 'manage_options',
                        'default'           => '#1e73be',
                        'sanitize_callback' => 'sanitize_hex_color',
                    ) );
                    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_facebook_icon_setting_id', array(
                        'label'         => esc_html__('Add Facebook Icon Color', "my-online-shop-product"),
                        'section'       => 'my_online_shop_product_top_bar_section_id',
                        'priority'      => 45,
                    ) ) );

            //Theme Setting Twitter Setting 
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_twitter_link_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 
                    
                $wp_customize->add_control( 'my_online_shop_product_top_bar_twitter_link_setting_id', array(
                    'type'          => 'text',
                    'priority'      => 50,
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'label'         => esc_html__('Add Twitter Link', "my-online-shop-product"),
                ) );

                //Icon Color 
                $wp_customize->add_setting( 'my_online_shop_product_twitter_icon_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#b1cf7b',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_twitter_icon_setting_id', array(
                    'label'         => esc_html__('Add Twitter Icon Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'priority'      => 55,
                ) ) );

            //Theme Setting Instagram Setting 
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_instagram_link_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 
                    
                $wp_customize->add_control( 'my_online_shop_product_top_bar_instagram_link_setting_id', array(
                    'type'      => 'text',
                    'priority'  => 60,
                    'section'   => 'my_online_shop_product_top_bar_section_id',
                    'label'     => esc_html__('Add Instagram Link', "my-online-shop-product"),
                ) );

                //Icon Color 
                $wp_customize->add_setting( 'my_online_shop_product_instagram_icon_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#81d742',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_instagram_icon_setting_id', array(
                    'label'         => esc_html__('Add Instagram Icon Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'priority'      => 65,
                ) ) );

             //Theme Setting LinkedIn Setting 
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_linkedin_link_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 
                    
                $wp_customize->add_control( 'my_online_shop_product_top_bar_linkedin_link_setting_id', array(
                    'type'      => 'text',
                    'priority'  => 70,
                    'section'   => 'my_online_shop_product_top_bar_section_id',
                    'label'     => esc_html__('Add LinkedIn Link', "my-online-shop-product"),
                ) );

                //Icon Color 
                $wp_customize->add_setting( 'my_online_shop_product_linkedin_icon_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#00a9cf',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_linkedin_icon_setting_id', array(
                    'label'         => esc_html__('Add LinkedIn Icon Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'priority'      => 75,
                ) ) );

            
            //Theme Setting Top Bar Text Color 
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_text_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#ffffff',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_top_bar_text_color_setting_id', array(
                    'label'         => esc_html__('Add Top Bar Text Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'priority'      => 80,
                ) ) );
             //Theme Setting Top Bar Background Color 
                $wp_customize->add_setting( 'my_online_shop_product_top_bar_background_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#5f92bf',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_top_bar_background_color_setting_id', array(
                    'label'         => esc_html__('Add Top Bar Background Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_top_bar_section_id',
                    'priority'      => 90,
                ) ) );

        }

        public function my_online_shop_product_my_customize_register_nav_bar($wp_customize)
        {

            //Theme Setting Nav Bar Info Section
            $wp_customize->add_section( 'my_online_shop_product_nav_bar_section_id', array(
                'title'         => esc_html__('Add Customizer to Nav Bar', "my-online-shop-product"),
                'description'   => esc_html__('Add logo text color, nav text color, nav background color', "my-online-shop-product"),
                'panel'         => 'my_online_shop_product_theme_setting_panel_id',
                'priority'      => 10,
            ) );

            //Theme Setting NAV Text Color 
                $wp_customize->add_setting( 'my_online_shop_product_nav_bar_text_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#ffffff',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_nav_bar_text_color_setting_id', array(
                    'label'         => esc_html__('Add NAV Text Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_nav_bar_section_id',
                    'priority'      => 10,
                ) ) );

            //Theme Setting NAV Background Color 
                $wp_customize->add_setting( 'my_online_shop_product_nav_bar_background_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#111111',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_nav_bar_background_color_setting_id', array(
                    'label'         => esc_html__('Add NAV Bar Background Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_nav_bar_section_id',
                    'priority'      => 20,
                ) ) );

            //Theme Setting NAV Background Color 
                 $wp_customize->add_setting( 'my_online_shop_product_nav_bar_sub_menu_background_color_setting_id', array(
                    'type'              => 'option',
                    'capability'        => 'manage_options',
                    'default'           => '#222222',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_nav_bar_sub_menu_background_color_setting_id', array(
                    'label'         => esc_html__('Add NAV Bar SubMenu Background Color', "my-online-shop-product"),
                    'section'       => 'my_online_shop_product_nav_bar_section_id',
                    'priority'      => 25,
                ) ) );

        }

        public function my_online_shop_product_my_customize_register_custom_header_information($wp_customize)
        {
            //Theme Setting Custom Header Info Section
                $wp_customize->add_section( 'my_online_shop_product_custom_header_info_section_id', array(
                    'title'         => esc_html__('Add Custom Header', 'my-online-shop-product' ),
                    'description'   => esc_html__('Add title, sub_title, button, button_link to custom header', 'my-online-shop-product' ),
                    'panel'         => 'my_online_shop_product_theme_setting_panel_id',
                    'priority'      => 15,
                ) );

            //Theme Setting Custom Header On Blog Page
                $wp_customize->add_setting( 'my_online_shop_product_custom_header_display_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => false,
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 
                    new My_Online_Shop_Product_Toggle_Button_Control( $wp_customize,'my_online_shop_product_custom_header_display_setting_id', 
                        array(
                            'priority'      => 5,
                            'type'          => 'toggle',
                            'label'         => esc_html__( 'Show / Hide Custom Header on Blogs Page', 'my-online-shop-product' ),
                            'section'       => 'my_online_shop_product_custom_header_info_section_id',
                        )
                    )
                ); 

            //Theme Setting Custom Header On Page
                $wp_customize->add_setting( 'my_online_shop_product_custom_header_display_on_page_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => 0,
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 'my_online_shop_product_custom_header_display_on_page_setting_id', array(
                    'type'          => 'dropdown-pages',
                    'priority'      => 10,
                    'section'       => 'my_online_shop_product_custom_header_info_section_id',
                    'label'         => esc_html__('Select a Page to display Custom Header Image', 'my-online-shop-product' ),
                ) );

    
             //Theme Setting Custom Header Information On-off
                $wp_customize->add_setting( 'my_online_shop_product_custom_header_information_display_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => false,
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 
                    new My_Online_Shop_Product_Toggle_Button_Control( $wp_customize,'my_online_shop_product_custom_header_information_display_setting_id', 
                        array(
                            'priority'      => 25,
                            'type'          => 'toggle',
                            'label'         => esc_html__( 'Show / Hide Custom Header Information', 'my-online-shop-product' ),
                            'section'       => 'my_online_shop_product_custom_header_info_section_id',
                            'description'   => esc_html__( 'Toggle button to turn Custom Header information on-off', 'my-online-shop-product' ),
                        )
                    )
                ); 

        }

        public function my_online_shop_product_my_customize_register_slider($wp_customize)
        {         
            //Front Page Setting Slider Section
                $wp_customize->add_section( 'my_online_shop_product_slider_section_id', array(
                    'title'         => esc_html__('Add Slider to Home Page Template', 'my-online-shop-product' ),
                    'description'   => esc_html__('Add slider image, title, description or turn Slider on-off', 'my-online-shop-product' ),
                    'panel'         => 'my_online_shop_product_theme_setting_panel_id',
                    'priority'      => 20,
                ) );
            
            //Setting Slider On-off
                  $wp_customize->add_setting( 'my_online_shop_product_slider_display_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => false,
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 
                    new My_Online_Shop_Product_Toggle_Button_Control( $wp_customize,'my_online_shop_product_slider_display_setting_id', 
                        array(
                            'priority'      => 5,
                            'type'          => 'toggle',
                            'label'         => esc_html__( 'Hide / Show Slider', 'my-online-shop-product' ),
                            'section'       => 'my_online_shop_product_slider_section_id',
                            'description'   => esc_html__( 'Toggle button to turn Slider on-off' , 'my-online-shop-product' )
                        )
                    )
                ); 

            //Setting Slider Information On-off
                $wp_customize->add_setting( 'my_online_shop_product_slider_information_display_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => false,
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 
                    new My_Online_Shop_Product_Toggle_Button_Control( $wp_customize,'my_online_shop_product_slider_information_display_setting_id', 
                        array(
                            'priority'      => 10,
                            'type'          => 'toggle',
                            'label'         => esc_html__( 'Hide / Show Slider Information', 'my-online-shop-product' ),
                            'section'       => 'my_online_shop_product_slider_section_id',
                            'description'   =>  esc_html__( 'Toggle button to turn Slider Information area on-off' , 'my-online-shop-product' )
                        )
                    )
                ); 
            
            /* ----------------------Slider 1----------------------*/
                //Slider
                    $wp_customize->add_setting( 'my_online_shop_product_slider_1_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'absint'
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_1_setting_id', array(
                        'type' 		=> 'dropdown-pages',
                        'priority'  =>  20,
                        'section'   => 'my_online_shop_product_slider_section_id',
                        'label'     => esc_html__( 'Set Slider Page 1', 'my-online-shop-product' ),
                    ) );

                //Slider Item Sub_title
                    $wp_customize->add_setting( 'my_online_shop_product_slider_item_sub_title_1_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh', 
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_item_sub_title_1_setting_id', array(
                        'type'      => 'text',
                        'priority'  => 30,
                        'section'   => 'my_online_shop_product_slider_section_id',
                        'label'     =>  esc_html__( 'Sub_Title for slider 1 to be displayed', 'my-online-shop-product' ),
                    ) );

            
                //Theme Setting Slider Button Text
                    $wp_customize->add_setting( 'my_online_shop_product_slider_information_button_text_1_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_information_button_text_1_setting_id', array(
                        'type'          => 'text',
                        'priority'      => 40,
                        'section'       => 'my_online_shop_product_slider_section_id',
                        'label'         => esc_html__( 'Add Slider 1 button text', 'my-online-shop-product' ),
                    ) );

                //Theme Setting Slider Button Link
                    $wp_customize->add_setting( 'my_online_shop_product_slider_information_button_link_1_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_information_button_link_1_setting_id', array(
                        'type'          => 'text',
                        'priority'      =>  50,
                        'section'       => 'my_online_shop_product_slider_section_id',
                        'label'         => esc_html__( 'Add Slider 1 button link', 'my-online-shop-product' ),
                    ) );

              
            /* ----------------------Slider 2----------------------*/
                //Slider
                    $wp_customize->add_setting( 'my_online_shop_product_slider_2_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'absint'
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_2_setting_id', array(
                        'type' 		=> 'dropdown-pages',
                        'priority'  =>  60,
                        'section'   => 'my_online_shop_product_slider_section_id',
                        'label'     => esc_html__( 'Set Slider Page 2', 'my-online-shop-product' ),
                    ) );

                //Slider Item Sub_title
                    $wp_customize->add_setting( 'my_online_shop_product_slider_item_sub_title_2_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh', 
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_item_sub_title_2_setting_id', array(
                        'type'      => 'text',
                        'priority'  => 70,
                        'section'   => 'my_online_shop_product_slider_section_id',
                        'label'     =>  esc_html__( 'Sub_Title for slider 2 to be displayed', 'my-online-shop-product' ),
                    ) );

        
                //Theme Setting Slider Button Text
                    $wp_customize->add_setting( 'my_online_shop_product_slider_information_button_text_2_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_information_button_text_2_setting_id', array(
                        'type'          => 'text',
                        'priority'      => 80,
                        'section'       => 'my_online_shop_product_slider_section_id',
                        'label'         => esc_html__( 'Add Slider 2 button text', 'my-online-shop-product' ),
                    ) );

                //Theme Setting Slider Button Link
                    $wp_customize->add_setting( 'my_online_shop_product_slider_information_button_link_2_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_information_button_link_2_setting_id', array(
                        'type'          => 'text',
                        'priority'      =>  90,
                        'section'       => 'my_online_shop_product_slider_section_id',
                        'label'         => esc_html__( 'Add Slider 2 button link', 'my-online-shop-product' ),
                    ) );

            
            /* ----------------------Slider 3----------------------*/
                //Slider
                   $wp_customize->add_setting( 'my_online_shop_product_slider_3_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'absint'
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_3_setting_id', array(
                        'type' 		=> 'dropdown-pages',
                        'priority'  =>  100,
                        'section'   => 'my_online_shop_product_slider_section_id',
                        'label'     => esc_html__( 'Set Slider Page 3', 'my-online-shop-product' ),
                    ) );

                //Slider Item Sub_title
                    $wp_customize->add_setting( 'my_online_shop_product_slider_item_sub_title_3_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh', 
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_slider_item_sub_title_3_setting_id', array(
                        'type'      => 'text',
                        'priority'  => 110,
                        'section'   => 'my_online_shop_product_slider_section_id',
                        'label'     =>  esc_html__( 'Sub_Title for slider 3 to be displayed', 'my-online-shop-product' ),
                    ) );

    
            //Theme Setting Slider Button Text
                $wp_customize->add_setting( 'my_online_shop_product_slider_information_button_text_3_setting_id', array(
                    'type'              => 'theme_mod',
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 'my_online_shop_product_slider_information_button_text_3_setting_id', array(
                    'type'          => 'text',
                    'priority'      => 120,
                    'section'       => 'my_online_shop_product_slider_section_id',
                    'label'         => esc_html__( 'Add Slider 3 button text', 'my-online-shop-product' ),
                ) );

            //Theme Setting Slider Button Link
                $wp_customize->add_setting( 'my_online_shop_product_slider_information_button_link_3_setting_id', array(
                    'type'              => 'theme_mod',
                    'capability'        => 'edit_theme_options',
                    'default'           => '',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 'my_online_shop_product_slider_information_button_link_3_setting_id', array(
                    'type'          => 'text',
                    'priority'      =>  130,
                    'section'       => 'my_online_shop_product_slider_section_id',
                    'label'         => esc_html__( 'Add Slider 3 button link', 'my-online-shop-product' ),
                ) );
  
                
        }

        public function my_online_shop_product_my_customize_register_template_configuration($wp_customize)
        {

            //Page SideBar Configuration Section
                $wp_customize->add_section( 'my_online_shop_product_template_sidebar_section_id', array(
                    'title'         => esc_html__('Add Template Configuration', 'my-online-shop-product' ),
                    'panel'         => 'my_online_shop_product_theme_setting_panel_id',
                    'priority'      => 25,
                ) );
          
            //Page SideBar Configuration Setting
                $wp_customize->add_setting( 'my_online_shop_product_template_sidebar_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => 'none',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 'my_online_shop_product_template_sidebar_setting_id', array(
                    'type'      => 'radio',
                    'priority'  => 15,
                    'section'   => 'my_online_shop_product_template_sidebar_section_id',
                    'label'     => esc_html__('Select a SideBar configuration', 'my-online-shop-product' ),
                    'description'   => esc_html__('Setting how sidebar will be displaying on Page', 'my-online-shop-product' ),
                    'choices'   => array(
                        'left'      => esc_html__('Left', 'my-online-shop-product' ),
                        'right'     => esc_html__('Right', 'my-online-shop-product' ),
                        'none'      => esc_html__('None', 'my-online-shop-product' ),
                    ),
                ) );

            //Page ColumnConfiguration Setting
                $wp_customize->add_setting( 'my_online_shop_product_template_column_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => '1',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 'my_online_shop_product_template_column_setting_id', array(
                    'type'      => 'radio',
                    'priority'  => 20,
                    'section'   => 'my_online_shop_product_template_sidebar_section_id',
                    'label'     => esc_html__('Select column number to displaying Card on Page', 'my-online-shop-product' ),
                    'choices'   => array(
                        '1'     => esc_html__('One Column', 'my-online-shop-product' ),
                        '2'     => esc_html__('Two Column', 'my-online-shop-product' ),
                        '3'     => esc_html__('Three Column', 'my-online-shop-product' ),
                    ),
                ) );

        }

        public function my_online_shop_product_my_customize_register_home_template($wp_customize)
        {
            //Home Page Configuration Section
                $wp_customize->add_section( 'my_online_shop_product_home_template_section_id', array(
                    'title'         => esc_html__('Add Home Template Configuration', 'my-online-shop-product' ),
                    'panel'         => 'my_online_shop_product_theme_setting_panel_id',
                    'priority'      => 80,
                ) );

            if(class_exists("WooCommerce")){
                //Setting Category Section Title
                    $wp_customize->add_setting( 'my_online_shop_product_category_section_title_text_setting_id', array(
                        'type' => 'theme_mod', // or 'option'
                        'capability' => 'edit_theme_options',
                        'default' => 'All Category',
                        'transport' => 'refresh', // or postMessage
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_category_section_title_text_setting_id', array(
                        'type' => 'text',
                        'priority' => 5,
                        'section' => 'my_online_shop_product_home_template_section_id',
                        'label' => esc_html__('Add Category Section Title', 'my-online-shop-product' ),
                    ) );
                
                //Change Number of Item/View
                    $wp_customize->add_setting( 'my_online_shop_product_category_section_slider_per_view_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'transport'         => 'refresh',
                        'default'           => '4',
                        'sanitize_callback' => 'absint',
                    ) );
            
                    $wp_customize->add_control( 'my_online_shop_product_category_section_slider_per_view_setting_id', array(
                        'type'          => 'number',
                        'label'         => esc_html__('Change Number of Slider/View on Category Section', 'my-online-shop-product' ),
                        'section' => 'my_online_shop_product_home_template_section_id',
                        'priority'      => 10,
                        'input_attrs'   => array(
                            'min' => 2,
                            'max' => 10,
                        ),
                    ) );

                //Setting Popular Section Title
                    $wp_customize->add_setting( 'my_online_shop_product_popular_product_section_title_text_setting_id', array(
                        'type'              => 'theme_mod', // or 'option'
                        'capability'        => 'edit_theme_options',
                        'default'           => 'Popular Product',
                        'transport'         => 'refresh', // or postMessage
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_popular_product_section_title_text_setting_id', array(
                        'type'      => 'text',
                        'priority'  => 15,
                        'section' => 'my_online_shop_product_home_template_section_id',
                        'label'     => esc_html__('Add Popular Product Section Title', 'my-online-shop-product' ),
                    ) );  


                //Setting new Arrival Section Title
                    $wp_customize->add_setting( 'my_online_shop_product_newarrival_product_section_title_text_setting_id', array(
                        'type'              => 'theme_mod', // or 'option'
                        'capability'        => 'edit_theme_options',
                        'default'           => 'New Arrival Product',
                        'transport'         => 'refresh', // or postMessage
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_newarrival_product_section_title_text_setting_id', array(
                        'type' => 'text',
                        'priority' => 20,
                        'section' => 'my_online_shop_product_home_template_section_id',
                        'label' => esc_html__('Add NewArrival Product Section Title', 'my-online-shop-product' ),
                    ) ); 
                    
                //Deal Product turn on-off
                    $wp_customize->add_setting( 'my_online_shop_product_deal_product_section_display_setting_id', array(
                        'type'              => 'theme_mod', // or 'option'
                        'capability'        => 'edit_theme_options',
                        'default'           => false,
                        'transport'         => 'refresh', // or postMessage
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 
        
                    $wp_customize->add_control( 
                        new My_Online_Shop_Product_Toggle_Button_Control( $wp_customize,'my_online_shop_product_deal_product_section_display_setting_id', 
                            array(
                                'priority'      => 30,
                                'type'          => 'toggle',
                                'label'         => esc_html__( 'Show / Hide Deal Section on Home Page', 'my-online-shop-product' ),
                                'section'       => 'my_online_shop_product_home_template_section_id',
                                'description'   => 'Toggle button to turn Deal Section on Home Page on-off'
                            )
                        )
                    ); 

                //Setting Deal Product Section Title
                    $wp_customize->add_setting( 'my_online_shop_product_deal_product_section_title_setting_id', array(
                        'type'              => 'theme_mod', // or 'option'
                        'capability'        => 'edit_theme_options',
                        'default'           => 'Hot Sale!!!',
                        'transport'         => 'refresh', // or postMessage
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_deal_product_section_title_setting_id', array(
                        'type'      => 'text',
                        'priority'  => 40,
                        'section' => 'my_online_shop_product_home_template_section_id',
                        'label'     => esc_html__('Add Deal Product Section Title', 'my-online-shop-product' ),
                    ) );  


                //Setting Deal Product ID
                    $wp_customize->add_setting( 'my_online_shop_product_deal_product_ID_setting_id', array(
                        'type'              => 'theme_mod', // or 'option'
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh', // or postMessage
                        'sanitize_callback' => 'absint',
                        'validate_callback' => 'my_online_shop_product_validate_sale_price'
                    ) );
        
                    // Checks if the selected product has a sale price. If not, displays a warning
                    function my_online_shop_product_validate_sale_price( $validity, $ID ) {
                        if( !empty( $ID )){

                            $my_online_shop_product_sale_validation = get_post_meta( $ID, '_sale_price', true );
                            if ( empty( $my_online_shop_product_sale_validation ) ):
                                $validity->add( 'Sale_price_not_set', sprintf( __( 'Please add sale price - Product ID not valid: %1$s', 'my-online-shop-product' ), $ID ) );
                            endif;
                            return $validity;

                        }
                    }
        
                    $wp_customize->add_control( 'my_online_shop_product_deal_product_ID_setting_id', array(
                        'type'      => 'number',
                        'priority'  => 50,
                        'section' => 'my_online_shop_product_home_template_section_id',
                        'label'     => esc_html__('Add Deal Product ID', 'my-online-shop-product' ),
                    ) );

                    //Deal Product Section Image
                    $wp_customize->add_setting( 'my_online_shop_product_deal_product_background_image_setting_id', array(
                        'type'              => 'theme_mod', // or 'option'
                        'capability'        => 'edit_theme_options',
                        'default'           => '',
                        'transport'         => 'refresh', // or postMessage
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'my_online_shop_product_deal_product_background_image_setting_id', array(
                        'label'     => esc_html__( "Deal Section Background Image", 'my-online-shop-product' ),
                        'description'   => esc_html__('Image size w=1000, h=400', 'my-online-shop-product' ),
                        'section'   => 'my_online_shop_product_home_template_section_id',
                        'mime_type' => 'image',
                        'priority'  => 60,
                    ) ) ); 


                //Setting Related Product Section Title
                    $wp_customize->add_setting( 'my_online_shop_product_related_product_section_title_text_setting_id', array(
                        'type'              => 'theme_mod', // or 'option'
                        'capability'        => 'edit_theme_options',
                        'default'           => 'Related Products',
                        'transport'         => 'refresh', // or postMessage
                        'sanitize_callback' => 'sanitize_text_field',
                    ) ); 

                    $wp_customize->add_control( 'my_online_shop_product_related_product_section_title_text_setting_id', array(
                        'type' => 'text',
                        'priority' => 90,
                        'section' => 'my_online_shop_product_home_template_section_id',
                        'label' => esc_html__('Add Related Product Section Title', 'my-online-shop-product' ),
                    ) ); 

                //Setting Related Product Section Number of Card/View Section Single Page
                    $wp_customize->add_setting( 'my_online_shop_product_related_product_section_card_per_view_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'transport'         => 'refresh',
                        'default'           => 4,
                        'sanitize_callback' => 'absint',
                    ) );
            
                    $wp_customize->add_control( 'my_online_shop_product_related_product_section_card_per_view_setting_id', array(
                        'type'          => 'number',
                        'label'         => esc_html__('Change Number of Product Card/View on Related Products Section Single Page', 'my-online-shop-product' ),
                        'section'       => 'my_online_shop_product_home_template_section_id',
                        'priority'      => 100,
                        'input_attrs'   => array(
                            'min' => 2,
                            'max' => 6,
                        ),
                    ) );
            }        

            //Setting News Section Title
                $wp_customize->add_setting( 'my_online_shop_product_news_section_title_setting_id', array(
                    'type'              => 'theme_mod', // or 'option'
                    'capability'        => 'edit_theme_options',
                    'default'           => 'News',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field',
                ) ); 

                $wp_customize->add_control( 'my_online_shop_product_news_section_title_setting_id', array(
                    'type'      => 'text',
                    'priority'  => 70,
                    'section' => 'my_online_shop_product_home_template_section_id',
                    'label'     => esc_html__('Add News Section Title', 'my-online-shop-product' ),
                ) );  

            
            //Change Number of Item/View Section Home page
                $wp_customize->add_setting( 'my_online_shop_product_card_per_view_setting_id', array(
                    'type'              => 'theme_mod',
                    'capability'        => 'edit_theme_options',
                    'transport'         => 'refresh',
                    'default'           => 4,
                    'sanitize_callback' => 'absint',
                ) );
        
                $wp_customize->add_control( 'my_online_shop_product_card_per_view_setting_id', array(
                    'type'          => 'number',
                    'label'         => esc_html__('Change Number of Product Card/View Home Page Section', 'my-online-shop-product' ),
                    'section'       => 'my_online_shop_product_home_template_section_id',
                    'priority'      => 80,
                    'input_attrs'   => array(
                        'min' => 2,
                        'max' => 6,
                    ),
                ) );

            
        }

        public function my_online_shop_product_my_customize_register_footer($wp_customize)
        {

            //Footer Section
                $wp_customize->add_section( 'my_online_shop_product_footer_section_id', array(
                    'title'         => esc_html__( 'Setting Footer' , "my-online-shop-product"),
                    'panel'         => 'my_online_shop_product_theme_setting_panel_id',
                    'priority'      => 100,
                ) );

            //Add Company Logo
                $wp_customize->add_setting('my_online_shop_product_footer_add_global_item_logo_setting_id', array(
                    'type'                  => 'theme_mod',
                    'capability'            => 'edit_theme_options',
                    'default'               => '',
                    'transport'             => 'refresh', // or postMessage
                    'sanitize_callback'     => 'absint'
                ));

                $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'my_online_shop_product_footer_add_global_item_logo_setting_id', array(
                    'section'       => 'my_online_shop_product_footer_section_id',   
                    'label'         => esc_html__( 'Add Company Logo Image',"my-online-shop-product"),
                    'flex_width'    => true, 
                    'flex_height'   => true,
                    'priority'      => 10,
                ) ) );    

            //Add Message Text
                $wp_customize->add_setting('my_online_shop_product_footer_add_global_item_message_text_setting_id', array(
                    'type'              => 'theme_mod',
                    'capability'        => 'edit_theme_options',
                    'default'           => 'Welcome to My Online Shop Product!',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field'

                ));   

                $wp_customize->add_control( 'my_online_shop_product_footer_add_global_item_message_text_setting_id', 
                    array(
                        'label'   =>  esc_html__( 'Add Message Text to Footer Section',"my-online-shop-product"),
                        'section' => 'my_online_shop_product_footer_section_id',
                        'type'    => 'text',
                        'priority'      => 20,
                    )
                );   

            //Add Footer BackGround Color
                $wp_customize->add_setting( 'my_online_shop_product_footer_add_global_item_footer_background_color_setting_id', array(
                    'type' => 'option',
                    'capability' => 'manage_options',
                    'default' => '#111111',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );

                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_footer_add_global_item_footer_background_color_setting_id', array(
                    'label' => esc_html__('Add Footer Background Color', "my-online-shop-product"),
                    'section' => 'my_online_shop_product_footer_section_id',
                    'description' => esc_html__('Change Footer Section background color!',"my-online-shop-product"),
                    'priority'      => 30,
                ) ) );

            //Add Footer Text Color
                $wp_customize->add_setting( 'my_online_shop_product_footer_add_global_item_footer_text_color_setting_id', array(
                    'type' => 'option',
                    'capability' => 'manage_options',
                    'default' => '#ffffff',
                    'sanitize_callback' => 'sanitize_hex_color',
                ) );

                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'my_online_shop_product_footer_add_global_item_footer_text_color_setting_id', array(
                    'label' => esc_html__( 'Setting Footer Text Color',"my-online-shop-product"),
                    'section' => 'my_online_shop_product_footer_section_id',
                    'description' => esc_html__('Change Footer Section text color!',"my-online-shop-product"),
                    'priority'      => 40,
                ) ) );   

            //Copy right text
                $wp_customize->add_setting('my_online_shop_product_footer_copy_right_text_setting_id', array(
                    'type'              => 'theme_mod',
                    'capability'        => 'edit_theme_options',
                    'default'           => 'Add Copy Right Text',
                    'transport'         => 'refresh', // or postMessage
                    'sanitize_callback' => 'sanitize_text_field'
                )); 
                
                $wp_customize->add_control( 'my_online_shop_product_footer_copy_right_text_setting_id', 
                    array(
                        'label'       =>  esc_html__( 'Add Copy Right Text',"my-online-shop-product"),
                        'section'     => 'my_online_shop_product_footer_section_id',
                        'type'        => 'text',
                        'priority'    => 190,
                    )
                );     

            //Company Infomation
                $wp_customize->add_setting( 'my_online_shop_product_footer_add_company_info_title_setting_id', array(
                    'type'              => 'theme_mod',
                    'capability'        => 'edit_theme_options',
                    'default'           =>  'Our address',
                    'transport'         => 'refresh',
                    'sanitize_callback' => 'sanitize_text_field',
                ) );

                $wp_customize->add_control( 'my_online_shop_product_footer_add_company_info_title_setting_id', array(
                    'type'          => 'text',
                    'section'       => 'my_online_shop_product_footer_section_id',
                    'label'         => esc_html__('Company Information Title Section', "my-online-shop-product"),
                    'description'   => esc_html__('Add a title to Company info section in Footer' , "my-online-shop-product"),
                    'priority'      => 60,
                    
                ) );

                //Address 1
                    $wp_customize->add_setting( 'my_online_shop_product_company_info_title_1_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  'HeadQuarter',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_title_1_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 1 Title', "my-online-shop-product"),
                        'priority'      => 70,
                        
                    ) );

                    $wp_customize->add_setting( 'my_online_shop_product_company_info_location_1_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  'Location',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_location_1_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 1 Location', "my-online-shop-product"),
                        'priority'      => 80,
                        
                    ) );

                    $wp_customize->add_setting( 'my_online_shop_product_company_info_phone_1_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  '000111222333',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_phone_1_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 1 Phone Number', "my-online-shop-product"),
                        'priority'      => 90,
                        
                    ) );

                    $wp_customize->add_setting( 'my_online_shop_product_company_info_email_1_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  'email@example.com',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_email_1_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 1 Email', "my-online-shop-product"),
                        'priority'      => 100,
                        
                    ) );

                 /*-----------------------------------*****-----------------------*/

                //Address 2
                    $wp_customize->add_setting( 'my_online_shop_product_company_info_title_2_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  'Brand 1',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_title_2_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 2 Title', "my-online-shop-product"),
                        'priority'      => 110,
                        
                    ) );

                    $wp_customize->add_setting( 'my_online_shop_product_company_info_location_2_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  'Location',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_location_2_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 2 Location', "my-online-shop-product"),
                        'priority'      => 120,
                        
                    ) );

                    $wp_customize->add_setting( 'my_online_shop_product_company_info_phone_2_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  '000111222333',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_phone_2_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 2 Phone Number', "my-online-shop-product"),
                        'priority'      => 130,
                        
                    ) );

                    $wp_customize->add_setting( 'my_online_shop_product_company_info_email_2_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  'email@example.com',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_email_2_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 2 Email', "my-online-shop-product"),
                        'priority'      => 140,
                        
                    ) );

                /*-----------------------------------*****-----------------------*/

                //Address 3
                    $wp_customize->add_setting( 'my_online_shop_product_company_info_title_3_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  'Brand 2',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_title_3_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 3 Title', "my-online-shop-product"),
                        'priority'      => 150,
                        
                    ) );

                    $wp_customize->add_setting( 'my_online_shop_product_company_info_location_3_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  'Location',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_location_3_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 3 Location', "my-online-shop-product"),
                        'priority'      => 160,
                        
                    ) );

                    $wp_customize->add_setting( 'my_online_shop_product_company_info_phone_3_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  '000111222333',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_phone_3_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 3 Phone Number', "my-online-shop-product"),
                        'priority'      => 170,
                        
                    ) );

                    $wp_customize->add_setting( 'my_online_shop_product_company_info_email_3_setting_id', array(
                        'type'              => 'theme_mod',
                        'capability'        => 'edit_theme_options',
                        'default'           =>  'email@example.com',
                        'transport'         => 'refresh',
                        'sanitize_callback' => 'sanitize_text_field',
                    ) );

                    $wp_customize->add_control( 'my_online_shop_product_company_info_email_3_setting_id', array(
                        'type'          => 'text',
                        'section'       => 'my_online_shop_product_footer_section_id',
                        'label'         => esc_html__('Address 3 Email', "my-online-shop-product"),
                        'priority'      => 180,
                        
                    ) );

        }
    }

    new My_Online_Shop_Product_Theme_Setting_Customizer();

 }

