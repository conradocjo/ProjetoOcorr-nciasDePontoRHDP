<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) && ( $_SESSION['nivel'] == 3 ) ){

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
	<?php require_once"../menu4.php";?>
	<div class="container" style='overflow: auto; height: 400px'>
		
			
		<?php
			#dados para conexão com Banco de dados.
			header("Content-type: text/html; charset=utf-8");
			mb_internal_encoding("UTF-8"); 
			#require once para insert
			require_once"../manutencao/abre_conexao.php";
			#Conexao com Banco de dados
			require_once "../manutencao/conecta.php";
			$conexao = conecta();
			#dados da sessão
			$usuario = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
 			#POST
 			$assinatura = isset($_POST['assinatura'])?$_POST['assinatura']:'';
 			$id_ocorrencia = isset($_POST['id_ocorrencia'])?$_POST['id_ocorrencia']:'';
 			$obs_assinatura = isset($_POST['obs_assinatura'])?$_POST['obs_assinatura']:'';

 			#Query
 			$insert = "UPDATE ocorrencia SET assinado = '$assinatura', obs_assinado = '$obs_assinatura'  WHERE id = '$id_ocorrencia'  ";
 			$insert2 = "UPDATE ocorrencia SET assinado = '$assinatura' WHERE id = '$id_ocorrencia'  ";

 			if($id_ocorrencia==""){
					echo "<div class='dado_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}else if ($obs_assinatura != '') {
					insert($insert);
					header("Location: aprova_ocorrencia.php");
				} else {
					insert($insert2);
					header("Location: aprova_ocorrencia.php");
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