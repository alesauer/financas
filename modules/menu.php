      <nav class="ls-menu">
        <ul>
           <li><a href="principal.php" class="ls-ico-dashboard" title="Dashboard">Painel</a></li>
         

           <li>
            <a href="tabelamovimentacoes.php?mesFiltro=<?php $mesNum = date("m"); echo $mesNum;?>" class="ls-ico-stats" title="Movimentaçoes">Movimentaçoes</a>
         
           </li>

           
        
           
           <li>
            <a href="#" class="ls-ico-cog" title="Configurações">Configurações</a>
            <ul>
              <li><a href="forma_pagamentos.php">Forma de Pagamentos</a>
              <li><a href="categorias_receitas.php">Categorias-Receita</a>
              <li><a href="categorias_despesas.php">Categorias-Despesa</a>
              <li><a href="usuario.php">Usuários</a></li>
              <li><a href="registros.php">Registros</a>
            </ul>
          
          </li>

        </ul>
      </nav>