<?php session_start();
include 'validarCNPJ.php';
if (isset($_POST)) {
  $var = "<script>javascript:history.back(-1)</script>";
  $cnpj = $_POST['cnpj'];
  $razao = $_POST['razao'];
  $email = $_POST['email'];
  $telFAX = $_POST['telFAX'];
  $telFixo =  $_POST['telFixo'];
  $telCelu = $_POST['telCelu'];
  $endereco = $_POST['endereco'];
  $numero = $_POST['numero'];
  $bairro = $_POST['bairro'];
  $cidade = $_POST['idcidade'];
  $serial = "DWDW - DDWD - DHJE - 9R5Q";
  $cep =  preg_replace( '#[^0-9]#', '',  $_POST['cep'] );
  if (validar_cnpj($cnpj)) {
    if (($cnpj == "") ||($razao == "") ||($email == "") ||($telFixo == "") ||($telCelu == "") ||($endereco == "") ||($numero == "") ||($bairro == "") ||($cidade == "")
  ||($cnpj == "")) {
      $_SESSION['cadastroError'] = "Campos não Prenchidos";
      echo $var;
  }else{
  require '../conexao.php';
    $stmt="";

            if ( isset( $_FILES[ 'arquivo' ][ 'name' ] ) && $_FILES[ 'arquivo' ][ 'error' ] == 0 ) {

            $arquivo_tmp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
            $nome = $_FILES[ 'arquivo' ][ 'name' ];

            // Pega a extensão
            $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );

            // Converte a extensão para minúsculo
            $extensao = strtolower ( $extensao );

            // Somente imagens, .jpg;.jpeg;.gif;.png
            // Aqui eu enfileiro as extensões permitidas e separo por ';'
            // Isso serve apenas para eu poder pesquisar dentro desta String
            if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
            // Cria um nome único para esta imagem
            // Evita que duplique as imagens no servidor.
            // Evita nomes com acentos, espaços e caracteres não alfanuméricos
            $novoNome = uniqid ( time () ) . '.' . $extensao;

            // Concatena a pasta com o nome
            $destino = 'imagens/brasao/' . $novoNome;

            // tenta mover o arquivo para o destino
            if ( @move_uploaded_file ( $arquivo_tmp, $destino ) ) {

            }
            else
              $_SESSION['cadastroError'] =  "Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita. $destino<br />";
            }
            else
            $_SESSION['cadastroError'] = 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
            }
            else
            $_SESSION['cadastroError'] = 'Você não enviou nenhum arquivo!';


        $idNULL="";
        $sql = "INSERT INTO prefeitura(cod_pref, id_cidade, cnpj, nome, rua, numero, bairro, CEP, serial, logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $pdo->prepare( $sql );
        $stmt->bindParam( 1, $idNULL,PDO::PARAM_INT);
        $stmt->bindParam( 2, $cidade,PDO::PARAM_INT);
        $stmt->bindParam( 3, $cnpj,PDO::PARAM_STR);
        $stmt->bindParam( 4, $razao,PDO::PARAM_STR );
        $stmt->bindParam( 5, $endereco,PDO::PARAM_STR);
        $stmt->bindParam( 6, $numero,PDO::PARAM_INT);
        $stmt->bindParam( 7, $bairro,PDO::PARAM_STR );
        $stmt->bindParam( 8, $cep,PDO::PARAM_STR);
        $stmt->bindParam( 9, $serial,PDO::PARAM_STR );
        $stmt->bindParam( 10, $destino,PDO::PARAM_STR );
        $stmt->execute();

  $LAST_ID = $pdo->lastInsertId();

      $sqlEmail = "INSERT INTO email_prefeitura(id, cod_pref, email) VALUES (?, ?, ?);";
      $stmt = $pdo->prepare( $sqlEmail );
      $stmt->bindParam( 1,$idNULL,PDO::PARAM_INT);
      $stmt->bindParam( 2, $LAST_ID,PDO::PARAM_INT);
      $stmt->bindParam( 3, $email,PDO::PARAM_STR );
      $stmt->execute();


      $tipoCel = 'C';
      $tipoFix = 'F';
      $tipoFax = 'A';
      $sqlTele = "INSERT INTO telefone_prefeitura(id, tipo, numero, cod_pref) VALUES (?, ?, ?, ?);";

    $stmt = $pdo->prepare( $sqlTele );
    $stmt->bindParam( 1, $idNULL,PDO::PARAM_INT);
    $stmt->bindParam( 2, $tipoCel,PDO::PARAM_STR );
    $stmt->bindParam( 3, $telCelu,PDO::PARAM_STR );
    $stmt->bindParam( 4, $LAST_ID,PDO::PARAM_INT);
    $stmt->execute();

    $stmt = $pdo->prepare( $sqlTele );
    $stmt->bindParam( 1, $idNULL,PDO::PARAM_INT);
    $stmt->bindParam( 2, $tipoFix,PDO::PARAM_STR );
    $stmt->bindParam( 3, $telFixo,PDO::PARAM_STR );
    $stmt->bindParam( 4, $LAST_ID,PDO::PARAM_INT);
    $stmt->execute();

    $stmt = $pdo->prepare( $sqlTele );
    $stmt->bindParam( 1, $idNULL,PDO::PARAM_INT);
    $stmt->bindParam( 2, $tipoFax,PDO::PARAM_STR );
    $stmt->bindParam( 3, $telFAX,PDO::PARAM_STR );
    $stmt->bindParam( 4, $LAST_ID,PDO::PARAM_INT);
    $stmt->execute();



if (!$stmt) {
      $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro";
     $var;
 }else {
   $_SESSION['cadastroSucesso'] = "Cadastro Efetuado com Sucesso";
   header("Location: ../administrativo.php?mod=cadPrefeitura");

}
}//fim do else
 # code...
}else {
  $_SESSION['cadastroError'] = "Não foi possivel validar o CPF";
  echo $var;
}
 }else {
   header("Location: http://127.0.0.1/geduca/admin/administrativo.php");
 }
 ?>
