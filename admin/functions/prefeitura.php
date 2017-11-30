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
  $serial = "DWDWDDWDHJE9R5Q";
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

        $sql = "INSERT INTO tb_prefeitura(cd_cidade, vl_cnpj, vl_nome, vl_rua, cd_numero, vl_bairro, vl_cep, vl_serial, vl_logo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $stmt = $pdo->prepare( $sql );
        $stmt->bindParam( 1, $cidade,PDO::PARAM_INT);
        $stmt->bindParam( 2, $cnpj,PDO::PARAM_STR);
        $stmt->bindParam( 3, $razao,PDO::PARAM_STR );
        $stmt->bindParam( 4, $endereco,PDO::PARAM_STR);
        $stmt->bindParam( 5, $numero,PDO::PARAM_INT);
        $stmt->bindParam( 6, $bairro,PDO::PARAM_STR );
        $stmt->bindParam( 7, $cep,PDO::PARAM_STR);
        $stmt->bindParam( 8, $serial,PDO::PARAM_STR );
        $stmt->bindParam( 9, $destino,PDO::PARAM_STR );
        $stmt->execute();

      $LAST_ID = $pdo->lastInsertId();

      $sqlEmail = "INSERT INTO tb_email_prefeitura(id_empresa, vl_email) VALUES (?, ?);";
      $stmt = $pdo->prepare( $sqlEmail );
      $stmt->bindParam( 1, $LAST_ID,PDO::PARAM_INT);
      $stmt->bindParam( 2, $email,PDO::PARAM_STR );
      $stmt->execute();


      $tipoCel = 'C';
      $tipoFix = 'F';
      $tipoFax = 'A';
      $sqlTele = "INSERT INTO tb_telefone_prefeitura(ch_tipo, vl_numero, id_empresa) VALUES (?, ?, ?);";

    $stmt = $pdo->prepare( $sqlTele );
    $stmt->bindParam( 1, $tipoCel,PDO::PARAM_STR );
    $stmt->bindParam( 2, $telCelu,PDO::PARAM_STR );
    $stmt->bindParam( 3, $LAST_ID,PDO::PARAM_INT);
    $stmt->execute();

    $stmt = $pdo->prepare( $sqlTele );
    $stmt->bindParam( 1, $tipoFix,PDO::PARAM_STR );
    $stmt->bindParam( 2, $telFixo,PDO::PARAM_STR );
    $stmt->bindParam( 3, $LAST_ID,PDO::PARAM_INT);
    $stmt->execute();

    $stmt = $pdo->prepare( $sqlTele );
    $stmt->bindParam( 1, $tipoFax,PDO::PARAM_STR );
    $stmt->bindParam( 2, $telFAX,PDO::PARAM_STR );
    $stmt->bindParam( 3, $LAST_ID,PDO::PARAM_INT);
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
