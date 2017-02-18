
		<div class="row">
			<h1>Aluno</h1>

			<ol class="breadcrumb">
				<li><a href="#">Maestro</a></li>
				<li class="active">Aluno</li>
			</ol>
		</div>

			<?php if (isset($_GET ['formulario']) && $_GET ['formulario']==0 ) { ?>
				<div class="row">
			<a href="aluno_lista.php?menu=aluno&formulario=1"
				class="btn btn-success">Adicionar</a>
			
			<?php
				// Exibir as mensagens de retorno.
				$msg = filter_input ( INPUT_GET, 'msg', FILTER_SANITIZE_STRING );
				if (isset ( $_GET ['msg'] )) {
					echo $_GET ['msg'];
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
					while ( ! feof ( $ponteiroArquivo ) ) {
						$linha = fgets ( $ponteiroArquivo, 1024 );
						$dados = explode ( ';', $linha );
						?>
						<tr>
					<td><?=$dados[0];?></td>
					<td><?=$dados[1];?></td>
					<td><?=$dados[2];?></td>
					<td><a
						href="aluno_lista.php?menu=aluno&formulario=1&id=<?=$dados[0];?>"
						class="btn btn-info">Editar</a> <a
						href="aluno_deleta.php?id=<?=$dados[0];?>" class="btn btn-danger">Deletar</a></td>
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
				$id = filter_input ( INPUT_GET, 'id', FILTER_VALIDATE_INT );
				$registro = array ();
				
				if ($id) {
					$ponteiroArquivo = fopen ( 'arquivo_aluno.txt', 'r' );
					
					while ( ! feof ( $ponteiroArquivo ) ) {
						$linha = fgets ( $ponteiroArquivo, 1024 );
						$dados = explode ( ';', $linha );
						if ($dados [0] == $id) {
							$registro = $dados;
						}
					}
				}
				?>
			
			<form method="POST" action="<?=($id)? 'aluno_edita.php' : 'aluno_valida.php';?>">

			<label for="id" class="labelform"> ID </label> 
			<input type="text" name="id" id="id" class="inputform"
					value="<?=isset($registro[0]) ? $registro[0] : '';?>" /> 
			<label for="nome" class="labelform"> Nome </label> 
			<input type="text" name="nome" id="nome" class="inputform"
					value="<?=isset($registro[1]) ? $registro[1] : '';?>" /> 
			<label for="email" class="labelform"> E-mail </label> 
			<input type="text" name="email" id="email" class="inputform"
					value="<?=isset($registro[2]) ? $registro[2] : '';?>" /> 
			<input type="submit" value="Cadastrar" />

		</form>
						
			<?php } ?>
	

