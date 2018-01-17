
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ocorrência no cartão de ponto</title>
<link rel="stylesheet" type="text/css" href="css/regras.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontes/font-awesome-4.7.0/css/font-awesome.min.css">

</head>
 
<body>
	<?php require_once"cabecalho.php";?>
	<div class="subcabecalho"><h1>Ocorrência no Cartão de Ponto</h1>
	</div>
	<div>
		<form class="formulario" action="php/validacao_formulario.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Atenção</legend>
				<p>Para realizar a ocorrencia do ponto, digite sua <b>matrícula</b> e <b>senha</b> no campo abaixo e clique em "Entrar". Durante a tentativa se tiver algum problema procure seu coordenador ou gestor imediato.</p>
		<label><i class="fa fa-address-card-o" aria-hidden="true"></i> Matrícula: <input placeholder="Digite sua matrícula . . ." type="number" name="matricula"></label>
		<label><i class="fa fa-address-card-o" aria-hidden="true"></i> Senha: <input placeholder="Digite sua senha . . ." type="password" name="senha_funcionario"></label>
		<button type="submit" class="btn btn_azul"><i class="fa fa-key" aria-hidden="true"></i> Entrar </button>
		</fieldset>
	</form>
	<div class="admin"><p>Se você é administrador do sistema <a href="/ocorrencia/php/dp/index.php">clique aqui</a>.</p></div>
	<form class="formulario2" action="php/validacao.php" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Acesso do gestor(a)</legend>
			<p>Prezado(a) gestor(a), para gerenciar as ocorrencias de ponto insira suas credencias.</p>
		<div class="usuario_senha">	
			<h1><i class="fa fa-user-circle" aria-hidden="true"></i></h1>
			<label><input placeholder="Digite seu usuário . . ." type="text" name="usuario"></label><br>
			<label><input placeholder="Digite sua senha . . ." type="password" name="senha"></label><br>
			<button type="submit" class="btn btn_azul"> <i class="fa fa-key" aria-hidden="true"></i> Entrar </button>
		</div>
		</fieldset><br>
	</form>

	</div><!-- Div formulario -->
 	<?php require_once"php/rodape.php";?>
</body>
</html>