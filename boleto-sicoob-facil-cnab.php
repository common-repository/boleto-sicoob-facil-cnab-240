<?php
/*
   Plugin Name: Boleto Sicoob Facil Cnab 240
   Plugin URI: http://wordpress.org/extend/plugins/boleto-sicoob-facil-cnab/
   Version: 0.2
   Author: Clodoaldo Xavier Gomes
   Description: Generates billets easily on your Wordpress site. For SICCOB corporate account holders only. Gera boletos facilemnte em seu site Wordpress. Somente para correntistas empresariais do SICCOB. <a href="plugins.php?page=BoletoSicoobFacilCnab_PluginSettings">Config.</a>. 
   Text Domain: boleto-sicoob-facil-cnab
   License: GPLv3
  */

/*
    "WordPress Plugin Template" Copyright (C) 2019 Michael Simpson  (email : michael.d.simpson@gmail.com)

    This following part of this file is part of WordPress Plugin Template for WordPress.

    WordPress Plugin Template is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    WordPress Plugin Template is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Contact Form to Database Extension.
    If not, see http://www.gnu.org/licenses/gpl-3.0.html
*/

$BoletoSicoobFacilCnab_minimalRequiredPhpVersion = '5.0';

define('BOLETO_SICOOB_FACIL_CNAB', plugin_dir_url( __FILE__ ));
define('BOLETO_SICOOB_FACIL_CNAB_URL', plugins_url('',__FILE__));
define('BOLETO_SICOOB_FACIL_CNAB_DIR', plugin_dir_path(__FILE__));
define('BOLETO_SICOOB_FACIL_CNAB_SITE', site_url());

if ( ! defined( 'BOLETO_SICOOB_FACIL_CNAB_PLUGIN_VERSION' ) ) define( 'BOLETO_SICOOB_FACIL_CNAB_PLUGIN_VERSION', '1.2.3' );
if ( ! defined( 'BOLETO_SICOOB_FACIL_CNAB_PLUGIN_DIR_PATH' ) ) define( 'BOLETO_SICOOB_FACIL_CNAB_PLUGIN_DIR_PATH', plugins_url( '', __FILE__ ) );
if ( ! defined( 'BOLETO_SICOOB_FACIL_CNAB_PLUGIN_BASENAME' ) ) define( 'BOLETO_SICOOB_FACIL_CNAB_PLUGIN_BASENAME', plugin_basename( __FILE__) );


/**
 * Check the PHP version and give a useful error message if the user's version is less than the required version
 * @return boolean true if version check passed. If false, triggers an error which WP will handle, by displaying
 * an error message on the Admin page
 */
function BoletoSicoobFacilCnab_noticePhpVersionWrong() {
    global $BoletoSicoobFacilCnab_minimalRequiredPhpVersion;
    echo '<div class="updated fade">' .
      __('Error: plugin "Boleto Sicoob Facil Cnab 240" requires a newer version of PHP to be running.',  'boleto-sicoob-facil-cnab').
            '<br/>' . __('Minimal version of PHP required: ', 'boleto-sicoob-facil-cnab') . '<strong>' . $BoletoSicoobFacilCnab_minimalRequiredPhpVersion . '</strong>' .
            '<br/>' . __('Your server\'s PHP version: ', 'boleto-sicoob-facil-cnab') . '<strong>' . phpversion() . '</strong>' .
         '</div>';
}


function BoletoSicoobFacilCnab_PhpVersionCheck() {
    global $BoletoSicoobFacilCnab_minimalRequiredPhpVersion;
    if (version_compare(phpversion(), $BoletoSicoobFacilCnab_minimalRequiredPhpVersion) < 0) {
        add_action('admin_notices', 'BoletoSicoobFacilCnab_noticePhpVersionWrong');
        return false;
    }
    return true;
}


/**
 * Initialize internationalization (i18n) for this plugin.
 * References:
 *      http://codex.wordpress.org/I18n_for_WordPress_Developers
 *      http://www.wdmac.com/how-to-create-a-po-language-translation#more-631
 * @return void
 */
function BoletoSicoobFacilCnab_i18n_init() {
    $pluginDir = dirname(plugin_basename(__FILE__));
    load_plugin_textdomain('boleto-sicoob-facil-cnab', false, $pluginDir . '/languages/');
}


//////////////////////////////////
// Run initialization
/////////////////////////////////

// Initialize i18n
add_action('plugins_loaded','BoletoSicoobFacilCnab_i18n_init');

// Run the version check.
// If it is successful, continue with initialization for this plugin
if (BoletoSicoobFacilCnab_PhpVersionCheck()) {
    // Only load and run the init function if we know PHP version can parse it
    include_once('boleto-sicoob-facil-cnab_init.php');
    BoletoSicoobFacilCnab_init(__FILE__);
}
