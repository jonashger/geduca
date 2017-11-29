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
     <?php
      $sql = "SELECT p.id_pessoa, p.vl_nome, (select extract(YEAR from (select current_date))) - (select extract(YEAR from p.dt_nascimento)) AS idade
              	FROM tb_pessoa AS p
              	INNER JOIN tb_escola_usuario AS eu ON p.id_pessoa = eu.cd_usuario
              	INNER JOIN tb_tipo_funcao AS tf ON tf.id_tipofuncao = eu.cd_tipo_funcao
              	INNER JOIN tb_escola AS e ON e.id_escola = eu.cd_escola
              	INNER JOIN tb_turma AS t ON t.cd_escola = e.id_escola
              	INNER JOIN tb_ano_letivo AS al ON al.id_anoletivo = t.cd_ano_letivo
              WHERE ((tf.vl_nome = 'Professor(a) de Matemática') OR (tf.vl_nome = 'Professor(a) de Geográfia')) AND (al.cd_ano = 2017)
              AND ((e.vl_nome = 'SMO') OR (e.vl_nome = 'SJO')) GROUP BY p.id_pessoa ORDER BY p.vl_nome ASC;";

     // executa a query
     $stmt1 = $pdo->prepare( $sql );
     $stmt1->execute();
	 while ($linha = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  # code...
 ?>
 <tr>
 	 <th ><?=$linha['id_pessoa']?></th>
	 <th ><?=$linha['vl_nome']?></th>
 	 <th ><?=$linha['idade']?></th>
 </tr>
<?php }; ?>

 </tbody>
 </table>
 </div>
