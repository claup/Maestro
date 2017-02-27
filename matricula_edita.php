<?php

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

if(!$id_matricula){
	$mensagem='Informe o id da matricula'; //matricula tem auto incremento?
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");

}elseif(!$aluno){
	$mensagem='Informe o aluno';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");

}elseif(!$cpf){
	$mensagem='Informe o cpf';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");

}elseif(!$endereco){
	$mensagem='Informe o endereco';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");

}elseif(!$telefone){
	$mensagem='Informe o telefone';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");

}elseif(!$email){
	$mensagem='Informe o email';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");

}elseif(!$data_nascimento){
	$mensagem='Informe a data de nascimento';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");

}elseif(!$responsavel){ 	//se menor 18 anos
	$mensagem='Informe o responsavel';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");

}elseif(!$curso){
	$mensagem='Informe o curso';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");
	
	
}else{

	$buffer = array ();

	// abrir o arquivo
	$ponteiroArquivo = fopen ( 'arquivo_matricula.txt', 'r' );

	// manipular arquivo
	while ( ! feof ( $ponteiroArquivo ) ) {
		$linha = fgets ( $ponteiroArquivo, 1024 );

		$linhaAtual = explode (';', $linha );

		if ($linhaAtual[0] != $id) {
			$buffer[] = $linha;
		}else{
			$buffer[] = "$id_matricula; $aluno; $cpf; $endereco; $telefone; $email; $data_nascimento; $responsavel; $curso";
		}
	}

	// fechar arquivo
	fclose ( $ponteiroArquivo );

	//abrir arquivo
	$ponteiroArquivo1 = fopen ('arquivo_matricula.txt', 'w');

	//escrever no arquivo
	foreach ($buffer as $linha1) {
		fwrite ($ponteiroArquivo1, $linha1);
	}

	//fechar arquivo
	fclose ( $ponteiroArquivo1 );

	$mensagem = 'Edição realizada com sucesso';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");
}

?>
