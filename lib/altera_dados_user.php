<?php
 include ("funcoes.php");
 include ("conexao_banco.php");
 include ("verip.php");
 include ("crypt.php");
 include ("../config.php");
 include("sessao.php");
 include_once("database.php");

 
$IP=qualip();
$cod_usuario=$_SESSION['COD_Usuario'];

$cpf = $_POST['cpf'];
$nome = $_POST['nome'];
$login = $_POST['login'];
$email = $_POST['email'];
$informacoes = $_POST['informacoes'];


 $obj= new Database;
 $resultado = $obj->connect("UPDATE usuario SET cpf='$cpf', nome='$nome', login='$login', email='$email', informacoes='$informacoes' WHERE COD_Usuario='$cod_usuario'");


logs ( $login , "ATUALIZACAO CADASTRO USUARIO" , "SUCESSO" ,$IP );
header("Location:../meusdados.php?situacao_edit=1&mensagem=<div class='ls-alert-success'>Sucesso. Seus dados foram alterados.</div>");
exit;

?>