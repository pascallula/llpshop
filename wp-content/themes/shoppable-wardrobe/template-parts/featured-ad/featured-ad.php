<?php
$blogfeatureAdoneID = get_theme_mod( 'blog_featured_ad_one','');
$blogfeatureAdtwoID = get_theme_mod( 'blog_featured_ad_two','');       
$blogfeatureAdthreeID = get_theme_mod( 'blog_featured_ad_three','');

$featureAd_array = array();
$has_featureAd = false;
if( !empty( $blogfeatureAdoneID ) ){
	$blog_ad_one  = wp_get_attachment_image_src( $blogfeatureAdoneID,'hello-shoppable-420-300');
 	if ( is_array(  $blog_ad_one ) ){
 		$has_featureAd = true;
   	 	$blog_feature_ad_one = $blog_ad_one[0];
   	 	$featureAd_array['image_one'] = array(
			'ID' => $blog_feature_ad_one,
		);	
  	}
}
if( !empty( $blogfeatureAdtwoID ) ){
	$blog_ad_two = wp_get_attachment_image_src( $blogfeatureAdtwoID,'hello-shoppable-420-300');
	if ( is_array(  $blog_ad_two ) ){
		$has_featureAd = true;	
        $blog_feature_ad_two = $blog_ad_two[0];
        $featureAd_array['image_two'] = array(
			'ID' => $blog_feature_ad_two,
		);	
  	}
}
if( !empty( $blogfeatureAdthreeID ) ){	
	$blog_ad_three = wp_get_attachment_image_src( $blogfeatureAdthreeID,'hello-shoppable-420-300');
	if ( is_array(  $blog_ad_three ) ){
		$has_featureAd = true;
      	$blog_feature_ad_three = $blog_ad_three[0];
      	$featureAd_array['image_three'] = array(
			'ID' => $blog_feature_ad_three,
		);	
  	}
}

if( get_theme_mod( 'featured_ad_section', true ) && $has_featureAd ){ ?>
	<section class="section-featured-ad-area">
		<div class="content-wrap">
			<div class="row">
				<?php foreach( $featureAd_array as $each_featureAd ){ ?>
					<div class="col-md-4">
						<article class="featured-ad-content-wrap">
							<figure class= "featured-image">
								<img src="<?php echo esc_url( $each_featureAd['ID'] ); ?>">
							</figure>
						</article>
					</div>
				<?php } ?>
			</div>	
		</div>
	</section>
<?php } ?>
