<div class="row">
	<h1>Professor</h1>
	<ol class="breadcrumb">
		<li><a href="#">Maestro</a></li>
		<li class="active">Professor</li>
	</ol>
</div>
<?php if (isset ( $_GET ['formulario']) && $_GET['formulario'] == 0) { ?>
<div class="row">
	<a href="professor_lista.php?menu=professor&formulario=1"
		class="btn btn-success">Adicionar</a>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID</td>
			<td>Nome</td>
			<td>E-mail</td>
			<td>Unidade</td>
			<td>Disciplina</td>
			<td>Ações</td>
		</tr>
		<tr>
			<td></td>
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
			<td></td>
			<td><a href="#" class="btn btn-info">Editar</a> <a href="#"
				class="btn btn-danger">Deletar</a></td>
		</tr>
	</table>
</div>
<?php }else{ ?>

<form>
	<label for="id" class="labelform"> ID </label> <input type="text"
		name="ID" id="id" class="inputform" value='' /> 
		
	<label for="nome" class="labelform"> Nome </label> <input type="text" name="nome"
		id="nome" class="inputform" value='' /> 
		
	<label for="unidade" class="labelform"> Unidade </label> <input type="text"
		name="unidade" id="unidade" class="inputform" value='' /> 
		
	<label for="disciplina" class="labelform"> Disciplina </label> <input type="text"
		name="disciplina" id="disciplina" class="inputform" value='' /> 
		
	<input type="submit" value="Salvar" />
</form>

<?php } ?>	
