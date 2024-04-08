<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="my_online_shop_product_section product related products">
		<?php
			$my_online_shop_product_related_products_section_title_text  	= get_theme_mod( 'my_online_shop_product_related_product_section_title_text_setting_id' , 'Related Products' );
			$my_online_shop_product_related_products_section_slider_per_view = get_theme_mod( 'my_online_shop_product_related_product_section_card_per_view_setting_id' , 4);
			$my_online_shop_product_more_link_text 						= get_theme_mod ( 'my_online_shop_product_global_read_more_btn_text_id', 'Read More' );
		?>

		<div class="my_online_shop_product_section_title_box">
			<h2 class="section_title"><?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_related_products_section_title_text ); ?></h2>
			<a class="my_online_shop_product_view_detail_btn" href="<?php echo esc_url(get_post_type_archive_link('product')) ?>">                                         
				<span><?php printf( esc_html__( '%s', 'my-online-shop-product' ), $my_online_shop_product_more_link_text ); ?></span>
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16"> 
					<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
				</svg>                        
			</a>
		</div>  	
		<div class="section-content">
			<input type="hidden" id="my_online_shop_product_related_products_section_per_view" value="<?php echo absint( $my_online_shop_product_related_products_section_slider_per_view ) ?>"> 
			<div class="my_online_shop_product_related_product_container swiper"> 
				<div class="swiper-wrapper">
					<?php foreach ( $related_products as $related_product ) : ?>
						<div class="swiper-slide">
							<?php
							$post_object = get_post( $related_product->get_id() );
							setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
							wc_get_template_part( 'content', 'product' );
							?>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="mmy_online_shop_product_related_product swiper-pagination"></div>
				<div class="my_online_shop_product_related_product swiper-button-next"></div>
				<div class="my_online_shop_product_related_product swiper-button-prev"></div>
			</div>
			
		</div>
	</section>

	<?php
endif;
wp_reset_postdata();

