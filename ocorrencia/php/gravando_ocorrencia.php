
<?php
    session_start();
    $_SESSION['mensagem'] = 'Ao escolher a opção atestado, por favor, selecione o arquivo do atestado.';

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
	<div class='admin'><p>Os atestados recebidos  pela Segurança do trabalho serão analisados pelo SESMT do CSC.</p></div>
	<div>
			<?php
			#Tratativa para data:
			date_default_timezone_set('America/Sao_Paulo');
			$dia_hj = date('d');
			$mes_hj = date('m');
			$dia_antesDeOntem = date('d', strtotime( ' - 2 days'));
			$mes_antesDeOntem = date('m', strtotime( ' - 2 days'));
			#Conexao com Banco de dados
      		require_once "manutencao/conecta.php";
     		$conexao = conecta();

			#require once para insert
			require_once"manutencao/abre_conexao.php";
			require_once"manutencao/diasUteis.php";



			#manipula post
			$unidade  = isset($_POST['unidade'])?$_POST['unidade']:'';
			$gestor_responsavel = isset($_POST['gestor_responsavel'])?$_POST['gestor_responsavel']:'';
			$empregado_ocorrencia = isset($_POST['empregado_ocorrencia'])?$_POST['empregado_ocorrencia']:'';
			$registro = isset($_POST['registro'])?$_POST['registro']:'';
			$setor = isset($_POST['setor'])?$_POST['setor']:'';
			$datadaocorrencia = isset($_POST['datadaocorrencia'])?$_POST['datadaocorrencia']:'';
			$entrada1 = isset($_POST['entrada1'])?$_POST['entrada1']:'';
			$saida1 = isset($_POST['saida1'])?$_POST['saida1']:'';
			$entrada2 = isset($_POST['entrada2'])?$_POST['entrada2']:'';
			$saida2 = isset($_POST['saida2'])?$_POST['saida2']:'';
			$ocorrencia = isset($_POST['ocorrencia'])?$_POST['ocorrencia']:'';
			$justificativa = isset($_POST['justificativa'])?$_POST['justificativa']:'';
			$arquivo_post = isset($_FILES['arquivo']['name'])?$_FILES['arquivo']['name']:'';
			$extensao = explode('.', $arquivo_post);
			$extensao2 = end($extensao);
			$nome_novo = time(). $registro . '.' . $extensao2;
			$destino = 'ocorrencias_imagens/' . $nome_novo;
			$arquivo_tmp = $_FILES['arquivo']['tmp_name'];


			$tessste =  move_uploaded_file($arquivo_tmp, $destino);


			#querys

			$verifica_ocorrencia = "SELECT * FROM ocorrencia WHERE unidade = '$unidade' and justificativa = '$justificativa'and data_ocorrencia = '$datadaocorrencia' and matricula = '$registro' and setor = '$setor' and status = '$ocorrencia'";

			$verifica_ocorrencia_query = mysqli_query($conexao, $verifica_ocorrencia);


			$dia = diasUteis($datadaocorrencia);

			$diaN =  date("d", strtotime($dia));
			$mesN = date("m", strtotime($dia));
			

			/*
			
			#Estou utilizando o Echo para testar as funções elaboradas.

			echo"	
					Ocorrencia: $diaN <  Antes de Ontem: $dia_antesDeOntem<br>
					Ocorrencia:	$mesN < Antes de ontem: $mes_antesDeOntem

					";
			*/
			#se não enviarem formulário vazio então ele chama função para gravar no banco.



			if($unidade != ''){
				if (mysqli_num_rows($verifica_ocorrencia_query)) {
					echo "<div class='cadastro_existente'><h1>Esta ocorrência ja havia sido gerada antes!</h1></div>";
				}else{
					if (($diaN >= $dia_hj) || ($mesN > $mes_hj)) {
					if ($ocorrencia === 'Atestado') {
						if ($arquivo_post != '') {
							$insert = "INSERT INTO ocorrencia (unidade, status, justificativa, data_ocorrencia, primeira_entrada, primeira_saida, segunda_entrada, segunda_saida, fk_empregado, matricula, fk_usuario_gestor, setor, assinado, imagem ) VALUES ('$unidade', '$ocorrencia', '$justificativa', '$datadaocorrencia', '$entrada1', '$saida1', '$entrada2', '$saida2', '$empregado_ocorrencia', '$registro' , '$gestor_responsavel', '$setor', '0', '$destino'  )";
							insert($insert);
							echo "<div class='cadastro_existente'><h1>Ocorrência gerada com sucesso!</h1></div>";
	/*Else arquivo post */	}else{
								header("Location: form_ocorrencia.php");
							}
			/*else atestado*/	}else{
								$insert = "INSERT INTO ocorrencia (unidade, status, justificativa, data_ocorrencia, primeira_entrada, primeira_saida, segunda_entrada, segunda_saida, fk_empregado, matricula, fk_usuario_gestor, setor ) VALUES ('$unidade', '$ocorrencia', '$justificativa', '$datadaocorrencia', '$entrada1', '$saida1', '$entrada2', '$saida2', '$empregado_ocorrencia', '$registro' , '$gestor_responsavel', '$setor' )";
									insert($insert);
									echo "<div class='cadastro_existente'><h1>Ocorrência gerada com sucesso!</h1></div>";
		/*else atestado*/		}
					
/*compara tempo*/} else if (($diaN < $dia_antesDeOntem) || ($mesN < $mes_antesDeOntem)) {
					if ($ocorrencia === 'Atestado') {
						if ($arquivo_post != '') {
							$insert = "INSERT INTO ocorrencia (unidade, status, justificativa, data_ocorrencia, primeira_entrada, primeira_saida, segunda_entrada, segunda_saida, fk_empregado, matricula, fk_usuario_gestor, setor, assinado, imagem, flag_48h ) VALUES ('$unidade', '$ocorrencia', '$justificativa', '$datadaocorrencia', '$entrada1', '$saida1', '$entrada2', '$saida2', '$empregado_ocorrencia', '$registro' , '$gestor_responsavel', '$setor', '0', 	'$destino', '1' )";
								insert($insert);
								echo "<div class='cadastro_existente'><h1>Ocorrência gerada com mais de 48 horas!</h1></div>";
						}else{
							header("Location: form_ocorrencia.php");
						}
						
							}else{
								$insert = "INSERT INTO ocorrencia (unidade, status, justificativa, data_ocorrencia, primeira_entrada, primeira_saida, segunda_entrada, segunda_saida, fk_empregado, matricula, fk_usuario_gestor, setor, flag_48h ) VALUES ('$unidade', '$ocorrencia', '$justificativa', '$datadaocorrencia', '$entrada1', '$saida1', '$entrada2', '$saida2', '$empregado_ocorrencia', '$registro' , '$gestor_responsavel', '$setor', '1' )";
									insert($insert);
									echo "<div class='cadastro_existente'><h1>Ocorrência gerada com mais de 48 horas!</h1></div>";
							}
					
				} else {
						if ($ocorrencia === 'Atestado') {
							if ($arquivo_post != '') {
								$insert = "INSERT INTO ocorrencia (unidade, status, justificativa, data_ocorrencia, primeira_entrada, primeira_saida, segunda_entrada, segunda_saida, fk_empregado, matricula, fk_usuario_gestor, setor, assinado, imagem ) VALUES ('$unidade', '$ocorrencia', '$justificativa', '$datadaocorrencia', '$entrada1', '$saida1', '$entrada2', '$saida2', '$empregado_ocorrencia', '$registro' , '$gestor_responsavel', '$setor', '0', 	'$destino' )";
									insert($insert);
									echo "<div class='cadastro_existente'><h1>Ocorrência gerada com sucesso!</h1></div>";
							}else{
								header("Location: form_ocorrencia.php");
							}
						
							}else{
								$insert = "INSERT INTO ocorrencia (unidade, status, justificativa, data_ocorrencia, primeira_entrada, primeira_saida, segunda_entrada, segunda_saida, fk_empregado, matricula, fk_usuario_gestor, setor ) VALUES ('$unidade', '$ocorrencia', '$justificativa', '$datadaocorrencia', '$entrada1', '$saida1', '$entrada2', '$saida2', '$empregado_ocorrencia', '$registro' , '$gestor_responsavel', '$setor' )";
									insert($insert);
									echo "<div class='cadastro_existente'><h1>Ocorrência gerada com sucesso!</h1></div>";
							}
					
				}
				}
			}else{ // Primeiro if (o if != '')
				header("Location: index.php");
			}

			?>

 	<?php require_once"rodape.php";?>
</body>
</html>