<?php
require('conexao.php');
// Função que valida o CPF
  function getUF(){
  $sql = "SELECT id, uf_sigla
      FROM estado
      ORDER BY id";
  $res = mysqli_query($conn , $sql );
  while ( $row = mysqli_fetch_assoc( $res ) ) {
    echo '<option value="'.$row['id'].'">'.$row['uf_sigla'].'</option>';
  }
}

?>
