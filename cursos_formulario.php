<?php

//Captura as variaveis
//$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
//$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

$id_curso = isset($_POST['id_curso']) ? filter_input(INPUT_POST, 'id_curso', FILTER_VALIDATE_INT) : filter_input(INPUT_GET, 'id_curso', FILTER_VALIDATE_INT);

$curso = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);

$carga_horaria = filter_input(INPUT_POST, 'carga_horaria', FILTER_SANITIZE_STRING);

$data_inicio = filter_input(INPUT_POST, 'data_inicio', FILTER_VALIDATE_INT);

$data_fim = filter_input(INPUT_POST, 'data_fim', FILTER_VALIDATE_INT);

$professor = filter_input(INPUT_POST, 'professor', FILTER_VALIDATE_INT);

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
			id_curso,
			curso,
			carga_horaria,
			data_inicio,
			data_fim,
			professor
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
				
			header('location: index.php?pagina=curso&mensagem='.$mensagem['sucesso']);
				
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
			id_curso = '$id_curso',
			curso = '$nome',
			carga_horaria = '$carga_horaria ',
			data_inicio = '$data_inicio', 
			data_fim = '$data_fim',
			professor = '$professor',

			where
			id_curso = $id_curso
			";
				
			$resultado = mysqli_query($link, $sql);

			//Fechei a conexao
			mysqli_close($link);

			$mensagem['sucesso'] = 'Registro Editado.';
			header('location: index.php?pagina=curso&mensagem='.$mensagem['sucesso']);

		}

	}else{

		//Abrir Conexão
		$link = mysqli_connect('localhost','root','');
		$conexao = mysqli_select_db($link, 'maestro');

		//Faz o Uso
		//Buscar os dados
		$sql = "select id_curso, curso, carga_horaria, data_inicio, data_fim, professor from usuarios where	id_curso = $id_curso";

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
	
	<label>Curso</label>
	<input type="text" name="curso" value="<?php echo $usuario;?>" />
	<span><?=(isset($mensagem['usuario'])) ? $mensagem['usuario'] : '';?></span>
	<br/>
	<label>Senha</label>
	<input type="text" name="senha" value="<?php echo $senha;?>" />
	<span><?=(isset($mensagem['senha'])) ? $mensagem['senha'] : '';?></span>
	<br/>
	<button type="submit" name="salvar" value="1" class="btn btn-success">Salvar</button>
	
</form>