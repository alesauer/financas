<?php
include("funcoes.php");
include ("conexao_banco.php");
include("sessao.php");
include("verip.php");
include_once ("database.php");


$usuario_login=$_SESSION['login'];
$IP=qualip();


$DESC_CATEGORIA = $_REQUEST["DESC_CATEGORIA"];
$OBS_CATEGORIA = $_REQUEST["OBS_CATEGORIA"];


$obj= new Database;
$resultado = $obj->connect("INSERT INTO categoria (DESC_CATEGORIA, OBS_CATEGORIA) 
VALUES ('$DESC_CATEGORIA','$OBS_CATEGORIA')");


logs ( $usuario_login , "CRIACAO DE FORMA DE PAGAMENTOS" , "SUCESSO" ,$IP ); 
header("Location:../categorias_despesas.php?situacao_add=1&mensagem=<div class='ls-alert-success'>Sucesso. Registro adicionado.</div>");
exit;
?>