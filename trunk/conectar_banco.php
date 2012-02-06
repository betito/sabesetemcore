
<?php


function connect (){
	include ('x/dados.php');
	$conexao = mysql_connect($server, $userdata, $oz) or die("Erro no banco");
	mysql_select_db("selfservice",$conexao) or die("Erro no banco 2");

	return $conexao;
}

function exec_sql($sql, $con, $error_msg){

	$res = mysql_query($sql, $con);
	if ($res == NULL){
    	die($error_msg.' :: '.mysql_error());
	}
	
	return $res;
}


function is_valid_user($conn, $user, $pass){

	$sql = "select '1' from user where email like \"".$user."\" and password like \"".$pass."\"";
	$res = exec_sql ($sql, $conn, "Invalid User and pass <br/>...");

	if ($res){
		$res = mysql_fetch_array($res);
		$res = $res["1"];
		return $res;
	}

	return 0;
}

function is_existing_assinante($conn, $user){

	$sql = "select email from assinante where email like \"".$user."\"";
	echo ">> ".$sql."<br/>";
	$res = mysql_query ($sql, $conn);

	$x = mysql_fetch_array($res);
	echo "email >>".$x["email"]."<br/>";

	if ($x){
		return true;
	}

	return false;
}

function get_categorias($conn){

	$arrayvalores = array();
	$comando = "select nome from categoria order by nome";

	$valores = mysql_query($comando, $conn);
	$c = 0;
	while ($xtextotmp = mysql_fetch_array($valores)){
        $arrayvalores[$c] = $xtextotmp['nome'];
		$c++;
	}

	return $arrayvalores;


}

function register_session($name, $valor){
	session_start();
	$_SESSION[$name] = $valor;
}


function get_assinantes($conn){

	$sql = "select * from assinantes";
	
	return exec_sql($sql, $conn, "Erro ao carregar assinantes!");

}

function get_from_session($valor) {
	session_start();
	$x = $_SESSION[$valor];
	echo "aqui...";
	if ($x) {
		return $x;
	}
	
	return NULL;
}

?>
