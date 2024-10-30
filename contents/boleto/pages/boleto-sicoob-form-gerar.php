<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/pages/active-plugins.php');

global $wpdb;


if(! isset( $_POST['nonce_boleto_sicoob_facil_cnab_gerar'] ) 
|| ! wp_verify_nonce( $_POST['nonce_boleto_sicoob_facil_cnab_gerar'], 'nonce_boleto_sicoob_facil_cnab' ) 
) {
	echo '<a href="javascript:history.back()">'.__('Sorry, your session has expired. Please go back and try again.', 'boleto-sicoob-facil-cnab').'</a>';
   exit;
} else {



$numCliente = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputnumCliente' );
$coopCartao = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputcoopCartao' );
$chaveAcessoWeb = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputChaveAcessoWeb' );
$numContaCorrente = get_option( 'BoletoSicoobFacilCnab_Plugin_ATextInputnumContaCorrent' );

if(isset($_POST['endereco'])){
$logradouro = sanitize_text_field($_POST['endereco']);
$logradouro  = strtoupper($logradouro);
}

if(isset($_POST['numero'])){
$numero = sanitize_text_field($_POST['numero']);
$numero  = strtoupper($numero);
}

if(isset($_POST['complemento'])){
$complemento = sanitize_text_field($_POST['complemento']);
$complemento  = strtoupper($complemento);
}

if(isset($_POST['bairro'])){
$bairro = sanitize_text_field($_POST['bairro']);
$bairro  = strtoupper($bairro);
}

if(isset($_POST['cep'])){
$cep = sanitize_text_field($_POST['cep']);
}

if(isset($_POST['cidade'])){
$cidade = sanitize_text_field($_POST['cidade']);
$cidade  = strtoupper($cidade);
}

if(isset($_POST['uf'])){
$uf = sanitize_text_field($_POST['uf']);
$uf  = strtoupper($uf);
}

if(isset($_POST['codMunicipio'])){
$codMunicipio = sanitize_text_field($_POST['codMunicipio']);
}


if(isset($_POST['nomeSacado'])){
$nomeSacado = sanitize_text_field($_POST['nomeSacado']);
$nomeSacado  = strtoupper($nomeSacado );
}

if(isset($_POST['tipoPessoa'])){
$tipoPessoa = sanitize_text_field($_POST['tipoPessoa']);
}


if(isset($_POST['cpfCGC'])){
$cpfCGC = sanitize_text_field($_POST['cpfCGC']);
}

if(isset($_POST['ddd'])){
$ddd = sanitize_text_field($_POST['ddd']);
}


if(isset($_POST['telefone'])){
$telefone = sanitize_text_field($_POST['telefone']);
}

if(isset($_POST['ramal'])){
$ramal = sanitize_text_field($_POST['ramal']);
$ramal  = strtoupper($ramal);
}


if(isset($_POST['email'])){
$email = sanitize_email($_POST['email']);
}

if(isset($_POST['dataNascimento'])){
$dataNascimento = sanitize_text_field($_POST['dataNascimento']);
}


if(isset($_POST['numTitulo'])){
$numTitulo = sanitize_text_field($_POST['numTitulo']);
}


if(isset($_POST['codEspDocumento'])){
$codEspDocumento = sanitize_text_field($_POST['codEspDocumento']);
}


if(isset($_POST['dataEmissao'])){
$dataEmissao = sanitize_text_field($_POST['dataEmissao']);
}

if(isset($_POST['seuNumero'])){
$seuNumero = sanitize_text_field($_POST['seuNumero']);
}

if(isset($_POST['valorTitulo'])){
$valorTitulo = sanitize_text_field($_POST['valorTitulo']);
}

if(isset($_POST['codTipoVencimento'])){
$codTipoVencimento = sanitize_text_field($_POST['codTipoVencimento']);
}


if(isset($_POST['dataVencimentoTit'])){
$dataVencimentoTit = sanitize_text_field($_POST['dataVencimentoTit']);
}


if(isset($_POST['dataLimitePagamento'])){
$dataLimitePagamento = sanitize_text_field($_POST['dataLimitePagamento']);
}


if(isset($_POST['valorAbatimento'])){
$valorAbatimento = sanitize_text_field($_POST['valorAbatimento']);
}


if(isset($_POST['valorIOF'])){
$valorIOF = sanitize_text_field($_POST['valorIOF']);
}

if(isset($_POST['bolAceite'])){
$bolAceite = sanitize_text_field($_POST['bolAceite']);
}

if(isset($_POST['percTaxaMulta'])){
$percTaxaMulta = sanitize_text_field($_POST['percTaxaMulta']);
}

if(isset($_POST['percTaxaMora'])){
$percTaxaMora = sanitize_text_field($_POST['percTaxaMora']);
}


if(isset($_POST['dataMulta'])){
$dataMulta = sanitize_text_field($_POST['dataMulta']);
}

if(isset($_POST['dataJuros'])){
$dataJuros = sanitize_text_field($_POST['dataJuros']);
}

if(isset($_POST['nomeSacador'])){
$nomeSacador = sanitize_text_field($_POST['nomeSacador']);
$nomeSacador  = strtoupper($nomeSacador);
}

if(isset($_POST['numCGCCPFSacador'])){
$numCGCCPFSacador = sanitize_text_field($_POST['numCGCCPFSacador']);
}


if(isset($_POST['dataPrimDesconto'])){
$dataPrimDesconto1 = sanitize_text_field($_POST['dataPrimDesconto']);
$dataPrimDesconto = date('Ymd', strtotime($dataPrimDesconto1));
}

if($dataPrimDesconto1==""){
$dataPrimDesconto = "";
}

if(isset($_POST['dataSegDesconto'])){
$dataSegDesconto1 = sanitize_text_field($_POST['dataSegDesconto']);
$dataSegDesconto = date('Ymd', strtotime($dataSegDesconto1));
}

if($dataSegDesconto1==""){
$dataSegDesconto = "";
}

if(isset($_POST['dataTerDesconto'])){
$dataTerDesconto1 = sanitize_text_field($_POST['dataTerDesconto1']);
$dataTerDesconto = date('Ymd', strtotime($dataTerDesconto));
}

if($dataTerDesconto1==""){
$dataTerDesconto = "";
}

if(isset($_POST['valorPrimDesconto'])){
$valorPrimDesconto = sanitize_text_field($_POST['valorPrimDesconto']);
}

if(isset($_POST['valorSegDesconto'])){
$valorSegDesconto = sanitize_text_field($_POST['valorSegDesconto']);
}

if(isset($_POST['valorTerDesconto'])){
$valorTerDesconto = sanitize_text_field($_POST['valorTerDesconto']);
}

if(isset($_POST['descInstrucao1'])){
$descInstrucao1 = sanitize_text_field($_POST['descInstrucao1']);
$descInstrucao1  = strtoupper($descInstrucao1);
}

if(isset($_POST['descInstrucao2'])){
$descInstrucao2 = sanitize_text_field($_POST['descInstrucao2']);
$descInstrucao2  = strtoupper($descInstrucao2);
}

if(isset($_POST['descInstrucao3'])){
$descInstrucao3 = sanitize_text_field($_POST['descInstrucao3']);
$descInstrucao3  = strtoupper($descInstrucao3);
}

if(isset($_POST['descInstrucao4'])){
$descInstrucao4 = sanitize_text_field($_POST['descInstrucao4']);
$descInstrucao4  = strtoupper($descInstrucao4);
}

if(isset($_POST['descInstrucao5'])){
$descInstrucao5 = sanitize_text_field($_POST['descInstrucao5']);
$descInstrucao5  = strtoupper($descInstrucao5);
}

include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/pages/functions.php');


echo '<a href="javascript:history.back()">'.__('If something goes wrong click here to go back!', 'boleto-sicoob-facil-cnab').'</a>';
?>

	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Boleto Sicoob Form Gerar</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>		


<form method="post" action="https://geraboleto.sicoobnet.com.br/geradorBoleto/GerarBoleto.do">


						<input name="numCliente" value="<?php echo $numCliente ;?>" type="hidden" readonly="true"/>
						<input name="coopCartao" value="<?php echo $coopCartao ;?>" type="hidden" readonly="true"/>
					   <input name="chaveAcessoWeb" type="hidden" value="<?php echo $chaveAcessoWeb ;?>" size="50" readonly="true"/>
					   <input name="numContaCorrente" value="<?php echo $numContaCorrente ;?>" type="hidden" readonly="true"/>
					   
					  
  <table width="100%" border="1" cellpadding="3" cellspacing="3">
    <tr bgcolor="#CCCCCC"> 
      <td colspan="2"><div align="center"><b>
          <?php 	echo __('PAYER', 'boleto-sicoob-facil-cnab'); ?>
          </b></div></td>
    </tr>
    <tr bgcolor="#00FF00"> 
      <td><div align="right"> 
          <?php 	echo __('Name', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input size="50" maxlength="50" name="nomeSacado" type="text" value="<?php echo $nomeSacado; ?>"/> 
        <?php BpscValidNome($nomeSacado); ?>
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php 	echo __('CPF/CNPJ', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="14" maxlength="14" name="cpfCGC" type="text" value="<?php echo $cpfCGC; ?>"/> 
        <?php if(strlen($cpfCGC<15)) {
		$cpf = $cpfCGC;
		 BpscValidCpf($cpf);
		 }
        else
		{
		$cnpj = $cpfCGC;
		BpscValidCnpj($cnpj);
		 } ;?>
      </td>
    </tr>
    <tr bgcolor="#00FF00"> 
      <td><div align="right"> 
          <?php 	echo __('Date of birth', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="dataNascimentov" type="text" size="10"  value="<?php echo $dataNascimento; ?>"/> 
        <input name="dataNascimento" type="hidden"  value="<?php echo date('Ymd', strtotime($dataNascimento)); ?>"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php 	echo __('Address', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="40" maxlength="40" name="endereco" type="text" value="<?php echo $logradouro; ?>"/> 
      </td>
    </tr>
    <tr bgcolor="#00FF00"> 
      <td><div align="right"> 
          <?php 	echo __('Number', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="2" maxlength="10" name="numero" type="text" value="<?php echo $numero; ?>"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Complement', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="complemento" type="text" id="complemento" value="<?php echo $complemento; ?>" size="15" maxlength="30"/></td>
    </tr>
    <tr bgcolor="#00FF00"> 
      <td><div align="right"> 
          <?php echo __('Neighborhood', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="15" maxlength="30" name="bairro" type="text" value="<?php echo $bairro; ?>"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('City', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="15" maxlength="15" name="cidade" type="text" value="<?php echo $cidade; ?>"/> 
    </tr>
    <tr bgcolor="#00FF00"> 
      <td><div align="right"> 
          <?php echo __('Zip Code', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="8" maxlength="8" name="cep" type="text" value="<?php echo $cep; ?>" readonly="true"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('State', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input size="2" maxlength="2" name="uf" type="text" value="<?php echo $uf; ?>" readonly="true"/></td>
    </tr>
    <tr bgcolor="#00FF00"> 
      <td><div align="right">* 
          <?php echo __('County code', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="codMunicipio" type="text" value="<?php echo $codMunicipio; ?>" size="10"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('DDD phone', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td> <input name="ddd" type="text" size="5" value="<?php echo $ddd; ?>"/> 
      </td>
    </tr>
    <tr bgcolor="#00FF00"> 
      <td><div align="right"> 
          <?php echo __('Phone number', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="telefone" type="text" value="<?php echo $telefone; ?>"/>
      </td>
    </tr>
    <tr>
      <td>  <div align="right">
        <?php echo __('Phone number', 'boleto-sicoob-facil-cnab'); ?>
       :</div></td>
      <td><input name="ramal" type="text" value="<?php echo $ramal; ?>" size="10"/></td>
    </tr>
    <tr bgcolor="#00FF00"> 
      <td><div align="right"> 
          <?php echo __('Receive by email?', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="bolRecebeBoletoEletronico" type="text" value="0" size="3"/> 
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
      <td><input name="email" type="text" value="<?php echo $email; ?>" size="50"/></td>
    </tr>
    <tr bgcolor="#00FF00"> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#CCCCCC"> 
      <td colspan="2"><div align="center"><b>
          <?php echo __('BOLETO INFORMATION', 'boleto-sicoob-facil-cnab'); ?>
          </b></div></td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td><div align="right"> 
          <?php echo __('Boleto number', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="numTitulo" value="<?php echo(str_replace("-","",$numTitulo)); ?>" type="text" readonly="true"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Document type code', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="codEspDocumento" value="<?php echo $codEspDocumento; ?>" type="text" readonly="true"/></td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td><div align="right"> 
          <?php echo __('Issue date', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="dataEmissao1" value="<?php echo $dataEmissao; ?>" type="text" readonly="true"/> 
        <input name="dataEmissao" type="hidden"  value="<?php echo date('Ymd', strtotime($dataEmissao)); ?>"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Your number', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="seuNumero" value="<?php echo $seuNumero; ?>" type="text" readonly="true"/></td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td><div align="right"> 
          <?php echo __('Amount payable', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="valorTitulo" value="<?php echo $valorTitulo; ?>" type="text" readonly="true"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Due Date type code', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="codTipoVencimento" value="<?php echo $codTipoVencimento; ?>" type="text" readonly="true"/> 
      </td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td>&nbsp;</td>
      <td><span class="style1"> 
        <?php echo __('(1: Normal / 2: Spotlight / 3: Counter presentation)', 'boleto-sicoob-facil-cnab'); ?>
        </span></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Due Date', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="dataVencimentoTit1" value="<?php echo $dataVencimentoTit; ?>" type="text" readonly="true"/> 
        <input name="dataVencimentoTit" type="hidden"  value="<?php echo date('Ymd', strtotime($dataVencimentoTit)); ?>"/></td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td><div align="right"> 
          <?php echo __('Deadline Due Date', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="dataLimitePagamento1" value="<?php echo $dataLimitePagamento; ?>" type="text" readonly="true"/> 
        <input name="dataLimitePagamento" type="hidden"  value="<?php echo date('Ymd', strtotime($dataLimitePagamento)); ?>"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Discount amount', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="valorAbatimento" value="<?php echo $valorAbatimento; ?>" type="text" readonly="true"/> 
      </td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td><div align="right"> 
          <?php echo __('IOF Value', 'boleto-sicoob-facil-cnab'); ?>
          *:</div></td>
      <td><input name="valorIOF" value="<?php echo $valorIOF; ?>" type="text" readonly="true"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Accept', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="bolAceite" type="text" value="<?php echo $bolAceite; ?>" size="3" readonly="true"/> 
      </td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td>&nbsp;</td>
      <td><span class="style1"> 
        <?php echo __('(0:No / 1:Yes)', 'boleto-sicoob-facil-cnab'); ?>
        </span></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Fine rate percentage', 'boleto-sicoob-facil-cnab'); ?>
          *: </div></td>
      <td><input name="percTaxaMulta" type="text" value="<?php echo $percTaxaMulta; ?>" readonly="true"/> 
      </td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td><div align="right"><span class="style1"> 
          <?php echo __('Interest Rate Percentage', 'boleto-sicoob-facil-cnab'); ?>
          *</span>:</div></td>
      <td><input name="percTaxaMora" type="text" value="<?php echo $percTaxaMora; ?>" readonly="true"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Fine Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="dataMulta1" type="text" value="<?php echo $dataMulta; ?>" readonly="true"/> 
        <input name="dataMulta" type="hidden"  value="<?php echo date('Ymd', strtotime($dataMulta)); ?>"/> 
      </td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td><div align="right"> 
          <?php echo __('Interest Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="dataJuros1" type="text" value="<?php echo $dataJuros; ?>" readonly="true"/> 
        <input name="dataJuros" type="hidden"  value="<?php echo date('Ymd', strtotime($dataJuros)); ?>"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Guarantor name', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="nomeSacador" type="text" value="<?php echo $nomeSacador; ?>" size="50" maxlength="50" readonly="true"/> 
      </td>
    </tr>
    <tr bgcolor="#6699CC"> 
      <td><div align="right"> 
          <?php echo __('CGC/CPF guarantor', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="numCGCCPFSacador" type="text" value="<?php echo $numCGCCPFSacador; ?>" maxlength="15" readonly="true"/></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#CCCCCC"> 
      <td colspan="2"><div align="center"><b> 
          <?php echo __('DISCOUNTS', 'boleto-sicoob-facil-cnab'); ?>
          </b></div></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('First Discount Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="dataPrimDesconto1" type="text" value="<?php echo $dataPrimDesconto1; ?>" readonly="true"/> 
        <input name="dataPrimDesconto" type="hidden"  value="<?php echo $dataPrimDesconto; ?>"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('First discount amount', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="valorPrimDesconto" type="text" value="<?php echo $valorPrimDesconto; ?>" readonly="true"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Secound Discount Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="dataSegDesconto1" type="text" value="<?php echo $dataSegDesconto1; ?>" readonly="true"/> 
        <input name="dataSegDesconto" type="hidden"  value="<?php echo $dataSegDesconto; ?>"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Secound discount amount', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="valorSegDesconto" type="text" value="<?php echo $valorSegDesconto; ?>" readonly="true"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Third Discount Date', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="dataTerDesconto1" type="text" value="<?php echo $dataTerDesconto1; ?>" readonly="true"/> 
        <input name="dataTerDesconto" type="hidden"  value="<?php echo $dataTerDesconto; ?>"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Third discount amount', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="valorTerDesconto" type="text" value="<?php echo $valorTerDesconto; ?>" readonly="true"/></td>
    </tr>
    <tr bgcolor="#CCCCCC"> 
      <td colspan="2"><div align="center"><b> 
          <?php echo __('INSTRUCTIONS', 'boleto-sicoob-facil-cnab'); ?>
          </b></div></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 1', 'boleto-sicoob-facil-cnab'); ?>:
           </div></td>
      <td><input name="descInstrucao1" type="text" value="<?php echo $descInstrucao1; ?>" size="50" maxlength="50" readonly="true"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 2', 'boleto-sicoob-facil-cnab'); ?>
          :</div></td>
      <td><input name="descInstrucao2" type="text" value="<?php echo $descInstrucao2; ?>" size="50" maxlength="50" readonly="true"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 3', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="descInstrucao3" type="text" value="<?php echo $descInstrucao3; ?>" size="50" maxlength="50" readonly="true"/> 
      </td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 4', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="descInstrucao4" type="text" value="<?php echo $descInstrucao4; ?>" size="50" maxlength="50" readonly="true"/></td>
    </tr>
    <tr> 
      <td><div align="right"> 
          <?php echo __('Description Instruction 5', 'boleto-sicoob-facil-cnab'); ?>
          : </div></td>
      <td><input name="descInstrucao5" type="text" value="<?php echo $descInstrucao5; ?>" size="50" maxlength="50" readonly="true"/></td>
    </tr>
    <tr> 
      <td></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td></td>
      <td><input name="submit" type="submit" value="<?php echo __('Record', 'boleto-sicoob-facil-cnab'); ?>"/></td>
    </tr>
    <tr> 
      <td><div align="right"><span class="style1">*</span></div></td>
      <td><span class="style1"> 
        <?php echo __('Clicking RECORD the ticket will be generated and can be consulted on Sicoobnet', 'boleto-sicoob-facil-cnab'); ?>
        </span></td>
    </tr>
  </table>
					</form>
<?php 
}
?>
					</body>
</html>