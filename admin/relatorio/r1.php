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

<h2>Relatório 1</h2>
<h5>Relacionar id, nome, cpf das pessoas do sexo masculino mais de 10 anos e com email no gmail, ordenar de forma descendente pelo nome da pessoa.</h5>
 <table class="table   table-bordered ">
   <thead>
     <tr>
             <th>ID</th>
             <th>Nome</th>
             <th>CPF</th>
     </tr>
   </thead>
   <tbody>
     <?php $sql = "select id_pessoa, vl_nome, vl_cpf from vw_r1;";
     // executa a query
     $stmt1 = $pdo->prepare( $sql );
     $stmt1->execute(); ?>
<?php while ($linha = $stmt1->fetch(PDO::FETCH_ASSOC)) {
  # code...
 ?>
 <tr>
 	<th ><?=$linha['id_pessoa']?></th>
  <th ><?=$linha['vl_nome']?></th>
  <th ><?php
$nbr_cpf= $linha['vl_cpf'];

$parte_um     = substr($nbr_cpf, 0, 3);
$parte_dois   = substr($nbr_cpf, 3, 3);
$parte_tres   = substr($nbr_cpf, 6, 3);
$parte_quatro = substr($nbr_cpf, 9, 2);

$monta_cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";

echo $monta_cpf;
  ?></th>
 </tr>
<?php }; ?>
 </tbody>
 </table>
 </div>
