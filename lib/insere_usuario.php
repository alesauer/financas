<?php
include("funcoes.php");
include ("conexao_banco.php");
include("sessao.php");
include("verip.php");
include_once ("database.php");


$usuario_login=$_SESSION['login'];
$IP=qualip();


$login = $_REQUEST["login"];
$cpf = $_REQUEST["cpf"];
$nome = $_REQUEST["nome"];
$EmailUsuario = $_REQUEST["EmailUsuario"];
$SenhaUsuario = md5($_REQUEST["SenhaUsuario"]);
$perfil = $_REQUEST["perfil"];



$obj= new Database;
$resultado = $obj->connect("select * from usuario where login = '$login'");



if(mysqli_num_rows($resultado) > 0)
{
logs ( $usuario_login , "CRIACAO DE USUARIO" , "ERRO:Login Existe" ,$IP ); 
header("Location:../usuario.php?situacao_add=1&mensagem=<div class='ls-alert-danger'>Ops. Login já existe.</div>");
exit;
}

$resultado = $obj->connect("select * from usuario where cpf='$cpf'");
if(mysqli_num_rows($resultado) > 0)
{
logs ( $usuario_login , "CRIACAO DE USUARIO" , "ERRO:CPF Existe" ,$IP ); 
header("Location:../usuario.php?situacao_add=1&mensagem=<div class='ls-alert-danger'>Ops. CPF já existe.</div>");
exit;
}


$resultado = $obj->connect("select * from usuario where email='$EmailUsuario'");
if(mysqli_num_rows($resultado) > 0)
{
logs ( $usuario_login , "CRIACAO DE USUARIO" , "ERRO:Email Existe" ,$IP ); 
header("Location:../usuario.php?situacao_add=1&mensagem=<div class='ls-alert-danger'>Ops. Email já existe.</div>");
exit;
}

if ($perfil=="Administrador"){
	$perfil="1";
}else{$perfil="2";
}


$resultado = $obj->connect("INSERT INTO usuario (cpf, nome, login, senha, email, perfil) VALUES ('$cpf', '$nome', '$login', '$SenhaUsuario', '$EmailUsuario', '$perfil')");

logs ( $usuario_login , "CRIACAO DE USUARIO" , "SUCESSO" ,$IP ); 
header("Location:../usuario.php?situacao_add=1&mensagem=<div class='ls-alert-success'>Sucesso. Registro adicionado.</div>");
exit;
?>