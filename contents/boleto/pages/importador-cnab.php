<?php
   if (!empty($_FILES['arquivo']))
    {
        
        $file    = fopen($_FILES['arquivo']['tmp_name'], 'r');
		
		//a função feof retorna true (verdadeiro) se o ponteiro estiver no fim do arquivo aberto
        //a negação do retorno de feof indicada pelo caracter "!" do lado esquerdo da função faz com 
        //que o laço percorra todas as linhas do arquivo até fim do arquivo (eof - end of file)
		
        while (!feof($file)){
		
		    //retorna a linha do ponteiro do arquivo                        
            $conteudo = fgets($file);
			
			//transforma a linha do ponteiro em uma matriz de string, cada uma como substring de string formada a partir do caracter ';'
             $linha = explode(';', $conteudo);
				
		    //array recebe as substring contidas na matriz carregada na variável $linha 
            $arquivoArr[$total_linhas_importadas] = $linha;

            //incremente a variável que armazena o total de linhas importadas
            $total_linhas_importadas++;
				
			
			foreach($arquivoArr as $linha){ 
			
		
if($total_linhas_importadas==1){		
foreach($linha as $headerarquivo){		
$banco	=	trim(substr($headerarquivo,0,3));
$lote	=	trim(substr($headerarquivo,3,4));
$registro	=	trim(substr($headerarquivo,7,1));
$cnab1	=	trim(substr($headerarquivo,8,9));
$tipo	=	trim(substr($headerarquivo,17,1));
$numero	=	trim(substr($headerarquivo,18,14));
$convenio	=	trim(substr($headerarquivo,32,20));
$agencia	=	trim(substr($headerarquivo,52,5));
$dvagencia	=	trim(substr($headerarquivo,57,1));
$numeroconta	=	trim(substr($headerarquivo,58,12));
$dvnumeroconta	=	trim(substr($headerarquivo,70,1));
$dvagenciaconta	=	trim(substr($headerarquivo,71,1));
$favorecido	=	trim(substr($headerarquivo,72,30));
$nomebanco	=	trim(substr($headerarquivo,102,30));
$cnab2	=	trim(substr($headerarquivo,132,10));
$codigoremret	=	trim(substr($headerarquivo,142,1));
$datageracao	=	trim(substr($headerarquivo,143,8));
$horageracao	=	trim(substr($headerarquivo,151,6));
$sequencialarquivo	=	trim(substr($headerarquivo,157,6));
$versaolayout	=	trim(substr($headerarquivo,163,3));
$denseidadegravacao	=	trim(substr($headerarquivo,166,5));
$reservado1	=	trim(substr($headerarquivo,171,20));
$reservado2	=	trim(substr($headerarquivo,191,20));
$reservado3	=	trim(substr($headerarquivo,211,29));
}
}

if($total_linhas_importadas==2){		
foreach($linha as $headerlote){	
					
$bancolote = trim(substr($headerlote,0,3));
$lotelote = trim(substr($headerlote,3,4));
$registrolote = trim(substr($headerlote,7,1));
$operacaolote = trim(substr($headerlote,8,1));
$servicolote = trim(substr($headerlote,9,2));
$cnab1lote = trim(substr($headerlote,11,2));
$layoutlote = trim(substr($headerlote,13,3));
$cnab2lote = trim(substr($headerlote,16,1));
$incricaotipolote = trim(substr($headerlote,17,1));
$incricaonumerolote = trim(substr($headerlote,18,15));
$conveniolote = trim(substr($headerlote,33,20));
$agenciacodigolote = trim(substr($headerlote,53,5));
$agenciadvlote = trim(substr($headerlote,58,1));
$contanumerolote = trim(substr($headerlote,59,12));
$contadvlote = trim(substr($headerlote,71,1));
$agenciacontadvlote = trim(substr($headerlote,72,1));
$nomelote = trim(substr($headerlote,73,30));
$informacao1lote = trim(substr($headerlote,103,40));
$informacao2lote = trim(substr($headerlote,143,40));
$numeroremretlote = trim(substr($headerlote,183,8));
$datagravacaolote = trim(substr($headerlote,191,8));
$datacreditolote = trim(substr($headerlote,199,8));
$cnab3lote = trim(substr($headerlote,207,33));
}
}	
	
if($total_linhas_importadas==3){		
foreach($linha as $segp){
$bancosegp = 	trim(substr($segp,0,3));
$lotesegp = 	trim(substr($segp,3,4));
$registrosegp = 	trim(substr($segp,7,1));
$numeroregistrosegp = 	trim(substr($segp,8,5));
$segmentosegp = 	trim(substr($segp,13,1));
$cnab1segp = 	trim(substr($segp,14,1));
$codigomovimentosegp = 	trim(substr($segp,15,2));
$agenciacodigosegp = 	trim(substr($segp,17,5));
$agenciadvsegp = 	trim(substr($segp,22,1));
$contanumerosegp = 	trim(substr($segp,23,12));
$contadvsegp = 	trim(substr($segp,35,1));
$agenciacontadvsegp = 	trim(substr($segp,36,1));
$nossonumerosegp = 	intval(trim(substr($segp,37,10)));
$carteirasegp = 	trim(substr($segp,57,1));
$cadastramentosegp = 	trim(substr($segp,58,1));
$documentosegp = 	trim(substr($segp,59,1));
$emissaoboletosegp = 	trim(substr($segp,60,1));
$distribuicaoboletosegp = 	trim(substr($segp,61,1));
$numerodocumentosegp = 	trim(substr($segp,62,15));

//data de vencimento
$datavencimentosegp = 	trim(substr($segp,77,8));
$dia = substr($datavencimentosegp, 0, 2); 
$mes = substr($datavencimentosegp, 2, 2); 
$ano = substr($datavencimentosegp, 4, 4); 
$datavencimentosegp = $dia.'-'.$mes.'-'.$ano;
$datavencimentosegp = date('d-m-Y', strtotime($datavencimentosegp));

//data liminte d epagamento
//$dataLimitePagamento = date("d-m-Y", strtotime($datavencimentosegp."+60 days", time()));

//Valor do Titulo
$valortitulosegp = 	intval(trim(substr($segp,85,13))).".".trim(substr($segp,98,2));

$agenciacobradorasegp = 	trim(substr($segp,100,5));
$dvagenciacobradorasegp = 	trim(substr($segp,105,1));
$especietitulosegp = 	trim(substr($segp,106,2));

// aceitre
$aceitesegp = 	trim(substr($segp,108,1));
switch ($aceitesegp) {
case "A": 
$aceitesegp = 1;
break;
case "N": 
$aceitesegp = 0;
break;
}


// data de emissao
$dataemissaosegp = 	trim(substr($segp,109,8));
$dia = substr($dataemissaosegp, 0, 2); 
$mes = substr($dataemissaosegp, 2, 2); 
$ano = substr($dataemissaosegp, 4, 4); 
$dataemissaosegp = $dia.'-'.$mes.'-'.$ano;

// Juros e Mora
$codigojurosmorasegp = 	trim(substr($segp,117,1));
$datajurosmorasegp = 	trim(substr($segp,118,8));
$dia = substr($datajurosmorasegp, 0, 2); 
$mes = substr($datajurosmorasegp, 2, 2); 
$ano = substr($datajurosmorasegp, 4, 4); 
$datajurosmorasegp = $dia.'-'.$mes.'-'.$ano;
$datajurosmorafieldsegp = $ano.$mes.$dia;
$valorjurosmorasegp = 	intval(trim(substr($segp,126,13))).".".trim(substr($segp,139,2));

//Descont 1
$codigodesconto1segp = 	trim(substr($segp,141,1));
$datadesconto1segp = substr($segp, 142, 8); 
$valordesconto1segp = 	intval(trim(substr($segp,150,13))).".".trim(substr($segp,163,2));
if($valordesconto1segp<>"0.00"){
$dia = substr($datadesconto1segp, 0, 2); 
$mes = substr($datadesconto1segp, 2, 2); 
$ano = substr($datadesconto1segp, 4, 4); 
$datadesconto1segp = $dia.'-'.$mes.'-'.$ano;
$datadesconto1fieldsegp = $ano.$mes.$dia;
}
else
{
$valordesconto1segp = "";
$datadesconto1segp = "";
$datadesconto1fieldsegp = "";
}

// valor iof
$valoriofsegp = 	intval(trim(substr($segp,165,13))).".".trim(substr($segp,178,2));

// valor abatimento
$valorabatimentosegp = 	intval(trim(substr($segp,180,13))).".".trim(substr($segp,193,2));


$identificaotituloempresasegp = 	trim(substr($segp,195,25));
$codigoprotestosegp = 	trim(substr($segp,220,1));
$prazoprotestosegp = 	trim(substr($segp,221,2));
$codigobaixasegp = 	trim(substr($segp,223,1));
$prazobaixasegp = 	trim(substr($segp,224,3));
$codigomoedasegp = 	trim(substr($segp,227,2));
$numerocontratosegp = 	trim(substr($segp,229,10));
$cnab2segp = 	trim(substr($segp,239,1));
}
}
	

if($total_linhas_importadas==4){		
foreach($linha as $segq){

$bancosegq = 	trim(substr($segq,0,3));
$lotesegq = 	trim(substr($segq,3,4));
$registrosegq = 	trim(substr($segq,7,1));
$numeroregistrosegq = 	trim(substr($segq,8,5));
$segmentosegq = 	trim(substr($segq,13,1));
$cnab1segq = 	trim(substr($segq,14,1));
$codigomovimentosegq = 	trim(substr($segq,15,2));

$tipoinscricaosegq = 	trim(substr($segq,17,1));
$numeroinscricaosegq = 	trim(substr($segq,18,15));

switch ($tipoinscricaosegq){
case 1:
$numeroinscricaosegq = substr($numeroinscricaosegq,-11);
break;

case 2:
$numeroinscricaosegq = substr($numeroinscricaosegq,-15);
break;


}

$nomesegq = 	trim(substr($segq,33,40));
$enderecosegq = 	trim(substr($segq,73,40));
$bairrosegq = 	trim(substr($segq,113,15));
$cepsegq = 	trim(substr($segq,128,5));
$sufixocepsegq = 	trim(substr($segq,133,3));
$cidadesegq = 	trim(substr($segq,136,15));
$ufsegq = 	trim(substr($segq,151,2));
$tipoinscricaosacadorsegq = 	trim(substr($segq,153,1));
$numeroinscricaosacadorsegq = 	trim(substr($segq,154,15));
$nomesacadorsegq = 	trim(substr($segq,169,40));
$codigobancocorrespondentesegq = 	trim(substr($segq,209,3));
$nossonumerobancocorrespondentesegq = 	trim(substr($segq,212,20));
$cnab2segq = 	trim(substr($segq,232,8));
}
}
	
if($total_linhas_importadas==5){		
foreach($linha as $segr){

$bancosegr = 	trim(substr($segr,0,3));
$lotesegr = 	trim(substr($segr,3,4));
$registrosegr = 	trim(substr($segr,7,1));
$numeroregistrosegr = 	trim(substr($segr,8,5));
$segmentosegr = 	trim(substr($segr,13,1));
$cnab1segr = 	trim(substr($segr,14,1));
$codigomovimentosegr = 	trim(substr($segr,15,2));


//Descont 2
$codigodesconto2segr = 	trim(substr($segr,17,1));
$datadesconto2segr = substr($segr, 18, 8); 
$valordesconto2segr = 	intval(trim(substr($segr,26,13))).".".trim(substr($segr,39,2));
if($valordesconto2segr<>"0.00"){
$dia = substr($datadesconto2segr, 0, 2); 
$mes = substr($datadesconto2segr, 2, 2); 
$ano = substr($datadesconto2segr, 4, 4); 
$datadesconto2segr = $dia.'-'.$mes.'-'.$ano;
$datadesconto2fieldsegr = $ano.$mes.$dia;
}
else
{
$valordesconto2segr = "";
$datadesconto2segr = "";
$datadesconto2fieldsegr = "";
}


//Descont 3
$codigodesconto3segr = 	trim(substr($segr,41,1));
$datadesconto3segr = substr($segr,42,8); 
$valordesconto3segr = 	intval(trim(substr($segr,50,13))).".".trim(substr($segr,63,2));

if($valordesconto3segr<>"0.00"){
$dia = substr($datadesconto3segr, 0, 2); 
$mes = substr($datadesconto3segr, 2, 2); 
$ano = substr($datadesconto3segr, 4, 4); 
$datadesconto3segr = $dia.'-'.$mes.'-'.$ano;
$datadesconto3fieldsegr = $ano.$mes.$dia;
}
else
{
$valordesconto3segr = "";
$datadesconto3segr = "";
$datadesconto3fieldsegr = "";
}


$codigomultasegr = 	trim(substr($segr,65,1));
$datamultasegr = 	trim(substr($segr,66,8));
$valormultasegr = 	intval(trim(substr($segr,74,13))).".".trim(substr($segp,87,2));
$informacoespagadorsegr = 	trim(substr($segr,89,10));
$informacao3segr = 	trim(substr($segr,99,40));
$informacao4segr = 	trim(substr($segr,139,40));
$cnab2segr = 	trim(substr($segr,179,20));
$codigoocorrenciapagadorsegr = 	trim(substr($segr,199,8));
$codigobancocontadebitosegr = 	trim(substr($segr,207,3));
$codigoagenciadebitosegr = 	trim(substr($segr,210,5));
$dvagenciabeditosegr = 	trim(substr($segr,215,1));
$contadebitosegr = 	trim(substr($segr,216,12));
$dvcontadebitosegr = 	trim(substr($segr,228,1));
$dvagenciacontadebitosegr = 	trim(substr($segr,229,1));
$avisodebitoautomaticosegr = 	trim(substr($segr,230,1));
$cnab3segr = 	trim(substr($segr,231,9));
}
}

if($total_linhas_importadas==6){		
foreach($linha as $segs){
$bancosegs = 	trim(substr($segs,0,3));
$lotesegs = 	trim(substr($segs,3,4));
$registrosegs = 	trim(substr($segs,7,1));
$numeroregistrosegs = 	trim(substr($segs,8,5));
$segmentosegs = 	trim(substr($segs,13,1));
$cnab1segs = 	trim(substr($segs,14,1));
$codigomovimentosegs = 	trim(substr($segs,15,2));
								
$tipoimpressao1ou2segs = 	trim(substr($segs,17,1));
$numerolinhasegs = 	trim(substr($segs,18,2));
$mensagemimpressasegs = 	trim(substr($segs,20,140));
$fonteimpressaosegs = 	trim(substr($segs,160,2));
$cnab2segs = 	trim(substr($segs,162,78));

$tipoimpressao3segs = 	trim(substr($segs,17,1));
$informacao5segs = 	trim(substr($segs,18,40));
$informacao6segs = 	trim(substr($segs,58,40));
$informacao7segs = 	trim(substr($segs,98,40));
$informacao8segs = 	trim(substr($segs,138,40));
$informacao9segs = 	trim(substr($segs,178,40));
$cnab3segs = 	trim(substr($segs,218,22));
}
}
	
if($total_linhas_importadas==7){		
foreach($linha as $traillerlote){
$bancotraillerlote = 	trim(substr($traillerlote,0,3));
$lotetraillerlote = 	trim(substr($traillerlote,3,4));
$registrotraillerlote = 	trim(substr($traillerlote,7,1));
$cnab1traillerlote = 	trim(substr($traillerlote,8,9));
$quantidadelotestraillerlote = 	trim(substr($traillerlote,17,6));
$quantidadetituloscobrancasimplestraillerlote = 	trim(substr($traillerlote,23,6));
$valortotaltituloscarteirasimplestraillerlote = 	trim(substr($traillerlote,29,15)).".".trim(substr($traillerlote,44,2));
$quantidadetituloscobrancavinculadatraillerlote = 	trim(substr($traillerlote,46,6));
$valortotaltituloscarteiravinculadatraillerlote = 	trim(substr($traillerlote,52,15)).".".trim(substr($traillerlote,67,2));
$quantidadetituloscobrancacaucionadatraillerlote = 	trim(substr($traillerlote,69,6));
$valortotaltituloscarteiracaucionadatraillerlote = 	trim(substr($traillerlote,75,15)).".".trim(substr($traillerlote,90,2));
$quantidadetituloscobrancadescontadatraillerlote = 	trim(substr($traillerlote,92,6));
$valortotaltituloscarteiradescontadatraillerlote = 	trim(substr($traillerlote,98,15)).".".trim(substr($traillerlote,113,2));
$numeroavisolancamentotraillerlote = 	trim(substr($traillerlote,115,8));
$cnab2traillerlote = 	trim(substr($traillerlote,123,117));					
}
}
	
if($total_linhas_importadas==8){		
foreach($linha as $traillerarquivo){
$bancotraillerarquivo = 	trim(substr($traillerarquivo,0,3));
$lotetraillerarquivo = 	trim(substr($traillerarquivo,3,4));
$registrotraillerarquivo = 	trim(substr($traillerarquivo,7,1));
$cnab1traillerarquivo = 	trim(substr($traillerarquivo,8,9));
$quantidadelotestraillerarquivo = 	trim(substr($traillerarquivo,17,6));
$quantidaderegistrostraillerarquivo = 	trim(substr($traillerarquivo,23,6));
$quantidadecontastraillerarquivo = 	trim(substr($traillerarquivo,29,6));
$cnab2traillerarquivo = 	trim(substr($traillerarquivo,35,205));				
}
}


}
}
include_once( BOLETO_SICOOB_FACIL_CNAB_DIR .'contents/boleto/pages/boleto-sicoob-form-confirmar.php');
echo "Clique em continuar ou envie o Arquivo novamente.";
echo "<hr>";
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Arquivo</title>
</head>
<body>
    <form action="#" enctype="multipart/form-data" method="post">
	<?php wp_nonce_field( 'nonce_boleto_sicoob_facil_cnab', 'nonce_boleto_sicoob_facil_cnab_confirmar' ); ?>
        <input type="file" name="arquivo" id="arquivo">
       
  <input name="submit" type="submit" value="<?php echo __('Submit', 'boleto-sicoob-facil-cnab'); ?>"/>
</form>
<?php echo __('If you want to generate the ticket by entering the data directly into the form, then download the sample file, import it, and then change the data.', 'boleto-sicoob-facil-cnab');

$example_table = BOLETO_SICOOB_FACIL_CNAB_URL. "/rem/exemplo.txt";

 ?>


<p><a href="<?php echo $example_table; ?>" target="_blank"><?php echo __('Example file', 'boleto-sicoob-facil-cnab'); ?></a></p>

</body>
</html>