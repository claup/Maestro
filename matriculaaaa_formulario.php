<?php
//Captura as variaveis
//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
//$id = isset($_REQUEST['id_matricula']) ? $_REQUEST['id_matricula'] : '';

$id_matricula = isset($_POST['id_matricula']) ? filter_input(INPUT_POST, 'id_matricula', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id_matricula', FILTER_VALIDATE_INT);
$id_aluno = filter_input(INPUT_POST, 'id_aluno', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
$responsavel = filter_input(INPUT_POST, 'responsavel', FILTER_SANITIZE_STRING);
$curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);

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
			
			header('location: index.php?pagina=usuarios&mensagem='.$mensagem['sucesso']);
			
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
			header('location: index.php?pagina=usuarios&mensagem='.$mensagem['sucesso']);
				
		}

	}else{
		
		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');

		//Faz o Uso
		//Buscar os dados
		$sql = "select id_usuario, usuario, senha, nome from usuarios where	id_usuario = $id";
				
		$resultado = mysqli_query($link, $sql);

		$row = mysqli_fetch_row($resultado);
		
		$usuario = $row[1];
		$senha = $row[2];
		
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