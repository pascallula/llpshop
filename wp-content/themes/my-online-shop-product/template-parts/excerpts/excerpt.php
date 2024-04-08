<?php
/**
 * Template part for displaying Excerpt
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

  $more_link_text = get_theme_mod ( 'my_online_shop_product_global_read_more_btn_text_id', 'Read More' );
?>
<?php if( has_excerpt() ): ?>
	<?php the_excerpt(); ?>
	<a class="my_online_shop_product_view_detail_btn" href="<?php echo esc_html( get_permalink() ) ?>">
		<?php printf(esc_html__( "%s", "my-online-shop-product"), $more_link_text ); ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
		</svg>
     </a>
<?php elseif( strpos( $post->post_content, '<!--more-->' ) ): ?>
	<?php the_content( '' ); ?>
	<a class="my_online_shop_product_view_detail_btn" href="<?php echo esc_html( get_permalink() ) ?>">
		<?php printf(esc_html__( "%s", "my-online-shop-product"), $more_link_text ); ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
		</svg>
    </a>
<?php else: ?>
	<?php the_excerpt(); ?>
	<a class="my_online_shop_product_view_detail_btn" href="<?php echo esc_html( get_permalink() ) ?>">
		<?php printf(esc_html__( "%s", "my-online-shop-product"), $more_link_text ); ?>
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
			<path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
		</svg>
     </a>	
<?php endif; ?>