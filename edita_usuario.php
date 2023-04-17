<?php
include("lib/sessao.php");
include("config.php");
include ("lib/funcoes.php");
include ("lib/conexao_banco.php");
include ("lib/verip.php");
include ("lib/crypt.php");



$CodUser = trim($_REQUEST["CodUser"]);

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

<?php
  
  $sql="select * from usuario where COD_Usuario='$CodUser'";
  $resultado=conecta($maquina,$usuario,$senha,$banco,$sql);

   while($linha=mysql_fetch_array($resultado))
   {
      $cpf=trim($linha["cpf"]);
      $nome=trim($linha["nome"]);
      $login=trim($linha["login"]);
      $email=trim($linha["email"]);
      $informacoes=trim($linha["informacoes"]);
      $cont_acesso=trim($linha["cont_acesso"]);
      $ultimo_acesso=trim($linha["ultimo_acesso"]);

   }//end while


?>


    <main class="ls-main ">
      <div class="container-fluid">
        <h1 class="ls-title-intro ls-ico-user">Meus dados</h1>

        <p>O usuário <b><?php echo $nome;?> </b> já acessou esse sistema <b><?php echo $cont_acesso; ?></b> vezes. Seu último acesso foi: <b><?php echo $ultimo_acesso;?> </b>. </p>
<?php

if (isset($_REQUEST["situacao"]) == "1")
{
  $mensagem=$_REQUEST["mensagem"];  
  echo "$mensagem";
}

if (isset($_REQUEST["situacao_edit"]) == "1")
{
  $mensagem=$_REQUEST["mensagem"];  
  echo "$mensagem";
}

?>
      
<div class="ls-box">
  <div class="ls-float-right ls-regroup">
   
  <p class="ls-float-right ls-float-none-xs"> <button  data-ls-module="modal" data-action="lib/trocasenha_geral.php?CodUser=<?php echo $CodUser;?>&login=<?php echo $login; ?>"  data-content="
  <fieldset>
    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Senha Atual:</b>
      <input type='password' name='senhaatual' placeholder='Senha Atual' required >
    </label>
    
    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Nova Senha:</b>
      <input type='password' name='nova_senha' placeholder='Nova Senha' required >
    </label>
    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Repetir Nova Senha:</b>
      <input type='password' name='repetir_novasenha' placeholder='Repetir Nova Senha' required >
    </label>
  </fieldset>
      " 
      data-title="Alterar Senha" 
      data-class="ls-btn-danger" 
      data-save="Salvar Alteração" 
      data-close="Fechar" 
      class="ls-btn-primary "> Alterar Senha </button>
</div>


<a href="#" class="ls-btn-primary" data-ls-fields-enable="#domain-form" data-toggle-class="ls-display-none" data-target=".domain-actions" class="domain-actions">Editar</a>


<br>
<br>
  <form action="lib/altera_dados_user_geral.php?COD_Usuario=<?php echo $CodUser;?>" method="post" class="ls-form row" data-ls-module="form">
    <fieldset id="domain-form" class="ls-form-disable ls-form-text">
      <label class="ls-label col-md-6 col-lg-8">
        <b class="ls-label-text">Nome</b>
        <input type="text" name="nome" value="<?php echo "$nome";?>" required>
      </label>
      <label class="ls-label col-md-6 col-lg-8">
        <b class="ls-label-text">Login:</b>
        <input type="text" name="login" value="<?php echo "$login";?>" required>
      </label>
      <label class="ls-label col-md-6 col-lg-8">
        <b class="ls-label-text">CPF:</b>
        <input type="text" name="cpf" value="<?php echo "$cpf";?>" required>
      </label>
      <label class="ls-label col-md-6 col-lg-8">
        <b class="ls-label-text">Email:</b>
        <input type="text" name="email" value="<?php echo "$email";?>" required>
      </label>
      <label class="ls-label col-md-6 col-lg-8">
        <b class="ls-label-text">Informações:</b>
        <textarea name="informacoes" cols="30" rows="5"><?php echo "$informacoes";?></textarea>
      </label>
    </fieldset>
    <div class="domain-actions ls-display-none">
      <button type="submit" class="ls-btn-primary">Salvar</button>
      <button class="ls-btn" data-ls-fields-enable="#domain-form" data-toggle-class="ls-display-none" data-target=".domain-actions" >Cancelar</button>
    </div>
  </form>

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