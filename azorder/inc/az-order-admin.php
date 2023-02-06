<?php
/**
 * Admin settings.
*/

namespace AZOrder\Admin;

/**
 * Start the admin settings.
 * 
 * @return void.
 */
function bootstrap() : void {
	add_action( 'admin_menu', __NAMESPACE__ . '\\az_admin_page' );
	add_action( 'admin_init', __NAMESPACE__ . '\\az_register_settings' );	
}

/**
 * Add admin page for AZ Order.
 * 
 * @return void.
 */
function az_admin_page() : void {
	add_menu_page( 
		esc_html__( 'AZ Order Settings', 'azorder' ), 
		esc_html__( 'AZ Order Admin', 'azorder' ), 
		'manage_options', 
		'azorder', 
		__NAMESPACE__ . '\\az_settings',
		'dashicons-admin-generic',
		99
	);		
}
		
/**
 * Register admin settings.
 * 
 * @return void.
 */
function az_register_settings() : void {
	$page_slug = 'azorder_admin';
	$option_group = 'azorder_settings';
		
	add_settings_section(
		'az_settings_section',         
		esc_html__( 'AZ Order Content Settings', 'azorder' ),                  
		'',
		$page_slug                           
	);

	register_setting( $option_group, 'az_post_type', 'sanitize_text_field' );

	add_settings_field(
		'az_post_type',                      
		esc_html__( 'Post Type: ', 'azorder' ),                           
		__NAMESPACE__ . '\\az_post_type',
		$page_slug ,                          
		'az_settings_section'         
	);

	register_setting( $option_group, 'az_taxonomy', 'sanitize_text_field' );

	add_settings_field(
		'az_taxonomy',                      
		esc_html__( 'Taxonomy: ', 'azorder' ),                           
		__NAMESPACE__ . '\\az_taxonomy',
		$page_slug ,                          
		'az_settings_section'         
	);
}	

/**
 * Post type settings field.
 * 
 * @return void.
 */
function az_post_type() : void {
	$value = get_option( 'az_post_type' );
	?>
	<label>
		<input type="text" name="az_post_type" value="<?php echo esc_attr( $value ); ?>"/>
	</label>
	<?php
}

/**
 * Taxonomy settings field.
 * 
 * @return void.
 */
function az_taxonomy() : void {
	$value = get_option( 'az_taxonomy' );
	?>
	<label>
		<input type="text" name="az_taxonomy" value="<?php echo esc_attr( $value ); ?>"/>
	</label>
	<?php
}
	
/**
 * Settings display for AZ Order plugin.
 * 
 * @return void.
 */
function az_settings() : void { ;
	?>
	<div class="wrap">
		<div id="icon-edit" class="icon32 icon32-base-template"><br></div>
		<h1><?php echo esc_html( get_admin_page_title( 'azorder' ) ); ?></h1>
			
			<form id="az-order-form" action="options.php" method="POST">
				
				<?php
				settings_fields( 'azorder_settings' );
				do_settings_sections( 'azorder_admin' );
				submit_button();
				?>		
					
			</form> <!-- end of #aztemplate-form -->
		</div>
<?php }