<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;
$table_name = $wpdb->prefix . 'cod_espec_titulo';
$result = $wpdb->get_row( "SELECT * FROM $table_name WHERE CodEsp = '$especietitulosegp'", ARRAY_A );
$codEsp = $result['CodEsp'];
$nomeEsp = $result['NomeEsp'];
$especietitulosegp = $result['EspTit'];

?>

<select name="codEspDocumento" id="codEspDocumento"/>
<option value="<?php echo $especietitulosegp;?>" selected><?php echo $especietitulosegp; ?> - <?php echo $nomeEsp;?></option>

<?php
$results = $wpdb->get_results( 
	"
	SELECT *
	FROM $table_name  
	ORDER BY EspTit ASC
	"
);



	foreach ( $results as $result)
	{
		
?>
        <option value="<?php echo $result->CodMun;?>">
        <?php echo $result->EspTit;?> - <?php echo $result->NomeEsp;?>
        </option>
        <?php
}


?>      </select>