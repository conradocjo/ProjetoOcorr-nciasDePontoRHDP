<?php
	header("Content-type: text/html; charset=utf-8");
	mb_internal_encoding("UTF-8"); 
	#mysql_set_charset('utf8');

		// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
 		 if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
     		 header("Location: index.php"); exit;
 		 }

#Conexao com Banco de dados
	require_once "../manutencao/conecta.php";
	$conexao = conecta();

# Dados do Post
  $usuario = isset($_POST['usuario'])?$_POST['usuario']:'';
	$senha = isset($_POST['senha'])?$_POST['senha']:'';
	

  #select utilizando retorno da função conecta 	
 	$select_dados = "SELECT * FROM `usuario_gestor` WHERE (`usuario` = '$usuario') AND senha = MD5('$senha') AND ativo = 1";
  		#"INSERT INTO usuario_gestor (usuario, nome, senha) VALUES ('$usuario','$nome', MD5('$senha'))"
 	$testa_dados = mysqli_query($conexao, $select_dados);
 	
 	if ($valida = mysqli_num_rows($testa_dados)) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
 		// Salva os dados encontrados na variável $resultado
    	#$resultado = mysql_fetch_assoc($testa_dados);  	
      	// Se a sessão não existir, inicia uma
      	if (!isset($_SESSION)) session_start();
        while ($resultado2 = mysqli_fetch_array($testa_dados)) {
            $_SESSION['usuario'] = $resultado2['usuario']; # Cada uma das atribuições será necessário para forma de logon
            $_SESSION['senha'] = $resultado2['senha'];
            $_SESSION['ativo'] = $resultado2['ativo'];
            $_SESSION['logado'] = 1;
            $_SESSION['nivel'] = $resultado2['nivel'];
          }
      	// Redireciona o visitante
      	header("Location: cadastro/home.php"); exit;

      # se o usuario não for válido abrirá um alert
  	} else {
    	echo "<script>
                alert('Usuário ou senha inválidos');
            </script>"; exit;
  }
#Destrói sessão
  session_destroy();

?>