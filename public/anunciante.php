
<?php 
	include ('../conectar_banco.php'); 
	$conn = connect();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<html>
		<title></title>
<style type="text/css">
	@import url("../estilos.css");
</style>

<body>


Cadastrar anúncio...
	<div class="">
		<form method="post" action="actionprodutos.php">
			<div class="labeldoform">Nome: </div> <div class="inputdoform"> <input name="nome" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Email: </div> <div class="inputdoform"> <input name="email" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Senha: </div> <div class="inputdoform"> <input type="password" class="estilodoinputdoform" name="senha"/> </div> 

			<div class="labeldoform">Rua: </div> <div class="inputdoform"> <input name="rua" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Bairro: </div> <div class="inputdoform"> <input name="bairro" type="text" class="estilodoinputdoform"/> </div> 
			
			<div class="labeldoform">Cidade: </div> <div class="inputdoform"> <input name="cidade" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Estado: </div> <div class="inputdoform"> <input name="estado" type="text" class="estilodoinputdoform"/> </div> 
			
			<div class="labeldoform">Telefone(s): </div> <div class="inputdoform"> <input name="telefone" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Logotipo: </div> <div class="inputdoform"> <input name="logo" type="file" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Qual promoção do momento? </div> <div class="inputdoform"> <input name="promocao" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Alguns itens (preços) do Cardápio: </div> <div class="inputdoform"> <textarea name="cardapio" rows="15" cols ="40" class="estilodoinputdoform"> </textarea></div> 

			<div class="labeldoform">Faz delivery? </div> 
				<select class="" name="delivery">
					<option value="mercedes">SIM</option>
					<option value="audi">NAO</option>
				</select>

			<div class="labeldoform">Categoria: </div> <div class="inputdoform">
					<?php
						$valores = get_categorias($conn);
						foreach ($valores as $k => $v){
					?>
							<input type="checkbox" name="categorias[]" value="<?php echo $v; ?>"/><?php echo $v; ?><br/>
					<?php } ?>
			</div>

			<div class="labeldoform">Twitter: </div> <div class="inputdoform"> <input name="twitter" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Facebook: </div> <div class="inputdoform"> <input name="facebook" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Orkut: </div> <div class="inputdoform"> <input name="orkut" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">MySpace: </div> <div class="inputdoform"> <input name="myspace" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Seu Site: </div> <div class="inputdoform"> <input name="url" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Horário de Atendimento: </div> <div class="inputdoform"> <input name="horariodeatendimento" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Serviço: </div> <div class="inputdoform"> <input name="servico" type="text" class="estilodoinputdoform"/> </div> 

			<div class="labeldoform">Informações adicionais: </div> <div class="inputdoform"> <input name="informacoesadic" type="text" class="estilodoinputdoform"/> </div> 

			<div class="botaosubmit"> <input type="submit" class="estilodobotaosubmit" value="Enviar dados"/> </div> 
			
		</form>
	</div>



</body> 

</html>
