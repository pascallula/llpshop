<?php
/**
* Widget Functions.
*
* @package Carpenter Shop
*/

function carpenter_shop_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'carpenter-shop'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'carpenter-shop'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $carpenter_shop_default = carpenter_shop_get_default_theme_options();
    $carpenter_shop_footer_column_layout = absint( get_theme_mod( 'footer_column_layout',$carpenter_shop_default['footer_column_layout'] ) );

    for( $i = 0; $i < $carpenter_shop_footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','carpenter-shop'); }
    	if( $i == 1 ){ $count = esc_html__('Two','carpenter-shop'); }
    	if( $i == 2 ){ $count = esc_html__('Three','carpenter-shop'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'carpenter-shop').$count,
	        'id' => 'carpenter-shop-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'carpenter-shop'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'carpenter_shop_widgets_init');