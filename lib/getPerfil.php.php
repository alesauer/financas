<?php
include("sessao.php");
include("funcoes.php");

function getPerfil ($url)
{
$nome = $_SESSION["nome"];
$idUsuario = $_SESSION["idUsuario"];
$login = $_SESSION["login"];
$idPerfil = $_SESSION["SeqPerfilUsuario"];
$senha = $_SESSION["senha"];
$cpf = $_SESSION["cpf"];
$email = $_SESSION["email"];
		 
$sql = "insert into LOGS_2(COD_USUARIOS_SISTEMA,DATA_LOGS,HORA_LOGS,TIPO_LOGS,ACAO,IP_LOGS) VALUES ('$COD_USUARIOS_SISTEMA','$data','$hora','$TIPO_LOGS','$ACAO','$IP')";
$resultado = conectando( "localhost","root","root","gestaoativos", $sql );
}

function conectando ( $maquina, $usuario, $senha, $banco, $sql )
{
        $conexao = mysql_connect( $maquina, $usuario, $senha );
        $db = mysql_select_db( $banco, $conexao );
        $resultado = mysql_query( $sql, $conexao );
        mysql_close( $conexao );
        return $resultado;
}

?>
