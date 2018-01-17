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
	
	<div class="hme">
			<?php
				#dados para conexão com Banco de dados.
				header("Content-type: text/html; charset=utf-8");
				mb_internal_encoding("UTF-8"); 
				mysql_set_charset('utf8');
				#Dados para conexão com Banco para realizar Select:
				$host = "localhost";
				$usuario = "root";
				$senha = "";
				$bd = "ocorrencia";
				#abre conexao com banco
				$conexao = mysqli_connect($host, $usuario, $senha, $bd);
				#dados da sessão
				$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
 				$sql_select_nome_gestor = "SELECT nome FROM usuario_gestor WHERE usuario = '$usuario_sessao' ";
 				$select_gestor = mysqli_query($conexao, $sql_select_nome_gestor);
 				while ($resultado2 = mysqli_fetch_array($select_gestor)) {
					echo "<br><h2>Seja bem vindo ao módulo de administração $resultado2[0]!</h2>
					<h1><i class='fa fa-home' aria-hidden='true'></i><br></h1>";
				}
				
			?>
		
	</div><!-- Div formulario -->
 	<?php require_once"../../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}
?>