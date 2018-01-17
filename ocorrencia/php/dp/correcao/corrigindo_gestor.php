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
			$user_post = isset($_POST['usuario'])?$_POST['usuario']:'';
			$usuario_sessao = isset($_SESSION['usuario'])?$_SESSION['usuario']:'';
			
			$select_dados = "SELECT usuario, id FROM usuario_gestor WHERE usuario='$user_post'";

			$testa_dados = mysqli_query($conexao, $select_dados);

			if ($validacao = mysqli_num_rows($testa_dados)){
				echo"<br><br><br>
				<div class='container'>
  					<div class='row '>
    					<div class='col-sm formulario4'>
      						<form action='alterar/nome.php' method='post' accept-charset='utf-8'>
								<fieldset>
									<legend>Alterar nome</legend>
										<label><i class='fa fa-address-card-o' aria-hidden='true'></i> Nome: <input type='text' style='width: 250px ' name='nome' placeholder='Digite seu nome . . .' required='' ></label><br>
										<input type='hidden' name='user_post' value='$user_post'>
										<button type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Nome</button>
								</fieldset>	
							</form>
   				 </div>
    			
    			<div class='col-sm formulario4'>
      				<form action='alterar/usuario.php' method='post' accept-charset='utf-8'>
							<fieldset>
								<legend>Alterar usuário</legend>
									<i class='fa fa-user-o' aria-hidden='true'></i> Usuário que será alterado:  
									
									<select name='usuario_id' >";
										while ($result1 = mysqli_fetch_array($testa_dados)) {
											echo"<option value='$result1[1]'>$result1[0]</option>";
										}
									echo"</select>

									<label><i class='fa fa-user-o' aria-hidden='true'></i> Usuário(a): <input placeholder='Digite o nome do usuário(a) . . .' type='text' style='width: 250px ' name='usuario' required='' ></label><br>
									<button type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Usuário</button>
							</fieldset>	

					</form>
    			</div>
    
    			<div class='col-sm formulario4'>
    				  <form action='alterar/senha.php' method='post' accept-charset='utf-8'>
							<fieldset>
								<legend>Alterar senha</legend>
									<label><i class='fa fa-user-o' aria-hidden='true'></i> Senha: <input placeholder='Digite uma senha . . .' type='password' style='width: 350px ' name='senha' required='' ></label><br>
									<input type='hidden' name='user_post' value='$user_post'>
									<button type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Senha</button>
							</fieldset>	
					</form>
    			</div>
    			<div class='col-sm formulario4'>
    				  <form action='alterar/email.php' method='post' accept-charset='utf-8'>
							<fieldset>
								<legend>Alterar Email</legend>
									<label><i class='fa fa-user-o' aria-hidden='true'></i> Senha: <input placeholder='Digite o email corretamente . . .' type='email' style='width: 350px ' name='email' required='' ></label><br>
									<input type='hidden' name='user_post' value='$user_post'>
									<button type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Email</button>
							</fieldset>	

					</form>
    			</div>
    			<div class='col-sm formulario4'>
    				  <form action='alterar/grupo.php' method='post' accept-charset='utf-8'>
							<fieldset>
								<legend>Alterar Grupo</legend>
									<input type='hidden' name='user_post' value='$user_post'>
									<label><i class='fa fa-users' aria-hidden='true'></i> Gestor <input type = 'radio' name = 'grupo' value = '1'></label><br>
									<label><i class='fa fa-users' aria-hidden='true'></i> Administrador <input type = 'radio' name = 'grupo' value = '2'></label><br>
									<button type='submit' class='btn btn_azul'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Alterar Grupo</button>
							</fieldset>	

					</form>
    			</div>
  			</div>
		</div>";

			}else{
				if($usuario==""){
					echo "<div class='cadastro_existente'><h1>Dados não foram preenchidos. <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
				}else{
					echo "<div class='cadastro_existente'><h1>Usuário não existente.  <a href='javascript:history.back()'>Clique aqui</a> para voltar.</h1></div>";
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