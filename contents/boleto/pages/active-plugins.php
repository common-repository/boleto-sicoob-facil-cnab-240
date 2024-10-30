<?php
/**
 * Detect plugin. For use on Front End only.
 */
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
 
// check for plugin using plugin name
if ( is_plugin_active( 'login-logout-shortcode-simple/login-logout-shortcode-simple.php' ) ) {
    //plugin is activated
	//echo "Plugin is activated.";
} 
else
{

	echo '<pre>'.__('Plugin Login Logout Shortcode Simple is not activated!', 'boleto-sicoob-facil-cnab').'</pre>';
	die();
}


?>