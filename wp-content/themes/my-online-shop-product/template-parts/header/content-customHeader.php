<?php
/**
 * Template part for Custom Header
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

?>
<div class="my-online-shop-product-custom-header-wrapper">
    <img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" loading="lazy" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">           
</div> 



             