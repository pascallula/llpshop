<?php 
	$custom_print_shop_custom_css ='';

	/*----------------Width Layout -------------------*/
	$custom_print_shop_theme_lay = get_theme_mod( 'custom_print_shop_width_options','Full Layout');
    if($custom_print_shop_theme_lay == 'Full Layout'){
		$custom_print_shop_custom_css .='body{';
			$custom_print_shop_custom_css .='max-width: 100%;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == 'Contained Layout'){
		$custom_print_shop_custom_css .='body{';
			$custom_print_shop_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == 'Boxed Layout'){
		$custom_print_shop_custom_css .='body{';
			$custom_print_shop_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_print_shop_custom_css .='}';
		$custom_print_shop_custom_css .='div.header-menu-box, .header-menu-box:after{';
			$custom_print_shop_custom_css .='box-shadow:none !important;';
		$custom_print_shop_custom_css .='}';
	}

	/*------ Button Style -------*/
	$custom_print_shop_top_buttom_padding = get_theme_mod('custom_print_shop_top_button_padding');
	$custom_print_shop_left_right_padding = get_theme_mod('custom_print_shop_left_button_padding');
	if($custom_print_shop_top_buttom_padding != false || $custom_print_shop_left_right_padding != false ){
		$custom_print_shop_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$custom_print_shop_custom_css .='padding-top: '.esc_attr($custom_print_shop_top_buttom_padding).'px; padding-bottom: '.esc_attr($custom_print_shop_top_buttom_padding).'px; padding-left: '.esc_attr($custom_print_shop_left_right_padding).'px; padding-right: '.esc_attr($custom_print_shop_left_right_padding).'px;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_button_border_radius = get_theme_mod('custom_print_shop_button_border_radius');
	$custom_print_shop_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
		$custom_print_shop_custom_css .='border-radius: '.esc_attr($custom_print_shop_button_border_radius).'px;';
	$custom_print_shop_custom_css .='}';

	/*-------------- Woocommerce Button  -------------------*/

	$custom_print_shop_woocommerce_button_padding_top = get_theme_mod('custom_print_shop_woocommerce_button_padding_top');
	if($custom_print_shop_woocommerce_button_padding_top != false){
		$custom_print_shop_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$custom_print_shop_custom_css .='padding-top: '.esc_attr($custom_print_shop_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($custom_print_shop_woocommerce_button_padding_top).'px;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_woocommerce_button_padding_right = get_theme_mod('custom_print_shop_woocommerce_button_padding_right');
	if($custom_print_shop_woocommerce_button_padding_right != false){
		$custom_print_shop_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$custom_print_shop_custom_css .='padding-left: '.esc_attr($custom_print_shop_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($custom_print_shop_woocommerce_button_padding_right).'px;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_woocommerce_button_border_radius = get_theme_mod('custom_print_shop_woocommerce_button_border_radius');
	if($custom_print_shop_woocommerce_button_border_radius != false){
		$custom_print_shop_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$custom_print_shop_custom_css .='border-radius: '.esc_attr($custom_print_shop_woocommerce_button_border_radius).'px;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_related_product = get_theme_mod('custom_print_shop_related_product',true);

	if($custom_print_shop_related_product == false){
		$custom_print_shop_custom_css .='.related.products{';
			$custom_print_shop_custom_css .='display: none;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_woocommerce_product_border = get_theme_mod('custom_print_shop_woocommerce_product_border',false);

	if($custom_print_shop_woocommerce_product_border == true){
		$custom_print_shop_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_print_shop_custom_css .='border: 1px solid #ddd;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_woocommerce_product_padding_top = get_theme_mod('custom_print_shop_woocommerce_product_padding_top',0);
		$custom_print_shop_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_print_shop_custom_css .='padding-top: '.esc_attr($custom_print_shop_woocommerce_product_padding_top).'px; padding-bottom: '.esc_attr($custom_print_shop_woocommerce_product_padding_top).'px;';
		$custom_print_shop_custom_css .='}';

	$custom_print_shop_woocommerce_product_padding_right = get_theme_mod('custom_print_shop_woocommerce_product_padding_right',0);
		$custom_print_shop_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_print_shop_custom_css .='padding-left: '.esc_attr($custom_print_shop_woocommerce_product_padding_right).'px; padding-right: '.esc_attr($custom_print_shop_woocommerce_product_padding_right).'px;';
		$custom_print_shop_custom_css .='}';

	$custom_print_shop_woocommerce_product_border_radius = get_theme_mod('custom_print_shop_woocommerce_product_border_radius');
	if($custom_print_shop_woocommerce_product_border_radius != false){
		$custom_print_shop_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_print_shop_custom_css .='border-radius: '.esc_attr($custom_print_shop_woocommerce_product_border_radius).'px;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_woocommerce_product_box_shadow = get_theme_mod('custom_print_shop_woocommerce_product_box_shadow');
	if($custom_print_shop_woocommerce_product_box_shadow != false){
		$custom_print_shop_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$custom_print_shop_custom_css .='box-shadow: '.esc_attr($custom_print_shop_woocommerce_product_box_shadow).'px '.esc_attr($custom_print_shop_woocommerce_product_box_shadow).'px '.esc_attr($custom_print_shop_woocommerce_product_box_shadow).'px #aaa;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_product_sale_font_size = get_theme_mod('custom_print_shop_product_sale_font_size');
	$custom_print_shop_custom_css .='.woocommerce span.onsale {';
		$custom_print_shop_custom_css .='font-size: '.esc_attr($custom_print_shop_product_sale_font_size).'px;';
	$custom_print_shop_custom_css .='}';

	// Breadcrumb color option
	$custom_print_shop_breadcrumb_color = get_theme_mod('custom_print_shop_breadcrumb_color');
	$custom_print_shop_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_breadcrumb_color).'!important;';
	$custom_print_shop_custom_css .='}';

	// Breadcrumb bg color option
	$custom_print_shop_breadcrumb_background_color = get_theme_mod('custom_print_shop_breadcrumb_background_color');
	$custom_print_shop_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$custom_print_shop_custom_css .='background-color: '.esc_attr($custom_print_shop_breadcrumb_background_color).'!important;';
	$custom_print_shop_custom_css .='}';

	// Breadcrumb hover color option
	$custom_print_shop_breadcrumb_hover_color = get_theme_mod('custom_print_shop_breadcrumb_hover_color');
	$custom_print_shop_custom_css .='.bradcrumbs a:hover{';
		$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_breadcrumb_hover_color).'!important;';
	$custom_print_shop_custom_css .='}';

	// Breadcrumb hover bg color option
	$custom_print_shop_breadcrumb_hover_bg_color = get_theme_mod('custom_print_shop_breadcrumb_hover_bg_color');
	$custom_print_shop_custom_css .='.bradcrumbs a:hover{';
		$custom_print_shop_custom_css .='background-color: '.esc_attr($custom_print_shop_breadcrumb_hover_bg_color).'!important;';
	$custom_print_shop_custom_css .='}';

	// Category color option
	$custom_print_shop_category_color = get_theme_mod('custom_print_shop_category_color');
	$custom_print_shop_custom_css .='.tc-single-category a{';
		$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_category_color).'!important;';
	$custom_print_shop_custom_css .='}';

	// Category bg color option
	$custom_print_shop_category_background_color = get_theme_mod('custom_print_shop_category_background_color');
	$custom_print_shop_custom_css .='.tc-single-category a{';
		$custom_print_shop_custom_css .='background-color: '.esc_attr($custom_print_shop_category_background_color).'!important;';
	$custom_print_shop_custom_css .='}';

	/*---- Preloader Color ----*/
	$custom_print_shop_preloader_color = get_theme_mod('custom_print_shop_preloader_color');
	$custom_print_shop_preloader_bg_color = get_theme_mod('custom_print_shop_preloader_bg_color');

	if($custom_print_shop_preloader_color != false){
		$custom_print_shop_custom_css .='.preloader-squares .square, .preloader-chasing-squares .square{';
			$custom_print_shop_custom_css .='background-color: '.esc_attr($custom_print_shop_preloader_color).';';
		$custom_print_shop_custom_css .='}';
	}
	if($custom_print_shop_preloader_bg_color != false){
		$custom_print_shop_custom_css .='.preloader{';
			$custom_print_shop_custom_css .='background-color: '.esc_attr($custom_print_shop_preloader_bg_color).';';
		$custom_print_shop_custom_css .='}';
	}

	// menu color
	$custom_print_shop_menu_color = get_theme_mod('custom_print_shop_menu_color');

	$custom_print_shop_custom_css .='.primary-navigation a,.primary-navigation .current_page_item > a, .primary-navigation .current-menu-item > a, .primary-navigation .current_page_ancestor > a{';
			$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_menu_color).'!important;';
	$custom_print_shop_custom_css .='}';

	// menu hover color
	$custom_print_shop_menu_hover_color = get_theme_mod('custom_print_shop_menu_hover_color');
	$custom_print_shop_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover, .primary-navigation ul.sub-menu a:hover, .primary-navigation ul.sub-menu li a:hover{';
			$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_menu_hover_color).' !important;';
	$custom_print_shop_custom_css .='}';

	// Submenu color
	$custom_print_shop_submenu_menu_color = get_theme_mod('custom_print_shop_submenu_menu_color');
	$custom_print_shop_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a{';
			$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_submenu_menu_color).' !important;';
	$custom_print_shop_custom_css .='}';

	// Submenu Hover Color Option
	$custom_print_shop_submenu_hover_color = get_theme_mod('custom_print_shop_submenu_hover_color');
	$custom_print_shop_custom_css .='.primary-navigation ul.sub-menu li a:hover  {';
	$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_submenu_hover_color).'!important;';
	$custom_print_shop_custom_css .='} ';

	/*-------- Scrollup icon css -------*/
	$custom_print_shop_scroll_icon_font_size = get_theme_mod('custom_print_shop_scroll_icon_font_size', 18);
	$custom_print_shop_custom_css .='.scrollup{';
		$custom_print_shop_custom_css .='font-size: '.esc_attr($custom_print_shop_scroll_icon_font_size).'px;';
	$custom_print_shop_custom_css .='}';

	$custom_print_shop_scroll_icon_color = get_theme_mod('custom_print_shop_scroll_icon_color');
	$custom_print_shop_custom_css .='.scrollup{';
		$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_scroll_icon_color).'!important;';
	$custom_print_shop_custom_css .='}';

	/*---- Copyright css ----*/
	$custom_print_shop_copyright_fontsize = get_theme_mod('custom_print_shop_copyright_fontsize',16);
	if($custom_print_shop_copyright_fontsize != false){
		$custom_print_shop_custom_css .='#footer p{';
			$custom_print_shop_custom_css .='font-size: '.esc_attr($custom_print_shop_copyright_fontsize).'px; ';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_copyright_top_bottom_padding = get_theme_mod('custom_print_shop_copyright_top_bottom_padding',15);
	if($custom_print_shop_copyright_top_bottom_padding != false){
		$custom_print_shop_custom_css .='#footer {';
			$custom_print_shop_custom_css .='padding-top:'.esc_attr($custom_print_shop_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($custom_print_shop_copyright_top_bottom_padding).'px; ';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_copyright_alignment = get_theme_mod( 'custom_print_shop_copyright_alignment','Center');
    if($custom_print_shop_copyright_alignment == 'Left'){
		$custom_print_shop_custom_css .='#footer p{';
			$custom_print_shop_custom_css .='text-align:start;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_copyright_alignment == 'Center'){
		$custom_print_shop_custom_css .='#footer p{';
			$custom_print_shop_custom_css .='text-align:center;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_copyright_alignment == 'Right'){
		$custom_print_shop_custom_css .='#footer p{';
			$custom_print_shop_custom_css .='text-align:end;';
		$custom_print_shop_custom_css .='}';
	}

	/*------- Wocommerce sale css -----*/
	$custom_print_shop_woocommerce_sale_top_padding = get_theme_mod('custom_print_shop_woocommerce_sale_top_padding',0);
	$custom_print_shop_woocommerce_sale_left_padding = get_theme_mod('custom_print_shop_woocommerce_sale_left_padding',0);
	$custom_print_shop_custom_css .=' .woocommerce span.onsale{';
		$custom_print_shop_custom_css .='padding-top: '.esc_attr($custom_print_shop_woocommerce_sale_top_padding).'px; padding-bottom: '.esc_attr($custom_print_shop_woocommerce_sale_top_padding).'px; padding-left: '.esc_attr($custom_print_shop_woocommerce_sale_left_padding).'px; padding-right: '.esc_attr($custom_print_shop_woocommerce_sale_left_padding).'px;';
	$custom_print_shop_custom_css .='}';

	$custom_print_shop_woocommerce_sale_border_radius = get_theme_mod('custom_print_shop_woocommerce_sale_border_radius', 5);
	$custom_print_shop_custom_css .='.woocommerce span.onsale{';
		$custom_print_shop_custom_css .='border-radius: '.esc_attr($custom_print_shop_woocommerce_sale_border_radius).'px;';
	$custom_print_shop_custom_css .='}';

	$custom_print_shop_sale_position = get_theme_mod( 'custom_print_shop_sale_position','left');
    if($custom_print_shop_sale_position == 'left'){
		$custom_print_shop_custom_css .='.woocommerce ul.products li.product span.onsale{';
			$custom_print_shop_custom_css .='left: 0; right: auto;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_sale_position == 'right'){
		$custom_print_shop_custom_css .='.woocommerce ul.products li.product span.onsale{';
			$custom_print_shop_custom_css .='left: auto; right: 0;';
		$custom_print_shop_custom_css .='}';
	}

	/*-------- footer background css -------*/
	$custom_print_shop_footer_background_color = get_theme_mod('custom_print_shop_footer_background_color');
	$custom_print_shop_custom_css .='.footertown{';
		$custom_print_shop_custom_css .='background-color: '.esc_attr($custom_print_shop_footer_background_color).';';
	$custom_print_shop_custom_css .='}';

	$custom_print_shop_footer_background_img = get_theme_mod('custom_print_shop_footer_background_img');
	if($custom_print_shop_footer_background_img != false){
		$custom_print_shop_custom_css .='.footertown{';
			$custom_print_shop_custom_css .='background: url('.esc_attr($custom_print_shop_footer_background_img).') no-repeat; background-size: cover; background-attachment: fixed;';
		$custom_print_shop_custom_css .='}';
	}

	/*---- Comment form ----*/
	$custom_print_shop_comment_width = get_theme_mod('custom_print_shop_comment_width', '100');
	$custom_print_shop_custom_css .='#comments textarea{';
		$custom_print_shop_custom_css .=' width:'.esc_attr($custom_print_shop_comment_width).'%;';
	$custom_print_shop_custom_css .='}';

	$custom_print_shop_comment_submit_text = get_theme_mod('custom_print_shop_comment_submit_text', 'Post Comment');
	if($custom_print_shop_comment_submit_text == ''){
		$custom_print_shop_custom_css .='#comments p.form-submit {';
			$custom_print_shop_custom_css .='display: none;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_comment_title = get_theme_mod('custom_print_shop_comment_title', 'Leave a Reply');
	if($custom_print_shop_comment_title == ''){
		$custom_print_shop_custom_css .='#comments h2#reply-title {';
			$custom_print_shop_custom_css .='display: none;';
		$custom_print_shop_custom_css .='}';
	}

	// Navigation Font Size 
	$custom_print_shop_nav_font_size = get_theme_mod('custom_print_shop_nav_font_size');
	if($custom_print_shop_nav_font_size != false){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-size: '.esc_attr($custom_print_shop_nav_font_size).'px;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_navigation_case = get_theme_mod('custom_print_shop_navigation_case', 'capitalize');
	if($custom_print_shop_navigation_case == 'uppercase' ){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .=' text-transform: uppercase;';
		$custom_print_shop_custom_css .='}';
	}elseif($custom_print_shop_navigation_case == 'capitalize' ){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .=' text-transform: capitalize;';
		$custom_print_shop_custom_css .='}';
	}

	// banner background img

	$custom_print_shop_banner_image = get_theme_mod('custom_print_shop_banner_image');
	if($custom_print_shop_banner_image != false){
		$custom_print_shop_custom_css .='#banner{';
			$custom_print_shop_custom_css .='background: url('.esc_url($custom_print_shop_banner_image).');';
		$custom_print_shop_custom_css .='}';
	}

    // site title color option
	$custom_print_shop_site_title_color_setting = get_theme_mod('custom_print_shop_site_title_color_setting');
	$custom_print_shop_custom_css .=' .logo h1 a, .logo p a{';
		$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_site_title_color_setting).';';
	$custom_print_shop_custom_css .='} ';

	$custom_print_shop_tagline_color_setting = get_theme_mod('custom_print_shop_tagline_color_setting');
	$custom_print_shop_custom_css .=' .logo p.site-description{';
		$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_tagline_color_setting).';';
	$custom_print_shop_custom_css .='} ';   

	//Site title Font size
	$custom_print_shop_site_title_fontsize = get_theme_mod('custom_print_shop_site_title_fontsize');
	$custom_print_shop_custom_css .='.logo h1, .logo p.site-title{';
		$custom_print_shop_custom_css .='font-size: '.esc_attr($custom_print_shop_site_title_fontsize).'px;';
	$custom_print_shop_custom_css .='}';

	$custom_print_shop_site_description_fontsize = get_theme_mod('custom_print_shop_site_description_fontsize');
	$custom_print_shop_custom_css .='.logo p.site-description{';
		$custom_print_shop_custom_css .='font-size: '.esc_attr($custom_print_shop_site_description_fontsize).'px;';
	$custom_print_shop_custom_css .='}';

	/*----- Featured image css -----*/
	$custom_print_shop_featured_image_border_radius = get_theme_mod('custom_print_shop_featured_image_border_radius');
	if($custom_print_shop_featured_image_border_radius != false){
		$custom_print_shop_custom_css .='.inner-service .service-image img{';
			$custom_print_shop_custom_css .='border-radius: '.esc_attr($custom_print_shop_featured_image_border_radius).'px;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_featured_image_box_shadow = get_theme_mod('custom_print_shop_featured_image_box_shadow');
	if($custom_print_shop_featured_image_box_shadow != false){
		$custom_print_shop_custom_css .='.inner-service .service-image img{';
			$custom_print_shop_custom_css .='box-shadow: 8px 8px '.esc_attr($custom_print_shop_featured_image_box_shadow).'px #aaa;';
		$custom_print_shop_custom_css .='}';
	} 

	/*------Shop page pagination ---------*/
	$custom_print_shop_shop_page_pagination = get_theme_mod('custom_print_shop_shop_page_pagination', true);
	if($custom_print_shop_shop_page_pagination == false){
		$custom_print_shop_custom_css .= '.woocommerce nav.woocommerce-pagination {';
			$custom_print_shop_custom_css .='display: none;';
		$custom_print_shop_custom_css .='}';
	}

	/*------- Post into blocks ------*/
	$custom_print_shop_post_blocks = get_theme_mod('custom_print_shop_post_blocks', 'Without box');
	if($custom_print_shop_post_blocks == 'Within box' ){
		$custom_print_shop_custom_css .='.services-box{';
			$custom_print_shop_custom_css .=' border: 1px solid #222;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_responsive_show_back_to_top = get_theme_mod('custom_print_shop_responsive_show_back_to_top',true);
	if($custom_print_shop_responsive_show_back_to_top == true && get_theme_mod('custom_print_shop_show_back_to_top',true) == false){
		$custom_print_shop_custom_css .='@media screen and (min-width:575px){
			.scrollup{';
			$custom_print_shop_custom_css .='visibility:hidden;';
		$custom_print_shop_custom_css .='} }';
	}

	if($custom_print_shop_responsive_show_back_to_top == false){
		$custom_print_shop_custom_css .='@media screen and (max-width:575px){
			.scrollup{';
			$custom_print_shop_custom_css .='visibility:hidden;';
		$custom_print_shop_custom_css .='} }';
	}

	$custom_print_shop_responsive_preloader_hide = get_theme_mod('custom_print_shop_responsive_preloader_hide',false);
	if($custom_print_shop_responsive_preloader_hide == true && get_theme_mod('custom_print_shop_preloader_hide',false) == false){
		$custom_print_shop_custom_css .='@media screen and (min-width:575px){
			.preloader{';
			$custom_print_shop_custom_css .='display:none !important;';
		$custom_print_shop_custom_css .='} }';
	}

	if($custom_print_shop_responsive_preloader_hide == false){
		$custom_print_shop_custom_css .='@media screen and (max-width:575px){
			.preloader{';
			$custom_print_shop_custom_css .='display:none !important;';
		$custom_print_shop_custom_css .='} }';
	}

	// slider button
	if (get_theme_mod('custom_print_shop_slider_button_responsive',true) == true && get_theme_mod('custom_print_shop_slider_button',true) == false) {
		$custom_print_shop_custom_css .='@media screen and (min-width: 575px){
			.read-btn{';
			$custom_print_shop_custom_css .=' display: none;';
		$custom_print_shop_custom_css .='} }';
	}
	if (get_theme_mod('custom_print_shop_slider_button_responsive',true) == false) {
		$custom_print_shop_custom_css .='@media screen and (max-width: 575px){
			.read-btn{';
			$custom_print_shop_custom_css .=' display: none;';
		$custom_print_shop_custom_css .='} }';
		$custom_print_shop_custom_css .='@media screen and (max-width: 575px){
			#slider .carousel-caption{';
			$custom_print_shop_custom_css .=' padding: 0px;';
		$custom_print_shop_custom_css .='} }';
	}

	//slider content alignment css
	$custom_print_shop_theme_lay = get_theme_mod( 'custom_print_shop_slider_content_alignment','Center');
    if($custom_print_shop_theme_lay == 'Left'){
		$custom_print_shop_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_print_shop_custom_css .='text-align:left !important; left:14%; right:50%;';
		$custom_print_shop_custom_css .='}';
		$custom_print_shop_custom_css .='@media screen and (max-width: 425px){
		#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_print_shop_custom_css .='text-align:left !important; left:10%; right:32%;';
		$custom_print_shop_custom_css .='}}';
	}else if($custom_print_shop_theme_lay == 'Center'){
		$custom_print_shop_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_print_shop_custom_css .='text-align:center !important; left:15%; right:15%;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == 'Right'){
		$custom_print_shop_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_print_shop_custom_css .='text-align:right !important; left:45%; right:15%;';
		$custom_print_shop_custom_css .='}';
		$custom_print_shop_custom_css .='@media screen and (max-width: 425px){
		#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$custom_print_shop_custom_css .='text-align:right !important; left:27%; right:15%;';
		$custom_print_shop_custom_css .='}}';
	}	

	/*---- Slider Height ------*/
	$custom_print_shop_slider_height = get_theme_mod('custom_print_shop_slider_height');
	$custom_print_shop_custom_css .='#slider img{';
		$custom_print_shop_custom_css .='height: '.esc_attr($custom_print_shop_slider_height).'px;';
	$custom_print_shop_custom_css .='}';
	$custom_print_shop_custom_css .='@media screen and (max-width: 768px){
		#slider img{';
		$custom_print_shop_custom_css .='height: auto;';
	$custom_print_shop_custom_css .='} }';

	// menu font weight
	$custom_print_shop_theme_lay = get_theme_mod( 'custom_print_shop_font_weight_menu_option','500');
    if($custom_print_shop_theme_lay == '100'){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-weight:100;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == '200'){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-weight: 200;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == '300'){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-weight: 300;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == '400'){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-weight: 400;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == '500'){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-weight: 500;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == '600'){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-weight: 600;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == '700'){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-weight: 700;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == '800'){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-weight: 800;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_theme_lay == '900'){
		$custom_print_shop_custom_css .='.primary-navigation ul li a{';
			$custom_print_shop_custom_css .='font-weight: 900;';
		$custom_print_shop_custom_css .='}';
	}

	// slider hide css
	$custom_print_shop_slider_hide_show = get_theme_mod('custom_print_shop_slider_hide_show',false);
	if($custom_print_shop_slider_hide_show == false) {
		$custom_print_shop_custom_css .='.page-template-custom-frontpage #header{';
			$custom_print_shop_custom_css .='position:static; border-bottom: 1px solid #e2e2e2;';
		$custom_print_shop_custom_css .='}';
	}

	if (get_theme_mod('custom_print_shop_slider_responsive',true) == true && get_theme_mod('custom_print_shop_slider_hide_show',false) == false) {
		$custom_print_shop_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$custom_print_shop_custom_css .=' display: none;';
		$custom_print_shop_custom_css .='} }';
	}
	if (get_theme_mod('custom_print_shop_slider_responsive',true) == false) {
		$custom_print_shop_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$custom_print_shop_custom_css .=' display: none;';
		$custom_print_shop_custom_css .='} }';
	}

	//  ------------ Mobile Media Options ----------
	$custom_print_shop_hide_topbar_responsive = get_theme_mod('custom_print_shop_hide_topbar_responsive',false);
	if($custom_print_shop_hide_topbar_responsive == true && get_theme_mod('custom_print_shop_topbar_hide_show',false) == false){
		$custom_print_shop_custom_css .='@media screen and (min-width:575px){
			.top-header-section{';
			$custom_print_shop_custom_css .='display:none;';
		$custom_print_shop_custom_css .='} }';
	}

	if($custom_print_shop_hide_topbar_responsive == false){
		$custom_print_shop_custom_css .='@media screen and (max-width:575px){
			.top-header-section{';
			$custom_print_shop_custom_css .='display:none;';
		$custom_print_shop_custom_css .='} }';
	}

	$custom_print_shop_resp_sidebar = get_theme_mod( 'custom_print_shop_sidebar_hide_show',true);
    if($custom_print_shop_resp_sidebar == true){
    	$custom_print_shop_custom_css .='@media screen and (max-width:575px) {';
		$custom_print_shop_custom_css .='#sidebar{';
			$custom_print_shop_custom_css .='display:block;';
		$custom_print_shop_custom_css .='} }';
	}else if($custom_print_shop_resp_sidebar == false){
		$custom_print_shop_custom_css .='@media screen and (max-width:575px) {';
		$custom_print_shop_custom_css .='#sidebar{';
			$custom_print_shop_custom_css .='display:none;';
		$custom_print_shop_custom_css .='} }';
	}

	$custom_print_shop_hide_topbar_responsive = get_theme_mod('custom_print_shop_hide_topbar_responsive',false);
	if($custom_print_shop_hide_topbar_responsive == true && get_theme_mod('custom_print_shop_topbar_hide_show',false) == false){
		$custom_print_shop_custom_css .='@media screen and (min-width:575px){
			.topbar{';
			$custom_print_shop_custom_css .='display:none;';
		$custom_print_shop_custom_css .='} }';
	}

	if($custom_print_shop_hide_topbar_responsive == false){
		$custom_print_shop_custom_css .='@media screen and (max-width:575px){
			.topbar{';
			$custom_print_shop_custom_css .='display:none;';
		$custom_print_shop_custom_css .='} }';
	}

	// responsive slider
	if (get_theme_mod('custom_print_shop_slider_responsive',true) == true && get_theme_mod('custom_print_shop_slider_hide_show',false) == false) {
		$custom_print_shop_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$custom_print_shop_custom_css .=' display: none;';
		$custom_print_shop_custom_css .='} }';
	}
	if (get_theme_mod('custom_print_shop_slider_responsive',true) == false) {
		$custom_print_shop_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$custom_print_shop_custom_css .=' display: none;';
		$custom_print_shop_custom_css .='} }';
	}

	// Metabox Seperator
	$custom_print_shop_metabox_seperator = get_theme_mod('custom_print_shop_metabox_seperator','|');
	if($custom_print_shop_metabox_seperator != '' ){
		$custom_print_shop_custom_css .='.metabox .me-2:after{';
			$custom_print_shop_custom_css .=' content: "'.esc_attr($custom_print_shop_metabox_seperator).'"; padding-left:10px;';
		$custom_print_shop_custom_css .='}';		
	}

	// Metabox Seperator
	$custom_print_shop_single_post_metabox_seperator = get_theme_mod('custom_print_shop_single_post_metabox_seperator','|');
	if($custom_print_shop_single_post_metabox_seperator != '' ){
		$custom_print_shop_custom_css .='.metabox .px-2:after{';
			$custom_print_shop_custom_css .=' content: "'.esc_attr($custom_print_shop_single_post_metabox_seperator).'"; padding-left:10px;';
		$custom_print_shop_custom_css .='}';		
	}

	// Single post image border radious
	$custom_print_shop_single_post_img_border_radius = get_theme_mod('custom_print_shop_single_post_img_border_radius', 0);
	$custom_print_shop_custom_css .='.feature-box img{';
		$custom_print_shop_custom_css .='border-radius: '.esc_attr($custom_print_shop_single_post_img_border_radius).'px;';
	$custom_print_shop_custom_css .='}';

	// Single post image box shadow
	$custom_print_shop_single_post_img_box_shadow = get_theme_mod('custom_print_shop_single_post_img_box_shadow',0);
	$custom_print_shop_custom_css .='.feature-box img{';
		$custom_print_shop_custom_css .='box-shadow: '.esc_attr($custom_print_shop_single_post_img_box_shadow).'px '.esc_attr($custom_print_shop_single_post_img_box_shadow).'px '.esc_attr($custom_print_shop_single_post_img_box_shadow).'px #ccc;';
	$custom_print_shop_custom_css .='}';


	// topbar line

	$custom_print_shop_topbar_hide_show = get_theme_mod('custom_print_shop_topbar_hide_show', false);
	if($custom_print_shop_topbar_hide_show == false){
		$custom_print_shop_custom_css .= '.header-menu-box:after{';
			$custom_print_shop_custom_css .='display: none !important;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_copyright_color = get_theme_mod('custom_print_shop_copyright_color');
	$custom_print_shop_custom_css .='#footer p,#footer p a{';
		$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_copyright_color).'!important;';
	$custom_print_shop_custom_css .='}';

	$custom_print_shop_copyright__hover_color = get_theme_mod('custom_print_shop_copyright__hover_color');
	$custom_print_shop_custom_css .='#footer p:hover,#footer p a:hover{';
		$custom_print_shop_custom_css .='color: '.esc_attr($custom_print_shop_copyright__hover_color).'!important;';
	$custom_print_shop_custom_css .='}';

	/*-------- Copyright background css -------*/
	$custom_print_shop_copyright_background_color = get_theme_mod('custom_print_shop_copyright_background_color');
	$custom_print_shop_custom_css .='#footer{';
		$custom_print_shop_custom_css .='background-color: '.esc_attr($custom_print_shop_copyright_background_color).';';
	$custom_print_shop_custom_css .='}';

	// widgets heading font size
	$custom_print_shop_widgets_heading_fontsize = get_theme_mod('custom_print_shop_widgets_heading_fontsize',25);
	if($custom_print_shop_widgets_heading_fontsize != false){
		$custom_print_shop_custom_css .='.footertown .widget h3{';
			$custom_print_shop_custom_css .='font-size: '.esc_attr($custom_print_shop_widgets_heading_fontsize).'px; ';
		$custom_print_shop_custom_css .='}';
	}

	// widgets heading font weight
	$custom_print_shop_widgets_heading_font_weight = get_theme_mod('custom_print_shop_widgets_heading_font_weight', '');
  	$custom_print_shop_custom_css .='.footertown .widget h3{';
    $custom_print_shop_custom_css .='font-weight: '.esc_attr($custom_print_shop_widgets_heading_font_weight).';';
  	$custom_print_shop_custom_css .='}';

	/*----------- Footer widgets heading alignment -----*/
	$custom_print_shop_footer_widgets_heading = get_theme_mod( 'custom_print_shop_footer_widgets_heading','Left');
    if($custom_print_shop_footer_widgets_heading == 'Left'){
		$custom_print_shop_custom_css .='footer h3{';
		$custom_print_shop_custom_css .='text-align: left;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_footer_widgets_heading == 'Center'){
		$custom_print_shop_custom_css .='footer h3{';
			$custom_print_shop_custom_css .='text-align: center;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_footer_widgets_heading == 'Right'){
		$custom_print_shop_custom_css .='footer h3{';
			$custom_print_shop_custom_css .='text-align: right;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_footer_widgets_content = get_theme_mod( 'custom_print_shop_footer_widgets_content','Left');
    if($custom_print_shop_footer_widgets_content == 'Left'){
		$custom_print_shop_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer.gallery,aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar_wrap caption{';
		$custom_print_shop_custom_css .='text-align: left;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_footer_widgets_content == 'Center'){
		$custom_print_shop_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar_wrap caption{';
			$custom_print_shop_custom_css .='text-align: center;';
		$custom_print_shop_custom_css .='}';
	}else if($custom_print_shop_footer_widgets_content == 'Right'){
		$custom_print_shop_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar_wrap caption{';
			$custom_print_shop_custom_css .='text-align: right !important;';
		$custom_print_shop_custom_css .='}';
	}

	$custom_print_shop_show_hide_post_categories = get_theme_mod('custom_print_shop_show_hide_post_categories',true);
	if($custom_print_shop_show_hide_post_categories == false){
		$custom_print_shop_custom_css .='.tc-category{';
			$custom_print_shop_custom_css .='display: none;';
		$custom_print_shop_custom_css .='}';
	}

	/*-------- Blog Post Alignment ------*/
	$custom_print_shop_post_alignment = get_theme_mod('custom_print_shop_blog_post_alignment', 'left');
	if($custom_print_shop_post_alignment == 'center' ){
		$custom_print_shop_custom_css .='.services-box{';
			$custom_print_shop_custom_css .=' text-align: '. $custom_print_shop_post_alignment .'!important;';
		$custom_print_shop_custom_css .='}';
	}elseif($custom_print_shop_post_alignment == 'right' ){
		$custom_print_shop_custom_css .='.services-box{';
			$custom_print_shop_custom_css .='text-align: '. $custom_print_shop_post_alignment .'!important;';
		$custom_print_shop_custom_css .='}';
	}