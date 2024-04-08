<?php
/**
 * Template for displaying search forms in My Online Shop Product
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

?>
<?php $my_online_shop_product_unique_id = uniqid( 'search-form-' ) ; ?>

<form role="search" method="get" class="my_online_shop_product_search_form" action="<?php echo esc_url(home_url( '/' )); ?>">
	<input type="search" id="<?php printf( esc_attr__( '%s', 'my-online-shop-product' ), $my_online_shop_product_unique_id ); ?>" class="search_field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'my-online-shop-product'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit">
		<span><i class="fa-solid fa-magnifying-glass"></i></span>
		<span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'my-online-shop-product' ); ?></span>
	</button>
	<?php if( class_exists( 'WooCommerce' ) ): ?>
		<input type="hidden" value="product" name="post_type" id="post_type" />
	<?php endif; ?>
</form>