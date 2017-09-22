<?php
	include 'seguranca.php';
	require_once('functions/geral.php');
?>
<div class="container">
	<h2>Cadastro de Escolas</h2>
	<form action="functions/horarioCad.php" method="post" name="form1" style="margin-top: 25px;">

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

					<div class="form-group row">
					  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Nome do Horário</label>
					  <div class="col-lg-8 col-sm-12">
							<input class="form-control" type="text"placeholder="Ex: Normal, Integral" id="nome" name="nome" required autofocus>
					  </div>
					</div>
		<!--horario de inicio-->
	<div class="form-group row">
	  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Nome da Escola</label>
	  <div class="col-lg-8 col-sm-12">
		<input class="form-control" name="nome" type="text" placeholder="Nome"  required autofocus>
	  </div>
	</div>

  <input type="time" min="9:00" max="17:00" step="900">
		<!--horario de termino-->

		<div class="form-group row">
			<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Tipo da Rua</label>
			<div class="col-lg-8 col-sm-12">
				<div class="form-check form-group form-check-inline">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="tipoLocal" id="inlineRadio1" value="R"> Rua
				  </label>
				</div>
				<div class="form-check form-check-inline">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="tipoLocal" id="inlineRadio2" value="A"> Avenida
				  </label>
				</div>
				<div class="form-check form-check-inline">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="tipoLocal" id="inlineRadio3" value="L"> Localidade
				  </label>
				</div>
			</div>
		</div>
		<!--Nome de Localização-->
		<div class="form-group row">
			<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Nome da Rua/Endere</label>
			<div class="col-lg-8 col-sm-12">
			<input class="form-control" name="rua" type="text" placeholder="Rua"  required autofocus>
			</div>
		</div>
		<!--Número de Localização-->
		<div class="form-group row">
			<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Número da Localização</label>
			<div class="col-lg-8 col-sm-12">
			<input class="form-control" name="nrua" type="text" placeholder="Número da Localização" required autofocus>
			</div>
		</div>
		<!--Bairro-->
		<div class="form-group row">
			<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Bairro</label>
			<div class="col-lg-8 col-sm-12">
			<input class="form-control" name="bairro" type="text" placeholder="Bairro" required autofocus>
			</div>
		</div>
		<!--CEP-->
		<div class="form-group row">
			<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">CEP*</label>
			<div class="col-lg-8 col-sm-12">
			<input class="form-control" name="cep" type="text" placeholder="89.897-000" id="cep" onKeyPress="MascaraCep(form1.cep);" maxlength="10">
			</div>
		</div>		<!--Tipo de Telegone-->

				<div class="form-group row">
					<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Tipo de Telefone</label>
					<div class="col-lg-8 col-sm-12">
						<div class="form-check form-group form-check-inline">
						  <label class="form-check-label">
						    <input class="form-check-input" type="radio" name="tipoTele" id="inlineRadio1" value="F"> Fixo
						  </label>
						</div>
						<div class="form-check form-check-inline">
						  <label class="form-check-label">
						    <input class="form-check-input" type="radio" name="tipoTele" id="inlineRadio2" value="C"> Celular
						  </label>
						</div>
						<div class="form-check form-check-inline">
						  <label class="form-check-label">
						    <input class="form-check-input" type="radio" name="tipoTele" id="inlineRadio3" value="A"> FAX
						  </label>
						</div>
					</div>
				</div>
		<!--Telefone-->
		<div class="form-group row">
			<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone Fixo</label>
			<div class="col-lg-8 col-sm-12">
			<input class="form-control"type="text" name="telFixo" placeholder="(99)12345-6789" required autofocus>
			</div>
		</div>
		<!--Email-->
		<div class="form-group row">
			<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Email</label>
			<div class="col-lg-8 col-sm-12">
			<input class="form-control" name="email" type="email" placeholder="escola@prefeitura.com" required autofocus>
			</div>
		</div>

	<button class="btn btn-outline-success col-12 " name="BTEnvia" type="submit">Cadastrar</button>
	</form>

</div>
