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
			$empregado = isset($_POST['empregado'])?$_POST['empregado']:'';
			$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
			
			$select_dados = "SELECT matricula, id, nome FROM empregado WHERE matricula='$empregado'";
			$select_setores = "SELECT nome, id from setor";
			$select_unidade = "SELECT nome, id from unidade";
			$select_gestor = "SELECT nome, id, matricula from usuario_gestor WHERE nivel = 1";

			$testa_dados = mysqli_query($conexao, $select_dados);
			$testa_dados2 = mysqli_query($conexao, $select_setores);
			$testa_dados3 = mysqli_query($conexao, $select_unidade);
			$testa_dados4 = mysqli_query($conexao, $select_gestor);

			if ($validacao = mysqli_num_rows($testa_dados)){
				while ($RF = mysqli_fetch_array($testa_dados)) {
					echo"<br><br><br>
					<div class='container'>
  						<div class='row'>
    						<div class='col-sm formulario4'>
      							<form action='alterar/nome_empregado.php' method='post' accept-charset='utf-8'>
									<fieldset>
										<legend>Alterar nome</legend>
											<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Nome: <input type='text' style='width: 250px ' name='nome' placeholder='Digite o nome . . .' required='' ></label><br>
											<input type='hidden' name='matricula' value='$empregado'>
											<button id='nome' type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Nome</button>
									</fieldset>	
								</form>
   					 </div>
					
					<div class='col-sm formulario4'>
      							<form action='alterar/senha_empregado.php' method='post' accept-charset='utf-8'>
									<fieldset>
										<legend>Alterar senha</legend>
											<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Nome: <input type='password' style='width: 250px ' name='senha' placeholder='Digite uma nova senha . . .' required='' ></label><br>
											<input type='hidden' name='matricula' value='$empregado'>
											<button id='senha' type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Senha</button>
									</fieldset>	
								</form>
   					 </div>

   					 <div class='col-sm formulario4'>
      							<form action='alterar/setor_empregado.php' method='post' accept-charset='utf-8'>
									<fieldset>
										<legend>Alterar setor</legend>
											<i class='fa fa-address-card-o' aria-hidden='true'></i> Nome: <select name='setores'>";
											while ($RF2 = mysqli_fetch_array($testa_dados2)) {
												echo "
															<option value='$RF2[1]'>$RF2[0]</option>
													";	
											}
											echo "</select><br><br>";
											echo"<input type='hidden' name='matricula' value='$empregado'>
											<button id='setor' type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Setor</button>
									</fieldset>	
								</form>
   					 </div>

   					  <div class='col-sm formulario4'>
      							<form action='alterar/unidade_empregado.php' method='post' accept-charset='utf-8'>
									<fieldset>
										<legend>Alterar unidade</legend>
											<i class='fa fa-address-card-o' aria-hidden='true'></i> Nome: <select name='unidades'>";
											while ($RF3 = mysqli_fetch_array($testa_dados3)) {
												echo "
															<option value='$RF3[1]'>$RF3[0]</option>
													";	
											}
											echo "</select><br><br>";
											echo"<input type='hidden' name='matricula' value='$empregado'>
											<button id='unidade' type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Unidade</button>
									</fieldset>	
								</form>
   					 </div>

  				</div>

  				 <div class='col-sm formulario4'>
      							<form action='alterar/gestor_empregado.php' method='post' accept-charset='utf-8'>
									<fieldset>
										<legend>Alterar gestor</legend>
											<i class='fa fa-address-card-o' aria-hidden='true'></i> Nome: <select name='gestores'>";
											while ($RF4 = mysqli_fetch_array($testa_dados4)) {
												echo "
															<option value='$RF4[2]'>$RF4[0]</option>
													";	
											}
											echo "</select><br><br>";
											echo"<input type='hidden' name='matricula' value='$empregado'>
											<button id='gestores' type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Gestor</button>
									</fieldset>	
								</form>
   					 </div>
			</div>";
				}

			}else{
				if($usuario==""){
					echo "<div class='cadastro_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}else{
					echo "<div class='cadastro_existente'><h1>Empregado não existente.  <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}
			}
			
			
		?>
	
 	<?php require_once"../../rodape.php";?>

 	<script src="../../../script/jquery-3.2.1.js" charset="utf-8"></script>
	<script>
		$(document).ready(function(){
			$('#nome').click(function(){
				$('#nome').text('Alterando nome, por favor aguarde...').addClass('btn_azul_efeito');
			});
		});

		$(document).ready(function(){
			$('#gestores').click(function(){
				$('#gestores').text('Alterando usuário, por favor aguarde...').addClass('btn_azul_efeito');
			});
		});

		$(document).ready(function(){
			$('#senha').click(function(){
				$('#senha').text('Alterando senha, por favor aguarde...').addClass('btn_azul_efeito');
			});
		});

		$(document).ready(function(){
			$('#unidade').click(function(){
				$('#unidade').text('Alterando unidade, por favor aguarde...').addClass('btn_azul_efeito');
			});
		});

		$(document).ready(function(){
			$('#setor').click(function(){
				$('#setor').text('Alterando setor, por favor aguarde...').addClass('btn_azul_efeito');
			});
		});

	</script>
</body>
</html>

<?php

	} else {
		header("Location: ../../../index.php"); exit;
	}
?>