<?php
/*
* This theme is using the One Click Demo Import Plugin (optional) for 
* importing demo data
*/

 function my_online_shop_product_after_import_setup() {
	// Assign menus to their locations.
	$main_menu = get_term_by( 'name', 'Main Nav Menu', 'nav_menu' );
	$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
 
	set_theme_mod( 'nav_menu_locations', array(
		   'main_nav_menu' => $main_menu->term_id,
		    'footer_menu' 	 => $footer_menu->term_id,
	    )
	);
 
	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blogs' );
 
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
 
 }
 add_action( 'ocdi/after_import', 'my_online_shop_product_after_import_setup' );