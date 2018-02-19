<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) && ( $_SESSION['nivel'] == 2 ) ){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ocorrência no cartão de ponto</title>
<link rel="stylesheet" type="text/css" href="../../../css/regras.css">
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../../fontes/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
 
<body>
	<?php
	date_default_timezone_set('America/Sao_Paulo');
	$hora_atual = date('H:i');
	$data_atual = date('d/m/Y');
	echo "<header id='' class=''>
				<div class='cabecalho_cadastro'>
					<h1><img src='../../../img/logo.png' alt='Axial'></h1>
					<p><i class='fa fa-calendar' aria-hidden='true'></i> Dia $data_atual, <i class='fa fa-clock-o' aria-hidden='true'></i> $hora_atual</p>
				</div>
		  </header>";
	?>
	<?php require_once"../../menu.php";?>
		
		<?php
			header("Content-type: text/html; charset=utf-8");
			mb_internal_encoding("UTF-8"); 
			

			#require once para insert
			require_once"../../manutencao/abre_conexao.php";
			#Dados para conexão com Banco para realizar Select:
			#Conexao com Banco de dados
			require_once "../../manutencao/conecta.php";
			$conexao = conecta();
			#manipula post
			$nome_unidade = isset($_POST['nome_unidade'])?$_POST['nome_unidade']:'';
			$endereco_unidade = isset($_POST['endereco_unidade'])?$_POST['endereco_unidade']:'';
			$rastro = isset($_POST['rastro'])?$_POST['rastro']:'';
			#querys
			$sql_select = "SELECT * FROM unidade WHERE nome = '$nome_unidade' OR endereco = '$endereco_unidade' ";
			$insert = "INSERT INTO unidade (nome, endereco, usuario_rastro_criacao) VALUES ('$nome_unidade','$endereco_unidade', '$rastro')";
			$select = mysqli_query($conexao, $sql_select);

			if ($validacao = mysqli_num_rows($select)){
				echo "<div class='cadastro_existente'><h1>Unidade $nome_unidade existente. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
			}else{
				if($nome_unidade=="" or $endereco_unidade==""){
				echo "<div class='cadastro_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}else{
					insert($insert);
					echo "<div class='cadastro_existente'><h1>Cadastro da unidade $nome_unidade realizado.<a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}
			}
			
		?>
	
 	<?php require_once"../../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}
?>