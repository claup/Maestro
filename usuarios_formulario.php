<?php
//Captura as variaveis
//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';
$id = isset($_POST['id']) ? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$salvar = filter_input(INPUT_POST, 'salvar', FILTER_VALIDATE_INT);


if(!$id)
{
	//CRIAR
	
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$usuario){
			$mensagem['usuario'] = 'Preencha o usuario';
		}elseif(!$senha){
			$mensagem['senha'] = 'Preencha a senha';
		}else{
			
			
			$ultimaLinha = array();
	
			//abrir o arquivo
			$ponteiroArquivo = fopen('arquivo_usuarios.txt', 'r');
			
			//manipulei o arquivo
			while(!feof($ponteiroArquivo)){
				//obtive a linha do arquivo
				$linha = fgets($ponteiroArquivo, 1024);
				//quebrei a linha transformando a string em um array ordenativo
				$ultimaLinha= explode(';', $linha);
			}
			//fechei o arquivo
			fclose($ponteiroArquivo);
			
			$quebra = '';
			if($ultimaLinha[0] != ''){
				$id = $ultimaLinha[0] + 1;
				$quebra = "\n";
			}else{
				$id = '1';
				$quebra = '';
			}

			$fd = fopen ("arquivo_usuarios.txt", "a");
			fwrite ($fd, "$quebra$id;$usuario;$senha");
			fclose ($fd);
			
			
			$mensagem['sucesso'] = 'Registro inserido. Você já pode edita-lo.';
			
			header('location: usuarios_lista.php?mensagem='.$mensagem['sucesso']);
			
		}

	}
	
	
}
else
{
	//EDITAR
	if($salvar){
		//Salvo os dados no arquivo
		//Verificando o preenchimento
		if(!$usuario){
			$mensagem['usuario'] = 'Preencha o usuario';
		}elseif(!$senha){
			$mensagem['senha'] = 'Preencha a senha';
		}else{
				
			$bufferArquivo = array();
			
			//abrir o arquivo
			$ponteiroArquivo = fopen('arquivo_usuarios.txt', 'r');
			
			//manipulei o arquivo
			while(!feof($ponteiroArquivo)){
				$linha = fgets($ponteiroArquivo, 1024);
				
				$linhaAtual = explode(';', $linha);
				
				if( $linhaAtual[0] == $id ){
					$bufferArquivo[] = "\n$id;$usuario;$senha\n";
				}else{
					$bufferArquivo[] = $linha;
				}
				
			}
			//fechei o arquivo
			fclose($ponteiroArquivo);
			
			//abrir o arquivo
			$ponteiroArquivo1 = fopen('arquivo_usuarios.txt', 'w');
			
			//escrever no arquivo
			foreach($bufferArquivo as $linha1){
				echo $linha1."\n";
				fwrite ($ponteiroArquivo1, $linha1);
			}
			
			die();
			
			//fechar o arquivo
			fclose($ponteiroArquivo1);	
				
			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: usuarios_lista.php?mensagem='.$mensagem['sucesso']);
				
		}

	}else{
		//Busco os dados do arquivo
		
		$dados = array();
	
		//abrir o arquivo
		$ponteiroArquivo = fopen('arquivo_usuarios.txt', 'r');
		//manipulei o arquivo
		while(!feof($ponteiroArquivo)){
			$linha = fgets($ponteiroArquivo, 1024);
			
			$linhaAtual = explode(';', $linha);
			
			if( $linhaAtual[0] == $id ){
				$dados = $linhaAtual;
				break;
			}
		}
		//fechei o arquivo
		fclose($ponteiroArquivo);
		
		
		
		$usuario = $dados[1];
		$senha = $dados[2];
		
	}
}
?>


<form method="post">
	
	<input type="hidden" name="id" value="<?php echo $id;?>" />
	
	<label>Usuário</label>
	<input type="text" name="usuario" value="<?php echo $usuario;?>" />
	<span><?=(isset($mensagem['usuario'])) ? $mensagem['usuario'] : '';?></span>
	<br/>
	<label>Senha</label>
	<input type="text" name="senha" value="<?php echo $senha;?>" />
	<span><?=(isset($mensagem['senha'])) ? $mensagem['senha'] : '';?></span>
	<br/>
	<button type="submit" name="salvar" value="1" class="btn btn-success">Salvar</button>
	
</form>