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
      $sql = "select id_pessoa, vl_nome, idade from vw_r4;";

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
