<?php
	session_start();
	if ( ($_SESSION['logado'] == 1) && ( $_SESSION['nivel'] == 1 ) ){

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
	<?php require_once"../../menu2.php";?>
	<div class="">
		<form class="form_cadastro_unidade" action="cadastrando_gestor.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Cadastro do gestor(a)</legend>
				<?php
					header("Content-type: text/html; charset=utf-8");
					mb_internal_encoding("UTF-8"); 
					mysql_set_charset('utf8');
					$host = "localhost";
					$usuario = "root";
					$senha = "";
					$bd = "ocorrencia";
					#abre conexao com banco
					$conexao = mysqli_connect($host, $usuario, $senha, $bd);
					#dados da sessão
					$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
 					$sql_select_nome_gestor = "SELECT nome FROM usuario_gestor WHERE usuario = '$usuario_sessao' ";
 					$select_gestor = mysqli_query($conexao, $sql_select_nome_gestor);
 					while ($resultado2 = mysqli_fetch_array($select_gestor)) {
							echo "<h5>Você está logado como $resultado2[0]!</h5>";
					}

				
					#Em baixo são inputs e selects de formulário

					#Input matrícula do empregado
					echo "<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Nome: <input type='text' style='width: 200px ' name='nome' placeholder='Digite o nome . . .' required='' ></label> ";
					#Input nome empregado
					echo "<label><i class='fa fa-user-o' aria-hidden='true'></i> Usuário(a): <input placeholder='Digite o usuário(a) . . .' type='text' style='width: 350px ' name='usuario' required='' ></label><br><br>";
					
					#Input senha
					echo "<label><i class='fa fa-user-o' aria-hidden='true'></i> Senha: <input placeholder='Digite uma senha . . .' type='password' style='width: 350px ' name='senha' required='' ></label>";
					#Select nível
					echo " <label><i class='fa fa-user-circle-o' aria-hidden='true'></i> Grupo: <select name='nivel'>
								<option value='1'>Gestão</option>
								<option value='2'>Administração</option>
						</select>";
					#Input email
					echo " <label><i class='fa fa-weixin' aria-hidden='true'></i> Email: <input placeholder='Digite um email válido . . .' type='email' style='width: 250px ' name='email' required='' ></label>";
					#Input rastro
					echo "<input type='hidden' name='rastro' value='$usuario_sessao'>";
				?>
		</fieldset><br>
				<button type="submit" class="btn btn_azul"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Enviar Dados</button>
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