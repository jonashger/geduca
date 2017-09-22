<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$cod_estados =$_GET['idnaturalUF'];
	$cidades = array();
	require '../conexao.php';
	$sql = "SELECT id, nome
			FROM cidade
			WHERE id_uf= ?
			ORDER BY nome";

			$stmt = $pdo->prepare( $sql );
	 		$stmt->bindParam( 1, $cod_estados ,PDO::PARAM_INT);
			$stmt->execute();

	while ( $linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$cidade[] = array(
			'idCidade'	=> $linha['id'],
			'nom_Cidade'			=> $linha['nome'],
		);
	}

		echo( json_encode( $cidade) );
