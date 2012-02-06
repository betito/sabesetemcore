
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html>
	<?php 
		echo "<title>";
		include ("title");
		echo "</title> ";
	?>

<body>

Self Service...

<?php

	include ("../conectar_banco.php");
	$email = get_from_session("email");
	if ($email){
		echo ("Olá: ". $email . "<br/>");
	}
?>

</body> 

</html>
