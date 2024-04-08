<?php
/**
 * Template part for displaying post 
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */
    
    $my_online_shop_product_card_column_config  = get_theme_mod('my_online_shop_product_template_column_setting_id', 1);
  
?>
<div class="row row-cols-1 row-cols-md-<?php echo esc_html(  $my_online_shop_product_card_column_config  ) ?> g-5">
     <?php while( have_posts() ): the_post();?>   
          <div class="col">
			<?php if( $my_online_shop_product_card_column_config == 1 ): ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class("my_online_shop_product_content post"); ?>>
					<?php if( has_post_thumbnail() ): ?>
						<div class="row">
							<div class="col-12 col-md-5">
								<div class="card-header one-column">
									<img src="<?php echo esc_url( get_the_post_thumbnail_url(get_the_ID()) ) ?>" class="img-fluid" loading="lazy" alt="<?php echo esc_attr( the_title() ); ?>">
								</div>
							</div>
							<div class="col-12 col-md-7">
								<div class="card-body">
									<div class="entry-header">
										<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
										<?php  get_template_part('template-parts/content', 'meta'); ?>      
										<hr> 
									</div>
									<div class="entry-excerpt">
										<?php  get_template_part('template-parts/excerpts/excerpt'); ?>   
									</div>  
								</div> 
							</div>
						</div>
					<?php else: ?>
						<div class="card-body">
							<div class="entry-header">
								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
								<?php  get_template_part('template-parts/content', 'meta'); ?>      
								<hr> 
							</div>
							<div class="entry-excerpt">
								<?php  get_template_part('template-parts/excerpts/excerpt'); ?>   
							</div>  
						</div> 
					<?php endif; ?>
				</article>
			<?php else: ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class("my_online_shop_product_content post"); ?>>	
					<?php $thumbnail_url = get_the_post_thumbnail_url(get_the_ID()) ?>
					<?php if($thumbnail_url): ?>     
						<div class="card-header">
							<img src="<?php echo esc_url($thumbnail_url) ?>" class="img-fluid" alt="<?php echo esc_attr( the_title() ); ?>">
						</div>
						<div class="card-body">
							<div class="entry-header">
								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
								<?php  get_template_part('template-parts/content', 'meta'); ?>      
								<hr>  
							</div>
							<div class="entry-excerpt">
								<?php  get_template_part('template-parts/excerpts/excerpt'); ?>   
							</div>  
						</div> 	
					<?php else: ?>
						<div class="card-body">
							<div class="entry-header">
								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
								<?php  get_template_part('template-parts/content', 'meta'); ?>      
								<hr>  
							</div>
							<div class="entry-excerpt">
								<?php  get_template_part('template-parts/excerpts/excerpt'); ?>   
							</div>  
						</div> 
					<?php endif; ?>
				</article> 
			<?php endif; ?>
		</div>
     <?php endwhile; ?>
</div>
