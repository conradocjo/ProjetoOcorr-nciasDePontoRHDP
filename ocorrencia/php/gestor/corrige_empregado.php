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
	<div class="">
		<form class="form_cadastro_unidade" action="corrigindo_empregado.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Correção de cadastro do empregado</legend>
				<?php

					#require once para insert
					require_once"../manutencao/abre_conexao.php";
					#Conexao com Banco de dados
					require_once "../manutencao/conecta.php";
					$conexao = conecta();
					#querys
					$sql_matricula = "SELECT * FROM empregado WHERE matricula";
					$sql_unidade = "SELECT * FROM unidade";
					$sql_setor = "SELECT * FROM setor";
					$sql_gestor = "SELECT nome FROM usuario_gestor WHERE nivel = 1";
					$select = mysqli_query($conexao, $sql_matricula);
					$select_setor = mysqli_query($conexao, $sql_setor);
					$select_unidade = mysqli_query($conexao, $sql_unidade);
					$select_gestor = mysqli_query($conexao, $sql_gestor);
					# 
					$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
					#Em baixo são inputs e selects de formulário

					#Input matrícula do empregado
					echo "<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Digite a matricula do empregado: <input type='number' style='width: 200px ' name='matricula' placeholder='Digite a matrícula.' required=''></label> ";
					#Input nome empregado
					echo "<label><i class='fa fa-user-o' aria-hidden='true'></i> Digite o nome correto do empregado: <input placeholder='Digite o nome do empregado . . .' type='text' style='width: 350px ' name='nome_empregado' required=''></label><br>";
					echo "<label><i class='fa fa-user-o' aria-hidden='true'></i> Digite uma senha: <input placeholder='Digite a senha do empregado . . .' type='password' style='width: 350px ' name='senha_empregado' required=''></label><br>";
					
					echo "<input type='hidden' name='rastro' value = '$usuario_sessao' >";
				?>
		</fieldset><br>
				<button type="submit" class="btn btn_azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Enviar Dados</button>
		</form><br>
	</div><!-- Div formulario -->
 	<?php require_once"../rodape.php";?>
 	<script src="../../script/jquery-3.2.1.js" charset="utf-8"></script>
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
		header("Location: ../../index.php"); exit;
	}
?>