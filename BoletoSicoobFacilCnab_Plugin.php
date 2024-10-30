<?php
include_once('BoletoSicoobFacilCnab_LifeCycle.php');

class BoletoSicoobFacilCnab_Plugin extends BoletoSicoobFacilCnab_LifeCycle {

    /**
     * See: http://plugin.michael-simpson.com/?page_id=31
     * @return array of option meta data.
     */
    public function getOptionMetaData() {
        //  http://plugin.michael-simpson.com/?page_id=31
        return array(
            //'_version' => array('Installed Version'), // Leave this one commented-out. Uncomment to test upgrades.
			
			'ATextInputnumCliente' => array(__('Cliente Number', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputcoopCartao' => array(__('Cooperative', 'my-boleto-sicoob-facil-cnab-plugin')),		
            'ATextInputnumContaCorrente' => array(__('Account number', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputChaveAcessoWeb' => array(__('Web Access Key (request from your manager)', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputPercTaxaMulta' => array(__('Fine Rate Percentage. Ex 2.00', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputPercTaxaMora' => array(__('Interest Rate Percentage. Ex 1.0', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputDescInstrucao1' => array(__('Description for the instruction  1', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputDescInstrucao2' => array(__('Description for the instruction  2', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputDescInstrucao3' => array(__('Description for the instruction  3', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputDescInstrucao4' => array(__('Description for the instruction  4', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputDescInstrucao5' => array(__('Description for the instruction  5', 'my-boleto-sicoob-facil-cnab-plugin')),
			'ATextInputDiasLimitePagamento' => array(__('Deadline for payment after due date (days)', 'my-boleto-sicoob-facil-cnab-plugin'))
			
		
             );
    }

//    protected function getOptionValueI18nString($optionValue) {
//        $i18nValue = parent::getOptionValueI18nString($optionValue);
//        return $i18nValue;
//    }

    protected function initOptions() {
        $options = $this->getOptionMetaData();
        if (!empty($options)) {
            foreach ($options as $key => $arr) {
                if (is_array($arr) && count($arr > 1)) {
                    $this->addOption($key, $arr[1]);
                }
            }
        }
    }

    public function getPluginDisplayName() {
        return 'Boleto Sicoob Facil Cnab';
    }

    protected function getMainPluginFileName() {
        return 'boleto-sicoob-facil-cnab.php';
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Called by install() to create any database tables if needed.
     * Best Practice:
     * (1) Prefix all table names with $wpdb->prefix
     * (2) make table names lower case only
     * @return void
     */
    protected function installDatabaseTablesCFF() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("CREATE TABLE IF NOT EXISTS `$tableName` (
        //            `id` INTEGER NOT NULL");
		
		
		include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/create/all-pages.php');
		include( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/create/cod-mun-insert.php');
		include( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/create/cod-esp-titulo-insert.php');

		
    }

    /**
     * See: http://plugin.michael-simpson.com/?page_id=101
     * Drop plugin-created tables on uninstall.
     * @return void
     */
    protected function uninstallDatabaseTablesCFF() {
        //        global $wpdb;
        //        $tableName = $this->prefixTableName('mytable');
        //        $wpdb->query("DROP TABLE IF EXISTS `$tableName`");
    }


    /**
     * Perform actions when upgrading from version X to version Y
     * See: http://plugin.michael-simpson.com/?page_id=35
     * @return void
     */
    public function upgrade() {
    }

    public function addActionsAndFilters() {

	//include( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/ajax/ajax.php' );

	// AJAX RESPONSE FUNCTIONS FOLDER SERVERS
//include( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/ajax/ajax.php' );

        // Add options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        add_action('admin_menu', array(&$this, 'addSettingsSubMenuPage'));

        // Example adding a script & style just for the options administration page
        // http://plugin.michael-simpson.com/?page_id=47
        //        if (strpos($_SERVER['REQUEST_URI'], $this->getSettingsSlug()) !== false) {
        //            wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));
        //            wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        }


        // Add Actions & Filters
        // http://plugin.michael-simpson.com/?page_id=37


        // Adding scripts & styles to all pages
        // Examples:
		
		        
                wp_enqueue_style('my-style-1', plugins_url('/contents/boleto/css/style.css', __FILE__));
				
        //        wp_enqueue_script('jquery');
        //        wp_enqueue_style('my-style', plugins_url('/css/my-style.css', __FILE__));
        //        wp_enqueue_script('my-script', plugins_url('/js/my-script.js', __FILE__));


        // Register short codes
        // http://plugin.michael-simpson.com/?page_id=39
	include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/shortcodes/shortcodes.php');
	$sc = new BoletoSicoobFacilCnabImportar();
	$sc->register('gerar-boleto-sicoob-facil-cnab-importar');
	
	$sc = new BoletoSicoobFacilCnabFormConfirmar();
	$sc->register('gerar-boleto-sicoob-facil-cnab-confirmar');
	
	$sc = new BoletoSicoobFacilCnabFormGerar();
	$sc->register('gerar-boleto-sicoob-facil-cnab-form-gerar');

        // Register AJAX hooks
        // http://plugin.michael-simpson.com/?page_id=41
		
		
		 // enqueue and localise scripts
wp_enqueue_script( 'my-ajax-handle', plugin_dir_url( __FILE__ ) . 'contents/boleto/js/formata.js', array( 'jquery' ) );
wp_localize_script( 'my-ajax-handle', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

    }


}
