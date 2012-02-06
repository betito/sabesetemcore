<?php

	include ("../conectar_banco.php");

	$dados = array("email" => "", "senha" => "", "cep" => "", "rua" => "","bairro" => "");
	$tabela = "assinante";
	$page_redirect = "index";
	$error_msg = str_replace("XXXTABELAXXX", $tabela, "Erro ao cadastrar XXXTABELAXXX...<br/>");
	$redirect_location = str_replace("XXXTABELAXXX", $page_redirect, "Location: XXXTABELAXXX.php");
	foreach ($dados as $k => $v) {
		$dado = $_POST[$k];
		if ($dado == NULL){
			$error = $error . "<br/>SEM ".$k;
		}else{
			$dados[$k] = $dado;
		}
	}

	if ($error){
		echo "Erro: ".$error;
	}else{
		echo "Ok...<br/>";
		$comandosql = "INSERT INTO XXXTABELAXXX (XXXCAMPOSXXX) VALUES (XXXVALORESXXX);";
		echo "Comando :: ".$comandosql."<br/>";
		$comandosql = str_replace("XXXTABELAXXX", $tabela, $comandosql);
		$campos = "";
		foreach ($dados as $k => $v){
			$campos =  $campos . "," . $k;
			$valores = $valores . ",'" . $v."'";
		}
		$comandosql = str_replace("XXXCAMPOSXXX", $campos, $comandosql);
		$comandosql = str_replace("XXXVALORESXXX", $valores, $comandosql);
		$comandosql = str_replace("(,", "(", $comandosql);

		echo "Comando :: ".$comandosql;	
		$conn = connect();
		if (is_existing_assinante($conn, $dados["email"])){
			register_session ("email", $dados["email"]);
		}else {
			exec_sql($comandosql, $conn, $error_msg);
			register_session ("email", $dados["email"]);
		}		
		
		//header($redirect_location);
	}

?>
