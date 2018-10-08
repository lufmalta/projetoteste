<?php 

require 'classes/usuarios.class.php';

//session_start();
$email = addslashes($_POST['usuario']);
$senha = md5(addslashes($_POST['senha']));
$pdo = '';

// $con = new Banco();
// $pdo = $con->conectar($pdo);
$usuarios = new usuarios();
if($usuarios->verificarExisteUsuario($email) == true){
	if($usuarios->verificarUsuSenha($email, $senha) == true){
		$_SESSION['logado'] = $email;
		$_SESSION['invalido'] = '';
		header("Location: areaRestrita.php");
		exit;
	}else {
		//$_SESSION['invalido'] = "Usuario e/ou senha invalidos";
		$_SESSION['invalido'] = "Usuario e/ou senha invalidos";
		//header("Location: index.php");
		//exit;
	}// caso a senha ou usuario estejam invalidos

//fim do verificar se existe esse usuario no banco	
}else {
	//$_SESSION['invalido'] = "Usuario nao cadastrado no sistema";
		$_SESSION['invalido'] = "Usuario nao cadastrado no sistema";
		//header("Location: index.php");
		//exit;
} 

//$dadosPessoas->

// $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
// $sql = $pdo->prepare($sql);
// $sql->bindValue(':email',$email);
// $sql->bindValue(':senha', $senha);
// $sql->execute();

// if($sql->rowCount() > 0){
// 	$sql = $sql->fetch();
// 	session_start();
// 	$_SESSION['logado'] = $sql['email'];
// 	header("Location: curriculo.php");
// }else {
// 	header("Location: index.php");
// }

// $resultado = $usuario.'E'.$senha;
// return $resultado;
