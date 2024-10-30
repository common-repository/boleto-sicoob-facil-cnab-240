<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
global $wpdb;
include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/pages/active-plugins.php');


if(! isset( $_POST['nonce_boleto_sicoob_facil_cnab_confirmar'] ) 
|| ! wp_verify_nonce( $_POST['nonce_boleto_sicoob_facil_cnab_confirmar'], 'nonce_boleto_sicoob_facil_cnab' ) 
) {
	echo '<a href="javascript:history.back()">'.__('Sorry, your session has expired. Please go back and try again.', 'boleto-sicoob-facil-cnab').'</a>';
   exit;
} else {

$informacao5segs  = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputDescInstrucao1' );
$informacao6segs  = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputDescInstrucao2' );
$informacao7segs  = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputDescInstrucao3' );
$informacao8segs  = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputDescInstrucao4' );
$informacao9segs  = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputDescInstrucao5' );
$diasLimitePagamento = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputDiasLimitePagamento' );
$dataLimitePagamento = date("d-m-Y", strtotime($datavencimentosegp."+".$diasLimitePagamento." days", time()));

include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/pages/functions.php');


echo '<a href="javascript:history.back()">'.__('If something goes wrong click here to go back!', 'boleto-sicoob-facil-cnab').'</a>';
?>

	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Boleto Sicoob Form Confirmar</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>		
					
<?php $post_id_action = $wpdb->get_var( "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '[gerar-boleto-sicoob-facil-cnab-form-gerar]'" );?>
<form action="<?php echo get_page_link($post_id_action);?>" method="post" name="form">

<?php wp_nonce_field( 'nonce_boleto_sicoob_facil_cnab', 'nonce_boleto_sicoob_facil_cnab_gerar' ); ?>		  
  <table width="100%" height="30" border="1" cellpadding="3" cellspacing="3">
    <tr> 
      <td colspan="2" bgcolor="#CCCCCC"><div align="center"><b> 
          <?php 	echo __('PAYER', 'boleto-sicoob-facil-cnab'); ?>
          </b></div></td>
    </tr>
    <tr> 
      <td bgcolor="#00FF00"><div align="right"> 
          <?php 	echo __('Name', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td bgcolor="#00FF00"><input size="50" maxlength="50" name="nomeSacado" type="text" value="<?php echo $nomesegq; ?>" /> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php 	echo __('CPF/CNPJ', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="14" maxlength="14" name="cpfCGC" type="text" value="<?php echo $numeroinscricaosegq; ?>" onKeyPress="mascara(this, mcpf);" /> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#00FF00"><div align="right"> 
          <?php 	echo __('Date of birth', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td bgcolor="#00FF00"> <input name="dataNascimento" type="text" size="10" onKeyPress="mascara(this, mdata);" /> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php 	echo __('Address', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="40" maxlength="40" name="endereco" type="text" value="<?php echo $enderecosegq; ?>"/> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#00FF00"><div align="right"> 
          <?php 	echo __('Number', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td bgcolor="#00FF00"><input size="2" maxlength="10" name="numero" type="text" value="<?php echo $numerosegq; ?>"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Complement', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="complemento" type="text" id="complemento" size="15" maxlength="30"/></td>
    </tr>
    <tr> 
      <td bgcolor="#00FF00"><div align="right"> 
          <?php echo __('Neighborhood', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td bgcolor="#00FF00"><input size="15" maxlength="30" name="bairro" type="text" value="<?php echo $bairrosegq; ?>"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('City', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="15" maxlength="40" name="cidade" type="text" value="<?php echo $cidadesegq; ?>"/> 
    </tr>
    <tr> 
      <td bgcolor="#00FF00"><div align="right"> 
          <?php echo __('Zip Code', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td bgcolor="#00FF00"><input size="8" maxlength="8" name="cep" type="text" value="<?php echo $cepsegq.$sufixocepsegq; ?>" onKeyPress="mascara(this, mnum);" /></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('State', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="2" maxlength="2" name="uf" type="text" value="<?php echo $ufsegq; ?>" /></td>
    </tr>
    <tr> 
      <td bgcolor="#00FF00"><div align="right">* 
          <?php echo __('County code', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td bgcolor="#00FF00"> 
        <?php 
	  include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/pages/boleto-sicoob-consulta-municipio.php'); ?>
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('DDD phone', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td> <input name="ddd" type="text" size="5" value="<?php echo $ddd; ?>" onKeyPress="mascara(this, mnum);"/> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#00FF00"><div align="right"> 
          <?php echo __('Telephone Extension', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td bgcolor="#00FF00"><input name="telefone" type="text" value="<?php echo $telefone; ?>"onKeyPress="mascara(this, mnum);"/>
      </td>
    </tr>
    <tr>
      <td> <div align="right">
        <?php echo __('Phone number', 'boleto-sicoob-facil-cnab'); ?>
        :</div></td>
      <td><input name="ramal" type="text" value="<?php echo $ramal; ?>" size="10"/></td>
    </tr>
    <tr> 
      <td bgcolor="#00FF00"><div align="right"> 
          <?php echo __('Receive by email?', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td bgcolor="#00FF00"><input name="bolRecebeBoletoEletronico" type="text" value="0" size="3" onKeyPress="mascara(this, mnum);" /> 
        <span class="style1">(0: 
        <?php echo __('No', 'boleto-sicoob-facil-cnab'); ?>
        / 1: 
        <?php echo __('Yes', 'boleto-sicoob-facil-cnab'); ?>
        ) </span></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Email', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="email" type="text" size="50"/></td>
    </tr>
    <tr bgcolor="#00FF00"> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#CCCCCC"><div align="center"><b> 
          <?php echo __('BOLETO INFORMATION', 'boleto-sicoob-facil-cnab'); ?>
          </b></div></td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC"><div align="right"> 
          <?php echo __('Boleto number', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td bgcolor="#6699CC"><input name="numTitulo" value="<?php echo $nossonumerosegp; ?>" type="text" onKeyPress="mascara(this, mnosn);"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Document type code', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td> 
        <?php 
	  include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/pages/boleto-sicoob-consulta-esp-titulo.php'); ?>
      </td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC"><div align="right"> <font color="#6699CC"> 
          <?php echo __('Issue date', 'boleto-sicoob-facil-cnab'); ?>
          : </font></div></td>
      <td bgcolor="#6699CC"><font color="#6699CC"> 
        <input name="dataEmissao" value="<?php echo $dataemissaosegp; ?>" type="text" onKeyPress="mascara(this, mdata);"/>
        </font></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Your number', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="seuNumero" value="<?php echo $numerodocumentosegp; ?>" type="text" /></td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC"><div align="right"> 
          <?php echo __('Amount payable', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td bgcolor="#6699CC"><input name="valorTitulo" value="<?php echo $valortitulosegp; ?>" type="text" onKeyPress="mascara(this, mvalor);"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Due Date type code', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="codTipoVencimento" value="1" type="text" onKeyPress="mascara(this, mnum);"/> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC">&nbsp;</td>
      <td bgcolor="#6699CC"><span class="style1"> 
        <?php echo __('(1: Normal / 2: Spotlight / 3: Counter presentation)', 'boleto-sicoob-facil-cnab'); ?>
        </span></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Due Date', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="dataVencimentoTit" value="<?php echo $datavencimentosegp; ?>" type="text" onKeyPress="mascara(this, mdata);"/></td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC"><div align="right"> 
          <?php echo __('Deadline Due Date', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td bgcolor="#6699CC"><input name="dataLimitePagamento" value="<?php echo $dataLimitePagamento; ?>" type="text" onKeyPress="mascara(this, mdata);"/> 
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Discount amount', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="valorAbatimento" value="<?php echo $valorabatimentosegp; ?>" type="text" onKeyPress="mascara(this, mvalor);"/> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC"><div align="right"> 
          <?php echo __('IOF Value', 'boleto-sicoob-facil-cnab'); ?>
          *:</div></td>
      <td bgcolor="#6699CC"><input name="valorIOF" value="<?php echo $valoriofsegp ; ?>" type="text" onKeyPress="mascara(this, mvalor);"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Accept', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="bolAceite" type="text" value="<?php echo $aceitesegp ; ?>" size="3" onKeyPress="mascara(this, mnum);"/> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC">&nbsp;</td>
      <td bgcolor="#6699CC"><span class="style1"> 
        <?php echo __('(0:No / 1:Yes)', 'boleto-sicoob-facil-cnab'); ?>
        </span></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Fine rate percentage', 'boleto-sicoob-facil-cnab'); ?>
          *:</div></td>
      <td><input name="percTaxaMulta" type="text" value="<?php echo $valormultasegr; ?>" onKeyPress="mascara(this, mvalor);"/> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC"><div align="right"><span class="style1"> 
          <?php echo __('Interest Rate Percentage', 'boleto-sicoob-facil-cnab'); ?>
          *</span>:</div></td>
      <td bgcolor="#6699CC"><input name="percTaxaMora" type="text" value="<?php echo $valorjurosmorasegp; ?>" onKeyPress="mascara(this, mvalor);"/> 
      </td>
    </tr>
    <tr> 
      <td height="25"><div align="right"> 
          <?php echo __('Fine Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="dataMulta" type="text" value="<?php echo $datajurosmorasegp; ?>" onKeyPress="mascara(this, mdata);"/> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC"><div align="right"> 
          <?php echo __('Interest Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td bgcolor="#6699CC"><input name="dataJuros" type="text" value="<?php echo $datajurosmorasegp;; ?>" onKeyPress="mascara(this, mdata);"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Guarantor name', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="nomeSacador" type="text" value="<?php echo $nomeSacador; ?>" size="50" maxlength="50" /> 
      </td>
    </tr>
    <tr> 
      <td bgcolor="#6699CC"><div align="right"> 
          <?php echo __('CGC/CPF guarantor', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td bgcolor="#6699CC"><input name="numCGCCPFSacador" type="text" value="<?php echo $numCGCCPFSacador; ?>" maxlength="15" onKeyPress="mascara(this, mcpf);" /> 
      </td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#CCCCCC"><div align="center"><b> 
          <?php echo __('DISCOUNTS', 'boleto-sicoob-facil-cnab'); ?>
          </b></div></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('First Discount Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="dataPrimDesconto" type="text" value="<?php echo $datadesconto1segp; ?>"  onKeyPress="mascara(this, mdata);"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('First discount amount', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="valorPrimDesconto" type="text" value="<?php echo $valordesconto1segp; ?>" onKeyPress="mascara(this, mvalor);"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Secound Discount Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="dataSegDesconto" type="text" value="<?php echo $datadesconto2segp; ?>"  onKeyPress="mascara(this, mdata);"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Secound discount amount', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="valorSegDesconto" type="text" value="<?php echo $valordesconto2segp; ?>" onKeyPress="mascara(this, mvalor);"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Third Discount Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="dataTerDesconto" type="text" value="<?php echo $datadesconto3segp; ?>"  onKeyPress="mascara(this, mdata);"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Third discount amount', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="valorTerDesconto" type="text" value="<?php echo $valorTerDesconto; ?>" onKeyPress="mascara(this, mvalor);"/> 
      </td>
    </tr>
    <tr> 
      <td colspan="2" bgcolor="#CCCCCC"><div align="center"><b> 
          <?php echo __('INSTRUCTIONS', 'boleto-sicoob-facil-cnab'); ?>
          </b></div></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 1', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="descInstrucao1" type="text" value="<?php echo $informacao5segs; ?>" size="50" maxlength="50" /> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 2', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="descInstrucao2" type="text" value="<?php echo $informacao6segs; ?>" size="50" maxlength="50" /></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 3', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="descInstrucao3" type="text" value="<?php echo $informacao7segs; ?>" size="50" maxlength="50" /> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 4', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="descInstrucao4" type="text" value="<?php echo $informacao8segs; ?>" size="50" maxlength="50" /></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 5', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="descInstrucao5" type="text" value="<?php echo $informacao9segs; ?>" size="50" maxlength="50" /></td>
    </tr>
    <tr> 
      <td></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td></td>
      <td><input name="submit" type="submit" value="<?php echo __('Continue', 'boleto-sicoob-facil-cnab'); ?>"/></td>
    </tr>
  </table>
					</form>
					
<?php }
?>
					</body>
</html>