<?php require 'seguranca.php'; ?>
<div class="container" style="margin-top: 60px;margin-bottom: 60px;">
	<h2>Cadastro de Pessoa/Aluno</h2>
	<form action="cadastros/funcCadFuncao.php" method="post" style="margin-top: 25px;">
		<?php if(isset($_SESSION['cadastroError'])){?>
			<p class="text-center alert alert-danger" >
			<?php
				echo($_SESSION['cadastroError']);
				unset($_SESSION['cadastroError']);
			?>
			</p>
		<?php }		?>

		<?php if(isset($_SESSION['cadastroSucesso'])){ ?>
			 <p class="text-center alert alert-success" >
			 <?php
				 echo($_SESSION['cadastroSucesso']);
				 unset($_SESSION['cadastroSucesso']);
			 ?>
			 </p>
		<?php }		?>


	<div class="form-group row">
	  <label for="example-text-input" class="col-4 col-form-label">Nome da Função</label>
	  <div class="col-8">
		<input class="form-control" name="nome" type="text" placeholder="Nome"  required autofocus>
	  </div>
	</div>


	<button class="btn btn-outline-success col-12 " name="BTEnvia" type="submit">Cadastrar</button>
	</form>
<div class="text-center container text-center " style="float: center">

<?php
require("conexao.php");
$sql = "SELECT id, nome FROM funcao";
// executa a query
$dados = mysqli_query( $conn , $sql);
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>
<table class="table   table-bordered ">
  <thead>
    <tr>
      <th># </th>
      <th>Nome</th>
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
	<th scope="col-3"><?=$linha['id']?></th>
	<td class="col-7"><?=$linha['nome']?></td>
	<td class="col-1">
		<a href="#"><button class="btn btn-info disabled" type="button" name="button" value="<?=$linha['id']?>">Modificar</button></a>
	</td>
	<td class="col-1">
		<a href="list/deleteFuncao.php?id=<?=$linha['id']?>"><button class="btn btn-danger" type="button" name="button" value="<?=$linha['id']?>">Eliminar</button></a>
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
</div>
