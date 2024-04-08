<?php
/**
 * Template part for displaying Section New Arrival Product content on template-home.php
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

	$my_online_shop_product_new_arrival_query = new WP_Query(array(
		'post_type' => 'product',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' 	=> 12
	));

	$my_online_shop_product_section_slider_per_view = get_theme_mod( 'my_online_shop_product_card_per_view_setting_id', 4 );

?>
<div class="section-content">
 	<?php if( $my_online_shop_product_new_arrival_query->have_posts() ): ?>
		<input type="hidden" id="my_online_shop_product_section_per_view" value="<?php echo absint( $my_online_shop_product_section_slider_per_view ) ?>"> 
		<div class="my_online_shop_product_new_arrival_product_container swiper"> 
			<div class="swiper-wrapper">
				<?php while ( $my_online_shop_product_new_arrival_query->have_posts() ) : $my_online_shop_product_new_arrival_query->the_post();?>
					<div class="swiper-slide">
						<?php 							
							$post_object = get_post( get_the_ID() );
							setup_postdata( $GLOBALS['post'] =& $post_object ); 
							wc_get_template_part( 'woocommerce/content', 'product' );
						?> 
					</div>
				<?php endwhile; ?> 
				<?php wp_reset_postdata(); ?> 
			</div>
			<div class="my_online_shop_product_new_arrival_product swiper-pagination"></div>
			<div class="my_online_shop_product_new_arrival_product swiper-button-next"></div>
			<div class="my_online_shop_product_new_arrival_product swiper-button-prev"></div>
		</div>
	<?php else: ?>
		<div class="my_online_shop_product_no_posts py-5">
			<p class="text"><?php esc_html_e( 'These section will be displaying New Arrival Product',"my-online-shop-product" ); ?></p>
		</div>
	<?php endif; ?>

</div>