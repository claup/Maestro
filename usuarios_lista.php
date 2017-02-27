<?php $mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_SANITIZE_STRING);?>
<span><?=(isset($mensagem)) ? $mensagem :'';?></span>
<br/>


<div class="row">
	<h1>Usuario</h1>
	<ol class="breadcrumb">
		<li><a href="#">Maestro</a></li>
		<li class="active">Usuario</li>
	</ol>
</div>


<?php if (isset ( $_GET ['formulario']) && $_GET['formulario'] == 0) { ?>

<div class="row">
	<a href="usuario_lista.php?menu=usuario&formulario=1"
		class="btn btn-success">Adicionar</a>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID</td>
			<td>Nome</td>
			<td>Usuario</td>
			<td>Situacao</td>
			<td>Ações</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><a href="#" class="btn btn-info">Editar</a> <a href="#"
				class="btn btn-danger">Deletar</a></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><a href="#" class="btn btn-info">Editar</a> <a href="#"
				class="btn btn-danger">Deletar</a></td>
		</tr>
	</table>
</div>
<?php } else { ?>

<form>
	<label for="id_usuario" class="labelform"> ID </label> 
	<input type="text" name="id_usuario" id="id_usuario" class="inputform" value='' /> 
	
	<label for="nome" class="labelform"> Nome </label> 
	<input type="text" name="nome" id="nome" class="inputform" value='' /> 
	
	<label for="usuario" class="labelform"> Usuario </label> 
	<input type="text" name=""usuario"" id=""usuario"" class="inputform" value='' /> 
	
	<label for="situacao" class="labelform"> Situacao </label> 
	<input type="text" name="situacao" id="situacao" class="inputform" value='' /> 
	
	<input type="submit" value="Salvar" />

</form>

<?php } ?>

<?php 
//Abrir de conexão
	$link = mysqli_connect('localhost', 'root','', 'maestro');

//Fazer o uso
	$query = 'SELECT * FROM usuarios';
	$handle = mysqli_query($link, $query);
	?>
	<table>
		<?php while($row = mysqli_fetch_assoc($handle)){ ?>
		<tr>
			<td><?php echo $row['id_usuario'];?></td>
			<td><?php echo $row['nome'];?></td>
			<td><?php echo $row['usuario'];?></td>
			<td>
				<a href="index.php?pagina=usuarios_formulario&id=<?php echo $row['id_usuario'];?>" class="btn btn-primary">Editar</a>
				<a href="index.php?pagina=usuarios_deletar&id=<?php echo $row['id_usuario'];?>"  class="btn btn-danger">Deletar</a>
			</td>
		</tr>
		<?php } ?>
		
	</table>

<?php
//Fechar conexão
	mysqli_close($link);
?>
