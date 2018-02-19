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
					<p><i class='fa fa-calendar' aria-hidden='true'></i> Dia $data_atual, <i class='fa fa-clock-o' aria-hidden='true'></i> $hora_atual</p>
				</div>
		  </header>";
	?>
	<?php require_once"../../menu2.php";?>
	<div class="container">
		
			
		<?php
			

 			do{

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
			#dados do post
			$setores = isset($_POST['setores'])?$_POST['setores']:'';
 			
 			

 			$sql_select_ocorrencia2 = "SELECT ocorrencia.id, empregado.nome, empregado.matricula, ocorrencia.setor from ocorrencia  INNER JOIN usuario_gestor ON  ocorrencia.fk_usuario_gestor = usuario_gestor.id INNER JOIN empregado ON ocorrencia.fk_empregado = empregado.id WHERE  ocorrencia.assinado = '10' AND ocorrencia.setor = '$setores' ORDER BY ocorrencia.data_ocorrencia ";

 			$sql_select_total_ocorrencia = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10";

 			$sql_select_total_atestado = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Atestado' ";
 			$sql_select_total_n_cad = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Empregado não cadastrado' ";
 			$sql_select_total_fa_pape = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Falta de papel no relogio' ";
 			$sql_select_total_fa_ene = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Faltou energia' ";
 			$sql_select_total_duplicidade = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Marcação em duplicidade' ";
 			$sql_select_total_outros = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Outros' ";
 			$sql_select_total_pro_rel = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Problema com relógio' ";
 			$sql_select_total_serv_ext = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Serviço externo' ";
 			$sql_select_total_treinamento = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Treinamento' ";
 			$sql_select_total_declaracao = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Declaracao de comparecimento' ";
 			$sql_select_total_aprendizagem = "SELECT count(*) FROM ocorrencia WHERE setor = '$setores' AND assinado = 10 AND status = 'Aprendizagem' ";

 			$sql_select_nome_gestor = "SELECT nome FROM usuario_gestor WHERE usuario = '$usuario' ";
 			
 			$select_gestor = mysqli_query($conexao, $sql_select_nome_gestor);
 			$select_ocorrencia = mysqli_query($conexao, $sql_select_ocorrencia2);
 			$tot_ocorrencia_setor = mysqli_query($conexao, $sql_select_total_ocorrencia);
 			$tot_ocorrencia_atestado = mysqli_query($conexao, $sql_select_total_atestado);
 			$tot_ocorrencia_atestado2 = mysqli_query($conexao, $sql_select_total_atestado);
 			$tot_ocorrencia_ncad = mysqli_query($conexao, $sql_select_total_n_cad);
 			$tot_ocorrencia_ncad2 = mysqli_query($conexao, $sql_select_total_n_cad);
 			$tot_ocorrencia_fapape = mysqli_query($conexao, $sql_select_total_fa_pape);
 			$tot_ocorrencia_fapape2 = mysqli_query($conexao, $sql_select_total_fa_pape);
 			$tot_ocorrencia_faene = mysqli_query($conexao, $sql_select_total_fa_ene);
 			$tot_ocorrencia_faene2 = mysqli_query($conexao, $sql_select_total_fa_ene);
 			$tot_ocorrencia_duplicidade = mysqli_query($conexao, $sql_select_total_duplicidade);
 			$tot_ocorrencia_duplicidade2 = mysqli_query($conexao, $sql_select_total_duplicidade);
 			$tot_ocorrencia_outros = mysqli_query($conexao, $sql_select_total_outros);
 			$tot_ocorrencia_outros2 = mysqli_query($conexao, $sql_select_total_outros);
 			$tot_ocorrencia_prorel = mysqli_query($conexao, $sql_select_total_pro_rel);
 			$tot_ocorrencia_prorel2 = mysqli_query($conexao, $sql_select_total_pro_rel);
 			$tot_ocorrencia_servexter = mysqli_query($conexao, $sql_select_total_serv_ext);
 			$tot_ocorrencia_servexter2 = mysqli_query($conexao, $sql_select_total_serv_ext);
 			$tot_ocorrencia_treinamento = mysqli_query($conexao, $sql_select_total_treinamento);
 			$tot_ocorrencia_treinamento2 = mysqli_query($conexao, $sql_select_total_treinamento);
 			$tot_ocorrencia_declaracao = mysqli_query($conexao, $sql_select_total_declaracao);
 			$tot_ocorrencia_declaracao2 = mysqli_query($conexao, $sql_select_total_declaracao);
 			$tot_ocorrencia_aprendizagem = mysqli_query($conexao, $sql_select_total_aprendizagem);
 			$tot_ocorrencia_aprendizagem2 = mysqli_query($conexao, $sql_select_total_aprendizagem);


 				while ($resultado2 = mysqli_fetch_array($select_gestor)) {
						echo "<p>Seja bem vindo $resultado2[0]!</p>";
			}


											while ($resultado4 = mysqli_fetch_array($tot_ocorrencia_setor)) {
												echo"<table class='aprovacao'>
														<thead>
															<tr>
																<th>Total de Ocorrência do(a) $setores</th>
																<th>Atestados</th>
																<th>Empregados não cadastrados</th>
																<th>Falta de papel no relógio</th>
																<th>Falta de energia</th>
																<th>Duplicidade</th>
																<th>Outros</th>
																<th>Problema com relógio</th>
																<th>Serviço externo</th>
																<th>Treinamento</th>
																<th>Declaração de Comparecimento</th>
																<th>Aprendizagem</th>
															</tr>
														</thead>
														<tbody>
															
														<tr>
															<td>$resultado4[0]</td>";
														

											}



											while ($atestado_result = mysqli_fetch_array($tot_ocorrencia_atestado)) {
												echo "<td>$atestado_result[0]</td>";
											}
											while ($ncad_result = mysqli_fetch_array($tot_ocorrencia_ncad)) {
												echo "<td>$ncad_result[0]</td>";
											}
											while ($fa_pape_result = mysqli_fetch_array($tot_ocorrencia_fapape)) {
												echo "<td>$fa_pape_result[0]</td>";
											}
											while ($faene_result = mysqli_fetch_array($tot_ocorrencia_faene)) {
												echo "<td>$faene_result[0]</td>";
											}
											while ($duplicidade_result = mysqli_fetch_array($tot_ocorrencia_duplicidade)) {
												echo "<td>$duplicidade_result[0]</td>";
											}
											while ($outros_result = mysqli_fetch_array($tot_ocorrencia_outros)) {
												echo "<td>$outros_result[0]</td>";
											}
											while ($prorel_result = mysqli_fetch_array($tot_ocorrencia_prorel)) {
												echo "<td>$prorel_result[0]</td>";
											}
											while ($serv_result = mysqli_fetch_array($tot_ocorrencia_servexter)) {
												echo "<td>$serv_result[0]</td>";
											}
											while ($treinamento_result = mysqli_fetch_array($tot_ocorrencia_treinamento)) {
												echo "<td>$treinamento_result[0]</td>";
											}
											while ($declaracao_result = mysqli_fetch_array($tot_ocorrencia_declaracao)) {
												echo "<td>$declaracao_result[0]</td>";
											}
											while ($aprendizagem_result = mysqli_fetch_array($tot_ocorrencia_aprendizagem)) {
												echo "<td>$aprendizagem_result[0]</td>";
											}

									echo"
									</tr>
									</tbody>
							</table> 
							

							</div>

						";
 			

 			
		?>
		<div class="centraliza_relatorio"><div id="piechart_3d" style="width: 750px; height: 350px;"></div></div>
		
	</div>

		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	    <script type="text/javascript">
	      google.charts.load("current", {packages:["corechart"]});
	      google.charts.setOnLoadCallback(drawChart);
	      function drawChart() {
	        var data = google.visualization.arrayToDataTable([
	          ['Task', 'Hours per Day'],
	          ['Atestados',   <?php while ($atest_relat = mysqli_fetch_array($tot_ocorrencia_atestado2)) {
												echo $atest_relat[0];
											}?>],
	          ['Empregados não cadastrados',      <?php while ($empg_relat = mysqli_fetch_array($tot_ocorrencia_ncad2)) {
												echo $empg_relat[0];
											}?>],
	          ['Falta de papel no relógio',  <?php while ($fapape_relat = mysqli_fetch_array($tot_ocorrencia_fapape2)) {
												echo $fapape_relat[0];
											}?>],
	          ['Falta de energia', <?php while ($energ_relat = mysqli_fetch_array($tot_ocorrencia_faene2)) {
												echo $energ_relat[0];
											}?>],
	          ['Duplicidade',    <?php while ($duplicidade_relat = mysqli_fetch_array($tot_ocorrencia_duplicidade2)) {
												echo $duplicidade_relat[0];
											}?>],
	          ['Outros',    <?php while ($outro_relat = mysqli_fetch_array($tot_ocorrencia_outros2)) {
												echo $outro_relat[0];
											}?>],
	          ['Problema com relógio',     <?php while ($prob_relat = mysqli_fetch_array($tot_ocorrencia_prorel2)) {
												echo $prob_relat[0];
											}?>],
	          ['Serviço externo',    <?php while ($serv_relat = mysqli_fetch_array($tot_ocorrencia_servexter2)) {
												echo $serv_relat[0];
											}?>],
	          ['Treinamento',    <?php while ($trein_relat = mysqli_fetch_array($tot_ocorrencia_treinamento2)) {
												echo $trein_relat[0];
											}?>],
			  ['Declaração de Comparecimento',    <?php while ($declara_relat = mysqli_fetch_array($tot_ocorrencia_declaracao2)) {
												echo $declara_relat[0];
											}?>],
			  ['Aprendizagem',    <?php while ($aprend_relat = mysqli_fetch_array($tot_ocorrencia_aprendizagem2)) {
												echo $aprend_relat[0];
											}?>]
	        ]);

	        var options = {
	          title: 'Status das ocorrências',
	          is3D: true,
	        };

	        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
	        chart.draw(data, options);
	      }
	    </script>

 	<?php require_once"../../rodape.php";?>
</body>
</html>

<?php
	} while (!$conexao); 
	} else {
		header("Location: ../../../index.php"); exit;
	}
?>