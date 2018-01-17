<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) && ( $_SESSION['nivel'] == 2 ) ){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ocorrência no cartão de ponto</title>
<link rel="stylesheet" type="text/css" href="../../../../css/regras.css">
<link rel="stylesheet" type="text/css" href="../../../../css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../../../fontes/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
 
<body>

	<?php
	date_default_timezone_set('America/Sao_Paulo');
	$hora_atual = date('H:i');
	$data_atual = date('d/m/Y');
	echo "<header id='' class=''>
				<div class='cabecalho_cadastro'>
					<h1><img src='../../../../img/logo.png' alt='Axial'></h1>
					<p><i class='fa fa-calendar' aria-hidden='true'></i> Dia $data_atual, <i class='fa fa-clock-o' aria-hidden='true'></i> $hora_atual</p>
				</div>
		  </header>";
	?>
	<?php require_once"../../../menu.php";?>
		
		<?php
			header("Content-type: text/html; charset=utf-8");
			mb_internal_encoding("UTF-8"); 
			mysql_set_charset('utf8');

			#require once para insert
			require_once"../../../manutencao/abre_conexao.php";
			#Dados para conexão com Banco para realizar Select:
			$host = "localhost";
			$usuario = "root";
			$senha = "";
			$bd = "ocorrencia";
			#abre conexao com banco
			$conexao = mysqli_connect($host, $usuario, $senha, $bd);
			#manipula post
			$email = isset($_POST["email"])?$_POST["email"]:"";
			$user_post = isset($_POST["user_post"])?$_POST["user_post"]:"";
			$usuario_sessao = isset($_SESSION['usuario'])?($_SESSION['usuario']):"";
			#querys
			$select_dados = "SELECT * FROM usuario_gestor WHERE usuario='$user_post' ";
			$insert_dados = "UPDATE usuario_gestor SET email =  '$email', usuario_rastro_atualizacao = '$usuario_sessao' WHERE usuario = '$user_post' ";
			
			$testa_dados = mysqli_query($conexao, $select_dados);


			if ($validacao1 = mysqli_num_rows($testa_dados)){
				insert($insert_dados);
				echo "<div class='cadastro_existente'><h1>Email do usuário $user_post alterado com sucesso.</h1></div>";
			}else{
				if($senha==""){
					echo "<div class='dado_existente'><h1>Dados não foram preenchidos. </h1></div>";
				}else{
					
					echo "<div class='cadastro_realizado'<h1>Usuário $user_post não encontrado.</h1></div>";
				}
			}
			
		?>
	
 	<?php require_once"../../../rodape.php";?>
</body>
</html>

<?php

	} else {
		header("Location: ../../../../index.php"); exit;
	}
?>