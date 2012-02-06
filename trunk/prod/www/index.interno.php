<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php include("title.inc"); ?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta content="keywords" content="<?php include("keywords.inc");?>"/> 
	<meta content="description, descrição" content="<?php include("description.inc");?>"/> 
	<link rel="stylesheet" href="css/estilo.css" type="text/css" />
</head>

<body style="text-align:center;" onLoad="document.userform.userquery.focus()">
	
	<div id="corpo">
		<h1><?php include("site_name.inc"); ?></h1>
		<p>Ache aqui tudo que você procura na cidade de Manaus</p>
		<br/><br/>
		<form name="userform" method="post" action="buscar.php"> 
			<input name="userquery" type="text" class="caixa_busca"/>
			<input type="submit" class="botao" value="Buscar"/>
		</form>
		<br/>
		<div id="footer">
			<p>Manaus, 2011 ® Todos os direitos Reservados</p>
		</div>
	</div>
</body>
</html>
