<?php
function validar_cnpj($cnpj)
{
	include '../conexao.php';
	$sql = "SELECT cnpj FROM prefeitura WHERE cnpj = ?;";
	$stmt1 = $pdo->prepare( $sql );
	$stmt1->bindParam( 1, $cnpj,PDO::PARAM_INT);
	$stmt1->execute();
	while ($linha = $stmt1->fetch(PDO::FETCH_ASSOC)) {
		if ($linha['cnpj']==$cnpj) {
			return true;
		};
	}

	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
}
