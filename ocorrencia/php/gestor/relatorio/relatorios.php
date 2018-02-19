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
<link rel="stylesheet" type="text/css" href="../../../fontes/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap/css/bootstrap.min.css">
 
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
	<?php require_once"../../menu2.php";?>
	<div class="container container_relatorios">
		
			
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

		?>

		<div class="row">
			<div class="col-md-4 ">
				<div class="divisao_relatorio">
					<button class='btn btn-relatorio' id="btn_relatorio_unidade"><i class="fa fa-pie-chart" aria-hidden="true"></i> Relatório por unidade</button>
				</div>
			</div>
			<div class="col-md-4">
				<div class="divisao_relatorio">
					<button class='btn btn-relatorio' id="btn_relatorio_setor"><i class="fa fa-list-ol" aria-hidden="true"></i> Relatório por setor</button>
				</div>
			</div>
			<div class="col-md-4">
				<div class="divisao_relatorio">
					<button class='btn btn-relatorio' id="btn_relatorio_empregado"><i class="fa fa-list-ol" aria-hidden="true"></i> Relatório por empregado</button>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-4 ">
				<div class="divisao_relatorio btn-relatorio2">
					<button id='btn_ocorrencias_total_empregado' class="btn btn-relatorio"><i class="fa fa-pie-chart" aria-hidden="true"></i> Total por empregado</button>
				</div>
			</div>
			<div class="col-md-4">
				<div class="divisao_relatorio">
					<button id='btn_total_ocorrencias_setor' class="btn btn-relatorio"><i class="fa fa-pie-chart" aria-hidden="true"></i> Total de ocorrências por setor</button>
				</div>
			</div>
		</div>
	</div>


			
			<!-- Modal Ocorrencia por data-->
			<div class="modal fade" id="ocorrencias_por_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Ocorrencia por data</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        	<form class='formulario_relat' action="total_ocorrencia.php" method="post" accept-charset="utf-8">
			        		<input type="date" name="data1"> até <input type="date" name="data2"><br>
			        		<br><button type="submit" class="btn btn-relatorio">Enviar dados</button>
			        	</form>
			      </div>
			      <div class="modal-footer">
			        
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Modal Relatório total por justificativas -->
			<div class="modal fade" id="ocorrencias_justificativa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Relatório total por justificativas</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        	<form class="formulario_relat" action="total_justificativa.php" method="post" accept-charset="utf-8">
			        		<input type="date" name="data1"> até <input type="date" name="data2"><br>
			        		<br><button type="submit" class="btn btn-relatorio">Enviar dados</button>
			        	</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-relatorio">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Modal Relatório Total de ocorrências por unidades -->
			<div class="modal fade" id="ocorrencias_total_unidades" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Relatório Total de ocorrências por unidades</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        ...
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-relatorio">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Modal Relatório Total de Ocorrencias por setor -->
			<div class="modal fade" id="total_ocorrencias_setor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Total de ocorrencias por setor</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       		<form class="formulario_relat" action="total_ocorrencia_setor.php" method="post" accept-charset="utf-8">
			     
			        		<?php
			        			#Conexao com Banco de dados
								require_once "../../manutencao/conecta.php";
								$conexao = conecta();

								# Query

								$seleciona_setor = "SELECT nome, id FROM setor";
								$seleciona_unidade = "SELECT nome, id FROM unidade";
								$select_setor = mysqli_query($conexao, $seleciona_setor);
								$select_unidade = mysqli_query($conexao, $seleciona_unidade);
								echo"<select name='setores'>";
								while ($resultado9 = mysqli_fetch_array($select_setor)) {
									
										echo"<option value='$resultado9[0]'>$resultado9[0]</option>";
									
								}
								echo"</select>";
								
			        		?>
			        		<br><br><button type="submit" class="btn btn-relatorio">Enviar dados</button>

			        	</form>
			      </div>
			      <div class="modal-footer">
			       
			      </div>
			    </div>
			  </div>
			</div>



			<!-- Modal -->
			<div class="modal fade" id="relatorio_unidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Relatório por Unidade</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        	<form class="formulario_relat" action="relatorio_unidade_resultado.php" method="post" accept-charset="utf-8">
			        		<input type="date" name="data1"> até <input type="date" name="data2">
			        		<?php
			        			#Conexao com Banco de dados
								require_once "../../manutencao/conecta.php";
								$conexao = conecta();

								# Query

								$seleciona_unidades = "SELECT nome, id FROM unidade";
								$select_unidades = mysqli_query($conexao, $seleciona_unidades);
								echo"<select name='unidades'>";
								while ($resultado8 = mysqli_fetch_array($select_unidades)) {
									
										echo"<option value='$resultado8[0]'>$resultado8[0]</option>";
									
								}
								echo"</select>";

			        		?>
			        		<br><br><button type="submit" class="btn btn-relatorio">Enviar dados</button>

			        	</form>
			      </div>
			      <div class="modal-footer">
			      
			      </div>
			    </div>
			  </div>
			</div>




			<!-- Modal Relatório por setor -->
			<div class="modal fade" id="relatorio_setor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Relatório por setor</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        	<form class="formulario_relat" action="relatorio_setor_resultado.php" method="post" accept-charset="utf-8">
			        		<input type="date" name="data1"> até <input type="date" name="data2">
			        		<?php
			        		
								#Conexao com Banco de dados
								require_once "../../manutencao/conecta.php";
								$conexao = conecta();

								# Query

								$seleciona_setor = "SELECT nome, id FROM setor";
								$select_setor = mysqli_query($conexao, $seleciona_setor);
								echo"<select name='setores'>";
								while ($resultado9 = mysqli_fetch_array($select_setor)) {
									
										echo"<option value='$resultado9[0]'>$resultado9[0]</option>";
									
								}
								echo"</select>";
								
			        		?>
			        		<br><br><button type="submit" class="btn btn-relatorio">Enviar dados</button>

			        	</form>
			      </div>
			      <div class="modal-footer">
			      </div>
			    </div>
			  </div>
			</div>

			<!-- Modal Relatório por empregado -->
			<div class="modal fade" id="relatorio_empregado" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Relatório por empregado</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        	<form class="formulario_relat" action="relatorio_empregado_resultado.php" method="post" accept-charset="utf-8">
			        		<input type="date" name="data1"> até <input type="date" name="data2"><br>
			        		<input type="number" name="matricula" placeholder="Digite a matrícula do empregado" style='width: 300px'>
			        		<br><br><button type="submit" class="btn btn-relatorio">Enviar dados</button>
			        	</form>
			      </div>
			      <div class="modal-footer">
			      </div>
			    </div>
			  </div>
			</div>

			

 	<?php require_once"../../rodape.php";?>
 		<script src="../../../script/bootstrap/jquery-3.2.1.js"></script>
 		<script src="../../../script/bootstrap/bootstrap.min.js"></script>
 		<script src="../../../script/bootstrap/bootstrap.bundle.js"></script>
 	

 	<script>
 		$(document).ready(function(){
			$("#btn_ocorrencias_por_data").click(function(){
				$("#ocorrencias_por_data").modal();
			});
			$("#btn_ocorrencias_justificativa").click(function(){
				$("#ocorrencias_justificativa").modal();
			});
			$("#btn_ocorrencias_total_unidades").click(function(){
				$("#ocorrencias_total_unidades").modal();
			});
			$("#btn_total_ocorrencias_setor").click(function(){
				$("#total_ocorrencias_setor").modal();
			});
			$("#btn_relatorio_unidade").click(function(){
				$("#relatorio_unidade").modal();
			});
			$("#btn_relatorio_setor").click(function(){
				$("#relatorio_setor").modal();
			});
			$("#btn_relatorio_empregado").click(function(){
				$("#relatorio_empregado").modal();
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