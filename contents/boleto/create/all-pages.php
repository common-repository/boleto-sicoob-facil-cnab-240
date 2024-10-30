<?php
/*
* Clodoaldo Xavier Gomes
* 15/10/2019
*/
$meta_key = '[gerar-boleto-sicoob-facil-cnab-importar]';
$post_content = '[login-logout-shortcode-simple][gerar-boleto-sicoob-facil-cnab-importar]';
$post_meta = '[gerar-boleto-sicoob-facil-cnab-importar]';
$post_title = 'Boleto Sicoob Facil Cnab - Importar';
$post_name = 'gerar-boleto-sicoob-facil-cnab-importar';
// create page
global $wpdb;
$post_id_p = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '$meta_key'" );
if (!$post_id_p) {
$post_id = wp_insert_post(array (
'post_type' => 'page',
'post_title' =>  $post_title,
'post_name' => $post_name,
'post_content' => $post_content,
'post_status' => 'publish',
'comment_status' => 'closed',
'ping_status' => 'closed',
));
if ($post_id) {
add_post_meta($post_id, $post_meta, $post_name);
}
}

$meta_key = '[gerar-boleto-sicoob-facil-cnab-form-confirmar]';
$post_content = '[login-logout-shortcode-simple][gerar-boleto-sicoob-facil-cnab-form-confirmar]';
$post_meta = '[gerar-boleto-sicoob-facil-cnab-form-confirmar]';
$post_title = 'Boleto Sicoob Facil Cnab - Confirmar';
$post_name = 'gerar-boleto-sicoob-facil-cnab-form-confirmar';
// create page
global $wpdb;
$post_id_p = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '$meta_key'" );
if (!$post_id_p) {
$post_id = wp_insert_post(array (
'post_type' => 'page',
'post_title' =>  $post_title,
'post_name' => $post_name,
'post_content' => $post_content,
'post_status' => 'publish',
'comment_status' => 'closed',
'ping_status' => 'closed',
));
if ($post_id) {
add_post_meta($post_id, $post_meta, $post_name);
}
}

$meta_key = '[gerar-boleto-sicoob-facil-cnab-form-gerar]';
$post_content = '[login-logout-shortcode-simple][gerar-boleto-sicoob-facil-cnab-form-gerar]';
$post_meta = '[gerar-boleto-sicoob-facil-cnab-form-gerar]';
$post_title = 'Boleto Sicoob Facil Cnab - Gerar';
$post_name = 'gerar-boleto-sicoob-facil-cnab-form-gerar';
// create page
global $wpdb;
$post_id_p = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '$meta_key'" );
if (!$post_id_p) {
$post_id = wp_insert_post(array (
'post_type' => 'page',
'post_title' =>  $post_title,
'post_name' => $post_name,
'post_content' => $post_content,
'post_status' => 'publish',
'comment_status' => 'closed',
'ping_status' => 'closed',
));
if ($post_id) {
add_post_meta($post_id, $post_meta, $post_name);
}
}

?>