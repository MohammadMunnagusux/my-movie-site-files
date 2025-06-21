<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_entertainment_media_dismissed_notice_handler', 'entertainment_media_ajax_notice_handler' );

function entertainment_media_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function entertainment_media_deprecated_hook_admin_notice() {
        // Check if it's been dismissed...
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
        require_once get_template_directory() .'/core/includes/demo-import.php';
        $current_screen = get_current_screen();
			if ($current_screen->id !== 'appearance_page_entertainment-media-guide-page') {
         $entertainment_media_comments_theme = wp_get_theme(); ?>
			<div class="demo-importer-loader">
				<div class="loader-setup-wizard">
					<h2><?php echo esc_html('Importing...','entertainment-media'); ?></h2>
				</div> 
			</div>
            <div class="entertainment-media-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
			<div class="entertainment-media-notice">
				<div class="entertainment-media-notice-content">
					<div class="entertainment-media-notice-heading">
						<h2><?php esc_html_e('Thanks for installing ','entertainment-media'); ?><?php echo esc_html( $entertainment_media_comments_theme ); ?> <?php esc_html_e('Theme','entertainment-media'); ?></h2>
					<p><?php 
                    /* translators: %s: theme name */
                    printf(esc_html__("%s is now installed and ready to use. We've provide some links to get you started.", 'entertainment-media'), $entertainment_media_comments_theme ); ?></p>
					</div>
					<div class="diplay-flex-btn">
						<a class="button button-primary" href="<?php echo esc_url(admin_url('themes.php?page=entertainment-media-guide-page')); ?>"><?php echo esc_html__('GET STARTED','entertainment-media'); ?></a>
						<a class="button button-primary" href="<?php echo esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ); ?>"><?php echo esc_html__('GO TO PREMIUM','entertainment-media'); ?></a>
						<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
				    		<a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html__('GO TO HOMEPAGE','entertainment-media'); ?></a> <span class="imp-success"><?php echo esc_html__('Imported Successfully','entertainment-media'); ?></span>
				    	<?php } else { ?>
						<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.phps" method="POST">
				        	<input  type="submit" name="submit" value="<?php esc_attr_e('ONE CLICK DEMO IMPORTER','entertainment-media'); ?>" class="button button-primary import">
				    	</form>
				    	<?php } ?>
					</div>
				</div>
				<div class="entertainment-media-notice-img">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/notification.png'); ?>" alt="<?php esc_attr_e('logo', 'entertainment-media'); ?>">
				</div>
			</div>
		</div>
        <?php }
	}
}

add_action( 'admin_notices', 'entertainment_media_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'entertainment_media_getting_started' );
function entertainment_media_getting_started() {
	add_theme_page( esc_html__('Get Started', 'entertainment-media'), esc_html__('Get Started', 'entertainment-media'), 'edit_theme_options', 'entertainment-media-guide-page', 'entertainment_media_test_guide');
}

function entertainment_media_admin_enqueue_scripts() {
	wp_enqueue_style( 'entertainment-media-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
	wp_enqueue_script( 'entertainment-media-admin-script', get_template_directory_uri() . '/js/entertainment-media-admin-script.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'entertainment-media-demo-script', get_template_directory_uri() . '/js/demo-script.js', array( 'jquery' ), '', true );
	wp_localize_script( 'entertainment-media-demo-script', 'entertainment_media_demo_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'entertainment_media_admin_enqueue_scripts' );

if ( ! defined( 'ENTERTAINMENT_MEDIA_DOCS_FREE' ) ) {
define('ENTERTAINMENT_MEDIA_DOCS_FREE',__('https://demo.misbahwp.com/docs/entertainment-media-free-docs/','entertainment-media'));
}
if ( ! defined( 'ENTERTAINMENT_MEDIA_DOCS_PRO' ) ) {
define('ENTERTAINMENT_MEDIA_DOCS_PRO',__('https://demo.misbahwp.com/docs/entertainment-media-pro-docs','entertainment-media'));
}
if ( ! defined( 'ENTERTAINMENT_MEDIA_BUY_NOW' ) ) {
define('ENTERTAINMENT_MEDIA_BUY_NOW',__('https://www.misbahwp.com/products/entertainment-wordpress-theme','entertainment-media'));
}
if ( ! defined( 'ENTERTAINMENT_MEDIA_SUPPORT_FREE' ) ) {
define('ENTERTAINMENT_MEDIA_SUPPORT_FREE',__('https://wordpress.org/support/theme/entertainment-media','entertainment-media'));
}
if ( ! defined( 'ENTERTAINMENT_MEDIA_REVIEW_FREE' ) ) {
define('ENTERTAINMENT_MEDIA_REVIEW_FREE',__('https://wordpress.org/support/theme/entertainment-media/reviews/#new-post','entertainment-media'));
}
if ( ! defined( 'ENTERTAINMENT_MEDIA_DEMO_PRO' ) ) {
define('ENTERTAINMENT_MEDIA_DEMO_PRO',__('https://demo.misbahwp.com/entertainment-media/','entertainment-media'));
}
if( ! defined( 'ENTERTAINMENT_MEDIA_THEME_BUNDLE' ) ) {
define('ENTERTAINMENT_MEDIA_THEME_BUNDLE',__('https://www.misbahwp.com/products/wordpress-bundle','entertainment-media'));
}

function entertainment_media_test_guide() { ?>
	<?php $entertainment_media_theme = wp_get_theme(); ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( ENTERTAINMENT_MEDIA_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'entertainment-media' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'entertainment-media' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( ENTERTAINMENT_MEDIA_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'entertainment-media' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( ENTERTAINMENT_MEDIA_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'entertainment-media' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','entertainment-media'); ?><?php echo esc_html( $entertainment_media_theme ); ?>  <span><?php esc_html_e('Version: ', 'entertainment-media'); ?><?php echo esc_html($entertainment_media_theme['Version']);?></span></h3>
				<div class="demo-import-box">
					<div class="demo-importer-loader">
						<div class="loader-setup-wizard">
							<h2><?php echo esc_html('Importing...','entertainment-media'); ?></h2>
						</div> 
					</div>
					<h4><?php echo esc_html__('Import homepage demo in just one click.','entertainment-media'); ?></h4>
					<p><?php echo esc_html__('Get started with the wordpress theme installation','entertainment-media'); ?></p>
					<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
			    		<span class="imp-success"><?php echo esc_html__('Imported Successfully','entertainment-media'); ?></span>  <a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html__('Go to Homepage','entertainment-media'); ?></a>
			    	<?php } else { ?>
					<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.phps" method="POST">
			        	<input  type="submit" name="submit" value="<?php esc_attr_e('Demo Import','entertainment-media'); ?>" class="button button-primary">
			    	</form>
			    	<?php } ?>
				</div>
				<img class="img_responsive" style="width: 100%;" src="<?php echo esc_url( $entertainment_media_theme->get_screenshot() ); ?>" />
				<div id="description-insidee">
					<?php
						$entertainment_media_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $entertainment_media_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postboxx donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'entertainment-media' ); ?></h3>
				<div class="insidee">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','entertainment-media'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'entertainment-media' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( ENTERTAINMENT_MEDIA_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'entertainment-media' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( ENTERTAINMENT_MEDIA_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'entertainment-media' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'entertainment-media' ); ?></h3>
				<div class="insidee theme-bundle">
					<p class="offer"><?php esc_html_e('Get 80+ Perfect WordPress Theme In A Single Package at just $89."','entertainment-media'); ?></p>
					<p class="coupon"><?php esc_html_e('Get Our Theme Pack of 80+ WordPress Themes At 15% Off','entertainment-media'); ?><span class="coupon-code"><?php esc_html_e('"Bundleup15"','entertainment-media'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( ENTERTAINMENT_MEDIA_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'entertainment-media' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','entertainment-media'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','entertainment-media'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','entertainment-media'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('LearnPress Campatiblity','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','entertainment-media'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>

 <?php } ?>
