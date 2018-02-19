<?php
	header("Content-type: text/html; charset=utf-8");
	mb_internal_encoding("UTF-8"); 
	

		// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
 		 if (!empty($_POST) AND (empty($_POST['matricula']) OR empty($_POST['senha_funcionario']))) {
     		 header("Location: ../index.php"); exit;
 		 }

	#Conexao com Banco de dados
      require_once "manutencao/conecta.php";
      $conexao = conecta();
	#Valida dados do post
	$matricula = isset($_POST['matricula'])?$_POST['matricula']:'';
	$senha_funcionario = isset($_POST['senha_funcionario'])?$_POST['senha_funcionario']:'';
 	
 	$select_dados = "SELECT * FROM `empregado` WHERE (`matricula` = '$matricula') AND senha = MD5('$senha_funcionario')";
  		#"INSERT INTO usuario_gestor (usuario, nome, senha) VALUES ('$usuario','$nome', MD5('$senha'))"
 	$testa_dados = mysqli_query($conexao, $select_dados);
 	
 	 	if ($valida = mysqli_num_rows($testa_dados)) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
 		// Salva os dados encontrados na variável $resultado
      	// Se a sessão não existir, inicia uma
      	if (!isset($_SESSION)) session_start();
        while ($resultado2 = mysqli_fetch_array($testa_dados)) {
            $_SESSION['matricula'] = $matricula;
            $_SESSION['senha'] = $senha_funcionario;
            $_SESSION['logado'] = 1;
          }
      	// Redireciona o visitante
      	header("Location: form_ocorrencia.php"); exit;

      
  	} else {
    	echo "<script>
                alert('Mátricula ou senha inválidos');
            </script>"; exit;
  }

  	// A sessão precisa ser iniciada em cada página diferente



  session_destroy();


?>

