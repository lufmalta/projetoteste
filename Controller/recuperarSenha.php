<?php
if(!isset($_POST['email']) && empty($_POST['email'])){
	header("Location: ../View/index.php");
	exit;
}
	require "../Model/classes/usuarios.class.php";
	$email = addslashes($_POST['email']);
	$usuarios = new Usuarios();
	session_start();
	if($usuarios->verificarExisteUsuario($email) == true){
		require "../Model/classes/userToken.class.php";
		$id_user = $_SESSION['id_user'];
		$userToken = new userToken();

		$token = md5(time().round(0,9999).round(0,9999));
		$expirado_em = date('Y-m-d H:i', strtotime('+ 2 months'));

		$userToken->novoToken($token, $expirado_em, $id_user);



		$para = $email;
		$assunto = "Redefinir senha";
		$link =
		 "<a href='../View/redefinir.php?token=$token'>"."Link para Redefinir a senha"."</a>";
		$cabecalho = "From: lufmalta@gmail.com"."\r\n".
					"X-Mailer: PHP/".phpversion();
		echo "<a href='../View/redefinir.php?token=$token'>"."Link para Redefinir a senha"."</a>";			
		//echo "Email enviado com sucesso!!!".'<br/>';			
		//mail($para, $assunto, $link, $cabecalho);			
		//$erro = "Enviamos um email para você recuperar sua senha";
		//echo $link;		
		// header("Location: ../View/index.php");
		// exit;


	}else {
		//$erro = "Não existe este usuário cadastrado no sistema";
		echo "Não existe este usuário cadastrado no sistema".'<br/>';
	}
 ?>
 <a href="../View/index.php">Voltar</a>