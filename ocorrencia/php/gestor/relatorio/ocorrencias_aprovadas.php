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
			
			#require once para insert
			require_once"../../manutencao/abre_conexao.php";
			#Conexao com Banco de dados
			require_once "../../manutencao/conecta.php";
			$conexao = conecta();
			#dados da sessão
			$usuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
 			
 			

 			$sql_select_ocorrencia2 = "SELECT  ocorrencia.id, empregado.nome, empregado.matricula, usuario_gestor.nome, ocorrencia.setor, ocorrencia.unidade, ocorrencia.status,  ocorrencia.justificativa,ocorrencia.data_ocorrencia, ocorrencia.primeira_entrada, ocorrencia.primeira_saida, ocorrencia.segunda_entrada, ocorrencia.segunda_saida, ocorrencia.data_hora, ocorrencia.imagem from ocorrencia  INNER JOIN usuario_gestor ON  ocorrencia.fk_usuario_gestor = usuario_gestor.id INNER JOIN empregado ON ocorrencia.fk_empregado = empregado.id WHERE   assinado = 1 ORDER BY ocorrencia.data_ocorrencia ";


 			$sql_select_nome_gestor = "SELECT nome FROM usuario_gestor WHERE usuario = '$usuario' ";
 			$select_gestor = mysqli_query($conexao, $sql_select_nome_gestor);
 			$select_ocorrencia = mysqli_query($conexao, $sql_select_ocorrencia2);
 			
 			while ($resultado2 = mysqli_fetch_array($select_gestor)) {
						echo "<p>Seja bem vindo $resultado2[0]!</p>";
			}

					if (mysqli_num_rows($select_ocorrencia)) {
 						echo"<form class='aprova'  action='ocorrencias_aprovadas_sucess.php' method='post' accept-charset='utf-8'>
							<table class='aprovacao'>
									<thead>
										<tr>
											
											<th><i class='fa fa-user-o' aria-hidden='true'></i> Empregado</th>
											<th><i class='fa fa-user-o' aria-hidden='true'></i> Matrícula</th>
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
											<th><i class='fa fa-file-text-o' aria-hidden='true'></i> Imagem</th>
											<th></th>
											
										</tr>
									</thead>
									<tbody>
										";

											
											while ($resultado3 = mysqli_fetch_array($select_ocorrencia)) {
												echo"<tr> ";

												for ($i=1; $i <= 12; $i++) { 

													echo"<td>$resultado3[$i]</td>";


												}
													if ($resultado3[6] == "Atestado") {
															echo "<td><a href='../../$resultado3[14]' target='_blank' ><i class='fa fa-envelope' aria-hidden='true'></i></a></td>";
														}else{
															echo "<td><i class='fa fa-times' aria-hidden='true'></i></td>";
														}
													echo "<td> <input type='radio' name='id_ocorrencia' value='$resultado3[0]'></td>";
												echo"</tr>";		
											}
									echo"
									</tbody>
							</table> 
							
							<br><div class='botao_centro'>

							<button class='btn btn-success' type='submit' name='dar_baixa' value='10'><i class='fa fa-level-down' aria-hidden='true'></i> Dar Baixa</button>
							

							</div>
						</form>";
 					} else {
 						echo "<div class='cadastro_existente'><h1>Você não tem ocorrências para serem aprovadas.</h1></div>";
 					}

		?>
	</div>
 	<?php require_once"../../rodape.php";?>
 	<script src="../../../script/jquery-3.2.1.js" charset="utf-8"></script>
	<script>
		$(document).ready(function(){
			$('.btn').click(function(){
				$('.btn').text('Dando baixa, por favor aguarde...').addClass('btn_azul_efeito');
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