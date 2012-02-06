
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html>
		<title>Sistema de Moderação	</title>

<style type="text/css">
	@import url("../estilos.css");
</style>


<body>

<?php
	session_start();
	if ($_SESSION["email"]){
?>
		<div class="geral">
			<div class="topo"> 
				Sistema para Moderação dos anunciantes e assinantes do site...
				<?php echo $email; ?>
			</div> 
			<div class="corpo"> 
				<div class="corpoesquerdo">
					<a href="listar_assinantes.php">Moderar assinantes</a>
					<a href="listar_anunciantes.php">Moderar anunciantes</a>
				 </div> 	
				<div class="corpodireito"> DIREITO </div> 
			</div> 
		</div>

<?php
}else{
	echo "Favor fazer login...";
}
?>
</body> 

</html>

