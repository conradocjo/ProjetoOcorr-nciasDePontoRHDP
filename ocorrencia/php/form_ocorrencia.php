<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) ){
			$mensagem = isset($_SESSION['mensagem'])?$_SESSION['mensagem']:'';
			echo "<script>
					var msg2 = 'Ao escolher a opção atestado, por favor, selecione o arquivo do atestado.';
					var msg = '$mensagem';
					if (msg != ''){
						var r = alert('$mensagem');
					}
					
					
				</script>";
		

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
	<a href="index.php"><?php require_once"cabecalho.php";?></a>
	<div class="subcabecalho"><h1>Ocorrência no Cartão de Ponto</h1></div>
	<?php
		
		echo "<div class='admin'><p>Seja bem vindo! <a href='alterar_senha.php'>Altere aqui sua senha.</a></p></div>";
		echo"<div class='ficha_individual'>
		<form class='formulario9' action='gravando_ocorrencia.php' method='post' enctype='multipart/form-data' accept-charset='utf-8'>
		<fieldset>
			<div class='formulario'>
			<legend>Ficha individual</legend>";

			
			# Manipulação de data
			$seteDiasAtras = date('Y-m-d', strtotime( ' - 7 days'));
			$vinteDiasDepois = date('Y-m-d', strtotime( ' + 20 days'));
			#require once para insert
			require_once"manutencao/abre_conexao.php";
			#manipula post
			$matricula = isset($_SESSION['matricula'])?$_SESSION['matricula']:'';
			$senha_funcionario = isset($_SESSION['senha_funcionario'])?$_SESSION['senha_funcionario']:'';
			#Conexao com Banco de dados
      		require_once "manutencao/conecta.php";
     		$conexao = conecta();
			#querys
			$sql_matricula = "SELECT * FROM empregado WHERE matricula = '$matricula' ";
			$sql_matricula2 = "SELECT matricula FROM empregado WHERE matricula = '$matricula' ";
			$sql_conferencia = "SELECT matricula FROM usuario_gestor where id = (select superior_imediato_id from empregado where matricula = '$matricula')";# selecionará o usuário gestor onde seu id é igual ao id do empregado com a matricula do post
			$query_sql_matricula = mysqli_query($conexao, $sql_matricula2);
			$query_sql_conferencia = mysqli_query($conexao, $sql_conferencia);
			
			$innerJoin_empregado_unidade = "SELECT empregado.nome, unidade.nome FROM empregado INNER JOIN unidade ON unidade.id = empregado.fk_unidade WHERE empregado.matricula = '$matricula'";
			$innerJoin_empregado_setor = "SELECT empregado.nome, setor.nome FROM empregado INNER JOIN setor ON setor.id = empregado.fk_setor WHERE empregado.matricula = '$matricula'";
			$sql_matricula_execucao = mysqli_query($conexao, $sql_matricula);
			$sql_innerJoin_empregado_unidade = mysqli_query($conexao, $innerJoin_empregado_unidade);
			$sql_innerJoin_empregado_setor = mysqli_query($conexao, $innerJoin_empregado_setor);

			while ($rf = mysqli_fetch_array($query_sql_conferencia)) {
					if ($rf[0] == $matricula) {
						echo "<script>
								alert('Você não pode ser gestor de si próprio.');
							</script>";
							header("Location: tratativa.php"); exit;
					}
			}


			# se tiver resultado a condição abaixo excuta os laços.
			if ($teste = mysqli_num_rows($sql_matricula_execucao)) {
				#Parte do formulário.
				while ($resultado1 = mysqli_fetch_array($sql_matricula_execucao)) {	
					echo "
					<label><i class='fa fa-user-o' aria-hidden='true'></i> Empregado: <input placeholder='Digite o seu nome . . .' type='text' name='txtNome' value='$resultado1[3]' readonly='true' id='txtNome' size='30' class='input_forms'/></label><br>
					<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Gestor/Coordenador: <input  type='text' value='$resultado1[4]' name='gestor_coordenador' readonly='true'></label><br>
					<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Registro/Matrícula: <input placeholder='Matrícula . . .' type='number' value='$resultado1[1]' name='registro' readonly='true'></label><br>
					<input type='hidden' name='gestor_responsavel' value='$resultado1[5]'>
					
					<input type='hidden' name='empregado_ocorrencia' value='$resultado1[0]'>
					";
				}
				while ($resultado0 = mysqli_fetch_array($sql_innerJoin_empregado_unidade)) {
					echo "<i class='fa fa-building-o' aria-hidden='true'></i> Unidade: <input type='text' name='unidade' value='$resultado0[1]' readonly='true'><br> ";
				}
					

				#Enquanto resultado1 receber dados do banco matricula = matricula do funcionario ele realizará.
				

				while ($resultado3 = mysqli_fetch_array($sql_innerJoin_empregado_setor)) {
					echo "<label><i class='fa fa-users' aria-hidden='true'></i> Setor: 
						<input type='text' name='setor' value='$resultado3[1]' readonly='true' ><br>
					";
				}
				

				echo"
						<i class='fa fa-calendar' aria-hidden='true'></i> Data da ocorrência: <input class='input-append date' type='date' min='$seteDiasAtras' max='$vinteDiasDepois' name='datadaocorrencia' required=''><br>
						<i class='fa fa-clock-o' aria-hidden='true'></i> 1º Entrada: <input type='time' name='entrada1'>
						<i class='fa fa-clock-o' aria-hidden='true'></i> 1º Saída: <input type='time' name='saida1'><br>
						<i class='fa fa-clock-o' aria-hidden='true'></i> 2º Entrada : <input type='time' name='entrada2'>
						<i class='fa fa-clock-o' aria-hidden='true'></i> 2º Saída: <input type='time' name='saida2'>
						</fieldset>
						</div>
						</div><!-- Div formulario -->
						
							<div class='formulario form_ocorrencia'>
							<fieldset>
							<legend>Ocorrências</legend>
								<label><input id='atestado' type='radio' name='ocorrencia' value='Atestado' required=''>Atestado</label><br>
								<label><input id='declaracao' type='radio' name='ocorrencia' value='Declaracao de comparecimento' required=''>Declaração de comparecimento</label><br>
								<label><input id='aprendizagem' type='radio' name='ocorrencia' value='Aprendizagem' required=''>Aprendizagem</label><br>
								<label><input type='radio' name='ocorrencia' value='Empregado não cadastrado' required=''>Empregado não cadastrado</label><br>
								<label><input type='radio' name='ocorrencia' value='Falta de papel no relogio' required=''>Falta de papel no relógio</label><br>
								<label><input type='radio' name='ocorrencia' value='Faltou energia' required=''>Faltou energia</label><br>
								<label><input type='radio' name='ocorrencia' value='Treinamento' required=''>Treinamento</label><br>
								<label><input type='radio' name='ocorrencia' value='Marcação em duplicidade' required=''>Marcação em duplicidade</label>
								<label><input type='radio' name='ocorrencia' value='Problema com relógio' required=''>Problema com relógio</label><br>
								<label><input type='radio' name='ocorrencia' value='Serviço externo' required=''>Serviço externo</label>
								<label><input type='radio' name='ocorrencia' value='Outros' required=''>Outros</label>
								
						</div>

							</fieldset>

							<div class='formulario7'>
								<label><input id='arquivos' class='btn btn_azul' type='file' name='arquivo' accept='image/png, image/jpeg, application/pdf' ></label>
								<label>Justificativa: <input placeholder='Motivo pelo qual está realizando a ocorrência.' type='text' style='width: 500px ' name='justificativa' required=''></label>

								<button id='realizando' type='submit' class='btn btn_azul'><i class='fa fa-location-arrow' aria-hidden='true'></i> Finalizar Ocorrência</button>
							</div>
							
						</form>
						
						<div class='formulario6'>
							<form class='' action='consultar_ocorrencia.php' method='post' accept-charset='utf-8'>
							<fieldset>
								";

									echo"
									<input type='hidden' name='matric' value='$matricula'>
									<button id='carregar' type='submit' class='btn btn_azul name='matric' value='$matricula'>Para consultar status de ocorrências e verificar histórico de registros clique aqui.</button>
							</fieldset>
						</form>
						
						

					</div>
				";
				

			}else{
				header("Location: index.php"); exit;
			}

			?>
				
		 	<?php require_once"rodape.php";?>
		 
		 	<script src="../script/jquery-3.2.1.js" charset="utf-8"></script>
				<script>
					$(document).ready(function(){
					$('#carregar').click(function(){
					$('#carregar').text('Carregando...').addClass('btn_azul_efeito');
					});
				});

					$(document).ready(function(){
					$('#realizando').click(function(){
					$('#realizando').text('Aguarde...').addClass('btn_azul_efeito');
					});
				});

			</script>
			
			<script type="text/javascript">
			    	$(function(){
			    	    $("#arquivos").on('change', function(event) {
			    	        var file = event.target.files[0];
			    	        if(file.size>=2*1024*1024) {
			    	            alert("O arquivo deve ter no máximo 2MB");
			    	            location.reload();			    	       		    	   
			    	            return;
			    	        }

			        	    fileReader.readAsArrayBuffer(file);
			        	});
			   	 });
			</script>
			<script>
				window.onload = function () {
					var radio_atestado = document.getElementById('atestado');
				}
			</script>

</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}

?>

