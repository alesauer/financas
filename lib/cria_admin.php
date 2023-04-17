<?php
 include ("funcoes.php");
 include ("conexao_banco.php");
  include ("verip.php");
 include ("crypt.php");

$senha_login = "GxgLTr2010";


$senha_login=md5($senha_login);
$senha_login=trim($senha_login);
 
echo "$senha_login";
exit;
 
/*
 $sql="
 INSERT INTO  usuario (
`COD_Usuario` ,
`cpf` ,
`nome` ,
`login` ,
`senha` ,
`email`
)
VALUES (NULL ,  '03140122686',  'Usuario Administrador',  'pitagoras',  '$senha_login',  'admin@gmail.com')";


$resultado=conecta($maquina,$usuario,$senha,$banco,$sql);
echo "<center><h3>Usuário Criado</h3></center>";
exit; 
*/

?>
