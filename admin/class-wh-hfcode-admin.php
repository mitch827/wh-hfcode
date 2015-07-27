<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.webheroes.it
 * @since      1.0.0
 *
 * @package    Wh_Hfcode
 * @subpackage Wh_Hfcode/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wh_Hfcode
 * @subpackage Wh_Hfcode/admin
 * @author     Web Heroes <info@webheroes.it>
 */
class Wh_Hfcode_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	
	 /**
	 * The options name to be used in this plugin
	 *
	 * @since   1.0.0
	 * @access  private
	 * @var     string      $option_name    Option name of this plugin
	 */
	private $option_name = 'wh_hfcode';


	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}
	
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	// public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wh_Hfcode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wh_Hfcode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	//	wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wh-hfcode-admin.css', array(), $this->version, 'all' );

	//}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	// public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wh_Hfcode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wh_Hfcode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	//	wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wh-hfcode-admin.js', array( 'jquery' ), $this->version, false );

	//}
	
	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
	 
	    $this->plugin_screen_hook_suffix = add_options_page(
	        __( 'Web Heroes header and footer code', 'wh-hfcode' ),
	        __( 'Header and footer code', 'wh-hfcode' ),
	        'manage_options',
	        $this->plugin_name,
	        array( $this, 'display_options_page' )
	    );
	}
	
	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
	    include_once 'partials/wh-hfcode-admin-display.php';
	}
	
	/**
	 * Register all related settings of this plugin
	 *
	 * @since  1.0.0
	 */
	public function register_setting() {
		// Add a General section
		add_settings_section(
		    $this->option_name . '_general',
		    __( 'General', 'wh-hfcode' ),
		    array( $this, $this->option_name . '_general_cb' ),
		    $this->plugin_name
		);
		
		add_settings_field(
		    $this->option_name . '_textarea-0',
		    __( 'Footer Code', 'wh-hfcode' ),
		    array( $this, $this->option_name . '_footer_code_cb' ),
		    $this->plugin_name,
		    $this->option_name . '_general',
		    array( 'label_for' => $this->option_name . '_textarea-0' )
		);
		
		register_setting( $this->plugin_name, $this->option_name . '_textarea-0', array( $this, $this->option_name . '_sanitize_code' )  );
	//	register_setting( $this->plugin_name, $this->option_name . '_day', array( $this, $this->option_name . '_sanitize_position' ) );
	}
	/**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function wh_hfcode_general_cb() {
	    echo '<p>' . __( 'Insert code to be printed in the theme footer.', 'wh-hfcode' ) . '</p>';
	}
	
	/**
	 * Render the radio input field for position option
	 *
	 * @since  1.0.0
	 */
	public function wh_hfcode_footer_code_cb() {
		$footer_code = get_option( $this->option_name . '_textarea-0' );
		?>
			<textarea cols='60' rows='10' name="<?php echo $this->option_name . '_textarea-0'; ?>" id="<?php echo $this->option_name . '_textarea-0'; ?>"><?php _e( $footer_code, 'wh-hfcode' ); ?></textarea>
			
		<?php
			var_dump($footer_code);
	}
	
	/**
	 * Sanitize the text position value before being saved to database
	 *
	 * @param  string $position $_POST value
	 * @since  1.0.0
	 * @return string           Sanitized value
	 */
	public function wh_hfcode_sanitize_code( $footer_code ) {
		esc_js( $footer_code );
	    return $footer_code;
	}
}
