<?php  session_start(); include '../../../seguranca.php'; ?>

<?php $id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null ;

$sqlemail = "DELETE FROM tb_telefone_escola WHERE id_telefone = ?;";
$stmt1 = $pdo->prepare( $sqlemail );
$stmt1->bindParam( 1, $id,PDO::PARAM_STR);
$stmt1->execute();
  if (!$stmt1) {
    $_SESSION['cadastroError'] = "Não foi possivel remover do cadastro";
      echo "<script>javascript:history.back(-1)</script>";

  }else {
     $_SESSION['cadastroSucesso'] = "Removido com Sucesso";
    echo "<script>javascript:history.back(-1)</script>";
  }

 ?>
