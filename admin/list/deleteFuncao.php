<?php  session_start(); require '../seguranca.php';

  $id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null ;
  $stmt ='';
  $stmtValida ='';
  try {
    $sqlValida = "SELECT COUNT(id_pessoa) FROM tb_pessoa WHERE cd_funcao = ?;";
    $stmtValida = $pdo->prepare($sqlValida);
    $stmtValida->bindParam(1, $id, PDO::PARAM_INT);
    $stmtValida->execute();
    $temVinculo = $stmtValida->fetchColumn();

    if ($temVinculo == 0) {
      try{
        $sqlDelete = "DELETE FROM tb_funcao WHERE id_funcao = ?;";
        $stmt = $pdo->prepare($sqlDelete);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        /* If remover com sucesso, vai exibir, senão vai cair na exceção antes*/
        $_SESSION['cadastroSucesso'] = "Removido com Sucesso";
          echo "<script>javascript:history.back(-1)</script>";
      } catch (PDOException $e) {
        $_SESSION['cadastroError'] = "Não foi possivel remover do cadastro. Contate o suporte!";
          echo "<script>javascript:history.back(-1)</script>";
      }
    } else {
      $_SESSION['cadastroError'] = "Essa função já está vinculada a um cadastro. Não pode ser removida!";
        echo "<script>javascript:history.back(-1)</script>";
    }
  } catch (PDOException $e){
    $_SESSION['cadastroError'] = "Ops... Tivemos algum problema ao remover a função! Tente novamente, ou contate o suporte!";
      echo "<script>javascript:history.back(-1)</script>";
  }

 ?>
