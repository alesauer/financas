<?php
include("lib/sessao.php");
include("config.php");
include_once ("lib/database.php");
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
        <h1 class="ls-title-intro ls-ico-home">Movimentaçoes</h1>

      
<?php

if (isset($_REQUEST["situacao_add"]) == "1")
{
  $mensagem=$_REQUEST["mensagem"];  
  echo "$mensagem";
}      
?>


<div class="ls-box ls-board-box">

<ul class="ls-tabs-nav">
  <li class="ls-active"><a data-ls-module="tabs" href="#receita">Receitas</a></li>
  <li><a data-ls-module="tabs" href="#despesa">Despesas</a></li>
  <!-- <li><a data-ls-module="tabs" href="#investimentos">Investimentos</a></li> -->
  
</ul>
<div class="ls-tabs-container">
  <div id="receita" class="ls-tab-content ls-active">
    
  <header class="ls-info-header">

     <h2 class="ls-title-3">Registrar nova Receita</h2>

    <form action="lib/insere_movimentacao.php" type="post" class="ls-form row">
  <fieldset>


  <input type="text" name="TIPO" value="Receitas" hidden placeholder="Descrição da compra" required >

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Descrição:</b>
      <input type="text" name="DESCRICAO" placeholder="Descrição da compra" required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Valor:</b>
      <input type="text" name="VALOR" placeholder="R$ 0,00" class="ls-mask-money" required >
    </label>


    <label class="ls-label col-md-3">
      <b class="ls-label-text">Categoria:</b>
      <div class="ls-custom-select">
        <select name="CATEGORIA" class="ls-select">
        <?php

            $obj = new Financeiro;
            $categoria = $obj->get_categorias_receita();
            foreach($categoria as $cat)
            {
                echo "<option>$cat</option>";
            }
        ?>


        </select>
      </div>
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Data Pagamento:</b>
      <input type="text" name="DATA_PAGAMENTO" class="datepicker" id="datepickerExample"  placeholder="dd/mm/aaaa">
    </label>


    <label class="ls-label col-md-3">
      <b class="ls-label-text">Forma de Pagamento:</b>
      <div class="ls-custom-select">
        <select name="FORMA_PAGAMENTO" class="ls-select">
          <option>Depósito em Conta Corente </option>
          <option>Outros</option>
        </select>
      </div>
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Conta:</b>
      <div class="ls-custom-select">
        <select name="CONTA" class="ls-select">
          <option>Lu</option>
          <option>Kiki</option>
        </select>
      </div>
    </label>


    <label class="ls-label col-md-3">
      <b class="ls-label-text">Adicionar entrada recorrente: (meses)</b>
      <div class="ls-custom-select">
        <select name="PARCELA" class="ls-select">
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
        </select>
      </div>
    </label>



    <label class="ls-label col-md-3">
      <b class="ls-label-text">Situação:</b>
      <div class="ls-custom-select">
        <select name="SITUACAO" class="ls-select">
          <option>PENDENTE</option>
          <option>PAGO</option>
        </select>
      </div>
    </label>



  <input type="submit" value="Cadastrar" class="ls-btn-primary ls-btn-sm">
  <a href="tabelamovimentacoes.php?mesFiltro=<?php $mesNum = date("m"); echo $mesNum;?>" class="ls-btn-dark ls-btn-sm" role="button" aria-pressed="true">Cancelar</a>
  </form>

  </fieldset>
  </header>

  </div>




  <div id="despesa" class="ls-tab-content">

  <header class="ls-info-header">

     <h2 class="ls-title-3">Registrar nova Despesa</h2>

    <form action="lib/insere_movimentacao.php" type="post" class="ls-form row">
  <fieldset>


  <input type="text" name="TIPO" value="Despesas" hidden placeholder="Descrição da compra" required >

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Descrição:</b>
      <input type="text" name="DESCRICAO" placeholder="Descrição da compra" required >
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Valor:</b>
      <input type="text" name="VALOR" placeholder="R$ 1000.00" class="ls-mask-money" required >
    </label>


    <label class="ls-label col-md-3">
      <b class="ls-label-text">Categoria:</b>
      <div class="ls-custom-select">
        <select name="CATEGORIA" class="ls-select">
          
        <?php

            $obj = new Financeiro;
            $categoria = $obj->get_categorias();
            foreach($categoria as $cat)
            {
                echo "<option>$cat</option>";
            }
        ?>

        </select>
      </div>
    </label>



<input type="text" name="DATA_PAGAMENTO" value="1999-01-01" class="datepicker" id="datepickerExample" hidden>    

<!--    
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Data da Compra:</b>
      <input type="text" name="DATA_PAGAMENTO" class="datepicker" id="datepickerExample"  placeholder="dd/mm/aaaa">
    </label>
-->

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Data do Vencimento:</b>
      <input type="text" name="DATA_VENCIMENTO" class="datepicker" id="datepickerExample" placeholder="dd/mm/aaaa">
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Forma de Pagamento:</b>
      <div class="ls-custom-select">
        <select name="FORMA_PAGAMENTO" class="ls-select">
            <?php
              $obj = new Financeiro;
              $forma_pagamento = $obj->get_forma_pagamentos();
              foreach($forma_pagamento as $f_pag)
              {
                  echo "<option>$f_pag</option>";
              }
            ?>

        </select>
      </div>
    </label>
   
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Conta:</b>
      <div class="ls-custom-select">
        <select name="CONTA" class="ls-select">
          <option>Lu</option>
          <option>Kiki</option>
        </select>
      </div>
    </label>

    <label class="ls-label col-md-3">
      <b class="ls-label-text">Parcela(s):</b>
      <div class="ls-custom-select">
        <select name="PARCELA" class="ls-select">
          <option>01</option>
          <option>02</option>
          <option>03</option>
          <option>04</option>
          <option>05</option>
          <option>06</option>
          <option>07</option>
          <option>08</option>
          <option>09</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
        </select>
      </div>
    </label>


  <fieldset>
    <!-- Exemplo com Radio button -->
    <div class="ls-label col-md-5">
      <p><b>Tipo de entrada:</b></p>
      <label class="ls-label-text">
        <input type="radio" name="parcelamento">
        Parcelamento
      </label>
      <label class="ls-label-text">
        <input type="radio" name="recorrente">
        Recorrente
      </label>
      </div>
  </fieldset>




    
    <label class="ls-label col-md-3">
      <b class="ls-label-text">Situação:</b>
      <div class="ls-custom-select">
        <select name="SITUACAO" class="ls-select">
          <option>PENDENTE</option>
          <option>PAGO</option>
        </select>
      </div>
    </label>

  



  <input type="submit" value="Cadastrar" class="ls-btn-primary ls-btn-sm">  
  <a href="tabelamovimentacoes.php?mesFiltro=<?php $mesNum = date("m"); echo $mesNum;?>" class="ls-btn-dark ls-btn-sm" role="button" aria-pressed="true">Cancelar</a>
  

</form>

  </form>
  </fieldset>
  </header>

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