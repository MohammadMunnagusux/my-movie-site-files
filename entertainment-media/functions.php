<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function entertainment_media_enqueue_google_fonts() {

	require_once get_theme_file_path( 'core/includes/wptt-webfont-loader.php' );

	wp_enqueue_style( 'google-fonts-open', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'entertainment_media_enqueue_google_fonts' );

if (!function_exists('entertainment_media_enqueue_scripts')) {

	function entertainment_media_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'slick-css',
			get_template_directory_uri() . '/css/slick.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('entertainment-media-style', get_stylesheet_uri(), array() );

		wp_enqueue_style(
			'entertainment-media-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'entertainment-media-woocommerce-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('dashicons');

		wp_enqueue_script(
			'entertainment-media-navigation',
			get_template_directory_uri() . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'slick-min-js',
			get_template_directory_uri() . '/js/slick.min.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'entertainment-media-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

			if ( get_theme_mod( 'entertainment_media_animation_enabled', true ) ) {
	        wp_enqueue_script(
	            'entertainment-media-wow-script',
	            get_template_directory_uri() . '/js/wow.js',
	            array( 'jquery' ),
	            '1.0',
	            true
	        );

	        wp_enqueue_style(
	            'entertainment-media-animate',
	            get_template_directory_uri() . '/css/animate.css',
	            array(),
	            '4.1.1'
	        );
	    }

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$entertainment_media_css = '';

		if ( get_header_image() ) :

			$entertainment_media_css .=  '
				.topheader{
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'entertainment-media-style', $entertainment_media_css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'entertainment-media-style',$entertainment_media_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'entertainment_media_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('entertainment_media_after_setup_theme')) {

	function entertainment_media_after_setup_theme() {

		load_theme_textdomain( 'entertainment-media', get_stylesheet_directory() . '/languages' );

		if ( ! isset( $entertainment_media_content_width ) ) $entertainment_media_content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'entertainment-media' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'f3f3f3'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );


		add_editor_style( array( '/css/editor-style.css' ) );

		add_action( 'wp_ajax_ive-check-plugin-exists', 'check_plugin_exists' );
		add_action( 'wp_ajax_ive_install_and_activate_plugin', 'mep_install_and_activate_plugin' );
	}

	add_action( 'after_setup_theme', 'entertainment_media_after_setup_theme', 999 );

}

function mep_install_and_activate_plugin() {

	$post_plugin_details = $_POST['plugin_details'];
	$plugin_text_domain = $post_plugin_details['plugin_text_domain'];
	$plugin_main_file		=	$post_plugin_details['plugin_main_file'];
	$plugin_url					=	$post_plugin_details['plugin_url'];

	$plugin = array(
		'text_domain'	=> $plugin_text_domain,
		'path' 				=> $plugin_url,
		'install' 		=> $plugin_text_domain . '/' . $plugin_main_file
	);

	wp_cache_flush();

	$plugin_path = plugin_basename( trim( $plugin['install'] ) );


	$activate_plugin = activate_plugin( $plugin_path );

	if($activate_plugin) {

		echo $activate_plugin;

	} else {
		echo $activate_plugin;
	}

	$msg = 'installed';

	$response = array( 'status' => true, 'msg' => $msg );
	wp_send_json( $response );
	exit;
}

function check_plugin_exists() {
		$plugin_text_domain = $_POST['plugin_text_domain'];
		$main_plugin_file 	= $_POST['main_plugin_file'];
		$plugin_path = $plugin_text_domain . '/' . $main_plugin_file;

		$get_plugins					= get_plugins();
		$is_plugin_installed	= false;
		$activation_status 		= false;
		if ( isset( $get_plugins[$plugin_path] ) ) {
		$is_plugin_installed = true;

		$activation_status = is_plugin_active( $plugin_path );
		}
		wp_send_json_success(
		array(
		'install_status'  =>	$is_plugin_installed,
			'active_status'		=>	$activation_status,
			'plugin_path'			=>	$plugin_path,
			'plugin_slug'			=>	$plugin_text_domain
		)
		);
}

function entertainment_media_template_setup() {

require get_template_directory() .'/core/includes/customizer-notice/entertainment-media-customizer-notify.php';
require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/theme-breadcrumb.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() . '/core/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

}
add_action('after_setup_theme', 'entertainment_media_template_setup');

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function entertainment_media_logo_resizer() {

    $entertainment_media_theme_logo_size_css = '';
    $entertainment_media_logo_resizer = get_theme_mod('entertainment_media_logo_resizer');

	$entertainment_media_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($entertainment_media_logo_resizer).'px !important;
			width: '.esc_attr($entertainment_media_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'entertainment-media-style',$entertainment_media_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'entertainment_media_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function entertainment_media_global_color() {

    $entertainment_media_theme_color_css = '';
    $entertainment_media_global_color = get_theme_mod('entertainment_media_global_color');
    $entertainment_media_global_color_2 = get_theme_mod('entertainment_media_global_color_2');
    $entertainment_media_global_color_3 = get_theme_mod('entertainment_media_global_color_3');
    $entertainment_media_copyright_bg = get_theme_mod('entertainment_media_copyright_bg');

	$entertainment_media_theme_color_css = '
		.wp-block-button__link,.header-search form.woocommerce-product-search,#main-menu ul.children li a:hover,
#main-menu ul.sub-menu li a:hover,.post-button a,#slider .button,.featured_movies .box a.icon,.scroll-up a,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.entertainment-media-pagination span.current,.entertainment-media-pagination span.current:hover,.entertainment-media-pagination span.current:focus,.entertainment-media-pagination a span:hover,.entertainment-media-pagination a span:focus,.woocommerce nav.woocommerce-pagination ul li span.current,.comment-respond input#submit,.comment-reply a,.sidebar-area h4.title, .sidebar-area h1.wp-block-heading,.sidebar-area h2.wp-block-heading,.sidebar-area h3.wp-block-heading,.sidebar-area h4.wp-block-heading,.sidebar-area h5.wp-block-heading,.sidebar-area h6.wp-block-heading,.sidebar-area .wp-block-search__label,.sidebar-area .tagcloud a, p.wp-block-tag-cloud a,.searchform input[type=submit], .sidebar-area .wp-block-search__button,.searchform input[type=submit]:hover,.searchform input[type=submit]:focus,nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce a.added_to_cart,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wc-block-components-order-summary-item__quantity {
			background-image: linear-gradient(to right, '.esc_attr($entertainment_media_global_color).' , '.esc_attr($entertainment_media_global_color_2).');
		}
		@media screen and (min-width: 320px) and (max-width: 767px) {
		    .menu-toggle, .dropdown-toggle,button.close-menu {
		        background: '.esc_attr($entertainment_media_global_color).';
		    }
		}
		a:hover,a:focus,.topheader span i,#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,#main-menu ul li.current_page_ancestor > a,#main-menu ul li.current-menu-ancestor > a,.post-meta i,#slider .button:hover,.featured_movies .box a.icon:hover,.bread_crumb a:hover,.bread_crumb span,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price{
			color: '.esc_attr($entertainment_media_global_color).';
		}
		#site-navigation,.post-button a:hover,#slider .slider-image-box,.comment-respond input#submit:hover,.comment-reply a:hover,.sidebar-area .tagcloud a:hover,nav.woocommerce-MyAccount-navigation ul li:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce a.added_to_cart:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover,.triangle35b:nth-child(1),.triangle35b:nth-child(3){
			background: '.esc_attr($entertainment_media_global_color_3).';
		}
		.feature-header{
			background-color: '.esc_attr($entertainment_media_global_color_3).' !important;
		}
		h1,h2,h3,h4,h5,h6,.logo a,.logo span,#main-menu ul.sub-menu li a,pre,.scroll-up a,a.wc-block-components-product-name, .wc-block-components-product-name{
			color: '.esc_attr($entertainment_media_global_color_3).';
		}
		.wc-block-components-totals-footer-item .wc-block-components-totals-item__value,.wc-block-components-totals-footer-item .wc-block-components-totals-item__label,.wc-block-components-totals-item__label,.wc-block-components-totals-item__value,.wc-block-components-product-metadata .wc-block-components-product-metadata__description>p,.is-medium table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__total .wc-block-components-formatted-money-amount,.wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input,.wc-block-components-quantity-selector .wc-block-components-quantity-selector__button,.wc-block-components-quantity-selector,table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,.wc-block-components-product-price__value.is-discounted,del.wc-block-components-product-price__regular{
			color: '.esc_attr($entertainment_media_global_color_3).'!important;
		}
		.sidebar-area select,.sidebar-area textarea, #comments textarea,.sidebar-area input[type="text"], #comments input[type="text"],.sidebar-area input[type="password"],.sidebar-area input[type="datetime"],.sidebar-area input[type="datetime-local"],.sidebar-area input[type="date"],.sidebar-area input[type="month"],.sidebar-area input[type="time"],.sidebar-area input[type="week"],.sidebar-area input[type="number"],.sidebar-area input[type="email"],.sidebar-area input[type="url"],.sidebar-area input[type="search"],.sidebar-area input[type="tel"],.sidebar-area input[type="color"],.sidebar-area .uneditable-input,#comments input[type="email"],#comments input[type="url"],.wp-block-woocommerce-cart .wc-block-cart__submit-button:hover, .wc-block-components-checkout-place-order-button:hover,tbody.wc-block-cart-items,.sidebar-area h4.title, .sidebar-area h1.wp-block-heading, .sidebar-area h2.wp-block-heading, .sidebar-area h3.wp-block-heading, .sidebar-area h4.wp-block-heading, .sidebar-area h5.wp-block-heading, .sidebar-area h6.wp-block-heading, .sidebar-area .wp-block-search__label{
			border-color: '.esc_attr($entertainment_media_global_color_3).';
		}
		.wc-block-components-totals-wrapper:after{
			border-color: '.esc_attr($entertainment_media_global_color_3).'!important;
		}
    	.copyright {
			background: '.esc_attr($entertainment_media_copyright_bg).';
		}
	';
    wp_add_inline_style( 'entertainment-media-style',$entertainment_media_theme_color_css );
    wp_add_inline_style( 'entertainment-media-woocommerce-css',$entertainment_media_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'entertainment_media_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('entertainment_media_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function entertainment_media_comment($comment, $entertainment_media_args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'entertainment-media');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'entertainment-media'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($entertainment_media_args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $entertainment_media_args['avatar_size']) echo get_avatar($comment, $entertainment_media_args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
							    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							        <time datetime="<?php comment_time( 'c' ); ?>">
							            <?php printf(
							                esc_html__( '%1$s at %2$s', 'entertainment-media' ),
							                esc_html( get_comment_date() ), esc_html( get_comment_time() ) ); ?>
							        </time>
							    </a>
							    <?php
							    edit_comment_link(esc_html__( 'Edit', 'entertainment-media' ),'<span class="edit-link">','</span>');?>
							</div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'entertainment-media'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $entertainment_media_args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $entertainment_media_args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for entertainment_media_comment()

if (!function_exists('entertainment_media_widgets_init')) {

	function entertainment_media_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','entertainment-media'),
			'id'   => 'entertainment-media-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'entertainment-media'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 2','entertainment-media'),
			'id'   => 'entertainment-media-sidebar-2',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'entertainment-media'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 3','entertainment-media'),
			'id'   => 'entertainment-media-sidebar-3',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'entertainment-media'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','entertainment-media'),
			'id'   => 'entertainment-media-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'entertainment-media'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'entertainment_media_widgets_init' );

}

function entertainment_media_get_categories_select() {
	$entertainment_media_teh_cats = get_categories();
	$results = array();
	$entertainment_media_count = count($entertainment_media_teh_cats);
	for ($i=0; $i < $entertainment_media_count; $i++) {
	if (isset($entertainment_media_teh_cats[$i]))
  		$results[$entertainment_media_teh_cats[$i]->slug] = $entertainment_media_teh_cats[$i]->name;
	else
  		$entertainment_media_count++;
	}
	return $results;
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'entertainment_media_loop_columns');
if (!function_exists('entertainment_media_loop_columns')) {
	function entertainment_media_loop_columns() {
		$entertainment_media_post_columns = get_theme_mod( 'entertainment_media_per_columns', 3 );
		return $entertainment_media_post_columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'entertainment_media_per_page', 20 );
function entertainment_media_per_page( $entertainment_media_post_cols ) {
  	$entertainment_media_post_cols = get_theme_mod( 'entertainment_media_product_per_page', 9 );
	return $entertainment_media_post_cols;
}

// Add filter to modify the number of related products
add_filter( 'woocommerce_output_related_products_args', 'entertainment_media_products_args' );
function entertainment_media_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

function entertainment_media_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

add_action('after_switch_theme', 'entertainment_media_setup_options');
function entertainment_media_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

//add animation class
if ( class_exists( 'WooCommerce' ) ) { 
	add_filter('post_class', function($entertainment_media, $class, $product_id) {
	    if( is_shop() || is_product_category() ){
	        
	        $entertainment_media = array_merge(['wow','zoomIn'], $entertainment_media);
	    }
	    return $entertainment_media;
	},10,3);
}

add_action( 'customize_register', 'entertainment_media_remove_setting', 20 );
function entertainment_media_remove_setting( $wp_customize ) {
    // Check if the setting or control exists before removing
    if ( $wp_customize->get_setting( 'header_textcolor' ) ) {
        $wp_customize->remove_setting( 'header_textcolor' );
    }

    if ( $wp_customize->get_control( 'header_textcolor' ) ) {
        $wp_customize->remove_control( 'header_textcolor' );
    }
}

// edit link option
if (!function_exists('entertainment_media_edit_link')) :

    function entertainment_media_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'entertainment-media'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fas fa-edit"></i>',
                '</span>'
            );

    }
endif;

function get_page_id_by_title($pagename){

    $args = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'title' => $pagename
    );
    $query = new WP_Query( $args );

    $page_id = '1';
    if (isset($query->post->ID)) {
        $page_id = $query->post->ID;
    }

    return $page_id;
}
