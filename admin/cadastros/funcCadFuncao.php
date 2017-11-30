<?php
  session_start(); require('../conexao.php');
  $stmtCon = '';
  $stmt = '';

  try{
    $name = $_POST['nome'];
    $sqlFunc = "SELECT COUNT(id_funcao) FROM tb_funcao WHERE vl_nome = ?;";
    $stmtCon = $pdo->prepare($sqlFunc);
    $stmtCon->bindParam(1, $name, PDO::PARAM_STR);
    $stmtCon->execute();
    $validaCon = $stmtCon->fetchColumn(); //se o count retornar 0, quer dizer que não está cadastrada

    if ($validaCon == 0){
      try {
        $sqlInsertFuncao = "INSERT INTO tb_funcao ( vl_nome ) VALUES (?);";
        $stmt = $pdo->prepare($sqlInsertFuncao);
        $stmt->bindParam(1, $name, PDO::PARAM_STR);
        $stmt->execute();
        /* If cadastrar com sucesso, vai exibir, senão vai cair na exceção antes*/
        $_SESSION['cadastroSucesso'] = "Função cadastrada com Sucesso";
          echo "<script>javascript:history.back(-1)</script>";
      } catch (PDOException $e) {
        $_SESSION['cadastroError'] = "Falha ao cadastrar função.";
          echo "<script>javascript:history.back(-1)</script>";
      }
    }else {
      $_SESSION['cadastroError'] = "Função já cadastrada!";
        echo "<script>javascript:history.back(-1)</script>";
    }
  } catch (PDOException $e){
    $_SESSION['cadastroError'] = "Ops.. Tivemos algum problema ao cadastrar a função, tente novamente ou entre em contato com o suporte!";
      echo "<script>javascript:history.back(-1)</script>";
  }
 ?>
