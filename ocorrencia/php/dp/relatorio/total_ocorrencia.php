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
	<div class="container" style='overflow: auto; height: 400px'>
		
			
		<?php
			#dados para conexão com Banco de dados.
			header("Content-type: text/html; charset=utf-8");
			mb_internal_encoding("UTF-8"); 
			
			#require once para insert
			require_once"../../manutencao/abre_conexao.php";
			#Dados para conexão com Banco para realizar Select:
			#Conexao com Banco de dados
			require_once "../../manutencao/conecta.php";
			$conexao = conecta();
			#dados da sessão
			$usuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
			#dados do post
			$matricula = isset($_POST['matricula'])?$_POST['matricula']:'';
 			
 			

 			$sql_select_ocorrencia2 = "SELECT COUNT(id) from ocorrencia  WHERE  ocorrencia.assinado = '10'";
 			$sql_select_ocorrencia_mega = "SELECT COUNT(id) from ocorrencia  WHERE unidade='Mega Unidade' AND assinado = '10'";
 			$sql_select_ocorrencia_bm = "SELECT COUNT(id) from ocorrencia  WHERE unidade='Bernardo Monteiro' AND assinado = '10'";
 			$sql_select_ocorrencia_gd = "SELECT COUNT(id) from ocorrencia  WHERE unidade='Gonçalves Dias' AND assinado = '10'";
 			$seleciona_unidade = "SELECT nome FROM unidade";



 			$sql_select_nome_gestor = "SELECT nome FROM usuario_gestor WHERE usuario = '$usuario' ";
 			$select_gestor = mysqli_query($conexao, $sql_select_nome_gestor);
 			$select_ocorrencia = mysqli_query($conexao, $sql_select_ocorrencia2);
 			$select_unidade = mysqli_query($conexao,$seleciona_unidade);
 			
 			while ($resultado2 = mysqli_fetch_array($select_gestor)) {
						echo "<p>Seja bem vindo $resultado2[0]!</p>";
			}

					echo"<table class='aprovacao'>
						<caption>table title and/or explanatory text</caption>
						<thead>
							<tr>";
								while ($resultado5 = mysqli_fetch_array($select_unidade)) {
									echo "<th>$resultado5[0]</th>";
								}
						echo"</tr>
						</thead>
						<tbody>
							<tr>
								<td>data</td>
							</tr>
						</tbody>
					</table>";

					

					if (mysqli_num_rows($select_ocorrencia)) {

											while ($resultado3 = mysqli_fetch_array($select_ocorrencia)) {
													echo"Total de ocorrências aprovadas: $resultado3[0].";
												}
 					} else {
 						echo "<div class='cadastro_existente'><h1>Nenhuma ocorrência de $matricula.</h1></div>";
 					}

		?>
	</div>
 	<?php require_once"../../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}
?>