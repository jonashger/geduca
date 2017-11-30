<?php  session_start(); require '../seguranca.php';

 $id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null ;
$stmt ='';
try {
   $sqltele = "DELETE FROM tb_telefone_escola WHERE cd_escola = ?;";
   $stmt1 = $pdo->prepare( $sqltele );
   $stmt1->bindParam( 1, $id,PDO::PARAM_STR);
   $stmt1->execute();

   $sqlemail = "DELETE FROM tb_email_escola WHERE cd_escola = ?;";
   $stmt1 = $pdo->prepare( $sqlemail );
   $stmt1->bindParam( 1, $id,PDO::PARAM_STR);
   $stmt1->execute();

      $sqlemail = "DELETE FROM tb_escola WHERE id_escola = ?;";
      $stmt = $pdo->prepare( $sqlemail );
      $stmt->bindParam( 1, $id,PDO::PARAM_STR);
      $stmt->execute();
} catch (PDOException $e) {
  $_SESSION['cadastroError'] = "Não foi possivel remover do cadastro $e";
    echo "<script>javascript:history.back(-1)</script>";
}
if (!$stmt) {
  $_SESSION['cadastroError'] = "Não foi possivel remover do cadastro";
    echo "<script>javascript:history.back(-1)</script>";

}else {
   $_SESSION['cadastroSucesso'] = "Removido com Sucesso";
  echo "<script>javascript:history.back(-1)</script>";
}










 ?>
