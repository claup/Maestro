<?php
//Captura as variaveis
//$id = filter_input(INPUT_POST, 'id_matricula', FILTER_VALIDATE_INT);
//$id = isset($_REQUEST['id_matricula']) ? $_REQUEST['id_matricula'] : '';

$id_matricula = isset($_POST['id_matricula']) ? filter_input(INPUT_POST, 'id_matricula', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id_matricula', FILTER_VALIDATE_INT);
$nome_aluno = filter_input(INPUT_POST, '$nome_aluno', FILTER_SANITIZE_STRING);
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
						id_matricula, 
						nome_aluno, 
						cpf, 
						endereco,						
						telefone,
						email,
						data_nascimento,
						responsavel,
						curso						
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
					id_matricula = $id
			";
					
			$resultado = mysqli_query($link, $sql);

			//Fechei a conexao
			mysqli_close($link);
				
			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: index.php?pagina=matricula&mensagem='.$mensagem['sucesso']);
				
		}

	}else{
		
		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');

		//Faz o Uso
		//Buscar os dados
		$sql = "select id_matricula,nome_aluno,cpf,endereco,telefone,email,data_nascimento,responsavel,curso = $id";
				
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
	
	<input type="hidden" name="id_matricula" value="<?php echo id_matricula;?>" />
	
	<label>Nome Aluno</label>
	<input type="text" name="nome_aluno" value="<?php echo nome_aluno;?>" />
	<span><?=(isset($mensagem['nome_aluno'])) ? $mensagem['nome_aluno'] : '';?></span>
	<br/>
	
	<label>CPF</label>
	<input type="text" name="cpf" value="<?php echo $cpf;?>" />
	<span><?=(isset($mensagem['cpf'])) ? $mensagem['cpf'] : '';?></span>
	<br/>
	
	<label>Endereco</label>
	<input type="text" name="endereco" value="<?php echo $endereco;?>" />
	<span><?=(isset($mensagem['endereco'])) ? $mensagem['endereco'] : '';?></span>
	<br/>
	
	<label>Telefone</label>
	<input type="text" name="telefone" value="<?php echo $telefone;?>" />
	<span><?=(isset($mensagem['telefone'])) ? $mensagem['telefone'] : '';?></span>
	<br/>
	
	<label>E-mail</label>
	<input type="text" name="email" value="<?php echo $email;?>" />
	<span><?=(isset($mensagem['email'])) ? $mensagem['email'] : '';?></span>
	<br/>
	
	<label>Data de Nascimento</label>
	<input type="text" name="data_nascimento" value="<?php echo $data_nascimento;?>" />
	<span><?=(isset($mensagem['data_nascimento'])) ? $mensagem['data_nascimento'] : '';?></span>
	<br/>
	
	<label>responsavel</label>
	<input type="text" name="responsavel" value="<?php echo $responsavel;?>" />
	<span><?=(isset($mensagem['responsavel'])) ? $mensagem['responsavel'] : '';?></span>
	<br/>
	
	<label>Curso</label>
	<input type="text" name="curso" value="<?php echo $curso;?>" />
	<span><?=(isset($mensagem['curso'])) ? $mensagem['curso'] : '';?></span>
	<br/>
		
	<button type="submit" name="salvar" value="1" class="btn btn-success">Salvar</button>
	
</form>