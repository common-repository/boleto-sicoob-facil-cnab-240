<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;
//
// Database Codigos Municipios
//

$table_name = $wpdb->prefix . 'cod_espec_titulo';
$charset_collate = $wpdb->get_charset_collate();
$sql = "CREATE TABLE IF NOT EXISTS $table_name(
  Id int(3) NOT NULL AUTO_INCREMENT,
  CodEsp varchar(2) NOT NULL UNIQUE,
  NomeEsp text(155) NOT NULL,
  EspTit varchar(10) NOT NULL,
  PRIMARY KEY  (Id)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

$table_name = $wpdb->prefix . 'cod_espec_titulo';
$insert="INSERT INTO $table_name
(CodEsp,NomeEsp,EspTit)
VALUES
('01','CH Cheque','CH'),
('02','DM Duplicata Mercantil','DM'),
('03','DMI Duplicata Mercantil p Indicacao','DMI'),
('04','DS Duplicata de Servico','DS'),
('05','DSI Duplicata de Servico p Indicacao','DSI'),
('06','DR Duplicata Rural','DR'),
('07','LC Letra de Cambio','LC'),
('08','NCC Nota de Credito Comercial','NCC'),
('09','NCE Nota de Credito a Exportacao','NCE'),
('10','NCI Nota de Credito Industrial','NCI'),
('11','NCR Nota de Credito Rural','NCR'),
('12','NP Nota Promissoria','NP'),
('13','NPR Nota Promissoria Rural','NPR'),
('14','TM Triplicata Mercantil','TM'),
('15','TS Triplicata de Servico','TS'),
('16','NS Nota de Seguro','NS'),
('17','RC Recibo','RC'),
('18','FAT Fatura','FAT'),
('19','ND Nota de Debito','ND'),
('20','AP Apolice de Seguro','AP'),
('21','ME Mensalidade Escolar','ME'),
('22','PC Parcela de Consorcio','PC'),
('23','NF Nota Fiscal','NF'),
('24','DD Documento de Divida','DD'),
('25','Cedula de Produto Rural','CDR'),
('99','Outros','OUTROS')
";
$wpdb->query($insert);
?>