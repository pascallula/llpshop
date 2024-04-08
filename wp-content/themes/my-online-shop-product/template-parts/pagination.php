<?php
/**
 * Template part for displaying page pagination
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
  
    the_posts_pagination( array(
        'prev_text'          => esc_html__( '<< Previous', "my-online-shop-product" ),
        'next_text'          => esc_html__( 'Next >>', "my-online-shop-product" ),
        'screen_reader_text' => esc_html__( 'Post Navigation', "my-online-shop-product" ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', "my-online-shop-product" ) . ' </span>'
    ) );

?>