<?php 

require 'classes/usuarios.class.php';

$email = addslashes($_POST['usuario']);
$senha = md5(addslashes($_POST['senha']));
$pdo = '';

// $con = new Banco();
// $pdo = $con->conectar($pdo);
$usuarios = new usuarios();
if($usuarios->verificarExisteUsuario($email) == true){
	if($usuarios->verificarUsuSenha($email, $senha) == true){
		header("Location: curriculo.php");
	}else {
		echo "Usuario e/ou senha invalidos";
	}// caso a senha ou usuario estejam invalidos

//fim do verificar se existe esse usuario no banco	
}else {
	echo "Usuario nao cadastrado no sistema";
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
