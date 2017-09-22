<?php  session_start(); include '../../../seguranca.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SDASD</title>
  </head>
  <body>

  </body>
</html>
<?php
$id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null ;
$email = $_POST['email'];
$setor = $_POST['setor'];
$var = "<script>javascript:history.back(-1)</script>";
$stmt1="";

try {
  $idNULL = "";
  $sqlEmail = "INSERT INTO email_prefeitura(id, email, setor, cod_pref) VALUES (?, ?, ?, ?);";
  $stmt = $pdo->prepare( $sqlEmail );
  $stmt->bindParam( 1, $idNULL,PDO::PARAM_INT);
  $stmt->bindParam( 2, $email,PDO::PARAM_STR );
  $stmt->bindParam( 3, $setor,PDO::PARAM_INT);
  $stmt->bindParam( 4, $id,PDO::PARAM_INT);
  $stmt->execute();
} catch (PDOException  $e) {
 $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro de Email".mysqli_error($conn);
  echo $var;
}
  if ($stmt1) {
    $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro $email $id";
     echo "<script>javascript:history.back(-1)</script>";

  }else {
     $_SESSION['cadastroSucesso'] = "$email cadastrado com sucesso no Sistema";
    echo "<script>javascript:history.back(-1)</script>";
    header("Location: http://127.0.0.1/geduca/admin/list/popUp/listEmailPrefe.php?id=$id");
  }

 ?>
