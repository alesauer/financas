<?php
include("lib/sessao.php");
include("config.php");
include_once("lib/database.php");

$forma_pagamento = $_REQUEST["forma_pagamento"];
$mesFiltro = $_REQUEST["mesFiltro"];
$idFINANCAS = $_REQUEST["idFINANCAS"];

$ano = date("Y");



if (isset($_REQUEST["clicouExcluiCC"]) == "1")
{
  $obj= new Database;
  $resultado = $obj->connect("delete from movimentacoes WHERE idFINANCAS='$idFINANCAS'");
  echo "delete from movimentacoes WHERE idFINANCAS='$idFINANCAS";
}


if (isset($_REQUEST["clicouExcluiTodosCC"]) == "1")
{
  echo "$mesFiltro  ||";
  $obj= new Database;
  $resultado = $obj->connect("delete from movimentacoes WHERE forma_pagamento='$forma_pagamento' and MONTH(DATA_VENCIMENTO)=$mesFiltro AND YEAR(DATA_VENCIMENTO)=$ano");
  echo "delete from movimentacoes WHERE forma_pagamento='$forma_pagamento' and MONTH(DATA_VENCIMENTO)=$mesFiltro AND YEAR(DATA_VENCIMENTO)=$ano";
}





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


  <!-- Nome do produto/marca sem sidebar quando for o pre-painel  -->
</div>
 

 <aside class="ls-sidebar">

  <div class="ls-sidebar-inner">
      <a href="#"  class="ls-go-prev"><span class="ls-text">Voltar à lista de serviços</span></a>
   
        <?php include("modules/menu.php"); ?>

  </div>
</aside>


    <main class="ls-main ">
      <div class="container-fluid">
        <h1 class="ls-title-intro ls-ico-stats">Cartão de Crédito <?php echo "$forma_pagamento";  ?> </h1>

      
<?php

if (isset($_REQUEST["situacao"]) == "1"){
  $mensagem=$_REQUEST["mensagem"];  
  echo "$mensagem";
}
  
if (isset($_REQUEST["situacao_edit"]) == "1"){
  $mensagem=$_REQUEST["mensagem"];  
  echo "$mensagem";
}

?>

<div class="ls-box">



<?php
$obj_lp = new Financeiro; 
$p_mes = $obj_lp->get_lista_parcelamentos_mes(); 
$p_valor = $obj_lp->get_lista_parcelamentos_valor();
?>


   <h4 class="ls-title">Valor Gasto do mês  
        <?php 
     
      $forma_pagamento_cc = $forma_pagamento;
  
        
        
            $objcc1 = new Financeiro;  
            $valorCC = $objcc1->get_saldo_pagamentos_credito($forma_pagamento_cc,$mesFiltro);
        
            $ano = date("Y");

      echo "no cartão <b>$forma_pagamento_cc</b>: R$ $valorCC no mês <b>$mesFiltro</b>.";?></h4>
      </div>

      <a href="tabelamovimentacoes.php?mesFiltro=<?php $mesNum = date("m"); echo $mesNum;?>" class="ls-btn-dark ls-btn-sm" role="button" aria-pressed="true">Fechar</a>
      <a href="#" class="ls-btn-primary ls-btn-sm" role="button" aria-pressed="true">Importar</a>
      <a href="cartoesCredito.php?clicouExcluiTodosCC=1&idFINANCAS=00&mesFiltro=<?php echo "$mesFiltro";?>&forma_pagamento=<?php echo "$forma_pagamento";?>" class="ls-btn-danger ls-btn-sm" role="button" aria-pressed="true">Apagar registros deste mês</a>
      


          <table class="ls-table ls-no-hover ls-table-striped">
        <thead>
          <tr>
            <th>Descrição</th>
            <th class="hidden-xs">Valor</th>
            <th class="hidden-xs">Categoria</th>
            <th class="hidden-xs">Ação</th>
          </tr>
        </thead>
        <tbody>
            <?php
                    $mes = $mesFiltro;
                    $ano = date("Y");

                    $obj = new Database;
                    $result = $obj->connect("SELECT * FROM movimentacoes WHERE USOU_CC='1' AND YEAR(DATA_VENCIMENTO)='$ano'
                    AND MONTH(DATA_VENCIMENTO)='$mesFiltro' AND forma_pagamento = '$forma_pagamento_cc'");
                    
                    $obj_f= new Formats;
                    
                    while($linha=mysqli_fetch_array($result))
                    {
                        $idFINANCAS = $linha['idFINANCAS'];
                        $c_valor = $linha['VALOR'];
                        $c_desc = $linha['DESCRICAO'];
                        $c_cat = $linha['CATEGORIA'];

                        echo "<tr><td>$c_desc</td>";
                        echo "<td>R$ $c_valor</td>";
                        echo "<td class='hidden-xs'>$c_cat</td>";
                        echo "<td>
                        <button data-ls-module='modal' data-action='cartoesCredito.php?clicouExcluiCC=1&idFINANCAS=$idFINANCAS&mesFiltro=$mesFiltro&forma_pagamento=$forma_pagamento' data-content='<h2>Deseja excluir o registro?</h2><br><p>Os dados serão apagados definitivamente! Caso esse registro tenha parcelamento, <b>todos</b> os parcelamentos serão excluídos.</p>' data-title='Excluir' data-class='ls-btn-primary' data-save='Excluir' data-close='Fechar' class='ls-btn-primary-danger ls-btn-xs ls-ico-remove'>Excluir</button>
                        </td></tr>";
                    }
            ?>  
        </tbody>
      </table>
   
    <div class="ls-modal-footer">

      
    </div>
  </div>
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