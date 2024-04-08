<?php
/**
 * Default Values.
 *
 * @package Carpenter Shop
 */

if ( ! function_exists( 'carpenter_shop_get_default_theme_options' ) ) :
	function carpenter_shop_get_default_theme_options() {

		$carpenter_shop_defaults = array();
		
		// Options.
        $carpenter_shop_defaults['logo_width_range']                                  = 300;
		$carpenter_shop_defaults['global_sidebar_layout']					            = 'right-sidebar';

        $carpenter_shop_defaults['carpenter_shop_header_layout_topbar_text']      = esc_html__( 'Fast Austrelia Wide Shipping & support@example.com', 'carpenter-shop' );


        $carpenter_shop_defaults['carpenter_shop_header_layout_wishlist_text']      = esc_html__( 'Wishlist', 'carpenter-shop' );
        $carpenter_shop_defaults['carpenter_shop_header_layout_wishlist_link']      = esc_url( 'https://www.google.com/', 'carpenter-shop' );
        $carpenter_shop_defaults['carpenter_shop_header_layout_compare_text']      = esc_html__( 'Compare', 'carpenter-shop' );
        $carpenter_shop_defaults['carpenter_shop_header_layout_compare_link']      = esc_url( 'https://www.google.com/', 'carpenter-shop' );
            
        $carpenter_shop_defaults['carpenter_shop_header_layout_phone_number']       = '+11 231 456 7890';


        $carpenter_shop_defaults['carpenter_shop_homepage_section_shipping_title']      = esc_html__( 'Free Shipping', 'carpenter-shop' );
        $carpenter_shop_defaults['carpenter_shop_homepage_section_shipping_text']      = esc_html__( 'Free Delivery Worldwide', 'carpenter-shop' );

        $carpenter_shop_defaults['carpenter_shop_homepage_section_exchange_title']      = esc_html__( 'Return Exchange', 'carpenter-shop' );
        $carpenter_shop_defaults['carpenter_shop_homepage_section_exchange_text']       = esc_html__( 'Return Exchange 20 Days', 'carpenter-shop' );

        $carpenter_shop_defaults['carpenter_shop_homepage_section_support_title']      = esc_html__( 'Quality Support', 'carpenter-shop' );
        $carpenter_shop_defaults['carpenter_shop_homepage_section_support_text']       = esc_html__( 'Free Support Online 24/7', 'carpenter-shop' );

        $carpenter_shop_defaults['carpenter_shop_homepage_section_shopping_title']      = esc_html__( 'Safe Shopping', 'carpenter-shop' );
        $carpenter_shop_defaults['carpenter_shop_homepage_section_shopping_text']       = esc_html__( 'Ensure Genuine 100%', 'carpenter-shop' );

        $carpenter_shop_defaults['carpenter_shop_pagination_layout']         = 'numeric';
		$carpenter_shop_defaults['footer_column_layout'] 						 = 3;
		$carpenter_shop_defaults['footer_copyright_text'] 				     = esc_html__( 'All rights reserved.', 'carpenter-shop' );
        $carpenter_shop_defaults['twp_navigation_type']              			 = 'theme-normal-navigation';
        $carpenter_shop_defaults['carpenter_shop_post_author']                		= 1;
        $carpenter_shop_defaults['carpenter_shop_display_archive_post_sticky_post']            = 1;
        $carpenter_shop_defaults['carpenter_shop_display_archive_post_category']            = 1;
        $carpenter_shop_defaults['carpenter_shop_display_archive_post_title']            = 1;
        $carpenter_shop_defaults['carpenter_shop_display_archive_post_content']            = 1;
        $carpenter_shop_defaults['carpenter_shop_display_archive_post_button']            = 1;
        $carpenter_shop_defaults['carpenter_shop_post_date']                		= 1;
        $carpenter_shop_defaults['carpenter_shop_post_category']                	= 1;
        $carpenter_shop_defaults['carpenter_shop_post_tags']                		= 1;
        $carpenter_shop_defaults['carpenter_shop_floating_next_previous_nav']       = 1;
        $carpenter_shop_defaults['carpenter_shop_header_banner']               		= 0;
        $carpenter_shop_defaults['carpenter_shop_display_header_title']        = 1;
        $carpenter_shop_defaults['carpenter_shop_product_section']                  = 0;
        $carpenter_shop_defaults['carpenter_shop_sticky']                 = 0;

        $carpenter_shop_defaults['carpenter_shop_product_heading']      = esc_html__( 'Featured Products', 'carpenter-shop' );

        $carpenter_shop_defaults['carpenter_shop_product_button_text']      = esc_html__( 'View All', 'carpenter-shop' );
        $carpenter_shop_defaults['carpenter_shop_product_button_link']      = esc_url( 'https://www.google.com/', 'carpenter-shop' );
        
        $carpenter_shop_defaults['carpenter_shop_background_color']               	= '#fff';

		// Pass through filter.
		$carpenter_shop_defaults = apply_filters( 'carpenter_shop_filter_default_theme_options', $carpenter_shop_defaults );

		return $carpenter_shop_defaults;
	}
endif;
