<?php require 'seguranca.php'; ?>
<div class="text-center container text-center " style="float: center">
<?php
require("conexao.php");
$sql = "SELECT cod_pref, cnpj, nome, id_cidade, numero, rua, bairro, CEP FROM prefeitura;";
// executa a query
$stmt1 = $pdo->prepare( $sql );
$stmt1->execute();

if(isset($_SESSION['cadastroError'])){?>
  <p class="text-center alert alert-danger" >
  <?php
  echo($_SESSION['cadastroError']);
  unset($_SESSION['cadastroError']);

  ?>
  </p>
  <?php }		?>

<?php if(isset($_SESSION['cadastroSucesso'])){
  ?>
  <p class="text-center alert alert-success" >
    <?php
  echo($_SESSION['cadastroSucesso']);
  unset($_SESSION['cadastroSucesso']);
  ?>
</p>
  <?php }		?>


<table class="table   table-bordered ">
  <thead>
    <tr>
      <th>CNPJ</th>
      <th>Nome</th>
			<th>Endereço</th>
			<th>Cidade/UF</th>
      <th>Ver Emails<br>Telefones</th>
	    <th>Modificar</th>
	    <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>
<?php
		// inicia o loop que vai mostrar todos os dados
		while($linha = $stmt1->fetch(PDO::FETCH_ASSOC)){
      $id=$linha['id_cidade'];
      $sql = "SELECT id, id_uf, nome FROM cidade WHERE id = $id;";
      // executa a query
      $stmtCidade = $pdo->prepare( $sql );
      $stmtCidade->execute();
      $cidade = $stmtCidade->fetch(PDO::FETCH_ASSOC);
      $id =  $cidade['id_uf'];
      $sql = "SELECT id, uf_sigla FROM estado WHERE id = $id;";
      // executa a query
      $stmtEstado = $pdo->prepare( $sql );
      $stmtEstado->execute();
      $estado = $stmtEstado->fetch(PDO::FETCH_ASSOC);
?>
<tr>
	<th ><?=$linha['cnpj']?></th>
	<td ><?=$linha['nome']?></td>
	<td><?=$linha['rua'].",".$linha['numero']." - CEP:".$linha['CEP']?></td>
	<td><?=$cidade['nome']."/". $estado['uf_sigla']?></td>
  <td>
  <a href="#" onclick="window.open('http://127.0.0.1/geduca/admin/list/popUp/listEmailPrefe.php?id=<?=$linha['cod_pref']?>', 'Ver Email da Escola', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1070, HEIGHT=700');"><button class="btn btn-info" type="button" name="button">Ver Emails<br>Telefones</button></a>
  </td>
	<td >
		<a href="administrativo.php?mod=ediEscola"class="btn btn-info disabled">Modificar</a>
	</td>
	<td >
		<a href="list/deletePrefe.php?id=<?=$linha['cod_pref']?>"class="btn btn-danger">Eliminar</a>
	</td>
</tr>
<?php
		// finaliza o loop que vai mostrar os dados
	};
	// fim do if
?>
</tbody>
</table>
</div>
