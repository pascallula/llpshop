<?php
/**
 * Template part to displaying News content on News Section
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

	$my_online_shop_product_news_query = new WP_Query(array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
		'posts_per_page' 	=> 12
	));
	$my_online_shop_product_section_slider_per_view = get_theme_mod( 'my_online_shop_product_card_per_view_setting_id', 4 );
	$my_online_shop_product_more_link_text = get_theme_mod ( 'my_online_shop_product_global_read_more_btn_text_id', 'Read More' );
?>

<div class="section-content">

 	<?php if( $my_online_shop_product_news_query->have_posts() ): ?>
		<input type="hidden" id="my_online_shop_product_section_per_view" value="<?php echo absint( $my_online_shop_product_section_slider_per_view ) ?>"> 
		<div class="my_online_shop_product_news_container swiper"> 
			<div class="swiper-wrapper">
				<?php while ( $my_online_shop_product_news_query->have_posts() ) : $my_online_shop_product_news_query->the_post();?>
					<div class="swiper-slide">
						<div class="my_online_shop_product_card_box news" id="post-<?php the_ID(); ?>" <?php post_class("content_post"); ?>>
							<div class="card-header">
								<?php $thumbnail_url = get_the_post_thumbnail_url( get_the_ID() ) ?>
								<?php if($thumbnail_url): ?>
									<img src="<?php echo esc_url($thumbnail_url) ?>" alt="<?php echo esc_attr( the_title() ); ?>">
								<?php else: ?>
									<div class="my_online_shop_product_card_no_image_box">
										<h2><?php esc_html_e( 'No Image', "my-online-shop-product"); ?></h2>
									</div>
								<?php endif; ?>	
							</div>
							<div class="card-body">
								<div class="entry-header">
									<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
									<?php
										$categories = get_the_category(); 
									?>
									<?php if(!empty($categories) && !is_wp_error($categories)): ?>
									<p class="meta">
										<span><?php esc_html_e( "Category:", 'my-online-shop-product' ) ?></span>&nbsp;
										<?php foreach($categories as $name => $category):?>
											<a href="<?php echo esc_url(get_category_link($category->cat_ID)); ?>">
												<span><?php printf( esc_html__( '%s ,', 'my-online-shop-product' ), $category->cat_name ) ?></span> 
											</a>    
										<?php endforeach;?>
									</p>	
									<?php endif; ?>   
									<hr> 
								</div>
								<div class="entry-excerpt">
									<p>
										<?php printf( esc_html__( '%s', 'my-online-shop-product' ), substr(get_the_excerpt(), 0, 120)."<small> [...]</small>" )?>
									</p>
									<?php 
										printf(
											esc_html__( "%s", "my-online-shop-product" ),
											"<a class='my_online_shop_product_view_detail_btn' href='".esc_url(get_permalink( get_the_ID() ))."'>".$my_online_shop_product_more_link_text."
											<span>
											<svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-arrow-right' viewBox='0 0 16 16'>
											<path fill-rule='evenodd' d='M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8'/>
										</svg>
											</span>
											</a>"
										);
									?>  
								</div>
							</div>
							
						</div>
						
					</div>
				<?php endwhile; ?> 
				<?php wp_reset_postdata(); ?> 
			</div>
			<div class="my_online_shop_product_news swiper-pagination"></div>
			<div class="my_online_shop_product_news swiper-button-next"></div>
			<div class="my_online_shop_product_news swiper-button-prev"></div>
		</div>

	<?php else: ?>
		<div class="my_online_shop_product_no_posts py-5">
			<p class="text"><?php esc_html_e( 'These section will be displaying Post',"my-online-shop-product" ); ?></p>
		</div>
	<?php endif; ?>

</div>