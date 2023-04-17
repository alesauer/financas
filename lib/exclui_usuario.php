<?php
include_once ("sessao.php");
include_once ("verip.php");
include_once ("funcoes.php");
include_once ("database.php");



$IP=qualip();
$CodUser = $_REQUEST["CodUser"];
$login_user = $_REQUEST["login_user"];
//echo "<br> $CodUser - $login_user"; exit;

$obj= new Database;
$resultado = $obj->connect("DELETE FROM usuario WHERE  COD_Usuario='$CodUser'");

logs ( $login_user , "EXCLUSAO DE USUARIO" , "SUCESSO" ,$IP ); 
header("Location:../usuario.php?situacao_exclui=1&mensagem=<div class='ls-alert-success'>Sucesso. Registro removido.</div>");
exit;


?>