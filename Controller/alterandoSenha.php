<?php
if(empty($_SESSION['logado'])){
	header("Location: ../View/index.php");
	exit;
}
$id_user = $_SESSION['id_user'];
$novaSenha = $_POST['senha'];
$novaSenha = password_hash($novaSenha, PASSWORD_BCRYPT);
require "../Model/classes/usuarios.class.php";
$usuarios = new Usuarios();
$usuarios->mudarSenha($id_user, $novaSenha);
header("Location: ../View/index.php");
exit;
