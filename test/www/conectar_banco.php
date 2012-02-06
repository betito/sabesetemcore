<?php

function connect ()
{
	include ('x/dados.php');
	$conexao = mysql_connect($server, $userdata, $oz) or die("Erro no banco ". mysql_error());
	mysql_select_db($db,$conexao) or die("Erro no banco 2". mysql_error());

	return $conexao;
}


function get_records($conn, $qry) 
{

	$q = $qry;
	$res = mysql_query($q, $conn);

	$ids = array();
	$cont = 0;
	while ($fetch = mysql_fetch_array($res,  MYSQL_BOTH)){
		$id = $fetch['idanunciante'];
		$ids[$cont] = $id;
		$cont++;
	}
	
	return $ids;
}

function get_anunciante($conn, $id)
{

	$qry = "select nome, concat(concat(rua, ' '), bairro) as end, telefone from anunciante where id = ".$id;

	$res = mysql_query($qry, $conn);
	$f = mysql_fetch_array($res,  MYSQL_BOTH);
	return $f;

}


?>
