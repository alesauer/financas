<?php
include("lib/sessao.php");
include("config.php");
include_once ("lib/database.php");
$idFINANCAS = $_REQUEST['idFINANCAS'];
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
        <h1 class="ls-title-intro ls-ico-home">Editar Movimentação</h1>


<fieldset>



     
<?php
   $obj= new Database;
   $resultado = $obj->connect("select * from movimentacoes WHERE idFINANCAS='$idFINANCAS'");

   

  while($linha=mysqli_fetch_array($resultado))
  {
    $idFINANCAS = $linha['idFINANCAS'];
    $tipo=$linha['TIPO'];
    $descricao=$linha['DESCRICAO'];
    $valor=number_format($linha['VALOR'],2,",",".");
    $categoria=$linha['CATEGORIA'];
    $data_pagamento=$linha['DATA_PAGAMENTO'];
    $data_vencimento=$linha['DATA_VENCIMENTO'];
    $forma_pagamento=$linha['FORMA_PAGAMENTO'];
    $conta=$linha['CONTA'];
    $parcela=$linha['PARCELA'];
    $parcelado=$linha['PARCELADO'];
    $situacao=$linha['SITUACAO'];
  }  

?>

<form action="lib/edita_movimentacao.php" type="post" class="ls-form row">

<input type='text' name='idFINANCAS' value='<?php echo $idFINANCAS;?>' hidden>


<label class='ls-label col-md-5'>
      <b class='ls-label-text'>Status</b>
      <div class='ls-custom-select'>
        <select name='TIPO' class='ls-select'>
          <option><?php echo $tipo;?></option>
          <option>Receitas</option>
          <option>Despesas</option>
        </select>
        </div>    
     </label>


    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Descrição</b>
      <input type='text' name='DESCRICAO' value='<?php echo $descricao;?>'  required >
    </label>
    

    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Valor (2222.34)</b>
      <input type='text' name='VALOR' value='<?php echo $valor;?>' required >
    </label>

    <label class='ls-label col-md-5'>
    <b class='ls-label-text'>Categoria</b>
      <div class='ls-custom-select'>
        <select name='CATEGORIA' class='ls-select'>
          <option><?php echo $categoria;?></option>
          <?php

            $obj = new Financeiro;
            if($$tipo=="Receitas"){
              $categoria = $obj->get_categorias_receita();
            }else{
              $categoria = $obj->get_categorias();
            }
            

            foreach($categoria as $cat)
            {
                echo "<option>$cat</option>";
            }
          ?>
        </select>
        </div>    
    </label>

    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Data Pagamento</b>
      <input type='text' name='DATA_PAGAMENTO' class='ls-mask-cpf' value='<?php echo $data_pagamento;?>' required >
    </label>

    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Data Vencimento</b>
      <input type='text' name='DATA_VENCIMENTO' value='<?php echo $data_vencimento;?>' required >
    </label>
    
    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Forma de Pagamento</b>
      <input type='text' name='FORMA_PAGAMENTO' value='<?php echo $forma_pagamento;?>' required >
    </label>
   

    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Conta</b>
      <div class='ls-custom-select'>
        <select name='CONTA' class='ls-select'>
          <option>Lu</option>
          <option>Kiki</option>
        </select>
        </div>    
    </label>

    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Situação</b>
      <div class='ls-custom-select'>
        <select name='SITUACAO' class='ls-select'>
          <option>PAGO</option>
          <option>PENDENTE</option>
        </select>
        </div>    
    </label>

  </fieldset>

  <input type="submit" value="Alterar" class="ls-btn-primary ls-btn-sm">
  
  <a href="tabelamovimentacoes.php?mesFiltro=<?php $mesNum = date("m"); echo $mesNum;?>" class="ls-btn-dark ls-btn-sm" role="button" aria-pressed="true">Cancelar</a>

</form>




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