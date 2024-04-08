/**
 * The main JS File for My Online Shop Product Theme
 *
 * @package My Online Shop Product
 * @subpackage my_online_shop_product
 */

	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
	const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
	jQuery(document).ready(function($){
		$(".my_online_shop_product_card_box .card-header a").on("focus", function(){
			if(document.activeElement == this){
				setTimeout(() => {
					$(this).find('[data-bs-toggle="tooltip"]').tooltip('show');
				}, 500);

				if($(this).closest('.swiper-slide').siblings('.swiper-slide').length > 0){
					$(this).closest('.swiper-slide').siblings('.swiper-slide').each(function(e, el){
						$(el).find('[data-bs-toggle="tooltip"]').tooltip('hide');
					})
				}else if($(this).closest('li').siblings('li').length > 0){
					$(this).closest('li').siblings('li').each(function(e, el){
						$(el).find('[data-bs-toggle="tooltip"]').tooltip('hide');
					})
				}

			}else{
				$(this).find('[data-bs-toggle="tooltip"]').tooltip('hide');
			}
		});
		
		$(".my_online_shop_product_card_box .card-header a").on("blur", function(){
			$(this).find('[data-bs-toggle="tooltip"]').tooltip('hide');	
		});
	});

/*  <----------------------------------------------------Main Nav Menu-----------------------------------------------> */
	jQuery(document).ready(function($){

		$(".my-online-shop-product-nav-bar").on('click', '.nav-menu-toggler', function(){
			if($(this).attr('aria-expanded') == 'false'){
				$(this).parents('html').css({'overflow': 'hidden'});
				$(this).attr('aria-expanded', 'true');
				$(this).addClass('open');
				$(this).next().addClass('open');
				$(this).focus();
				let headerH = $(".my-online-shop-product-header").outerHeight(true);
				if($("#wpadminbar").length > 0){
					let adminBarH = $("#wpadminbar").outerHeight(true);
					$(".my-online-shop-product-nav-bar .nav-menu").css({'top': `${headerH + adminBarH + 1}px`, 'height': `calc(100% - ${headerH + adminBarH + 1}px)`});
				}else{
					$(".my-online-shop-product-nav-bar .nav-menu").css({'top': `${headerH + 1}px`, 'height': `calc(100% - ${headerH + 1}px)`});
				}
				
				setTimeout(() => {
					$(this).next().addClass('display-nav-menu');			
				},200);
			}else{
			  
				$(this).parents('html').css({'overflow': 'auto'});
				$(this).attr('aria-expanded', 'false');
				$(this).next().removeClass('display-nav-menu');
				setTimeout(() => {
					$(this).removeClass('open');
					$(this).next().removeClass('open');
					if( $(this).next().find('.open').length > 0 ){
						$(this).next().find('.open').each(function(i, el){
							$(el).removeClass('open');
						});
					}
					$(".my-online-shop-product-nav-bar .nav-menu").css({'top': `auto`,'height': 'auto'});
				},200);
			}
		});	
		
		$(".my-online-shop-product-nav-bar ul.main_menu").on('click', 'li.menu-item-has-children > a',function(){
			if($(window).innerWidth() < 768){ 
				if(!$(this).next().hasClass('open')){
					$(this).addClass('open');
					$(this).next().addClass('open');
				}else{
					$(this).removeClass('open');
					$(this).next().removeClass('open');
					if($(this).next().find('.open').length > 0){
						$(this).next().find('.open').each(function(index, el){
							if($(el).hasClass('open')){
								$(el).removeClass('open');
							}
						})
					}
				}
			}
		});

		$(".my-online-shop-product-nav-bar .nav-menu li").hover(function(){
			if($(window).innerWidth() >= 768){
				if(!$(this).hasClass('hover')){
					$(this).addClass('hover');
				}else{
					$(this).removeClass('hover');
				}
			}
		});

		$(".my-online-shop-product-nav-bar a").last().on('keydown',function(e){	
			if($(window).innerWidth() < 768 ){
				if(e.shiftKey && e.key == 'Tab'){
					$(this).parent().focus();
				}else if( e.key == 'Tab' ){
					$('button.nav-menu-toggler').prev().focus();
				}
			}
		});

		/* Search Form on Top Bar*/
		$(".my-online-shop-product-top-bar").on('click', '.top-bar-item.search button',function(){	
			if(!$(this).next().hasClass('show')){
				$(this).next().addClass('show');
				setTimeout(() => {
					$(this).next().addClass('open');
					$(this).next().find('input.search_field').focus();
				}, 100);
			}else{
				$(this).next().removeClass('open');
				setTimeout(() => {
					$(this).next().removeClass('show');
					$(this).next().find('input.search_field').blur();
				}, 100);
			}
		});

		$(".my-online-shop-product-top-bar").on('blur', 'button.search-submit',function(){	
			$(".my-online-shop-product-top-bar .top-bar-item.search button.search-button").focus();
		});

		$(document).on('keydown',function(e){	
			if(e.key == 'Escape'){
				if($(".my-online-shop-product-top-bar").find('.search-form').hasClass('show')){
					$(".my-online-shop-product-top-bar").find('.search-form').removeClass('open');
					$(".my-online-shop-product-top-bar").find('.search-form').removeClass('show');
					$(".my-online-shop-product-top-bar").find('.search-form').find('input.search_field').blur();
				}
				$(".my-online-shop-product-nav-bar a").blur();
				if($(".my-online-shop-product-nav-bar").find('.nav-menu-toggler').attr('aria-expanded') == 'true'){
					$(".my-online-shop-product-nav-bar").find('.nav-menu-toggler').focus();
				}
			}
		});

	});


/*  <---------------------------------------------------Scroll to Top Button----------------------------------------> */
	jQuery(document).ready(function($){
		$(window).scroll(function(){
			if($(this).scrollTop() > 400){
				$(".my_online_shop_product_scroll_to_top_button").addClass('display');;
			}else{
				$(".my_online_shop_product_scroll_to_top_button").removeClass('display');
			}
		})
		$(".my_online_shop_product_scroll_to_top_button").on('click', function(e){
			e.preventDefault();
			$(window).scrollTop(0);
		});

		/*  <---------------------------------------------------Key Event Setting----------------------------------------> */	
		$(document).on('keyup', function(e){
			if(e.key == 'Escape'){
				e.preventDefault();
				//Scroll to top button
				if( $(".my_online_shop_product_scroll_to_top_button").hasClass('display')){
					if(!$(".my_online_shop_product_scroll_to_top_button").is(':focus')){
						$(".my_online_shop_product_scroll_to_top_button").focus()
					}else{
						$(".my_online_shop_product_scroll_to_top_button").blur()
					}
				}
				
			}
		});

	});

/*  <----------------------------------------------------SwiperJs----------------------------------------------------> */
	/* Header Slider Swiper */
		var swiper_slider = new Swiper(".my-online-shop-product-slider-container.swiper", {
			slidesPerView: 1,
			spaceBetween: 30,
			speed:2000,
			loop: true,
			centeredSlides: true,
			autoplay: {
				delay: 4000,
				disableOnInteraction: false,
			},
			pagination: {
				el: ".my_online_shop_product_slider.swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".my_online_shop_product_slider.swiper-button-next",
				prevEl: ".my_online_shop_product_slider.swiper-button-prev",
			},
			keyboard: {
				enabled: true,
				onlyInViewport: false,
			},
		});

	/* Home Page Category Section Slider Swiper */
		let my_online_shop_product_section_category_per_view = 3;
		if( document.querySelector("#my_online_shop_product_category_section_slider_per_view") ){
			my_online_shop_product_section_category_per_view = document.querySelector("#my_online_shop_product_category_section_slider_per_view").value;
		}
		var swiper_category = new Swiper(".my_online_shop_product_category_container.swiper", {
			slidesPerView: 1,
			spaceBetween: 40,
			autoplay: {
				delay: 1500,
				disableOnInteraction: false,
			},
			loop:true,
			speed:1500,
			pagination: {
				el: ".my_online_shop_product_category_product.swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".my_online_shop_product_category_product.swiper-button-next",
				prevEl: ".my_online_shop_product_category_product.swiper-button-prev",
			},
			keyboard: {
				enabled: true,
				onlyInViewport: false,
			},
			breakpoints: {
				"640": {
					slidesPerView: Math.abs(my_online_shop_product_section_category_per_view) - 2,
					spaceBetween: 35,
				},
				"768": {
					slidesPerView: Math.abs(my_online_shop_product_section_category_per_view) - 1,
					spaceBetween: 35,
				},
				"992": {
					slidesPerView: Math.abs(my_online_shop_product_section_category_per_view),
					spaceBetween: 35,
				},
			}
		});

	/* Home Page Popular Product Section Slider Swiper */
		let my_online_shop_product_section_per_view = 4;
		if( document.querySelector("#my_online_shop_product_section_per_view") ){
			my_online_shop_product_section_per_view = document.querySelector("#my_online_shop_product_section_per_view").value;
		}
		var swiper_popular = new Swiper(".my_online_shop_product_popular_product_container.swiper", {
			slidesPerView: 1,
			spaceBetween: 40,
			pagination: {
				el: ".my_online_shop_product_popular_product.swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".my_online_shop_product_popular_product.swiper-button-next",
				prevEl: ".my_online_shop_product_popular_product.swiper-button-prev",
			},
			keyboard: {
				enabled: true,
				onlyInViewport: false,
			},
			breakpoints: {
				"640": {
					slidesPerView: Math.abs(my_online_shop_product_section_per_view) - 2,
					spaceBetween: 35,
				},
				"768": {
					slidesPerView: Math.abs(my_online_shop_product_section_per_view) - 1,
					spaceBetween: 35,
				},
				"992": {
					slidesPerView: Math.abs(my_online_shop_product_section_per_view),
					spaceBetween: 35,
				},
			}
		});

	/* Home Page New Arrival Product Section Slider Swiper */	
		var swiper_new_arrival = new Swiper(".my_online_shop_product_new_arrival_product_container.swiper", {
			slidesPerView: 1,
			spaceBetween: 40,
			pagination: {
				el: ".my_online_shop_product_new_arrival_product.swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".my_online_shop_product_new_arrival_product.swiper-button-next",
				prevEl: ".my_online_shop_product_new_arrival_product.swiper-button-prev",
			},
			keyboard: {
				enabled: true,
				onlyInViewport: false,
			},
			breakpoints: {
				"640": {
					slidesPerView: Math.abs(my_online_shop_product_section_per_view) - 2,
					spaceBetween: 35,
				},
				"768": {
					slidesPerView: Math.abs(my_online_shop_product_section_per_view) - 1,
					spaceBetween: 35,
				},
				"992": {
					slidesPerView: Math.abs(my_online_shop_product_section_per_view),
					spaceBetween: 35,
				},
			}
		});

	/* Home Page News Section Slider Swiper */
		var swiper_news = new Swiper(".my_online_shop_product_news_container.swiper", {
			slidesPerView: 1,
			spaceBetween: 40,
			pagination: {
				el: ".my_online_shop_product_news.swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".my_online_shop_product_news.swiper-button-next",
				prevEl: ".my_online_shop_product_news.swiper-button-prev",
			},
			keyboard: {
				enabled: true,
				onlyInViewport: false,
			},
			breakpoints: {
				"640": {
					slidesPerView: Math.abs(my_online_shop_product_section_per_view) - 2,
					spaceBetween: 35,
				},
				"768": {
					slidesPerView: Math.abs(my_online_shop_product_section_per_view) - 1,
					spaceBetween: 35,
				},
				"992": {
					slidesPerView: Math.abs(my_online_shop_product_section_per_view),
					spaceBetween: 35,
				},
			}
		});
	/* Single Page Related Product Section Slider Swiper */
		let my_online_shop_product_related_products_section_per_view = 3;
		if( document.querySelector("#my_online_shop_product_related_products_section_per_view") ){
			my_online_shop_product_related_products_section_per_view = document.querySelector("#my_online_shop_product_related_products_section_per_view").value;
		}
		var swiper_related = new Swiper(".my_online_shop_product_related_product_container.swiper", {
			slidesPerView: 1,
			spaceBetween: 40,
			pagination: {
				el: ".my_online_shop_product_related_product.swiper-pagination",
				clickable: true,
			},
			navigation: {
				nextEl: ".my_online_shop_product_related_product.swiper-button-next",
				prevEl: ".my_online_shop_product_related_product.swiper-button-prev",
			},
			keyboard: {
				enabled: true,
				onlyInViewport: false,
			},
			breakpoints: {
				"640": {
					slidesPerView: parseInt(my_online_shop_product_related_products_section_per_view) - 2,
					spaceBetween: 35,
				},
				"768": {
					slidesPerView: parseInt(my_online_shop_product_related_products_section_per_view) - 1,
					spaceBetween: 35,
				},
				"992": {
					slidesPerView: parseInt(my_online_shop_product_related_products_section_per_view),
					spaceBetween: 35,
				},
			}
		});

/*  <----------------------------------------------------Sticky Class to SideBar-------------------------------------> */
	jQuery(document).ready(function($){	    
		$(window).on( 'scroll', function(){
			let headerHeight    = $('.my-online-shop-product-header').height();
			let sideBar  = $('.my_online_shop_product_sidebar');
			if(sideBar.length > 0){
				if($(window).innerWidth() >= 768){	
					if($(this).scrollTop() > headerHeight){
						sideBar.addClass('sidebar_sticky');
						sideBar.css('top', `${headerHeight/2}px`);
					}else{
						sideBar.removeClass('sidebar_sticky');
					}
				}
			}
		});

		/*  <---------------------------------------------------Init function Setting----------------------------------------> */
		(function() {
			let headerH = $(".my-online-shop-product-header").outerHeight(true);
			let footerH = $(".my_online_shop_product_footer_wrapper").outerHeight(true);
			$("main").css('minHeight', `calc(100vh - ${headerH}px - ${footerH}px)`);
	
			if($(window).innerWidth() >= 768){
				$(".my_online_shop_product_section.header_slider").css('height', `calc(97vh - ${headerH}px)`);
				if($(".my-online-shop-product-nav-bar").find('.open').length > 0){
					$(".my-online-shop-product-nav-bar").find('.open').each(function(index, el){
						$(el).removeClass("open"); 
					})
				} 

				if($('.my-online-shop-product-nav-bar .nav-menu ul.main_menu').find('.current-menu-ancestor').length > 0){
					$('.my-online-shop-product-nav-bar .nav-menu ul.main_menu').find('.current-menu-ancestor').addClass('active_item')
					$('.my-online-shop-product-nav-bar .nav-menu ul.main_menu').find('.current-menu-ancestor').siblings().each(function(){
						if($(this).hasClass('active_item')){
							$(this).removeClass('active_item');
						}
					})	
				}else if($('.my-online-shop-product-nav-bar .nav-menu ul.main_menu').find('.current-menu-item').length > 0){
					$('.my-online-shop-product-nav-bar .nav-menu ul.main_menu').find('.current-menu-item').addClass('active_item')
					$('.my-online-shop-product-nav-bar .nav-menu ul.main_menu').find('.current-menu-item').siblings().each(function(){
						if($(this).hasClass('active_item')){
							$(this).removeClass('active_item');
						}
					})	
				}else{
					$('.my-online-shop-product-nav-bar .nav-menu ul.main_menu li').first().addClass('active_item');
				}
					
			}else{
				$(".my_online_shop_product_section.header_slider").css('height', `100vh`);
			}

			if($('.my-online-shop-product-nav-bar .nav-menu ul.main_menu').find('li.menu-item-has-children > a').length > 0){
				$('.my-online-shop-product-nav-bar .nav-menu ul.main_menu').find('li.menu-item-has-children > a').each(function(){
					$(this).attr('href', "#");
				});
			}
			
			//Woocommerce Cart Page
			if($('#content').find('.wp-block-woocommerce-cart').length > 0){
				$('.wp-block-woocommerce-cart').addClass('table-responsive');
			}
			
		})();
		
	});

	