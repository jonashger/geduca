<?php require('seguranca.php'); require_once('functions/geral.php'); ?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      	<ul class="nav nav-tabs">
      		<li class="nav-item">
      			<a id="tabPerfil" href="#perfil" class="nav-link" role="tab" data-toggle="tab">Perfil</a>
            <script type="text/javascript">
        			window.onload = function(){
        				document.getElementById('tabPerfil').click();
        			}
            </script>
            <script src='js/validacao.js' type="text/javascript"></script>
      		</li>

      		<li class="nav-item">
      			<a href="#config" class="nav-link" role="tab" data-toggle="tab">Configurações</a>
      		</li>
          <?php if (($_SESSION['nivel'] == 5) OR ($_SESSION['nivel'] == 3)){ ?>
        		<li class="nav-item">
        			<a href="#turmas" class="nav-link" role="tab" data-toggle="tab">Turmas</a>
        		</li>
            <?php } elseif (($_SESSION['nivel'] == 1) OR ($_SESSION['nivel'] == 2)) { ?>
              <li class="nav-item">
          			<a href="#adminEscolar" class="nav-link" role="tab" data-toggle="tab">Administração Escola</a>
          		</li>
            <?php } elseif ($_SESSION['nivel'] == 0) { ?>
              <li class="nav-item">
          			<a href="#adminSys" class="nav-link" role="tab" data-toggle="tab">Administração Sistema</a>
          		</li>
            <?php } ?>
      	</ul>

      	<div class="tab-content">
      		<div role="tabpanel" class="tab-pane fade in active" id="perfil">
            <?php
              require('conexao.php');
              $sql = "SELECT p.id_tipo_pessoa, p.id_funcao, p.email, p.nome, p.cpf, p.rg, p.numero_certidao, p.data_nascimento, p.sexo,
                      p.id_cidade_natural, p.id_cidade_atual, p.id_pai, p.id_mae, c.id_uf AS id_uf_natural, c2.id_uf AS id_uf_atual
                      FROM pessoa AS p
                      INNER JOIN cidade AS c ON c.id = p.id_cidade_natural
                      INNER JOIN cidade AS c2 ON c2.id = p.id_cidade_atual
                      WHERE p.id = ?";
              $stmt = $pdo->prepare( $sql );
              $stmt->bindParam(1, $_SESSION['idUsuario'],PDO::PARAM_INT);
              $stmt->execute();
              $resultadoPessoa = $stmt->fetch(PDO::FETCH_ASSOC);

              list($ano, $mes, $dia) = explode("-", $resultadoPessoa['data_nascimento']);

              if (empty($resultadoPessoa)){
                    $_SESSION['perfilError'] = "Falha ao buscar as informações do usuário.".$sql.$resultadoPessoa['email'] ;
                }elseif(isset($resultadoPessoa)){
                  $sqlTelefone = 'SELECT * FROM telefone_pessoa WHERE id_pessoa = ?';
                  $stmtTelefone = $pdo->prepare($sqlTelefone);
                  $stmtTelefone->bindParam(1, $_SESSION['idUsuario'], PDO::PARAM_INT);
                  $stmtTelefone->execute();
                  $resultadoTelefone = $stmtTelefone->fetch(PDO::FETCH_ASSOC);
                  $qtdTelefones = $stmtTelefone->rowCount();

                  if (($resultadoPessoa['id_pai'] > 0) OR ($resultadoPessoa['id_mae'] > 0)) {
                    $sqlPai = 'SELECT id, cpf FROM pessoa WHERE id = ?';
                    $stmtPai = $pdo->prepare($sqlPai);
                    $stmtPai->bindParam(1, $resultadoPessoa['id_pai'], PDO::PARAM_INT);
                    $stmtPai->execute();
                    $resultadoPai = $stmtPai->fetch(PDO::FETCH_ASSOC);

                    $sqlMae = 'SELECT id, cpf FROM pessoa WHERE id = ?';
                    $stmtMae = $pdo->prepare($sqlMae);
                    $stmtMae->bindParam(1, $resultadoPessoa['id_mae'], PDO::PARAM_INT);
                    $stmtMae->execute();
                    $resultadoMae = $stmtMae->fetch(PDO::FETCH_ASSOC);
                  }

                }else{
                $_SESSION['perfilError'] = "Falha ao buscar as informações do usuário.";
              }

              if(isset($_SESSION['perfilError'])){ ?>
                <p class="text-center alert alert-danger" >
            <?php
                echo "Id: ".$_SESSION['idUsuario'];
                echo($_SESSION['perfilError']);
                unset($_SESSION['perfilError']);
            ?>
                </p>
            <?php }		?>
            <form action="functions/aaa" method="post" name="editPerfil" style="margin-top: 25px;">
              <?php if(isset($_SESSION['perfilError'])){ ?>
          			<p class="text-center alert alert-danger" >
          			<?php
            			echo($_SESSION['perfilError']);
            			unset($_SESSION['perfilError']);
          			?>
          			</p>
          			<?php }
                  if(isset($_SESSION['perfilSucesso'])){
          			?>
          			<p class="text-center alert alert-success" >
          			<?php
            			echo($_SESSION['perfilSucesso']);
            			unset($_SESSION['perfilSucesso']);
          			?>
          		  <div class="form-group row">
          			  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Nome Completo</label>
          			  <div class="col-lg-8 col-sm-12">
          				<input class="form-control" name="nome" type="text" placeholder="Fulano Ciclano" value="<?=$resultadoPessoa['nome'] ?>" require autofocus>
          			  </div>
          			</div>
          			<div class="form-group row">
          				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Email</label>
          				<div class="col-lg-8 col-sm-12">
          				<input class="form-control" name="email" type="email" placeholder="aluno@dominio.com" value="<?=$resultadoPessoa['email'] ?>" required autofocus>
          				</div>
          			</div>
          			<div class="form-group row">
          				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Sexo</label>
          				<div class="col-lg-8 col-sm-12">
          					<div class="form-check form-group form-check-inline">
          						<label class="form-check-label">
          							<input class="form-check-input" type="radio" name="sexo" id="inlineRadio1"  value="M" <?php if($resultadoPessoa['sexo'] == 'M') {?> checked <?php } ?> > Masculino
          						</label>
          					</div>
          					<div class="form-check form-check-inline">
          						<label class="form-check-label">
          							<input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="F" <?php if($resultadoPessoa['sexo'] == 'F') {?> checked <?php } ?> > Feminino
          						</label>
          					</div>
          					<div class="form-check form-check-inline">
          						<label class="form-check-label">
          							<input class="form-check-input" type="radio" name="sexo" id="inlineRadio3" value="I" <?php if($resultadoPessoa['sexo'] == 'I') {?> checked <?php } ?> > Indefinido
          						</label>
          					</div>
          				</div>
          			</div>
          			<div class="form-group row">
          				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Data de Nascimento </label>
          				<div class="col-lg-8 col-sm-12">
          				<input class="form-control" name="dataNasc" type="text" id="dtNasc" value="<?=$mes.$dia.$ano?>" required autofocus>
          				</div>
          			</div>
          			<!--Tipo de Pessoa-->
                <?php if ($_SESSION['nivel'] <= 2) { ?>
                  <div class="form-group row">
            				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Tipo de Pessoa</label>
            				<div class="col-lg-8 col-sm-12">
            					<select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="tipoPessoa" required name="tipoPessoa">

            						 <option value="1">Administrador</option>
            						 <option value="2">Funcionário</option>
            						 <option value="3">Aluno(a)</option>
            						 <option value="4">Pai</option>
            						 <option value="5">Mãe</option>
            						 <option value="6">Outro Responsável</option>
                      </select>

            				</div>
            			</div>

            			<div class="form-group row " id="funcao">
            				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Função</label>
            				<div class="col-lg-8 col-sm-12">
            					<select class="disabled custom-select mb-2 mr-sm-2 mb-sm-0" id="pessoaFuncao" name="funcao">

            						 <option disabled selected value="0"></option>
            						 <option value="1">Diretor(a)</option>
            						 <option value="2">Vice-Diretor(a)</option>
            						 <option value="3">Secretário(a)</option>
            						 <option value="4">Professor(a)</option>
            						 <option value="5">Sec.Educação</option>
            					 </select>

            				</div>
            			</div>
                <?php }

                if ((isset($resultadoTelefone)) AND ($qtdTelefones > 2)) {
                  do {
                    if ($resultadoTelefone['tipo'] == 'F') {
                ?>
                    <div class="form-group row">
              				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone Fixo</label>
              				<div class="col-lg-8 col-sm-12">
              				<input class="form-control"type="text" name="fixo<?=$i ?>" id="fixo<?=$i ?>"
              		maxlength="13" placeholder="(99)1245-6789" value="<?=$resultadoTelefone['numero'] ?>" required autofocus>
              				</div>
              			</div>
                <?php
                    } elseif ($resultadoTelefone['tipo'] == 'C') {
                ?>
              			<!--   TELEFONE Celular " -->
              			<div class="form-group row">
              				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone Celular</label>
              				<div class="col-lg-8 col-sm-12">
              				<input class="form-control"type="text" name="celular<?=$i ?>" id="celular<?=$i ?>"
              		maxlength="14" placeholder="(99)12345-6789" value="<?=$resultadoTelefone['numero'] ?>" required autofocus>
              				</div>
              			</div>
                <?php
                    } elseif ($resultadoTelefone['tipo'] == 'A') {
                ?>
                      <!--   FAX " -->
                      <div class="form-group row">
                        <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">FAX</label>
                        <div class="col-lg-8 col-sm-12">
                        <input class="form-control"type="text" name="fax<?=$i ?>" id="fax<?=$i ?>"
                    maxlength="14" placeholder="(99)12345-6789" value="<?=$resultadoTelefone['numero'] ?>" required autofocus>
                        </div>
                      </div>
                <?php
                    }
                  } while($resultadoTelefone = $stmtTelefone->fetch(PDO::FETCH_ASSOC));
                }else {
                  $fixo = NULL; $celular = NULL; $fax = NULL;
                  do {
                    if ($resultadoTelefone['tipo'] == 'F') {
                      $fixo = $resultadoTelefone['numero'];
                    }elseif ($resultadoTelefone['tipo'] == 'C') {
                      $celular = $resultadoTelefone['numero'];
                    } else {
                      $fax = $resultadoTelefone['numero'];
                    }
                  } while($resultadoTelefone = $stmtTelefone->fetch(PDO::FETCH_ASSOC));
                ?>

                  <!--   TELEFONE Fixo " -->
            			<div class="form-group row">
            				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone Fixo</label>
            				<div class="col-lg-8 col-sm-12">
            				<input class="form-control"type="text" name="fixo" id="fixo"
            		maxlength="13" placeholder="(99)1245-6789" value="<?=$fixo ?>" required autofocus>
            				</div>
            			</div>
            			<!--   TELEFONE Celular " -->
            			<div class="form-group row">
            				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Telefone Celular</label>
            				<div class="col-lg-8 col-sm-12">
            				<input class="form-control"type="text" name="celular" id="celular"
            		maxlength="14" placeholder="(99)12345-6789" value="<?=$celular ?>" required autofocus>
            				</div>
            			</div>
                  <?php
                    if (count($fax) > 0) {
                  ?>
                    <div class="form-group row">
              				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">FAX</label>
              				<div class="col-lg-8 col-sm-12">
              				<input class="form-control"type="text" name="fax" id="fax"
              		maxlength="14" placeholder="(99)12345-6789" value="<?=$fax ?>" required autofocus>
              				</div>
              			</div>
                <?php
                    }
                }

                if ($_SESSION['nivel'] <= 2) {
                ?>
            			<div class="form-group row">
            				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">RG</label>
            				<div class="col-lg-8 col-sm-12">
            				<input class="form-control" name="rg" type="text" placeholder="1.123.123" value="<?=$resultadoPessoa['rg']?>" autofocus>
            				</div>
            			</div>
            			<div class="form-group row">
            				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Número da Certidão</label>
            				<div class="col-lg-8 col-sm-12">
            				<input class="form-control" name="nCertidao" type="text" placeholder="45151556" value="<?=$resultadoPessoa['numero_certidao'] ?>" autofocus>
            				</div>
            			</div>
                <?php
                }
                 ?>
								<div class="form-group row">
								  <label for="idnaturalUF" class="col-lg-4 col-sm-12 col-form-label">Estado Natural</label>
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
            			<label for="ufEstado" class="col-lg-4 col-sm-12 col-form-label">Estado Atual</label>
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
          				<label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">Cidade Atual</label>
        				    <div class="col-lg-8 col-sm-12">
        							<select name="idcidade" id="idcidade" class="custom-select mb-2 mr-sm-2 mb-sm-0">
        										<option value="">-- Escolha um estado --</option>
        							</select>
        					  </div>
          		  </div>
                <?php if ($_SESSION['nivel'] <= 2) { ?>
          		  <div id="cpfPaiMai">
          			  <div class="form-group row">
          				  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">CPF do PAI</label>
          				  <div class="col-lg-8 col-sm-12">
          					  <input class="form-control" type="text"placeholder="123.456.789-10" id="cpfPai" name="cpfPai" onKeyPress="MascaraCPF(this);"
          				       maxlength="14" autofocus>
          				  </div>
          			  </div>

          			  <div class="form-group row">
          				  <label for="example-text-input" class="col-lg-4 col-sm-12 col-form-label">CPF da MÃE</label>
          				  <div class="col-lg-8 col-sm-12">
          					  <input class="form-control" type="text"placeholder="123.456.789-10" id="cpfMae" name="cpfMae" onKeyPress="MascaraCPF(this);"
          				maxlength="14" autofocus>
          				  </div>
          			  </div>
          		  </div>
                <?php
              } ?>
          	<button class="btn btn-outline-success col-4 "name="BTEnvia" type="submit">Salvar</button>
          	</form>
          </div>
      		<div role="tabpanel" class="tab-pane fade" id="config">
              <!--
              Aqui vai ter opções para mudar algumas configurações, como senha e demais coisas..
            -->

          </div>
      		<div role="tabpanel" class="tab-pane fade" id="turmas">
            <!--
            Se for professor, lista as turmas que tem, se for aluno, as que participa
          -->
          </div>
          <div role="tabpanel" class="tab-pane fade" id="adminEscolar">
            <!--
            Várias configurações que a direção pode fazer
          -->
          </div>
          <div role="tabpanel" class="tab-pane fade" id="adminSys">
            <!--
            Todas as configurações disponíveis
          -->
          </div>
      	</div>
      </div>
    </div>
  </div>
</body>

<script type="text/javascript">
  $(document).ready(function() {
    <?php if ($_SESSION['nivel'] == 2) { ?>
      $("#tipoPessoa option").each(function(){
        if($(this).attr('value') == <?=$resultadoPessoa['id_tipo_pessoa']?>) {
          $(this).attr('selected', true);
          <?php if ($resultadoPessoa['id_tipo_pessoa'] == 2) { ?>
            $("#tipoPessoa").change();
            $("#tipoPessoa").ready(function(){
              $("#pessoaFuncao option").each(function(){
                if($(this).attr('value') == <?=$resultadoPessoa['id_funcao']?>){
                  $(this).attr('selected', true);
                }
              });
            });
          <?php } ?>
        }
      });
    <?php } ?>


    // loop que percorre cada uma das opções
    // e verifica se o value da opção confere com o
    // valor da base que está sendo procurado
    $('#idnaturalUF option').each(function() {
      // se localizar a frase, define o atributo selected
      if($(this).attr('value') == <?=$resultadoPessoa['id_uf_natural']?>) {
        $(this).attr('selected', true);
        //força o change para que liste as cidades
        $.when($("#idnaturalUF").change()).then(function(x){
          //assim que concluir, seta a cidade
          $("#idnaturalidade").ready(function(){
            $("#idnaturalidade option").each(function(){
              if($(this).attr('value') == <?=$resultadoPessoa['id_cidade_natural']?>){
                $(this).attr('selected', true);
                return false;//vai sair do loop assim que encontrar o valor
              }
            });
          });
        });
        return false;//vai sair do loop assim que encontrar o valor
      }
    });

    $('#ufEstado option').each(function() {
      // se localizar a frase, define o atributo selected
      if($(this).attr('value') == <?=$resultadoPessoa['id_uf_atual']?>) {
        $(this).attr('selected', true);
        //força o change para que liste as cidades, e após o change executa o que tiver no done
        $.when($("#ufEstado").change()).then(function(xx){
          $("#idcidade").ready(function(){
            $("#idcidade option").each(function(){
              if($(this).attr('value') == <?=$resultadoPessoa['id_cidade_atual']?>){
                $(this).attr('selected', true);//assim que concluir, seta a cidade
                return false;//vai sair do loop assim que encontrar o valor
              }
            });
          });
        });
        return false;//vai sair do loop assim que encontrar o valor
      }
    });

  });
</script>
