    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
     <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="administrativo.php">G-Educa Administrativo</a>
      <div class="container collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="administrativo.php"><i class="fa fa-home"></i>  Início</a>
          </li>
           <li class="nav-item active">
            <a class="nav-link" href="administrativo.php?mod=escolas"><i class="fa fa-university"></i>  Escolas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://www.saojoao.sc.gov.br" target="_blank"><i class="fa fa-paper-plane"></i>  Prefeitura Municipal</a>
		      </li>
        </ul>

        <a href="administrativo.php?mod=perfil" class="btn btn-primary btn-outline-primary"><i class="fa fa-user" aria-hidden="true"></i>  <?php echo $logado ?></a>
        <li></li>
        <a href="logout.php" class="btn btn-primary btn-outline-primary "><i class="fa fa-sign-out" aria-hidden="true"></i>  Sair</a>
      </div>
      </div><!--Fim do Container-->
    </nav><!--Fim da NavBar-->
