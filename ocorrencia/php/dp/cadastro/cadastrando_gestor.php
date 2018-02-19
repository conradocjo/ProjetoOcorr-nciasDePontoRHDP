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
		
		<?php
			header("Content-type: text/html; charset=utf-8");
			mb_internal_encoding("UTF-8"); 
			

			#require once para insert
			require_once"../../manutencao/abre_conexao.php";
			#Dados para conexão com Banco para realizar Select:
			#Conexao com Banco de dados
			require_once "../../manutencao/conecta.php";
			$conexao = conecta();
			#manipula post
			$nome = isset($_POST['nome'])?$_POST['nome']:'';
			$usuario_cadastrar = isset($_POST['usuario'])?$_POST['usuario']:'';
			$senha = isset($_POST['senha'])?$_POST['senha']:'';
			$nivel = isset($_POST['nivel'])?($_POST['nivel']):'';
			$email = isset($_POST['email'])?($_POST['email']):'';
			$rastro = isset($_POST['rastro'])?($_POST['rastro']):'';
			$matricula = isset($_POST['matricula'])?($_POST['matricula']):'';
			#querys
			$insert = "INSERT INTO usuario_gestor (usuario, nome, senha, nivel, email, matricula, rastro_usuario) VALUES ('$usuario_cadastrar','$nome', MD5('$senha'), '$nivel', '$email','$matricula' , '$rastro')";
			$select_dados = "SELECT * FROM usuario_gestor WHERE nome='$nome' OR usuario = '$usuario_cadastrar'";
			$testa_dados = mysqli_query($conexao, $select_dados);

			if ($validacao = mysqli_num_rows($testa_dados)){
				echo "<div class='cadastro_existente'><h1>Usuário $usuario_cadastrar ou nome $nome existentes. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
			}else{
				if($nome==""){
					echo "<div class='cadastro_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}else{
					insert($insert);
					echo "<div class='cadastro_existente'><h1>Cadastro realizado. <i class='fa fa-smile-o' aria-hidden='true'></i></h1></div>";
				}
			}
			
			
		?>
	
 	<?php require_once"../../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}
?>