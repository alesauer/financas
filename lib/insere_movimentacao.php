<?php
include("funcoes.php");
include ("conexao_banco.php");
include("sessao.php");
include("verip.php");
include_once ("database.php");


$usuario_login=$_SESSION['login'];
$IP=qualip();

$timestamp = strtotime("now"); // Para identificar registro de contas com parcela.



$TIPO = $_REQUEST["TIPO"];

if($TIPO == "Despesas")
{

/*
$obj_datas = new Datas;
$dia=$obj_datas->get_dia();
$mes=$obj_datas->get_mes();
$ano=$obj_datas->get_ano();
*/

$DESCRICAO = $_REQUEST["DESCRICAO"];
$VALOR = $_REQUEST["VALOR"];   $VALOR = str_replace(",",".", $VALOR);
$CATEGORIA = $_REQUEST["CATEGORIA"];


$DATA_VENCIMENTO = $_REQUEST["DATA_VENCIMENTO"];
$aux1 = explode("/", $DATA_VENCIMENTO);
$dia1 = $aux1[0]; $mes1 = $aux1[1]; $ano1 = $aux1[2];
$dia = $aux1[0]; $mes = $aux1[1]; $ano = $aux1[2];

$DATA_VENCIMENTO_FORMATADA = $ano1."-".$mes1."-".$dia1;
$DATA_VENCIMENTO = $DATA_VENCIMENTO_FORMATADA;


$FORMA_PAGAMENTO = $_REQUEST["FORMA_PAGAMENTO"];
//PEGA O TIPO (CC, DEBITO,OUTROS) DA FORMA DE PAGAMENTO. CASO SEJA CC, COLOCAMOS TRUE NA TABELA MOVIMENTAÇÃO
$obj_f = new Financeiro;
$TIPO_FORMA_PAGAMENTO = $obj_f->get_tipo_forma_pagamentos($FORMA_PAGAMENTO);

//echo $TIPO_FORMA_PAGAMENTO; exit;


if($TIPO_FORMA_PAGAMENTO == 'CC')
{
	 $USOU_CC=1;
}else{
	$USOU_CC=0;
}

$CONTA = $_REQUEST["CONTA"];
$PARCELA = $_REQUEST["PARCELA"];
if($PARCELA >1) { $PARCELADO = md5($timestamp); } else{$PARCELADO = 0;}

$SITUACAO = $_REQUEST["SITUACAO"];
$obj= new Database;




for($i=1; $i<=$PARCELA;$i++)
{

	if($i>=2)
		{ 
			if($mes == "12") { 
				$mes = "01";
				$ano++;
				$mes1 = "01";
				$ano1++;

			}else 
			{
			 $mes++;
			 $mes1++;
			}
			$DATA_PAGAMENTO_FORMATADA = $ano."-".$mes."-".$dia;
			$DATA_PAGAMENTO  = $DATA_PAGAMENTO_FORMATADA;

			$DATA_VENCIMENTO_FORMATADA = $ano."-".$mes."-".$dia1;
			$DATA_VENCIMENTO = $DATA_VENCIMENTO_FORMATADA;
		}


	$resultado = $obj->connect("INSERT INTO movimentacoes (TIPO, DESCRICAO, VALOR, CATEGORIA, DATA_VENCIMENTO, FORMA_PAGAMENTO,CONTA, PARCELA, PARCELADO, SITUACAO,USOU_CC)
	VALUES ('$TIPO', '$DESCRICAO ($i/$PARCELA)', '$VALOR', '$CATEGORIA', '$DATA_VENCIMENTO', '$FORMA_PAGAMENTO','$CONTA', '$PARCELA', '$PARCELADO', '$SITUACAO','$USOU_CC')");
}
logs ( $usuario_login , "NOVA MOVIMENTACAO" , "SUCESSO" ,$IP ); 
//header("Location:../novamovimentacao.php?situacao_add=1&mensagem=<div class='ls-alert-success'>Sucesso. Registro adicionado.</div>");
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
	$aux = explode("/", $DATA_PAGAMENTO);
	$dia = $aux[0]; $mes = $aux[1]; $ano = $aux[2];
	$DATA_PAGAMENTO_FORMATADA = $ano."-".$mes."-".$dia;
	$DATA_PAGAMENTO  = $DATA_PAGAMENTO_FORMATADA;
	$DATA_VENCIMENTO = $DATA_PAGAMENTO;
	$FORMA_PAGAMENTO = $_REQUEST["FORMA_PAGAMENTO"];
	$CONTA = $_REQUEST["CONTA"];
	$PARCELADO = "0";
	$SITUACAO = $_REQUEST["SITUACAO"];

	
	if($SITUACAO == "PENDENTE"){
		$DATA_PAGAMENTO="1999-01-01";
	}
	


	$PARCELA = $_REQUEST["PARCELA"];
	if($PARCELA >1) { $PARCELADO = md5($timestamp); } else{$PARCELADO = 0;}


	$obj= new Database;
	
for($i=1; $i<=$PARCELA;$i++)
{

	if($i>=2)
	{ 
		if($mes == "12") { 
			$mes = "01";
			$ano++;
			$mes1 = "01";
			$ano1++;

		}else 
		{
		 $mes++;
		 $mes1++;
		}
		$DATA_PAGAMENTO_FORMATADA = $ano."-".$mes."-".$dia;
		$DATA_PAGAMENTO  = $DATA_PAGAMENTO_FORMATADA;
		$DATA_VENCIMENTO = $DATA_PAGAMENTO;
	}
	
	$resultado = $obj->connect("INSERT INTO movimentacoes (TIPO, DESCRICAO, VALOR, CATEGORIA, DATA_PAGAMENTO,DATA_VENCIMENTO, FORMA_PAGAMENTO,CONTA, PARCELA, PARCELADO, SITUACAO)
	VALUES ('$TIPO', '$DESCRICAO ($i/$PARCELA)', '$VALOR', '$CATEGORIA', '$DATA_PAGAMENTO','$DATA_VENCIMENTO', '$FORMA_PAGAMENTO','$CONTA', '$PARCELA', '$PARCELADO', '$SITUACAO')");
}//end for
	
	logs ( $usuario_login , "NOVA MOVIMENTACAO RECEITA" , "SUCESSO" ,$IP ); 
	//header("Location:../novamovimentacao.php?situacao_add=1&mensagem=<div class='ls-alert-success'>Sucesso. Registro adicionado.</div>");
	$mesNum = date("m");
	header("Location:../tabelamovimentacoes.php?mesFiltro=$mesNum");
	exit;
}


?>