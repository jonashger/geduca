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

<h2>Relatório 4</h2>
<h5>Relacione o id, o nome e a idade de professores das disciplinas de matemática e geografia que lecionaram em 2016
	  em turmas das escolas de SMO e SJO, ordenar pelo nome do professor de forma ascendente</h5>
 <table class="table   table-bordered ">
   <thead>
     <tr>
             <th>ID</th>
             <th>Nome</th>
             <th>Idade</th>
     </tr>
   </thead>
   <tbody>
     <?php $sql = "SELECT p.id, p.nome, (YEAR(CURDATE()) - YEAR(p.data_nascimento)) AS idade FROM pessoa AS p
INNER JOIN escola_usuario AS eu ON p.id = eu.id_usuario
INNER JOIN tipo_funcao AS tf ON eu.id_tipo_funcao = tf.id
INNER JOIN escola AS e ON e.id = eu.id_escola
INNER JOIN turma AS t ON t.id_escola = e.id
INNER JOIN ano_letivo AS al ON al.id = t.id_ano_letivo
WHERE ((tf.nome = 'Professor(a) de Matemática') OR (tf.nome = 'Professor(a) de Geográfia')) AND (al.ano = 2017)
AND ((e.nome = 'SMO') OR (e.nome = 'SJO')) GROUP BY p.id ORDER BY p.nome ASC;";
     // executa a query
     $stmt1 = $pdo->prepare( $sql );
     $stmt1->execute();
	 while ($linha = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  # code...
 ?>
 <tr>
 	 <th ><?=$linha['id']?></th>
	 <th ><?=$linha['nome']?></th>
 	 <th ><?=$linha['idade']?></th>
 </tr>
<?php }; ?>

 </tbody>
 </table>
 </div>
