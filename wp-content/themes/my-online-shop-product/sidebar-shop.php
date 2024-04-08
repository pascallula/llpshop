<?php
/**
* The sidebar containing the main widget For Shop Page
* @package My Online Shop Product
* @subpackage my_online_shop_product
*/
?>

<?php if ( is_active_sidebar( 'my_online_shop_product_sidebar_shop' ) ): ?>
	<div id="my_online_shop_product_sidebar secondary" class="my_online_shop_product_sidebar widget-area" role="shop-sidebar" aria-label="<?php esc_attr_e( 'Shop Sidebar', "my-online-shop-product" ); ?>"> 
        <?php dynamic_sidebar('my_online_shop_product_sidebar_shop'); ?>         
    </div>	
<?php endif; ?>