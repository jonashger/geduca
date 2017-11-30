<?php  session_start(); include '../../seguranca.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="../../../css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <title>Email e Telefone da Escola</title>
    <link rel="icon" href="../../../favicon.png">

  </head>
  <body>

<?php
$id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null ;
$sqlemail = "SELECT id_email, vl_email, vl_setor FROM tb_email_prefeitura WHERE id_empresa = ?";
$stmt1 = $pdo->prepare( $sqlemail );
$stmt1->bindParam( 1, $id,PDO::PARAM_STR);
$stmt1->execute();
?>
<div class="container">
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
    <div class="row">

<h1 class="col-sm-3">Lista de Email</h1>

<form class="form-inline col-sm-9"  action="functions/prefeAddEmail.php?id=<?=$id?>" method="post" >
  <label class="sr-only" for="inlineFormInputGroup">E-Mail</label>
  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
    <div class="input-group-addon">Adicionar</div>
      <input type="name" class="form-control" name="setor" id="inlineFormInputGroup" required placeholder="setor">
    <input type="email" class="form-control" name="email" id="inlineFormInputGroup" required placeholder="inserir@email.com">
  </div>

  <button type="submit" class="btn btn-primary">Adicionar</button>
</form>


</div>
<table class="table   table-bordered ">
  <thead>
    <tr>
      <th># </th>
      <th>Setor</th>
      <th>Email</th>
	    <th>Modificar</th>
	    <th>Eliminar</th>
    </tr>
  </thead>
  <tbody>



<?php
	// se o número de resultados for maior que zero, mostra os dados
		// inicia o loop que vai mostrar todos os dados
    $cont=0;
		while($linha = $stmt1->fetch(PDO::FETCH_ASSOC)){
      $cont++;
?>
<tr>
	<th scope="col-1"><?=$cont?></th>
	<td class="col-1"><?=$linha['vl_setor']?></td>
	<td class="col-4"><?=$linha['vl_email']?></td>
	<td class="col-1">
		<a href="functions/escolamodificaEmail.php?id=<?=$linha['id']?>" class="btn btn-info disabled" >Modificar</a>
	</td>
	<td class="col-1">
		<a href="functions/prefedeleteemail.php?id=<?=$linha['id']?>"class="btn btn-danger">Eliminar</a>
	</td>
</tr>
<?php
		// finaliza o loop que vai mostrar os dados
	}
	// fim do if
?>
</tbody>
</table>
<?php
$sqlemail = "SELECT id_telefone, ch_tipo, vl_numero FROM tb_telefone_prefeitura WHERE id_empresa = ?";
$stmt1 = $pdo->prepare( $sqlemail );
$stmt1->bindParam( 1, $id,PDO::PARAM_STR);
$stmt1->execute(); ?>

<div class="row">

<h1 class="col-sm-5">Lista de Telefones</h1>

<form class="form-inline col-sm-7"  action="functions/prefeAddTelefone.php?id=<?=$id?>" method="post" >
<label class="sr-only" for="inlineFormInputGroup">E-Mail</label>
<div class="input-group mb-2 mr-sm-2 mb-sm-0">
<label class="mr-sm-2" for="inlineFormCustomSelect">Tipo</label>
 <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="" name="tipo" required>
   <option  selected value="C">Celular</option>
   <option value="F">Fixo</option>
   <option value="A">FAX</option>
 </select>
<input type="text" class="form-control" name="num" id="telCelu" maxlength="14" required placeholder="(xx)xxxxx-xxxx">
</div>

<button type="submit" class="btn btn-primary">Adicionar</button>
</form>


</div>
<table class="table ">
<thead>
<tr>
  <th># </th>
  <th>Tipo</th>
  <th>Telefone          </th>
  <th>Modificar</th>
  <th>Eliminar</th>
</tr>
</thead>
<tbody>



<?php
// se o número de resultados for maior que zero, mostra os dados
// inicia o loop que vai mostrar todos os dados
$cont=0;
while($linha = $stmt1->fetch(PDO::FETCH_ASSOC)){
  $cont++;
?>
<tr>
  <?php
  $vartipo="";
  if($linha['ch_tipo'] == "C"){
    $vartipo="Celular";
  }elseif($linha['ch_tipo'] == "F"){
    $vartipo= "Fixo";
  }else {
    $vartipo="FAX";
  }  ?>
<th scope="col-1"><?=$cont?></th>
<td><?=$vartipo?></td>
<td class="col-5"><?=$linha['vl_numero']?></td>
<td class="col-1">
<a href="functions/escolamodificaEmail.php?id=<?=$linha['id_telefone']?>" class="btn btn-info disabled">Modificar</a>
</td>
<td class="col-1">
<a href="functions/prefedeleteTel.php?id=<?=$linha['id_telefone']?>"class="btn btn-danger">Eliminar</a>
</td>
</tr>
<?php
// finaliza o loop que vai mostrar os dados
}
// fim do if
?>
</tbody>
</table>
</div>
<script type="text/javascript" src="validacao.js">

</script>
  </body>
</html>
