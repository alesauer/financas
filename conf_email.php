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
        <h1 class="ls-title-intro ls-ico-cog">Configuração</h1>

<div class="ls-alert-box ls-dismissable">
  <header class="ls-info-header">
    <span data-ls-module="dismiss" class="ls-dismiss">&times;</span>
    <h2 class="ls-title-3">E-mail</h2>
    <p>Configure os serviços listados abaixo.</p>
  </header><!-- /header -->


   <h3 class="ls-title-5">Correio Eletrônico</h3>
  <table class="ls-table ls-table-striped">
    <tbody>
      <tr>
        <td><strong>Habilitar notificações de e-mail: </strong> 
          <div data-ls-module="switchButton" class="ls-switch-btn ls-float-right"> <input type="checkbox" id="teste">
          <label class="ls-switch-label" for="teste" name="label-teste" ls-switch-off="Desativado" ls-switch-on="Ativado"><span></span></label>
          </div>
        </td>
      </tr>
     
     <tr>
        <td>
          <strong>Email Remetente: </strong>
          <input type="text1" maxlength="20" id="password_field1" name="password" class="ls-no-style-input" value="Mané" >
          <a href="#" data-ls-module="modal" data-target="#changePassword">Alterar</a>
        </td>
      </tr>
      
      <tr>
        <td>
          <strong>Senha Email Remetente: </strong>
          <input type="password" maxlength="20" id="password_field2" name="password" class="ls-no-style-input" value="testandosenha" >
          <a class="ls-toggle-pass" data-target="#password_field2" href="#" data-toggle-text="Ocultar">Exibir</a> |
          <a href="#" data-ls-module="modal" data-target="#changePassword">Alterar</a>
        </td>
      </tr>

    
   <tr>
        <td>
          <strong>Endereço Servidor SMTP: </strong>
          <input type="text1" maxlength="20" id="password_field3" name="password" class="ls-no-style-input" value="Mané" >
          <a href="#" data-ls-module="modal" data-target="#changePassword">Alterar</a>
        </td>
   </tr>

        <td><strong>Porta:</strong> 587| <strong>SSL/TLS:</strong> 465</td>
      </tr>
    </tbody>
  </table>

<a href="#" class="ls-btn-primary">Salvar</a>


</div>



<div id="changePassword" class="ls-modal fade">
  <div class="ls-modal-box">
    <div class="ls-modal-content">
      <div class="ls-modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="title_change_pass">Alteração de senha</h3>
      </div>
      <form action="#" class="ls-form ls-form-inline validate" >
        <div class="ls-modal-body">
          <div class="ls-alert ls-alert-warning" role="alert">
            <p>Ao alterar a senha, <strong>lembre-se que todas as aplicações</strong> que utilizam a autenticação deste SMTP deverão ser alteradas, caso contrário os envios serão interrompidos.</p>
          </div>
          <label class="ls-label">
            <b class="ls-label-text">Nova senha</b>
            <input class="password auto-focus required" type="password">
            <p>Senha entre 8 a 14 caracteres, contendo letras e números</p>
          </label>
        </div>
        <div class="ls-modal-footer">
          <button class="ls-btn-default ls-float-right" type="button" data-dismiss="modal">Cancelar</button>
          <input class="ls-btn-primary" name="commit" type="submit" value="Confirmar">
        </div>
      </form>
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