<?php session_start();
include 'validarCNPJ.php';
if (isset($_POST)) {
  $var = "<script>javascript:history.back(-1)</script>";
  $cnpj = $_POST['cnpj'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telFixo =  preg_replace( '#[^0-9]#', '',  $_POST['telFixo'] );
  $rua = $_POST['rua'];
  $nrua = $_POST['nrua'];
  $bairro = $_POST['bairro'];
  $tipoLocal = $_POST['tipoLocal'];
  $tipoTele = $_POST['tipoTele'];
  $cep =  preg_replace( '#[^0-9]#', '',  $_POST['cep'] );
  $idCEP = 1; ////////    ALTERAR
$string = $cnpj.$nome.$email.$telFixo.$rua.$telFixo.$nrua.$bairro.$tipoLocal.$cep;
  if (validar_cnpj($cnpj)) {
    if (($nome == "") ||($email == "") ||($telFixo == "")) {
      $_SESSION['cadastroError'] = "Campos não Prenchidos".$string ;
      echo $var;
  }else{
  require '../conexao.php';

    $sqlcnpj = "SELECT id_empresa FROM tb_prefeitura WHERE vl_cnpj = ?";
    $stmt1 = $pdo->prepare( $sqlcnpj );
    $stmt1->bindParam( 1, $cnpj,PDO::PARAM_STR);
    $stmt1->execute();
    $idPref = "";
    while ($linha = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  // aqui eu mostro os valores de minha consulta
    $idPref = $linha['id_empresa'];
  }
  if (!$idPref == "") {
      $idNULL=NULL;
      $sql = "INSERT INTO tb_escola(cd_empresa, cd_cep, vl_nome, vl_rua, vl_numero, vl_bairro, vl_logo) VALUES (?, ?, ?, ?, ?, ?, ?);";
      $stmt = $pdo->prepare( $sql );
      $stmt->bindParam( 1, $idPref,PDO::PARAM_INT);
      $stmt->bindParam( 2, $idCEP,PDO::PARAM_INT);
      $stmt->bindParam( 3, $nome,PDO::PARAM_STR);
      $stmt->bindParam( 4, $rua,PDO::PARAM_STR );
      $stmt->bindParam( 5, $nrua,PDO::PARAM_INT);
      $stmt->bindParam( 6, $bairro,PDO::PARAM_STR );
      $stmt->bindParam( 7, $idNULL,PDO::PARAM_STR );
      $stmt->execute();
      $LAST_ID = $pdo->lastInsertId();

   if (!$stmt) {
      $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro".mysqli_error($conn);
      echo $var;
   }else {

     try {
       $sqlEmail = "INSERT INTO tb_email_escola(cd_escola, vl_email) VALUES (?, ?);";
       $stmt = $pdo->prepare( $sqlEmail );
       $stmt->bindParam( 2, $LAST_ID,PDO::PARAM_INT);
       $stmt->bindParam( 3, $email,PDO::PARAM_STR );
       $stmt->execute();
     } catch (PDOException  $e) {
       $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro de Email".mysqli_error($conn);
       echo $var;
     }
     try {
       $sqlEmail = "INSERT INTO tb_telefone_escola(cd_escola, ch_tipo, vl_numero) VALUES (?, ?, ?);";
       $stmt = $pdo->prepare( $sqlEmail );
       $stmt->bindParam( 2, $LAST_ID,PDO::PARAM_INT);
       $stmt->bindParam( 3, $tipoTele,PDO::PARAM_STR );
       $stmt->bindParam( 4, $telFixo,PDO::PARAM_STR );
       $stmt->execute();
     } catch (PDOException  $e) {
       $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro de Telefone".mysqli_error($conn);
       echo $var;
     }

     $_SESSION['cadastroSucesso'] = "Cadastro Efetuado com Sucesso";
     header("Location: ../administrativo.php?mod=cadEscola");
   }
}else {
    $_SESSION['cadastroError'] = "CNPJ não cadastrado no banco de dados. Entre em contato com o suporte. Verefique se o cnpj inserido está correto e tente novamente.";
    echo $var;
}

}//Fim do else de comparacoes de string
 # code...
}else {
  $_SESSION['cadastroError'] = "Não foi possivel validar o CNPJ";
  echo $var;
}
 }else {
   header("Location: http://127.0.0.1/geduca/admin/administrativo.php");
 }
 ?>
