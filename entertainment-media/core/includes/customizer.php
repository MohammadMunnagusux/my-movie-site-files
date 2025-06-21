<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'entertainment_media_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'entertainment-media' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'entertainment-media' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'entertainment-media' ),
			'off' => esc_html__( 'Disable', 'entertainment-media' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'entertainment-media' ),
		'section'     => 'title_tagline',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'entertainment-media' ),
			'off' => esc_html__( 'Disable', 'entertainment-media' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'entertainment_media_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'entertainment-media' ),
	) );

	Kirki::add_section( 'entertainment_media_font_style_section', array(
		'title'      => esc_html__( 'Typography Option',  'entertainment-media' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_font_style_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. More Font Family Options </p><p>3. Color Pallete Setup </p><p>4. Section Reordering Facility</p><p>5. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_all_headings_typography',
		'section'     => 'entertainment_media_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'entertainment_media_all_headings_typography',
		'label'       => esc_html__( 'Heading Typography',  'entertainment-media' ),
		'description' => esc_html__( 'Select the typography options for your heading.',  'entertainment-media' ),
		'section'     => 'entertainment_media_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_body_content_typography',
		'section'     => 'entertainment_media_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'entertainment_media_body_content_typography',
		'label'       => esc_html__( 'Content Typography',  'entertainment-media' ),
		'description' => esc_html__( 'Select the typography options for your content.',  'entertainment-media' ),
		'section'     => 'entertainment_media_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

		// PANEL
	Kirki::add_panel( 'entertainment_media_panel_id_5', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Animations', 'entertainment-media' ),
	) );

	// ANIMATION SECTION
	Kirki::add_section( 'entertainment_media_section_animation', array(
	    'title'          => esc_html__( 'Animations', 'entertainment-media' ),
	    'priority'       => 2,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_section_animation',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_animation_enabled',
		'label'       => esc_html__( 'Turn To Show Animation', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_animation',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'entertainment-media' ),
			'off' => esc_html__( 'Disable', 'entertainment-media' ),
		],
	] );

	// PANEL
	Kirki::add_panel( 'entertainment_media_panel_id_2', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Dark Mode', 'entertainment-media' ),
	) );

	// DARK MODE SECTION
	Kirki::add_section( 'entertainment_media_section_dark_mode', array(
	    'title'          => esc_html__( 'Dark Mode', 'entertainment-media' ),
	    'priority'       => 3,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_section_dark_mode',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	]);

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'entertainment_media_dark_colors',
	    'section'     => 'entertainment_media_section_dark_mode',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Dark Appearance', 'entertainment-media' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_is_dark_mode_enabled',
		'label'       => esc_html__( 'Turn To Dark Mode', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_dark_mode',
		'default'     => false,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'entertainment-media' ),
			'off' => esc_html__( 'Disable', 'entertainment-media' ),
		],
	] );


	// PANEL
	Kirki::add_panel( 'entertainment_media_panel_id_3', array(
	    'priority'    => 10,
	    'title'       => esc_html__( '404 Settings / No Result', 'entertainment-media' ),
	) );

	// 404 SECTION
	Kirki::add_section( 'entertainment_media_section_404', array(
		'panel'          => 'entertainment_media_panel_id_3',
	    'title'          => esc_html__( '404 Settings', 'entertainment-media' ),
	    'priority'       => 3,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_section_404',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
		'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'entertainment_media_404_heading',
	    'section'     => 'entertainment_media_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Heading', 'entertainment-media' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'entertainment_media_404_page_title',
		'section'  => 'entertainment_media_section_404',
		'default'  => esc_html__('404 Not Found', 'entertainment-media'),
		'priority' => 10,
	] );

		Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'entertainment_media_404_text',
	    'section'     => 'entertainment_media_section_404',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( '404 Content', 'entertainment-media' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'entertainment_media_404_page_content',
		'section'  => 'entertainment_media_section_404',
		'default'  => esc_html__('Sorry, no posts matched your criteria.', 'entertainment-media'),
		'priority' => 10,
	] );

	// NO Result
	Kirki::add_section( 'entertainment_media_no_result', array(
		'panel'          => 'entertainment_media_panel_id_3',
	    'title'          => esc_html__( 'No Result Page Settings', 'entertainment-media' ),
	    'priority'       => 3,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_no_result',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
		'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'entertainment_media_not_found_heading',
	    'section'     => 'entertainment_media_no_result',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Search Result Heading', 'entertainment-media' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'entertainment_media_no_results_page_title',
		'section'  => 'entertainment_media_no_result',
		'default'  => esc_html__('404 Not Found', 'entertainment-media'),
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
	    'type'        => 'custom',
	    'settings'    => 'entertainment_media_not_found_text',
	    'section'     => 'entertainment_media_no_result',
	    'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'No Search Result Content', 'entertainment-media' ) . '</h3>',
	    'priority'    => 10,
	]);

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'entertainment_media_no_results_page_content',
		'section'  => 'entertainment_media_no_result',
		'default'  => esc_html__('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'entertainment-media'),
		'priority' => 10,
	] );
	// PANEL

	Kirki::add_panel( 'entertainment_media_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'entertainment-media' ),
	) );


	// COLOR SECTION

	Kirki::add_section( 'entertainment_media_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'entertainment-media' ),
	    'panel'          => 'entertainment_media_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
		'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_section_color',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_global_colors',
		'section'     => 'entertainment_media_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'entertainment_media_global_color',
		'label'       => __( 'choose your Appropriate Color', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_color',
		'default'     => '#ff4162',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'entertainment_media_global_color_2',
		'label'       => __( 'Choose Your Second Color', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_color',
		'default'     => '#ffa748',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'entertainment_media_global_color_3',
		'label'       => __( 'Choose Your Third Color', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_color',
		'default'     => '#000000',
	] );

	// Additional Settings

	Kirki::add_section( 'entertainment_media_section_addtional_settings', array(
	    'title'          => esc_html__( 'Additional Settings', 'entertainment-media' ),
	    'panel'          => 'entertainment_media_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_section_addtional_settings',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'entertainment_media_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_addtional_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'entertainment_media_scroll_top_position',
		'label'       => esc_html__( 'Alignment for Scroll To Top', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_addtional_settings',
		'default'     => 'Right',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'entertainment-media' ),
			'Center' => esc_html__( 'Center', 'entertainment-media' ),
			'Right'  => esc_html__( 'Right', 'entertainment-media' ),
		],
	]
	);

		Kirki::add_field( 'theme_config_id', [
		'type'     => 'dashicons',
		'settings' => 'entertainment_media_scroll_top_icon',
		'label'    => esc_html__( 'Select Appropriate Scroll Top Icon', 'entertainment-media' ),
		'section'  => 'entertainment_media_section_addtional_settings',
		'default'  => 'dashicons dashicons-arrow-up-alt',
		'priority' => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'menu_text_transform_entertainment_media',
		'label'       => esc_html__( 'Menus Text Transform', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_addtional_settings',
		'default'     => 'CAPITALISE',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'CAPITALISE' => esc_html__( 'CAPITALISE', 'entertainment-media' ),
			'UPPERCASE' => esc_html__( 'UPPERCASE', 'entertainment-media' ),
			'LOWERCASE' => esc_html__( 'LOWERCASE', 'entertainment-media' ),

		],
	]
	);


	new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_menu_zoom',
		'label'       => esc_html__( 'Menu Transition', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_addtional_settings',
		'default' => 'None',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'None' => __('None','entertainment-media'),
            'Zoominn' => __('Zoom Inn','entertainment-media'),
            
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'entertainment_media_container_width',
		'label'       => esc_html__( 'Theme Container Width', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_addtional_settings',
		'default'     => 100,
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'entertainment_media_sticky_header',
		'label'       => esc_html__( 'Here you can enable or disable your Sticky Header.', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_addtional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'entertainment_media_site_loader',
		'label'       => esc_html__( 'Here you can enable or disable your Site Loader.', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_addtional_settings',
		'default'     => false,
		'priority'    => 10,
	] );

		new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_preloader_type',
		'label'       => esc_html__( 'Preloader Type', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_addtional_settings',
		'default' => 'four-way-loader',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'four-way-loader' => __('Type 1','entertainment-media'),
            'cube-loader' => __('Type 2','entertainment-media'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_page_layout',
		'label'       => esc_html__( 'Page Layout Setting', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_addtional_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','entertainment-media'),
            'Right Sidebar' => __('Right Sidebar','entertainment-media'),
            'One Column' => __('One Column','entertainment-media')
		],
	] );

	if ( class_exists("woocommerce")){

	// Woocommerce Settings

	Kirki::add_section( 'entertainment_media_woocommerce_settings', array(
		'title'          => esc_html__( 'Woocommerce Settings', 'entertainment-media' ),
		'panel'          => 'entertainment_media_panel_id',
		'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_woocommerce_settings',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'entertainment_media_shop_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable shop page sidebar.', 'entertainment-media' ),
		'section'     => 'entertainment_media_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'entertainment_media_product_sidebar',
		'label'       => esc_html__( 'Here you can enable or disable product page sidebar.', 'entertainment-media' ),
		'section'     => 'entertainment_media_woocommerce_settings',
		'default'     => '1',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'entertainment_media_related_product_setting',
		'label'       => esc_html__( 'Here you can enable or disable your related products.', 'entertainment-media' ),
		'section'     => 'entertainment_media_woocommerce_settings',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Number(
	[
		'settings' => 'entertainment_media_per_columns',
		'label'    => esc_html__( 'Product Per Row', 'entertainment-media' ),
		'section'  => 'entertainment_media_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'entertainment_media_product_per_page',
		'label'    => esc_html__( 'Product Per Page', 'entertainment-media' ),
		'section'  => 'entertainment_media_woocommerce_settings',
		'default'  => 9,
		'choices'  => [
			'min'  => 1,
			'max'  => 15,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number_per_row',
		'label'    => esc_html__( 'Related Product Per Column', 'entertainment-media' ),
		'section'  => 'entertainment_media_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 4,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Number(
	[
		'settings' => 'custom_related_products_number',
		'label'    => esc_html__( 'Related Product Per Page', 'entertainment-media' ),
		'section'  => 'entertainment_media_woocommerce_settings',
		'default'  => 3,
		'choices'  => [
			'min'  => 1,
			'max'  => 10,
			'step' => 1,
		],
	]
	);

	new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_shop_page_layout',
		'label'       => esc_html__( 'Shop Page Layout Setting', 'entertainment-media' ),
		'section'     => 'entertainment_media_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','entertainment-media'),
            'Right Sidebar' => __('Right Sidebar','entertainment-media')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_product_page_layout',
		'label'       => esc_html__( 'Product Page Layout Setting', 'entertainment-media' ),
		'section'     => 'entertainment_media_woocommerce_settings',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','entertainment-media'),
            'Right Sidebar' => __('Right Sidebar','entertainment-media')
		],
	] );

	new \Kirki\Field\Radio_Buttonset(
	[
		'settings'    => 'entertainment_media_woocommerce_pagination_position',
		'label'       => esc_html__( 'Woocommerce Pagination Alignment', 'entertainment-media' ),
		'section'     => 'entertainment_media_woocommerce_settings',
		'default'     => 'Center',
		'priority'    => 10,
		'choices'     => [
			'Left'   => esc_html__( 'Left', 'entertainment-media' ),
			'Center' => esc_html__( 'Center', 'entertainment-media' ),
			'Right'  => esc_html__( 'Right', 'entertainment-media' ),
		],
	]
	);
}

	// POST SECTION

	Kirki::add_section( 'entertainment_media_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'entertainment-media' ),
	    'panel'          => 'entertainment_media_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_section_post',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	] );

	new \Kirki\Field\Sortable(
	[
		'settings' => 'entertainment_media_archive_element_sortable',
		'label'    => __( 'Archive Post Page Element Reordering', 'entertainment-media' ),
		'description'    => esc_html__( 'This setting is not favorable with post format.', 'entertainment-media' ),
		'section'  => 'entertainment_media_section_post',
		'default'  => [ 'option1', 'option2', 'option3', 'option4', 'option5' ],
		'choices'  => [
			'option1' => esc_html__( 'Post Image', 'entertainment-media' ),
			'option2' => esc_html__( 'Post Meta', 'entertainment-media' ),
			'option3' => esc_html__( 'Post Title', 'entertainment-media' ),
			'option4' => esc_html__( 'Post Content', 'entertainment-media' ),
			'option5' => esc_html__( 'Post Categories', 'entertainment-media' ),
		],
	]
	);

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'entertainment_media_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'entertainment_media_pagination_setting',
		'label'       => esc_html__( 'Here you can enable or disable your Pagination.', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_post',
		'default'     => true,
		'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_archive_sidebar_layout',
		'label'       => esc_html__( 'Archive Post Sidebar Layout Setting', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','entertainment-media'),
            'Right Sidebar' => __('Right Sidebar','entertainment-media'),
            'Three Column' => __('Three Column','entertainment-media'),
            'Four Column' => __('Four Column','entertainment-media'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','entertainment-media'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','entertainment-media'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','entertainment-media')
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_single_post_sidebar_layout',
		'label'       => esc_html__( 'Single Post Sidebar Layout Setting', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','entertainment-media'),
            'Right Sidebar' => __('Right Sidebar','entertainment-media'),
		],
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_search_sidebar_layout',
		'label'       => esc_html__( 'Search Page Sidebar Layout Setting', 'entertainment-media' ),
		'section'     => 'entertainment_media_section_post',
		'default' => 'Right Sidebar',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'Left Sidebar' => __('Left Sidebar','entertainment-media'),
            'Right Sidebar' => __('Right Sidebar','entertainment-media'),
            'Three Column' => __('Three Column','entertainment-media'),
            'Four Column' => __('Four Column','entertainment-media'),
            'Grid Layout Without Sidebar' => __('Grid Layout Without Sidebar','entertainment-media'),
            'Grid Layout With Right Sidebar' => __('Grid Layout With Right Sidebar','entertainment-media'),
            'Grid Layout With Left Sidebar' => __('Grid Layout With Left Sidebar','entertainment-media')
		],
	] );


		// Breadcrumb
	Kirki::add_section( 'entertainment_media_bradcrumb', array(
	    'title'          => esc_html__( 'Breadcrumb Settings', 'entertainment-media' ),
	    'panel'          => 'entertainment_media_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_bradcrumb',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_enable_breadcrumb_heading',
		'section'     => 'entertainment_media_bradcrumb',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Single Page Breadcrumb', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_breadcrumb_enable',
		'label'       => esc_html__( 'Breadcrumb Enable / Disable', 'entertainment-media' ),
		'section'     => 'entertainment_media_bradcrumb',
		'default'     => true,
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'entertainment-media' ),
			'off' => esc_html__( 'Disable', 'entertainment-media' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
        'type'     => 'text',
        'default'     => '/',
        'settings' => 'entertainment_media_breadcrumb_separator' ,
        'label'    => esc_html__( 'Breadcrumb Separator',  'entertainment-media' ),
        'section'  => 'entertainment_media_bradcrumb',
    ] );

	// HEADER SECTION

	Kirki::add_section( 'entertainment_media_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'entertainment-media' ),
	    'panel'          => 'entertainment_media_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_section_header',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_phone_number_heading',
		'section'     => 'entertainment_media_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Sign In Button', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => esc_html__( 'Button Text', 'entertainment-media' ),
		'settings' => 'entertainment_media_sign_in_btn_text',
		'section'  => 'entertainment_media_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'url',
		'label'    => esc_html__( 'Button Link', 'entertainment-media' ),
		'settings' => 'entertainment_media_sign_in_btn_link',
		'section'  => 'entertainment_media_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_enable_search',
		'section'     => 'entertainment_media_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_search_box_enable',
		'section'     => 'entertainment_media_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'entertainment-media' ),
			'off' => esc_html__( 'Disable', 'entertainment-media' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_enable_google_translator',
		'section'     => 'entertainment_media_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Google Translator', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_header_google_translator',
		'section'     => 'entertainment_media_section_header',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'entertainment-media' ),
			'off' => esc_html__( 'Disable', 'entertainment-media' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_enable_socail_link',
		'section'     => 'entertainment_media_section_header',
		'default'     => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'entertainment_media_section_header',
		'priority'    => 11,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'entertainment-media' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'entertainment-media' ),
		'settings'     => 'entertainment_media_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'entertainment-media' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'entertainment-media' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'entertainment-media' ),
				'description' => esc_html__( 'Add the social icon url here.', 'entertainment-media' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'entertainment_media_slider_section', array(
	    'title'          => esc_html__( 'Slider Settings', 'entertainment-media' ),
	    'panel'          => 'entertainment_media_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_slider_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_enable_heading1',
		'section'     => 'entertainment_media_slider_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider',  'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_slider_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'entertainment-media' ),
		'section'     => 'entertainment_media_slider_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'entertainment-media' ),
			'off' => esc_html__( 'Disable',  'entertainment-media' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_slider_heading',
		'section'     => 'entertainment_media_slider_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider Section ',  'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
        'type'        => 'number',
        'settings'    => 'entertainment_media_slider_counter',
        'label'       => esc_html__( 'Slider Counter Section',  'entertainment-media' ),
        'section'     => 'entertainment_media_slider_section',
        'default'     => '',
        'choices'     => [
            'min'  => 0,
            'max'  => 3,
            'step' => 1,
        ],
    ] );

    $entertainment_media_slider_image = get_theme_mod('entertainment_media_slider_counter','');
        for ( $i = 1; $i <= $entertainment_media_slider_image; $i++ ) :

    Kirki::add_field( 'theme_config_id', [
        'type'        => 'image',
        'settings'    => 'entertainment_media_slider_image'.$i,
        'label'       => esc_html__( 'Slider Image ', 'entertainment-media' ).$i,
        'description' => esc_html__( 'Image Dimension (1400 x 650)', 'entertainment-media' ),
        'section'     => 'entertainment_media_slider_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'theme_config_id', [
        'type'        => 'text',
        'settings'    => 'entertainment_media_slider_sub_heading' .$i,
        'label'       => esc_html__( 'Sub Heading ', 'entertainment-media' ).$i,
        'section'     => 'entertainment_media_slider_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'theme_config_id', [
        'type'        => 'text',
        'settings'    => 'entertainment_media_slider_main_heading' .$i,
        'label'       => esc_html__( 'Main Heading ', 'entertainment-media' ).$i,
        'section'     => 'entertainment_media_slider_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'theme_config_id', [
        'type'        => 'text',
        'settings'    => 'entertainment_media_slider_text' .$i,
        'label'       => esc_html__( 'Content ', 'entertainment-media' ).$i,
        'section'     => 'entertainment_media_slider_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'theme_config_id', [
        'type'        => 'text',
        'settings'    => 'entertainment_media_slider_button_text' .$i,
        'label'       => esc_html__( 'Button Text ', 'entertainment-media' ).$i,
        'section'     => 'entertainment_media_slider_section',
        'default'     => '',
    ] );

    Kirki::add_field( 'theme_config_id', [
        'type'        => 'link',
        'settings'    => 'entertainment_media_slider_button_url' .$i,
        'label'       => esc_html__( 'Button Url ', 'entertainment-media' ).$i,
        'section'     => 'entertainment_media_slider_section',
        'default'     => '',
    ] );

	endfor;

	Kirki::add_field( 'theme_config_id', [
	 'type'        => 'custom',
	 'settings'    => 'entertainment_media_enable_heading1_22',
	 'section'     => 'entertainment_media_slider_section',
		 'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Content Alignment',  'entertainment-media' ) . '</h3>',
	 'priority'    => 10,
 ] );

	new \Kirki\Field\Select([
	'settings'    => 'entertainment_media_slider_content_alignment',
	'label'       => esc_html__( 'Slider Content Alignment', 'entertainment-media' ),
	'section'     => 'entertainment_media_slider_section',
	'default'     => 'LEFT-ALIGN',
	'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
	'choices'     => [
		'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'entertainment-media' ),
		'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'entertainment-media' ),
		'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'entertainment-media' ),

	],
] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_slider_opacity_color',
		'label'       => esc_html__( 'Slider Opacity Option', 'entertainment-media' ),
		'section'     => 'entertainment_media_slider_section',
		'default'     => '0.5',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'0' => esc_html__( '0', 'entertainment-media' ),
			'0.1' => esc_html__( '0.1', 'entertainment-media' ),
			'0.2' => esc_html__( '0.2', 'entertainment-media' ),
			'0.3' => esc_html__( '0.3', 'entertainment-media' ),
			'0.4' => esc_html__( '0.4', 'entertainment-media' ),
			'0.5' => esc_html__( '0.5', 'entertainment-media' ),
			'0.6' => esc_html__( '0.6', 'entertainment-media' ),
			'0.7' => esc_html__( '0.7', 'entertainment-media' ),
			'0.8' => esc_html__( '0.8', 'entertainment-media' ),
			'0.9' => esc_html__( '0.9', 'entertainment-media' ),
			'unset' => esc_html__( 'Unset', 'entertainment-media' ),
			

		],
	] );

	//FEATURED MOVIES SECTION

	Kirki::add_section( 'entertainment_media_featured_movies_section', array(
	    'title'          => esc_html__( 'Our Featured Movies Settings', 'entertainment-media' ),
	    'panel'          => 'entertainment_media_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_featured_movies_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	    'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_enable_heading',
		'section'     => 'entertainment_media_featured_movies_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Our Featured Movies',  'entertainment-media' ) . '</h3>',
		'priority'    => 1,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_featured_movies_section_enable',
		'label'       => esc_html__( 'Section Enable / Disable',  'entertainment-media' ),
		'section'     => 'entertainment_media_featured_movies_section',
		'default'     => false,
		'priority'    => 2,
		'choices'     => [
			'on'  => esc_html__( 'Enable',  'entertainment-media' ),
			'off' => esc_html__( 'Disable',  'entertainment-media' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_featured_movies_text_heading',
		'section'     => 'entertainment_media_featured_movies_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Featured Movies', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'       => esc_html__( 'Heading', 'entertainment-media' ),
		'settings' => 'entertainment_media_featured_movies_heading',
		'section'  => 'entertainment_media_featured_movies_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'entertainment_media_featured_moviess_category',
		'label'       => esc_html__( 'Select the category to show featured movies ', 'entertainment-media' ),
		'section'     => 'entertainment_media_featured_movies_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'entertainment-media' ),
		'priority'    => 10,
		'choices'     => entertainment_media_get_categories_select(),
	] );

	// FOOTER SECTION

	Kirki::add_section( 'entertainment_media_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'entertainment-media' ),
        'panel'          => 'entertainment_media_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
	    'label'       => '<span class="custom-label-class">' . esc_html__( 'INFORMATION ABOUT PREMIUM VERSION :-', 'entertainment-media' ) . '</span>',
	    'default'     => '<a class="premium_info_btn" target="_blank" href="' . esc_url( ENTERTAINMENT_MEDIA_BUY_NOW ) . '">' . __( 'GO TO PREMIUM', 'entertainment-media' ) . '</a>',
	    'type'        => 'custom',
	    'section'     => 'entertainment_media_footer_section',
	    'description' => '<div class="custom-description-class">' . __( '<p>1. One Click Demo Importer </p><p>2. Color Pallete Setup </p><p>3. Section Reordering Facility</p><p>4. For More Options kindly Go For Premium Version.</p>', 'entertainment-media' ) . '</div>',
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_footer_text_heading',
		'section'     => 'entertainment_media_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'entertainment_media_footer_text',
		'section'  => 'entertainment_media_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_footer_enable_heading',
		'section'     => 'entertainment_media_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'entertainment-media' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'entertainment_media_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'entertainment-media' ),
		'section'     => 'entertainment_media_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'entertainment-media' ),
			'off' => esc_html__( 'Disable', 'entertainment-media' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'entertainment_media_footer_text_heading_2',
	'section'     => 'entertainment_media_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Alignment', 'entertainment-media' ) . '</h3>',
	'priority'    => 10,
	] );

	new \Kirki\Field\Select(
	[
		'settings'    => 'entertainment_media_copyright_text_alignment',
		'label'       => esc_html__( 'Copyright text Alignment', 'entertainment-media' ),
		'section'     => 'entertainment_media_footer_section',
		'default'     => 'LEFT-ALIGN',
		'placeholder' => esc_html__( 'Choose an option', 'entertainment-media' ),
		'choices'     => [
			'LEFT-ALIGN' => esc_html__( 'LEFT-ALIGN', 'entertainment-media' ),
			'CENTER-ALIGN' => esc_html__( 'CENTER-ALIGN', 'entertainment-media' ),
			'RIGHT-ALIGN' => esc_html__( 'RIGHT-ALIGN', 'entertainment-media' ),

		],
	] );

	Kirki::add_field( 'theme_config_id', [
	'type'        => 'custom',
	'settings'    => 'entertainment_media_footer_text_heading_1',
	'section'     => 'entertainment_media_footer_section',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Background Color', 'entertainment-media' ) . '</h3>',
	'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'entertainment_media_copyright_bg',
		'label'       => __( 'Choose Your Copyright Background Color', 'entertainment-media' ),
		'section'     => 'entertainment_media_footer_section',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'entertainment_media_enable_footer_socail_link',
		'section'     => 'entertainment_media_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'entertainment-media' ) . '</h3>',
		'priority'    => 11,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'entertainment_media_footer_section',
		'priority'    => 11,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Footer Social Icon', 'entertainment-media' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'entertainment-media' ),
		'settings'     => 'entertainment_media_footer_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'entertainment-media' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'entertainment-media' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'entertainment-media' ),
				'description' => esc_html__( 'Add the social icon url here.', 'entertainment-media' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );
}

/*
 *  Customizer Notifications
 */

$entertainment_media_config_customizer = array(
    'recommended_plugins' => array( 
        'kirki' => array(
            'recommended' => true,
            'description' => sprintf( 
                /* translators: %s: plugin name */
                esc_html__( 'If you want to show all the sections of the FrontPage, please install and activate %s plugin', 'entertainment-media' ), 
                '<strong>' . esc_html__( 'Kirki Customizer', 'entertainment-media' ) . '</strong>'
            ),
        ),
    ),
    'entertainment_media_recommended_actions'       => array(),
    'entertainment_media_recommended_actions_title' => esc_html__( 'Recommended Actions', 'entertainment-media' ),
    'entertainment_media_recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'entertainment-media' ),
    'entertainment_media_install_button_label'      => esc_html__( 'Install and Activate', 'entertainment-media' ),
    'entertainment_media_activate_button_label'     => esc_html__( 'Activate', 'entertainment-media' ),
    'entertainment_media_deactivate_button_label'   => esc_html__( 'Deactivate', 'entertainment-media' ),
);

Entertainment_Media_Customizer_Notify::init( apply_filters( 'entertainment_media_customizer_notify_array', $entertainment_media_config_customizer ) );