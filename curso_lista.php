<?php
 $mensagem = filter_input(INPUT_GET, 'mensagem', FILTER_SANITIZE_STRING);?>
<span><?=(isset($mensagem)) ? $mensagem :'';?></span>
<br/>


<div class="row">
<h1>Curso</h1>

<ol class="breadcrumb">
<li><a href="#">Maestro</a></li>
<li class="active">Curso</li>
</ol>
</div>

<?php if (isset($_GET ['formulario']) && $_GET ['formulario']==0 ) { ?>
		<div class="row">
		<a href="curso_lista.php?menu=curso&formulario=1"
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
			$ponteiroArquivo = fopen ( 'arquivo_curso.txt', 'r' );
				
			if ($ponteiroArquivo) {
			?>
			<table class="table table-striped table-bordered table-hover">
			<tr>
			<td>id_curso</td>
			<td>curso</td>
			<td>carga horaria</td>
			<td>data_inicio</td>
			<td>data_fim</td>
			<td>professor</td>
			<td>acoes</td>
			</tr>
											
			<?php
			// percorrer o arquivo.
			while (! feof ( $ponteiroArquivo )) {
			$linha = fgets ( $ponteiroArquivo, 1024 );
			$dados = explode ( ';', $linha );
			if($dados[0] != ''){
			?>
			<tr>
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
			<td><a href="#" class="btn btn-info">Editar</a> <a href="#"
					class="btn btn-danger">Deletar</a></td>
			</tr>
								
								
			<?php } ?>
						
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
					$ponteiroArquivo = fopen ( 'arquivo_curso.txt', 'r' );
					
					while ( ! feof ( $ponteiroArquivo ) ) {
						$linha = fgets ( $ponteiroArquivo, 1024 );
						$dados = explode ( ';', $linha );
						if ($dados [0] == $id) {
							$registro = $dados;
						}
					}
				}
				?>
			
			<form method="POST" action="<?=($id)? 'curso_edita.php' : 'curso_valida.php';?>">

			<label for="id_curso" class="labelform"> ID CURSO </label> 
			<input type="text" name="id_curso" id="id_curso" class="inputform"
					value="<?=isset($registro[0]) ? $registro[0] : '';?>" /> 
					
			<label for="curso" class="labelform"> Curso </label> 
			<input type="text" name="curso" id="curso" class="inputform"
					value="<?=isset($registro[1]) ? $registro[1] : '';?>" /> 
					
			<label for="carga_horaria" class="labelform"> Carga Horaria </label> 
			<input type="text" name="carga_horaria" id="carga_horaria" class="inputform"
					value="<?=isset($registro[2]) ? $registro[2] : '';?>" /> 
					
			<label for="data_inicio" class="labelform"> Data de Inicio </label> 
			<input type="text" name="data_inicio" id="data_inicio" class="inputform"
					value="<?=isset($registro[3]) ? $registro[3] : '';?>" /> 
					
			<label for="data_fim" class="labelform"> Data de Encerramento </label> 
			<input type="text" name="data_fim" id="data_fim" class="inputform"
					value="<?=isset($registro[4]) ? $registro[4] : '';?>" /> 	
					
			<label for="professor" class="labelform"> Professor </label> 
			<input type="text" name="professor" id="professor" class="inputform"
					value="<?=isset($registro[5]) ? $registro[5] : '';?>" /> 			
					
			<input type="submit" value="Cadastrar" />

		</form>
						
			<?php } ?>
	

