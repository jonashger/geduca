<?php
include '../conexao.php';
   function validaPaiMae($cpf)
  {
    if (validar_cpf($cpf)) {
      include '../conexao.php';
        $cpf = str_pad(preg_replace('[^0-9]', '', $cpf), 11, '0', STR_PAD_LEFT);
      $sql = "SELECT id_pessoa, vl_cpf, cd_tipo_pessoa FROM tb_pessoa WHERE vl_cpf =  ?;";
      $stmt1 = $pdo->prepare( $sql );
      $stmt1->bindParam( 1, $cpf,PDO::PARAM_STR);
      $stmt1->execute();
      while($linha = $stmt1->fetch(PDO::FETCH_ASSOC)){
        if ($linha['cd_tipo_pessoa']==3) {
          return 99;
        }else {
          return $linha['id_pessoa'];
        }
      }
        }


  }
  function validar_cpf($cpf)
  {
  	$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
  	// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
  	if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
  		return FALSE;
  	} else { // Calcula os números para verificar se o CPF é verdadeiro
  		for ($t = 9; $t < 11; $t++) {
  			for ($d = 0, $c = 0; $c < $t; $c++) {
  				$d += $cpf{$c} * (($t + 1) - $c);
  			}
  			$d = ((10 * $d) % 11) % 10;
  			if ($cpf{$c} != $d) {
  				return FALSE;
  			}
  		}
  		return TRUE;
  	}
  }

function getEstado($idCidade)
{
  include '../conexao.php';
  $sql = "SELECT cd_uf FROM tb_cidade WHERE id_cidade = ?;";
  $stmt1 = $pdo->prepare( $sql );
  $stmt1->bindParam( 1, $idCidade,PDO::PARAM_STR);
  $stmt1->execute();
  while($linha = $stmt1->fetch(PDO::FETCH_ASSOC)){
    return $linha['cd_uf'];
  }
  return 1;
}

 ?>
