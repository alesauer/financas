<?php

class Database
{
    function connect($query)
    {
        $_host = '127.0.0.1';
        $_user = 'financeiro';
        $_password = 'GxgLTr201@';
        $_database = 'financas';
        
        $conn = mysqli_connect($_host,$_user,$_password) or die("<h4>Erro: Conexão não pode ser realizada: $_host - $_user - $_password - $_database</h4>");
        $banco = mysqli_select_db($conn,$_database) or die("Erro: Banco de Dados não encontrado: $_database");
        mysqli_set_charset($conn,'utf8');
        $result = mysqli_query($conn,$query) or die("Erro: Query: $query");
        return($result);
        exit;
    }
}//end class


class Datas{
    function get_dia(){
        return date("d");
        exit;
    }

    function get_mes(){
        return date("m");
        exit;
    }

    function get_ano(){
        return date("Y");
        exit;
    }

    function get_data_ymd(){
        return date("Y-m-d");
        exit;
    }
}//End Datas class





class Formats{
    function convert_mes_num_nome($num_mes){
        if($num_mes==1){ return "Jan"; }
        if($num_mes==2){ return "Fev"; }
        if($num_mes==3){ return "Mar"; }
        if($num_mes==4){ return "Abr"; }
        if($num_mes==5){ return "Mai"; }
        if($num_mes==6){ return "Jun"; }
        if($num_mes==7){ return "Jul"; }
        if($num_mes==8){ return "Ago"; }
        if($num_mes==9){ return "Set"; }
        if($num_mes==10){ return "Out"; }
        if($num_mes==11){ return "Nov"; }
        if($num_mes==12){ return "Dez"; }
    }
}


class Financeiro{
   



   
    function get_lista_parcelamentos_mes()
    {
        $obj = new Database;
        $result = $obj->connect("SELECT MES from V_PARCELAMENTOS_TOTAL_ANO_ATUAL ORDER BY MES ASC");
        $i=0;
        while($linha=mysqli_fetch_array($result))
        {
            //$Receita = number_format($linha['Receita'],2,",",".");   
            $p_mes[$i] = $linha['MES'];
            $i++;   
        }

        if(!isset($p_mes)){
            $p_mes=0;
        }

        return $p_mes;
    }


    function get_lista_parcelamentos_valor()
    {
        $obj = new Database;
        $result = $obj->connect("SELECT VALOR from V_PARCELAMENTOS_TOTAL_ANO_ATUAL ORDER BY mes asc");
        $i=0;
        while($linha=mysqli_fetch_array($result))
        {
            //$Receita = number_format($linha['Receita'],2,",",".");   
            $p_valor[$i] = $linha['VALOR'];
            $i++;   
        }
        if(!isset($p_valor)){
            $p_valor=0;
        }
        return $p_valor;
    }


    function get_total_parcelamentos()
    {
        $obj = new Database;
        $result = $obj->connect("SELECT sum(VALOR) AS PARCELAMENTOS FROM movimentacoes WHERE TIPO='Despesas' AND PARCELADO !='0'");
        while($linha=mysqli_fetch_array($result))
        {
            //$Receita = number_format($linha['Receita'],2,",",".");   
            $Parcelamentos = $linha['PARCELAMENTOS'];   
        }
        return $Parcelamentos;
    }


    function get_total_parcelamentos_mes($mesp)
    {
        $obj = new Database;
        $result = $obj->connect("SELECT sum(VALOR) AS PARCELAMENTOS FROM movimentacoes WHERE TIPO='Despesas' AND PARCELADO !='0' AND MONTH(DATA_VENCIMENTO)='$mesp' AND YEAR(DATA_VENCIMENTO) = YEAR(NOW())");
        while($linha=mysqli_fetch_array($result))
        {
            //$Receita = number_format($linha['Receita'],2,",",".");   
            $Parcelamentos = $linha['PARCELAMENTOS'];   
        }
        return $Parcelamentos;
    }

    function get_receita($mes,$ano)
    {

        $obj = new Database;
        $result = $obj->connect("SELECT sum(VALOR) AS Receita FROM movimentacoes WHERE TIPO = 'Receitas' AND YEAR(DATA_VENCIMENTO)='$ano' AND MONTH(DATA_VENCIMENTO)='$mes'");
        while($linha=mysqli_fetch_array($result))
        {
            //$Receita = number_format($linha['Receita'],2,",",".");   
            $Receita = $linha['Receita'];   
        }
        return $Receita;
    }
    
    function get_despesa($mes,$ano)
    {

        $obj = new Database;
        $result = $obj->connect("SELECT sum(VALOR) AS Despesas FROM movimentacoes WHERE TIPO = 'Despesas' AND YEAR(DATA_VENCIMENTO)='$ano' AND MONTH(DATA_VENCIMENTO)='$mes'");
        while($linha=mysqli_fetch_array($result))
        {
            //$Despesas = number_format($linha['Despesas'],2,",",".");   
            $Despesas = $linha['Despesas'];   
        }
        return $Despesas;
    }

    
    
    function get_despesa_cc($mes,$ano,$campo)
    {
        //Pega as despesas com cartao de credito. Dependendo do valor passado, retorna os valores dos campos.
        $obj = new Database;
        $result = $obj->connect("SELECT * FROM movimentacoes WHERE USOU_CC='1' AND YEAR(DATA_VENCIMENTO)='$ano' AND MONTH(DATA_VENCIMENTO)='$mes'");
        $i++;

        while($linha=mysqli_fetch_array($result))
        {
            if($campo=="DESCRICAO"){ $DESCRICAO[$i] = $linha['DESCRICAO']; return $DESCRICAO; }
            if($campo=="VALOR"){ $VALOR[$i] = $linha['VALOR'];   return $VALOR; }
            if($campo=="CATEGORIA"){ $CATEGORIA[$i] = $linha['CATEGORIA']; return $CATEGORIA; }
            if($campo=="PARCELA"){ $PARCELA[$i] = $linha['PARCELA']; return $PARCELA; }
            $i++;
        }
    }


    function get_saldo($mes,$ano)
    {

        $obj = new Database;
        $result = $obj->connect("SELECT sum(VALOR) AS Despesas FROM movimentacoes WHERE TIPO = 'Despesas' AND YEAR(DATA_VENCIMENTO)='$ano' AND MONTH(DATA_VENCIMENTO)='$mes'");
        while($linha=mysqli_fetch_array($result))
        {
            $Despesas = number_format($linha['Despesas'],2,",",".");   
        }
        return $saldo;
    }

    function get_forma_pagamentos()
    {
        $obj = new Database;
        $result = $obj->connect("SELECT forma_pagamento from forma_pagamento");
        $i=0;
        while($linha=mysqli_fetch_array($result))
        {
            $forma_pagamento[$i] = $linha['forma_pagamento'];
            $i++;   
        }
        return $forma_pagamento;
    }

    
    function get_tipo_forma_pagamentos($forma_pagamento){
        $obj = new Database;
        $result = $obj->connect("SELECT TIPO from forma_pagamento where FORMA_PAGAMENTO = '$forma_pagamento'");
        
        while($linha=mysqli_fetch_array($result))
        {
            $tipo_pagamento = $linha['TIPO'];
        
        }
        return $tipo_pagamento;
    }




    function get_categorias()
    {
        $obj = new Database;
        $result = $obj->connect("SELECT DESC_CATEGORIA FROM categoria order by DESC_CATEGORIA ASC");
        $i=0;
        while($linha=mysqli_fetch_array($result))
        {
            $categoria[$i] = $linha['DESC_CATEGORIA'];
            $i++;    
        }
        return($categoria);
        exit;
    }


    function get_forma_pagamentos_credito()
    {
        $obj = new Database;
        $result = $obj->connect("SELECT FORMA_PAGAMENTO FROM forma_pagamento where TIPO='CC'");
        $i=0;
        while($linha=mysqli_fetch_array($result))
        {
            $forma_pagamento[$i] = $linha['FORMA_PAGAMENTO'];
            $i++;    
        }
        return($forma_pagamento);
        exit;
    }


    function get_forma_pagamentos_credito_especifico()
    {
        $obj = new Database;
        $result = $obj->connect("SELECT FORMA_PAGAMENTO FROM forma_pagamento where TIPO='CC'");
        $i=0;
        while($linha=mysqli_fetch_array($result))
        {
            $forma_pagamento[$i] = $linha['FORMA_PAGAMENTO'];
            $i++;    
        }
        return($forma_pagamento);
        exit;
    }


    function get_cc_vencimento_fatura($forma_pag_cc){
        // pega a data de fechamento de um cartao de credito passado
        $obj = new Database;
        $result = $obj->connect("SELECT DIA_FECHAMENTO_FATURA_CC from forma_pagamento WHERE forma_pagamento = '$forma_pag_cc'");
        
        while($linha=mysqli_fetch_array($result)) {
           $dia_fechamento_cc = $linha['DIA_FECHAMENTO_FATURA_CC'];
        }

        return($dia_fechamento_cc);
        exit;
    }


    function get_situacaoCC($forma_pag_cc,$mesFiltro){
        $ano = date("Y");

        $obj = new Database;
        $result = $obj->connect("SELECT SITUACAO FROM movimentacoes WHERE forma_pagamento = '$forma_pag_cc' and DATA_VENCIMENTO like '$ano-$mesFiltro-%'");
        while($linha=mysqli_fetch_array($result)) {   $situacao = $linha['SITUACAO']; }
        //echo "$situacao - SELECT SITUACAO FROM movimentacoes WHERE forma_pagamento = '$forma_pag_cc' and DATA_VENCIMENTO like '$ano-$mesFiltro-%' limit 1,1";
        if(!isset($situacao))
        {
            return "Sem entrada";
        }else {
            return $situacao;    
        }
        
    }



    function get_vencimento_cc($forma_pag_cc,$mesFiltro){
        $obj = new Database;
        $result = $obj->connect("SELECT DIA_VENCIMENTO_CC FROM forma_pagamento WHERE forma_pagamento = '$forma_pag_cc'");
        while($linha=mysqli_fetch_array($result)) {   $dia_vencimento_cc = $linha['DIA_VENCIMENTO_CC']; }

        $ano = date("Y");
        $data_vencimento_cc="$dia_vencimento_cc-$mesFiltro-$ano";
        return $data_vencimento_cc;
    }


    function get_saldo_pagamentos_credito($forma_pag_cc,$mesFiltro)
    {
        //pega o valor do cartao de credito passado do mês
               
        
        $obj_f = new Financeiro();
        $dia_fechamento_cc = $obj_f->get_cc_vencimento_fatura($forma_pag_cc);

        $ano = date("Y");



        $mes_prox = (int) $mesFiltro+1;
        $mesIni = (int) $mesFiltro-1;


        //$ano_prox = $ano++;
        $dia_anterior_fechamento = $dia_fechamento_cc-1;
        //$dia_anterior_fechamento = 30;

        
       // echo "SELECT SUM(valor) AS total FROM movimentacoes WHERE data_vencimento BETWEEN '$ano-$mesIni-$dia_fechamento_cc' AND '$ano-$mesFiltro-02' AND forma_pagamento = '$forma_pag_cc'";
        

        $obj = new Database;
        $result = $obj->connect("SELECT SUM(valor) AS total FROM movimentacoes WHERE data_vencimento BETWEEN '$ano-$mesIni-$dia_fechamento_cc' AND '$ano-$mesFiltro-$dia_anterior_fechamento' AND forma_pagamento = '$forma_pag_cc'");

        while($linha=mysqli_fetch_array($result))
        {
           $valor = $linha['total'];
            
        }
       
        return($valor);
        exit;
    }


    function get_categorias_receita()
    {
        $obj = new Database;
        $result = $obj->connect("SELECT DESC_CATEGORIA FROM categoria_receita order by DESC_CATEGORIA asc");
        $i=0;
        while($linha=mysqli_fetch_array($result))
        {
            $categoria[$i] = $linha['DESC_CATEGORIA'];
            $i++;    
        }
        return($categoria);
        exit;
    }



}




?>  

