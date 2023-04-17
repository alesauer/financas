<?php
include("lib/sessao.php");
include("config.php");
include_once("lib/database.php");
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
        <a href="#" class="ls-ico-hours">
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

          break;

      case 02:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-02%' order by tipo DESC, data_vencimento asc");
           $mes="Fevereiro";
           $mesTela = "<b>$mes de $ano</b>";
          break;
      case 03:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-03%' order by tipo DESC, data_vencimento asc");
          $mes="Março";
          $mesTela = "<b>$mes de $ano</b>";
          break;
      case 04:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-04%' order by tipo DESC, data_vencimento asc");
           $mesTela = "<b>$mes de $ano</b>";
          break;
      case 05:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-05%' order by tipo DESC, data_vencimento asc");
          $mes="Maio";
           $mesTela = "<b>$mes de $ano</b>";
          break;
      case 06:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-06%' order by tipo DESC, data_vencimento asc");
          $mes="Junho";
           $mesTela = "<b>$mes de $ano</b>";
          break;
      case 07:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-07%' order by tipo DESC, data_vencimento asc");
          $mes="Julho";
           $mesTela = "<b>$mes de $ano</b>";
          break;
      case 8:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-08%' order by tipo DESC, data_vencimento asc");
          $mes="Agosto";
           $mesTela = "<b>$mes de $ano</b>";
          break;
      case 9:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-09%' order by tipo DESC, data_vencimento asc");
          $mes="Setembro";
           $mesTela = "<b>$mes de $ano</b>";
          break;
      case 10:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-10%' order by tipo DESC, data_vencimento asc");
          $mes="Outubro";
           $mesTela = "<b>$mes de $ano</b>";
          break;
      case 11:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-11%' order by tipo DESC, data_vencimento asc");
          $mes="Novembro";
           $mesTela = "<b>$mes de $ano</b>";
          break;
      case 12:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-12%' order by tipo DESC, data_vencimento asc");
          $mes="Dezembro";
           $mesTela = "<b>$mes de $ano</b>";
          break;
       default:
          $obj= new Database;
          $resultado = $obj->connect("select * from movimentacoes WHERE data_vencimento like '$ano-$mesNum%' order by tipo DESC, data_vencimento asc");
          $mesTela = "<b>$mes de $ano</b>";

    }//end case
    
}//end if




if (isset($_REQUEST["clicoupesquisa"]) == "1")
{
  
  //Converte data do formulario de dd/mm/yyyy para yyyy-mm-dd
  $periodo_inicial = implode('-', array_reverse(explode('/', $_REQUEST["periodo_inicial"])));
  $periodo_final = implode('-', array_reverse(explode('/', $_REQUEST["periodo_final"])));

  $categoria=$_REQUEST["categoria"];
  if($categoria=="Todas") { $categoria="%"; }

  $tipo=$_REQUEST["tipo"];
  if($tipo=="Todas") { $tipo="%"; }



  $obj= new Database;
  $resultado = $obj->connect("select * from movimentacoes WHERE TIPO like '$tipo' and CATEGORIA like '$categoria' order by tipo DESC, data_vencimento asc");
  $mesTela = "<b>$mes de $ano</b>";   
}

?>
        
   
<!-- Pesquisa de data -->
<div class="ls-box-filter">
  <form method="post" action="pesquisa.php?clicoupesquisa=1"  class="ls-form ls-form-inline">
    <label class="ls-label col-md-2 col-sm-2">
      <b class="ls-label-text">Período</b>
      <input type="text" name="periodo_inicial" class="datepicker ls-daterange" id="datepicker1" data-ls-daterange="#datepicker2">
    </label>

    <label class="ls-label col-md-2 col-sm-2">
      <b class="ls-label-text">a</b>
      <input type="text" name="periodo_final" class="datepicker ls-daterange" id="datepicker2">
    </label>

    <label class="ls-label col-md-3 col-sm-3">
      <b class="ls-label-text">Categoria</b>
      <div class="ls-custom-select">
        <select name="categoria" class="ls-select">
          <option>Todas</option>
          <option>Alimentação</option>
          <option>Supermercado</option>
          <option>Farmácia</option>
          <option>Combustível</option>
        </select>
      </div>
    </label>
    
    <label class="ls-label col-md-2 col-sm-2">
      <b class="ls-label-text">Tipo</b>
      <div class="ls-custom-select ">
        <select name="tipo" class="ls-select">
          <option>Todas</option>
          <option>Receitas</option>
          <option>Despesas</option>
        </select>
      </div>
    </label>

    <div class="ls-actions-btn">
    <input type="submit" value="Filtrar" class="ls-btn" title="Filtrar">
    </div>
  </form>
</div>
<!-- End Pesquisa de data -->   




<div class="ls-box ls-board-box">
  <header class="ls-info-header">
      <h2 class="ls-title-3">Lista das Receitas e Despesas:</h2>
      <ol class="ls-breadcrumb">
          <li><a href="pesquisa.php?mesFiltro=01">Janeiro</a></li>
          <li><a href="pesquisa.php?mesFiltro=02">Fevereiro</a></li>
          <li><a href="pesquisa.php?mesFiltro=03">Março</a></li>
          <li><a href="pesquisa.php?mesFiltro=04">Abril</a></li>
          <li><a href="pesquisa.php?mesFiltro=05">Maio</a></li>
          <li><a href="pesquisa.php?mesFiltro=06">Junho</a></li>
          <li><a href="pesquisa.php?mesFiltro=07">Julho</a></li>
          <li><a href="pesquisa.php?mesFiltro=08">Agosto</a></li>
          <li><a href="pesquisa.php?mesFiltro=09">Setembro</a></li>
          <li><a href="pesquisa.php?mesFiltro=10">Outubro</a></li>
          <li><a href="pesquisa.php?mesFiltro=11">Novembro</a></li>
          <li><a href="pesquisa.php?mesFiltro=12">Dezembro</a></li>
      </ol>
      <div align="right"> <a href="novamovimentacao.php" class="ls-btn-primary">Nova Movimentação</a>        </div>
  </header>
<h5 class="ls-title-5"><center><?php echo "$mesTela"; ?></center></h5>


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


<?php
  include_once "lib/funcoes.php";
  include_once "lib/conexao_banco.php";
  
 

  while($linha=mysqli_fetch_array($resultado))
   {
     $idFINANCAS = $linha['idFINANCAS'];
     $tipo=$linha['TIPO'];
     $descricao=$linha['DESCRICAO'];
     $valor=$linha['VALOR'];
     $categoria=$linha['CATEGORIA'];
     $data_pagamento=$linha['DATA_PAGAMENTO'];
     $data_vencimento=$linha['DATA_VENCIMENTO'];
     $forma_pagamento=$linha['FORMA_PAGAMENTO'];
     $conta=$linha['CONTA'];
     $parcela=$linha['PARCELA'];
     $parcelado=$linha['PARCELADO'];
     $situacao=$linha['SITUACAO'];


    if($situacao == "PAGO")
    {
    echo "      
    <tr>
      <td>$tipo</td>
      <td>$descricao</td>
      <td>R$ $valor</td>
      <td>$data_pagamento</td>
      <td>$data_vencimento</td>
      <td style='color:green;'><a href='#' style='color:green;'>$situacao</a></td>
      <td><a href='#' class='ls-tag-warning ls-btn-xs'>Editar</a><a href='#' class='ls-tag-danger ls-btn-xs'>Excluir</a></td>
    </tr>";
    }else{
      echo "      
    <tr>
      <td>$tipo</td>
      <td>$descricao</td>
      <td>R$ $valor</td>
      <td>$data_pagamento</td>
      <td>$data_vencimento</td>
      <td style='color:red;'><a href='#' style='color:red;'>$situacao</a></td>
      <td><a href='#' class='ls-tag-warning ls-btn-xs'>Editar</a><a href='#' class='ls-tag-danger ls-btn-xs'>Excluir</a></td>
    </tr>";
    }
  }


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