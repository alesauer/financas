<?php
include("lib/sessao.php");
include("config.php");
include("lib/funcoes.php");
include ("lib/conexao_banco.php");
include ("lib/verip.php");


// VerificaAcesso - So acessa se perfil for adm || 0  -> Pega o perfil da sessao, que esta na variavel $perfil em config.php  
if($perfil <> "1")
{
 header("Location:principal.php");
 logs ( $perfil , "ACESSO AREA ADM" , "ERRO" ,$IP ); 
 exit;
}
// End VerificaAcesso



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
        <h1 class="ls-title-intro ls-ico-cog">Configurações do Sistema</h1>




<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <p class="ls-float-right ls-float-none-xs ls-small-info">Valido até <strong>01.05.2014</strong></p>
    <h2 class="ls-title-3">Opções</h2>
  </header>

  <div id="sending-stats" class="row">
    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4"><b>Usuários e Autenticação</b></h6>
        </div>
        <div class="ls-box-footer">
          <a href="logs_usuario.php" class="ls-btn ls-btn-xs">Configurar</a>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4"><b>E-mails</b></h6>
        </div>
     
        <div class="ls-box-footer">
          <a href="#" class="ls-btn ls-btn-xs">Configurar</a>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4"><b>Outras</b></h6>
        </div>
        <div class="ls-box-footer">
          <a href="#" class="ls-btn ls-btn-xs">Configurar</a>
        </div>
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