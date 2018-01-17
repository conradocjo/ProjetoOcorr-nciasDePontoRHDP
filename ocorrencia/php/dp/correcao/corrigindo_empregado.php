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
			mysql_set_charset('utf8');

			#require once para insert
			require_once"../../manutencao/abre_conexao.php";
			#Dados para conexão com Banco para realizar Select:
			$host = "localhost";
			$usuario = "root";
			$senha = "";
			$bd = "ocorrencia";
			#abre conexao com banco
			$conexao = mysqli_connect($host, $usuario, $senha, $bd);
			#manipula post
			$matricula = isset($_POST["matricula"])?$_POST["matricula"]:"";
			$nome_empregado = isset($_POST["nome_empregado"])?$_POST["nome_empregado"]:"";
			$setor = isset($_POST["setor"])?$_POST["setor"]:"";
			$unidade = isset($_POST["unidade"])?$_POST["unidade"]:"";
			$gestor = isset($_POST["gestor"])?$_POST["gestor"]:"";
			$senha_empregado = isset($_POST["senha_empregado"])?$_POST["senha_empregado"]:"";
			$rastro = isset($_POST["rastro"])?$_POST["rastro"]:"";
			#querys
			
			

			$select_dados = "SELECT * FROM empregado WHERE matricula='$matricula' ";
			$testa_dados = mysqli_query($conexao, $select_dados);
			$select_dados2 = "SELECT * FROM usuario_gestor WHERE matricula = '$matricula' ";
			$select_gestor = "SELECT id FROM usuario_gestor WHERE nivel = 1 AND nome = '$gestor' ";
			$result_gestor = mysqli_query($conexao, $select_gestor);
			
			


			if ($validacao = mysqli_num_rows($testa_dados)){
				while ($rf = mysqli_fetch_array($result_gestor)) {
				$insert_dados = "UPDATE empregado SET matricula ='$matricula', nome = '$nome_empregado', superior_imediato_id = '$gestor',  fk_unidade = '$unidade', fk_setor = '$setor', usuario_rastro_criacao = '$rastro', senha =  md5('$senha_empregado'), superior_imediato_id ='$rf[0]', superior_imediato ='$gestor' WHERE matricula = '$matricula' ";
				insert($insert_dados);
			}
			
				
				echo "<div class='cadastro_existente'><h1>Empregado $nome_empregado alterado com sucesso. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
			}else{
				if($setor==""){
					echo "<div class='dado_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}else{
					
					echo "<div class='cadastro_realizado'<h1>Empregado $nome_empregado não encontrado. <i class='fa fa-smile-o' aria-hidden='true'></i></h1></div>";
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