<?php require'seguranca.php'; ?>
<div class="text-center container text-center " style="float: center">
<?php
require("conexao.php");
$sql = "SELECT id, cod_pref, nome, rua, numero, bairro FROM escola;";
// executa a query
$dados = mysqli_query( $conn , $sql);
if (!$dados) {
	$_SESSION['erro'] = "<div class=\"alert alert-danger\" role=\"alert\">
  <strong>Oh snap!</strong>Não existem dados para serem exibidos.
</div>";
	header("Location: administrativo.php");

}

$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);


?>

<?php if(isset($_SESSION['cadastroError'])){?>
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
      <th># </th>
      <th>Nome</th>
			<th>Endereço</th>
			<th>Bairro</th>
      <th>Ver Emails<br>Telefones</th>
	    <th>Modificar</th>
	    <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>



<?php
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
?>
<tr>
	<th scope="col-1"><?=$linha['id']?></th>
	<td class="col-3"><?=$linha['nome']?></td>
	<td class="col-3"><?=$linha['rua'].",".$linha['numero']?></td>
	<td class="col-2"><?=$linha['bairro']?></td>
  <td class="col-1">
    <?php $dominio= $_SERVER['HTTP_HOST']; ?>
  <a href="#" onclick="window.open('list/popUp/listEmailEscola.php?id=<?=$linha['id']?>', 'Ver Email da Escola', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1070, HEIGHT=700');"><button class="btn btn-info" type="button" name="button">Ver Emails<br>Telefones</button></a>
  </td>
	<td class="col-1">
		<a href="administrativo.php?mod=ediEscola"class="btn btn-info disabled">Modificar</a>
	</td>
	<td class="col-1">
		<a href="list/deleteEscola.php?id=<?=$linha['id']?>"class="btn btn-danger">Eliminar</a>
	</td>
</tr>
<?php
		// finaliza o loop que vai mostrar os dados
	}while($linha = mysqli_fetch_assoc($dados));
	// fim do if
	}
?>
</tbody>
</table>
</div>
