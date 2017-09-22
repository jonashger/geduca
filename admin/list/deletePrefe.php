<?php  session_start(); require '../seguranca.php';

 $id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null ;
$stmt ='';
try {
   $sqltele = "DELETE FROM telefone_prefeitura WHERE cod_pref = ?;";
   $stmt1 = $pdo->prepare( $sqltele );
   $stmt1->bindParam( 1, $id,PDO::PARAM_STR);
   $stmt1->execute();

   $sqlemail = "DELETE FROM email_prefeitura WHERE cod_pref = ?;";
   $stmt1 = $pdo->prepare( $sqlemail );
   $stmt1->bindParam( 1, $id,PDO::PARAM_STR);
   $stmt1->execute();

      $sql = "DELETE FROM prefeitura WHERE cod_pref = ?;";
      $stmt = $pdo->prepare( $sql );
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
