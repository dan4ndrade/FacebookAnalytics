<?php
	function conectar($host, $usuario, $senha, $bd){
		mysql_connect($host, $usuario, $senha) or die ("Falha na conexao");
		mysql_select_db($bd) or die ("Falha no acesso" .$bd);

		return "OK";
	}
?>