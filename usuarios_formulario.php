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
			
			
			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');

			//Faz o Uso
			//Inserindo os dados
			$sql = " insert into usuarios
					(
						id_usuario, 
						nome, 
						usuario, 
						senha
					) 
					values 
					(	
						null,
						'$usuario', 
						'@',
						'$senha'
					)";
					
			$resultado = mysqli_query($link, $sql);

			//Fechei a conexao
			mysqli_close($link);
				
			
			
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
				
			//Abrir Conexão
			$link = mysqli_connect('localhost','root','');
			$conexao = mysqli_select_db($link, 'maestro');

			//Faz o Uso
			//Atualizando os dados
			$sql = "
				update usuarios
				set
					usuario = '$usuario',
					nome = '$usuario',
					senha = '$senha'
				
				where
					id_usuario = $id
			";
					
			$resultado = mysqli_query($link, $sql);

			//Fechei a conexao
			mysqli_close($link);
				
			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: usuarios_lista.php?mensagem='.$mensagem['sucesso']);
				
		}

	}else{
		//Busco os dados do banco de dados
		
		$dados = array();
	
		
		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');

		//Faz o Uso
		//Atualizando os dados
		$sql = "
			select
				*
			from
				usuarios
			where
				id_usuario = $id
		";
				
		$resultado = mysqli_query($link, $sql);

		$row = mysql_affected_rows($resultado);
		
		$usuario = $row['usuario'];
		$senha = $row['senha'];
		
		//Fechei a conexao
		mysqli_close($link);
		
		
		
		
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