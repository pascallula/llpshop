<?php
/**
* Custom Functions.
*
* @package Carpenter Shop
*/

if( !function_exists( 'carpenter_shop_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function carpenter_shop_sanitize_sidebar_option( $carpenter_shop_input ){

        $carpenter_shop_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $carpenter_shop_input,$carpenter_shop_metabox_options ) ){

            return $carpenter_shop_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'carpenter_shop_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function carpenter_shop_sanitize_checkbox( $carpenter_shop_checked ) {

		return ( ( isset( $carpenter_shop_checked ) && true === $carpenter_shop_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'carpenter_shop_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function carpenter_shop_sanitize_select( $carpenter_shop_input, $carpenter_shop_setting ) {
        $carpenter_shop_input = sanitize_text_field( $carpenter_shop_input );
        $choices = $carpenter_shop_setting->manager->get_control( $carpenter_shop_setting->id )->choices;
        return ( array_key_exists( $carpenter_shop_input, $choices ) ? $carpenter_shop_input : $carpenter_shop_setting->default );
    }

endif;