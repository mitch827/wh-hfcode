<?php
/**
 * Plugin Name: Web Heroes header and footer code
 * Plugin URI: http://www.webheroes.it
 * Description: This plugin adds code in header and footer with script tag built in.
 * Version: 1.1.0a
 * Author: Web Heroes
 * Author URI: http://www.webheroes.it
 * License: GPL2
 *
 * GitHub Plugin URI: https://github.com/mitch827/wh-header-footer-code
 * GitHub Branch: master
 *
 * @TODO: set variable priority in add_action
 */
 
 defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
 
 if ( is_admin() ) {
 	require_once( plugin_dir_path( __FILE__ ) . "admin.php" );
}
 	

 add_action( 'wp_footer', 'wh_addToFooter', 99999 );
 
 function wh_addToFooter() {
	 echo '<script>' . esc_attr( get_option('textarea-0') ) . '</script>';
}


?>
