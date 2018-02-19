<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) && ( $_SESSION['nivel'] == 1 ) ){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ocorrência no cartão de ponto</title>
<link rel="stylesheet" type="text/css" href="../../css/regras.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../fontes/font-awesome-4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.bgiframe.min.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/jquery.ajaxQueue.js"></script>
<script type="text/javascript" src="jquery-autocomplete/lib/thickbox-compressed.js"></script>
<script type="text/javascript" src="jquery-autocomplete/jquery.autocomplete.js"></script>
<!--css -->
<link rel="stylesheet" type="text/css" href="jquery-autocomplete/jquery.autocomplete.css"/>
<link rel="stylesheet" type="text/css" href="jquery-autocomplete/lib/thickbox.css"/>
 
</head>
 
<body>
	<?php
	date_default_timezone_set('America/Sao_Paulo');
	$hora_atual = date('H:i');
	$data_atual = date('d/m/Y');
	echo "<header id='' class=''>
				<div class='cabecalho_cadastro'>
					<h1><img src='../../img/logo.png' alt='Axial'></h1>
					<p><i class='fa fa-calendar' aria-hidden='true'></i> Dia $data_atual, <i class='fa fa-clock-o' aria-hidden='true'></i> $hora_atual</p>
				</div>
		  </header>";
	?>
	<?php require_once"../menu2.php";?>
	<div class="container" style='overflow: auto; height: 400px'>
		
			
		<?php
			#Dates
 			$dia_hj = date('d');
			$mes_hj = date('m');
			$dia_antesDeOntem = date('d', strtotime( ' - 2 days'));
			$mes_antesDeOntem = date('m', strtotime( ' - 2 days'));
			

			#dados para conexão com Banco de dados.
			header("Content-type: text/html; charset=utf-8");
			mb_internal_encoding("UTF-8"); 
			#require once para insert
			require_once"../manutencao/abre_conexao.php";
			#Conexao com Banco de dados
			require_once "../manutencao/conecta.php";
			#Conta Dias úteis
			require_once "../manutencao/diasUteis_gestor.php";
			$conexao = conecta();
			#dados da sessão
			$usuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
 			#POST
 			$assinatura = isset($_POST['assinatura'])?$_POST['assinatura']:'';
 			$id_ocorrencia = isset($_POST['id_ocorrencia'])?$_POST['id_ocorrencia']:'';

 			#Query
 			$select_id = "SELECT status FROM ocorrencia WHERE id = '$id_ocorrencia'";
 			$select_data = "SELECT data_ocorrencia, flag_48h FROM ocorrencia WHERE id = '$id_ocorrencia'";
 			$query_select_id = mysqli_query($conexao, $select_id);
 			$query_select_data = mysqli_query($conexao, $select_data);

/*

if (($diaN >= $dia_hj) || ($mesN > $mes_hj))
if (($diaN < $dia_antesDeOntem) || ($mesN < $mes_antesDeOntem))

echo "dia ocorrencia: $dia_oco_N";echo "antes ontem: $dia_antesDeOntem";
				echo "<br>mes ocorrencia: $mes_oco_N";echo "antes ontem: $mes_antesDeOntem";

*/


 			while ($verifica_data = mysqli_fetch_array($query_select_data)) {
 				$dia_ocorrencia = diasUteis($verifica_data[0]);
 				#$dia_ocorrencia = $verifica_data[0];
 				
				$dia_oco_N = date("d", strtotime($dia_ocorrencia));
				$mes_oco_N = date("m", strtotime($dia_ocorrencia));
				

				if (($dia_oco_N > $dia_antesDeOntem) || ($mes_oco_N > $mes_antesDeOntem)){
					if($id_ocorrencia==""){
					echo "<div class='dado_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
					}else{
						while ($verifica_motivo = mysqli_fetch_array($query_select_id)) {
	 						if ($verifica_motivo[0] === 'Atestado') {
	 							if ($assinatura == 1) {
	 								$insert1 = "UPDATE ocorrencia SET assinado = 3 WHERE id = '$id_ocorrencia'  ";
	 								insert($insert1);
									header("Location: aprova_ocorrencia.php");
	 							}else{
	 								$insert3 = "UPDATE ocorrencia SET assinado = '$assinatura' WHERE id = '$id_ocorrencia'  ";
	 								insert($insert3);
	 								header("Location: aprova_ocorrencia.php");
	 							}
	 						} else {
	 						$insert = "UPDATE ocorrencia SET assinado = '$assinatura' WHERE id = '$id_ocorrencia'  ";
	 						insert($insert);
							header("Location: aprova_ocorrencia.php");
	 						}
	 					}
						
					}
				} else {
					if($id_ocorrencia==""){
					echo "<div class='dado_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
					}else if ($verifica_data[1] == 1) {
						while ($verifica_motivo = mysqli_fetch_array($query_select_id)) {
	 						if ($verifica_motivo[0] === 'Atestado') {
	 							if ($assinatura == 1) {
	 								$insert1 = "UPDATE ocorrencia SET assinado = 3, flag_48h = 3 WHERE id = '$id_ocorrencia'  ";
	 								insert($insert1);
									header("Location: aprova_ocorrencia.php");
	 							}else{
	 								$insert3 = "UPDATE ocorrencia SET assinado = '$assinatura', flag_48h = 3 WHERE id = '$id_ocorrencia'  ";
	 								insert($insert3);
	 								header("Location: aprova_ocorrencia.php");
	 							}
	 						} else {
	 						$insert = "UPDATE ocorrencia SET assinado = '$assinatura', flag_48h = 3 WHERE id = '$id_ocorrencia'  ";
	 						insert($insert);
							header("Location: aprova_ocorrencia.php");
	 						}
	 					}
						echo "<div class='dado_existente'><h1>Aprovado com mais de 48 horas.</h1></div>";
					} else {
						while ($verifica_motivo = mysqli_fetch_array($query_select_id)) {
	 						if ($verifica_motivo[0] === 'Atestado') {
	 							if ($assinatura == 1) {
	 								$insert1 = "UPDATE ocorrencia SET assinado = 3, flag_48h = 2 WHERE id = '$id_ocorrencia'  ";
	 								insert($insert1);
									header("Location: aprova_ocorrencia.php");
	 							}else{
	 								$insert3 = "UPDATE ocorrencia SET assinado = '$assinatura', flag_48h = 2 WHERE id = '$id_ocorrencia'  ";
	 								insert($insert3);
	 								header("Location: aprova_ocorrencia.php");
	 							}
	 						} else {
	 						$insert = "UPDATE ocorrencia SET assinado = '$assinatura', flag_48h = 2 WHERE id = '$id_ocorrencia'  ";
	 						insert($insert);
							header("Location: aprova_ocorrencia.php");
	 						}
	 					}
						echo "<div class='dado_existente'><h1>Aprovado com mais de 48 horas.</h1></div>";
					}
					
				}
 			}

 			
			
		?>
	</div>
 	<?php require_once"../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../index.php"); exit;
	}
?>