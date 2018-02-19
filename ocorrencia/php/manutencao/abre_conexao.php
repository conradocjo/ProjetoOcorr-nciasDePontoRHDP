<?php
	header("Content-type: text/html; charset=utf-8");
	mb_internal_encoding("UTF-8"); 
	
	

	function insert ($sql_query) {
	date_default_timezone_set('America/Sao_Paulo');		

	#Dados de conexão com banco
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "ocorrencia";

	#Variavel para conexão com Banco

	$conexao = mysqli_connect($host, $usuario, $senha, $bd);
	
	mysqli_query($conexao, $sql_query);
	mysqli_close($conexao);
	}

?>