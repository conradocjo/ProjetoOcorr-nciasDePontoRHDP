
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
	<div>
			<?php

			#require once para insert
			require_once"manutencao/abre_conexao.php";
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
			#querys
			$insert = "INSERT INTO ocorrencia (unidade, status, justificativa, data_ocorrencia, primeira_entrada, primeira_saida, segunda_entrada, segunda_saida, fk_empregado, matricula, fk_usuario_gestor, setor ) VALUES ('$unidade', '$ocorrencia', '$justificativa', '$datadaocorrencia', '$entrada1', '$saida1', '$entrada2', '$saida2', '$empregado_ocorrencia', '$registro' , '$gestor_responsavel', '$setor' )";


			#se não enviarem formulário vazio então ele chama função para gravar no banco.
			if($unidade != ''){
				insert($insert);
				echo "<div class='cadastro_existente'><h1>Ocorrência gerada com sucesso!<a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
			}else{
				header("Location: index.php");
			}

			?>

 	<?php require_once"rodape.php";?>
</body>
</html>