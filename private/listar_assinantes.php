<?php

	$conn = connect();

	$lista_de_assinantes = get_assinantes($conn);
	echo "Bem aqui...";
	?><table class=""> <?php
	while ($res = mysql_fetch_array($lista_de_assinantes)){
		$id = $res["id"];
		$email = $res["email"];
		$cep = $res["cep"];
		$rua = $res["rua"];
		$status = $res["status"];
		$bairro = $res["bairro"];
		$senha = $res["senha"];
	?>

			<tr>
				<td><?php echo $id; ?></td>
				<td><?php echo $email; ?></td>
				<td><?php echo $cep; ?></td>
				<td><?php echo $rua; ?></td>
				<td><?php echo $bairro; ?></td>
				<td><?php echo $status; ?></td>
				<td><?php echo $senha; ?></td>
			</tr>
		</table>
		
	<?php
	 }
	?>

?>
