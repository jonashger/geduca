<?php		session_start();
include_once('conexao.php');

if	((isset($_POST['email']))  && (isset($_POST['password']))){
	$usuario = $_POST['email'];
	$senha = md5($_POST['password']);

	$sql = "SELECT id_pessoa, cd_nivel_permissao, vl_email, vl_nome FROM tb_pessoa WHERE vl_email = ? AND vl_password = ?";
	$stmt = $pdo->prepare( $sql );
	$stmt->bindParam( 1, $usuario,PDO::PARAM_STR);
	$stmt->bindParam( 2, $senha,PDO::PARAM_STR);
 $stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

	if (empty($resultado)){
				$_SESSION['loginErro'] = "Usuário e/ou Senha Inválida".$sql.$resultado['vl_email'].$senha ;
			header("Location: index.php	");
		}elseif(isset($resultado)){
		    $_SESSION['login'] = $usuario;
				$_SESSION['senha'] = $senha;
				$_SESSION['title'] = "Educa - Painel Administrativo";
				$_SESSION['user'] = $resultado['vl_nome'];
				$_SESSION['nivel'] = $resultado['cd_nivel_permissao'];
				$_SESSION['idUsuario'] = $resultado['id_pessoa'];
			header("Location: administrativo.php");
		}else{
		$_SESSION['loginErro'] = "Usuário e/ou Senha Inválida";
		header("Location: index.php");
	}
	}else{
	$_SESSION['loginErro'] = "Usuário e/ou Senha Inválida";
	header("Location: index.php");}
?>
