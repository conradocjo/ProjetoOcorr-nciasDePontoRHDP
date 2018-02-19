<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) ){

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ocorrência no cartão de ponto</title>
<link rel="stylesheet" type="text/css" href="../css/regras.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../fontes/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
 
<body>
	<?php
	date_default_timezone_set('America/Sao_Paulo');
	$hora_atual = date('H:i');
	$data_atual = date('d/m/Y');
	echo "<header id='' class=''>
				<div class='cabecalho_cadastro'>
					<h1><img src='../img/logo.png' alt='Axial'></h1>
					<p><i class='fa fa-calendar' aria-hidden='true'></i> Dia $data_atual, <i class='fa fa-clock-o' aria-hidden='true'></i> $hora_atual</p>
				</div>
		  </header>";
	?>
	
	<div class="">
		<?php
			require_once"manutencao/abre_conexao.php";
			#POSTS
			$nova_Senha = isset($_POST['nova_Senha'])?($_POST['nova_Senha']):'';
			$matricula = $_SESSION['matricula'];
			#Querys
			$update_nova_senha = "UPDATE empregado SET senha = md5('$nova_Senha') WHERE matricula = '$matricula' ";
			if ($matricula != '') {
				insert($update_nova_senha);
				echo "<div class='cadastro_existente'><h1>Sua senha foi alterada com sucesso!<a href='manutencao/deslogar_empregado.php'>Clique aqui</a> para sair.</h1></div>";
			} else {
				header("Location: ../index.php");
			}

		?>
	</div><!-- Div formulario -->
 	<?php require_once"rodape.php";?>
 	<script src="../script/jquery-3.2.1.js" charset="utf-8"></script>
	<script>
		$(document).ready(function(){
			$('.btn').click(function(){
				$('.btn').text('Enviando dados, por favor aguarde...').addClass('btn_azul_efeito');
			});
		});
	</script>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}

?>
