<?php
	header("Content-type: text/html; charset=utf-8");
	mb_internal_encoding("UTF-8"); 
	mysql_set_charset('utf8');
	

	function insert ($sql_query) {
	date_default_timezone_set('America/Sao_Paulo');		

	#Dados de conexão com banco
	$host = "localhost";
	$usuario = "root";
	$senha = "";
	$bd = "ocorrencia";

	#Variavel para conexão com Banco

	$conexao = mysqli_connect($host, $usuario, $senha, $bd);
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	mysqli_query($conexao, $sql_query);
	mysqli_close($conexao);
	}

?>