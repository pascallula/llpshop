<?php
/**
 * Template part for displaying Section Hot Sale Product content on template-home.php
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

 	$my_online_shop_product_deal_product_id 			= get_theme_mod( 'my_online_shop_product_deal_product_ID_setting_id', 0 );
	$my_online_shop_product_deal_product_section_title 	= get_theme_mod( 'my_online_shop_product_deal_product_section_title_setting_id', "Hot Sale!!!" );
	$my_online_shop_product_deal_product_section_bg_img_id = get_theme_mod( 'my_online_shop_product_deal_product_background_image_setting_id', 0 );
	$my_online_shop_product_deal_bg_img_url = wp_get_attachment_image_url( $my_online_shop_product_deal_product_section_bg_img_id, "full");
	
?>
	<?php if( !empty( $my_online_shop_product_deal_product_id ) && !is_wp_error( $my_online_shop_product_deal_product_id ) ): ?>
		<?php

			$my_online_shop_product_currency 		= get_woocommerce_currency_symbol();
			$my_online_shop_product_regular 		= get_post_meta( $my_online_shop_product_deal_product_id, '_regular_price', true);
			$my_online_shop_product_sale 			= get_post_meta( $my_online_shop_product_deal_product_id, '_sale_price', true);
			$my_online_shop_product_discount_pecent =  absint( 100 - ( ( $my_online_shop_product_sale/$my_online_shop_product_regular ) * 100) );
		?>
		<div class="my_online_shop_product_hot_sales_box">
			<div class="title-box">
				<h2 class="section_title">
					<?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_deal_product_section_title ) ?>
				</h2>
				<h4 class="sub_title">
					<?php printf( esc_html__( '%s OFF', 'my-online-shop-product' ), $my_online_shop_product_discount_pecent."%" ) ?>
				</h4>
			</div>
			<div class="product-box post-<?php echo absint( $my_online_shop_product_deal_product_id) ; ?>">
				<h4 class="product-name"><?php echo esc_html( get_the_title( $my_online_shop_product_deal_product_id) ); ?></h4>
				<div class="product-price-box">
					<h5 class="regular-price">
						<?php printf( esc_html__( '%1$s %2$s', 'my-online-shop-product' ), $my_online_shop_product_currency, $my_online_shop_product_regular ) ?>
					</h5>
					<h5 class="sale-price">
						<?php printf( esc_html__( '%1$s %2$s', 'my-online-shop-product' ), $my_online_shop_product_currency, $my_online_shop_product_sale ) ?>
					</h5>
				</div>
				<p class="product-excerpt"><?php echo esc_html( get_the_excerpt( $my_online_shop_product_deal_product_id ) ); ?></p>
				<a  class="my_online_shop_product_button" href="<?php echo esc_url( get_permalink( $my_online_shop_product_deal_product_id ) ); ?>"> 		                     
					<?php esc_html_e( 'View Product',"my-online-shop-product"); ?>                  	
				</a> 
			</div>
		</div>
	<?php endif; ?>
	<?php if( !empty( $my_online_shop_product_deal_bg_img_url ) && !is_wp_error( $my_online_shop_product_deal_bg_img_url ) ): ?>
		<img src="<?php echo esc_url( $my_online_shop_product_deal_bg_img_url ) ?>" loading="lazy" alt="<?php echo  esc_attr(  get_the_title($my_online_shop_product_deal_product_id) ); ?>"> 
	<?php else: ?>
		<div class="no-image-card-box title">
			<?php esc_html_e( 'No Image',"my-online-shop-product"); ?>
		</div>
	<?php endif; ?>	


