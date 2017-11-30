<?php require 'seguranca.php'; ?>
<div class="text-center container text-center " style="float: center">
<?php
  require("conexao.php");
  $sql = "SELECT id_empresa, vl_cnpj, vl_nome, cd_cidade, cd_numero, vl_rua, vl_bairro, vl_cep FROM tb_prefeitura;";
  // executa a query
  $stmt1 = $pdo->prepare( $sql );
  $stmt1->execute();

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


  <table class="table   table-bordered ">
    <thead>
      <tr>
        <th>CNPJ</th>
        <th>Nome</th>
  			<th>Endereço</th>
  			<th>Cidade/UF</th>
        <th>Ver Emails<br>Telefones</th>
  	    <th>Modificar</th>
  	    <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
  <?php
  		// inicia o loop que vai mostrar todos os dados
  		while($linha = $stmt1->fetch(PDO::FETCH_ASSOC)){
        $id=$linha['cd_cidade'];
        $sql = "SELECT id_cidade, cd_uf, vl_nome FROM tb_cidade WHERE id_cidade = $id;";
        // executa a query
        $stmtCidade = $pdo->prepare( $sql );
        $stmtCidade->execute();
        $cidade = $stmtCidade->fetch(PDO::FETCH_ASSOC);
        $id =  $cidade['cd_uf'];
        $sql = "SELECT id_estado, vl_sigla FROM tb_estado WHERE id_estado = $id;";
        // executa a query
        $stmtEstado = $pdo->prepare( $sql );
        $stmtEstado->execute();
        $estado = $stmtEstado->fetch(PDO::FETCH_ASSOC);
  ?>
  <tr>
  	<th ><?=$linha['vl_cnpj']?></th>
  	<td ><?=$linha['vl_nome']?></td>
  	<td><?=$linha['vl_rua'].",".$linha['cd_numero']." - CEP:".$linha['vl_cep']?></td>
  	<td><?=$cidade['vl_nome']."/". $estado['vl_sigla']?></td>
    <td>
    <a href="#" onclick="window.open('http://127.0.0.1/geduca/admin/list/popUp/listEmailPrefe.php?id=<?=$linha['id_empresa']?>', 'Ver Email da Escola', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=1070, HEIGHT=700');"><button class="btn btn-info" type="button" name="button">Ver Emails<br>Telefones</button></a>
    </td>
  	<td >
  		<a href="administrativo.php?mod=ediEscola"class="btn btn-info disabled">Modificar</a>
  	</td>
  	<td >
  		<a href="list/deletePrefe.php?id=<?=$linha['id_empresa']?>"class="btn btn-danger">Eliminar</a>
  	</td>
  </tr>
  <?php
  		// finaliza o loop que vai mostrar os dados
  	};
  	// fim do if
  ?>
  </tbody>
  </table>
</div>
