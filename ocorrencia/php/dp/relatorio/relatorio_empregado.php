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
	<div >
		<form class="form_cadastro_unidade" action="relatorio_empregado_resultado.php" method="post" accept-charset="utf-8">
			<legend>Relatório por empregado</legend>
			<label><i class='fa fa-calendar' aria-hidden='true'></i> <input type="date" name="data1" ></label> até 
			<label><i class='fa fa-calendar' aria-hidden='true'></i> <input type="date" name="data2" ></label><br>
			<label><i class='fa fa-user-o' aria-hidden='true'></i> <input type="number" style='width: 400px' name="matricula" placeholder="Digite a matrícula do empregado . . ."></label><br>
			<button class="btn btn-info" type="submit"><i class="fa fa-database" aria-hidden="true"></i> Buscar Dados</button>
		</form>

	</div>
	
	
	
 	<?php require_once"../../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}
?>