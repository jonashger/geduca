<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema tem por objetivo ajudar aos professores na elaboração de boletins, frequência dos alunos">
    <meta name="author" content="Acadêmicos Unoesc">
    <link rel="icon" href="../favicon.png">
	<meta property="og:locale" content="pt_BR"/>
	<meta property="og:type" content="website"/>
	<meta property="og:title" content="Sistema de Controle Escolar do Munínicio de São João do Oeste"/>
	<meta property="og:description" content="Sistema tem por objetivo ajudar aos professores na elaboração de boletins, frequência dos alunos"/>
	<meta property="og:url" content="http://unoesc.fireup.net.br/"/>
	<meta property="og:site_name" content="Sistema de Controle Escolar do Munínicio de São João do Oeste"/>
	<!--<meta property="fb:app_id" content="571110813082047"/>
	<meta property="og:image" content="http://fireup.net.br/logoFireUp.jpg"/>-->

    <title>Entrar - G-Educa </title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body>


    <div class="container">
      <form class="form-signin" method="post" action="valida.php">
        <h2 class="form-signin-heading text-center ">Entrar</h2>
        <label for="inputEmail" class="sr-only">Nome de Usuário</label>
        <input type="email" id="email" name="email" class="form-control " placeholder="Endereço de Email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="password" name="password" class="form-control " placeholder="Senha" required style="margin-top: 10px;">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Lembrar-me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</button>
        <a href="..">Voltar</a>
      </form>
		<p class="text-center text-danger" >
			<?php if(isset($_SESSION['loginErro'])){
				echo($_SESSION['loginErro']);
				unset($_SESSION['loginErro']);
				}
			?>
		</p>
    </div> <!-- /container -->
<!--<button class="btn-info"><a href="functions/func_cadastro.php">Cadastrar</a></button>-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ue10buh.js"></script>

  </body>
</html>
