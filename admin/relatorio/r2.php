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

<h2>Relatório 2</h2>
<h5>2 - Relacionar id, nome, e a quantidade de alunos das turmas com aulas de manhã com mais de 15 alunos</h5>
 <table class="table   table-bordered ">
   <thead>
     <tr>
             <th>ID</th>
             <th>Turma</th>
             <th>Alunos</th>
     </tr>
   </thead>
   <tbody>
     <?php $sql = "SELECT t.id, t.nome, COUNT(m.id) AS qtdAlunos FROM turma AS t
LEFT JOIN matricula AS m ON m.id_turma = t.id
WHERE id_turno IN (SELECT tu.id FROM turno AS tu WHERE (tu.nome LIKE '%Matutino%')) GROUP BY t.nome HAVING COUNT(m.id) > 15;";
     // executa a query
     $stmt1 = $pdo->prepare( $sql );
     $stmt1->execute();
	 while ($linha = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  # code...
 ?>
 <tr>
 	 <th ><?=$linha['id']?></th>
	 <th ><?=$linha['nome']?></th>
 	 <th ><?=$linha['qtdAlunos']?></th>
 </tr>
<?php }; ?>

 </tbody>
 </table>
 </div>
