
<?php require_once('functions/geral.php'); ?>
<div class="container">
	<h2>Cadastro de Prefeitura</h2>

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
	<form action="functions/prefeitura.php" method="post" name="form1" style="margin-top: 25px;"enctype="multipart/form-data">

			<div class="form-group row">
			  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">CNPJ da Prefeitura*</label>
			  <div class="col-lg-8 col-sm-12">
					<input class="form-control" type="text"placeholder="xx.xxx.xxx/xxxx-xx" id="cnpj" name="cnpj"
				maxlength="18"    required autofocus>
			  </div>
			</div>
		  <div class="form-group row">
			  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Razão Social*</label>
			  <div class="col-lg-8 col-sm-12">
				<input class="form-control" name="razao" type="text" placeholder="Municipio de ..." require autofocus>
			  </div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Email*</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control" name="email" type="email" placeholder="prefeitura@dominio.com"  required autofocus>
				</div>
			</div>

			<!--   TELEFONE Fixo " -->
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone Fixo*</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control"type="text" name="telFixo"id="telFixo"
		maxlength="15" placeholder="(xx)xxxx-xxxx" required autofocus>
				</div>
			</div>
			<!--   TELEFONE Celular " -->
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone Celular*</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control"type="text" name="telCelu" id="telCelu"
		maxlength="15" placeholder="(xx)xxxxx-xxxx" required autofocus>
				</div>
			</div>
			<!--   TELEFONE FAX " -->
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone FAX</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control"type="text" name="telFAX" id="telFAX"
	maxlength="15" placeholder="(xx)xxxx-xxxx" required autofocus>
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">CEP*</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control" name="cep" type="text" id="cep" placeholder="xxxxx-xxx" maxlength="9"  required autofocus>
				</div>
			</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Endereço*</label>
					<div class="col-lg-8 col-sm-12">
					<input class="form-control" name="endereco" type="text" placeholder="Fernando Dias"  required autofocus>
					</div>
				</div>
				<div class="form-group row">
				  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Número*</label>
				  <div class="col-lg-8 col-sm-12">
					<input class="form-control" name="numero" type="number" placeholder="410 (0 = sem número)"  required autofocus>
				  </div>
				</div>
				<div class="form-group row">
					<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Bairro*</label>
					<div class="col-lg-8 col-sm-12">
					<input class="form-control" name="bairro" type="text" placeholder="Centro"  required autofocus>
					</div>
				</div>


				<div class="form-group row">
					<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label"> Estado*</label>
					<div class="col-lg-8 col-sm-12">
				<select name="ufEstado" id="ufEstado" class="custom-select mb-2 mr-sm-2 mb-sm-0">
				<option value="" ></option>
				<?php
				$sql = "SELECT id, nome_estado
						FROM estado
						ORDER BY nome_estado";
						$stmt1 = $pdo->prepare( $sql );
						$stmt1->execute();
				while ( $row =  $stmt1->fetch(PDO::FETCH_ASSOC)) {
					echo '<option name="nUF" value="'.$row['id'].'">'.$row['nome_estado'].'</option>';
				}
				?>
			</option></select>
			</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Cidade*</label>
				<div class="col-lg-8 col-sm-12">
				<select name="idcidade" id="idcidade" class="custom-select mb-2 mr-sm-2 mb-sm-0">
						<option value="">-- Escolha um estado --</option>
			</select>
		</div>
			</div>

				<div class="form-group row">
					<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Brasão/Logomarca</label>
					<div class="col-lg-4 col-sm-12">
						<label class="custom-file">
						  <input type="file" id="arquivo" name="arquivo"class="custom-file-input">
						  <span class="custom-file-control">Selecionar Arquivo.</span>
						</label>
					</div>
				</div>

	<button class="btn btn-outline-success col-12 "name="BTEnvia" type="submit">Cadastrar</button>
	</form>

</div>
<script type="text/javascript">
$(function(){
	$('#ufEstado').change(function(){
		if( $(this).val() ) {
			$.getJSON('mod/cidades.ajax.php?',{idnaturalUF: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option value="">-- Escolha uma Cidade --</option>';
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].idCidade + '">' + j[i].nom_Cidade + '</option>';
				}
				$('#idcidade').html(options).show();
			}) ;
		} else {
			$('#idcidade').html('<option value="">-- Escolha um estado --</option>');
		}
	});
});
</script>
