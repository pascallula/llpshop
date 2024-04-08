<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ma">
 *
 * @package Custom Print Shop
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="main-bodybox">
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<?php if(get_theme_mod('custom_print_shop_preloader_hide',false)!= '' || get_theme_mod('custom_print_shop_responsive_preloader_hide',false) != ''){ ?>
    <?php if(get_theme_mod( 'custom_print_shop_preloader_type','center-square') == 'center-square'){ ?>
	    <div class='preloader'>
		    <div class='preloader-squares'>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
		    </div>
			</div>
    <?php }else if(get_theme_mod( 'custom_print_shop_preloader_type') == 'chasing-square') {?>    
      <div class='preloader'>
				<div class='preloader-chasing-squares'>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
				</div>
			</div>
    <?php }?>
	<?php }?>
<header role="banner">
	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'custom-print-shop' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'custom-print-shop' );?></span></a>

	<div id="header">
		<?php if( get_theme_mod( 'custom_print_shop_topbar_hide_show') != ''|| get_theme_mod('custom_print_shop_hide_topbar_responsive',true)!= ''){ ?>
	  	<div class="topbar">
	  		<div class="container">
	  			<div class="row">
	  				<div class="col-lg-3 col-md-3  topbar-links text-md-start text-center mb-md-0 mb-3 align-self-center">
	  					<?php if(get_theme_mod('custom_print_shop_topbar_faqs_text') != '' || get_theme_mod('custom_print_shop_topbar_faqs_url') != ''){?>
	  						<span class="faqs-link"><a href="<?php echo esc_url(get_theme_mod('custom_print_shop_topbar_faqs_url')); ?>"><?php echo esc_html(get_theme_mod('custom_print_shop_topbar_faqs_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('custom_print_shop_topbar_faqs_text')); ?></span></a></span>
	  					<?php }?>
	  					<?php if(get_theme_mod('custom_print_shop_topbar_contact_text') != '' || get_theme_mod('custom_print_shop_topbar_contact_url') != ''){?>
	  						<span class="contact-link"><a href="<?php echo esc_url(get_theme_mod('custom_print_shop_topbar_contact_url')); ?>"><?php echo esc_html(get_theme_mod('custom_print_shop_topbar_contact_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('custom_print_shop_topbar_contact_text')); ?></span></a></span>
	  					<?php }?>
	  				</div>
	  				<div class="col-lg-5 col-md-5 align-self-center mb-md-0 mb-3">
	  					<?php if(get_theme_mod('custom_print_shop_topbar_shipping_text') != ''){?>
	  						<p class="shipping-text mb-lg-0 text-center"><?php echo esc_html(get_theme_mod('custom_print_shop_topbar_shipping_text')); ?></p>
	  					<?php }?>
	  				</div>
	  				<div class="col-lg-2 col-md-2 topbar-bottom-links text-lg-end text-center mb-md-0 mb-3 align-self-center">
	  					<?php if(class_exists('woocommerce')){ ?>
			          <div class="currency-box d-md-inline-block">
			            <?php echo do_shortcode( '[woocommerce_currency_switcher_drop_down_box]' );?>
			          </div>
		        	<?php } ?>
		        </div>
		        <div class="col-lg-2 col-md-2 topbar-bottom-links text-lg-end text-center mb-md-0 mb-3 align-self-center">
			        <?php if( class_exists( 'GTranslate' ) ) { ?>
			          <div class="translate-lang position-relative d-md-inline-block me-3">
			            <?php echo do_shortcode( '[gtranslate]' );?>
			          </div>
			        <?php }?>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  <?php }?>

	  <!-- middle header -->
	  <div class="middle-header">
	  	<div class="container">
		  	<div class="row">
		  		<div class="col-lg-2 col-md-2 col-6 py-lg-0 py-md-0 py-3 align-self-center">
		  			<div class="logo">
	     	 			<?php if ( has_custom_logo() ) : ?>
	     	    		<div class="site-logo"><?php the_custom_logo(); ?></div>
		          	<?php endif; ?>
			        <?php if( get_theme_mod( 'custom_print_shop_site_title',true) != '') { ?>
	            	<?php $blog_info = get_bloginfo( 'name' ); ?>
		            <?php if ( ! empty( $blog_info ) ) : ?>
			            <?php if ( is_front_page() && is_home() ) : ?>
			              <h1 class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			            <?php else : ?>
			              <p class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			            <?php endif; ?>
			            <?php endif; ?>
			        <?php }?>
			        <?php if( get_theme_mod( 'custom_print_shop_site_tagline',false) != '') { ?>
		            <?php
			            $description = get_bloginfo( 'description', 'display' );
			            if ( $description || is_customize_preview() ) :
			            ?>
			            <p class="site-description">
			              <?php echo esc_html($description); ?>
			            </p>
		            <?php endif; ?>
			        <?php }?>
			    	</div>
		  		</div>
		  		<div class="col-lg-6 col-md-2 col-6 py-lg-0 py-md-0 py-3 align-self-start">
		  			<div class="toggle-menu responsive-menu text-lg-start text-md-start text-start">
	         		<button role="tab" onclick="custom_print_shop_menu_open()">
	         			<i class="<?php echo esc_attr(get_theme_mod('custom_print_shop_responsive_open_menu_icon','fas fa-bars'));?>"></i>
	         			<?php echo esc_html( get_theme_mod('custom_print_shop_open_menu_label', __('Open Menu','custom-print-shop'))); ?><span class="screen-reader-text"><?php esc_html_e( get_theme_mod('custom_print_shop_open_menu_label', __('Open Menu','custom-print-shop'))); ?></span>
	         		</button>
				    </div>
	         	<div id="menu-sidebar" class="nav side-menu">
	            <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'custom-print-shop' ); ?>">
	              <?php 
	                wp_nav_menu( array( 
	                  'theme_location' => 'primary',
	                  'container_class' => 'main-menu-navigation clearfix' ,
	                  'menu_class' => 'clearfix',
	                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 p-0">%3$s</ul>',
	                  'fallback_cb' => 'wp_page_menu',
	                ) ); 
	              ?>
	              <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="custom_print_shop_menu_close()">
	              	<?php echo esc_html( get_theme_mod('custom_print_shop_close_menu_label', __('Close Menu','custom-print-shop'))); ?><i class="<?php echo esc_attr(get_theme_mod('custom_print_shop_responsive_close_menu_icon','fas fa-times'));?>">
	              	</i>
	              	<span class="screen-reader-text"><?php esc_html_e( get_theme_mod('custom_print_shop_close_menu_label', __('Close Menu','custom-print-shop'))); ?></span>
	              </a>
	            </nav>
	        	</div>
		  		</div>
		  		<div class="col-lg-2 col-md-5 align-self-center py-lg-0 py-md-0 py-3">
		  			<?php if(class_exists('WooCommerce')){ ?>
		  				<div class="header-search">
		  					<?php get_product_search_form(); ?>
		  				</div>
		  			<?php }?>
		  		</div>
		  		<div class="col-lg-2 col-md-3 align-self-center text-md-end text-center">
		  			<?php if(get_theme_mod('custom_print_shop_wishlist_url') != ''){ ?>
	            <span class="wishlist"><a href="<?php echo esc_url(get_theme_mod('custom_print_shop_wishlist_url')); ?>"><i class="far fa-heart"></i><span class="screen-reader-text"><?php esc_html_e( 'Wishlist','custom-print-shop' );?></span></a></span>
	          <?php } ?>
	          <?php if(class_exists('woocommerce')){ ?>
	            <span class="myaccount-link"><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="far fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','custom-print-shop' );?></span></a></span>
	          <?php }?>
	  				<?php if(class_exists('woocommerce')){ ?>
	            <span class="cart_no"><a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-cart"></i><span class="screen-reader-text"><?php esc_html_e( 'Cart item','custom-print-shop' );?></span></a></span>
	          <?php } ?>
		  		</div>
		  	</div>
	  	</div>
		</div>
	</div>	
</header>