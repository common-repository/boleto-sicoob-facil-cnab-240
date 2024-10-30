<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;

$meta_key = '[gerar-boleto-sicoob-facil-cnab-importar]';
$post_id_p = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = $meta_key" );
if ($post_id_p) {
wp_delete_post( $post_id, true );
echo __('Page reset successfully.', 'boleto-sicoob-facil-cnab').'<br>';
}

$meta_key = '[gerar-boleto-sicoob-facil-cnab-form-confirmar]';
$post_id_p = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = $meta_key" );
if ($post_id_p) {
wp_delete_post( $post_id, true );
echo __('Page reset successfully.', 'boleto-sicoob-facil-cnab').'<br>';
}

$meta_key = '[gerar-boleto-sicoob-facil-cnab-form-gerar]';
$post_id_p = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = $meta_key" );
if ($post_id_p) {
wp_delete_post( $post_id, true );
echo __('Page reset successfully.', 'boleto-sicoob-facil-cnab').'<br>';
}
?>