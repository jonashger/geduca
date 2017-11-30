<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$cod_estados =$_GET['idnaturalUF'];
	$cidades = array();
	require '../conexao.php';
	$sql = "SELECT id_cidade, vl_nome
						FROM tb_cidade
					WHERE cd_uf= ?
					ORDER BY vl_nome";

			$stmt = $pdo->prepare( $sql );
	 		$stmt->bindParam( 1, $cod_estados ,PDO::PARAM_INT);
			$stmt->execute();

	while ( $linha = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$cidade[] = array(
			'idCidade'	=> $linha['id_cidade'],
			'nom_Cidade'			=> $linha['vl_nome'],
		);
	}

		echo( json_encode( $cidade) );
