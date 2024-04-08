<?php
/**
 * Template part for displaying Section Category content on template-home.php
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

	$my_online_shop_product_terms = get_terms( array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => true,
		'parent'     => 0,
	) );
	
	$my_online_shop_product_category_section_slider_per_view = get_theme_mod( 'my_online_shop_product_category_section_slider_per_view_setting_id', 3 );
?>

<div class="section-content">
	<?php if(!empty( $my_online_shop_product_terms ) && !is_wp_error( $my_online_shop_product_terms )): ?>
		<input type="hidden" id="my_online_shop_product_category_section_slider_per_view" value="<?php echo absint( $my_online_shop_product_category_section_slider_per_view ) ?>"> 
		<div class="my_online_shop_product_category_container swiper"> 
			<div class="swiper-wrapper">
				<?php foreach( $my_online_shop_product_terms as $my_online_shop_product_term): ?>
					<?php 
						$my_online_shop_product_cat_thumbnail_id = get_term_meta( $my_online_shop_product_term->term_id, 'thumbnail_id', true );
						$my_online_shop_product_cat_img_url = wp_get_attachment_image_url( $my_online_shop_product_cat_thumbnail_id, "my-online-shop-product-product_cat-image" );
					?>
					<div class="my_online_shop_product_card_category my_online_shop_product_card_box swiper-slide">
						<div class="card-header">
							<a href="<?php echo esc_url( get_term_link($my_online_shop_product_term) ); ?>">
								<?php if( !empty( $my_online_shop_product_cat_img_url ) ): ?>
									<img src="<?php echo esc_url( $my_online_shop_product_cat_img_url ) ?>" loading="lazy" alt="<?php printf( esc_attr__( '%s', 'my-online-shop-product' ), $my_online_shop_product_term->name ); ?>"> 
								<?php else: ?>
									<div class="my_online_shop_product_card_no_image_box">
										<?php esc_html_e( 'No Image',"my-online-shop-product"); ?>
									</div>
								<?php endif; ?>
								
								<div class="my_online_shop_product_overlay">
									<div class="text-custom-tooltip title" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php esc_attr_e( 'View detail', "my-online-shop-product" ); ?>">
										<span><i class="fa-solid fa-eye"></i></span>
									</div>
								</div>
							</a>		
						</div>  
						<div class="card-body">
							<h4 class="card-title title"><?php printf( esc_html__( '%s', 'my-online-shop-product' ), ucfirst( $my_online_shop_product_term->name ) ); ?></h4>
						</div>  			
					</div>
				<?php endforeach; ?>
			</div>
			<div class="my_online_shop_product_category_product swiper-pagination my_online_shop_product_pagination"></div>
			<div class="my_online_shop_product_category_product swiper-button-next my_online_shop_product_navigation_button_next"></div>
			<div class="my_online_shop_product_category_product swiper-button-prev my_online_shop_product_navigation_button_prev"></div>
		</div>
	<?php else: ?>
		<div class="my_online_shop_product_no_posts py-5">
			<p class="text"><?php esc_html_e( 'These section will be displaying all parent Category',"my-online-shop-product"); ?></p>
		</div>
	<?php endif; ?>
</div>