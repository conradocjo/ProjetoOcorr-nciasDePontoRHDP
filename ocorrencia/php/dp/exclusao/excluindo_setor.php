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
					<p>Dia $data_atual, $hora_atual</p>
				</div>
		  </header>";
	?>
	<?php require_once"../../menu.php";?>
		
		<?php
			header("Content-type: text/html; charset=utf-8");
			mb_internal_encoding("UTF-8"); 
			mysql_set_charset('utf8');

			#require once para insert
			require_once"../../manutencao/abre_conexao.php";
			#Dados para conexão com Banco para realizar Select:
			$host = "localhost";
			$usuario = "root";
			$senha = "";
			$bd = "ocorrencia";
			#abre conexao com banco
			$conexao = mysqli_connect($host, $usuario, $senha, $bd);
			#manipula post
			$setor = isset($_POST['setor'])?$_POST['setor']:'';
			$rastro = isset($_POST['rastro'])?$_POST['rastro']:'';
			$id_setor = isset($_POST['id_setor'])?$_POST['id_setor']:'';
			#querys
			$insert = "DELETE FROM setor where id = '$id_setor' ";
			$select_dados = "SELECT * FROM setor WHERE id = '$id_setor' ";
			$testa_dados = mysqli_query($conexao, $select_dados);

			if ($validacao = mysqli_num_rows($testa_dados)){
				insert($insert);
				echo "<div class='cadastro_existente'><h1>Setor <b>$id_setor</b> apagado. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
			}else{
				if($setor==""){
					echo "<div class='cadastro_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}else{
					echo "<div class='cadastro_existente'<h1>Setor não alterado, não encontrado dados. <i class='fa fa-smile-o' aria-hidden='true'></i></h1></div>";
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