<?php 
//Abrir ConexÃ£o
$link = mysqli_connect('localhost','root','','maestro');


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if($id){
	
	$query = "SELECT * FROM `usuarios` WHERE `usuarios`.`id_usuario` = $id";
	$result = mysqli_query($link, $query);
	
	if(mysqli_num_rows($result)){
	
		$delete = filter_input(INPUT_POST, 'delete', FILTER_VALIDATE_INT);
		if($delete){
			
			
			//Faz uso
				//Deletando o registro
			$query = "DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` = $id";	
			mysqli_query($link, $query);
			
			mysqli_close($link);
			
			
			$mensagem['sucesso'] = 'Registro Apagado.';
			header('location: index.php?pagina=usuarios&mensagem='.$mensagem['sucesso']);
				
			
			
		}
		
		?>
		
		
		<form method="post">
			<p> Voce tem certeza que deseja excluir este registro? </p>
			
			<button name="delete" type="submit" value="1" class="btn btn-danger">Sim</button>
			<a href="index.php?pagina=usuarios" class="btn btn-default">NÃO</a>
			
		</form>
	<?php }else{?>
		<p> Registro nÃo encontrado</p>
		<a href="usuarios_lista.php">Retornar para a Lista</a>
	<?php } ?>
	
<?php }else{ ?>
	<p> Informe um registro para avaliar a deleçao.</p>
<?php } ?>