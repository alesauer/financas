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
        <h1 class="ls-title-intro ls-ico-home">Forma de Pagamentos</h1>

        
<?php
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



  $obj= new Database;
  $resultado = $obj->connect("select * from forma_pagamento");


?>
        
   

<!--
  MODAL NOVO...
-->

<div class="ls-box ls-board-box">

  <header class="ls-info-header">
    <p class="ls-float-right ls-float-none-xs"> <button  data-ls-module="modal" data-action="lib/insere_forma_pagamentos.php"  data-content="
    
        <fieldset>
            <label class='ls-label col-md-5'>
              <b class='ls-label-text'>Forma de Pagamento</b>
              <input type='text' name='FORMA_PAGAMENTO' placeholder='Forma de Pagamento' required >
            </label>
            
            <label class='ls-label col-md-5'>
              <b class='ls-label-text'>Descrição</b>
              <input type='text' name='DESC_FORMA_PAGAMENTO' placeholder='Descrição' required >
            </label>
            
                  
            <label class='ls-label col-md-5'>
              <b class='ls-label-text'>Tipo</b>
              <div class='ls-custom-select'>
                <select name='TIPO' class='ls-select'>
                  <option>Crédito</option>
                  <option>Débito</option>
                  <option>Outros</option>
                </select>
              </div>  
            </label>

           
                <label class='ls-label col-md-5'>
                  <b class='ls-label-text'>Dia Fechamento da Fatura</b>
                  <input type='text' name='DIA_FECHAMENTO_FATURA_CC' placeholder='(1 a 31) se crédito' required >
                </label>
                
                <label class='ls-label col-md-5'>
                  <b class='ls-label-text'>Dia Vencimento da Fatura</b>
                  <input type='text' name='DIA_VENCIMENTO_CC' placeholder='(1 a 31) se crédito' required >
                </label>
        </fieldset>
      " 

      data-title="Inserir Forma de Pagamento" 
      data-class="ls-btn-danger" 
      data-save="Salvar Alteração" 
      data-close="Fechar" 
      class="ls-btn-primary ">Nova</button>
     

    <h2 class="ls-title-3">Lista das Formas de Pagamentos</h2>
  </header>

<!--
  END MODAL NOVO...
-->







<table class="ls-table ls-no-hover ls-sm-space ls-table-striped">
  <thead>
    <tr>
      <th>Forma de Pagamento</th>
      <th>Descrição</th>
      <th>Tipo</th>
      
      <th>Ação</th>
      <th></th>
    </tr>
  </thead>
  <tbody>


<?php
  include_once "lib/funcoes.php";
  include_once "lib/conexao_banco.php";
  
 

  while($linha=mysqli_fetch_array($resultado))
   {
     $id=$linha['id'];
     $FORMA_PAGAMENTO=$linha['FORMA_PAGAMENTO'];
     $DESC_FORMA_PAGAMENTO=$linha['DESC_FORMA_PAGAMENTO'];
     $TIPO=$linha['TIPO'];
   
     if($TIPO=="CC"){ $TIPO_FORMATADO="Crédito"; }else{ $TIPO_FORMATADO="Débito"; }


    echo "      
    <tr>
      <td><a href='' title=''>$FORMA_PAGAMENTO</a></td>
      <td class='hidden-xs'>$DESC_FORMA_PAGAMENTO</td>
      <td>$TIPO_FORMATADO</td>
      <td>
        <button data-ls-module='modal' data-action='lib/exclui_forma_pagamento.php?id=$id' data-content='<h2>Tem certeza da exclusão deste registro?</h2><p>O registro não poderá ser restaurado após esse procedimento.</p>' data-title='Excluir registro' data-class='ls-btn-primary' data-save='Excluir' data-close='Fechar' class='ls-btn-primary ls-btn-xs'>Excluir</button>
      </td>
      <td></td>
    </tr>";
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