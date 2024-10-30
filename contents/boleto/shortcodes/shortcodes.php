<?php
/*
 * Clodoaldo Xavier Gomes
 * 15/10/2019
 */ 
include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'BoletoSicoobFacilCnab_ShortCodeLoader.php');

class BoletoSicoobFacilCnabImportar extends BoletoSicoobFacilCnab_ShortCodeLoader {
    /**
     * @param  $atts shortcode inputs
     * @return string shortcode content
     */
    public function handleShortcode($atts) {
        $content = "";
        require_once(BOLETO_SICOOB_FACIL_CNAB_DIR. 'contents/boleto/pages/boleto-sicoob-importar.php' );
        return $content;
    }
}

class BoletoSicoobFacilCnabFormConfirmar extends BoletoSicoobFacilCnab_ShortCodeLoader {
    /**
     * @param  $atts shortcode inputs
     * @return string shortcode content
     */
    public function handleShortcode($atts) {
        $content = "";
        require_once(BOLETO_SICOOB_FACIL_CNAB_DIR. 'contents/boleto/pages/boleto-sicoob-form-confirmar.php' );
        return $content;
    }
}

class BoletoSicoobFacilCnabFormGerar extends BoletoSicoobFacilCnab_ShortCodeLoader {
    /**
     * @param  $atts shortcode inputs
     * @return string shortcode content
     */
    public function handleShortcode($atts) {
        $content = "";
        require_once(BOLETO_SICOOB_FACIL_CNAB_DIR. 'contents/boleto/pages/boleto-sicoob-form-gerar.php' );
        return $content;
    }
}