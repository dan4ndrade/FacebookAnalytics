<?php

	function conectar($host, $usuario, $senha, $bd){
		mysql_connect($host, $usuario, $senha) or die ("Falha na conexao");
		mysql_select_db($bd) or die ("Falha no acesso" .$bd);
		return "OK";
	}


	conectar('localhost', 'root', '', 'bd_facebookanalytics');

	$username = $_POST["username"];
	$password = $_POST["password"];

	$resultado = mysql_fetch_assoc(mysql_query("SELECT password FROM tb_usuarios WHERE username='".$username."'"));

	if ($password == ""){

		//Destrói
		session_destroy();
		//Limpa
		unset ($_SESSION['login']);
		unset ($_SESSION['senha']);

		header('Location: login.html');

	} elseif ($resultado['password'] == $password) {

	session_start();
	
		//Caso contrário redireciona para a página de autenticação
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;

		header('Location: index.php');

	} else {

		//Destrói
		session_destroy();
		//Limpa
		unset ($_SESSION['username']);
		unset ($_SESSION['password']);

		header('Location: login.html');
	}

	mysql_close() or die ('Falha ao fechar o banco de dados');

?>