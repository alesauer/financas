<?php
 include ("funcoes.php");
 include ("conexao_banco.php");
 include ("verip.php");
 include ("crypt.php");
 include ("../config.php");
 include("sessao.php");
 

$IP=qualip();
$cod_usuario=$_REQUEST['COD_Usuario'];

$cpf = $_REQUEST['cpf'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$email = $_POST['email'];
$informacoes = $_POST['informacoes'];




$sql="UPDATE usuario SET cpf='$cpf', nome='$nome', login='$login', email='$email', informacoes='$informacoes' WHERE COD_Usuario='$cod_usuario'";
$resultado=conecta($maquina,$usuario,$senha,$banco,$sql);

logs ( $login , "ATUALIZACAO CADASTRO" , "SUCESSO" ,$IP );
header("Location:../edita_usuario.php?CodUser=$cod_usuario&situacao_edit=1&mensagem=<div class='ls-alert-success'>Sucesso. Seus dados foram alterados.</div>");
exit;

?>