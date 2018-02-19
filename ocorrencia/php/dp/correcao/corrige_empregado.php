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
	<div class="">
		<form class="form_cadastro_unidade" action="corrigindo_empregado.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Correção de empregado</legend>
				<?php
					header("Content-type: text/html; charset=utf-8");
					mb_internal_encoding("UTF-8"); 
					
					#Conexao com Banco de dados
					require_once "../../manutencao/conecta.php";
					$conexao = conecta();
					#dados da sessão
					$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
 					$sql_select_nome_gestor = "SELECT nome FROM usuario_gestor WHERE usuario = '$usuario_sessao' ";
 					$select_gestor = mysqli_query($conexao, $sql_select_nome_gestor);
 					while ($resultado2 = mysqli_fetch_array($select_gestor)) {
							echo "<h5>Você está logado como $resultado2[0]!</h5>";
					}

					
					#Em baixo são inputs e selects de formulário

					echo "<label><i class='fa fa-address-card-o' aria-hidden='true'></i>Digite a matrícula: <input type='number' style='width:300px ' name='empregado' placeholder='Digite a matícula do funcionário . . .' required='' ></label> ";
					
				?>
		</fieldset>
				<button type="submit" class="btn btn_azul"><i class="fa fa-search" aria-hidden="true"></i> Consultar</button>
		</form><br>
	</div><!-- Div formulario -->
 	<?php require_once"../../rodape.php";?>
 	<script src="../../../script/jquery-3.2.1.js" charset="utf-8"></script>
	<script>
		$(document).ready(function(){
			$('.btn').click(function(){
				$('.btn').text('Enviando dados, por favor aguarde...').addClass('btn_azul_efeito');
			});
		});
	</script>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}
?>