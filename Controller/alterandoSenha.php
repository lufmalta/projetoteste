<?php
if(empty($_SESSION['logado'])){
	header("Location: ../View/index.php");
	exit;
}
$id_user = $_SESSION['id_user'];
$novaSenha = addslashes($_POST['senha']);
require "../Model/classes/usuarios.class.php";
$usuarios = new Usuarios();
$usuarios->mudarSenha($id_user, $novaSenha);
header("Location: ../View/index.php");
exit;
