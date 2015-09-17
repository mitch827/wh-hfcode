<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.webheroes.it
 * @since             1.0.0
 * @package           Wh_Hfcode
 *
 * @wordpress-plugin
 * Plugin Name:       WH header and footer code
 * Plugin URI:        https://github.com/mitch827/wh-hfcode
 * Description:       This plugin adds code in header and footer with script tag built in. Superpowered by <strong>Web Heroes.</strong>
 * Version:           1.0.8a
 * Author:            Web Heroes
 * Author URI:        http://www.webheroes.it
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wh-hfcode
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/mitch827/wh-hfcode
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wh-hfcode-activator.php
 */
function activate_wh_hfcode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wh-hfcode-activator.php';
	$plugin_base = plugin_basename( __FILE__ );
	Wh_Hfcode_Activator::activate( $plugin_base );
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wh-hfcode-deactivator.php
 */
function deactivate_wh_hfcode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wh-hfcode-deactivator.php';
	Wh_Hfcode_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wh_hfcode' );
register_deactivation_hook( __FILE__, 'deactivate_wh_hfcode' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wh-hfcode.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wh_hfcode() {

	$plugin = new Wh_Hfcode();
	$plugin->run();

}
run_wh_hfcode();
