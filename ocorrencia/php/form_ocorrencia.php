<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) ){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ocorrência no cartão de ponto</title>
<link rel="stylesheet" type="text/css" href="../css/regras.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../fontes/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
 
<body>
	<?php require_once"cabecalho.php";?>
	<div class="subcabecalho"><h1>Ocorrência no Cartão de Ponto</h1></div>
	<div class="admin"><p>Seja bem vindo!</p></div>
	<div>
		<form class="formulario" action="gravando_ocorrencia.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Ficha individual</legend>

			<?php

			#require once para insert
			require_once"manutencao/abre_conexao.php";
			#manipula post
			$matricula = isset($_SESSION['matricula'])?$_SESSION['matricula']:'';
			$senha_funcionario = isset($_SESSION['senha_funcionario'])?$_SESSION['senha_funcionario']:'';
			#Dados para conexão com Banco para realizar Select:
			$host = "localhost";
			$usuario = "root";
			$senha = "";
			$bd = "ocorrencia";
			#abre conexao com banco
			$conexao = mysqli_connect($host, $usuario, $senha, $bd);
			#querys
			$sql_matricula = "SELECT * FROM empregado WHERE matricula = '$matricula' ";
			
			$innerJoin_empregado_unidade = "SELECT empregado.nome, unidade.nome FROM empregado INNER JOIN unidade ON unidade.id = empregado.fk_unidade WHERE empregado.matricula = '$matricula'";
			$innerJoin_empregado_setor = "SELECT empregado.nome, setor.nome FROM empregado INNER JOIN setor ON setor.id = empregado.fk_setor WHERE empregado.matricula = '$matricula'";
			$sql_matricula_execucao = mysqli_query($conexao, $sql_matricula);
			$sql_innerJoin_empregado_unidade = mysqli_query($conexao, $innerJoin_empregado_unidade);
			$sql_innerJoin_empregado_setor = mysqli_query($conexao, $innerJoin_empregado_setor);

			# se tiver resultado a condição abaixo excuta os laços.
			if ($teste = mysqli_num_rows($sql_matricula_execucao)) {
				#Parte do formulário.
				while ($resultado1 = mysqli_fetch_array($sql_matricula_execucao)) {	
					echo "
					<label><i class='fa fa-user-o' aria-hidden='true'></i> Empregado: <input placeholder='Digite o seu nome . . .' type='text' name='txtNome' value='$resultado1[3]' readonly='true' id='txtNome' size='60' class='input_forms'/></label><br>
					<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Gestor/Coordenador: <input  type='text' value='$resultado1[4]' name='gestor_coordenador' readonly='true'></label>
					
					<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Registro/Matrícula: <input placeholder='Matrícula . . .' type='number' value='$resultado1[1]' name='registro' readonly='true'></label>
					<input type='hidden' name='gestor_responsavel' value='$resultado1[5]'>
					
					<input type='hidden' name='empregado_ocorrencia' value='$resultado1[0]'>
					";
				}
				while ($resultado0 = mysqli_fetch_array($sql_innerJoin_empregado_unidade)) {
					echo "<i class='fa fa-building-o' aria-hidden='true'></i> Unidade: <input name='unidade' value='$resultado0[1]' readonly='true' > ";
				}
					

				#Enquanto resultado1 receber dados do banco matricula = matricula do funcionario ele realizará.
				

				while ($resultado3 = mysqli_fetch_array($sql_innerJoin_empregado_setor)) {
					echo "<label><i class='fa fa-users' aria-hidden='true'></i> Setor: 
						<input type='text' name='setor' value='$resultado3[1]' readonly='true' >
					";
				}
				

				echo"
						<i class='fa fa-calendar' aria-hidden='true'></i> Data da ocorrência: <input class='input-append date' type='date' name='datadaocorrencia' required=''>
						<i class='fa fa-clock-o' aria-hidden='true'></i> 1º Entrada: <input type='time' name='entrada1'>
						<i class='fa fa-clock-o' aria-hidden='true'></i> 1º Saída: <input type='time' name='saida1'>
						<i class='fa fa-clock-o' aria-hidden='true'></i> 2º Entrada : <input type='time' name='entrada2'>
						<i class='fa fa-clock-o' aria-hidden='true'></i> 2º Saída: <input type='time' name='saida2'>
						</fieldset><br>

						<fieldset>
							<legend>Ocorrências</legend>
								<label><input type='radio' name='ocorrencia' value='Falta de papel no relógio' required=''>Falta de papel no relógio</label>
								<label><input type='radio' name='ocorrencia' value='Marcação em duplicidade' required=''>Marcação em duplicidade</label>
								<label><input type='radio' name='ocorrencia' value='Faltou energia' required=''>Faltou energia</label>
								<label><input type='radio' name='ocorrencia' value='Empregado não cadastrado' required=''>Empregado não cadastrado</label>
								<label><input type='radio' name='ocorrencia' value='Problema com relógio' required=''>Problema com relógio</label>
								<label><input type='radio' name='ocorrencia' value='Serviço externo' required=''>Serviço externo</label>
								<label><input type='radio' name='ocorrencia' value='Treinamento' required=''>Treinamento</label>
								<label><input type='radio' name='ocorrencia' value='Outros' required=''>Outros</label><br>
								<label>Justificativa: <input placeholder='Motivo pelo qual está realizando a ocorrência.' type='text' style='width: 500px ' name='justificativa' required=''></label>

								<button type='submit' class='btn btn_azul'><i class='fa fa-location-arrow' aria-hidden='true'></i> Realizar Ocorrência</button>
							</fieldset>
						</form>
						
						<form class='formulario5' action='consultar_ocorrencia.php' method='post' accept-charset='utf-8'>
							<fieldset>
								<legend>Consultar Ocorrências</legend>";

									echo"
									<input type='hidden' name='matric' value='$matricula'>
									<button type='submit' class='btn btn_azul name='matric' value='$matricula'>Para consultar status de ocorrências e verificar histórico de registros clique aqui.</button>
							</fieldset>
						</form>

					</div><!-- Div formulario -->
				";
				

			}else{
				header("Location: index.php"); exit;
			}



			?>
				
		 	<?php require_once"rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}

	/*
									*/
?>

