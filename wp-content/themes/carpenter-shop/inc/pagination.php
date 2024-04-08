<?php
/**
 *
 * Pagination Functions
 *
 * @package Carpenter Shop
 */

if( !function_exists('carpenter_shop_archive_pagination_x') ):

	// Archive Page Navigation
	function carpenter_shop_archive_pagination_x(){

		the_posts_pagination();
	}

endif;
add_action('carpenter_shop_archive_pagination','carpenter_shop_archive_pagination_x',20);