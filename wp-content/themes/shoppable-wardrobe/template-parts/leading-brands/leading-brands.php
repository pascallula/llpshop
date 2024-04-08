<?php
$leadingbrandoneID = get_theme_mod( 'brands_image_one', '' );
$leadingbrandcategoryone = get_theme_mod( 'brand_category_one', '' );

$leadingbrandtwoID = get_theme_mod( 'brands_image_two','');
$leadingbrandcategorytwo = get_theme_mod( 'brand_category_two', '' );

$leadingbrandthreeID = get_theme_mod( 'brands_image_three', '' );
$leadingbrandcategorythree = get_theme_mod( 'brand_category_three', '' );

$leadingbrandfourID = get_theme_mod( 'brands_image_four', '' );
$leadingbrandcategoryfour = get_theme_mod( 'brand_category_four', '' );

$leadingbrandfiveID = get_theme_mod( 'brands_image_five', '' );
$leadingbrandcategoryfive = get_theme_mod( 'brand_category_five', '' );

$leadingbrandsixID = get_theme_mod( 'brands_image_six', '' );
$leadingbrandcategorysix = get_theme_mod( 'brand_category_six', '' );


$leading_brand_array = array();
$has_brands = false;
if( !empty( $leadingbrandoneID ) || !empty( $leadingbrandcategoryone ) ){
	$leading_brand_one  = wp_get_attachment_image_src( $leadingbrandoneID ,'hello-shoppable-420-300');
 	if ( is_array(  $leading_brand_one ) ){
 		$has_brands = true;
   	 	$leading_brands_one = $leading_brand_one[0];
   	 	$leading_brand_array['image_one'] ['ID'] = $leading_brands_one;	 	
  	}
  	if ( !empty($leadingbrandcategoryone) ){
 		$has_brands = true;
   	 	$leading_brand_array['image_one']['category'] = $leadingbrandcategoryone;	
  	}
}
if( !empty( $leadingbrandtwoID ) || !empty( $leadingbrandcategorytwo ) ){
	$leading_brand_two = wp_get_attachment_image_src( $leadingbrandtwoID,'hello-shoppable-420-300');
	if ( is_array(  $leading_brand_two ) ){
		$has_brands = true;	
        $leading_brands_two = $leading_brand_two[0];
        $leading_brand_array['image_two'] ['ID']= $leading_brands_two; 
	}
	if ( !empty($leadingbrandcategorytwo) ){
		$has_brands = true;
	 	$leading_brand_array['image_two']['category'] = $leadingbrandcategorytwo;	
  	}
}
if( !empty( $leadingbrandthreeID ) || !empty( $leadingbrandcategorythree ) ){	
	$leading_brand_three = wp_get_attachment_image_src( $leadingbrandthreeID,'hello-shoppable-420-300');
	if ( is_array(  $leading_brand_three ) ){
		$has_brands = true;
      	$leading_brands_three = $leading_brand_three[0];
      	$leading_brand_array['image_three'] ['ID']= $leading_brands_three;		
  	}
  	if ( !empty($leadingbrandcategorythree) ){
		$has_brands = true;
	 	$leading_brand_array['image_three'] ['category'] = $leadingbrandcategorythree;	
  	}
}
if( !empty( $leadingbrandfourID ) || !empty( $leadingbrandcategoryfour ) ){	
	$leading_brand_four = wp_get_attachment_image_src( $leadingbrandfourID,'hello-shoppable-420-300');
	if ( is_array(  $leading_brand_four ) ){
		$has_brands = true;
      	$leading_brands_four = $leading_brand_four[0];
      	$leading_brand_array['image_four'] ['ID'] = $leading_brands_four;	
  	}
  	if ( !empty($leadingbrandcategoryfour) ){
		$has_brands = true;
	 	$leading_brand_array['image_four'] ['category'] = $leadingbrandcategoryfour;	
  	}
}
if( !empty( $leadingbrandfiveID ) || !empty( $leadingbrandcategoryfive ) ){	
	$leading_brand_five = wp_get_attachment_image_src( $leadingbrandfiveID,'hello-shoppable-420-300');
	if ( is_array(  $leading_brand_five ) ){
		$has_brands = true;
      	$leading_brands_five = $leading_brand_five[0];
      	$leading_brand_array['image_five'] ['ID'] = $leading_brands_five;	
  	}
  	if ( !empty($leadingbrandcategoryfive) ){
		$has_brands = true;
	 	$leading_brand_array['image_five'] ['category'] = $leadingbrandcategoryfive;	
  	}
}
if( !empty( $leadingbrandsixID ) || !empty( $leadingbrandcategorysix ) ){	
	$leading_brand_six = wp_get_attachment_image_src( $leadingbrandsixID,'hello-shoppable-420-300');
	if ( is_array(  $leading_brand_six ) ){
		$has_brands = true;
      	$leading_brands_six = $leading_brand_six[0];
      	$leading_brand_array['image_six'] ['ID'] = $leading_brands_six;	
  	}
  	if ( !empty($leadingbrandcategorysix) ){
		$has_brands = true;
	 	$leading_brand_array['image_six'] ['category'] = $leadingbrandcategorysix;	
  	}
}

$product_cat = shoppable_wardrobe_get_product_categories();

if( get_theme_mod( 'leading_brands_section', false ) && ( $has_brands || get_theme_mod('leading_brands_title') || get_theme_mod('leading_brands_sub_title') ) ){ ?>
	<section class="section-leading-area">
		<?php if( get_theme_mod('leading_brands_title') || get_theme_mod('leading_brands_sub_title') ){ ?>
			<div class="section-title-wrap">
				<h2 class="section-title">	
					<?php echo esc_html( get_theme_mod('leading_brands_title') ); ?>
				</h2>
				<p>
					<?php echo esc_html( get_theme_mod('leading_brands_sub_title') ); ?>
				</p>
			</div>
		<?php } ?>
		<div class="content-wrap">
			<?php foreach( $leading_brand_array as $each_leadingbrand ){ ?>
				<article class="leading-items">
					<?php if ( isset( $each_leadingbrand['ID'] )  && !empty( $each_leadingbrand['ID'] ) ){ 
							$cat_url = '';
							if( isset( $each_leadingbrand['category'] ) && !empty( $each_leadingbrand['category'] ) ) {
								$cat_url = $each_leadingbrand['category'];
							}
						?>
						<figure class= "featured-image">
							<a href="<?php echo esc_url( get_category_link( $cat_url ) ); ?>">
								<img src="<?php echo esc_url( $each_leadingbrand['ID'] ); ?>">
							</a>	
						</figure>
					<?php } ?>
					<?php if ( isset( $each_leadingbrand['category'] ) && !empty( $each_leadingbrand['category'] ) ){ ?>
						<h5 class="entry-title">
							<a href="<?php echo esc_url( get_category_link( $each_leadingbrand ['category'] ) ); ?>">
								<?php echo esc_html($product_cat[$each_leadingbrand['category'] ] ); ?>
							</a>	
						</h5>
					<?php } ?>
				</article>	
			<?php } ?>
		</div>
	</section>
<?php } ?>

