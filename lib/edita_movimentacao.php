<?php

include("funcoes.php");
include ("conexao_banco.php");
include("sessao.php");
include("verip.php");
include_once ("database.php");



$usuario_login=$_SESSION['login'];
$IP=qualip();

$timestamp = strtotime(date("d/m/Y")); // Para identificar registro de contas com parcela.

$idFINANCAS = $_REQUEST["idFINANCAS"];

$TIPO = $_REQUEST["TIPO"];



if($TIPO == "Despesas")
{

$DESCRICAO = $_REQUEST["DESCRICAO"];
$VALOR = $_REQUEST["VALOR"];   $VALOR = str_replace(",",".", $VALOR); 
$CATEGORIA = $_REQUEST["CATEGORIA"];
$DATA_PAGAMENTO = $_REQUEST["DATA_PAGAMENTO"];
//$aux = explode("/", $DATA_PAGAMENTO);
//$dia = $aux[0]; $mes = $aux[1]; $ano = $aux[2];
//$DATA_PAGAMENTO_FORMATADA = $ano."-".$mes."-".$dia;
//$DATA_PAGAMENTO  = $DATA_PAGAMENTO_FORMATADA;

$DATA_VENCIMENTO = $_REQUEST["DATA_VENCIMENTO"];
//$aux1 = explode("/", $DATA_VENCIMENTO);
//$dia1 = $aux1[0]; $mes1 = $aux1[1]; $ano1 = $aux1[2];
//$DATA_VENCIMENTO_FORMATADA = $ano1."-".$mes1."-".$dia1;
//$DATA_VENCIMENTO = $DATA_VENCIMENTO_FORMATADA;
$SITUACAO = $_REQUEST["SITUACAO"];
$FORMA_PAGAMENTO = $_REQUEST["FORMA_PAGAMENTO"];
$CONTA = $_REQUEST["CONTA"];

/*
$PARCELA = $_REQUEST["PARCELA"];
if($PARCELA >1) { $PARCELADO = md5($timestamp); } else{$PARCELADO = md5($timestamp);}
$SITUACAO = $_REQUEST["SITUACAO"];
*/

$obj= new Database;
$resultado = $obj->connect("UPDATE movimentacoes SET DESCRICAO='$DESCRICAO', VALOR='$VALOR', CATEGORIA='$CATEGORIA', DATA_PAGAMENTO='$DATA_PAGAMENTO', CONTA='$CONTA', DATA_VENCIMENTO='$DATA_VENCIMENTO', FORMA_PAGAMENTO='$FORMA_PAGAMENTO',SITUACAO='$SITUACAO' WHERE  `idFINANCAS`=$idFINANCAS;");


logs ( $usuario_login , "EDITA MOVIMENTACAO" , "SUCESSO" ,$IP ); 
$mesNum = date("m");

header("Location:../tabelamovimentacoes.php?mesFiltro=$mesNum");
exit;
}
else if($TIPO == "Receitas")
{
	$DESCRICAO = $_REQUEST["DESCRICAO"];
	$VALOR = $_REQUEST["VALOR"];   $VALOR = str_replace(",",".", $VALOR);
	$CATEGORIA = $_REQUEST["CATEGORIA"];
	$DATA_PAGAMENTO = $_REQUEST["DATA_PAGAMENTO"];
	
//	$aux = explode("/", $DATA_PAGAMENTO);
//	$dia = $aux[0]; $mes = $aux[1]; $ano = $aux[2];
//	$DATA_PAGAMENTO_FORMATADA = $ano."-".$mes."-".$dia;
//	$DATA_PAGAMENTO  = $DATA_PAGAMENTO_FORMATADA;
	
	$FORMA_PAGAMENTO = $_REQUEST["FORMA_PAGAMENTO"];
	$CONTA = $_REQUEST["CONTA"];
	$PARCELADO = "0";
	$SITUACAO = $_REQUEST["SITUACAO"];
	$PARCELA = $_REQUEST["PARCELA"];



$obj= new Database;
$resultado = $obj->connect("UPDATE movimentacoes SET DESCRICAO='$DESCRICAO', VALOR='$VALOR', CATEGORIA='$CATEGORIA', DATA_PAGAMENTO='$DATA_PAGAMENTO', CONTA='$CONTA',SITUACAO='$SITUACAO' WHERE  `idFINANCAS`=$idFINANCAS;");	


	
	logs ( $usuario_login , "EDICAO RECEITA" , "SUCESSO" ,$IP ); 
	header("Location:../novamovimentacao.php?situacao_add=1&mensagem=<div class='ls-alert-success'>Sucesso. Registro adicionado.</div>");
	exit;
}//end

?>

































}






?>