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
					<a href='index.php'><h1><img src='../img/logo.png' alt='Axial'></h1></a>
					<p><i class='fa fa-calendar' aria-hidden='true'></i> Dia $data_atual, <i class='fa fa-clock-o' aria-hidden='true'></i> $hora_atual</p>
				</div>
		  </header>";
	?>
	<div class="admin">
		<p>Seja Bem Vindo!</p>
	</div>
	
	
	<div class="">
		<?php
			$matricula = $_SESSION['matricula'];
			echo "<br>";
			echo "<div class='formulario'><legend>Sua matrícula é $matricula</legend>";
			echo "<h6>Digite uma nova senha<h6>";
			echo"<form action='alterando_senha.php' method='post' accept-charset='utf-8'>
					<input type='password' name='nova_Senha'><br><br>
					<button class='btn btn_azul' type='submit'>Enviar dados</button>
				</form>";

			echo"</div>";
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
