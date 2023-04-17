<?php
 include ("funcoes.php");
 include ("conexao_banco.php");
 include ("verip.php");
 include ("crypt.php");
 include ("../config.php");
 include("sessao.php");
 include_once("database.php");


$login_user= $_SESSION['login'];
$COD_Usuario= $_SESSION['COD_Usuario'];

$senhaatual = md5($_POST["senhaatual"]);
$nova_senha = md5($_POST["nova_senha"]);
$repetir_novasenha = md5($_POST["repetir_novasenha"]);
 $IP=qualip();

if ($nova_senha != $repetir_novasenha){
	header("Location:../meusdados.php?situacao=1&mensagem=<div class='ls-alert-danger'>Ops. As senhas novas digitadas não batem.</div>");
    logs ( $login_user , "TROCA DE SENHA" , "ERRO:Senhas nao batem" ,$IP );
	exit;
}else{

	$obj= new Database;
	$resultado = $obj->connect("select * from usuario where login='$login_user' and senha='$senhaatual'");	
 
 if(mysqli_num_rows($resultado) > 0){
  	
  	while($linha=mysqli_fetch_array($resultado))
	    {
			$senha_banco=trim($linha["senha"]);
		}//end while

		if($senha_banco == $senhaatual)
		{
		$resultado = $obj->connect("UPDATE usuario SET senha='$nova_senha' WHERE COD_Usuario='$COD_Usuario'");		
		header("Location:../principal.php?login=$login");
        logs ( $login_user , "TROCA DE SENHA" , "SUCESSO" ,$IP );
        header("Location:../meusdados.php?situacao=1&mensagem=<div class='ls-alert-success'>Sucesso. Senhas alteradas.</div>");
	    exit;
		}

 }else{
 	echo "Usuario e senha nao localizados no banco";
 	logs ( $login_user , "TROCA DE SENHA" , "ERRO:Senha atual digitada errada" ,$IP );
 	header("Location:../meusdados.php?situacao=1&mensagem=<div class='ls-alert-danger'>Ops. Senha atual digitada errada.</div>");
 	exit;
 }//end if num_rows



}//end else



exit;
?>