<?php
/*
class Financeiro
{
    function get_saldo()
    {
        include_once('database.php');
        $obj= new Database;
    
        return($result);
        exit;
    }

    function get_categorias()
    {
        include_once('database.php');
        $result = $obj->connect("SELECT DESC_CATEGORIA FROM categorias");
        $i=0;
        while($linha=mysqli_fetch_array($result))
        {
            $categoria[$i] = $linha['DESC_CATEGORIA'];
            $i++;    
        }
        return($categoria);
        exit;
    }



    function get_receita($mes,$ano)
    {
        include_once('database.php');
        $result = $obj->connect("SELECT sum(VALOR) AS Receita FROM movimentacoes WHERE TIPO = 'Receitas' AND YEAR(DATA_VENCIMENTO)='$ano' AND MONTH(DATA_VENCIMENTO)='$mes'");
        
        while($linha=mysqli_fetch_array($result))
        {
            $Receita = $linha['Receita'];    
        }
        return($Receita);
        exit;
    }



    function get_despesas()
    {
        include_once('database.php');
        
        return($result);
        exit;
    }


}//end class

*/


?>