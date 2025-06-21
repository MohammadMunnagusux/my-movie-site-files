<?php

$entertainment_media_custom_css = '';


$entertainment_media_is_dark_mode_enabled = get_theme_mod( 'entertainment_media_is_dark_mode_enabled', false );

if ( $entertainment_media_is_dark_mode_enabled ) {

    $entertainment_media_custom_css .= 'body{';
    $entertainment_media_custom_css .= 'background: #000;';
    $entertainment_media_custom_css .= '}';

    $entertainment_media_custom_css .= '.some {';
    $entertainment_media_custom_css .= 'background: #000 !important;';
    $entertainment_media_custom_css .= '}';

	$entertainment_media_custom_css .= '.sticky .post-content{';
    $entertainment_media_custom_css .= 'color: #000';
    $entertainment_media_custom_css .= '}';

	$entertainment_media_custom_css .= 'h5.product-text a,#featured-product p.price,.card-header a,.comment-content.card-block p,.post-box.sticky a{';
    $entertainment_media_custom_css .= 'color: #000 !important';
    $entertainment_media_custom_css .= '}';

    $entertainment_media_custom_css .= '.some{';
    $entertainment_media_custom_css .= 'background: #fff;';
    $entertainment_media_custom_css .= '}';

    $entertainment_media_custom_css .= '.some {';
    $entertainment_media_custom_css .= 'background: #fff !important;';
    $entertainment_media_custom_css .= '}';
	

    $entertainment_media_custom_css .= 'body,h1,h2,h3,h4,h5,p,#main-menu ul li a,.woocommerce .woocommerce-ordering select, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea,a,.featured_movies h3{';
    $entertainment_media_custom_css .= 'color: #fff;';
    $entertainment_media_custom_css .= '}';

    $entertainment_media_custom_css .= 'a.wc-block-components-product-name, .wc-block-components-product-name,.wc-block-components-totals-footer-item .wc-block-components-totals-item__value,
.wc-block-components-totals-footer-item .wc-block-components-totals-item__label,
.wc-block-components-totals-item__label,.wc-block-components-totals-item__value,
.wc-block-components-product-metadata .wc-block-components-product-metadata__description>p,
.is-medium table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__total .wc-block-components-formatted-money-amount,
.wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input,
.wc-block-components-quantity-selector .wc-block-components-quantity-selector__button,
.wc-block-components-quantity-selector,table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,
.wc-block-components-product-price__value.is-discounted,del.wc-block-components-product-price__regular,.logo a,.logo span,h1.woocommerce-products-header__title.page-title,h2.woocommerce-loop-product__title,h1.product_title.entry-title,div#tab-description h2,section.related.products h2,h2.woocommerce-Reviews-title,h2#reply-title,h2.comments-title{';
    $entertainment_media_custom_css .= 'color: #fff !important;';
    $entertainment_media_custom_css .= '}';

	$entertainment_media_custom_css .= '.post-box{';
    $entertainment_media_custom_css .= '    border: 1px solid rgb(229 229 229 / 48%)';
    $entertainment_media_custom_css .= '}';
}

	/*---------------------------Transform -------------------*/

	$entertainment_media_text_transform = get_theme_mod( 'menu_text_transform_entertainment_media','CAPITALISE');
    if($entertainment_media_text_transform == 'CAPITALISE'){

		$entertainment_media_custom_css .='#main-menu ul li a{';

			$entertainment_media_custom_css .='text-transform: capitalize ; font-size: 14px;';

		$entertainment_media_custom_css .='}';

	}else if($entertainment_media_text_transform == 'UPPERCASE'){

		$entertainment_media_custom_css .='#main-menu ul li a{';

			$entertainment_media_custom_css .='text-transform: uppercase ; font-size: 14px;';

		$entertainment_media_custom_css .='}';

	}else if($entertainment_media_text_transform == 'LOWERCASE'){

		$entertainment_media_custom_css .='#main-menu ul li a{';

			$entertainment_media_custom_css .='text-transform: lowercase ; font-size: 14px;';

		$entertainment_media_custom_css .='}';
	}

	/*---------------------------menu-zoom-------------------*/

		$entertainment_media_menu_zoom = get_theme_mod( 'entertainment_media_menu_zoom','None');

    if($entertainment_media_menu_zoom == 'None'){

		$entertainment_media_custom_css .='#main-menu ul li a{';

			$entertainment_media_custom_css .='';

		$entertainment_media_custom_css .='}';

	}else if($entertainment_media_menu_zoom == 'Zoominn'){

		$entertainment_media_custom_css .='#main-menu ul li a:hover{';

			$entertainment_media_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #ff4162;';

		$entertainment_media_custom_css .='}';
	}


		/*---------------------------Container Width-------------------*/

	$entertainment_media_container_width = get_theme_mod('entertainment_media_container_width');

			$entertainment_media_custom_css .='body{';

				$entertainment_media_custom_css .='width: '.esc_attr($entertainment_media_container_width).'%; margin: auto;';

			$entertainment_media_custom_css .='}';

			/*---------------------------Slider-content-alignment-------------------*/


$entertainment_media_slider_content_alignment = get_theme_mod( 'entertainment_media_slider_content_alignment','LEFT-ALIGN');

 if($entertainment_media_slider_content_alignment == 'LEFT-ALIGN'){

		$entertainment_media_custom_css .='.slider-content{';

			$entertainment_media_custom_css .='text-align:left;';

		$entertainment_media_custom_css .='}';


	}else if($entertainment_media_slider_content_alignment == 'CENTER-ALIGN'){

		$entertainment_media_custom_css .='.slider-content{';

			$entertainment_media_custom_css .='text-align:center;';

		$entertainment_media_custom_css .='}';


	}else if($entertainment_media_slider_content_alignment == 'RIGHT-ALIGN'){

		$entertainment_media_custom_css .='.slider-content{';

			$entertainment_media_custom_css .='text-align:right;';

		$entertainment_media_custom_css .='}';

	}

	/*---------------------------Copyright Text alignment-------------------*/

$entertainment_media_copyright_text_alignment = get_theme_mod( 'entertainment_media_copyright_text_alignment','LEFT-ALIGN');

 if($entertainment_media_copyright_text_alignment == 'LEFT-ALIGN'){

		$entertainment_media_custom_css .='.copy-text p{';

			$entertainment_media_custom_css .='text-align:left;';

		$entertainment_media_custom_css .='}';


	}else if($entertainment_media_copyright_text_alignment == 'CENTER-ALIGN'){

		$entertainment_media_custom_css .='.copy-text p{';

			$entertainment_media_custom_css .='text-align:center;';

		$entertainment_media_custom_css .='}';


	}else if($entertainment_media_copyright_text_alignment == 'RIGHT-ALIGN'){

		$entertainment_media_custom_css .='.copy-text p{';

			$entertainment_media_custom_css .='text-align:right;';

		$entertainment_media_custom_css .='}';

	}

	/*---------------------------related Product Settings-------------------*/

	$entertainment_media_related_product_setting = get_theme_mod('entertainment_media_related_product_setting',true);

		if($entertainment_media_related_product_setting == false){

			$entertainment_media_custom_css .='.related.products, .related h2{';

				$entertainment_media_custom_css .='display: none;';

			$entertainment_media_custom_css .='}';
		}

	/*---------------------------Scroll to Top Alignment Settings-------------------*/

	$entertainment_media_scroll_top_position = get_theme_mod( 'entertainment_media_scroll_top_position','Right');

	if($entertainment_media_scroll_top_position == 'Right'){

		$entertainment_media_custom_css .='.scroll-up{';

			$entertainment_media_custom_css .='right: 20px;';

		$entertainment_media_custom_css .='}';

	}else if($entertainment_media_scroll_top_position == 'Left'){

		$entertainment_media_custom_css .='.scroll-up{';

			$entertainment_media_custom_css .='left: 20px;';

		$entertainment_media_custom_css .='}';

	}else if($entertainment_media_scroll_top_position == 'Center'){

		$entertainment_media_custom_css .='.scroll-up{';

			$entertainment_media_custom_css .='right: 50%;left: 50%;';

		$entertainment_media_custom_css .='}';
	}

		/*---------------------------Pagination Settings-------------------*/


$entertainment_media_pagination_setting = get_theme_mod('entertainment_media_pagination_setting',true);

	if($entertainment_media_pagination_setting == false){

		$entertainment_media_custom_css .='.nav-links{';

			$entertainment_media_custom_css .='display: none;';

		$entertainment_media_custom_css .='}';
	}

		/*--------------------------- Slider Opacity -------------------*/

	$entertainment_media_slider_opacity_color = get_theme_mod( 'entertainment_media_slider_opacity_color','0.5');

	if($entertainment_media_slider_opacity_color == '0'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == '0.1'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0.1';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == '0.2'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0.2';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == '0.3'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0.3';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == '0.4'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0.4';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == '0.5'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0.5';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == '0.6'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0.6';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == '0.7'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0.7';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == '0.8'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0.8';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == '0.9'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:0.9';

		$entertainment_media_custom_css .='}';

		}else if($entertainment_media_slider_opacity_color == 'unset'){

		$entertainment_media_custom_css .='#slider img.slide-image{';

			$entertainment_media_custom_css .='opacity:unset';

		$entertainment_media_custom_css .='}';

		}

	/*---------------------------Woocommerce Pagination Alignment Settings-------------------*/

	$entertainment_media_woocommerce_pagination_position = get_theme_mod( 'entertainment_media_woocommerce_pagination_position','Center');

	if($entertainment_media_woocommerce_pagination_position == 'Left'){

		$entertainment_media_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$entertainment_media_custom_css .='text-align: left;';

		$entertainment_media_custom_css .='}';

	}else if($entertainment_media_woocommerce_pagination_position == 'Center'){

		$entertainment_media_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$entertainment_media_custom_css .='text-align: center;';

		$entertainment_media_custom_css .='}';

	}else if($entertainment_media_woocommerce_pagination_position == 'Right'){

		$entertainment_media_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$entertainment_media_custom_css .='text-align: right;';

		$entertainment_media_custom_css .='}';
	}

