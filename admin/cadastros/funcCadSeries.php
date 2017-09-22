<?php
	session_start(); require('../conexao.php');
	$stmtCon = '';
	$stmt = '';

	try{
		$name = $_POST['nomeSerie'];
		$sqlSe = "SELECT COUNT(id) FROM serie WHERE nome = ?;";
		$stmtCon = $pdo->prepare($sqlSe);
		$stmtCon->bindParam(1, $name, PDO::PARAM_STR);
		$stmtCon->execute();
		$validaCon = $stmtCon->fetchColumn(); //se o count retornar 0, quer dizer que não está cadastrada

		if ($validaCon == 0){
			try {
				$sqlInsertSerie = "INSERT INTO serie(nome) VALUES (?);";
				$stmt = $pdo->prepare($sqlInsertSerie);
				$stmt->bindParam(1, $name, PDO::PARAM_STR);
				$stmt->execute();
				/* If cadastrar com sucesso, vai exibir, senão vai cair na exceção antes*/
		    $_SESSION['cadastroSucesso'] = "Série cadastrada com Sucesso";
		      echo "<script>javascript:history.back(-1)</script>";
			} catch (PDOException $e) {
		    $_SESSION['cadastroError'] = "Falha ao cadastrar série.";
		      echo "<script>javascript:history.back(-1)</script>";
			}
		}else {
			$_SESSION['cadastroError'] = "Série já cadastrada!";
				echo "<script>javascript:history.back(-1)</script>";
		}
	} catch (PDOException $e){
		$_SESSION['cadastroError'] = "Ops.. Tivemos algum problema ao cadastrar a série, tente novamente ou entre em contato com o suporte!";
			echo "<script>javascript:history.back(-1)</script>";
	}
?>
