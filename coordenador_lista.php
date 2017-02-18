<div class="row">
	<h1>Coordenador</h1>
	<ol class="breadcrumb">
		<li><a href="#">Maestro</a></li>
		<li class="active">Coordenador</li>
	</ol>
</div>


<?php if (isset ( $_GET ['formulario']) && $_GET['formulario'] == 0) { ?>

<div class="row">
	<a href="aluno_lista.php?menu=coordenador&formulario=1"
		class="btn btn-success">Adicionar</a>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID</td>
			<td>Nome</td>
			<td>Área</td>
			<td>Unidade</td>
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
	<label for="id" class="labelform"> ID </label> 
	<input type="text" name="ID" id="id" class="inputform" value='' /> 
	
	<label for="nome" class="labelform"> Nome </label> 
	<input type="text" name="nome" id="nome" class="inputform" value='' /> 
	
	<label for="area" class="labelform"> Área </label> 
	<input type="radio" name="Adm" id="areaadm" value="Adm" /> Adm 
	<input type="radio" name="Tecno" id="areatecno" value="Tecno" /> Tecno <br /> 
		
	<label for="unidade" class="labelform"> Unidade </label> 
	<input type="radio" name="Cidade" id="cidade" value="cidade" /> Cidade 
	<input type="radio" name="Campus Pelotas" id="campuspel" value="Campus Pelotas" /> Campus Pelotas <br /> <br /> 
	
	<input type="submit" value="Salvar" />

</form>

<?php } ?>