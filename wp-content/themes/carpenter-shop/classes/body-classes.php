<?php
/**
* Body Classes.
* @package Carpenter Shop
*/
 
 if (!function_exists('carpenter_shop_body_classes')) :

    function carpenter_shop_body_classes($classes) {

        $carpenter_shop_default = carpenter_shop_get_default_theme_options();
        global $post;
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        }

        $carpenter_shop_global_sidebar_layout = esc_html( get_theme_mod( 'global_sidebar_layout',$carpenter_shop_default['global_sidebar_layout'] ) );

        if ( is_active_sidebar( 'sidebar-1' ) ) {
            if( is_single() || is_page() ){
                $carpenter_shop_post_sidebar = esc_html( get_post_meta( $post->ID, 'carpenter_shop_post_sidebar_option', true ) );
                if (empty($carpenter_shop_post_sidebar) || ($carpenter_shop_post_sidebar == 'global-sidebar')) {
                    $classes[] = esc_attr( $carpenter_shop_global_sidebar_layout );
                } else{
                    $classes[] = esc_attr( $carpenter_shop_post_sidebar );
                }
            }else{
                $classes[] = esc_attr( $carpenter_shop_global_sidebar_layout );
            }
            
        }
        
        return $classes;
    }

endif;

add_filter('body_class', 'carpenter_shop_body_classes');