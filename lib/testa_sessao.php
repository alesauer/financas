<?php
include ("funcoes.php");
include ("conexao_banco.php");
include ("logs.php");
include ("verip.php");
include ("crypt.php");
include ("sessao.php");



$IP=qualip();

logs ( $COD_USUARIOS_SISTEMA , $TIPO_LOGS , $ACAO ,$IP );

$nome = $_SESSION["nome"];
$idUsuario = $_SESSION["idUsuario"];
$login = $_SESSION["login"];
$idPerfil = $_SESSION["SeqPerfilUsuario"];
$senha = $_SESSION["senha"];
$cpf = $_SESSION["cpf"];
$email = $_SESSION["email"];

echo "$nome<br>";
echo "$idUsuario<br>";
echo "$login<br>";
echo "$idPerfil<br>";
echo "$senha<br>";
echo "$cpf<br>";
echo "$email<br>";
		 

?>		 