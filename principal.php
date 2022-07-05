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
        <h1 class="ls-title-intro ls-ico-home">Painel Geral</h1>

      
    
<?php  $obj = new Financeiro; ?>

<!-- Dados Gerais -->
<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3">Dados Gerais: <?php $mesNum = date("M/Y"); echo $mesNum;?></h2>
    
  </header>

  <div id="sending-stats" class="row">

  <?php $objF = new Financeiro; $Receita = $objF->get_receita(date('m'),date('Y')); $Despesas = $objF->get_despesa(date('m'),date('Y')); ?>


    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">Receitas</h6>
        </div>
        <div class="ls-box-body">
          <strong>R$ <?php echo $Receita; ?></strong>
          <small>recebimentos do mês</small>
        </div>
        <div class="ls-box-footer">
          <a href="#" aria-label="Mudar o Plano de Revenda" class="ls-btn ls-btn-sm" title="Mudar o Plano de Revenda">Ver mais</a>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">Despesas</h6>
        </div>
        <div class="ls-box-body">
          <strong>R$ <?php echo "$Despesas"; ?></strong>
          <small>gastos do mês</small>
        </div>
        <div class="ls-box-footer">
          <a href="#" aria-label="Mudar o Plano de Revenda" class="ls-btn ls-btn-sm" title="Mudar o Plano de Revenda">Ver mais</a>
        </div>
      </div>
    </div>

    
    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">Investimentos</h6>
        </div>
        <div class="ls-box-body">
          <strong>R$ 0.00</strong>
          <small>investidos no mês</small>
        </div>
        <div class="ls-box-footer">
          <a href="#" aria-label="Mudar o Plano de Revenda" class="ls-btn ls-btn-sm" title="Mudar o Plano de Revenda">Ver mais</a>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">Total de Parcelamentos</h6>
        </div>
        <div class="ls-box-body">
          <strong>R$ <?php echo $obj->get_total_parcelamentos_mes(date("m")); ?></strong>
          <small>valor dos parcelamentos no mês</small>
        </div>
        <div class="ls-box-footer">
           <button data-ls-module="modal" data-target="#parcelamentos" class="ls-btn ls-btn-small">Ver mais</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end Dados Gerais -->




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
            <?php
                    $obj = new Database;
                    $result = $obj->connect("SELECT * from V_PARCELAMENTOS_TOTAL_ANO_ATUAL");

                    $obj_f= new Formats;
                    
                    while($linha=mysqli_fetch_array($result))
                    {
                        $p_valor = $linha['VALOR'];
                        $p_mes = $obj_f->convert_mes_num_nome($linha['MES']);
                        echo "<tr><td><a href='' title=''>$p_mes</a></td>";
                        echo "<td class='hidden-xs'>R$ $p_valor</td></tr>";
                    }
            ?>  
     
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
















<!-- Graficos -->

<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3">Maiores Informações<?php //echo date("M"); ?></h2>
  </header>


<div class="row">
  <div class="col-md-5"> <embed src="lib/graficos/desempenhoAnualLinha.php" width="750" height="300" frameborder="0"/>  </div>
  <div class="col-md-3"> <embed src="lib/graficos/gastos_categoria.php" width="400" height="250" frameborder="0"/>  </div>

  <div class="col-md-4"> 
      <header class="ls-info-header">
        <h3 class="ls-title-5">Maiores Despesas</h3>
        <a href="#" class="ls-btn ls-btn-xs">Ver todas</a>
          <table class="ls-table">
            <thead>
              <th>Despesa</th>
              <th>Valor</th>
            </thead>
            <tbody>
              <tr>
                <td><a href="#">Celular</a> </td>
                <td>R$ 124.23</td>
              </tr>
              <tr>
                <td><a href="#">Cemig</a> </td>
                <td>R$ 102,56</td>
              </tr>
              <tr>
                <td><a href="#">Copasa</a> </td>
                <td>R$ 98,23</td>
              </tr>
            </tbody>
          </table>
      </header>
   </div>
</div>
</div>
</div>
<!-- End Graficos -->



<!-- Parcelamentos -->
<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <h2 class="ls-title-3">Parcelamentos nos Cartões<?php //echo date("Y"); ?></h2>
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
    <tr>
      <td><a href="" title="">Smiles</a></td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
      <td class="hidden-xs">R$ 42,00</td>
    </tr>

    <tr>
      <td><a href="" title="">Galo na Veia</a></td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
      <td class="hidden-xs">R$ 32,00</td>
    </tr>

 <tr>
      <td><a href="" title="">Sky</a></td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
      <td class="hidden-xs">R$ 132,00</td>
    </tr>

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