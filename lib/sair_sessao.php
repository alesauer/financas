<?php
 include ("funcoes.php");
 include ("conexao_banco.php");
 include ("verip.php");
  include ("sessao.php");

$IP=qualip();
$login =  $_SESSION["login"];
logs ( $login , "SAIDA_SISTEMA" , "SUCESSO" ,$IP );
session_destroy();
$IP=qualip();
header("Location:../login.php");
?>
