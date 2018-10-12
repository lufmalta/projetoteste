<?php 
session_start();
unset($_SESSION['logado']);
header("Location: ../View/index.php");
exit;
?>
