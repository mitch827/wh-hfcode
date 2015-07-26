<?php
	
	add_action( 'admin_menu', 'wh__add_admin_menu' );
add_action( 'admin_init', 'wh__settings_init' );


function wh__add_admin_menu(  ) { 

	add_options_page( 'Web Heroes header and footer code', 'Header and footer code', 'manage_options', 'wh_header_footer_code', 'wh__options_page' );

}



function wh__settings_init(  ) { 
	
	register_setting( 'wh-settings-group', 'textarea-0' );
	register_setting( 'wh-settings-group', 'textarea-1' );
	register_setting( 'wh-settings-group', 'textarea-2' );

/*
	register_setting( 'pluginPage', 'wh__settings' );

	add_settings_section(
		'wh__pluginPage_section', 
		__( 'Your section description', 'wh-header-footer-code' ), 
		'wh__settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'wh__textarea_field_0', 
		__( 'Settings field description', 'wh-header-footer-code' ), 
		'wh__textarea_field_0_render', 
		'pluginPage', 
		'wh__pluginPage_section' 
	);

	add_settings_field( 
		'wh__textarea_field_1', 
		__( 'Settings field description', 'wh-header-footer-code' ), 
		'wh__textarea_field_1_render', 
		'pluginPage', 
		'wh__pluginPage_section' 
	);

	add_settings_field( 
		'wh__textarea_field_2', 
		__( 'Settings field description', 'wh-header-footer-code' ), 
		'wh__textarea_field_2_render', 
		'pluginPage', 
		'wh__pluginPage_section' 
	);
*/


}

function wh__options_page(){
	?>
	<form action='options.php' method='post'>
		
		<h2>Web Heroes header and footer code</h2>
		<p><?php _e( "Insert custom script code in header and footer", "wh-header-footer-code" ); ?></p>
		
		<?php
		settings_fields( 'wh-settings-group' );
		do_settings_sections( 'wh-settings-group' );
	?>
		<table class="form-table">
        <tr valign="top">
        <th scope="row"><h3>Footer code 1</h3><p>First code to insert</th>
        <td><textarea cols='40' rows='5' name='textarea-0'><?php echo esc_attr( get_option('textarea-0') ); ?></textarea></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><h3>Footer code 2</h3><p>Second code to insert</th>
        <td><textarea cols='40' rows='5' name='textarea-1'><?php echo esc_attr( get_option('textarea-1') ); ?></textarea></td>
        </tr>
        
        <tr valign="top">
        <th scope="row"><h3>Footer code 3</h3><p>Third code to insert</th>
        <td><textarea cols='40' rows='5' name='textarea-2'><?php echo esc_attr( get_option('textarea-2') ); ?></textarea></td>
        </tr>
		</table>
	<?php
		submit_button();
		?>
		
	</form>
	<?php

}

/*
function wh__textarea_field_0_render(  ) { 

	$options = get_option( 'wh__settings' );
	?>
	<textarea cols='40' rows='5' name='wh__settings[wh__textarea_field_0]'> 
		<?php echo $options['wh__textarea_field_0']; ?>
		<?php var_dump($options); ?>
 	</textarea>
	<?php

}


function wh__textarea_field_1_render(  ) { 

	$options = get_option( 'wh__settings' );
	?>
	<textarea cols='40' rows='5' name='wh__settings[wh__textarea_field_1]'> 
		<?php echo $options['wh__textarea_field_1']; ?>
 	</textarea>
	<?php

}


function wh__textarea_field_2_render(  ) { 

	$options = get_option( 'wh__settings' );
	?>
	<textarea cols='40' rows='5' name='wh__settings[wh__textarea_field_2]'> 
		<?php echo $options['wh__textarea_field_2']; ?>
 	</textarea>
	<?php

}


function wh__settings_section_callback(  ) { 

	echo __( 'This section description', 'wh-header-footer-code' );

}


function wh__options_page(  ) { 

	?>
	<form action='options.php' method='post'>
		
		<h2>Web Heroes header and footer code</h2>
		
		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>
		
	</form>
	<?php

}
*/
