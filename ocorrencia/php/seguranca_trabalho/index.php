
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ocorrência no cartão de ponto</title>
<link rel="stylesheet" type="text/css" href="../../css/regras.css">
<link rel="stylesheet" type="text/css" href="../../css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../fontes/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
 
<body>
	<div class="subcabecalho"><h1>Módulo Segurança do trabalho</h1>
	</div>
	<?php require_once"cabecalho.php";?>
	<div class="subcabecalho">
	</div>
	<div>
		
	<div class="admin">
		<?php
			require_once"../../php/menu3.php";
		?>
	</div>
	<form class="formulario3" action="valida_seguranca_trabalho.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Acesso da Segurança do trabalho</legend>
			<h5>Prezado(a) insira seu usuário e senha para ter acesso.</h5>
		<div class="usuario_senha">	
			<h1><i class="fa fa-user-circle" aria-hidden="true"></i></h1>
			<label><input placeholder="Digite seu usuário . . ." type="text" name="usuario"></label><br>
			<label><input placeholder="Digite sua senha . . ." type="password" name="senha"></label><br>
			<button id='logar' type="submit" class="btn btn_azul"> <i class="fa fa-key" aria-hidden="true"></i> Entrar </button>
		</div>
		</fieldset><br>
	</form>

	</div><!-- Div formulario -->
 	<?php require_once"../../php/rodape.php";?>
 	<script src="../../script/jquery-3.2.1.js" charset="utf-8"></script>
	<script>
		$(document).ready(function(){
			$('#logar').click(function(){
				$('#logar').text('Carregando...').addClass('btn_azul_efeito');
			});
		});
	</script>
</body>
</html>