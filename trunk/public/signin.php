
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html>
	<?php 
		echo "<title>";
		include ("title");
		echo "</title> ";
	?>
<style type="text/css">
	@import url("estilos.css");
</style>
<script language="JavaScript" type="text/javascript" src="../jscript.js">

</script>

<body>


Self Service... Sign in...
	<div class="">
		<form method="post" action="signinaction.php" name="fsignin">
			<div class="labeldoform">email: </div> <div class="inputdoform"> <input type="text" class="estilodoinputdoform" name="email"/> </div> 
			<div class="labeldoform">senha: </div> <div class="inputdoform"> <input type="password" class="estilodoinputdoform" name="senha"/> </div> 
			<div class="labeldoform">confirmar senha: </div> <div class="inputdoform"> <input type="password" class="estilodoinputdoform" name="confirmarsenha"/> </div> 
			<div class="labeldoform">CEP: </div> <div class="inputdoform"> <input type="text" class="estilodoinputdoform"   name="cep"/> </div> 
			<div class="labeldoform">rua: </div> <div class="inputdoform"> <input type="text" class="estilodoinputdoform"   name="rua"  /> </div> 
			<div class="labeldoform">bairro: </div> <div class="inputdoform"> <input type="text" class="estilodoinputdoform"   name="bairro"  /> </div> 
			<div class="botaosubmit"> <input type="button" class="estilodobotaosubmit" value="Enviar dados" onclick="validade_form_fields();"/> </div> 
			
		</form>
	</div>



</body> 

</html>
