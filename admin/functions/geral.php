<?php
require('conexao.php');
// Função que valida o CPF
  function getUF(){
  $sql = "SELECT id_estado, vl_sigla
      FROM tb_estado
      ORDER BY id_estado";
  $res = mysqli_query($conn , $sql );
  while ( $row = mysqli_fetch_assoc( $res ) ) {
    echo '<option value="'.$row['id_estado'].'">'.$row['vl_sigla'].'</option>';
  }
}

?>
