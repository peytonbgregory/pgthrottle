<?php //register settings
function theme_settings_init(){
    register_setting( 'theme_settings', 'theme_settings' );
}
//add settings page to menu
function add_settings_throttle_page() {
add_theme_page( __( 'Theme Settings' ), __( 'Theme Settings' ), 'manage_options', 'theme-settings', 'theme_settings_page');
}
//add actions
add_action( 'admin_init', 'theme_settings_init' );
add_action( 'admin_menu', 'add_settings_throttle_page' );
//define your variables
$color_scheme = array('default','blue','green',);
//start settings page
function theme_settings_page() {
if ( ! isset( $_REQUEST['updated'] ) )
$_REQUEST['updated'] = false;
//get variables outside scope
global $color_scheme;
?>

<div>

<div id="icon-options-general"></div>
<h2><?php __( 'Theme Settings' ) //your admin panel title ?></h2>

<?php
//show saved options message
if ( false !== $_REQUEST['updated'] ) : ?>
<div><p><strong><?php __( 'Options saved'); ?></strong></p></div>
<?php endif; ?>

<form method="post" action="options.php">

<?php settings_fields( 'theme_settings'); ?>
<?php $options = get_option( 'theme_settings' ); ?>
<hr />

<table>
<h3>General Settings </h3>
<!-- Option 1: Custom Logo -->

<tr valign="top">
<th scope="row"><?php _e( 'Main Logo'); ?></th>
<td><input id="theme_settings[main_logo]" type="text" size="36" name="theme_settings[main_logo]" value="<?php esc_attr_e( $options['main_logo'],'pgthrottle' ); ?>" />
<label for="theme_settings[main_logo]"></label></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Phone Number'); ?></th>
<td><input id="theme_settings[phone_number]" type="text" size="36" name="theme_settings[phone_number]" value="<?php esc_attr_e( $options['phone_number'],'pgthrottle' ); ?>" />
<label for="theme_settings[phone_number]"></label></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Phone Number URL'); ?></th>
<td><input id="theme_settings[phone_number_url]" type="text" size="36" name="theme_settings[phone_number_url]" value="<?php esc_attr_e( $options['phone_number_url'],'pgthrottle' ); ?>" />
<label for="theme_settings[phone_number_url]"></label></td>
</tr>


<tr valign="top">
<th scope="row"><?php _e( 'Facebook URL'); ?></th>
<td><input id="theme_settings[facebook_url]" type="text" size="36" name="theme_settings[facebook_url]" value="<?php esc_attr_e( $options['facebook_url'],'pgthrottle' ); ?>" />
<label for="theme_settings[facebook_url]"></label></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'YouTube URL'); ?></th>
<td><input id="theme_settings[youtube_url]" type="text" size="36" name="theme_settings[youtube_url]" value="<?php esc_attr_e( $options['youtube_url'],'pgthrottle' ); ?>" />
<label for="theme_settings[youtube_url]"></label></td>
</tr>


<tr valign="top">
<th scope="row"><?php _e( 'Twitter URL' ); ?></th>
<td><input id="theme_settings[twitter_url]" type="text" size="36" name="theme_settings[twitter_url]" value="<?php esc_attr_e( $options['twitter_url'],'pgthrottle' ); ?>" />
<label for="theme_settings[twitter_url]"></label></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Linkedin URL'); ?></th>
<td><input id="theme_settings[linkedin_url]" type="text" size="36" name="theme_settings[linkedin_url]" value="<?php esc_attr_e( $options['linkedin_url'],'pgthrottle' ); ?>" />
<label for="theme_settings[linkedin_url]"></label></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Google Plus URL'); ?></th>
<td><input id="theme_settings[google_plus_url]" type="text" size="36" name="theme_settings[google_plus_url]" value="<?php esc_attr_e( $options['google_plus_url'],'pgthrottle' ); ?>" />
<label for="theme_settings[google_plus_url]"></label></td>
</tr>

<tr valign="top">
<th scope="row"><?php _e( 'Pinterest URL'); ?></th>
<td><input id="theme_settings[pinterest_url]" type="text" size="36" name="theme_settings[pinterest_url]" value="<?php esc_attr_e( $options['pinterest_url'],'pgthrottle' ); ?>" />
<label for="theme_settings[pinterest_url]"></label></td>
</tr>



<tr valign="top">
<th scope="row"><?php _e( 'Instagram URL'); ?></th>
<td><input id="theme_settings[instagram_url]" type="text" size="36" name="theme_settings[instagram_url]" value="<?php esc_attr_e( $options['instagram_url'],'pgthrottle' ); ?>" />
<label for="theme_settings[instagram_url]"></label></td>
</tr>
</table>
<hr />
<p><input name="submit" id="submit" value="Save Changes" type="submit"></p>
</form>
<hr />
<h4><a style="text-decoration:none; color:#ccc;" href="http://www.peytongregory.com" target="_blank" title="Peyton Gregory WordPress Developer">PG Throttle &copy; <?php echo date("Y"); ?> | Version <?php
$my_theme = wp_get_theme();
echo $my_theme->get( 'Name' ) . " is version " . $my_theme->get( 'Version' );
?></a></h4>
<hr />
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