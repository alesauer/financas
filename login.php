 <?php
/*
ob_start();
 @session_start();
  if(isset($_SESSION["acesso-negado"])){
    echo $_SESSION["acesso-negado"];
    unset($_SESSION["acesso-negado"]);
  }
*/
include("config.php");



if(!isset($resultadoLogin))
{
$resultadoLogin="1";
}else{
  $resultadoLogin = $_GET['resultadoLogin'];
}





?>
<!DOCTYPE html>
<html class="ls-theme-gray">
<head>
  <meta charset="utf-8">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <title>Login</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <link href="stylesheets/locastyle.css" rel="stylesheet" type="text/css">
</head>
<body class="documentacao documentacao_exemplos documentacao_exemplos_login-screen documentacao_exemplos_login-screen_index">


<div class="ls-login-parent">
  <div class="ls-login-inner">
    <div class="ls-login-container">
 
<?php 
if($resultadoLogin==0)
{
  echo "<div class='ls-alert-warning'><strong>Vish:</strong> Você digitou Login ou senha inválido.</div>";
}
?>
 
 

 <div class="ls-login-box">

  <h1 class="ls-login-logo">
   <a href="login.php"> <img title="Logo login" src="images/logo.png" height="70" width="70" /></a>
  </h1>
  <h3><center><?php echo "$msg_tela_login"; ?></center></h3>
  <br>
  <form role="form" class="ls-form ls-login-form" method="post" action="lib/autentica.php">
    <fieldset>

      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">Usuário</b>
        <input class="ls-login-bg-user ls-field-lg" name="email" type="text" placeholder="Seu email" required autofocus>
      </label>

      <label class="ls-label">
        <b class="ls-label-text ls-hidden-accessible">Senha</b>
        <div class="ls-prefix-group ls-field-lg">
          <input id="password_field" class="ls-login-bg-password" name="pass" type="password" placeholder="Senha" required>
          <a class="ls-label-text-prefix ls-toggle-pass ls-ico-eye" data-toggle-class="ls-ico-eye, ls-ico-eye-blocked" data-target="#password_field" href="#"></a>
        </div>
      </label>

      <p><a class="ls-login-forgot" href="#">Esqueci minha senha</a></p>

      <input type="submit" value="Entrar" class="ls-btn-primary ls-btn-block ls-btn-lg">
     
    </fieldset>
  </form>
</div>

    </div>
  </div>
</div>

 <script type="text/javascript" src="javascripts/jquery.js"></script>
<script type="text/javascript" src="javascripts/locastyle.js"></script>

</body>
</html>
