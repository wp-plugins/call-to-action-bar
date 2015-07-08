<?php
class CallToActionBar {

	private static $initiated = false;

	public static function init() 
	{
		if ( ! self::$initiated ) 
		{
			self::$initiated = true;

			// create options entries and register settings
			add_action( 'admin_menu', array('CallToActionBar', 'add_options_page_menu_entry') );
			add_action( 'admin_init', array('CallToActionBar', 'register_settings') );

			// enque custom js/css files
			add_action( 'admin_enqueue_scripts', array('CallToActionBar', 'enque_admin_scripts') );
			add_action( 'wp_enqueue_scripts', array('CallToActionBar', 'enque_frontend_scripts') );

			// add settings link to plugin page
			add_filter("plugin_action_links_call-to-action-bar/call-to-action-bar.php", array('CallToActionBar', 'add_plugin_settings_link') );

			// render the bar in the footer
			add_action( 'wp_footer', array('CallToActionBar','render_call_to_action_bar'));
		}
	}

	public static function activate() 
	{
		// add option default values
		add_option('ctab_active', false);
		add_option('ctab_able_to_dismiss', false);
		add_option('ctab_general_text', 'Our new product did launch today.');
		add_option('ctab_call_to_action_text', 'Visit now');
		add_option('ctab_call_to_action_url', 'http://www.google.com');

		add_option('ctab_bar_background_color', '#212121');
		add_option('ctab_bar_text_color', '#ffffff');
		add_option('ctab_call_to_action_background_color', '#7ad03a');
		add_option('ctab_call_to_action_text_color', '#ffffff');
	}

	public static function uninstall() 
	{
		// remove option on uninstall
		delete_option('ctab_active' );
		delete_option('ctab_able_to_dismiss' );
		delete_option('ctab_general_text' );
		delete_option('ctab_call_to_action_text' );
		delete_option('ctab_call_to_action_url' );

		delete_option('ctab_bar_background_color' );
		delete_option('ctab_bar_text_color' );
		delete_option('ctab_call_to_action_background_color' );
		delete_option('ctab_call_to_action_text_color' );
	}

	public static function deactivate() 
	{
		// set inactive on deactivation
		update_option('ctab_active', false);
	}


	public static function add_plugin_settings_link($links) 
	{ 
		$mylinks = array(
		 '<a href="' . admin_url( 'options-general.php?page=call-to-action-bar-options' ) . '">Settings</a>',
		 );
		return array_merge( $links, $mylinks );
	}

	public static function add_options_page_menu_entry() 
	{
		add_options_page( 'Call-To-Action Bar Settings', 'Call-To-Action Bar', 'manage_options', 'call-to-action-bar-options', array('CallToActionBar', 'render_options_page') );
	}

	public static function register_settings()
	{
		register_setting( 'call-to-action-bar-settings-group', 'ctab_active' );
		register_setting( 'call-to-action-bar-settings-group', 'ctab_able_to_dismiss' );
		register_setting( 'call-to-action-bar-settings-group', 'ctab_general_text' );
		register_setting( 'call-to-action-bar-settings-group', 'ctab_call_to_action_text' );
		register_setting( 'call-to-action-bar-settings-group', 'ctab_call_to_action_url' );

		register_setting( 'call-to-action-bar-settings-group', 'ctab_bar_background_color' );
		register_setting( 'call-to-action-bar-settings-group', 'ctab_bar_text_color' );
		register_setting( 'call-to-action-bar-settings-group', 'ctab_call_to_action_background_color' );
		register_setting( 'call-to-action-bar-settings-group', 'ctab_call_to_action_text_color' );
	}



	public static function enque_admin_scripts()
	{
		// add minicolors http://labs.abeautifulsite.net/jquery-minicolors/
		wp_enqueue_script('minicolors-js', plugins_url('static/js/jquery.minicolors.min.js', __FILE__), array('jquery'));
		wp_enqueue_style('minicolors-css', plugins_url('static/css/jquery.minicolors.css', __FILE__));

		// add bootstrap
		wp_enqueue_style('bootstrap-css', plugins_url('static/css/bootstrap.min.css', __FILE__));

		// add custom js/css
		wp_enqueue_script('admin-call-to-action-bar-js', plugins_url('static/js/admin.call-to-action-bar.js', __FILE__), array('jquery', 'minicolors-js'));
	}

	public static function enque_frontend_scripts()
	{
		// add custom js/css
		wp_enqueue_style('frontend-call-to-action-bar-css', plugins_url('static/css/frontend.call-to-action-bar.css', __FILE__));
		wp_enqueue_script('frontend-jquery-cookies-js', plugins_url('static/js/jquery.cookie.js', __FILE__), array('jquery'));
	}


	public static function render_options_page() 
	{
		if ( !current_user_can( 'manage_options' ) )  
		{
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}

		include(CALL_TO_ACTION_BAR__PLUGIN_DIR . 'options.php');
	}

	public static function render_call_to_action_bar()
	{
		if(get_option('ctab_active') == true) 
		{
			$allowed_html_tags = array(
				'strong' => array(), 
				'b' => array(), 
				'i' => array(), 
				'em' => array(), 
				'u' => array() 
				);
	
			// get options
			$ctab_able_to_dismiss 		= get_option('ctab_able_to_dismiss', false);
			$ctab_general_text 			= wp_kses(get_option('ctab_general_text', 'Our new product did launch today.'), $allowed_html_tags);
			$ctab_call_to_action_text 	= esc_html(get_option('ctab_call_to_action_text', 'Visit now'));
			$ctab_call_to_action_url 	= esc_url(get_option('ctab_call_to_action_url', 'http://www.google.com'));

			$ctab_bar_background_color 	= esc_attr(get_option('ctab_bar_background_color', '#212121'));
			$ctab_bar_text_color 		= esc_attr(get_option('ctab_bar_text_color', '#ffffff'));

			$ctab_call_to_action_background_color	= esc_attr(get_option('ctab_call_to_action_background_color', '#7ad03a'));
			$ctab_call_to_action_text_color			= esc_attr(get_option('ctab_call_to_action_text_color', '#ffffff'));

			// render bar
			include(CALL_TO_ACTION_BAR__PLUGIN_DIR . 'bar-wrapper.php');
		}
	}
}
?>
