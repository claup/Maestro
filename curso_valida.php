<?php

$id_curso=filter_input(INPUT_POST, 'id_curso', FILTER_VALIDATE_INT);

$nome=filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);

$carga_horaria=filter_input(INPUT_POST, 'carga_horaria', FILTER_SANITIZE_STRING);

$data_inicio=filter_input(INPUT_POST, 'data_inicio', FILTER_SANITIZE_STRING);

$data_fim=filter_input(INPUT_POST, 'data_fim', FILTER_SANITIZE_STRING);

$professor=filter_input(INPUT_POST, 'professor', FILTER_SANITIZE_STRING);


if(!$id_curso){
	$mensagem='Informe o id do curso';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");

}elseif(!curso){
	$mensagem='Informe o curso';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");

}elseif(!$carga_horaria){
	$mensagem='Informe a carga horaria';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");

}elseif(!$data_inicio){
	$mensagem='Informe a data de inicio';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");

}elseif(!$data_fim){
	$mensagem='Informe a data de encerramento';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
	
}elseif(!$professor){
	$mensagem='Informe o professor';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");
	
}else{
	//var_dump($id);  	// false
	//var_dump($nome); 	//''
	//var_dump($email);	//''

	$arquivo = array();
	$fd = fopen ("arquivo_curso.txt", "a");
	fwrite	($fd, "\n$id_curso;$curso;$carga_horaria;$data_inicio;$data_fim;$professor");
	fclose ($fd);

	$mensagem = 'Cadastro realizado com sucesso';
	header("location:/maestro/curso_lista.php?msg=$mensagem&menu=curso&formulario=0");

}

?>


