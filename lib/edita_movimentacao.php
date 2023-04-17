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
	$VALOR = $_REQUEST["VALOR"];  
	$VALOR = trim(str_replace("R$","", $VALOR));
	$VALOR = trim(str_replace(",",".", $VALOR));
	$CATEGORIA = $_REQUEST["CATEGORIA"];
	$DATA_PAGAMENTO = $_REQUEST["DATA_PAGAMENTO"];
	$DATA_VENCIMENTO = $_REQUEST["DATA_VENCIMENTO"];
	$SITUACAO = $_REQUEST["SITUACAO"];
	$FORMA_PAGAMENTO = $_REQUEST["FORMA_PAGAMENTO"];
	$CONTA = $_REQUEST["CONTA"];
	
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
	$VALOR = $_REQUEST["VALOR"];
	$VALOR = trim(str_replace("R$","", $VALOR));
	$VALOR = trim(str_replace(",",".", $VALOR));
	$CATEGORIA = $_REQUEST["CATEGORIA"];
	$DATA_PAGAMENTO = $_REQUEST["DATA_PAGAMENTO"];
	$FORMA_PAGAMENTO = $_REQUEST["FORMA_PAGAMENTO"];
	$CONTA = $_REQUEST["CONTA"];
	$PARCELADO = "0";
	$SITUACAO = $_REQUEST["SITUACAO"];

	$obj= new Database;
	$resultado = $obj->connect("UPDATE movimentacoes SET DESCRICAO='$DESCRICAO', VALOR='$VALOR', CATEGORIA='$CATEGORIA', DATA_PAGAMENTO='$DATA_PAGAMENTO', CONTA='$CONTA',SITUACAO='$SITUACAO',FORMA_PAGAMENTO='$FORMA_PAGAMENTO' WHERE  `idFINANCAS`=$idFINANCAS;");	

	logs ( $usuario_login , "EDICAO RECEITA" , "SUCESSO" ,$IP ); 
	header("Location:../tabelamovimentacoes.php?mesFiltro=$mesNum");
	exit;
}//end

?>

