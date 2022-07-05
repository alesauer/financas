<?php include("config.php"); ?>

<!-- Dropdown com detalhes da conta de usuário -->
    <div data-ls-module="dropdown" class="ls-dropdown ls-user-account">
      <a href="#" class="ls-ico-user">
        <img src="<?php echo "$avatar";?>" alt="" />
        <span class="ls-name"><?php echo "$user_loged"; ?></span>
      </a>

      <nav class="ls-dropdown-nav ls-user-menu">
        <ul>
          <li><a href="meusdados.php">Meus dados</a></li>
          <li><a href="lib/sair_sessao.php">Sair</a></li>
         </ul>
      </nav>
    </div>
  </div>

