<?php
	#Reaproveitamento de dados de conexão.
	function conecta () {

		#Dados de conexão com banco
		$host = "localhost";
		$usuario = "root";
		$senha = "";
		$bd = "ocorrencia";

		#Variavel para conexão com Banco

		$conexao = mysqli_connect($host, $usuario, $senha, $bd);
		return $conexao;
	}

	function desconecta_db () {
		mysqli_close($conexao);
	}

?>