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
		<form class="form_cadastro_unidade" action="cadastrando_empregado.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Cadastro do empregado</legend>
				<?php

					#require once para insert
					require_once"../../manutencao/abre_conexao.php";
					#Dados para conexão com Banco para realizar Select:
					$host = "localhost";
					$usuario = "root";
					$senha = "";
					$bd = "ocorrencia";
					#abre conexao com banco
					$conexao = mysqli_connect($host, $usuario, $senha, $bd);
					#querys
					$sql_matricula = "SELECT * FROM empregado WHERE matricula";
					$sql_unidade = "SELECT * FROM unidade";
					$sql_setor = "SELECT * FROM setor";
					$sql_gestor = "SELECT * FROM usuario_gestor WHERE nivel = 1";
					$select = mysqli_query($conexao, $sql_matricula);
					$select_setor = mysqli_query($conexao, $sql_setor);
					$select_unidade = mysqli_query($conexao, $sql_unidade);
					$select_gestor = mysqli_query($conexao, $sql_gestor);
					$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';


					#Em baixo são inputs e selects de formulário
					$usuario_da_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
					$sql_select_ocorrencia = "SELECT * from ocorrencia WHERE usuario_gestor.nome = '$usuario_da_sessao' INNER JOIN usuario_gestor ON usuario_gestor.id = ocorrencia.fk_usuario_gestor";
 					$sql_select_nome_gestor = "SELECT nome FROM usuario_gestor WHERE usuario = '$usuario_da_sessao' ";
 					$select_gestor_result_login = mysqli_query($conexao, $sql_select_nome_gestor);
 					while ($result_login = mysqli_fetch_array($select_gestor_result_login)) {
						echo "<h5>Você está logado como $result_login[0]!</h5>";
					}

					#Input matrícula do empregado
					echo "<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Matricula do empregado: <input type='number' style='width: 200px ' name='matricula' placeholder='Digite a matrícula.' required='' ></label> ";
					#Input nome empregado
					echo "<label><i class='fa fa-user-o' aria-hidden='true'></i> Nome do empregado: <input placeholder='Digite o nome do empregado . . .' type='text' style='width: 350px ' name='nome_empregado' required=''></label><br>";
					#Senha empregado
					echo "<label><i class='fa fa-user-o' aria-hidden='true'></i> Senha do empregado: <input placeholder='Digite a senha do empregado . . .' type='password' style='width: 240px ' name='senha_empregado' required=''></label><br>";
					#Input nome empregado
					echo "<input type='hidden' name='rastro' value='$usuario_sessao' >";
					#Select Setor
					echo "<br><label><i class='fa fa-users' aria-hidden='true' ></i> Setor: 
					<select name='setor'>";
					while ($resultado2 = mysqli_fetch_array($select_setor)) {
						echo "<option value='$resultado2[0]'>$resultado2[1]</option>";
					}
					echo"</select></label> ";
					#Select Unidade
					echo " <label><i class='fa fa-building-o' aria-hidden='true'></i> Unidade: 
					<select name='unidade'>";
					while ($resultado1 = mysqli_fetch_array($select_unidade)) {
						echo "<option value='$resultado1[0]'>$resultado1[1]</option>";
					}
					echo"</select></label> ";
					#Select Gestor
					echo " <label><i class='fa fa-user-o' aria-hidden='true'></i> Gestor: 
					<select name='gestor'>";
					while ($resultado = mysqli_fetch_array($select_gestor)) {
						echo "<option value='$resultado[0]'>$resultado[2]</option>	";
					}
					echo"</select></label> ";

				?>
		</fieldset><br>
				<button type="submit" class="btn btn_azul"><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Enviar Dados</button>
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