<?php
	header("Content-type: text/html; charset=utf-8");
	mb_internal_encoding("UTF-8"); 
	

		// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
 		 if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
     		 header("Location: ../index.php"); exit;
 		 }

	#Conexao com Banco de dados
     require_once "../manutencao/conecta.php";
     $conexao = conecta();
	#Valida dados do post
	$usuario = isset($_POST['usuario'])?$_POST['usuario']:'';
	$senha = isset($_POST['senha'])?$_POST['senha']:'';
	#$usuario = mysql_real_escape_string($_POST['usuario']);
  #	$senha = mysql_real_escape_string($_POST['senha']);
 	
 	$select_dados = "SELECT * FROM `usuario_gestor` WHERE (`usuario` = '$usuario') AND senha = MD5('$senha') AND ativo = 1";
  		#"INSERT INTO usuario_gestor (usuario, nome, senha) VALUES ('$usuario','$nome', MD5('$senha'))"
 	$testa_dados = mysqli_query($conexao, $select_dados);
 	
 	if ($valida = mysqli_num_rows($testa_dados)) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
 		// Salva os dados encontrados na variável $resultado
    	
      	// Se a sessão não existir, inicia uma
      	if (!isset($_SESSION)) session_start();
        while ($resultado2 = mysqli_fetch_array($testa_dados)) {
            $_SESSION['usuario'] = $resultado2['usuario'];
            $_SESSION['senha'] = $resultado2['senha'];
            $_SESSION['ativo'] = $resultado2['ativo'];
            $_SESSION['logado'] = 1;
            $_SESSION['nivel'] = $resultado2['nivel'];
          }
      	// Redireciona o visitante
      	header("Location: aprova_ocorrencia.php"); exit;

      
  	} else {
    	echo "<script>
                alert('Usuário ou senha inválidos');
            </script>"; exit;
  }


  session_destroy();

?>