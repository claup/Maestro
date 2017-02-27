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
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matriculao&formulario=0");

}elseif(!$aluno){
	$mensagem='Informe o aluno';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");

}elseif(!$cpf){
	$mensagem='Informe o cpf';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
	
}elseif(!$endereco){
	$mensagem='Informe o endereco';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
		
}elseif(!$telefone){
	$mensagem='Informe o telefone';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
		
}elseif(!$email){
	$mensagem='Informe o email';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
	
}elseif(!$data_nascimento){
	$mensagem='Informe a data de nascimento';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
		
}elseif(!$responsavel){ 	//se menor 18 anos
	$mensagem='Informe o responsavel';
	header("location:/maestro/aluno_lista.php?msg=$mensagem&menu=aluno&formulario=0");
		
}elseif(!$curso){
	$mensagem='Informe o curso';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
			
	
}else{
	//var_dump($id);  	// false
	//var_dump($nome); 	//''
	//var_dump($email);	//''

	$arquivo = array();
	$fd = fopen ("arquivo_curso.txt", "a");
	fwrite	($fd, "\n$id_matricula; $aluno; $cpf; $endereco; $telefone; $email; $data_nascimento; $responsavel; $curso");
	fclose ($fd);

	$mensagem = 'Matricula realizada com sucesso';
	header("location:/maestro/matricula_lista.php?msg=$mensagem&menu=matricula&formulario=0");

}

?>


