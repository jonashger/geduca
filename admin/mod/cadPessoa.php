<?php require('seguranca.php'); require_once('functions/geral.php'); ?>
<div class="container">
	<h2>Cadastro de Pessoa/Aluno</h2>
	<?php if ($_SESSION['nivel'] < 3): ?>


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
	<form action="functions/pessoaCad.php" method="post" name="form1" style="margin-top: 25px;">

			<div class="form-group row">
			  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">CPF da Pessoa/Aluno*</label>
			  <div class="col-lg-8 col-sm-12">
					<input class="form-control" type="text"placeholder="xxx.xxx.xxx-xx" id="cpf" name="cpf"
				maxlength="14" required autofocus>
			  </div>
			</div>
		  <div class="form-group row">
			  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Nome Completo*</label>
			  <div class="col-lg-8 col-sm-12">
				<input class="form-control" name="nome" type="text" placeholder="Fulano Ciclano" require autofocus>
			  </div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Email*</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control" name="email" type="email" placeholder="aluno@dominio.com"  required autofocus>
				</div>
			</div>
			<!--Senha-->
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Senha*</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control"type="password" name="senha" placeholder="********" required autofocus>
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Sexo*</label>
				<div class="col-lg-8 col-sm-12">
					<div class="form-check form-group form-check-inline">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="sexo" id="inlineRadio1"  value="M"> Masculino
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="F"> Feminino
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="sexo" id="inlineRadio3" value="I"> Indefinido
						</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Data de Nascimento*</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control" name="dataNasc" type="text" id="dataNasc"  required autofocus>
				</div>
			</div>
			<!--Tipo de Pessoa-->
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Tipo de Pessoa*</label>
				<div class="col-lg-8 col-sm-12">
					<select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="tipoPessoa" required name="tipoPessoa">

						 <option value="1">Administrador</option>
						 <option value="2">Funcionário</option>
						 <option selected value="3">Aluno(a)</option>
						 <option value="4">Pai</option>
						 <option value="5">Mãe</option>
						 <option value="6">Outro Responsável</option>
					 </select>

				</div>
			</div>

			<div class="form-group row " id="funcao">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Função</label>
				<div class="col-lg-8 col-sm-12">
					<select class="disabled custom-select mb-2 mr-sm-2 mb-sm-0" id="pessoaFuncao" name="pessoaFuncao">

						 <option disabled selected value="0"></option>
						 <option  value="1">Diretor(a)</option>
						 <option  value="2">Vice-Diretor(a)</option>
						 <option  value="3">Secretário(a)</option>
						 <option  value="4">Professor(a)</option>
						 <option  value="5">Sec.Educação</option>
					 </select>

				</div>
			</div>
			<!--   TELEFONE Fixo " -->
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone Fixo*</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control"type="text" name="fixo" id="telFixo"
		maxlength="13" placeholder="(xx)xxxx-xxxx" autofocus required>
				</div>
			</div>
			<!--   TELEFONE Celular " -->
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone Celular*</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control"type="text" name="celular" id="telCelu"
		maxlength="14" placeholder="(xx)xxxxx-xxxx" required autofocus>
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">RG</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control" name="rg" type="text" placeholder="1.123.123" autofocus>
				</div>
			</div>
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Número da Certidão</label>
				<div class="col-lg-8 col-sm-12">
				<input class="form-control" name="nCertidao" type="text" placeholder="45151556" autofocus>
				</div>
			</div>



								<div class="form-group row">
													<label for="idnaturalUF" class="col-lg-4 col-sm-12 col-form-label">Estado Natural*</label>
													<div class="col-lg-8 col-sm-12">
												<select name="idnaturalUF" id="idnaturalUF" class="custom-select mb-2 mr-sm-2 mb-sm-0">
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
											</option>

									</select>
									</div>
						</div>


				<div class="form-group row">
					<label for="idnaturalidade" class="col-lg-4 col-sm-12 col-form-label">Cidade Natural</label>
								<div class="col-lg-8 col-sm-12">
								<select name="idnaturalidade" id="idnaturalidade" class="custom-select mb-2 mr-sm-2 mb-sm-0">
										<option value="">-- Escolha um estado --</option>
							</select>
						</div>
			</div>

			<div class="form-group row">
								<label for="ufEstado" class="col-lg-4 col-sm-12 col-form-label">Estado Atual*</label>
								<div class="col-lg-8 col-sm-12">
							<select name="idAtualUF" id="ufEstado" class="custom-select mb-2 mr-sm-2 mb-sm-0">
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
							</option>
				</select>
				</div>
	</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Cidade Atual*</label>
							<div class="col-lg-8 col-sm-12">
								<select name="idcidade" id="idcidade" class="custom-select mb-2 mr-sm-2 mb-sm-0">
										<option value="">-- Escolha um estado --</option>
							</select>
					</div>
		</div>

		<div id="cpfPaiMai">
			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">CPF do PAI</label>
				<div class="col-lg-8 col-sm-12">
					<input class="form-control" type="text"placeholder="xxx.xxx.xxx-xx" id="cpfPai" name="cpfPai"
				maxlength="14" autofocus>
				</div>
			</div>

			<div class="form-group row">
				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">CPF da MÃE</label>
				<div class="col-lg-8 col-sm-12">
					<input class="form-control" type="text"placeholder="xxx.xxx.xxx-xx" id="cpfMae" name="cpfMae"
				maxlength="14" autofocus>
				</div>
			</div>
		</div><!--
				<div class="form-group row">
					<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Brasão/Logomarca</label>
					<div class="col-lg-4 col-sm-12">
						<label class="custom-file">
						  <input type="file" id="file" name="file"class="custom-file-input">
						  <span class="custom-file-control">Selecionar Arquivo.</span>
						</label>
					</div>
					<div class="col-lg-4 col-sm-12">
						<span id="txt"></span>
					</div>
				</div>-->

	<button class="btn btn-outline-success col-8 "name="BTEnvia" type="submit">Cadastrar</button>
	<button class="btn btn-outline-warning col-2 " name="BTEnvia" type="reset">Reset</button>
	</form>

<?php endif; ?>
</div>
