<?php require 'conexao.php';
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo para a index.php. */
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
    {
  $_SESSION['loginErro'] = "Sistema permetido somente para pessoas autorizadas!";
  header('location:/geduca/admin/');
  }
$logado = $_SESSION['user'];

 ?>
