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
$num = $_POST['num'];
$tipo = $_POST['tipo'];
$var = "<script>javascript:history.back(-1)</script>";
$stmt1="";
try {
  $idNULL = "";
  $sqlEmail = "INSERT INTO telefone_escola(id, id_escola, tipo, numero) VALUES (?, ?, ?, ?);";
  $stmt = $pdo->prepare( $sqlEmail );
  $stmt->bindParam( 1, $idNULL,PDO::PARAM_INT);
  $stmt->bindParam( 2, $id,PDO::PARAM_INT);
  $stmt->bindParam( 3, $tipo,PDO::PARAM_STR );
  $stmt->bindParam( 4, $num,PDO::PARAM_STR );
  $stmt->execute();
} catch (PDOException  $e) {
 $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro de Email".mysqli_error($conn);
  echo $var;
}
  if ($stmt1) {
    $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro $num $id";
    echo "<script>javascript:history.back(-1)</script>";

  }else {
     $_SESSION['cadastroSucesso'] = "$num cadastrado com sucesso no Sistema";
   header("Location: http://127.0.0.1/geduca/admin/list/popUp/listEmailEscola.php?id=$id");
  }

 ?>
