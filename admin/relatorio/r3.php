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
     <?php $sql = "SELECT p.id, p.nome, nam.nota, nam.id_materia, mp.nome AS nomeMat, t.nome AS turma FROM pessoa AS p
                  INNER JOIN presenca AS pre ON pre.id_aluno = p.id
                  INNER JOIN diario AS d ON d.id = pre.id_diario
                  INNER JOIN tipo_ano_letivo AS tal ON (tal.id = d.id_ano_letivo_periodo)
                  INNER JOIN ano_letivo AS al ON al.id = tal.id_ano_letivo
                  INNER JOIN nota_aluno_materia AS nam ON ((nam.id_aluno = p.id) AND (nam.id_ano_letivo_periodo = tal.id))
                  INNER JOIN materia AS m ON m.id = nam.id_materia
                  INNER JOIN materia_padrao AS mp ON mp.id = m.id_materia_padrao
                  INNER JOIN turma AS t ON t.id = m.id_turma
                  WHERE ((pre.presente = 0) AND (al.ano = 2017))
                  GROUP BY nam.id ORDER BY p.id ASC, nam.id_materia ASC;";
     // executa a query
     $stmt1 = $pdo->prepare( $sql );
     $stmt1->execute();

     $line = $stmt1->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_FIRST);
     $contaNotas = 1;
     $somaNota  = $line['nota'];
     $idAluno   = $line['id'];
     $nomeAluno = $line['nome'];
     $idMateria = $line['id_materia'];
     $nomeMat   = $line['nomeMat'];
     $turma     = $line['turma'];
     $n = 0;
     $arrayFinal = array();
     while ($line = $stmt1->fetch(PDO::FETCH_ASSOC)) {
       if (($line['id'] == $idAluno) AND ($line['id_materia'] == $idMateria)) {
         $contaNotas++;
         $somaNota  += $line['nota'];
         $idAluno   = $line['id'];
         $idMateria = $line['id_materia'];
         $nomeAluno = $line['nome'];
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


         $idAluno = $line['id'];
         $contaNotas = 1; $somaNota = 0;
         $somaNota  += $line['nota'];
         $idMateria  = $line['id_materia'];
         $nomeAluno  = $line['nome'];
         $nomeMat    = $line['nomeMat'];
         $turma      = $line['turma'];
       }
     }

     usort($arrayFinal, 'cmp');
     foreach ($arrayFinal as $linha) { ?>
       <tr>
         <th><?=$linha['id']?></th>
         <th><?=$linha['turma']?></th>
         <th><?=$linha['materia']?></th>
         <th><?=$linha['nome']?></th>
         <th><?=$linha['media']?></th>
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
