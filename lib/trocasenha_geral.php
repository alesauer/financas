<?php
 include ("funcoes.php");
 include ("conexao_banco.php");
 include ("verip.php");
 include ("crypt.php");
 include ("../config.php");
 include("sessao.php");
 


$login_user= $_REQUEST['login'];
$CodUser= $_REQUEST['CodUser'];

$senhaatual = md5($_POST["senhaatual"]);
$nova_senha = md5($_POST["nova_senha"]);
$repetir_novasenha = md5($_POST["repetir_novasenha"]);
 $IP=qualip();

if ($nova_senha != $repetir_novasenha){
	header("Location:../edita_usuario.php?CodUser=$CodUser&situacao=1&mensagem=<div class='ls-alert-danger'>Ops. As senhas novas digitadas não batem.</div>");
    logs ( $login_user , "TROCA DE SENHA" , "ERRO:Senhas nao batem" ,$IP );
	exit;
}else{
 $sql="select * from usuario where login='$login_user' and senha='$senhaatual'";
 $resultado=conecta($maquina,$usuario,$senha,$banco,$sql);
 if(mysql_num_rows($resultado) > 0){
  	
  	while($linha=mysql_fetch_array($resultado))
	    {
			$senha_banco=trim($linha["senha"]);
		}//end while

		if($senha_banco == $senhaatual)
		{
		$sql="UPDATE usuario SET senha='$nova_senha' WHERE COD_Usuario='$CodUser'";
 		$resultado=conecta($maquina,$usuario,$senha,$banco,$sql);
        header("Location:../principal.php?login=$login");
        logs ( $login_user , "TROCA DE SENHA" , "SUCESSO" ,$IP );
        header("Location:../edita_usuario.php?CodUser=$CodUser&situacao=1&mensagem=<div class='ls-alert-success'>Sucesso. Senhas alteradas.</div>");
	    exit;
		}

 }else{
 	echo "Usuario e senha nao localizados no banco";
 	logs ( $login_user , "TROCA DE SENHA" , "ERRO:Senha atual digitada errada" ,$IP );
 	header("Location:../edita_usuario.php?CodUser=$CodUser&situacao=1&mensagem=<div class='ls-alert-danger'>Ops. Senha atual digitada errada.</div>");
 	exit;
 }//end if num_rows



}//end else



exit;
?>