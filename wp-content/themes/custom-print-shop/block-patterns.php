<?php
/**
 * Custom Print Shop: Block Patterns
 *
 * @package Custom Print Shop
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'custom-print-shop',
		array( 'label' => __( 'Custom Print Shop', 'custom-print-shop' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'custom-print-shop/banner-section',
		array(
			'title'      => __( 'Banner Section', 'custom-print-shop' ),
			'categories' => array( 'custom-print-shop' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/images/Slider-Bg.png\",\"id\":214,\"dimRatio\":50,\"customOverlayColor\":\"#00000000\",\"contentPosition\":\"center center\",\"align\":\"full\",\"style\":{\"color\":{}},\"className\":\"banner-section\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-cover alignfull banner-section\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim\" style=\"background-color:#00000000\"></span><img class=\"wp-block-cover__image-background wp-image-214\" alt=\"\" src=\"" . esc_url(get_template_directory_uri()) . "/images/Slider-Bg.png\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"banner-col\"} -->\n<div class=\"wp-block-columns alignwide banner-col\"><!-- wp:column {\"width\":\"40%\",\"className\":\"banner-content\"} -->\n<div class=\"wp-block-column banner-content\" style=\"flex-basis:40%\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"style\":{\"color\":{\"background\":\"#5dd69c\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|white\"}}},\"typography\":{\"fontSize\":\"12px\"}},\"textColor\":\"white\",\"className\":\"small-title\"} -->\n<p class=\"small-title has-white-color has-text-color has-background has-link-color\" style=\"background-color:#5dd69c;font-size:12px\">Customize your T-shirt with Lorem ipsum</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":\"32px\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}}},\"textColor\":\"black\"} -->\n<h1 class=\"wp-block-heading has-black-color has-text-color has-link-color\" style=\"font-size:32px\">Turn Your Ideas Into Reality</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":\"12px\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}}},\"textColor\":\"black\",\"className\":\"banner-para\"} -->\n<p class=\"banner-para has-black-color has-text-color has-link-color\" style=\"font-size:12px\">Sell custom on-demand printed products without any up-front investment. From print providers directly to your customers.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"white\",\"style\":{\"color\":{\"background\":\"#5dd69c\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|white\"}}},\"border\":{\"radius\":\"30px\"},\"typography\":{\"fontSize\":\"15px\"}},\"className\":\"slider-btn \"} -->\n<div class=\"wp-block-button has-custom-font-size slider-btn\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-white-color has-text-color has-background has-link-color wp-element-button\" style=\"border-radius:30px;background-color:#5dd69c\">Customize Product</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"60%\",\"className\":\"banner-product\"} -->\n<div class=\"wp-block-column banner-product\" style=\"flex-basis:60%\"><!-- wp:columns {\"className\":\"product-row1\"} -->\n<div class=\"wp-block-columns product-row1\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:woocommerce/product-category {\"columns\":1,\"rows\":1,\"categories\":[28]} /--></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns {\"className\":\"product-row2\"} -->\n<div class=\"wp-block-columns product-row2\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:woocommerce/product-category {\"columns\":4,\"rows\":1,\"contentVisibility\":{\"image\":true,\"title\":false,\"price\":false,\"rating\":false,\"button\":false},\"categories\":[28],\"stockStatus\":[\"\",\"instock\",\"outofstock\",\"onbackorder\"]} /--></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'custom-print-shop/featured-product-section',
		array(
			'title'      => __( 'Featured Product Section', 'custom-print-shop' ),
			'categories' => array( 'custom-print-shop' ),
			'content'    => "<!-- wp:columns {\"className\":\"featured-product-section\"} -->\n<div class=\"wp-block-columns featured-product-section\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"textAlign\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"25px\"}}} -->\n<h2 class=\"wp-block-heading has-text-align-center\" style=\"font-size:25px\">Featured Product</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"style\":{\"typography\":{\"fontSize\":\"12px\"},\"elements\":{\"link\":{\"color\":{\"text\":\"#3d3d3d\"}}},\"color\":{\"text\":\"#3d3d3d\"}}} -->\n<p class=\"has-text-align-center has-text-color has-link-color\" style=\"color:#3d3d3d;font-size:12px\">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"align\":\"full\",\"className\":\"tab-section\"} -->\n<div class=\"wp-block-columns alignfull tab-section\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"black\",\"style\":{\"color\":{\"background\":\"#00000000\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"15px\"},\"border\":{\"radius\":\"10px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-black-color has-text-color has-background has-link-color wp-element-button\" style=\"border-radius:10px;background-color:#00000000\">New</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"black\",\"style\":{\"color\":{\"background\":\"#00000000\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"15px\"},\"border\":{\"radius\":\"10px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-black-color has-text-color has-background has-link-color wp-element-button\" style=\"border-radius:10px;background-color:#00000000\">T-Shirts</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"black\",\"style\":{\"color\":{\"background\":\"#00000000\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"15px\"},\"border\":{\"radius\":\"10px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-black-color has-text-color has-background has-link-color wp-element-button\" style=\"border-radius:10px;background-color:#00000000\">Caps</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"black\",\"style\":{\"color\":{\"background\":\"#00000000\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"15px\"},\"border\":{\"radius\":\"10px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-black-color has-text-color has-background has-link-color wp-element-button\" style=\"border-radius:10px;background-color:#00000000\">Mugs</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"black\",\"style\":{\"color\":{\"background\":\"#00000000\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"15px\"},\"border\":{\"radius\":\"10px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-black-color has-text-color has-background has-link-color wp-element-button\" style=\"border-radius:10px;background-color:#00000000\">Covers</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"textColor\":\"black\",\"style\":{\"color\":{\"background\":\"#00000000\"},\"elements\":{\"link\":{\"color\":{\"text\":\"var:preset|color|black\"}}},\"typography\":{\"fontSize\":\"15px\"},\"border\":{\"radius\":\"10px\"}}} -->\n<div class=\"wp-block-button has-custom-font-size\" style=\"font-size:15px\"><a class=\"wp-block-button__link has-black-color has-text-color has-background has-link-color wp-element-button\" style=\"border-radius:10px;background-color:#00000000\">Hoodie</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns {\"align\":\"full\",\"className\":\"product-section\"} -->\n<div class=\"wp-block-columns alignfull product-section\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:woocommerce/product-category {\"columns\":4,\"rows\":1,\"contentVisibility\":{\"image\":true,\"title\":true,\"price\":true,\"rating\":false,\"button\":true},\"categories\":[27]} /--></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
		)
	);
}