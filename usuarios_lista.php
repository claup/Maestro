<span><?=(isset($mensagem['sucesso'])) ? $mensagem['sucesso'] :'';?></span>
<br/>

<a href="usuarios_formulario.php" class="btn btn-success">Adicionar</a>
					
<table>
	<tr>
		<td>ID</td>
		<td>Usuario</td>
		<td>Senha</td>
		<td>Situação</td>
	</tr>
	<?php
	//escrever o processo de busca dos dados no arquivo
	$ponteiroArquivo = fopen('arquivo_usuarios.txt', 'r');
	
	if($ponteiroArquivo){
		//arquivo encontrado
		
		//ler arquivo
		while(!feof($ponteiroArquivo)){
			//obtem a linha e posiciona o ponteiro na proxima linha
			$linha = fgets($ponteiroArquivo, 1024);
			
			//inicializa a variavel dados com vazio
			$dados = array();
			
			//quebrar a string a cada ponto-virgula
			$dados = explode(';', $linha);
			
			//imprimir a linha da tabela
			?>
			<tr>
				<td><?php echo $dados[0];?></td>
				<td><?php echo $dados[1];?></td>
				<td><?php echo $dados[2];?></td>
				<td>
					<a href="usuarios_formulario.php?id=<?php echo $dados[0];?>" class="btn btn-primary">Editar</a>
					<a href="usuario_deletar.php?id=<?php echo $dados[0];?>"  class="btn btn-danger">Deletar</a>
				</td>
				
				
			</tr>
			<?php
		}
		
	}else{
		//arquivo não encontrado
		?>
		<tr>
			<td colspan="4">Arquivo Vazio</td>
		</tr>
		<?php
	}
	
	?>
</table>
