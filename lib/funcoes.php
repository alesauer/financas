<?php
################ Fun��o para conectar ao banco de dados Local php <=5 ##################
function conecta( $maquina , $usuario, $senha, $banco, $sql )
{
	error_reporting(0);
    $conexao = mysql_connect($maquina,$usuario,$senha) or die("<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'/><title>Erro Banco</title></head><body><h3>001-Erro na conexao</h3></body></html>"); 
	//$charset=mysql_set_charset($conexao,"utf8");
	$db = mysql_select_db($banco,$conexao) or die("<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'/><title>Erro Banco</title></head><body><h3>002-Erro na selecao do banco</body></html>");
	$resultado = mysql_query($sql,$conexao) or die("<!DOCTYPE html><html lang='pt-br'><head><meta charset='utf-8'/><title>Erro Banco</title></head><body><h3>001-Erro na query</body></html>");
	mysql_close($conexao);
	return $resultado;
}


############################### Data e Hora ##################################


function soadm()
{

if($perfil <> "1")
{
 header("Location:principal.php");
 logs ( $perfil , "ACESSO AREA ADM" , "ERRO" ,$IP ); 
 exit;
}

}

function arrumadata($str)
{
	list($ano,$mes,$dia) = explode("-",$str);
	return "$dia-$mes-$ano";
}

## Arruma data do formato do phpMyAdmin de d/m/Y para Y/m/d
function converte_data($DATA)
{
	$divide = explode("/",$DATA);
	$dia = $divide[0];
	$mes = $divide[1];
	$ano = $divide[2];
	$data_nova = "$ano-$mes-$dia";
	return $data_nova;
}

function converteString($string) {

    // matriz de entrada
    $what = array( '�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�','�',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','�','�' );

    // matriz de sa�da
    $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_' );

    // devolver a string
    return str_replace($what, $by, $string);


 /*
	$pessoa = 'Jo�o dos Santos Videira';

$pastaPessoal = sanitizeString($pessoa);

// resultado
echo $pastaPessoal; // Joao_dos_Santos_Videira

*/

}


function logs ( $COD_USUARIOS_SISTEMA , $TIPO_LOGS , $ACAO ,$IP )
{
include_once ("database.php");
date_default_timezone_set('America/Sao_Paulo');
$hora=date("Y-m-d H:i:s");
$data=date("Y-m-d");
$obj= new Database;
$resultado = $obj->connect("insert into logs(COD_USUARIOS_SISTEMA,DATA_LOGS,HORA_LOGS,TIPO_LOGS,ACAO,IP_LOGS) VALUES ('$COD_USUARIOS_SISTEMA','$data','$hora','$TIPO_LOGS','$ACAO','$IP')");
}






?>






