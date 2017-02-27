<div class="row">
<h1>Matriculas</h1>
<ol class="breadcrumb">
<li><a href="#">Maestro</a></li>
<li class="active">Matriculas</li>
</ol>
</div>
<?php if (isset ( $_GET ['formulario']) && $_GET['formulario'] == 0) { ?>
<div class="row">
	<a href="aluno_lista.php?menu=matricula&formulario=1"
		class="btn btn-success">Adicionar</a>

	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>ID Matricula</td>
			<td>Aluno</td>
			<td>CPF</td>
			<td>Endereço</td>
			<td>Telefone</td>
			<td>E-mail</td>
			<td>Data de Nascimento</td>
			<td>Responsavel</td>
			<td>Curso</td>
			<td>Ações</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
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
	<label for="id_matricula" class="labelform"> ID Matricula </label> 
	<input type="text" name="id_matricula" id="id_matricula" class="inputform" value='' /> 
		
	<label for="aluno" class="labelform"> Aluno </label> 
	<input type="text" name="aluno" id="aluno" class="inputform" value='' /> 
		
	<label for="cpf" class="labelform"> CPF </label> 
	<input type="text" name="cpf" id="cpf" class="inputform" value='' /> 
		
	<label for="endereco" class="labelform"> Endereço </label> 
	<input type="text" name="endereco" id="endereco" class="inputform" value='' /> 

	<label for="telefone" class="labelform"> Telefone </label> 
	<input type="text" name="telefone" id="telefone" class="inputform" value='' /> 

	<label for="email" class="labelform"> CPF </label> 
	<input type="text" name="email" id="email" class="inputform" value='' /> 

	<label for="data_nascimento" class="labelform"> Data de Nascimento </label> 
	<input type="text" name="data_nascimento" id="data_nascimento" class="inputform" value='' /> 

	<label for="responsavel" class="labelform"> Responsavel </label> 
	<input type="text" name="responsavel" id="responsavel" class="inputform" value='' /> 

	<label for="curso" class="labelform"> Curso </label> 
	<input type="text" name="curso" id="curso" class="inputform" value='' /> 
		
	<input type="submit" value="Salvar" />
</form>

<?php } ?>	

