<?php 
ob_start();
session_start();

	include_once ("funcoes.php");
	include_once ("conexao_banco.php");

if(isset($_POST["codigo"]) && !empty($_POST["codigo"])){
	$codigo = addslashes($_POST["codigo"]);
	$novaSenha = md5(addslashes($_POST["novaSenha"]));

	$sql = "SELECT * FROM users WHERE cod_regera = '$codigo'";
	$resultado = conecta($maquina, $usuario, $senha, $banco, $sql);

	if(mysql_num_rows($resultado) > 0){
		$dados = mysql_fetch_assoc($resultado);

			$sql2 = "UPDATE users SET pass = '$novaSenha' Where cod_regera = '$codigo'";
			$resultado2 = conecta($maquina, $usuario, $senha, $banco, $sql2);

			header("Location: ../login.php");

	}else{
		$_SESSION["acesso-negado"] = "<div class='ls-alert-warning'><strong>Acesso Negado:</strong> E-Mail ou CPF Invalidos.</div>";
		header("Location: ../login.php");
	}
}


?>