<?php
include("lib/sessao.php");
include("config.php");

if($perfil <> "1")
{
 header("Location:principal.php");
 logs ( $perfil , "ACESSO AREA ADM" , "ERRO" ,$IP ); 
 exit;
}


?>


<!DOCTYPE html>
<html class="ls-theme-orange">


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
        <h1 class="ls-title-intro ls-ico-text">Logs</h1>


<?php
if (isset($_REQUEST["clicoupesquisa"]) == "1")
{
  $pesquisa=$_REQUEST["pesquisa"];  
  $sql = "select * from vlogs_alterasenha where COD_USUARIOS_SISTEMA like '%$pesquisa%' order by HORA_LOGS DESC";
   
}else{
  $sql = "select * from logs_2 where TIPO_LOGS='TROCA DE SENHA' order by HORA_LOGS DESC";
}
?>        
      

<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <p class="ls-float-right ls-float-none-xs"> <button  data-ls-module="modal" data-action="lib/clean_logs_altera_senha.php?user_loged=<?php echo $_SESSION['login']; ?>"  data-content="
    
        <fieldset>
    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Apagar esses registros?</b>
    </label>
    
  </fieldset>
      " 

      data-title="Excluir Registros" 

      data-class="ls-btn-danger" 

      data-save="Apagar Registros" 

      data-close="Fechar" 

      class="ls-btn-primary "> Limpar esses Registros </button>
    <h2 class="ls-title-3">Registros de Alterações de Senhas</h2>
  </header>




<!-- Pesquisa -->
<br>
   <form  method="post" action="logs_altera_senha.php?clicoupesquisa=1" class="ls-form ls-form-inline ls-float-right">
    <label class="ls-label" role="search">
      <b class="ls-label-text ls-hidden-accessible">Busca usuário...</b>
      <input type="text" id="pesquisa" name="pesquisa" aria-label="Faça sua busca por cliente" placeholder="Busca..." class="ls-field-sm">
    </label>
    <div class="ls-actions-btn">
      <input type="submit" value="Buscar" class="ls-btn-primary ls-btn-sm" title="Buscar">
    </div>
  </form>
<!-- End Pesquisa -->




<table class="ls-table ls-no-hover ls-sm-space ls-table-striped">
  <thead>
    <tr>
      <th>Usuário</th>
      <th>Data / Hora</th>
      <th class="hidden-xs">Tipo</th>
      <th>Ação</th>
      <th>IP</th>

    </tr>
  </thead>
  <tbody>

<?php
  include_once "lib/funcoes.php";
  include_once "lib/conexao_banco.php";





  $resultado=conecta($maquina,$usuario,$senha,$banco,$sql);

  while($linha=mysql_fetch_array($resultado))
   {

     $nome=$linha['COD_USUARIOS_SISTEMA'];
     $datahora=$linha['HORA_LOGS'];
     $tipo=$linha['TIPO_LOGS'];
     $acao=$linha['ACAO'];
     $ipacesso=$linha['IP_LOGS'];

//     if($acao=="ERRO") { }

    echo "      
    <tr>
      <td><a href='' title=''>$nome</a></td>
      <td class='hidden-xs'>$datahora</td>
      <td>$tipo</td>
      <td>$acao</td>
      <td>$ipacesso</td>
      
    </tr>";

  }


?>

</tbody>
</table>
  </div>



<!-- Paginacao -->
<div class="ls-pagination-filter">
  <ul class="ls-pagination">
    <li><a href="#">&laquo; Anterior</a></li>

<?php

for ($i=0;$i<$paginacao;$i++) {
$j=$i+1;
echo "<li><a href='#'>$j</a></li>"; }
?>

    <li><span class="ls-gap">...</span></li>
    <li><a href="#">Próximo &raquo;</a></li>
  </ul>
</div>
<!-- End Paginacao -->



<!-- Paginacao 

<div class="ls-pagination-filter">
  <ul class="ls-pagination">
    <li><a href="#">&laquo; Anterior</a></li>
    <li><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li><span class="ls-gap">...</span></li>
    <li><a href="#">Próximo &raquo;</a></li>
  </ul>
</div>
End Paginacao -->





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