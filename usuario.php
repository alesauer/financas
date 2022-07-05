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
        <h1 class="ls-title-intro ls-ico-home">Usuário</h1>

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


if (isset($_REQUEST["clicoupesquisa"]) == "1")
{
  $pesquisa=$_REQUEST["pesquisa"];
  $obj= new Database;
  $resultado = $obj->connect("select * from usuario where login like '%$pesquisa%' or cpf like '%$pesquisa%' or nome like '%$pesquisa%' or email like '%$pesquisa%' or login like '%$pesquisa%'");
    
}else{
  $obj= new Database;
  $resultado = $obj->connect("select * from usuario");
}


?>
        
   

   

<div class="ls-box ls-board-box">


  <header class="ls-info-header">
    <p class="ls-float-right ls-float-none-xs"> <button  data-ls-module="modal" data-action="lib/insere_usuario.php"  data-content="
    
        <fieldset>
    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Login</b>
      <input type='text' name='login' placeholder='Login' required >
    </label>
    
    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Nome</b>
      <input type='text' name='nome' placeholder='Nome' required >
    </label>

    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>CPF</b>
      <input type='text' name='cpf' class='ls-mask-cpf' placeholder='000.000.000-00' required >
    </label>

    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>E-Mail</b>
      <input type='text' name='EmailUsuario' placeholder='Email' required >
    </label>
    <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Senha</b>
      <input type='password' name='SenhaUsuario' placeholder='Senha' required >
    </label>


   <label class='ls-label col-md-5'>
      <b class='ls-label-text'>Status</b>
      <div class='ls-custom-select'>
        <select name='perfil' class='ls-select'>
          <option>Usuário</option>
          <option>Administrador</option>
        </select>
     </label>

  </fieldset>
      " 

      data-title="Inserir Usuário" 

      data-class="ls-btn-danger" 

      data-save="Salvar Alteração" 

      data-close="Fechar" 

      class="ls-btn-primary "> Adicionar usuario </button>
      <a href="#" class="ls-btn-primary ls-ico-download2 ls-btn-xs"></a>

    <h2 class="ls-title-3">Lista dos usuários</h2>
  </header>




<!-- Pesquisa -->
<br>
   <form  method="post" action="usuario.php?clicoupesquisa=1" class="ls-form ls-form-inline ls-float-right">
    <label class="ls-label" role="search">
      <b class="ls-label-text ls-hidden-accessible">Busca...</b>
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
      <th>Login</th>
      <th>Nome do Usuário</th>
      <th class="hidden-xs">CPF</th>
      <th>E-Mail</th>
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
     $Cod_User=$linha['COD_Usuario'];
     $cpf=$linha['cpf'];
     $nome=$linha['nome'];
     $login=$linha['login'];
     $senha=$linha['senha'];
     $email=$linha['email'];

    echo "      
    <tr>
      <td><a href='' title=''>$login</a></td>
      <td class='hidden-xs'>$nome</td>
      <td>$cpf</td>
      <td>$email</td>
      <td>
        <a href='edita_usuario.php?CodUser=$Cod_User' class='ls-btn-primary ls-btn-xs'>Editar</a>

        <button data-ls-module='modal' data-action='lib/exclui_usuario.php?CodUser=$Cod_User&login_user=$nome' data-content='<h2>Tem certeza da exclusão deste registro?</h2><p>O registro não poderá ser restaurado após esse procedimento.</p>' data-title='Excluir registro' data-class='ls-btn-primary' data-save='Excluir' data-close='Fechar' class='ls-btn-primary ls-btn-xs'>Excluir</button>




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