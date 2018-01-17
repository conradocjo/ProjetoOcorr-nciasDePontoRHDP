<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) && ( $_SESSION['nivel'] == 1 ) ){

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
	<?php require_once"../../menu2.php";?>
	
	<div class="">
		<form class="form_cadastro_unidade" action="" method="get" accept-charset="utf-8">
		<fieldset>
			<legend>Cadastro de Unidade</legend>
				<i class="fa fa-building-o" aria-hidden="true"></i> Nome da Unidade: <input placeholder="Digite o nome da unidade . . ." type="text" style="width: 350px " name="nome_unidade"><br><br>
				<i class="fa fa-building-o" aria-hidden="true"></i> Endereco da Unidade: <input type="text" style="width: 350px " name="endereco_unidade"  placeholder="Digite o endereço da unidade . . ." >
		</fieldset><br>
				<button type="submit" class="btn btn_azul">Enviar Dados</button>
		</form><br>
	</div><!-- Div formulario -->
 	<?php require_once"../../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}
?>