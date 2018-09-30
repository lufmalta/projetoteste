<?php 

$usuario = md5(addslashes('31@$**'.($_POST['usuario']).'64*6¨'));
$senha = addslashes($_POST['senha']);
$resultado = $usuario.'E'.$senha;
return $resultado;
