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
	<?php require_once"../../menu.php";?>
	<div class="container container_relatorios2">
		
			
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

		?>



		
		<div class="row">
			<div class="col-md-4 ">
				<div class="divisao_relatorio btn-relatorio2">
					<a href="ocorrencias_aprovadas.php" class="btn btn-relatorio"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar tudo</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="divisao_relatorio">
					<button id='btn_unidades' class="btn btn-relatorio"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar Unidades</button>
				</div>
			</div>
			<div class="col-md-4">
				<div class="divisao_relatorio">
					<button id='btn_setores' class="btn btn-relatorio"><i class="fa fa-filter" aria-hidden="true"></i> Filtrar Setores</button>
				</div>
			</div>
		</div>
	</div>


			<!-- Filtrar Ocorrências por setores modal -->
			<div class="modal fade" id="filtro_setor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Filtrar ocorrências por setores</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			       		<form class="formulario_relat" action="filtro_setores.php" method="post" accept-charset="utf-8">
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
			        		<br><br><button type="submit" class="btn btn-relatorio">Filtrar</button>

			        	</form>
			      </div>
			      <div class="modal-footer">
			       
			      </div>
			    </div>
			  </div>
			</div>



			<!-- Modal filtra por unidades -->
			<div class="modal fade" id="filtro_unidade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			  <div class="modal-dialog modal-dialog-centered" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLongTitle">Filtrar ocorrências por unidades</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        	<form class="formulario_relat" action="filtro_unidades.php" method="post" accept-charset="utf-8">
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
			        		<br><br><button type="submit" class="btn btn-relatorio">Filtrar</button>

			        	</form>
			      </div>
			      <div class="modal-footer">
			      
			      </div>
			    </div>
			  </div>
			</div>

	<!--Importando libs para jQuery, dos botões e modal-->

 	<?php require_once"../../rodape.php";?>
 		<script src="../../../script/bootstrap/jquery-3.2.1.js"></script>
 		<script src="../../../script/bootstrap/bootstrap.min.js"></script>
 		<script src="../../../script/bootstrap/bootstrap.bundle.js"></script>

 	<script>
 		$(document).ready(function(){
			$("#btn_setores").click(function(){
				$("#filtro_setor").modal();
			});
			$("#btn_unidades").click(function(){
				$("#filtro_unidade").modal();
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