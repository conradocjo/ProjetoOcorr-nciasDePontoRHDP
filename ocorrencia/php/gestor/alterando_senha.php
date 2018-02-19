<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) && ( $_SESSION['nivel'] == 1 ) ){

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ocorrência no cartão de ponto</title>
<link rel="stylesheet" type="text/css" href="../../css/regras.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../fontes/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
 
<body>
	<?php
	date_default_timezone_set('America/Sao_Paulo');
	$hora_atual = date('H:i');
	$data_atual = date('d/m/Y');
	echo "<header id='' class=''>
				<div class='cabecalho_cadastro'>
					<h1><img src='../../img/logo.png' alt='Axial'></h1>
					<p><i class='fa fa-calendar' aria-hidden='true'></i> Dia $data_atual, <i class='fa fa-clock-o' aria-hidden='true'></i> $hora_atual</p>
				</div>
		  </header>";
	?>

	<?php require_once"../menu2.php";?>
	
	<div class="">
		<?php
			require_once"../manutencao/abre_conexao.php";
			#POSTS
			$nova_Senha = isset($_POST['nova_Senha'])?($_POST['nova_Senha']):'';
			$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
			#Querys
			$update_nova_senha = "UPDATE usuario_gestor SET senha = md5('$nova_Senha') WHERE usuario = '$usuario_sessao' ";
			if ($usuario_sessao != '') {
				insert($update_nova_senha);
				echo "<div class='cadastro_existente'><h1>Sua senha foi alterada com sucesso!<a href='../manutencao/deslogar_empregado.php'>Clique aqui</a> para sair.</h1></div>";
			} else {
				header("Location: index.php");
			}

		?>
	</div><!-- Div formulario -->
 	<?php require_once"../rodape.php";?>
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
		header("Location: ../../index.php"); exit;
	}

?>
