<?php
include("funcoes.php");
include ("conexao_banco.php");
include("sessao.php");
include("verip.php");
include_once ("database.php");


$usuario_login=$_SESSION['login'];
$IP=qualip();


$FORMA_PAGAMENTO = $_REQUEST["FORMA_PAGAMENTO"];
$DESC_FORMA_PAGAMENTO = $_REQUEST["DESC_FORMA_PAGAMENTO"];
$TIPO = $_REQUEST["TIPO"];

if($TIPO=="Crédito"){
	$TIPO="CC";
}else if($TIPO=="Débito"){
	$TIPO="D";
}else{
	$TIPO="PIX";
}


$DIA_FECHAMENTO_FATURA_CC = $_REQUEST["DIA_FECHAMENTO_FATURA_CC"];
$DIA_VENCIMENTO_CC = $_REQUEST["DIA_VENCIMENTO_CC"];


$obj= new Database;
$resultado = $obj->connect("INSERT INTO forma_pagamento (FORMA_PAGAMENTO, DESC_FORMA_PAGAMENTO, TIPO, DIA_FECHAMENTO_FATURA_CC, DIA_VENCIMENTO_CC) 
VALUES ('$FORMA_PAGAMENTO', '$DESC_FORMA_PAGAMENTO', '$TIPO', '$DIA_FECHAMENTO_FATURA_CC', '$DIA_VENCIMENTO_CC')");


logs ( $usuario_login , "CRIACAO DE FORMA DE PAGAMENTOS" , "SUCESSO" ,$IP ); 
header("Location:../forma_pagamentos.php?situacao_add=1&mensagem=<div class='ls-alert-success'>Sucesso. Registro adicionado.</div>");
exit;
?>