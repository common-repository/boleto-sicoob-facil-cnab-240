<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
   function BpscValidCpf($cpf){
  // determina um valor inicial para o digito $d1 e $d2
  // pra manter o respeito ;)
	$d1 = 0;
	$d2 = 0;
  // remove tudo que não seja número
  $cpf = preg_replace("/[^0-9]/", "", $cpf);
  // lista de cpf inválidos que serão ignorados
  $ignore_list = array(
    '00000000000',
    '01234567890',
    '11111111111',
    '22222222222',
    '33333333333',
    '44444444444',
    '44444444555',
    '66666666666',
    '77777777777',
    '88888888888',
    '99999999999'
  );
  // se o tamanho da string for dirente de 11 ou estiver
  // na lista de cpf ignorados já retorna false
  if(strlen($cpf) != 11 || in_array($cpf, $ignore_list)){
      return false;
  } else {
    // inicia o processo para achar o primeiro
    // número verificador usando os primeiros 9 dígitos
    for($i = 0; $i < 9; $i++){
      // inicialmente $d1 vale zero e é somando.
      // O loop passa por todos os 9 dígitos iniciais
      $d1 += $cpf[$i] * (10 - $i);
    }
    // acha o resto da divisão da soma acima por 11
    $r1 = $d1 % 11;
    // se $r1 maior que 1 retorna 11 menos $r1 se não
    // retona o valor zero para $d1
    $d1 = ($r1 > 1) ? (11 - $r1) : 0;
    // inicia o processo para achar o segundo
    // número verificador usando os primeiros 9 dígitos
    for($i = 0; $i < 9; $i++) {
      // inicialmente $d2 vale zero e é somando.
      // O loop passa por todos os 9 dígitos iniciais
      $d2 += $cpf[$i] * (11 - $i);
    }
    // $r2 será o resto da soma do cpf mais $d1 vezes 2
    // dividido por 11
    $r2 = ($d2 + ($d1 * 2)) % 11;
    // se $r2 mair que 1 retorna 11 menos $r2 se não
    // retorna o valor zeroa para $d2
    $d2 = ($r2 > 1) ? (11 - $r2) : 0;
    // retona true se os dois últimos dígitos do cpf
    // forem igual a concatenação de $d1 e $d2 e se não
    // deve retornar false.
    return (substr($cpf, -2) == $d1 . $d2) ? true : false;
 }
}

/////////////////

function BpscValidCnpj($cnpj){
            // Deixa o CNPJ com apenas números
            $cnpj = preg_replace('/[^0-9]/', '', $cnpj);
            // Garante que o CNPJ é uma string
           $cnpj = (string) $cnpj;
            // O valor original
           $cnpj_original = $cnpj;
            // Captura os primeiros 12 números do CNPJ
            $primeiros_numeros_cnpj = substr($cnpj, 0, 12);
            /**
             * Multiplicação do CNPJ
             *
             * @param string $cnpj Os digitos do CNPJ
             * @param int $posicoes A posição que vai iniciar a regressão
             * @return int O
             *
             */
            if (!function_exists('multiplica_cnpj')) {

                function multiplica_cnpj($cnpj, $posicao = 5) {
                    // Variável para o cálculo
                    $calculo = 0;

                    // Laço para percorrer os item do cnpj
                    for ($i = 0; $i < strlen($cnpj); $i++) {
                        // Cálculo mais posição do CNPJ * a posição
                        $calculo = $calculo + ( $cnpj[$i] * $posicao );

                        // Decrementa a posição a cada volta do laço
                        $posicao--;

                        // Se a posição for menor que 2, ela se torna 9
                        if ($posicao < 2) {
                            $posicao = 9;
                        }
                    }
                    // Retorna o cálculo
                    return $calculo;
                }

            }

            // Faz o primeiro cálculo
            $primeiro_calculo = multiplica_cnpj($primeiros_numeros_cnpj);

            // Se o resto da divisão entre o primeiro cálculo e 11 for menor que 2, o primeiro
            // Dígito é zero (0), caso contrário é 11 - o resto da divisão entre o cálculo e 11
            $primeiro_digito = ( $primeiro_calculo % 11 ) < 2 ? 0 : 11 - ( $primeiro_calculo % 11 );

            // Concatena o primeiro dígito nos 12 primeiros números do CNPJ
            // Agora temos 13 números aqui
            $primeiros_numeros_cnpj .= $primeiro_digito;

            // O segundo cálculo é a mesma coisa do primeiro, porém, começa na posição 6
            $segundo_calculo = multiplica_cnpj($primeiros_numeros_cnpj, 6);
            $segundo_digito = ( $segundo_calculo % 11 ) < 2 ? 0 : 11 - ( $segundo_calculo % 11 );

            // Concatena o segundo dígito ao CNPJ
            $cnpj = $primeiros_numeros_cnpj . $segundo_digito;

            // Verifica se o CNPJ gerado é idêntico ao enviado
            if ($cnpj === $cnpj_original) {
                return true;
				
            }
        }



function BpscValidNome($nomeSacado){

	$nomeSacado = strtoupper($nomeSacado);
	
	if(strlen($nomeSacado) < 10 OR strlen($nomeSacado) > 50 ){

	echo __('Please enter the Name! 10 to 50 alphabetic characters.', 'boleto-sicoob-facil-cnab').'</a>';

	echo '<a href="javascript:history.back()">'.__('Back and correct Name', 'boleto-sicoob-facil-cnab').'</a>';

	exit;

	}

}



function BpscValidEmail($email){
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo '<a href="javascript:history.back()">'.__('Back and correct Email', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}



	if(strlen($email) < 10 OR strlen($email) > 60 ){
	echo '<a href="javascript:history.back()">'.__('Back and correct Email', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}


}





function BpscValidTelefone($telefone){

	$telefone = str_replace(" ", "", $telefone);

	if(strlen($telefone) < 8 ){

	echo '<a href="javascript:history.back()">'.__('Back and correct Phone Number - Example 999990000', 'boleto-sicoob-facil-cnab').'</a>';

	exit;

	}

}



function BpscValidDdd($ddd){
	$ddd = str_replace(" ", "", $ddd);
	if(strlen($ddd) <> 2 ){
	echo '<a href="javascript:history.back()">'.__('Back and correct DDD - Example 11', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}
}



function BpscValidLogradouro($logradouro){
	if(strlen($logradouro) < 4 OR strlen($logradouro) > 120 ){
	echo '<a href="javascript:history.back()">'.__('Back and correct Adress. Minimum 10 and Maximum 140 char.', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}

$logradouro = ucwords($logradouro);
$logradouro = substr($logradouro, 0, 120);
}





function BpscValidNumero($numero){
	if(strlen($numero) < 1 OR strlen($numero) > 20 ){
	echo '<a href="javascript:history.back()">'.__('Back and correct Adress Number. Minimum 1 and Maximum 20 char.', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}
$numero = ucwords($numero);
$numero = substr($numero, 0, 20);
}


function BpscValidComplemento($complemento){
	if(strlen($complemento) > 20 ){
	echo '<a href="javascript:history.back()">'.__('Back and correct Adress Complement. Maximum 20 char.', 'boleto-sicoob-facil-cnab').'</a>';

	exit;

	}

$complemento = ucwords($complemento);

$complemento = substr($complemento, 0, 20);

}





function BpscValidBairro($bairro){

	if(strlen($bairro) < 5 OR strlen($bairro) > 60 ){

	echo '<a href="javascript:history.back()">'.__('Back and correct Neighborhood! 5 to 60 alphanumeric characters..', 'boleto-sicoob-facil-cnab').'</a>';

	exit;

	}

$bairro = ucwords($bairro);

$bairro = substr($bairro, 0, 60);

}





function BpscValidCep($cep){

	$cep = str_replace(" ", "",$cep);

	$cep = str_replace("-", "",$cep);

}





function BpscValidCidade($cidade){

$cidade = ucwords($cidade);

$cidade = substr($cidade, 0, 60);

}





function BpscValidUf($uf){

$uf = str_replace(" ", "",$uf);

$uf = strtoupper($uf);

$uf = substr($uf, 0, 2);

}



function BpscValid_Cpf($cpf){
	if(BpscValidCpf($cpf)<>'1'){
	echo '<a href="javascript:history.back()">'.__('Back and correct the CPF', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}

	if($cpf == "12345678909"){
	echo '<a href="javascript:history.back()">'.__('Back and correct the CPF', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}
}



function BpscValid_Cnpj($cnpj){

	if(BpscValidCnpj($cnpj)<>'1'){
	echo '<a href="javascript:history.back()">'.__('Back and correct the CNPJ', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}

	if($cpf == "12345678909"){
	echo '<a href="javascript:history.back()">'.__('Back and correct the CNPJ', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}
}



function BpscValidValor($valor){
	if($valor < 11){
	echo '<a href="javascript:history.back()">'.__('Back and correct the value. Minimum value 11,00', 'boleto-sicoob-facil-cnab').'</a>';
	exit;
	}
}	




function BpscValidVencimento($vencimento){
$amanha = date('Y-m-d', strtotime("+1 day")); //  + 1 day
$vencimento = date('Y-m-d', strtotime($vencimento));
if( $vencimento < $amanha) { 
	echo '<a href="javascript:history.back()">'.__('Back and correct due date (dd-mm-yyyy). The due date should be from tomorrow. The due date is shorter than tomorrow!', 'boleto-sicoob-facil-cnab').'<br></a>';
	exit;
}
}

	

function BpscValidSoma($value1,$value2,$value3,$value4){

  if($value3<>$value4){

	echo '<a href="javascript:history.back()">'.__('The sum was wrong! Please go back and try again.', 'boleto-sicoob-facil-cnab').'</a><br>';

	echo $value1 .' + '. $value2 .' = ' .$value3 .'???';

	exit;

}	

	

}	




?>