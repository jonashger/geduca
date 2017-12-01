<?php
    require_once('seguranca.php');
 ?>

 <div class="text-center container text-center " style="float: center">
 <?php
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

<h2>Relatório 3</h2>
<h5>3 - Relacione o id, nome de alunos sem nenhuma falta em 2017 e cuja média de nota é maior que 8,
	ordenar do aluno com maior nota para menor nota.</h5>
 <table class="table   table-bordered ">
   <thead>
     <tr>
             <th>Cód. Aluno</th>
             <th>Turma</th>
             <th>Materia</th>
             <th>Nome</th>
             <th>Nota</th>
     </tr>
   </thead>
   <tbody>
     <?php
     $sql = "select id_pessoa, vl_nome, fl_nota, cd_materia, nomeMat, turma from vw_r3;";
     // executa a query
     $stmt1 = $pdo->prepare( $sql );
     $stmt1->execute();

     $line = $stmt1->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_FIRST);
     $contaNotas = 1;
     $somaNota  = $line['fl_nota'];
     $idAluno   = $line['id_pessoa'];
     $nomeAluno = $line['vl_nome'];
     $idMateria = $line['cd_materia'];
     $nomeMat   = $line['nomeMat'];
     $turma     = $line['turma'];
     $n = 0;
     $arrayFinal = array();
     while ($line = $stmt1->fetch(PDO::FETCH_ASSOC)) {
       if (($line['id_pessoa'] == $idAluno) AND ($line['cd_materia'] == $idMateria)) {
         $contaNotas++;
         $somaNota  += $line['fl_nota'];
         $idAluno   = $line['id_pessoa'];
         $idMateria = $line['cd_materia'];
         $nomeAluno = $line['vl_nome'];
         $nomeMat   = $line['nomeMat'];
         $turma     = $line['turma'];
       }else {
         if ($contaNotas > 1) {
           $media = $somaNota / $contaNotas;
         }else {
           $media = $somaNota;
         }

         if ($media > 8) {
           $arrayFinal[$n] = array('id'       => $idAluno,
                                   'turma'    => $turma,
                                   'materia'  => $nomeMat,
                                   'nome'     => $nomeAluno,
                                   'media'    => sprintf("%.2f", $media)
                                  );
            $n++;
         }


         $idAluno = $line['id_pessoa'];
         $contaNotas = 1; $somaNota = 0;
         $somaNota  += $line['fl_nota'];
         $idMateria  = $line['cd_materia'];
         $nomeAluno  = $line['vl_nome'];
         $nomeMat    = $line['nomeMat'];
         $turma      = $line['turma'];
       }
     }

     usort($arrayFinal, 'cmp');
     foreach ($arrayFinal as $linha) { ?>
       <tr>
         <th><?=$linha['id_pessoa']?></th>
         <th><?=$linha['turma']?></th>
         <th><?=$linha['cd_materia']?></th>
         <th><?=$linha['vl_nome']?></th>
         <th><?=$linha['fl_media']?></th>
       </tr>
     <?php }

     unset($stmt1);
     unset($line);
     unset($idAluno);
     unset($contaNotas);
     unset($somaNota);
     unset($media);
     unset($idMateria);
     unset($nomeAluno);
     unset($nomeMat);
     unset($turma);
     unset($arrayFinal);

     // Compara se $a é menor que $b
    // Ordem decrescente
    function cmp($a, $b) {
      return $a['media'] < $b['media'];
    }

 ?>

 </tbody>
 </table>
 </div>
