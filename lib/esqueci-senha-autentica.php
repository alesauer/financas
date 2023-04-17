<?php 
ob_start();
session_start();

	include_once ("funcoes.php");
	include_once ("conexao_banco.php");

if(isset($_POST["email"]) && !empty($_POST["email"])){
	$email = addslashes($_POST["email"]);
	$cpf = addslashes($_POST["cpf"]);

	$sql = "SELECT * FROM users WHERE email = '$email' AND cpf = '$cpf'";
	$resultado = conecta($maquina, $usuario, $senha, $banco, $sql);

	if(mysql_num_rows($resultado) > 0){
		$dados = mysql_fetch_assoc($resultado);

			$sql2 = "UPDATE users SET cod_regera = SUBSTRING(md5(RAND()) FROM 1 for 6 ) Where cpf = '$cpf'";
			$resultado2 = conecta($maquina, $usuario, $senha, $banco, $sql2);

			header("Location: ../codigo-enviado.php");

	}else{
		$_SESSION["acesso-negado"] = "<div class='ls-alert-warning'><strong>Acesso Negado:</strong> E-Mail ou CPF Invalidos.</div>";
		header("Location: ../login.php");
	}
}


?>