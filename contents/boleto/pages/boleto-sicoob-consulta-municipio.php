<?php
if ( ! defined( 'ABSPATH' ) ) exit;
global $wpdb;
$table_name = $wpdb->prefix . 'cod_mun';
$result = $wpdb->get_row( "SELECT * FROM $table_name WHERE NomeMun LIKE '%$cidadesegq%' AND UF = '$ufsegq'", ARRAY_A );
$codMunicipio = $result['CodMun'];
$nomeMunicipio = $result['NomeMun'];


?>

<select name="codMunicipio" id="codMunicipio"/>
<option value="<?php echo $codMunicipio;?>" selected><?php echo $nomeMunicipio;?> - <?php echo $codMunicipio;?></option>

<?php
$results = $wpdb->get_results( 
	"
	SELECT *
	FROM $table_name  
	WHERE uf = '$ufsegq'
	ORDER BY NomeMun ASC
	"
);



	foreach ( $results as $siafi)
	{
		
?>
        <option value="<?php echo $siafi->CodMun;?>">
        <?php echo $siafi->NomeMun;?> - <?php echo $siafi->CodMun;?>
        </option>
        <?php
}


?>      </select>