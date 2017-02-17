<html>
<head>

<title>Maestro</title>

<link rel="stylesheet" href="./css/bootstrap.css" />
<link rel="stylesheet" href="./css/estilo.css" />

<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="./js/bootstrap.js"></script>

</head>

<body>

	<header>
		<div class="container">
			<div class="row">
				<div class="col-lg-4" id="logo">
					<img src="./img/maestro.png" alt="Logo do sistema Maestro" />
				</div>

				<div class="col-lg-8" id="menu">
					<ul class="nav nav-pills  pull-right">
						<li role="presentation"
							class="<?=(isset($_GET['menu']) && $_GET['menu'] == 'dashboard')? 'active':''; ?>"><a
							href="aluno_lista.php?menu=dashboard">Dashboard</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['menu']) && $_GET['menu'] == 'aluno')? 'active':''; ?>"><a
							href="aluno_lista.php?menu=aluno&formulario=0"> Alunos </a></li>
						<li role="presentation"
							class="<?=(isset($_GET['menu']) && $_GET['menu'] == 'professor')? 'active':''; ?>"><a
							href="aluno_lista.php?menu=professor&formulario=0">Professores</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['menu']) && $_GET['menu'] == 'coordenador')? 'active':''; ?>"><a
							href="aluno_lista.php?menu=coordenador&formulario=0">Coordenadores</a></li>
						<li role="presentation"
							class="<?=(isset($_GET['menu']) && $_GET['menu'] == 'sair')? 'active':''; ?>"><a
							href="aluno_lista.php?menu=sair">Sair</a></li>
					</ul>
				</div>

			</div>
		</div>

	</header>

	<div id="content">
		<div class="container">
		<?php
		
		if (isset ( $_GET ['menu'] ) && $_GET ['menu'] == 'aluno') {
			?>
			<div class="row">
				<h1>Dashboard</h1>

				<ol class="breadcrumb">
					<li><a href="#">Maestro</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</div>

			<?php if (isset($_GET ['formulario']) && $_GET ['formulario']==0 ) { ?>
				<div class="row">
					<a href="aluno_lista.php?menu=aluno&formulario=1" class="btn btn-success">Adicionar</a>
			
			<?php 
			 	//Exibir as mensagens de retorno.
			 	$msg=filter_input(INPUT_GET,'msg', FILTER_SANITIZE_STRING);
			 	if (isset($_GET['msg'])){
			 		 echo $_GET['msg'];	
			 	}
			?>		
		
		
					<?php
					// escrever o processo de busca de dados no arquivo.
					$ponteiroArquivo = fopen ( 'arquivo_aluno.txt', 'r' );
					
					if ($ponteiroArquivo) {
						?>
					<table class="table table-striped table-bordered table-hover">
						<tr>
							<td>ID</td>
							<td>Nome</td>
							<td>E-mail</td>
							<td>Ações</td>
						</tr>
											
					<?php
						// percorrer o arquivo.
						while ( !feof($ponteiroArquivo) ) {
								$linha = fgets($ponteiroArquivo, 1024);
								$dados = explode(';', $linha);
					?>
						<tr>
							<td><?=$dados[0];?></td>
							<td><?=$dados[1];?></td>
							<td><?=$dados[2];?></td>
							<td><a href="aluno_lista.php?menu=aluno&formulario=1&id=<?=$dados[0];?>" class="btn btn-info">Editar</a> 
								<a href="aluno_deleta.php?id=<?=$dados[0];?>"	class="btn btn-danger">Deletar</a></td>
						</tr>
					<?php
						}
						?>
						</table>
					<?php } ?>
				</div>
			<?php }else{ ?>
			<?= (isset($_GET['msg']))?$_GET['msg']:''?>
			
			<?php 
				$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
				$registro = array();
				
				if($id){
					$ponteiroArquivo = fopen('arquivo_aluno.txt', 'r');
				
					while(!feof($ponteiroArquivo)){
						$linha = fgets($ponteiroArquivo, 1024);
						$dados = explode(';', $linha);
						if($dados[0] == $id){
							$registro = $dados;
						}
					}
				}
			?>
			
			<form method="POST" action="<?=($id)? 'aluno_edita.php' : 'aluno_valida.php';?>">
	
				<label for="id" class="labelform"> ID </label>
				<input type="text" name="id" id="id" class="inputform" value="<?=isset($registro[0]) ? $registro[0] : '';?>"/> 
				
				<label for="nome" class="labelform"> Nome </label>
				<input type="text" name="nome" id="nome" class="inputform" value="<?=isset($registro[1]) ? $registro[1] : '';?>"/> 
				
				<label for="email" class="labelform"> E-mail </label>
				<input type="text" name="email" id="email" class="inputform" value="<?=isset($registro[2]) ? $registro[2] : '';?>"/> 
				<input type="submit" value="Cadastrar"/>
				
			</form>
						
			<?php } ?>
			
			
			
			
			<?php
		}
		
		if (isset ( $_GET ['menu'] ) && $_GET ['menu'] == 'dashboard') {
			?>
			<div class="row">
				<h1>Dashboard</h1>
				<ol class="breadcrumb">
					<li><a href="#">Maestro</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</div>
			<?php
		}
		
		if (isset ( $_GET ['menu'] ) && $_GET ['menu'] == 'professor') {
			?>
				<div class="row">
				<h1>Professor</h1>
				<ol class="breadcrumb">
					<li><a href="#">Maestro</a></li>
					<li class="active">Professor</li>
				</ol>
				</div>
				<?php if (isset ( $_GET ['formulario']) && $_GET['formulario'] == 0) { ?>
					<div class="row">
						<a href="aluno_lista.php?menu=professor&formulario=1" class="btn btn-success">Adicionar</a>
		
						<table class="table table-striped table-bordered table-hover">
							<tr>
								<td>ID</td>
								<td>Nome</td>
								<td>E-mail</td>
								<td>Ações</td>
							</tr>
							<tr>
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
								<td><a href="#" class="btn btn-info">Editar</a> <a href="#"
									class="btn btn-danger">Deletar</a></td>
							</tr>
						</table>
					</div>
					<?php }else{ ?>
					
					<form>
						<label for="id" class="labelform"> ID </label>
						<input type="text" name="ID" id="id" class="inputform" value="203"/> 
						
						<label for="nome" class="labelform"> Nome </label>
						<input type="text" name="nome" id="nome" class="inputform" value="Márcio Peixoto"/> 
						
						<label for="sexo" class="labelform"> Sexo </label>
						<input type="text" name="sexo" id="sexo" class="inputform" value="masculino"/> 
						
						<label for="endereço" class="labelform"> Endereço </label>
						<input type="text" name="endereço" id="endereço" class="inputform" value="Caxias do Sul, RS"/> 
						
						<label for="telefone" class="labelform"> Telefone </label>
						<input type="text" name="telefone" id="telefone" class="inputform" value="(54) 99999-9999"/> 
						
						<label for="curso" class="labelform"> Curso </label>
						<input type="text" name="curso" id="curso" class="inputform" value="gestão de pessoas"/> 
						
						<input type="submit" value="Salvar"/>
					</form>
				<?php } ?>	
		<?php 			
		} 		
		if (isset ( $_GET ['menu']) && $_GET['menu'] == 'coordenador')
		{ ?>
				<div class="row">
				<h1>Coordenador</h1>
				<ol class="breadcrumb">
					<li><a href="#">Maestro</a></li>
					<li class="active">Coordenador</li>
				</ol>
				</div>
				
				
			 <?php if (isset ( $_GET ['formulario']) && $_GET['formulario'] == 0) { ?>
			  
			  <div class="row">
				<a href="aluno_lista.php?menu=coordenador&formulario=1" class="btn btn-success">Adicionar</a>

				<table class="table table-striped table-bordered table-hover">
					<tr>
						<td>ID</td>
						<td>Nome</td>
						<td>E-mail</td>
						<td>Ações</td>
					</tr>
					<tr>
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
						<td><a href="#" class="btn btn-info">Editar</a> <a href="#"
							class="btn btn-danger">Deletar</a></td>
					</tr>
				</table>
			</div>
			<?php } else { ?>
			
			<form>
				<label for="id" class="labelform"> ID </label>
				<input type="text" name="ID" id="id" class="inputform" value="11303"/> 
				
				<label for="nome" class="labelform"> Nome </label>
				<input type="text" name="nome" id="nome" class="inputform" value="Pablo Silva"/> 
				
				<label for="area" class="labelform"> Área </label>
				<input type="radio" name="Adm" id="areaadm" value="Adm"/> Adm
				<input type="radio" name="Tecno" id="areatecno" value="Tecno"/> Tecno
				
				<br/>
				
				<label for="unidade" class="labelform"> Unidade </label>
				<input type="radio" name="Cidade" id="cidade" value="cidade"/> Cidade
				<input type="radio" name="Campus Pelotas" id="campuspel" value="Campus Pelotas"/> Campus Pelotas
				
				<br/>
				<br/>
				
				<input type="submit" value="Salvar"/>
				
			</form>
			
			<?php } ?>
			
		<?php }
		
		if (isset($_GET['menu']) && $_GET['menu'] == 'sair')
		{
			?>
			<div class="row">
				<h1>Sair</h1>
				<ol class="breadcrumb">
					<li><a href="#">Maestro</a></li>
					<li class="active">Sair</li>
				</ol>
			</div>
			<form>
			<p> Você deseja realmente sair? </p>
			<input type="submit" value="Sair"/>	
			</form>			
			<?php 
		}
		?>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>Sistema Maestro. Versão 1.0.0.1</p>
				</div>
			</div>
		</div>

	</footer>


</body>

</html>

