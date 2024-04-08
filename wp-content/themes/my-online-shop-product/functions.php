<?php
/**
 * My Online Shop Product functions and definitions
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

/**
* Enqueue files for the TGM PLugin Activation library.
*/
    require_once get_template_directory() . '/classes/class-tgm-plugin-activation.php';
    require_once get_template_directory() . '/includes/required-plugins.php';

/**
 * Enqueue scripts for demo data using One Click Demo Import library.
 */
    require_once get_template_directory() . '/demo-data/ocdi.php';
    
/**
* Add includes file .
*/
    //Add Customizer file
        //Theme Setting
        require_once get_template_directory() . "/includes/customizer/my_online_shop_product_customize_control_toggle.php";
        require_once get_template_directory() . "/includes/customizer/my_online_shop_product_theme_customizer.php";
        //Custom Header Image
        require_once get_template_directory() . "/includes/customizer/my_online_shop_product_custom_header.php";       
/**
* Add enqueue scripts files.
*/
    function my_online_shop_product_enqueue_scripts(){
        // Theme stylesheet.
            wp_enqueue_style( 'my_online_shop_product_style', get_stylesheet_uri(), array(), "1.4", "all");

        // Google Fonts
	        wp_enqueue_style( 'font_Poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap' );	

        //CSS File
            /*  -----------------------------------------------------------------------------------
            Theme Download File
            ------------------------------------------------------------------------------------ */
            //Add Bootstrap-css 
                wp_enqueue_style( 'bootstrap_css', 
                    get_template_directory_uri()."/assets/css/bootstrap.min.css",
                    array(), 
                    "1.5", 
                    "all" 
                );
            //Add FontAwesome Css
                wp_enqueue_style( 'fontawesome_css', 
                    get_template_directory_uri()."/assets/css/all.css",
                    array(), 
                    "1.5", 
                    "all"
                );
            //Add Swiper Css
                wp_enqueue_style( 'swiper_css', 
                    get_template_directory_uri()."/assets/swiper/css/swiper-bundle.min.css",
                    array(), 
                    "1.5", 
                    "all"
                ); 
            //Add Theme CSS File
                wp_enqueue_style( 'my_online_shop_product_theme_css', 
                    get_template_directory_uri()."/assets/css/theme-css/my_online_shop_product_theme.css",
                    array(), 
                    "1.5", 
                    "all"
                ); 
                
        //JS File
            /*  -----------------------------------------------------------------------------------
            Theme Download File
            ------------------------------------------------------------------------------------ */
            //Add Bootstrap JS
                wp_enqueue_script( 'bootstrap_bundle_js', 
                    get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', 
                    array('jquery'), 
                    '1.5', 
                    true 
                ); 
                //Add FontAwesome JS
                wp_enqueue_script( 'fontawesome_js', 
                    get_template_directory_uri() . '/assets/js/all.js', 
                    array(), 
                    '1.5', 
                    true 
                );
                //Add Swiper JS
                wp_enqueue_script( 'swiper_js', 
                    get_template_directory_uri() . '/assets/swiper/js/swiper-bundle.min.js', 
                    array('jquery'), 
                    '1.5', 
                    true 
                );
            /*  -----------------------------------------------------------------------------------
            Theme Files
            ------------------------------------------------------------------------------------ */
            //Add Embeded JS File
                wp_enqueue_script( 'my_online_shop_product_embeded_js', 
                    get_template_directory_uri() . '/assets/js/themes-js/my_online_shop_product_responsive-embeds.js', 
                    array('jquery'), 
                    '1.5', 
                    true 
                );
                //Add Theme JS File
                wp_enqueue_script( 'my_online_shop_product_theme_js', 
                    get_template_directory_uri() . '/assets/js/themes-js/my_online_shop_product_theme.js', 
                    array('jquery'), 
                    '1.5',   
                    true 
                );

            //Comment Reply  
                if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                    wp_enqueue_script( 'comment-reply' );
                }

    }
    add_action( 'wp_enqueue_scripts', 'my_online_shop_product_enqueue_scripts' );
      
/**
* Add a Theme support .
*/
    if(!function_exists("my_online_shop_product_add_theme_support")){
        function my_online_shop_product_add_theme_support(){

            //Register Nav Menu
                register_nav_menus( array(
                    'main_nav_menu' => esc_html__( 'Main Nav Menu', "my-online-shop-product"),
                    'footer_menu'   => esc_html__( 'Footer Menu', "my-online-shop-product"),
                ) );

            // Add theme support for Custom Logo.
                add_theme_support( 'custom-logo', array(
                    'height'               => 85,
                    'width'                => 160,
                    'flex-height'          => true,
                    'flex-width'           => true,
                    'unlink-homepage-logo' => false,
                ) );
                
            /*
            * Make theme available for translation.
            * Translations can be filed in the /languages/ directory.
            * If you're building a theme based on My Online Shop Product, use a find and replace
            * to change 'my-online-shop-product' to the name of your theme in all the template files.
            */
                $textdomain = 'my-online-shop-product';
                load_theme_textdomain( $textdomain, get_stylesheet_directory() . '/languages/' );
                
                add_theme_support( 'automatic-feed-links' );
                add_theme_support( "title-tag" );
                add_theme_support( 'post-thumbnails' );
                add_theme_support( "align-wide" );
                add_theme_support( "responsive-embeds" );
                add_theme_support( "wp-block-styles" );

                add_image_size( 'my-online-shop-product-slider-image', 2000, 1000, true );
                add_image_size( 'my-online-shop-product-product_cat-image', 600, 400, true );
                add_image_size( 'my-online-shop-product-thumbnail-avatar', 100, 100, true );
                add_image_size( 'my-online-shop-product-logo-image', 120, 60, true );

                add_theme_support( 'woocommerce', array(
                    "thumbnail_image_width" => 255,
                    "single_image_width" => 255,
                    "product_grid" => array(
                        'default_rows'    => 10,
                        'min_rows'        => 5,
                        'max_rows'        => 10,
                        'default_columns' => 3,
                        "min_columns" => 1,
                        "max_columns" => 4,
                    ),
                ) );

                add_theme_support( 'wc-product-gallery-zoom' );
                add_theme_support( 'wc-product-gallery-lightbox' );
                add_theme_support( 'wc-product-gallery-slider' );
            
            /*
            * Switch default core markup for search form, comment form, and comments
            * to output valid HTML5.
            */
                add_theme_support(
                    'html5',
                    array(
                        'search-form',
                        'comment-form',
                        'comment-list',
                        'gallery',
                        'caption',
                        'script',
                        'style',
                        'navigation-widgets',
                    )
                );
          
            // Add theme support for selective refresh for widgets.
                add_theme_support( 'customize-selective-refresh-widgets' );
                add_theme_support( 'custom-background', array(
                    'default-color' => 'ffffff'
                ) );

            /*
            * This theme styles the visual editor to resemble the theme style,
            * specifically font, colors, and column width.
            */
                // add_editor_style( array( 'assets/css/theme-css/my_online_shop_product_editor_style.css', my_online_shop_product_fonts_url() ) );  
            
                add_action('after_setup_theme','my_online_shop_product_add_theme_support'); 
        }
        add_action( 'after_setup_theme', 'my_online_shop_product_add_theme_support' );
    }

/**
* Modify posts_link.
*/
    add_filter('next_posts_link', 'my_online_shop_product_next_posts_link_attributes');
    function my_online_shop_product_next_posts_link_attributes(){
            return 'class="older"';
    }

    add_filter('previous_posts_link', 'my_online_shop_product_previous_posts_link_attributes');
    function my_online_shop_product_previous_posts_link_attributes(){
            return 'class="newer"';
    }

/**
* Register Customizer Css Color
*/
    function my_online_shop_product_customizer_header_output() {
        ?>
        <style type="text/css">
            :root {
                --section-text-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_section_title_text_color_setting_id', '#0000ff' ) ); ?>;
                --title-text-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_title_text_color_setting_id', '#81d742' ) ); ?>;
                --sub_title-text-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_sub_title_text_color_setting_id', '#dd3333' ) ); ?>;
                --main-text-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_normal_text_color_setting_id', '#111111' ) ); ?>;
                --quote-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_normal_text_color_setting_id', '#111111' ).'1A' ); ?>;  
                --link-text-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_link_text_color_setting_id', '#0d6efd' ) ); ?>;
                --section-bg-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_section_background_color_setting_id', '#f3f3f3' ) ) ?>;
                --sidebar-bg-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_side_bar_bg_color_setting_id', '#f2f1ed' ) ) ?>;
                --button-text-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_button_text_color_setting_id', '#a9e37c' ) ); ?>;
                --button-bg-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_button_background_color_setting_id', '#ffffff' ) ) ?>;
                --card-bg-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_card_background_color_setting_id', '#ffffff' ) ) ?>;

                --topbar-bg-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_top_bar_background_color_setting_id', '#5f92bf' ) ) ?>;
                --topbar-text-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_top_bar_text_color_setting_id', '#ffffff' ) ) ?>;
                --phone-icon-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_phone_icon_setting_id', '#1e73be' ) ) ?>;
                --email-icon-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_email_icon_setting_id', '#dd9933' ) ) ?>;
                --youtube-icon-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_youtube_icon_setting_id', '#dc2d09' ) ) ?>;
                --facebook-icon-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_facebook_icon_setting_id', '#1e73be' ) ) ?>;
                --twitter-icon-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_twitter_icon_setting_id', '#b1cf7b' ) ) ?>;
                --instagram-icon-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_instagram_icon_setting_id', '#81d742' ) ) ?>;
                --linkedin-icon-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_linkedin_icon_setting_id', '#00a9cf' ) ) ?>;
                --navbar-bg-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_nav_bar_background_color_setting_id', '#111111' ) ) ?>;
                --sub-navbar-bg-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_nav_bar_sub_menu_background_color_setting_id', '#222222' ) ) ?>;
                --navbar-text-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_nav_bar_text_color_setting_id', '#ffffff' ) ) ?>;
                --navbar-text-color-blur: <?php echo esc_attr( get_option ( 'my_online_shop_product_nav_bar_text_color_setting_id', '#ffffff' ).'40' ) ?>;
                --overlay-bg-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_nav_bar_background_color_setting_id', '#111111' ).'80') ?>;

                --footer-bg-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_footer_add_global_item_footer_background_color_setting_id', '#000000') ) ?>;
                --footer-text-color: <?php echo esc_attr( get_option('my_online_shop_product_footer_add_global_item_footer_text_color_setting_id', '#ffffff') ) ?>;
                --footer-text-color-blur: <?php echo esc_attr( get_option('my_online_shop_product_footer_add_global_item_footer_text_color_setting_id', '#ffffff').'1A' ) ?>;
                --hover-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_hover_effect_color_setting_id', '#63c6d4') ) ?>;
                --active-color: <?php echo esc_attr( get_option ( 'my_online_shop_product_active_effect_color_setting_id', '#44bbff') ) ?>;
            }
        </style>
        <?php

    }
    add_action( 'wp_head', 'my_online_shop_product_customizer_header_output' );

/**
* Woocomerce
*/
    if(class_exists("WooCommerce")){
        /**
         * Change number of related products output
         */ 
        add_filter( 'woocommerce_output_related_products_args', 'my_online_shop_product_related_products_args', 20 );
        function my_online_shop_product_related_products_args( $args ) {
            $args['posts_per_page'] = 12; // 12 related products
            return $args;
        }

        /**
         * Show cart contents / total Ajax
         */
        add_filter( 'woocommerce_add_to_cart_fragments', 'my_online_shop_product_header_add_to_cart_fragment' );
        function my_online_shop_product_header_add_to_cart_fragment( $fragments ) {
            global $woocommerce;
            ob_start();
            ?>
            <span class="items"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
            <?php
            $fragments['span.items'] = ob_get_clean();
            return $fragments;
        }
    }

/**
* Register SideBar.
*/
    function my_online_shop_product_widgets_init(){

        register_sidebar( array(
            'name'          => esc_html__( 'Blog Sidebar', "my-online-shop-product" ),
            'id'            => 'my_online_shop_product_sidebar_1',
            'description'   => esc_html__( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', "my-online-shop-product" ),
            'before_widget' => '<section id="%1$s" class="widget main-side-bar %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Shop Sidebar', "my-online-shop-product" ),
            'id'            => 'my_online_shop_product_sidebar_shop',
            'description'   => esc_html__( 'Add widgets here to appear in your sidebar on Shop page.', "my-online-shop-product" ),
            'before_widget' => '<section id="%1$s" class="widget main-side-bar %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );


        register_sidebar( array(
            'name'          => esc_html__( 'Footer-1', "my-online-shop-product"),
            'id'            => 'my_online_shop_product_footer_1',
            'description'   => esc_html__( 'Add widget to footer area 3' , "my-online-shop-product" ),
            'before_widget' => '<section id="%1$s" class="widget footer-1 %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    
        register_sidebar( array(
            'name'          => esc_html__( 'Footer-2', "my-online-shop-product"),
            'id'            => 'my_online_shop_product_footer_2',
            'description'   => esc_html__( 'Add widget to footer area 4' , "my-online-shop-product" ),
            'before_widget' => '<section id="%1$s" class="widget footer-2 %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ) );
    }   
    add_action( 'widgets_init', 'my_online_shop_product_widgets_init' );

    function my_online_shop_product_body_classes( $classes ) {

        // Adds a class of no-sidebar to sites without active sidebar.
        if ( !is_active_sidebar( 'my_online_shop_product_sidebar_1' ) ) {
            $classes[] = 'no-sidebar-1';
        }
    
        if ( !is_active_sidebar( 'my_online_shop_product_sidebar_shop' ) ) {
            $classes[] = 'no-sidebar-shop';
        }
    
        if ( !is_active_sidebar( 'my_online_shop_product_footer_1' )) {
            $classes[] = 'no-sidebar-footer-1';
        }

        if ( !is_active_sidebar( 'my_online_shop_product_footer_2' ) ) {
            $classes[] = 'no-sidebar-footer-2';
        }
    
        return $classes;
    }
    add_filter( 'body_class', 'my_online_shop_product_body_classes' );
    

/**
 * Adds a shim to wp_body_open backwards compatibility
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
			do_action( 'wp_body_open' );
	}
}


