<?php

class Entertainment_Media_Customizer_Notify {

	private $config = array(); // Declare $config property
	
	private $entertainment_media_recommended_actions;
	
	private $recommended_plugins;
	
	private static $instance;
	
	private $entertainment_media_recommended_actions_title;
	
	private $entertainment_media_recommended_plugins_title;
	
	private $dismiss_button;
	
	private $entertainment_media_install_button_label;
	
	private $entertainment_media_activate_button_label;
	
	private $entertainment_media_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Entertainment_Media_Customizer_Notify ) ) {
			self::$instance = new Entertainment_Media_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $entertainment_media_customizer_notify_recommended_plugins;
		global $entertainment_media_customizer_notify_entertainment_media_recommended_actions;

		global $entertainment_media_install_button_label;
		global $entertainment_media_activate_button_label;
		global $entertainment_media_deactivate_button_label;

		$this->entertainment_media_recommended_actions = isset( $this->config['entertainment_media_recommended_actions'] ) ? $this->config['entertainment_media_recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->entertainment_media_recommended_actions_title = isset( $this->config['entertainment_media_recommended_actions_title'] ) ? $this->config['entertainment_media_recommended_actions_title'] : '';
		$this->entertainment_media_recommended_plugins_title = isset( $this->config['entertainment_media_recommended_plugins_title'] ) ? $this->config['entertainment_media_recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$entertainment_media_customizer_notify_recommended_plugins = array();
		$entertainment_media_customizer_notify_entertainment_media_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$entertainment_media_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->entertainment_media_recommended_actions ) ) {
			$entertainment_media_customizer_notify_entertainment_media_recommended_actions = $this->entertainment_media_recommended_actions;
		}

		$entertainment_media_install_button_label    = isset( $this->config['entertainment_media_install_button_label'] ) ? $this->config['entertainment_media_install_button_label'] : '';
		$entertainment_media_activate_button_label   = isset( $this->config['entertainment_media_activate_button_label'] ) ? $this->config['entertainment_media_activate_button_label'] : '';
		$entertainment_media_deactivate_button_label = isset( $this->config['entertainment_media_deactivate_button_label'] ) ? $this->config['entertainment_media_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'entertainment_media_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'entertainment_media_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'entertainment_media_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'entertainment_media_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function entertainment_media_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'entertainment-media-customizer-notify-css', get_template_directory_uri() . '/core/includes/customizer-notice/css/entertainment-media-customizer-notify.css', array());

		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'updates' );

		wp_enqueue_script( 'entertainment-media-customizer-notify-js', get_template_directory_uri() . '/core/includes/customizer-notice/js/entertainment-media-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'entertainment-media-customizer-notify-js', 'entertainmentmediaCustomizercompanionObject', array(
				'ajaxurl'            => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'base_path'          => admin_url(),
				'activating_string'  => __( 'Activating', 'entertainment-media' ),
			)
		);

	}

	
	public function entertainment_media_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/core/includes/customizer-notice/entertainment-media-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Entertainment_Media_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Entertainment_Media_Customizer_Notify_Section(
				$wp_customize,
				'entertainment-media-customizer-notify-section',
				array(
					'title'          => $this->entertainment_media_recommended_actions_title,
					'plugin_text'    => $this->entertainment_media_recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function entertainment_media_customizer_notify_dismiss_recommended_action_callback() {

		global $entertainment_media_customizer_notify_entertainment_media_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */ 

		if ( ! empty( $action_id ) ) {
			
			if ( get_option( 'entertainment_media_customizer_notify_show' ) ) {

				$entertainment_media_customizer_notify_show_entertainment_media_recommended_actions = get_option( 'entertainment_media_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$entertainment_media_customizer_notify_show_entertainment_media_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$entertainment_media_customizer_notify_show_entertainment_media_recommended_actions[ $action_id ] = false;
						break;
				}
				update_option( 'entertainment_media_customizer_notify_show', $entertainment_media_customizer_notify_show_entertainment_media_recommended_actions );

				
			} else {
				$entertainment_media_customizer_notify_show_entertainment_media_recommended_actions = array();
				if ( ! empty( $entertainment_media_customizer_notify_entertainment_media_recommended_actions ) ) {
					foreach ( $entertainment_media_customizer_notify_entertainment_media_recommended_actions as $entertainment_media_lite_customizer_notify_recommended_action ) {
						if ( $entertainment_media_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$entertainment_media_customizer_notify_show_entertainment_media_recommended_actions[ $entertainment_media_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$entertainment_media_customizer_notify_show_entertainment_media_recommended_actions[ $entertainment_media_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					update_option( 'entertainment_media_customizer_notify_show', $entertainment_media_customizer_notify_show_entertainment_media_recommended_actions );
				}
			}
		}
		die(); 
	}

	
	public function entertainment_media_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */

		if ( ! empty( $action_id ) ) {

			$entertainment_media_lite_customizer_notify_show_recommended_plugins = get_option( 'entertainment_media_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$entertainment_media_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$entertainment_media_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			update_option( 'entertainment_media_customizer_notify_show_recommended_plugins', $entertainment_media_lite_customizer_notify_show_recommended_plugins );
		}
		die(); 
	}

}
