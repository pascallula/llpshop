<?php

function shoppable_wardrobe_default_styles(){

	// Begin Style
	$css = '<style>';

	# Responsive Leading Brands
	if( !get_theme_mod( 'mobile_leading_brands', true ) ){
		$css .= '
			@media screen and (max-width: 767px){
				.section-leading-area {
	    			display: none;
				}
			}
		';
	}

	# Responsive Vendors
	if(!get_theme_mod('mobile_vendors', true ) ){
		$css .='
			@media screen and (max-width: 767px){
				.section-vendor-area {
	    			display: none;
				}
			}
		';
	}

	# Responsive Views
	if( !get_theme_mod( 'mobile_views', true ) ){
		$css .= '
			@media screen and (max-width: 767px){
				.section-view-area {
	    			display: none;
				}
			}
		';
	}

	# Responsive Featured Ad
	if( !get_theme_mod( 'mobile_featured_ad', true ) ){
		$css .= '
			@media screen and (max-width: 767px){
				.section-featured-ad-area {
	    			display: none;
				}
			}
		';
	}
	
	// End Style
	$css .= '</style>';

	// return generated & compressed CSS
	echo str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}
add_action( 'wp_head', 'shoppable_wardrobe_default_styles', 99 );