<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
		$my_online_shop_product_newness_day = 10;
		$my_online_shop_product_created_day = strtotime($product->get_date_created()); 
		$my_online_shop_product_newProduct = (time() - (60 * 60 * 24 * $my_online_shop_product_newness_day) < $my_online_shop_product_created_day) ? true: false;
		$my_online_shop_product_is_product_on_sale = $product->is_on_sale();
		$my_online_shop_product_thumbnail_url = get_the_post_thumbnail_url( $product->get_id() );

	?>
	<div class="my_online_shop_product_card_box product woocommerce">
		<?php if( $my_online_shop_product_newProduct ): ?>
			<div class="new-product-banner text">
				<?php esc_html_e( 'New',"my-online-shop-product"); ?>
			</div>
		<?php endif; ?> 
		<?php if( $my_online_shop_product_is_product_on_sale ): ?>
			<div class="sale-product-banner text">
				<?php esc_html_e( 'Sale!',"my-online-shop-product"); ?>
			</div>
		<?php endif; ?>
		<div class="card-header">
			<a href="<?php echo esc_url(get_permalink( $product->get_id() )) ?>">	
				<?php if( !empty( $my_online_shop_product_thumbnail_url ) ): ?>
					<img src="<?php echo esc_url( $my_online_shop_product_thumbnail_url ) ?>" loading="lazy" alt="<?php printf( esc_attr__( '%s', 'my-online-shop-product' ), $product->get_name() ); ?>"> 
				<?php else: ?>
					<div class=".my_online_shop_product_card_no_image_box">
						<?php esc_html_e( 'No Image',"my-online-shop-product"); ?>
					</div>
				<?php endif; ?>
				<div class="my_online_shop_product_overlay">
					<div class="text-custom-tooltip" data-bs-custom-class="custom-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="<?php esc_attr_e( 'View detail', "my-online-shop-product" ); ?>">
						<span><i class="fa-solid fa-eye"></i></span>
					</div>
				</div>
			</a>
		</div>  
		
		<div class="card-body">	
			<p class="product-meta"><span><?php esc_html_e( 'Category:', "my-online-shop-product" ); ?></span>&nbsp;<?php printf( esc_html__( ' %s', 'my-online-shop-product' ), ucfirst( $product->get_categories() ) ); ?></p>
			<h4 class="product-title"><?php printf( esc_html__( '%s', 'my-online-shop-product' ), ucfirst( $product->get_name() ) ); ?></h4>
			<p class="product-price"><strong><?php esc_html_e( 'Price: ', "my-online-shop-product" ); ?></strong>&nbsp;<span><?php printf( esc_html__( '%s', 'my-online-shop-product' ), $product->get_price_html() ); ?></span></p>	
			<?php
				$my_online_shop_product_rating_count = $product->get_rating_count();
				$my_online_shop_product_average = $product->get_average_rating();
				$my_online_shop_product_review_count = $product->get_review_count();
			?>	
			<div class="woocommerce-product-rating">		
				<?php
					echo '<div class="star-rating"><span style="width:'.( ( $my_online_shop_product_average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$my_online_shop_product_average.'</strong> '.esc_html__( 'out of 5', "my-online-shop-product" ).'</span></div>';
				?>	
				<?php if ( $my_online_shop_product_rating_count > 0 ) : ?>
					<?php if ( comments_open() ) : ?>
						<?php //phpcs:disable ?>
						<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s review', '%s reviews', $my_online_shop_product_review_count, "my-online-shop-product" ), '<span class="count">' . esc_html( $my_online_shop_product_review_count ) . '</span>' ); ?>)</a>
						<?php // phpcs:enable ?>
					<?php endif ?>
				<?php endif; ?>
			</div>
		</div>  
	</div>
</li>
