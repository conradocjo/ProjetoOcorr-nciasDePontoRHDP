<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) && ( $_SESSION['nivel'] == 2 ) ){
		session_destroy();
		header("Location: /ocorrencia/index.php"); exit;
	}
?>