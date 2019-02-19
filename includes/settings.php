<?php //register settings

require 'theme-update-checker.php';
$example_update_checker = new ThemeUpdateChecker(
    'pgthrottle',
    'http://peytongregory.com/theme/info.json'
);


function theme_settings_init(){
    register_setting( 'theme_settings', 'theme_settings' );
	
}
add_action( 'admin_init', 'theme_settings_init' );

//add settings page to menu
function add_settings_page() {
add_theme_page( __( 'Theme Settings' ), __( 'Theme Settings' ), 'manage_options', 'theme-settings', 'theme_settings_page');
	
} 

//add actions

add_action( 'admin_menu', 'add_settings_page' );

//start settings page
function theme_settings_page() {

if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;


?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<div class="container ml-0">
<div class="row">
	<div class="col-12">
<div id="icon-options-general"></div>
<h2><?php __( 'Theme Settings' ) //your admin panel title ?></h2>

<?php
//show saved options message
if ( false !== $_REQUEST['updated'] ) : ?>
<div><p><strong><?php __( 'Options saved' ); ?></strong></p></div>
<?php endif; ?>

<form method="post" action="options.php" enctype="multipart/form-data">

<?php 
settings_fields( 'theme_settings' );
$options = get_option( 'theme_settings' ); 
$pg_theme = wp_get_theme();
$theme_version = $pg_theme->get( 'Version' );
$theme_name = $pg_theme->get( 'Name' );?>

<h1 class="font-weight-bold"><?php echo $theme_name; ?> <span class="small text-muted">v<?php echo $theme_version; ?></span></h1>
<div class="card mb-3">
<h3 class="text-muted mb-3">General Settings</h3>
<!-- Option 1: Custom Logo -->

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'Main Logo' ); ?></span>
  </div>
  <input class="form-control" id="theme_settings[main_logo]" type="text" size="36" name="theme_settings[main_logo]" value="<?php esc_attr_e( $options['main_logo'] ); ?>" />
</div>
	
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'Phone Number' ); ?></span>
  </div>
 <input class="form-control" id="theme_settings[phone_number]" type="text" size="36" name="theme_settings[phone_number]" value="<?php esc_attr_e( $options['phone_number'] ); ?>" />
</div>
	
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'Phone Number URL' ); ?></span>
  </div>
  <input class="form-control" id="theme_settings[phone_number_url]" type="text" size="36" name="theme_settings[phone_number_url]" value="<?php esc_attr_e( $options['phone_number_url'] ); ?>" />
</div>
	 
	</div><!-- card -->
	<div class="card mb-3">
<h3 class="text-muted mb-3">Social Media Links</h3>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'Facebook URL' ); ?></span>
  </div>
  <input id="theme_settings[facebook_url]"  class="form-control" type="text" size="36" name="theme_settings[facebook_url]" value="<?php esc_attr_e( $options['facebook_url'] ); ?>" />
</div>
	
	
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'YouTube URL' ); ?></span>
  </div>
  <input id="theme_settings[youtube_url]"  class="form-control" type="text" size="36" name="theme_settings[youtube_url]" value="<?php esc_attr_e( $options['youtube_url'] ); ?>" />
</div>
	
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'Twitter URL' ); ?></span>
  </div>
  <input id="theme_settings[twitter_url]"  class="form-control" type="text" size="36" name="theme_settings[twitter_url]" value="<?php esc_attr_e( $options['twitter_url'] ); ?>" />
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'Linkedin URL' ); ?></span>
  </div>
  <input id="theme_settings[linkedin_url]"  class="form-control" type="text" size="36" name="theme_settings[linkedin_url]" value="<?php esc_attr_e( $options['linkedin_url'] ); ?>" />
</div>
	
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'Google Plus URL' ); ?></span>
  </div>
  <input id="theme_settings[google_plus_url]"  class="form-control" type="text" size="36" name="theme_settings[google_plus_url]" value="<?php esc_attr_e( $options['google_plus_url'] ); ?>" />
</div>
	
	
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'Pinterest URL' ); ?></span>
  </div>
  <input id="theme_settings[pinterest_url]"  class="form-control" type="text" size="36" name="theme_settings[pinterest_url]" value="<?php esc_attr_e( $options['pinterest_url'] ); ?>" />
</div>
	
	
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1"><?php _e( 'Instagram URL' ); ?></span>
  </div>
  <input id="theme_settings[instagram_url]"  class="form-control" type="text" size="36" name="theme_settings[instagram_url]" value="<?php esc_attr_e( $options['instagram_url'] ); ?>" />
</div>
		
	</div>
	
<div class="card mb-3">
<h3 class="text-muted mb-3">Advanced Settings</h3>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text"><?php _e( 'Header Code' ); ?></span>
  </div>
  <textarea  class="form-control" id="theme_settings[header_code]" type="textarea" rows="10" cols="100" name="theme_settings[header_code]"/><?php esc_attr_e( $options['header_code'] ); ?></textarea>
</div>
	
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text"><?php _e( 'Footer Script' ); ?></span>
  </div>
  <textarea  class="form-control" id="theme_settings[footer_code]" type="textarea" rows="10" cols="100" name="theme_settings[footer_code]"/><?php esc_attr_e( $options['footer_code'] ); ?></textarea>
</div>
	
</div>

	

<input class="btn btn-primary" name="submit" id="submit" value="Save Changes" type="submit">
	</div>
</div>
</form>

<hr />
<a class="btn btn-sm text-muted btn-link" href="http://www.peytongregory.com/" target="_blank" title="Peyton Gregory WordPress Developer"><?php

echo $theme_name . " " . $theme_version . " &copy; " . date("Y");?></a> | <a class="btn btn-sm text-muted btn-link" href="http://www.peytongregory.com/theme/index.html" target="_blank" title="PG Throttle Theme Documentation">Documentation</a>

</div><!-- END wrap -->
<?php
}
//sanitize and validate
function options_validate( $input ) {
    global $select_options, $radio_options;
    if ( ! isset( $input['option1'] ) )
        $input['option1'] = null;
    $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );
    $input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );
    if ( ! isset( $input['radioinput'] ) )
        $input['radioinput'] = null;
    if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
        $input['radioinput'] = null;
    $input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );
    return $input;
}

?>