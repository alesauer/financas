<?php
include("lib/database.php");
include("lib/sessao.php");
include("config.php");
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
        <h1 class="ls-title-intro ls-ico-home">Parcelamentos no Cartão de Crédito </h1>

      
    
<?php  $obj = new Financeiro; ?>





<!--
######################  
/.modal parcelamentos
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
      <h4 class="ls-modal-title">Total de Parcelamentos de  <?php //echo "$ano: R$ $Parcelamentos";?></h4>
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
         
     
        </tbody>
      </table>
    </div>
    <div class="ls-modal-footer">
      <button class="ls-btn ls-float-right" data-dismiss="modal">Close</button>
      <button type="submit" class="ls-btn-primary">Save changes</button>
    </div>
  </div>
</div>

<!-- /.modal -->





<!-- Parcelamentos -->
<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3">Parcelamentos nos Cartões: <?php echo date("Y"); ?></h2>
  </header>

  <div class="col-md-12"> 
  <table class="ls-table ls-table-striped">
  <thead>
    <tr>
      <th>Parcela</th>
      <th class="hidden-xs">Jan</th>
      <th class="hidden-xs">Fev</th>
      <th class="hidden-xs">Mar</th>
      <th class="hidden-xs">Abr</th>
      <th class="hidden-xs">Mai</th>
      <th class="hidden-xs">Jun</th>
      <th class="hidden-xs">Jul</th>
      <th class="hidden-xs">Ago</th>
      <th class="hidden-xs">set</th>
      <th class="hidden-xs">Out</th>
      <th class="hidden-xs">Nov</th>
      <th class="hidden-xs">Dez</th>
    </tr>
  </thead>

  <tbody>

<?php
     $obj= new Database;
     $resultado = $obj->connect("select DESCRICAO, month(DATA_VENCIMENTO) AS MES, VALOR from movimentacoes where ((TIPO = 'Despesas') and (PARCELADO <> '0') and (year(DATA_VENCIMENTO) = year(NOW()))) AND PARCELADO <>'0' AND USOU_CC = '1'");
     
    
     while($linha=mysqli_fetch_array($resultado))
     {
      echo "<tr>";
      $DESCRICAO = $linha['DESCRICAO'];
      $VALOR = $linha['VALOR'];
      echo "<td class='hidden-xs'>$DESCRICAO</td>";
      echo "<td class='hidden-xs'>$VALOR</td>";
      echo "</tr>";
     }
     

?>



  </tbody>
</table>
</div>
</div>

<!-- End Parcelamentos -->

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