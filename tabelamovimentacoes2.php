<?php
include("lib/sessao.php");
include("config.php");
include_once("lib/database.php");
error_reporting(0);

?>


<!DOCTYPE html>
<html class="<?php echo "$tema";?>">



<?php include("modules/header.php"); ?>


  <body>
    <div class="ls-topbar ">

  <!-- Barra de Notificações -->
  <div class="ls-notification-topbar">

    <!-- Links de apoio -->
    <div class="ls-alerts-list">
     
      <a href="#" class="ls-ico-question" data-ls-module="topbarCurtain" data-target="#ls-feedback-curtain"><span>Sugestões</span></a>
    </div>


 <?php include("modules/conta_user.php"); ?>


    <!-- Menu Superior -->
  <span class="ls-show-sidebar ls-ico-menu"></span>
       <h1 class="ls-brand-name">
        <a href="#" class="ls-ico-stats">
          <small><?php echo "$nome_sup_esq_peq";?></small>
          <?php echo "$nome_sup_esq_grd";?>
        </a>
      </h1>

</div>
 

<aside class="ls-sidebar">

  <div class="ls-sidebar-inner">
      <a href="#"  class="ls-go-prev"><span class="ls-text">Voltar à lista de serviços</span></a>
        <?php include("modules/menu.php"); ?>
  </div>
</aside>


    <main class="ls-main ">
      <div class="container-fluid">
        <h1 class="ls-title-intro ls-ico-stats">Movimentações</h1>

<?php



$data=date("d/m/Y - H:i:s");
$mes = date("M"); // formato escrito
$mesNum = date("m"); // formato 1 a 12

$ano = date("Y");
$ano1 = date("Y")+1;



if (isset($_REQUEST["clicouExcluir"]) == "1")
{
  $idFINANCAS=$_REQUEST["idFINANCAS"];
  $parcelado=$_REQUEST["parcelado"];
  $obj= new Database;
  if($parcelado !=0){
    //Se for parcelado, exclui todos registros do parcelamento
    $resultado = $obj->connect("delete from movimentacoes WHERE parcelado='$parcelado'");
  }else{
    //Se não for parcelado, apenas irá excluir o registro em questão.
    $resultado = $obj->connect("delete from movimentacoes WHERE idFINANCAS='$idFINANCAS'");
  }
  
}



if (isset($_REQUEST["clicouPAGO"]) == "1")
{
  $idFINANCAS=$_REQUEST["idFINANCAS"];
  $data="0000-01-01";
  $obj= new Database;
  $resultado = $obj->connect("UPDATE movimentacoes SET SITUACAO='PENDENTE', DATA_PAGAMENTO='$data' WHERE idFINANCAS='$idFINANCAS'");
}



if (isset($_REQUEST["clicouPENDENTE"]) == "1")
{
  $idFINANCAS=$_REQUEST["idFINANCAS"];
  $data=date("Y-m-d");
  $obj= new Database;
  $resultado = $obj->connect("UPDATE movimentacoes SET SITUACAO='PAGO',DATA_PAGAMENTO='$data' WHERE idFINANCAS='$idFINANCAS'");
}




if (isset($_REQUEST["situacao_exclui"]) == "1")
{
  $mensagem=$_REQUEST["mensagem"];  
  echo "$mensagem";
}

if (isset($_REQUEST["situacao_add"]) == "1")
{
  $mensagem=$_REQUEST["mensagem"];  
  echo "$mensagem";
}


if(isset($_GET["mesFiltro"])){
  $mesFiltro = $_GET["mesFiltro"];

    switch ($mesFiltro) {
      case 01: 
           $obj= new Database;
           $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-01%' order by tipo DESC, data_vencimento asc");
           $mes="Janeiro";
           $mesTela = "<b>$mes de $ano</b>";
           $objF = new Financeiro; $Receita = $objF->get_receita('01',$ano); $Despesas = $objF->get_despesa('01',$ano);
          break;

      case 02:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-02%' order by tipo DESC, data_vencimento asc");
           $mes="Fevereiro";
           $mesTela = "<b>$mes de $ano</b>";
           $objF = new Financeiro; $Receita = $objF->get_receita('02',$ano); $Despesas = $objF->get_despesa('02',$ano);
          break;
      case 03:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-03%' order by tipo DESC, data_vencimento asc");
          $mes="Março";
          $mesTela = "<b>$mes de $ano</b>";
          $objF = new Financeiro; $Receita = $objF->get_receita('03',$ano); $Despesas = $objF->get_despesa('03',$ano);
          break;
      case 04:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-04%' order by tipo DESC, data_vencimento asc");
           $mesTela = "<b>$mes de $ano</b>";
           $objF = new Financeiro; $Receita = $objF->get_receita('04',$ano); $Despesas = $objF->get_despesa('04',$ano);
          break;
      case 05:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-05%' order by tipo DESC, data_vencimento asc");
          $mes="Maio";
           $mesTela = "<b>$mes de $ano</b>";
           $objF = new Financeiro; $Receita = $objF->get_receita('05',$ano); $Despesas = $objF->get_despesa('05',$ano);
          break;
      case 06:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-06%' order by tipo DESC, data_vencimento asc");
          $mes="Junho";
           $mesTela = "<b>$mes de $ano</b>";
           $objF = new Financeiro; $Receita = $objF->get_receita('06',$ano); $Despesas = $objF->get_despesa('06',$ano);
          break;
      case 07:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-07%' order by tipo DESC, data_vencimento asc");
          $mes="Julho";
          $mesTela = "<b>$mes de $ano</b>";
          $objF = new Financeiro; $Receita = $objF->get_receita('07',$ano); $Despesas = $objF->get_despesa('07',$ano);
          break;
      case 8:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-08%' order by tipo DESC, data_vencimento asc");
          $mes="Agosto";
          $mesTela = "<b>$mes de $ano</b>";
          $objF = new Financeiro; $Receita = $objF->get_receita('08',$ano); $Despesas = $objF->get_despesa('08',$ano);
          break;
      case 9:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-09%' order by tipo DESC, data_vencimento asc");
          $mes="Setembro";
           $mesTela = "<b>$mes de $ano</b>";
           $objF = new Financeiro; $Receita = $objF->get_receita('09',$ano); $Despesas = $objF->get_despesa('09',$ano);
          break;
      case 10:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-10%' order by tipo DESC, data_vencimento asc");
          $mes="Outubro";
           $mesTela = "<b>$mes de $ano</b>";
           $objF = new Financeiro; $Receita = $objF->get_receita('10',$ano); $Despesas = $objF->get_despesa('10',$ano);
          break;
      case 11:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-11%' order by tipo DESC, data_vencimento asc");
          $mes="Novembro";
           $mesTela = "<b>$mes de $ano</b>";
           $objF = new Financeiro; $Receita = $objF->get_receita('11',$ano); $Despesas = $objF->get_despesa('11',$ano);
          break;
      case 12:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-12%' order by tipo DESC, data_vencimento asc");
          $mes="Dezembro";
           $mesTela = "<b>$mes de $ano</b>";
           $objF = new Financeiro; $Receita = $objF->get_receita('12',$ano); $Despesas = $objF->get_despesa('12',$ano);
          break;
       default:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-$mesNum%' order by tipo DESC, data_vencimento asc");
          $mesTela = "<b>$mes de $ano</b>";

    }//end case
    
}//end if

?>
  

  
<div class="ls-box ls-board-box">
  <header class="ls-info-header">
      <h2 class="ls-title-3">Lista das Receitas e Despesas de <?php echo "$ano";?>:</h2>
      <ol class="ls-breadcrumb">
          <li><a href="tabelamovimentacoes.php?mesFiltro=01">Janeiro</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=02">Fevereiro</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=03">Março</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=04">Abril</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=05">Maio</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=06">Junho</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=07">Julho</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=08">Agosto</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=09">Setembro</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=10">Outubro</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=11">Novembro</a></li>
          <li><a href="tabelamovimentacoes.php?mesFiltro=12">Dezembro</a></li>
      </ol>
      <div align="right"> <a href="novamovimentacao.php" class="ls-btn-primary">Nova Movimentação</a>        </div>
      <center><h5 class="ls-title-5"><?php echo "$mesTela"; ?></h5></center>
<br>


<?php

//$Receita=number_format($Receita,2,".",",");
//$Receita = money_format('%.2n', $Receita);

if($Receita==NULL){$Receita=0; }
if($Despesas==NULL){$Despesas=0; }
$saldo = $Receita - $Despesas;

if($Receita!=0){
$PercSobra =($saldo*100)/$Receita;
}else{
  $PercSobra =0;
}

$PercSobra=number_format($PercSobra, 2);
if($PercSobra<=0){$PercSobra=0;}

$saldo_screen = number_format($saldo, 2);
$Receita_screen =  number_format($Receita, 2);
$Despesas_screen =  number_format($Despesas, 2);


$obj_p = new Financeiro;
$Parcelamentos = number_format($obj_p->get_total_parcelamentos(), 2);

?>

<div class="ls-group-btn">
  <button type="button" class="ls-btn-primary">Receitas: R$ <?php echo "$Receita_screen";?></button>
  <button type="button" class="ls-btn-danger ls-active">Despesas: R$ <?php echo "$Despesas_screen";  ?></button>
  <button type="button" class="ls-btn-danger">Saldo: R$ <?php echo "$saldo_screen";?></button>
  <button data-ls-module="modal" data-target="#parcelamentos" class="ls-btn-success">Parcelamentos</button>
</div>
<br>




<!--
######################  
 START modal parcelamentos
######################
-->

<?php
$obj_lp = new Financeiro; 
  

$p_mes = $obj_lp->get_lista_parcelamentos_mes(); 
$p_valor = $obj_lp->get_lista_parcelamentos_valor();
?>


<div class="ls-modal" id="parcelamentos">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Total de Parcelamentos de  <?php echo "$ano: R$ $Parcelamentos";?></h4>
    </div>
    <div class="ls-modal-body" id="myModalBody">
          <table class="ls-table ls-no-hover ls-table-striped">
        <thead>
          <tr>
            <th>Mês</th>
            <th class="hidden-xs">Valor</th>
          </tr>
        </thead>
        <tbody>
            <?php
                    $obj = new Database;
                    $result = $obj->connect("SELECT * from V_PARCELAMENTOS_TOTAL_ANO_ATUAL order by mes asc");

                    $obj_f= new Formats;
                    
                    while($linha=mysqli_fetch_array($result))
                    {
                        $p_valor = $linha['VALOR'];
                        $p_mes = $obj_f->convert_mes_num_nome($linha['MES']);
                        echo "<tr><td><a href='' title=''>$p_mes</a></td>";
                        echo "<td class='hidden-xs'>R$ $p_valor</td></tr>";
                    }
                    
                    $obj_p1 = new Financeiro;
                    $TotalParcelamentos = number_format($obj_p1->get_total_parcelamentos(), 2);
                    echo "<tr><td><a href='' title=''><b>Total:</b></a></td>";
                    echo "<td class='hidden-xs'><b>R$ $TotalParcelamentos</b></td></tr>";
            ?>  
        </tbody>
      </table>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
      <br><br>                       
    </div>
  </div>
</div>
<!--
######################  
 FIM modal parcelamentos
######################
-->



<!--
############################  
# START M.O.D.A.L  CARTOES #
############################
-->

<?php
$obj_lp = new Financeiro; 
$p_mes = $obj_lp->get_lista_parcelamentos_mes(); 
$p_valor = $obj_lp->get_lista_parcelamentos_valor();
?>


<div class="ls-modal" id="cartoes-credito">
  <div class="ls-modal-box">
    <div class="ls-modal-header">
      <button data-dismiss="modal">&times;</button>
      <h4 class="ls-modal-title">Valor Gasto CC. do mês  
        <?php 





      $obj= new Financeiro;
      $forma_pagamento_cc = $obj->get_forma_pagamentos_credito();
  

        $ano = date("Y");
        foreach($forma_pagamento_cc as $forma_pag_cc)
        {
            $objcc1 = new Financeiro;  
            $valorCC = $objcc1->get_saldo_pagamentos_credito($forma_pag_cc,$mesFiltro);
            
        }

      echo "no cartão $forma_pagamento_cc: R$ $valorCC";?></h4>
    </div>
    <div class="ls-modal-body" id="myModalBody">
          <table class="ls-table ls-no-hover ls-table-striped">
        <thead>
          <tr>
            <th>Descrição</th>
            <th class="hidden-xs">Valor</th>
            <th class="hidden-xs">Categoria</th>
          </tr>
        </thead>
        <tbody>
            <?php
                    $mes = $mesFiltro;
                    $ano = date("Y");

                    $obj = new Database;
                    $result = $obj->connect("SELECT * FROM movimentacoes WHERE USOU_CC='1' AND YEAR(DATA_VENCIMENTO)='$ano'
                    AND MONTH(DATA_VENCIMENTO)='$mesFiltro'");
                    
                    $obj_f= new Formats;
                    
                    while($linha=mysqli_fetch_array($result))
                    {
                        $c_valor = $linha['VALOR'];
                        $c_desc = $linha['DESCRICAO'];
                        $c_cat = $linha['CATEGORIA'];

                        echo "<tr><td>$c_desc</td>";
                        echo "<td>R$ $c_valor</a></td>";
                        echo "<td class='hidden-xs'>$c_cat</td></tr>";
                    }
            ?>  
        </tbody>
      </table>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Fechar</button>
      <button type="submit" class="ls-btn-primary">Importar</button>
    </div>
  </div>
</div>

<!--
############################  
# END  M.O.D.A.L   CARTOES #
############################
-->




<?php
//DEFINE OS PERCENTUAIS DE SOBRA DE DIMDIM
if ($PercSobra>=30){
echo "<div class='ls-alert-success ls-sm-space'><center><strong>Sucesso! </strong> Está sobrando <b>$PercSobra%</b> dos seus rendimentos! Que tal investir?</center></div>";
}else if($PercSobra>=10 and $PercSobra <=29){
  echo "<div class='ls-alert-warning ls-sm-space'><center><strong>Opa! </strong>Está sobrando <b> apenas $PercSobra%</b> dos seus rendimentos! Vamos tentar economizar mais?</center></div>";
}else if($PercSobra<10 and $PercSobra >0){
  echo "<div class='ls-alert-danger ls-sm-space'><center><strong>CUIDADO! </strong>Está sobrando <b> apenas $PercSobra%</b> dos seus rendimentos! Vamos tentar economizar mais?</center></div>";
}
?>


</header>

<table class="ls-table ls-no-hover ls-sm-space ls-table-striped ls-bg-header">
  <thead>
    <tr>
      <th class="ls-data-descending"><a href="#">Tipo</a></th>
      <th>Descrição</th>
      <th>Valor</th>
      <th>Data Pagamento</th>
      <th>Data Vencimento</th>
      <th class="ls-data-descending"><a href="#">Situação</a></th>
      <th>Ação</th>
    </tr>
  </thead>
  <tbody>





<!--
##############################################
#INICIO VIEW AGRUPADA DOS CARTÕES DE CRÉDITOS#
##############################################
-->
<?php

if (isset($_REQUEST["clicouCC_PAGO"]) == "1")
{
  $data=date("Y-m-d");
  $forma_pagamento=$_REQUEST["forma_pagamento"];
  $obj= new Database;
  $resultado_cc = $obj->connect("UPDATE movimentacoes SET SITUACAO='PENDENTE', DATA_PAGAMENTO='$data' WHERE FORMA_PAGAMENTO='$forma_pagamento'");
  //echo "UPDATE movimentacoes SET SITUACAO='PENDENTE', DATA_PAGAMENTO='$data' WHERE FORMA_PAGAMENTO='$forma_pagamento'";
}
if (isset($_REQUEST["clicouCC_PENDENTE"]) == "1")
{
  $forma_pagamento=$_REQUEST["forma_pagamento"];
  $data=date("Y-m-d");
  $obj= new Database;
  $resultado_cc = $obj->connect("UPDATE movimentacoes SET SITUACAO='PAGO', DATA_PAGAMENTO='$data' WHERE FORMA_PAGAMENTO='$forma_pagamento'");
  //echo "UPDATE movimentacoes SET SITUACAO='PAGO', DATA_PAGAMENTO='$data' WHERE FORMA_PAGAMENTO='$forma_pagamento'";
}




$mesNum = $mesFiltro; // formato 1 a 12
$ano = date("Y");

//$objF = new Financeiro; $valorCC = $objF->get_cc($mesNum,$ano); 
//$valorCC = number_format($valorCC,2,",",".");

$obj= new Financeiro;
$forma_pagamento_cc = $obj->get_forma_pagamentos_credito();


foreach($forma_pagamento_cc as $forma_pag_cc){
  
  $objcc = new Financeiro;  
  $valorCC = $objcc->get_saldo_pagamentos_credito($forma_pag_cc,$mesFiltro);
 
  $situacaocc = $objcc->get_situacaoCC($forma_pag_cc,$mesFiltro); //PAGO OU PENDENTE - CARTAO DE CREDITO
//  echo $situacaocc;exit;
  $get_vencimento_cartao = $objcc->get_vencimento_cc($forma_pag_cc,$mesFiltro);



  if($situacaocc =="PENDENTE" ){
    $data_pagamento="Aguardando...";
    
    
      echo "
    <tr>
      <td style='color:red;'><b>Cartão Crédito</b></td>
      <td><b><a href='#' style='color:purple;'>$forma_pag_cc</a></b></td>
      <td>R$ $valorCC</td>
      <td>$data_pagamento</td>
      <td>$get_vencimento_cartao</td>
      <td style='color:red;'><a href='tabelamovimentacoes.php?clicouCC_PENDENTE=1&forma_pagamento=$forma_pag_cc&mesFiltro=$mesFiltro' style='color:red;'><b>$situacaocc</b></a></td>
      <td>
      <a href=cartoesCredito.php?forma_pagamento=$forma_pag_cc&mesFiltro=$mesFiltro> <button class='ls-btn ls-btn-xs ls-ico-edit-admin'>Ver ...</button></a>
            
            <button data-ls-module='modal' data-action='tabelamovimentacoes.php?clicouCC=1&mesFiltro=$mesFiltro' data-content='<h2>Deseja excluir o registro?</h2><br><p>Os dados serão apagados definitivamente! Caso esse registro tenha parcelamento, <b>todos</b> os parcelamentos serão excluídos.</p>' data-title='Excluir' data-class='ls-btn-primary' data-save='Excluir' data-close='Fechar' class='ls-btn-primary-danger ls-btn-xs ls-ico-remove'>Excluir</button>
      </td>
    </tr>";
  }else if($situacaocc =="PAGO" ){
    $data_pagamento=date("Y-m-d");
      echo "
      <tr>
      <td style='color:red;'><b>Cartão Crédito</b></td>
      <td><b><a href='#' style='color:purple;'>$forma_pag_cc</a></b></td>
      <td>R$ $valorCC</td>
      <td>$data_pagamento</td>
      <td>$get_vencimento_cartao</td>
      <td style='color:green;'><a href='tabelamovimentacoes.php?clicouCC_PAGO=1&forma_pagamento=$forma_pag_cc&mesFiltro=$mesFiltro' style='color:green;'><b>$situacaocc</b></a></td>
      <td>
            <a href=cartoesCredito.php?forma_pagamento=$forma_pag_cc&mesFiltro=$mesFiltro> <button class='ls-btn ls-btn-xs ls-ico-edit-admin'>Ver ...</button></a>
            <button data-ls-module='modal' data-action='tabelamovimentacoes.php?clicouCC=1&idFINANCAS=idFINANCAS&mesFiltro=mesFiltro&parcelado=parcelado' data-content='<h2>Deseja excluir o registro?</h2><br><p>Os dados serão apagados definitivamente! Caso esse registro tenha parcelamento, <b>todos</b> os parcelamentos serão excluídos.</p>' data-title='Excluir' data-class='ls-btn-primary' data-save='Excluir' data-close='Fechar' class='ls-btn-primary-danger ls-btn-xs ls-ico-remove'>Excluir</button>
          </td>
      </tr>  
    ";
 }

}

?>

<!--
#############################################
#  FIM VIEW AGRUPADA DOSCARTÕES DE CRÉDITOS #
#############################################
-->


<?php
  include_once "lib/funcoes.php";
  include_once "lib/conexao_banco.php";


  while($linha=mysqli_fetch_array($resultado))
   {
     $idFINANCAS = $linha['idFINANCAS'];
     $tipo=$linha['TIPO'];
     $descricao=$linha['DESCRICAO'];
     $valor=number_format($linha['VALOR'],2,",",".");
     $categoria=$linha['CATEGORIA'];
     $data_pagamento=$linha['DATA_PAGAMENTO'];
     if($data_pagamento=='1999-12-31' or $data_pagamento=='1999-01-01' or $data_pagamento == NULL or $data_pagamento=='0001-01-01'){
       $data_pagamento="Aguardando..."; 
     }



     $data_vencimento=$linha['DATA_VENCIMENTO'];
     $forma_pagamento=$linha['FORMA_PAGAMENTO'];
     $conta=$linha['CONTA'];
     $parcela=$linha['PARCELA'];
     $parcelado=$linha['PARCELADO'];
     $situacao=$linha['SITUACAO'];
     $usou_cc=$linha['USOU_CC'];

if($usou_cc != 1)
{     

    if($situacao == "PAGO")
    {
      $mesNum = date("m");
    echo "<tr>";

    if($tipo=="Receitas"){
    echo "<td style='color:green;'><b>$tipo</b></td>";
    }else{
    echo "<td style='color:red;'><b>$tipo</b></td>";  
    }

    



    echo "<td><b>$descricao</b></td>";
   
      echo "
      <td>R$ $valor</td>
      <td>$data_pagamento</td>
      <td>$data_vencimento</td>
      <td style='color:green;'><a href='tabelamovimentacoes.php?clicouPAGO=1&idFINANCAS=$idFINANCAS&mesFiltro=$mesNum' style='color:green;'><b>$situacao</b></a></td>
      <td>
        <a href='editamovimentacao.php?idFINANCAS=$idFINANCAS' class='ls-btn ls-btn-xs ls-ico-edit-admin'>Editar</a>        
        <button data-ls-module='modal' data-action='tabelamovimentacoes.php?clicouExcluir=1&idFINANCAS=$idFINANCAS&mesFiltro=$mesFiltro&parcelado=$parcelado' data-content='<h2>Deseja excluir o registro?</h2><br><p>Os dados serão apagados definitivamente! Caso esse registro tenha parcelamento, <b>todos</b> os parcelamentos serão excluídos.</p>' data-title='Excluir' data-class='ls-btn-primary' data-save='Excluir' data-close='Fechar' class='ls-btn-primary-danger ls-btn-xs ls-ico-remove'>Excluir</button>
      </td>
    </tr>";
    }else{
      echo "<tr>";

     if($tipo=="Receitas"){
    echo "<td style='color:green;'><b>$tipo</b></td>";
    }else{
    echo "<td style='color:red;'><b>$tipo</b></td>";  
    }

        echo "<td><b>$descricao</b></td>";


      echo"
      <td>R$ $valor</td>
      <td>$data_pagamento</td>
      <td>$data_vencimento</td>
      <td style='color:red;'><a href='tabelamovimentacoes.php?clicouPENDENTE=1&idFINANCAS=$idFINANCAS&mesFiltro=$mesNum' style='color:red;'><b>$situacao</b></a></td>
      <td>
      <a href='editamovimentacao.php?idFINANCAS=$idFINANCAS' class='ls-btn ls-btn-xs ls-ico-edit-admin'>Editar</a>

        <button data-ls-module='modal' data-action='tabelamovimentacoes.php?clicouExcluir=1&idFINANCAS=$idFINANCAS&mesFiltro=$mesFiltro&parcelado=$parcelado' data-content='<h2>Deseja excluir o registro?</h2><br><p>Os dados serão apagados definitivamente! Caso esse registro tenha parcelamento, <b>todos</b> os parcelamentos serão excluídos.</p>' data-title='Excluir' data-class='ls-btn-primary' data-save='Excluir' data-close='Fechar' class='ls-btn-primary-danger ls-btn-xs ls-ico-remove'>Excluir</button>
      </td>
    </tr>";
    }
  }
}//end usou_cc
?>

</tbody>
</table>
  </div>
</div>
     </div>

    </main>

    <aside class="ls-notification">
   

      <nav class="ls-notification-list" id="ls-feedback-curtain" style="left: 1796px;">
        <h3 class="ls-title-2">Ajuda</h3>
        <ul>
             <li><a href="#">&gt; Sobre</a></li>
          <li><a href="#">&gt; Manual</a></li>
        </ul>
      </nav>
    </aside>

<?php include("modules/footer.php"); ?>
  </body>
</html>