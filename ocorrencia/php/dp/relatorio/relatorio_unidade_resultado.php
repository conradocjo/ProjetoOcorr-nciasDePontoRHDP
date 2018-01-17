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
			#dados do POST
			$data1 = isset($_POST['data1'])?$_POST['data1']:'';
			$data2 = isset($_POST['data2'])?$_POST['data2']:'';
			$unidades = isset($_POST['unidades'])?$_POST['unidades']:'';
 			
 			

 			$sql_select_ocorrencia2 = "SELECT  ocorrencia.id, empregado.nome, usuario_gestor.nome , ocorrencia.setor, ocorrencia.unidade, ocorrencia.status,  ocorrencia.justificativa,ocorrencia.data_ocorrencia, ocorrencia.primeira_entrada, ocorrencia.primeira_saida, ocorrencia.segunda_entrada, ocorrencia.segunda_saida, ocorrencia.data_hora, ocorrencia.assinado from ocorrencia  INNER JOIN usuario_gestor ON  ocorrencia.fk_usuario_gestor = usuario_gestor.id INNER JOIN empregado ON ocorrencia.fk_empregado = empregado.id WHERE  ocorrencia.assinado = '10' AND ocorrencia.unidade = '$unidades'  AND ocorrencia.data_ocorrencia BETWEEN '$data1' AND '$data2' ";


 			$sql_select_nome_gestor = "SELECT nome FROM usuario_gestor WHERE usuario = '$usuario' ";
 			$select_gestor = mysqli_query($conexao, $sql_select_nome_gestor);
 			$select_ocorrencia = mysqli_query($conexao, $sql_select_ocorrencia2);
 			
 			while ($resultado2 = mysqli_fetch_array($select_gestor)) {
						echo "<p>Seja bem vindo $resultado2[0]!</p>";
			}

					if (mysqli_num_rows($select_ocorrencia)) {
 						echo"
							<table class='aprovacao'>
									<thead>
										<tr>
											<th>ID</th>
											<th><i class='fa fa-user-o' aria-hidden='true'></i> Empregado</th>
											<th><i class='fa fa-user-o' aria-hidden='true'></i> Gestor</th>
											<th><i class='fa fa-users' aria-hidden='true'></i> Setor</th>
											<th><i class='fa fa-building-o' aria-hidden='true'></i> Unidade</th>
											<th><i class='fa fa-file-text-o' aria-hidden='true'></i> Motivo</th>
											<th><i class='fa fa-file-text-o' aria-hidden='true'></i> Justificativa</th>
											<th><i class='fa fa-calendar' aria-hidden='true'></i> Data da ocorrência</th>
											<th><i class='fa fa-clock-o' aria-hidden='true'></i> 1º Entrada</th>
											<th><i class='fa fa-clock-o' aria-hidden='true'></i> 1º Saída</th>
											<th><i class='fa fa-clock-o' aria-hidden='true'></i> 2º Entrada</th>
											<th><i class='fa fa-clock-o' aria-hidden='true'></i> 2º Saída</th>
											<th><i class='fa fa-clock-o' aria-hidden='true'></i> Hora da realização</th>
											<th>Status</th>
											
										</tr>
									</thead>
									<tbody>
										";

											
											while ($resultado3 = mysqli_fetch_array($select_ocorrencia)) {
												echo"<tr> ";

												for ($i=0; $i <= 12; $i++) { 

													echo"<td>$resultado3[$i]</td>";


												}

												if ($resultado3[13] == '10') {
													echo"<td>Ocorrência Lançada</td>";
												}
										
												echo"</tr>";		
											}
									echo"
									</tbody>
							</table> 
							

							</div>
						";
 					} else {
 						echo "<div class='dado_existente'><h1>Sem dados para unidade $unidades nas datas selecionadas. </h1></div>";
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