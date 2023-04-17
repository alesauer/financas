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
        <h1 class="ls-title-intro ls-ico-home">Categorias - Receitas</h1>

        
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
  $resultado = $obj->connect("select * from categoria_receita order by DESC_CATEGORIA asc");


?>
        
   

<!--
  MODAL NOVO...
-->

<div class="ls-box ls-board-box">

  <header class="ls-info-header">
    <p class="ls-float-right ls-float-none-xs"> <button  data-ls-module="modal" data-action="lib/insere_categorias_receitas.php"  data-content="
    
        <fieldset>
            <label class='ls-label col-md-5'>
              <b class='ls-label-text'>Categoria</b>
              <input type='text' name='DESC_CATEGORIA' placeholder='Nome da Categoria' required >
            </label>
            
            <label class='ls-label col-md-5'>
              <b class='ls-label-text'>Observação</b>
              <input type='text' name='OBS_CATEGORIA' placeholder='Observação' required >
            </label>
            
   
        </fieldset>
      " 

      data-title="Inserir Forma de Pagamento" 
      data-class="ls-btn-danger" 
      data-save="Salvar Alteração" 
      data-close="Fechar" 
      class="ls-btn-primary ">Nova</button>
     

    <h2 class="ls-title-3">Lista das Categorias de Receita</h2>
  </header>

<!--
  END MODAL NOVO...
-->



<table class="ls-table ls-no-hover ls-sm-space ls-table-striped">
  <thead>
    <tr>
      <th>Categoria</th>
      <th>Observação</th>
      
      
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
     $DESC_CATEGORIA=$linha['DESC_CATEGORIA'];
     $OBS_CATEGORIA=$linha['OBS_CATEGORIA'];
   


    echo "      
    <tr>
      <td><a href='' title=''>$DESC_CATEGORIA</a></td>
      <td class='hidden-xs'>$OBS_CATEGORIA</td>
  
      <td>
        <button data-ls-module='modal' data-action='lib/exclui_categorias_receitas.php?id=$id' data-content='<h2>Tem certeza da exclusão deste registro?</h2><p>O registro não poderá ser restaurado após esse procedimento.</p>' data-title='Excluir registro' data-class='ls-btn-primary' data-save='Excluir' data-close='Fechar' class='ls-btn-primary ls-btn-xs'>Excluir</button>
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