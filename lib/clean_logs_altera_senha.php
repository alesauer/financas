<?php
include("funcoes.php");
include ("conexao_banco.php");
include ("sessao.php");
	
$usuario_login = $_GET["user_loged"];

$sql = "delete from logs_2 where TIPO_LOGS='TROCA DE SENHA'";
$resultado=conecta($maquina,$usuario,$senha,$banco,$sql);
logs ( $usuario_login , "LIMPA LOG USER" , "SUCESSO" ,$IP ); 
header("Location:../logs_altera_senha.php");
exit;

?>