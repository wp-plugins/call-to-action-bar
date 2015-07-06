<?php
/**
 * @package CallToActionBar
 * @version 1.0.0
 */
/*
Plugin Name: Call-To-Action Bar
Plugin URI:  http://call-to-action-bar.jademind.com/
Description: This plugin adds a simple bar at the top of your page with a nice call-to-action button. Use this call-to-action bar for promoting your products or displaying some important news. You can customize all background and text colors of the bar to your own desires.
Version:     1.0.0
Author:      JadeMind
Author URI:  http://www.jademind.com/
License:     GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
define( 'CALL_TO_ACTION_BAR__VERSION', '1.0.0' );
define( 'CALL_TO_ACTION_BAR__MINIMUM_WP_VERSION', '4.0' );
define( 'CALL_TO_ACTION_BAR__PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CALL_TO_ACTION_BAR__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( CALL_TO_ACTION_BAR__PLUGIN_DIR . 'class.call-to-action-bar.php' );

add_action( 'init', array( 'CallToActionBar', 'init' ) );

register_activation_hook(__FILE__, array( 'CallToActionBar', 'activate' ) );
register_deactivation_hook(__FILE__, array( 'CallToActionBar', 'deactivate' ) );
register_uninstall_hook(__FILE__, array( 'CallToActionBar', 'uninstall' ) );
?>