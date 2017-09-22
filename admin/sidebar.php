<div class="text-center container col-sm-12 col-lg-3">
  <div id="accordion" role="tablist" aria-multiselectable="false">

        <?php if (	$_SESSION['nivel'] <= 2){?>
    <div class="card">
      <div class="" role="tab" id="headingOne">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"  class="btn btn-primary btn-block btn-outline-primary">
            Cadastros
          </a>
      </div>
      <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="card-block">

            <?php if (	$_SESSION['nivel'] == 2){?>
                    <a href="administrativo.php?mod=cadastro-de-pessoa" class="btn btn-primary btn-block btn-outline-primary">Cadastro de Pessoa/Aluno</a>
          <?php }elseif (	$_SESSION['nivel'] == 1){?>
                    <a href="administrativo.php?mod=cadastro-de-pessoa" class="btn btn-primary btn-block btn-outline-primary">Cadastro de Pessoa/Aluno</a>
                    <a href="administrativo.php?mod=cadEscola" class="btn btn-primary btn-block btn-outline-primary">Cadastro de Escola</a>
                    <a href="administrativo.php?mod=cadSeries" class="btn btn-primary btn-block btn-outline-primary">Cadastro de Séries</a>
          <?php }elseif($_SESSION['nivel'] == 0){?>
                <a href="administrativo.php?mod=cadastro-de-pessoa" class="btn btn-primary btn-block btn-outline-primary">Cadastro de Pessoa/Aluno</a>
                <a href="administrativo.php?mod=cadEscola" class="btn btn-primary btn-block btn-outline-primary">Cadastro de Escola</a>
                <a href="administrativo.php?mod=cadPrefeitura" class="btn btn-primary btn-block btn-outline-primary">Cadastro de Prefeitura</a>
          <?php } ?>
      </div>
      </div>
    </div>
    <?php } ?>

      <?php if (	$_SESSION['nivel'] <= 2){?>
    <div class="card">
      <div class="" role="tab" id="headingTwo">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"  class="btn btn-primary btn-block btn-outline-primary">
          Editar
        </a>
      </div>
      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="card-block">
            <?php if (	$_SESSION['nivel'] == 0){?>
         <a href="administrativo.php?mod=editPrefeitura" class="btn btn-primary btn-block btn-outline-primary">Editar Prefeituras</a>
             <?php } ?>
         <a href="administrativo.php?mod=editEscola" class="btn btn-primary btn-block btn-outline-primary">Editar Escolas</a>
            <a href="administrativo.php?mod=editar-alunos" class="btn btn-primary btn-block btn-outline-primary">Editar Alunos</a>
         </div>
      </div>
    </div>
        <?php } ?>

            <?php if (	$_SESSION['nivel'] <= 2){?>
    <div class="card">
      <div class="" role="tab" id="headingThree">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"  class="btn btn-primary btn-block btn-outline-primary">
          Consultas/Relatórios
        </a>
      </div>
      <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="card-block">
         <a href="administrativo.php?mod=em-breve" class="btn btn-primary btn-block btn-outline-primary">Relatório de Turmas</a>
         <a href="administrativo.php?mod=em-breve" class="btn btn-primary btn-block btn-outline-primary">Relatório de Escolas</a>
         <a href="administrativo.php?mod=relatorio-1" class="btn btn-primary btn-block btn-outline-primary">Relatório 1</a>
         <a href="administrativo.php?mod=relatorio-2" class="btn btn-primary btn-block btn-outline-primary">Relatório 2</a>
         <a href="administrativo.php?mod=relatorio-3" class="btn btn-primary btn-block btn-outline-primary">Relatório 3</a>
         <a href="administrativo.php?mod=relatorio-4" class="btn btn-primary btn-block btn-outline-primary">Relatório 4</a>
      </div>
      </div>
    </div>

        <?php } ?>


    <div class="card">
      <div class="" role="tab" id="headingThree">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree"  class="btn btn-primary btn-block btn-outline-primary">
          Acesso Rápido
        </a>
      </div>
      <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="card-block">
          <a href="administrativo.php?mod=em-breve" class="btn btn-primary btn-block btn-outline-primary">Consulta de Nota</a>
         <a href="administrativo.php?mod=cadPrefeitura" class="btn btn-primary btn-block btn-outline-primary">Ocorrências</a>
      </div>
      </div>
    </div>
    <?php if (	$_SESSION['nivel'] == 5 OR $_SESSION['nivel'] == 0){?>
      <div class="card">
        <div class="" role="tab" id="">
          <a href="administrativo.php?mod=area-da-direcao"class="btn btn-primary btn-block btn-outline-primary">
           Área da Direção
          </a>
        </div>
        </div>
     <?php } ?>

        <?php if (	$_SESSION['nivel'] == 3 OR $_SESSION['nivel'] == 0){?>

    <div class="card">
      <div class="" role="tab" id="">
        <a href="administrativo.php?mod=area-do-professor"class="btn btn-primary btn-block btn-outline-primary">
         Área do Professor
        </a>
      </div>
      </div>

 <?php } ?>


          <?php if (	$_SESSION['nivel'] == 4 OR $_SESSION['nivel'] == 0){?>


      <div class="card">
        <div class="" role="tab" id="">
          <a href="administrativo.php?mod=area-dos-pais"class="btn btn-primary btn-block btn-outline-primary">
           Área dos Pais
          </a>
        </div>
        </div>

 <?php } ?>

      <?php if (	$_SESSION['nivel'] == 5 OR $_SESSION['nivel'] == 0){?>
        <div class="card">
          <div class="" role="tab" id="">
            <a href="administrativo.php?mod=area-do-aluno"class="btn btn-primary btn-block btn-outline-primary">
             Área do Aluno
            </a>
          </div>
          </div>
       <?php } ?>

    </div>
</div>
