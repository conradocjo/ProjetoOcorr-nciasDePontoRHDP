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
		<form class="form_cadastro_unidade" action="excluindo_empregado.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Excluir Empregado</legend>
				<?php
						#dados para conexão com Banco de dados.
						header("Content-type: text/html; charset=utf-8");
						mb_internal_encoding("UTF-8"); 
						mysql_set_charset('utf8');
						#Dados para conexão com Banco para realizar Select:
						$host = "localhost";
						$usuario = "root";
						$senha = "";
						$bd = "ocorrencia";
						#abre conexao com banco
						$conexao = mysqli_connect($host, $usuario, $senha, $bd);
						#dados da sessão
						$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
 						$sql_select_nome_gestor = "SELECT nome FROM usuario_gestor WHERE usuario = '$usuario_sessao' ";
 						$sql_select_unidade = "SELECT nome, id FROM unidade ORDER BY nome";
 						$select_gestor = mysqli_query($conexao, $sql_select_nome_gestor);
 						$select_unidade = mysqli_query($conexao, $sql_select_unidade);
 						while ($resultado2 = mysqli_fetch_array($select_gestor)) {
							echo "<h5>Você está logado como $resultado2[0]!</h5><br><p>Atenção, você está prestes a excluir um empregado cadastrado no sistema.</p>";
						}						
						echo "<i class='fa fa-user-o' aria-hidden='true'></i> Digite a matrícula: <input type='number' name='matricula' placeholder='Digite a matrícula do empregado que deseja excluir:' required='' style='width: 400px '>";
						$usuario_da_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
						
		?>

		</fieldset><br>
				<button type="submit" class="btn btn_azul"><i class="fa fa-trash" aria-hidden="true"></i> Excluir</button>
		</form><br>
		
	</div><!-- Div formulario -->
 	<?php require_once"../../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}
?>