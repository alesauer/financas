<?php
include("database.php");


$arq = file("../upload/nubank-2022-08.csv");
$conta = count($arq);


//echo "$conta";  exit;


$obj= new Database;
$resultado = $obj->connect("delete from nubank_cc_import");


//echo "\nIniciando o processo de Carga de $conta registros\n";

for ($i=1;$i<$conta;$i++)
{
$divide = explode(',', $arq[$i]);
$data = rtrim(ltrim($divide[0]));

$categoria = rtrim(ltrim($divide[1]));
//Verifica se existe categoria criada na tabela categoria do sistema
if($categoria !=NULL){
    $ver=verifica_cat($categoria);
}



$descricao = rtrim(ltrim($divide[2]));
//Retira Caracteres inuteis
$descricao = str_replace("'", "", $descricao);
$descricao = str_replace("*", "", $descricao);
$descricao = str_replace("`", "", $descricao);
$descricao = str_replace("´", "", $descricao);
$valor = rtrim(ltrim($divide[3]));

if($descricao != "Pagamento recebido") // Não insere o pagamento recebido do nubank
{
$obj= new Database;
$resultado = $obj->connect("INSERT INTO nubank_cc_import (data,categoria,descricao,valor) VALUES ('$data', '$categoria', '$descricao', '$valor')");
}
}




function verifica_cat($categoria){
    $obj= new Database;
    $categoria = strtoupper($categoria);
    $result = $obj->connect("select * from categoria where DESC_CATEGORIA = '$categoria'");
    $linha=mysqli_fetch_array($result);
    if($linha != NULL){
        echo "categoria $categoria sendo inserida\n";
        $categoria = str_replace("ç", "c", $categoria);
        $obj1= new Database;
        $obj1->connect("INSERT INTO categoria (DESC_CATEGORIA,OBS_CATEGORIA) VALUES('$categoria','$categoria')");
    }
    //print_r($linha);
}//END FUNCTION



?>
