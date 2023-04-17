<?php
include("funcoes.php");
include ("conexao_banco.php");
include("sessao.php");
include_once("database.php");
include_once("verip.php");

$IP =  qualip();

$usuario_login = $_GET["user_loged"];

$obj= new Database;
$resultado = $obj->connect("delete from logs");

logs ( $usuario_login , "LIMPA LOG" , "SUCESSO" ,$IP ); 
header("Location:../logs_usuario.php");
exit;

?>