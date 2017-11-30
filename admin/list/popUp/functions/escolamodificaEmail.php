<?php  session_start(); include '../../../seguranca.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifica Email</title>
  </head>
  <body>

  </body>
</html>
<?php $id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null ;

$sqlemail = "UPDATE tb_email_escola SET cd_escola = ?, vl_email = ? WHERE id_email = ?;";
$stmt1 = $pdo->prepare( $sqlemail );
$id2=NULL;
$stmt1->bindParam( 1, $id2,PDO::PARAM_STR);
$stmt1->bindParam( 2, $email,PDO::PARAM_STR);
$stmt1->bindParam( 3, $id,PDO::PARAM_INT);
$stmt1->execute();
  if (!$stmt1) {
    $_SESSION['cadastroError'] = "Não foi possivel remover do cadastro";
      echo "<script>javascript:history.back(-1)</script>";

  }else {
     $_SESSION['cadastroSucesso'] = "Removido com Sucesso";
    echo "<script>javascript:history.back(-1)</script>";
  }

 ?>
