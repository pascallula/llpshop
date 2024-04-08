<?php
/**
* The sidebar containing the main widget area
* @package My Online Shop Product
* @subpackage my_online_shop_product
*/

if ( ! is_active_sidebar( 'my_online_shop_product_sidebar_1' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'my_online_shop_product_sidebar_1' ) ) : ?>
    <div id="my_online_shop_product_sidebar secondary" class="my_online_shop_product_sidebar widget-area" role="blog-sidebar" aria-label="<?php esc_attr_e( 'Blog Sidebar', "my-online-shop-product" ); ?>">
        <?php dynamic_sidebar('my_online_shop_product_sidebar_1'); ?>     
    </div>
<?php endif;  ?>
