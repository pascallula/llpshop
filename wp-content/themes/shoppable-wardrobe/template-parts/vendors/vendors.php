<?php
$blogvendoroneID = get_theme_mod( 'blog_vendor_one','' );
$blogvendortwoID = get_theme_mod( 'blog_vendor_two','' );       
$blogvendorthreeID = get_theme_mod( 'blog_vendor_three','' );
$blogvendorfourID = get_theme_mod( 'blog_vendor_four','' );
$blogvendorfiveID = get_theme_mod( 'blog_vendor_five','' );
$blogvendorsixID = get_theme_mod( 'blog_vendor_six','' );

$vendor_array = array();
$has_vendor = false;
if( !empty( $blogvendoroneID ) ){
	$blog_vendor_one  = wp_get_attachment_image_src( $blogvendoroneID,'hello-shoppable-420-300');
 	if ( is_array(  $blog_vendor_one ) ){
 		$has_vendor = true;
   	 	$blog_vendors_one = $blog_vendor_one[0];
   	 	$vendor_array['image_one'] = array(
			'ID' => $blog_vendors_one,
		);	
  	}
}
if( !empty( $blogvendortwoID ) ){
	$blog_vendor_two = wp_get_attachment_image_src( $blogvendortwoID,'hello-shoppable-420-300');
	if ( is_array(  $blog_vendor_two ) ){
		$has_vendor = true;	
        $blog_vendors_two = $blog_vendor_two[0];
        $vendor_array['image_two'] = array(
			'ID' => $blog_vendors_two,
		);	
  	}
}
if( !empty( $blogvendorthreeID ) ){	
	$blog_vendor_three = wp_get_attachment_image_src( $blogvendorthreeID,'hello-shoppable-420-300');
	if ( is_array(  $blog_vendor_three ) ){
		$has_vendor = true;
      	$blog_vendors_three = $blog_vendor_three[0];
      	$vendor_array['image_three'] = array(
			'ID' => $blog_vendors_three,
		);	
  	}
}
if( !empty( $blogvendorfourID ) ){	
	$blog_vendor_four = wp_get_attachment_image_src( $blogvendorfourID,'hello-shoppable-420-300');
	if ( is_array(  $blog_vendor_four ) ){
		$has_vendor = true;
      	$blog_vendors_four = $blog_vendor_four[0];
      	$vendor_array['image_four'] = array(
			'ID' => $blog_vendors_four,
		);	
  	}
}
if( !empty( $blogvendorfiveID ) ){	
	$blog_vendor_five = wp_get_attachment_image_src( $blogvendorfiveID,'hello-shoppable-420-300');
	if ( is_array(  $blog_vendor_five ) ){
		$has_vendor = true;
      	$blog_vendors_five = $blog_vendor_five[0];
      	$vendor_array['image_five'] = array(
			'ID' => $blog_vendors_five,
		);	
  	}
}
if( !empty( $blogvendorsixID ) ){	
	$blog_vendor_six = wp_get_attachment_image_src( $blogvendorsixID,'hello-shoppable-420-300');
	if ( is_array(  $blog_vendor_six ) ){
		$has_vendor = true;
      	$blog_vendors_six = $blog_vendor_six[0];
      	$vendor_array['image_six'] = array(
			'ID' => $blog_vendors_six,
		);	
  	}
}

if( get_theme_mod( 'vendors_section', false ) && $has_vendor ){ ?>
	<section class="section-vendor-area">
		<div class="content-wrap">
			<div class="row">
				<?php foreach( $vendor_array as $each_vendor ){ ?>
					<div class="col-sm-4 col-md-2">
						<article class="vendor-content-wrap">
							<figure class= "featured-image">
								<img src="<?php echo esc_url( $each_vendor['ID'] ); ?>">
							</figure>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>