<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

 if(!class_exists('My_Online_Shop_Product_Custom_Header')){

    class My_Online_Shop_Product_Custom_Header{

        public function __construct()
        {
            add_action( 'after_setup_theme', [$this, 'my_online_shop_product_register_custom_header'] );
        }

        public function my_online_shop_product_register_custom_header(){

            $args = array(
                'default-text-color' => 'fff',
                'header-text' 		 =>	false,
                'width'              => 1600,
                'height'             => 400,
                'flex-width'         => true,
                'flex-height'        => true,
            );
            add_theme_support( 'custom-header', $args );
        }

    }

    new  My_Online_Shop_Product_Custom_Header();

 }

