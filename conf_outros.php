<?php
include("lib/sessao.php");
include("config.php");
include("lib/funcoes.php");
include ("lib/conexao_banco.php");
include ("lib/verip.php");
include_once ("lib/database.php");



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
        <h1 class="ls-title-intro ls-ico-home">Configurações Gerais do Sistema</h1>




<div class="ls-box ls-board-box">
  <header class="ls-info-header">
    <p class="ls-float-right ls-float-none-xs ls-small-info">Valido até <strong>01.05.2014</strong></p>
    <h2 class="ls-title-3">Configurações</h2>
  </header>

  <div id="sending-stats" class="row">
    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">Categorias</h6>
        </div>
        <div class="ls-box-body">
          <span class="ls-board-data">

           <?php
              $obj= new Database;
              $resultado = $obj->connect("select count(*) from logs where TIPO_LOGS='AUTENTICACAO' or TIPO_LOGS='SAIDA DO SISTEMA'");
              while($linha=mysqli_fetch_array($resultado)) { $contaloguser = $linha[0]; }
           ?> 
            <strong><?php  echo $contaloguser; ?> <small>acessos</small></strong>
          </span>
        </div>
        <div class="ls-box-footer">
          <a href="logs_usuario.php" class="ls-btn ls-btn-xs">Espiar</a>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">E-mails disparados</h6>
        </div>
        <div class="ls-box-body">
          <span class="ls-board-data">
            <strong>0</strong>
          </span>
        </div>
        <div class="ls-box-footer">
          <a href="#" class="ls-btn ls-btn-xs">Espiar</a>
        </div>
      </div>
    </div>


  <?php


    $resultado = $obj->connect("select count(*) from logs where TIPO_LOGS='TROCA DE SENHA'");
    while($linha=mysqli_fetch_array($resultado)) { $contaaltera = $linha[0]; }
  ?> 
    <div class="col-sm-6 col-md-3">
      <div class="ls-box">
        <div class="ls-box-head">
          <h6 class="ls-title-4">Alterações de Senhas</h6>
        </div>
        <div class="ls-box-body">
          <span class="ls-board-data">
            <strong><?php  echo $contaaltera; ?></strong>
          </span>
        </div>
        <div class="ls-box-footer">
          <a href="logs_altera_senha.php" class="ls-btn ls-btn-xs">Espiar</a>
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