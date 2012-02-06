<?php

	//include ("lucenequery.inc");

	include 'conectar_banco.php'; 

	$query = $_POST['userquery'];
	echo ("busca :: " . $query);

	$terms = preg_split("/\s+/", trim($query));
	$stms = "";
	for ( $counter = 0; $counter < count($terms); $counter++) {
		$stms = $stms . " descricao like ucase(\"%" . $terms[$counter]. "%\")";
		if ($counter < count($terms) - 1){
			$stms = $stms . " OR ";
		}
	}

//	echo ("<br/>SENTENCA :: " . $stms);
	$stms = "SELECT idanunciante from resumo where ".$stms;


	$conn = connect();	
	$res = get_records ($conn, $stms);
	foreach ($res as $id){
		$f = get_anunciante($conn, $id);
		$nome = utf8_encode($f["nome"]);
		$end = utf8_encode($f["end"]);
		$telefone = utf8_encode($f["telefone"]);
		echo ("<p>");
		echo ($nome."<br/>");
		echo ($end."<br/>");
		echo ($telefone."<br/>");
		echo ("<p/>--------------mauro-------------<br/>");
	}

?>
