<?php
include_once ("sessao.php");
include_once ("verip.php");
include_once ("funcoes.php");
include_once ("database.php");



$IP=qualip();
$id = $_REQUEST["id"];

$obj= new Database;
$resultado = $obj->connect("DELETE FROM categoria WHERE  id='$id'");

logs ( $login_user , "EXCLUSAO DE Categorias de Receitas" , "SUCESSO" ,$IP ); 
header("Location:../categorias_despesas.php?situacao_exclui=1&mensagem=<div class='ls-alert-success'>Sucesso. Registro removido.</div>");
exit;


?>