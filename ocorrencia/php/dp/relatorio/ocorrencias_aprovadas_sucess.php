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
	<div class="container" style='overflow: auto; height: 420px'>
		
			
		<?php
			#dados para conexão com Banco de dados.
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
			#dados da sessão
			$usuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
 			#POST
 			$dar_baixa = isset($_POST['dar_baixa'])?$_POST['dar_baixa']:'';
 			$id_ocorrencia = isset($_POST['id_ocorrencia'])?$_POST['id_ocorrencia']:'';
 			$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';

 			#Query
 			$insert = "UPDATE ocorrencia SET assinado = '$dar_baixa', rastro = '$usuario_sessao'  WHERE id = '$id_ocorrencia'  ";

 			if($id_ocorrencia==""){
					echo "<div class='dado_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}else{
					insert($insert);
					header("Location: ocorrencias_aprovadas.php");
				}
			
		?>
	</div>
 	<?php require_once"../../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../index.php"); exit;
	}
?>