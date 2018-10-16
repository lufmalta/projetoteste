<script type="text/javascript">
	function voltar(){
		location.href="index.php";
	}
</script>
<?php
if(!empty($_GET['token'])): //inicia o if
	$hash = addslashes($_GET['token']); //recebe o valor do token

	?>
	<form method="POST">
		<label for="senha" >Nova Senha</label>
		<input id="senha" type="password" name="senha" maxlength="20" /><br/><br/>
		<input type="submit" value="Alterar"/>
		<button onClick="voltar()">Voltar</button>
	</form>
	<?php
	require "../Controller/mudarSenha.php";
	


	

else:
	header("Location: index.php");
	exit;
endif;// encerra o  primeiro if deste codigo
?>