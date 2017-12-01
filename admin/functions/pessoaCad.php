<?php session_start();
include 'validaPessoa.php';
if (isset($_POST)) {
  $var = "<script>javascript:history.back(-1)</script>";
  $cpf = preg_replace( '#[^0-9]#', '',  $_POST['cpf'] );
  $nivel = 5; //por padrão vai ser "aluno"
  $tipoPessoa = $_POST['tipoPessoa'];
  if ($tipoPessoa == 2) {
    $funcao = $_POST['pessoaFuncao'];
  }
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $senha = md5($senha);
  $telFixo =  $_POST['fixo'];
  $telCelu =  $_POST['celular'];
  $nome = $_POST['nome'];
  $nCertidao = $_POST['nCertidao'];
  $rg = $_POST['rg'];
  $dataNasc = $_POST['dataNasc'];
  $naturalidade=1;
  $turma=1;
  $idnaturalCidade= $_POST['idnaturalidade'];
  $idnaturalUF = $_POST['idnaturalUF'];
  $cidadeAtual =  $_POST['idcidade'];
  $idAtualUF =$_POST['idAtualUF'];
  $escola =$_POST['escola'];
  $sexo= $_POST['sexo'];
  $cpfPai =  preg_replace( '#[^0-9]#', '',  $_POST['cpfPai'] );
  $cpfMae =  preg_replace( '#[^0-9]#', '',  $_POST['cpfMae'] );
  $file = "dwqqwdwqdwq";
  $nUF = 'dwq';
  $idNULL = NULL;
  $bollean = FALSE;
  $idPai = NULL; $idMae = NULL;
  $idNULL = 0;

  if ($tipoPessoa == 1){//se for administrador tem nível máximo
    $nivel = 0;
  }elseif ($tipoPessoa == 2) {//se for funcionário
    if (($funcao == 1) OR ($funcao == 2)) {//se for funcionário e da direção
      $nivel = 1;
    }elseif (($funcao == 3) OR ($funcao == 5)) {//se for da secretaria
      $nivel = 2;
    }elseif ($funcao == 4) {//se for professor
      $nivel = 3;
    }
  }elseif ($tipoPessoa == 3) {//se for aluno
    $nivel = 5;

  }else {
    $bollean= FALSE;
    $nivel = 4; //para pai, mae ou outro responsável
  }
  //$cep =  preg_replace( '#[^0-9]#', '',  $_POST['cep'] );
  if (validar_cpf($cpf)) {
    if (($cpf == "")) {
      $_SESSION['cadastroError'] = "Campos não Prenchidos";
      echo $var;
    }

    if ($bollean) {
          $_SESSION['cadastroError'] = "CPF do pai ou da mãe inválido";
        echo $var;
        }else {
          $stmt = "";
          try {
             $sql = "INSERT INTO tb_pessoa( cd_nivel_permissao, cd_tipo_pessoa, cd_funcao, cd_turma_atual, vl_email, vl_password, vl_nome,
                cd_numero_certidao, vl_cpf, vl_rg, dt_nascimento, cd_cidade_natural, cd_cidade_atual, ch_sexo, cd_pai, cd_mae,
                 cd_tipo_responsavel, ch_concluiu, cd_escolaaux,dt_cadastro,dt_alteracao) VALUES (?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
             $stmt = $pdo->prepare( $sql );
             $stmt->bindParam( 1, $nivel,PDO::PARAM_INT);
             $stmt->bindParam( 2, $tipoPessoa,PDO::PARAM_INT );
             $stmt->bindParam( 3, $funcao,PDO::PARAM_INT);
             $stmt->bindParam( 4, $turma,PDO::PARAM_INT );
             $stmt->bindParam( 5, $email,PDO::PARAM_STR );
             $stmt->bindParam( 6, $senha,PDO::PARAM_STR );
             $stmt->bindParam( 7, $nome,PDO::PARAM_STR);
             $stmt->bindParam( 8, $nCertidao,PDO::PARAM_INT);
             $stmt->bindParam( 9, $cpf,PDO::PARAM_STR);
             $stmt->bindParam( 10, $rg,PDO::PARAM_STR );
             $stmt->bindParam( 11, $dataNasc,PDO::PARAM_STR);
             $stmt->bindParam( 12, $idnaturalCidade,PDO::PARAM_INT);
             $stmt->bindParam( 13, $cidadeAtual,PDO::PARAM_INT );
             $stmt->bindParam( 14, $sexo,PDO::PARAM_STR);
             $stmt->bindParam( 15, $idpai,PDO::PARAM_STR );
             $stmt->bindParam( 16, $idMae,PDO::PARAM_STR );
             $stmt->bindParam( 17, $idNULL,PDO::PARAM_STR );
             $stmt->bindParam( 18, $idNULL,PDO::PARAM_STR);
             $stmt->bindParam( 19, $escola,PDO::PARAM_STR);
             $stmt->bindParam( 20, date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000)),PDO::PARAM_STR);
             $stmt->bindParam( 21, date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000)),PDO::PARAM_STR);

             $stmt->execute();
             $LAST_ID = $pdo->lastInsertId();


            if ($telFixo != "") {
                $tipo = "F";
              $sqlTelFixo = "INSERT INTO tb_telefone_pessoa(cd_pessoa, ch_tipo, vl_numero) VALUES (?, ?, ?);";
                      $stmt = $pdo->prepare( $sqlTelFixo );
                      $stmt->bindParam( 1, $LAST_ID,PDO::PARAM_INT);
                      $stmt->bindParam( 2, $tipo,PDO::PARAM_STR );
                      $stmt->bindParam( 3, $telFixo,PDO::PARAM_STR );
                     $stmt->execute();
            }
            if ($telCelu != "") {
                $tipo = "C";
                $sqlTelFixo = "INSERT INTO tb_telefone_pessoa(cd_pessoa, ch_tipo, vl_numero) VALUES (?, ?, ?);";
                        $stmt = $pdo->prepare( $sqlTelFixo );
                        $stmt->bindParam( 1, $LAST_ID,PDO::PARAM_INT);
                        $stmt->bindParam( 2, $tipo,PDO::PARAM_STR );
                        $stmt->bindParam( 3, $telCelu,PDO::PARAM_STR );
                       $stmt->execute();
            }

            } catch (PDOException $e) {
            $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro devido a esse problema: $e. <br> Por favor, Entre em contata com o administrador do sistema caso o erro persista.";
            echo $var;
          }


                   if (!$stmt) {
                      $_SESSION['cadastroError'] = "Não foi possivel realizar o cadastro devido a esse problema:  $e. <br> Por favor, Entre em contata com o administrador do sistema caso o erro persista.";

                     }else {
                       $_SESSION['cadastroSucesso'] = "Cadastro Efetuado com Sucesso";
                      header("Location: ../administrativo.php?mod=cadastro-de-pessoa");
                     }

  }
}
  else {
  $_SESSION['cadastroError'] = "Não foi possivel validar o CPF";
  echo "$var";
}
 }else {
   header("Location: http://127.0.0.1/geduca/admin/administrativo.php");
 }
 ?>
