<?php

include ('../conectar_banco.php');



	$dados = array("email" => "", "password" => "" );
	$tabela = "user";
	$page_redirect = "moderator";
	$error_msg = str_replace("XXXTABELAXXX", $tabela, "Erro ao cadastrar XXXTABELAXXX...<br/>");
	$redirect_location = str_replace("XXXTABELAXXX", $page_redirect, "Location: XXXTABELAXXX.php");

	$error = NULL;
	foreach ($dados as $k => $v) {
		$dado = $_POST[$k];
		if ($dado == NULL){
			$error = $error . "<br/>SEM ".$k;
		}else{
			$dados[$k] = $dado;
		}
	}


	if ($error != NULL){
		echo "Erro: ".$error;
	}else{

		$conn = connect();
		if (is_valid_user ($conn, $dados["email"], $dados["password"])){
			echo "User OK... <br/>";
			session_start();
			$_SESSION["email"] = $email;
		}else{
			echo "Invalid User... <br/>";	
		}

		header($redirect_location);

	}

?>
